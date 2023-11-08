@extends('layouts.app')
@section("content")
    <div class="container">

        <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Permisos del Sistema</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <table-permissions></table-permissions>
        </div>
    </div>
@endsection
