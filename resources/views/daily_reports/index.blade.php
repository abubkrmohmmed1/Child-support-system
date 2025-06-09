@extends('layout.app')

@section('content')
<div class="container">
    <h3 style="text-align:center;">قائمة التقارير اليومية</h3>
    <x-print-button />

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('daily-reports.create') }}" class="btn btn-primary mb-3 no-print">إضافة تقرير جديد</a>
    <!-- <div class="col-md-4">
                <select name="child_id" class="form-control">
                    <option value="">اختر الطفل</option>
                    @foreach($children as $child)
                        <option value="{{ $child->id }}" {{ request('child_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">تصفية</button>
            </div> -->

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>الطفل</th>
                <th>التاريخ</th>
                <th>اليوم</th>
                <th>جلسات</th>
                <th>حضور</th>
                <th>غياب</th>
                <th class="print no-print">خيارات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
                <tr>
                    <td>{{ $report->child->name }}</td>
                    <td>{{ $report->report_date }}</td>
                    <td>{{ $report->day }}</td>
                    <td>{{ $report->sessions_count }}</td>
                    <td>{{ $report->attendees_count }}</td>
                    <td>{{ $report->absentees_count }}</td>
                    <td>
                        <a href="{{ route('daily-reports.show', $report->id) }}" class="btn btn-info btn-sm no-print">عرض</a>
                        <a href="{{ route('daily-reports.edit', $report->id) }}" class="btn btn-warning btn-sm no-print">تعديل</a>
                        <form action="{{ route('daily-reports.destroy', $report->id) }}" method="POST" class="d-inline-block no-print">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="btn btn-danger btn-sm no-print">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">لا توجد تقارير مسجلة.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $reports->links() }}
</div>
@endsection
