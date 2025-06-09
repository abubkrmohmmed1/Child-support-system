@extends('layouts.accounts')

@section('title', 'ترحيل الحسابات الختامية')

@section('content')
    <h2 class="mb-4">ترحيل الحسابات الختامية</h2>
    <form method="POST" action="{{ route('accounts.closePeriod') }}">
        @csrf
        <button type="submit" class="btn btn-danger" {{ !$currentPeriod ? 'disabled' : '' }}>إغلاق الفترة المالية الحالية</button>
    </form>
    <hr>
    <h4>أرصدة الحسابات للفترة الحالية</h4>
    <table class="table">
        <thead>
            <tr><th>الحساب</th><th>الرصيد</th></tr>
        </thead>
        <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->account_name }}</td>
                    <td>{{ number_format($balances[$account->id] ?? 0, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection