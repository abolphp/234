<?php

namespace Modules\RolePermission\app\Repositoreis;

use Modules\RolePermission\app\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function all() {
        return Role::all();
    }

    public function find($id) {
       return Role::findById($id);
    }

    public function store($request) {
        return Role::create([ "name" => $request->name])->syncPermissions($request->permissions);
    }

    public function update($request , $id) {
        $role = $this->find($id);
        return $role->syncPermissions($request->permissions)->update(['name' => $request->name]);
    }

    public function delete($id)
    {
        return Role::where('id', $id)->delete();
    }
}
