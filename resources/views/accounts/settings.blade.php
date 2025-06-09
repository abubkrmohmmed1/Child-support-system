@extends('layouts.accounts')

@section('title', 'الإعدادات')

@section('content')
<div class="container">
    <h2 class="mb-4">الإعدادات</h2>
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <!-- القسم الأول: بيانات المؤسسة -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">بيانات المؤسسة</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="institution_name" class="form-label">اسم المؤسسة</label>
                    <input type="text" name="institution_name" id="institution_name" class="form-control" value="{{ old('institution_name', $settings->institution_name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="institution_logo" class="form-label">الشعار</label>
                    <input type="file" name="institution_logo" id="institution_logo" class="form-control">
                    @if(!empty($settings->institution_logo))
                        <img src="{{ asset('storage/' . $settings->institution_logo) }}" alt="الشعار" style="max-height: 60px; margin-top: 10px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="manager_name" class="form-label">المدير العام</label>
                    <input type="text" name="manager_name" id="manager_name" class="form-control" value="{{ old('manager_name', $settings->manager_name ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $settings->phone ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $settings->email ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $settings->address ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">نبذة عن المؤسسة</label>
                    <textarea name="about" id="about" class="form-control">{{ old('about', $settings->about ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- القسم الثاني: الإعدادات العامة -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">الإعدادات العامة</div>
            <div class="card-body">
                <!-- Removed Night/Day Mode Setting -->
                <div class="mb-3">
                    <label for="default_language" class="form-label">اللغة الافتراضية</label>
                    <select name="default_language" id="default_language" class="form-select">
                        <option value="ar" {{ (old('default_language', $settings->default_language ?? '') == 'ar') ? 'selected' : '' }}>عربية</option>
                        <option value="en" {{ (old('default_language', $settings->default_language ?? '') == 'en') ? 'selected' : '' }}>إنجليزية</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="current_academic_year" class="form-label">اسم السنة الدراسية الحالية</label>
                    <input type="text" name="current_academic_year" id="current_academic_year" class="form-control" value="{{ old('current_academic_year', $settings->current_academic_year ?? '') }}">
                </div>
                <div class="mb-3">
                    <label for="currency" class="form-label">العملة</label>
                    <input type="text" name="currency" id="currency" class="form-control" value="{{ old('currency', $settings->currency ?? '') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">حفظ الإعدادات</button>
    </form>
</div>
@endsection