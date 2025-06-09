@extends('layout.app')

@auth
    @if(auth()->user()->email === 'nahid@gmail.com')
        @section('title', 'سجلات المستخدمين')

        @section('content')
        <div class="container mt-4">
            <h2>سجلات المستخدمين</h2>
            <x-print-button />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>عدد تقييمات الحالات</th>
                        <th>عدد التقارير</th>
                        <th>عدد التقارير اليومية</th>
                        <!-- <th>مدة تسجيل الدخول</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->case_evaluations_count }}</td>
                        <td>{{ $user->reports_count }}</td>
                        <td>{{ $user->daily_reports_count }}</td>
                        <!-- <td>{{ $user->login_duration ?? '-' }}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection
    @else
        <div class="container mt-4">
            <div class="alert alert-danger">ليس لديك صلاحية الوصول إلى هذه الصفحة.</div>
        </div>
    @endif
@endauth