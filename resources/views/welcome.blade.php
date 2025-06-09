@extends('layout.app')

@section('title', 'مرحباً بك')

@section('content')
    <div class="text-center">
        <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة" style="height:100px;">
        <a href="{{ route('login') }}" class="btn btn-primary mt-4">تسجيل الدخول</a>
        {{ __('messages.welcome') }}
    </div>
@endsection