<?php

namespace Modules\RolePermission\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\RolePermission\app\Http\Requests\RoleRequest;
use Modules\RolePermission\app\Repositoreis\PersmissionRepository;
use Modules\RolePermission\app\Repositoreis\RoleRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{

    public function __construct(RoleRepository $RoleRepository , PersmissionRepository $PersmissionRepository){
        $this->RoleRepository = $RoleRepository;
        $this->PersmissionRepository = $PersmissionRepository;
    }
    public function index()
    {
        $Role = $this->RoleRepository->all();
        $permission = $this->PersmissionRepository->all();
        return response()->json([
            'Role' => $Role,
            'permission' => $permission
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request) {
        $this->RoleRepository->store($request);
        return response()->json([
            'message' => 'Role added successfully'
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $this->RoleRepository->update($request, $id);
        return response()->json([
            'message' => 'Role updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
            $this->RoleRepository->delete($id);
            return response()->json([
                'message' => 'Role deleted successfully'
            ]);
    }
}
