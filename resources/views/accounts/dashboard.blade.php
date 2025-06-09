@extends('layouts.accounts')

@section('title', 'لوحة الحسابات')

@section('content')
    <h2 class="mb-4">مرحباً بك في لوحة الحسابات</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.revenues') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">الإيرادات</h5>
                        <p class="card-text">إدارة الإيرادات المرتبطة بالأطفال.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.expenses') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">المصروفات</h5>
                        <p class="card-text">إدارة المصروفات.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.categories') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">بنود الحسابات</h5>
                        <p class="card-text">إعداد بنود الحسابات.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.accounts') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-info text-dark">
                    <div class="card-body">
                        <h5 class="card-title">طرق الدفع</h5>
                        <p class="card-text">ادارة طرق الدفع</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- New feature cards -->
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.reports') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-secondary text-white">
                    <div class="card-body">
                        <h5 class="card-title">التقارير المالية</h5>
                        <p class="card-text">عرض وتحليل التقارير المالية.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.closing') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">ترحيل الحسابات الختامية</h5>
                        <p class="card-text">نقل الأرصدة وترصيد الفترات السابقة.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.filters') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">فلاتر واستعلامات</h5>
                        <p class="card-text">بحث وتصفية متقدمة للبيانات.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.budget') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title">تقرير الميزانية</h5>
                        <p class="card-text">تحليل الميزانية والتجاوزات.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.debts') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">المديونيات والتحصيل</h5>
                        <p class="card-text">متابعة المتأخرات وجدولة السداد.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('accounts.settings') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm h-100 bg-info text-dark">
                    <div class="card-body">
                        <h5 class="card-title">الإعدادات</h5>
                        <p class="card-text">إدارة الإعدادات العامة للنظام.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection