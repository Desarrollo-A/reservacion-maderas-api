<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IRoleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected IRoleService $roleService;

    /**
     * @param IRoleService $roleService
     */
    public function __construct(IRoleService $roleService)
    {
        $this->roleService = $roleService;
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

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->toDTO();
        $role = $this->roleService->create($data);
        return response()->json($role);
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
