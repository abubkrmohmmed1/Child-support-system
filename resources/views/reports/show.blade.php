@extends('layout.app')

@section('content')
<div class="container">
    <h4>تقرير {{ $report->report_type }} للطفل: {{ $report->child->name }}</h4>
    <x-print-button />

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>التاريخ:</strong> {{ $report->report_date }}</p>
            <p><strong>الحالة الصحية:</strong> {{ $report->health_status }}</p>
            <p><strong>الحالة التعليمية:</strong> {{ $report->education_status }}</p>
            <p><strong>الحالة النفسية:</strong> {{ $report->psychological_status }}</p>
            <p><strong>ملاحظات:</strong> {{ $report->notes }}</p>
        </div>
    </div>

    <a href="{{ route('reports.index', $report->child_id) }}" class="btn btn-secondary mt-3 no-print">رجوع للتقارير</a>
</div>
@endsection
