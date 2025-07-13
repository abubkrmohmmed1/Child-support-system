@extends('layout.app')

@section('title', 'عرض الخطاب')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">تفاصيل الخطاب</h4>
                    <div class="btn-group">
                        <a href="{{ route('letters.edit', $letter->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> تحرير
                        </a>
                        <a href="{{ route('letters.print', $letter->id) }}" class="btn btn-success" target="_blank">
                            <i class="bi bi-printer"></i> طباعة
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>التاريخ:</strong>
                            <p>{{ $letter->date }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>رقم الخطاب:</strong>
                            <p>{{ $letter->letter_number }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>المستلم:</strong>
                        <p>{{ $letter->recipient }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>الموضوع:</strong>
                        <p>{{ $letter->subject }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>نص الخطاب:</strong>
                        <div class="border p-3 bg-light rounded">
                            {!! nl2br(e($letter->body)) !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>التوقيع:</strong>
                        <p>{{ $letter->signature }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('letters.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> العودة للقائمة
                        </a>
                        <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الخطاب؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> حذف الخطاب
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection