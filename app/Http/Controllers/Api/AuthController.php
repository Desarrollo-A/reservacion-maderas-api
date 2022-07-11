<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IAuthService;
use App\Core\BaseApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RestorePasswordRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Menu\MenuResource;
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

    public function getNavigationMenu(): JsonResponse
    {
        $menu = $this->authService->getNavigationMenu(auth()->id());
        return $this->showAll(MenuResource::collection($menu));
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
        $data = $this->authService->login($userDTO->noEmployee, $userDTO->password);
        return $this->successResponse(new LoginResource($data), 200);
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
