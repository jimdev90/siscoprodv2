<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')
            ->with('permissions')
            ->get();
        $permissions = Permission::get();
        return view('admin.role.index', compact('roles', 'permissions'));
    }
}
