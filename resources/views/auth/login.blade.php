@extends('layout.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4 text-center">تسجيل الدخول</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">دخول</button>
        </form>
        <div class="mt-3 text-center">
            <a href="{{ route('register') }}" class="btn btn-link">مستخدم جديد؟ سجل الآن</a>
        </div>
        <div class="mt-3 text-center">
            <a href="{{ url('/') }}">العودة للصفحة الرئيسية</a>
        </div>
    </div>
</div>
@endsection
