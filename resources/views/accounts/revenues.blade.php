@extends('layouts.accounts')


@section('title', 'الإيرادات')

@section('content')
<!-- شاشة ادخال للحسابات (مثال: نافذة منبثقة أو قسم أعلى الصفحة) -->
{{-- تم نقل شاشة إدخال بيانات الحسابات إلى ملف منفصل --}}
<!-- نهاية الجزء المنقول -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        إضافة إيراد جديد
    </div>
    <x-print-button />
    <div class="card-body">
        <form method="POST" action="{{ route('accounts.revenues.store') }}">
            @csrf
            <div class="mb-3">
                <label for="child_id" class="form-label">الطفل</label>
                <select name="child_id" class="form-select" required>
                    @foreach($children ?? [] as $child)
                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">البند</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">طريقة الدفع</label>
                <select name="payment_method" id="payment_method" class="form-select" required onchange="togglePaymentFields()">
                    <option value="">اختر طريقة الدفع</option>
                    <option value="cash">نقداً</option>
                    <option value="bank">حوالة بنكية</option>
                    <option value="installment">أقساط</option>
                    <option value="check">شيك</option>
                    <option value="other">أخرى</option>
                </select>
            </div>
            <!-- Bank fields -->
            <div id="bank_fields" style="display:none;">
                <div class="mb-3">
                    <label for="bank_name" class="form-label">اسم البنك</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="bank_account" class="form-label">رقم الحساب البنكي</label>
                    <input type="text" name="bank_account" id="bank_account" class="form-control">
                </div>
            </div>
            <!-- Installment fields -->
            <div id="installment_fields" style="display:none;">
                <div class="mb-3">
                    <label for="installment_count" class="form-label">عدد الأقساط</label>
                    <input type="number" name="installment_count" id="installment_count" class="form-control" min="1">
                </div>
                <div class="mb-3">
                    <label for="installment_value" class="form-label">قيمة القسط</label>
                    <input type="number" name="installment_value" id="installment_value" class="form-control" min="1">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">المبلغ</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">التاريخ</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success no-print">إضافة الإيراد</button>
        </form>
    </div>
</div>
<script>
function togglePaymentFields() {
    var method = document.getElementById('payment_method').value;
    document.getElementById('bank_fields').style.display = (method === 'bank') ? 'block' : 'none';
    document.getElementById('installment_fields').style.display = (method === 'installment') ? 'block' : 'none';
}
</script>

<div class="card no-print">
    <div class="card-header bg-secondary text-white">
        قائمة الإيرادات
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>الطفل</th>
                    <th>الوصف</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($revenues ?? [] as $revenue)
                    <tr>
                        <td>{{ $revenue->child->name ?? '' }}</td>
                        <td>{{ $revenue->description }}</td>
                        <td>{{ $revenue->amount }}</td>
                        <td>{{ $revenue->date }}</td>
                        <td>
                            <form action="{{ route('accounts.revenues.destroy', $revenue->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف الإيراد؟')">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<a href="{{ route('accounts.revenues.trash') }}" class="btn btn-outline-secondary mb-3 no-print">
    <i class="bi bi-trash"></i> المحذوفات
</a>
@endsection