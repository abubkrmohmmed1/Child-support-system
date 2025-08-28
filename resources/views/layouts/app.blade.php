<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Child Support System')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container mt-4">
        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="mb-3">
                <a href="{{ asset('resources/views/layouts/app.blade.php') }}" class="btn btn-outline-primary me-2">layouts/app.blade.php</a>
                <a href="{{ asset('resources/views/layout/app.blade.php') }}" class="btn btn-outline-secondary">layout/app.blade.php</a>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>