@extends('layout.app')

@section('title', 'تغيير كلمة المرور')

@section('content')
<div class="container mt-4">
    <h2>تغيير كلمة المرور</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.change-password') }}">
        
        <div class="mb-3">
            <label for="password" class="form-label">كلمة المرور الجديدة</label>
            <input type="password" name="password" class="form-control" required minlength="5">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control" required minlength="8">
        </div>
        <button type="submit" class="btn btn-primary">تغيير</button>
    </form>
</div>
@endsection
