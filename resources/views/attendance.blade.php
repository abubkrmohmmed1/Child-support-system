@extends('layout.app')

@section('title', 'سجل الحضور')

@section('content')
<div class="container mt-4">
    <x-print-button />
    <h2 style="text-align:center;">سجل حضور الأطفال</h2>

    <!-- Toggle Buttons -->
    <div class="mb-4">
        <button class="btn btn-primary no-print" onclick="showSection('view')" >عرض الحضور</button>
        <button class="btn btn-secondary no-print" onclick="showSection('input')">إدخال الحضور</button>
    </div>

    <!-- View Attendance Section -->
    <div id="view-section" class="section">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 200px;">اسم الطفل</th> <!-- Added style to increase width -->
                    @for ($i = 0; $i < 3; $i++)
                        <th colspan="3">اليوم {{ $i + 1 }}</th>
                    @endfor
                </tr>
                <tr>
                    @for ($i = 0; $i < 3; $i++)
                        <th>زمن الحضور</th>
                        <th>زمن الانصراف</th>
                        <th>التوقيع</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($children as $child)
                <tr>
                    <td>{{ $child->name }}</td>
                    @for ($i = 0; $i < 3; $i++)
                        <td></td> <!-- Blank for check-in -->
                        <td></td> <!-- Blank for check-out -->
                        <td></td> <!-- Blank for signature -->
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Input Attendance Section -->
    <div id="input-section" class="section" style="display: none;">
        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="text" name="child_name" class="form-control" placeholder="اسم الطفل" required>
                </div>
                <div class="col-md-3">
                    <input type="time" name="check_in" class="form-control" placeholder="زمن الحضور" required>
                </div>
                <div class="col-md-3">
                    <input type="time" name="check_out" class="form-control" placeholder="زمن الانصراف" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="signature" class="form-control" placeholder="التوقيع" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">إضافة الحضور</button>
        </form>
    </div>
</div>

<script>
    function showSection(section) {
        document.getElementById('view-section').style.display = section === 'view' ? 'block' : 'none';
        document.getElementById('input-section').style.display = section === 'input' ? 'block' : 'none';
    }
</script>
@endsection