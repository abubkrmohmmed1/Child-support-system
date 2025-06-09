@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>تعديل بيانات الطفل: {{ $child->name }}</h2>

    <form action="{{ route('children.update', $child->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">اسم الطفل</label>
            <input type="text" name="name" class="form-control" value="{{ $child->name }}" required>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">تاريخ الميلاد</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $child->birth_date }}" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">النوع</label>
            <select name="gender" class="form-control" required>
                <option value="ذكر" {{ $child->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                <option value="أنثى" {{ $child->gender == 'أنثى' ? 'selected' : '' }}>أنثى</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('children.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
