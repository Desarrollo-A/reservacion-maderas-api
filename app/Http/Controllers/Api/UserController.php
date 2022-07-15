<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IMenuService;
use App\Contracts\Services\IUserService;
use App\Core\BaseApiController;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    private IUserService $userService;
    private IMenuService $menuService;

    public function __construct(IUserService $userService,
                                IMenuService $menuService)
    {
        $this->userService = $userService;
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $userDTO = $request->toDTO();
        $user = $this->userService->create($userDTO);
        $this->menuService->createDefaultMenu($user->id, $userDTO->role->name);
        $token = $user->createToken('api-token')->plainTextToken;
        return $this->showOne(new UserResource($user, $token));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
