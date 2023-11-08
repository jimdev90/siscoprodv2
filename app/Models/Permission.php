<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $fillable = [
        "name",
        "description",
        "guard_name"
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
