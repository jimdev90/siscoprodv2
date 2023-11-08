<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class ApiPermissionController extends ApiController
{
    public function index()
    {
        $permissions = Permission::get();
        return $this->showAll($permissions);
    }
}
