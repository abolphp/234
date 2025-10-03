<?php

namespace Modules\RolePermission\app\Repositoreis;

use Spatie\Permission\Models\Permission;

class PersmissionRepository
{
    public function all(){
        return Permission::all();
    }}
