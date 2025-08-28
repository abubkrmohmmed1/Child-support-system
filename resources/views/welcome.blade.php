@extends('layout.app')

@section('title', 'مرحباً بك')

@section('content')
    <div class="text-center">
        <p>{{ __('messages.welcome') }}</p>
        <a href="{{ route('login') }}" class="btn btn-primary mt-3">تسجيل الدخول</a>
    </div>
@endsection
