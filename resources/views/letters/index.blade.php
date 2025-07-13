@extends('layout.app')

@section('title', 'الخطابات الرسمية')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">الخطابات الرسمية</h4>
                    <a href="{{ route('letters.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> إنشاء خطاب جديد
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($letters->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>رقم الخطاب</th>
                                        <th>التاريخ</th>
                                        <th>المستلم</th>
                                        <th>الموضوع</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($letters as $letter)
                                        <tr>
                                            <td>{{ $letter->letter_number }}</td>
                                            <td>{{ $letter->date }}</td>
                                            <td>{{ $letter->recipient }}</td>
                                            <td>{{ Str::limit($letter->subject, 50) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-sm btn-outline-info">
                                                        <i class="bi bi-eye"></i> عرض
                                                    </a>
                                                    <a href="{{ route('letters.edit', $letter->id) }}" class="btn btn-sm btn-outline-warning">
                                                        <i class="bi bi-pencil"></i> تحرير
                                                    </a>
                                                    <a href="{{ route('letters.print', $letter->id) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                                        <i class="bi bi-printer"></i> طباعة
                                                    </a>
                                                    <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الخطاب؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #6c757d;"></i>
                            <h5 class="mt-3 text-muted">لا توجد خطابات</h5>
                            <p class="text-muted">ابدأ بإنشاء خطاب رسمي جديد</p>
                            <a href="{{ route('letters.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> إنشاء خطاب جديد
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection