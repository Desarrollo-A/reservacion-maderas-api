<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IAuthService;
use App\Core\BaseApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RestorePasswordRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends BaseApiController
{
    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function getUser(): JsonResponse
    {
        $user = $this->authService->getUser(auth()->id());
        return $this->showOne(new UserResource($user));
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $userDTO = $request->toDTO();
        $token = $this->authService->login($userDTO->noEmployee, $userDTO->password);
        return $this->successResponse(['token' => $token], 200);
    }

    public function logout(): Response
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->noContentResponse();
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function restorePassword(RestorePasswordRequest $request): Response
    {
        $userDTO = $request->toDTO();
        $this->authService->restorePassword($userDTO->email);
        return $this->noContentResponse();
    }
}
