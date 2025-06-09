<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'الحسابات')</title>
    <link href="{{ asset('bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }
        .navbar-brand img {
            height: 40px;
            margin-left: 10px;
        }
        .institution-name {
            font-weight: bold;
            font-size: 1.2rem;
            color: #0d6efd;
            margin-right: 10px;
        }
        .card-custom {
            background: linear-gradient(135deg, #e3f0ff 0%, #f9f9f9 100%);
            border: 1px solid #b6d4fe;
        }
        .navbar-nav .nav-item {
            margin-right: 15px; /* Add equal spacing between each nav item */
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: #fff !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة" style="height:60px; margin-left:10px;">
                <span class="fw-bold">مركز علقم لتأهيل الإعاقة الذهنية</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAccounts" aria-controls="navbarAccounts" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse no-print" id="navbarAccounts">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item no-print"><a href="{{ route('accounts.dashboard') }}" style="color: #0d6efd;">الرئيسية</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.revenues') }}" style="color: #0d6efd;">الإيرادات</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.expenses') }}" style="color: #28a745;">المصروفات</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.categories') }}" style="color: #ffc107;">بنود الحسابات</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.accounts') }}" style="color: #17a2b8;">طرق الدفع</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.reports') }}" style="color: #6c757d;">التقارير المالية</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.closing') }}" style="color: #dc3545;">ترحيل الحسابات الختامية</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.filters') }}" style="color: #343a40;">فلاتر واستعلامات</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.budget') }}" style="color: #f8f9fa;">تقرير الميزانية</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.debts') }}" style="color: #ffc107;">المديونيات والتحصيل</a></li>
                    <li class="nav-item no-print"><a href="{{ route('accounts.settings') }}" style="color: #17a2b8;">الإعدادات</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link p-0 no-print" style="display:inline; cursor:pointer; color: #0d6efd;">تسجيل الخروج</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>