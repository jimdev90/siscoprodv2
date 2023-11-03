<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserStatusType;
use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class ApiBasicPersonalController extends ApiController
{
    public function searchPersonal(Request $request)
    {
        $this->validate($request, [
            'cip' => ['required', 'numeric', 'digits_between:6,8']
        ]);

        $user = User::select('idusuarios', 'nombre', 'unidad')
            ->where('idusuarios', $request->cip)
            ->where('estado', UserStatusType::Active)
            ->with(['basicPersonalData' => function ($query) {
                $query->select('cip', 'correo_institucional', 'celular_personal');
            }])
            ->firstOrFail();

        return $this->showOne($user);

    }
}
