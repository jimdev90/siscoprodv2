@extends('layouts.app-auth')
@section('content')
    <div class="login-form pt-11">
        <form class="form" novalidate="novalidate" id="form-iniciar-session" method="post" action="{{ route('login') }}">
            @csrf
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Ingresar al sistema</h2>
                <span class="text-muted font-weight-bold font-size-h4">¿Aún No tienes acceso?.
										<a href="{{ route('activate') }}" class="text-primary font-weight-bolder"
                                           id="kt_login_signup">Activa tu cuenta</a></span>
            </div>
            <div class="form-group">
                <label for="login" class="font-size-h6 font-weight-bolder text-dark">Usuario | Nro. CIP</label>
                <input id="login" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="login"
                       autocomplete="off" value="{{ old('login') }}"/>
                @error('login')
                <p class="text-danger font-weight-bold mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label for="password" class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                </div>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password"
                       name="password" autocomplete="off" id="password"/>
                @error('password')
                <p class="text-danger font-weight-bold mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Ingresar
                </button>
            </div>
        </form>
    </div>
@endsection
