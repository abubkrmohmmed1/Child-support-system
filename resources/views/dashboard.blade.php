@extends('layout.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container mt-4">
    <!-- Statistics Section -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center h-100 shadow card-hover bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">عدد الأطفال</h5>
                    <p class="card-text display-6">{{ $childrenCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center h-100 shadow card-hover bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title">عدد التقارير</h5>
                    <p class="card-text display-6">{{ $reportsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center h-100 shadow card-hover bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">تقييمات الحالات</h5>
                    <p class="card-text display-6">{{ $caseEvaluationsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center h-100 shadow card-hover bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">التقارير اليومية</h5>
                    <p class="card-text display-6">{{ $dailyReportsCount }}</p>
                </div>
            </div>
        </div>
        <!-- Add more cards for each report type if needed -->
    </div>

    <!-- Navigation Cards Section -->
    <div class="row g-4">
        <div class="col-md-3">
            <a href="{{ route('children.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 shadow card-hover bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">الأطفال</h5>
                        <i class="bi bi-people display-4"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('case-evaluations.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 shadow card-hover bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">تقييم الحالات</h5>
                        <i class="bi bi-clipboard-check display-4"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('daily-reports.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 shadow card-hover bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title">التقارير اليومية</h5>
                        <i class="bi bi-calendar-check display-4"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('reports.index', ['child_id' => 1]) }}" class="text-decoration-none">
                <div class="card text-center h-100 shadow card-hover bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">التقارير</h5>
                        <i class="bi bi-file-earmark-text display-4"></i>
                    </div>
                </div>
            </a>
        </div>
        <!-- Add more cards as needed -->
    </div>
</div>

<!-- Optional: Add some custom CSS for hover effect -->
@push('styles')
<style>
.card-hover:hover {
    background: #f8f9fa;
    box-shadow: 0 0 10px #b3b3b3;
    transition: 0.2s;
}
</style>
@endpush
@endsection
