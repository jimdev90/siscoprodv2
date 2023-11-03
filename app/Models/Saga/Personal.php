<?php

namespace App\Models\Saga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $connection = 'mysql_saga';
    protected $table = 'personal';
    protected $primaryKey = 'idcambios_sipol';
}
