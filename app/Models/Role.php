<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'roles';

    protected $fillable = [
        "name",
        "description",
        "guard_name"
    ];
}
