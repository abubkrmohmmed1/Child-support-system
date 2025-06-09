@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">تسجيل طفل جديد</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('children.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم الطفل</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">تاريخ الميلاد</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date">
            @error('birth_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">النوع</label>
            <select class="form-control" id="gender" name="gender">
                <option value="">اختر</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
