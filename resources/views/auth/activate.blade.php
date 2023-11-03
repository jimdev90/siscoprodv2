@extends('layouts.app-auth')
@push('styles_custom')
    <link href="{{ asset('assets/css/pages/login/login-2.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <activate-user></activate-user>
@endsection
