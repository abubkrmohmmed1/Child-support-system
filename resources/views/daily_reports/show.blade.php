@extends('layout.app')

@section('content')
<div class="container">
    <h3>تفاصيل التقرير اليومي</h3>
    <x-print-button />

    <div class="card">
        <div class="card-body">
            <p><strong>اسم الطفل:</strong> {{ $report->child->name }}</p>
            <p><strong>تاريخ التقرير:</strong> {{ $report->report_date }}</p>
            <p><strong>اليوم:</strong> {{ $report->day }}</p>
            <p><strong>وقت الحضور:</strong> {{ $report->check_in }}</p>
            <p><strong>وقت الانصراف:</strong> {{ $report->check_out }}</p>
            <p><strong>حدثت مشكلة:</strong> {{ $report->had_issue ? 'نعم' : 'لا' }}</p>
            <p><strong>وصف المشكلة:</strong> {{ $report->issue_description }}</p>
            <p><strong>الإجراء المتخذ:</strong> {{ $report->issue_resolution }}</p>
            <p><strong>عدد الجلسات:</strong> {{ $report->sessions_count }}</p>
            <p><strong>عدد الحضور:</strong> {{ $report->attendees_count }}</p>
            <p><strong>عدد الغياب:</strong> {{ $report->absentees_count }}</p>
            <p><strong>يوجد دراسة حالة:</strong> {{ $report->has_case_study ? 'نعم' : 'لا' }}</p>
            <p><strong>عدد دراسات الحالة:</strong> {{ $report->case_studies_count }}</p>
            <p><strong>عدد الغياب بالفصل:</strong> {{ $report->class_absentees_count }}</p>
            <p><strong>الحالة النفسية لولي الأمر:</strong> {{ $report->parent_psych_status }}</p>
            <p><strong>طريقة استقبال الطفل:</strong> {{ $report->child_reception }}</p>
            <p><strong>ملاحظات إضافية:</strong> {{ $report->notes }}</p>
        </div>
    </div>

    <a href="{{ route('daily-reports.edit', $report->id) }}" class="btn btn-warning mt-3 no-print">تعديل</a>
    <a href="{{ route('daily-reports.index') }}" class="btn btn-secondary mt-3 no-print">العودة</a>
</div>
@endsection
