@extends('layout.app')

@section('title', 'تعديل الخطاب الرسمي')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">تعديل الخطاب الرسمي</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('letters.update', $letter->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">التاريخ <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" 
                                           id="date" name="date" value="{{ old('date', $letter->date) }}" required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="letter_number" class="form-label">رقم الخطاب <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('letter_number') is-invalid @enderror" 
                                           id="letter_number" name="letter_number" value="{{ old('letter_number', $letter->letter_number) }}" 
                                           placeholder="مثال: 001/2024" required>
                                    @error('letter_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="recipient" class="form-label">المستلم <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('recipient') is-invalid @enderror" 
                                   id="recipient" name="recipient" value="{{ old('recipient', $letter->recipient) }}" 
                                   placeholder="اسم الجهة أو الشخص المستلم" required>
                            @error('recipient')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">الموضوع <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject', $letter->subject) }}" 
                                   placeholder="موضوع الخطاب" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">نص الخطاب <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('body') is-invalid @enderror" 
                                      id="body" name="body" rows="8" required 
                                      placeholder="اكتب نص الخطاب هنا...">{{ old('body', $letter->body) }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="signature" class="form-label">التوقيع <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('signature') is-invalid @enderror" 
                                   id="signature" name="signature" value="{{ old('signature', $letter->signature) }}" required>
                            @error('signature')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('letters.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> العودة
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> تحديث الخطاب
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection