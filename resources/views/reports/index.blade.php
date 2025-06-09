@extends('layout.app')

@section('title', 'تقارير الطفل')

@section('content')
<div class="container mt-4">
    <h2 style="text-align:center;">تقارير الطفل</h2>
    <form method="GET" action="{{ route('reports.index') }}" class="mb-3">
        <div class="row no-print">
            <div class="col-md-4">
                <select name="child_id" class="form-control">
                    <option value="">اختر الطفل</option>
                    @foreach($children as $child)
                        <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="report_type" class="form-control">
                    <option value="">اختر نوع التقرير</option>
                    <option value="daily" {{ request('report_type') == 'daily' ? 'selected' : '' }}>يومي</option>
                    <option value="weekly" {{ request('report_type') == 'weekly' ? 'selected' : '' }}>اسبوعي</option>
                    <option value="monthly" {{ request('report_type') == 'monthly' ? 'selected' : '' }}>شهري</option>
                    <!-- Add more report types as needed -->
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">تصفية</button>
            </div>
        </div>
    </form>
    <x-print-button />
    <!-- Add New Report Button -->
    <div class="mb-3 no-print">
        <a href="{{ route('reports.create') }}" class="btn btn-success">إضافة تقرير جديد</a>
    </div>
    @if($reports->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>اسم الطفل</th>
                    <th>نوع التقرير</th>
                    <th>تاريخ التقرير</th>
                    <th class="print no-print">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{ $report->child->name }}</td>
                    <td>{{ $report->report_type }}</td>
                    <td>{{ $report->report_date }}</td>
                    <td class="print no-print">
                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info btn-sm ">عرض</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reports->links() }}
    @else
        <p>لا توجد تقارير لهذا الطفل.</p>
    @endif
</div>
@endsection
