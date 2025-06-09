@extends('layouts.accounts')

@section('title', 'إدارة الحسابات')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-info text-white">
        شاشة إدخال بيانات الحسابات
    </div>
    <x-print-button />
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.accounts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="account_name" class="form-label">اسم الحساب</label>
                <input type="text" name="account_name" id="account_name" class="form-control" placeholder="ادخل اسم الحساب">
            </div>
            <div class="mb-3">
                <label for="account_number" class="form-label">رقم الحساب</label>
                <input type="text" name="account_number" id="account_number" class="form-control" placeholder="ادخل رقم الحساب">
            </div>
            <div class="mb-3">
                <label for="method" class="form-label">طريقة الدفع</label>
                <select name="method" id="method" class="form-select" required>
                    <option value="">اختر طريقة الدفع</option>
                    <option value="cash">نقداً</option>
                    <option value="bank">حوالة بنكية</option>
                    <option value="installment">أقساط</option>
                    <option value="check">شيك</option>
                    <option value="other">أخرى</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="balance" class="form-label">الرصيد</label>
                <input type="number" name="balance" id="balance" class="form-control" value="0" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">حفظ بيانات الحساب</button>
        </form>
    </div>
</div>
@endsection