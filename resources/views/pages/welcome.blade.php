<!-- resource/views/pages/welcome.blade.php -->
@extends('layouts.auth.app')

@section('title', '090826 - Auth Slide UI (Light Mode)')

@section('content')
    
    <x-login.overlay />

    <x-login.register-form />

    <x-login.login-form />

@endsection