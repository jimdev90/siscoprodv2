<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return view('admin.permission.index');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create([
            "name" => strtolower(Str::slug(request()->name)),
            "description" => ucfirst(request()->description)
        ]);

        return $this->successResponse('Permiso creado exitosamente', 200);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->name = strtolower(Str::slug(request()->name));
        $permission->description = ucfirst(request()->description);
        $permission->save();
        return $this->successResponse('Permiso actualizado exitosamente', 200);
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        return $this->successResponse('Permiso eliminado exitosamente', 200);
    }
}
