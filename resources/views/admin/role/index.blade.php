@extends('layouts.app')
@section("content")
    <div class="container">

        <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Roles del Sistema</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold"
                              id="kt_subheader_total">{{ count($roles) }} Total</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <table-roles :roles="{{ $roles }}" :permissions="{{ $permissions }}"></table-roles>
        </div>
    </div>

    <div class="modal fade" id="modal-register-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24"
                                         version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none"
                                           fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>

                                </span>
                                </div>
                                <div class="alert-text">
                                    Los campos (*) son requeridos.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre_rol">Nombre (*)</label>
                            <input id="nombre_rol" type="text" class="form-control form-control-solid" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="description_rol">Descripción (*)</label>
                            <input id="description_rol" type="text" class="form-control form-control-solid"
                                   name="description"/>
                        </div>
                        <div class="form-group">
                            <label>Permisos para este Rol (*): </label>
                            <div class="checkbox-list">
                                @forelse($permissions as $permission)
                                    <label class="checkbox">
                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"/>
                                        <span></span>{{ $permission->description }}</label>
                                @empty
                                    <p class="text-danger font-weight-bold">Sin Registros</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="">
                <input type="hidden" name="id" id="id-role">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24"
                                         version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none"
                                           fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>

                                </span>
                                </div>
                                <div class="alert-text">
                                    Los campos (*) son requeridos.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name-role">Nombre (*)</label>
                            <input id="name-role" type="text" class="form-control form-control-solid" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="description-role">Descripción (*)</label>
                            <input id="description-role" type="text" class="form-control form-control-solid"
                                   name="description"/>
                        </div>
                        <div class="form-group">
                            <label>Permisos para este Rol (*): </label>
                            <div class="checkbox-list">
                                @forelse($permissions as $permission)
                                    <label class="checkbox">
                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"/>
                                        <span></span>{{ $permission->description }}</label>
                                @empty
                                    <p class="text-danger font-weight-bold">Sin Registros</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts_custom')
    <script>
        'use strict';
        const ModuleRoles = function () {
            // const _btnOpenModalRegisterRole = $('#btn-open-modal-register-role')
            // const _btnOpenModalEditRole = $('.btn-open-modal-edit-role')
            // const _modalRegisterRole = $('#modal-register-role')
            // const _modalEditRole = $('#modal-edit-role')
            // const _inputIdRole = $('#id-role')
            // const _inputNameRole = $('#name-role')
            // const _inputDescriptionRole = $('#description-role')
            //
            // _btnOpenModalRegisterRole.on('click', function () {
            //     _modalRegisterRole.modal('show')
            // })
            //
            // _btnOpenModalEditRole.on('click', function () {
            //     _modalEditRole.modal('show')
            //     _inputIdRole.val($(this).data('id'));
            //     _inputNameRole.val($(this).data('name'));
            //     _inputDescriptionRole.val($(this).data('description'));
            // })


            return {
                init: function () {

                }
            }
        }();

        jQuery(document).ready(function () {
            ModuleRoles.init()
        })
    </script>
@endpush
