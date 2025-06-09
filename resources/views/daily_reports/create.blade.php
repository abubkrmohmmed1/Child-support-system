@extends('layout.app')

@section('content')
<div class="container">
    <h3>إدخال تقرير يومي</h3>
    <x-print-button />
    <form action="{{ route('daily-reports.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>اختر الطفل</label>
            <select name="child_id" class="form-control" required>
                @foreach($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>تاريخ التقرير</label>
            <input type="date" name="report_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>اليوم</label>
            <input type="text" name="day" class="form-control" placeholder="مثلاً: الأحد" required>
        </div>

        <div class="form-group">
            <label>وقت الحضور</label>
            <input type="time" name="check_in" class="form-control">
        </div>

        <div class="form-group">
            <label>وقت الانصراف</label>
            <input type="time" name="check_out" class="form-control">
        </div>

        <div class="form-check">
            <input type="checkbox" name="had_issue" value="1" class="form-check-input" id="had_issue">
            <label class="form-check-label" for="had_issue">حدثت مشكلة</label>
        </div>

        <div class="form-group">
            <label>وصف المشكلة</label>
            <textarea name="issue_description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>الإجراء المتخذ</label>
            <textarea name="issue_resolution" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>عدد الجلسات</label>
            <input type="number" name="sessions_count" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>عدد الحضور</label>
            <input type="number" name="attendees_count" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>عدد الغياب</label>
            <input type="number" name="absentees_count" class="form-control" value="0">
        </div>

        <div class="form-check">
            <input type="checkbox" name="has_case_study" value="1" class="form-check-input" id="has_case_study">
            <label class="form-check-label" for="has_case_study">يوجد دراسة حالة</label>
        </div>

        <div class="form-group">
            <label>عدد دراسات الحالة</label>
            <input type="number" name="case_studies_count" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>عدد الغياب بالفصل</label>
            <input type="number" name="class_absentees_count" class="form-control" value="0">
        </div>

        <div class="form-group">
            <label>الحالة النفسية لولي الأمر</label>
            <input type="text" name="parent_psych_status" class="form-control">
        </div>

        <div class="form-group">
            <label>طريقة استقبال الطفل</label>
            <input type="text" name="child_reception" class="form-control">
        </div>

        <div class="form-group">
            <label>ملاحظات إضافية</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">حفظ التقرير</button>
    </form>
</div>
@endsection
