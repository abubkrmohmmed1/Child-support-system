@extends('layouts.accounts')

@section('title', 'المصروفات')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        إضافة مصروف جديد
    </div>
    <x-print-button />
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.expenses.store') }}">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">المبلغ</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">التاريخ</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">الفئة</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success no-print">إضافة المصروف</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-secondary text-white no-print">
        قائمة المصروفات
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>الوصف</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                    <th>الفئة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses ?? [] as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>{{ $expense->category->name ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection