<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'نظام دعم الطفل')</title>
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
        .navbar {
            border-radius: 1rem;
            box-shadow: 0 2px 8px #0001;
        }
        .navbar-brand img {
            height: 40px;
            margin-left: 10px;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 2px 8px #0002;
        }
        .card-hover:hover {
            background: #f8f9fa;
            box-shadow: 0 0 10px #b3b3b3;
            transition: 0.2s;
        }
        .btn, .form-control {
            border-radius: 0.75rem;
        }
        th, td {
            vertical-align: middle !important;
        }
        th.table-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        h1 h2 h3{
            text-align: center; /* Center the h2 element */
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
<body dir="rtl">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 no-print">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة" style="height:60px; margin-left:10px;">
                <span class="fw-bold">مركز علقم لتأهيل الإعاقة الذهنية</span>
            </a>
            @auth
            <div class="no-print">
                <div class="no-print"> <!-- Add no-print class here -->
                    <a class="btn btn-outline-primary me-2" href="{{ route('children.index') }}">
                        <i class="bi bi-people"></i> الأطفال
                    </a>
                    <a class="btn btn-outline-secondary me-2" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> لوحة التحكم
                    </a>
                    <a class="btn btn-outline-info me-2" href="{{ route('case-evaluations.index') }}">
                        <i class="bi bi-clipboard-check"></i> تقييم الحالات
                    </a>
                    <a class="btn btn-outline-success me-2" href="{{ route('daily-reports.index') }}">
                        <i class="bi bi-calendar-check"></i> التقارير اليومية
                    </a>
                    <a class="btn btn-outline-dark" href="{{ route('reports.index', ['child_id' => 1]) }}">
                        <i class="bi bi-file-earmark-text"></i> التقارير
                    </a>
                    <a class="btn btn-outline-primary me-2" href="{{ route('letters.index') }}">
                        <i class="bi bi-envelope"></i> الخطابات الرسمية
                    </a>
                    <a class="btn btn-outline-warning me-2" href="{{ route('admin.change-password') }}">
                        <i class="bi bi-key"></i> تغيير كلمة المرور
                    </a>
                <!-- <a class="btn btn-outline-info me-2" href="{{ route('admin.user-activity') }}">
                    <i class="bi bi-people-fill"></i> سجلات المستخدمين
                </a> -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline no-print">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-box-arrow-right"></i> تسجيل خروج
                        </button>
                    </form>
                <!-- Navigation buttons -->
                </div>
            </div>
        </div>
            @endauth
    </nav>
    <div class="container pb-5">
        <!-- Logo and Name for Print -->
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة" style="height:100px;">
            <h2>مركز علقم لتأهيل الإعاقة الذهنية</h2>
        </div>
        @yield('content')
    </div>
</body>
</html>