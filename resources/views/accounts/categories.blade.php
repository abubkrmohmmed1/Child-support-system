@extends('layouts.accounts')

@section('title', 'بنود الحسابات')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        إضافة بند حساب جديد
    </div>
    <x-print-button />
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم الفئة</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">إضافة الفئة</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-secondary text-white">
        قائمة بنود الحسابات
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>اسم الفئة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories ?? [] as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('accounts.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف الفئة؟')">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection