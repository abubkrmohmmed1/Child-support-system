@extends('layout.app')

@section('content')
<div class="container">
    <h4>إضافة تقرير جديد</h4>
    <x-print-button />

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>اختر الطفل</label>
            <select name="child_id" class="form-control" required>
                @foreach($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label>نوع التقرير</label>
            <select name="report_type" class="form-control" required>
                <option value="daily">يومي</option>
                <option value="weekly">أسبوعي</option>
                <option value="monthly">شهري</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label>تاريخ التقرير</label>
            <input type="date" name="report_date" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>الوضع الصحي</label>
            <textarea name="health_status" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>الوضع التعليمي</label>
            <textarea name="education_status" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>الوضع النفسي</label>
            <textarea name="psychological_status" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>ملاحظات إضافية</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">حفظ</button>
    </form>
</div>
@endsection
