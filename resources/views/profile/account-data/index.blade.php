@extends('layouts.app')
@section("nombre_modulo","PERFIL DE USUARIO")
@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-row">
                @include('layouts.common.menu-data-profile')

                <div class="flex-row-fluid ml-lg-8">

                    <div class="card card-custom card-stretch">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Configuración de la cuenta</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Administra tus contraseñas, preferencias de inicio de sesión y métodos de recuperación.</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row mb-6">
                                    <div class="col-lg-12 col-xl-12">
                                        <h5 class="font-weight-bold">Datos de inicio de sesión</h5>
                                        <span class="text-muted font-weight-bold font-size-sm">Comunícate con los administradores del sistema para modificar los siguientes datos de inicio de sesión.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usuario_nombre" class="col-xl-3 col-lg-3 col-form-label">Usuario</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input id="usuario_nombre" class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->usuario_nombre }}" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idusuarios" class="col-xl-3 col-lg-3 col-form-label">Nro. CIP</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input id="idusuarios" class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->idusuarios }}" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row mb-6">
                                    <div class="col-lg-12 col-xl-12">
                                        <h5 class="font-weight-bold">Cambiar Contraseña</h5>
                                        <span class="text-muted font-weight-bold font-size-sm">La contraseña debe tener al menos seis caracteres e incluir una combinación de números, letras y caracteres especiales (!$@%).</span>
                                    </div>
                                </div>
                                <form action="#" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="current-password" class="col-xl-3 col-lg-3 col-form-label">Contraseña Actual</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input id="current-password" class="form-control form-control-lg form-control-solid" type="password" placeholder="Contraseña actual"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new-password" class="col-xl-3 col-lg-3 col-form-label">Contraseña</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input id="new-password" class="form-control form-control-lg form-control-solid" type="password" placeholder="Contraseña nueva"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirm-password" class="col-xl-3 col-lg-3 col-form-label">Confirmar Contraseña</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input id="confirm-password" class="form-control form-control-lg form-control-solid" type="password" placeholder="Repetir contraseña nueva"/>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <button type="submit" class="btn btn-success mr-2">Guardar Cambios</button>
                                        <button type="reset" class="btn btn-secondary">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
