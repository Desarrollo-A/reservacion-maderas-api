<?php

namespace App\Services;

use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IAuthService;
use App\Core\BaseService;
use App\Exceptions\CustomErrorException;
use App\Helpers\Enum\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
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
