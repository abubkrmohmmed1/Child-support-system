@extends('layouts.accounts')

@section('title', 'التقارير المالية')

@section('content')
    <h2 class="mb-4">التقارير المالية</h2>
    <form method="GET" action="{{ route('accounts.reports') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="from_date" class="form-label">من تاريخ</label>
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-3">
            <label for="to_date" class="form-label">إلى تاريخ</label>
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-3">
            <label for="category_id" class="form-label">البند</label>
            <select name="category_id" class="form-select">
                <option value="">كل البنود</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="payment_method" class="form-label">طريقة الدفع</label>
            <select name="payment_method" class="form-select">
                <option value="">كل الطرق</option>
                <option value="cash" {{ request('payment_method') == 'cash' ? 'selected' : '' }}>نقداً</option>
                <option value="bank" {{ request('payment_method') == 'bank' ? 'selected' : '' }}>حوالة بنكية</option>
                <option value="installment" {{ request('payment_method') == 'installment' ? 'selected' : '' }}>أقساط</option>
                <option value="check" {{ request('payment_method') == 'check' ? 'selected' : '' }}>شيك</option>
                <option value="other" {{ request('payment_method') == 'other' ? 'selected' : '' }}>أخرى</option>
            </select>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">بحث</button>
            <a href="{{ route('accounts.reports') }}" class="btn btn-secondary">إعادة تعيين</a>
        </div>
    </form>
    <div class="mb-3">
        <a href="{{ route('accounts.reports', array_merge(request()->all(), ['export' => 'pdf'])) }}" class="btn btn-outline-danger no-print">
            <i class="bi bi-file-earmark-pdf"></i> تصدير PDF
        </a>
        <a href="{{ route('accounts.reports', array_merge(request()->all(), ['export' => 'excel'])) }}" class="btn btn-outline-success no-print">
            <i class="bi bi-file-earmark-excel"></i> تصدير Excel
        </a>
        <button onclick="window.print()" class="btn btn-outline-dark no-print">
            <i class="bi bi-printer"></i> طباعة
        </button>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            نتائج التقرير
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>الوصف</th>
                        <th>البند</th>
                        <th>طريقة الدفع</th>
                        <th>المبلغ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $row)
                        <tr>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->category->name ?? '-' }}</td>
                            <td>{{ $row->payment_method }}</td>
                            <td>{{ number_format($row->amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لا توجد بيانات لعرضها.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="table-info">
                        <th colspan="4" class="text-end">الإجمالي</th>
                        <th>{{ number_format($results->sum('amount'), 2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection