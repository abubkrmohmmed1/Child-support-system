@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>تفاصيل الطفل: {{ $child->name }}</h2>
    <x-print-button />
    <ul class="list-group">
        <li class="list-group-item"><strong>تاريخ الميلاد:</strong> {{ $child->birth_date }}</li>
        <li class="list-group-item"><strong>النوع:</strong> {{ $child->gender }}</li>
        <li class="list-group-item"><strong>تم تسجيله في:</strong> {{ $child->created_at->format('Y-m-d') }}</li>
    </ul>

    <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning mt-3">تعديل</a>
    <form action="{{ route('children.destroy', $child->id) }}" method="POST" class="d-inline-block mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
    </form>

    <a href="{{ route('children.index') }}" class="btn btn-secondary mt-3">رجوع</a>
</div>
@endsection
