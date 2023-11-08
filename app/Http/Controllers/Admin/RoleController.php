<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    use ApiResponser;
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.role.index', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {

        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => strtoupper(Str::slug(request()->name)),
                'description' => ucfirst(request()->description),
            ]);
            $role->syncPermissions($request->input('permissions'));
            DB::commit();
        }catch (\Throwable $th){
            DB::rollBack();
            return $this->errorResponse($th->getMessage(), 500);
        }

        return $this->successResponse('Rol creado exitosamente', 200);
    }

    public function update(RoleRequest $request, Role $role)
    {

        DB::beginTransaction();
        try {
            $role->name = strtoupper(Str::slug(request()->name));
            $role->description = ucfirst(request()->description);
            $role->save();
            $role->permissions()->sync($request->permissions);
            DB::commit();
        }catch (\Throwable $th){
            DB::rollBack();
            return $this->errorResponse($th->getMessage(), 500);
        }

        return $this->successResponse('Rol actualizado exitosamente', 200);
    }

    public function delete(Role $role)
    {
        $role->delete();
        return $this->successResponse('Rol eliminado exitosamente', 200);
    }
}
