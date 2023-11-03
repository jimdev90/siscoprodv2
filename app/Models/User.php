<?php

namespace App\Models;

use App\Models\Saga\BasicPersonal;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $connection = 'mysql_dirin';
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuarios';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idusuarios',
        'usuario_nombre',
        'usuario_clave',
        'cod_uni1',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usuario_clave', 'two_factor_key', 'token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    public function isAdministrator()
    {
        return $this->hasRole('ADMINISTRADOR');
    }


    /**
     * Relationships with the SAGA database
     */

    public function basicPersonalData(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BasicPersonal::class, 'cip', 'idusuarios');
    }
}
