@extends('layout.app')

@section('title', 'كل تقييمات الحالات')

@section('content')
<div class="container">
    <h3 style="text-align:center;">كل تقييمات الحالات</h3>
    <form method="GET" action="{{ route('case-evaluations.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="child_id" class="form-control no-print">
                    <option value="">اختر الطفل</option>
                    @foreach($children as $child)
                        <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary no-print">تصفية</button>
            </div>
        </div>
    </form>
    <a href="{{ route('case-evaluations.create') }}" class="btn btn-primary mb-3 no-print">
        إضافة تقييم جديد
    </a>
    <x-print-button />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>اسم الطفل</th>
                <th>الفصل</th>
                <th>تاريخ التقييم</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->child->name ?? '-' }}</td>
                    <td>{{ $evaluation->class ?? '-' }}</td>
                    <td>{{ $evaluation->created_at ? $evaluation->created_at->format('Y-m-d') : '-' }}</td>
                    <td>
                        <a href="{{ route('case-evaluations.show', $evaluation->id) }}" class="btn btn-info btn-sm">عرض</a>
                        <a href="{{ route('case-evaluations.edit', $evaluation->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">لا توجد تقييمات حتى الآن.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $evaluations->links() }}
</div>
@endsection