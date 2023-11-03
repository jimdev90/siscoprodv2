<?php

namespace App\Http\Controllers\Auth;

use App\Enums\EstadoUserType;
use App\Enums\UserStatusType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

    public function activarUsuario(Request $request)
    {
        DB::beginTransaction();
        try {

            $usuario = User::where('idusuarios', $request->cip)
                ->where('estado', UserStatusType::Active)
                ->first();

            $personal_basica = PersonalBasica::where('cip', $request->cip)->first();
            $personal_basica->correo_institucional = $request->correo_institucional;
            $personal_basica->celular_personal = $request->celular_personal;
            $personal_basica->save();

            DB::table('model_has_roles')->insert(['role_id' => 6, 'model_type' => 'App\Models\User', 'model_id' => $usuario->idusuarios]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse('Error de servidor, comunicate con los administradores del sistema', '500');
        }

        return $this->showOne($personal_basica, 201);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
