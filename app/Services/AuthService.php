<?php

namespace App\Services;

use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IAuthService;
use App\Core\BaseService;
use App\Exceptions\CustomErrorException;
use App\Helpers\Enum\Message;
use App\Mail\Auth\RestorePasswordMail;
use App\Models\Dto\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthService extends BaseService implements IAuthService
{
    protected IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $id): User
    {
        return $this->userRepository->findById($id);
    }

    /**
     * @throws CustomErrorException
     */
    public function login(string $noEmployee, string $password): string
    {
        $user = $this->checkAccount($noEmployee, $password);
        return $user->createToken('api-token')->plainTextToken;
    }

    /**
     * @throws CustomErrorException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function restorePassword(string $email): void
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user->lookup->name === 'Inactivo') {
            throw new CustomErrorException(Message::USER_INACTIVE, Response::HTTP_BAD_REQUEST);
        }

        if ($user->lookup->name === 'Bloqueado') {
            throw new CustomErrorException(Message::USER_BLOCKED, Response::HTTP_BAD_REQUEST);
        }

        $newPassword = Str::random(User::RESTORE_PASSWORD_LENGTH);
        $userDTO = new UserDTO(password: bcrypt($newPassword));

        $user = $this->userRepository->update($user->id, $userDTO->only('password')->toArray());
        Mail::to($user)->send(new RestorePasswordMail($user, $newPassword));
    }

    /**
     * @throws CustomErrorException
     */
    private function checkAccount(string $noEmployee, string $password): User
    {
        try {
            $user = $this->userRepository->findByNoEmployee($noEmployee);
        } catch (ModelNotFoundException) {
            throw new CustomErrorException(Message::CREDENTIALS_INVALID, Response::HTTP_BAD_REQUEST);
        }

        if ($user->lookup->name === 'Inactivo') {
            throw new CustomErrorException(Message::USER_INACTIVE, Response::HTTP_BAD_REQUEST);
        }

        if ($user->lookup->name === 'Bloqueado') {
            throw new CustomErrorException(Message::USER_BLOCKED, Response::HTTP_BAD_REQUEST);
        }

        if (!Hash::check($password, $user->password)) {
            throw new CustomErrorException(Message::CREDENTIALS_INVALID, Response::HTTP_BAD_REQUEST);
        }

        return $user;
    }
}
