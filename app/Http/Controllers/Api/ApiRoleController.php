<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class ApiRoleController extends ApiController
{
    public function index()
    {
        $roles = Role::with(['permissions' => function ($q) {
            $q->select('id', 'description');
        }])->get();
        return $this->showAll($roles);
    }
}
