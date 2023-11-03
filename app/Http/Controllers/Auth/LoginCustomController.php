<?php

namespace App\Http\Controllers\Auth;

use App\Enums\EstadoUserType;
use App\Enums\UserStatusType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Saga\BasicPersonal;
use App\Models\Saga\PersonalBasica;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginCustomController extends Controller
{
    use ApiResponser;
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::DASHBOARD);
    }

    public function showActivateForm()
    {
        return view('auth.activate');
    }

    public function activateUser(ActivateUserRequest $request)
    {

        DB::beginTransaction();
        try {

            $user = BasicPersonal::select('cip', 'correo_institucional', 'celular_personal')->where('cip', $request->cip)->firstOrFail();
            $user->correo_institucional = $request->correo_institucional;
            $user->celular_personal = $request->celular_personal;
            $user->save();
            DB::table('model_has_roles')->insert(['role_id' => 6, 'model_type' => 'App\Models\User', 'model_id' => $user->cip]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse('Error de servidor, comunicate con los administradores del sistema', '500');
        }

        return $this->showOne($user, 201);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
