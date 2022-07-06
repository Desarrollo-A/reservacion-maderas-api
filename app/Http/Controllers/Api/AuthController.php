<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IAuthService;
use App\Core\BaseApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends BaseApiController
{
    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
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
}
