@extends('layout.app')

@section('title', 'قائمة الأطفال')

@section('content')
<div class="container mt-4">
    <h2 style="text-align:center;">قائمة الأطفال</h2>
    <x-print-button />
    <a href="{{ route('children.create') }}" class="btn btn-success mb-3 no-print">إضافة طفل جديد</a>
    @if($children->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>تاريخ الميلاد</th>
                    <th>النوع</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($children as $child)
                <tr>
                    <td>{{ $child->name }}</td>
                    <td>{{ $child->birth_date }}</td>
                    <td>{{ $child->gender }}</td>
                    <td>
                        <a href="{{ route('children.show', $child->id) }}" class="btn btn-info btn-sm no-print">عرض</a>
                        <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning btn-sm no-print">تعديل</a>
                        <form action="{{ route('children.destroy', $child->id) }}" method="POST" class="d-inline no-print">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm no-print" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $children->links() }}
    @else
        <p>لا يوجد أطفال مسجلين.</p>
    @endif
</div>
@endsection
