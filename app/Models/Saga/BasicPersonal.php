<?php

namespace App\Models\Saga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicPersonal extends Model
{
    use HasFactory;
    protected $connection = 'mysql_saga';
    protected $table = 'personal_basica';
    protected $primaryKey = 'cip';
}
