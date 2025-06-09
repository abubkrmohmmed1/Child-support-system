@extends('layouts.accounts')

@section('title', 'فلاتر واستعلامات')

@section('content')
    <h2 class="mb-4">فلاتر واستعلامات</h2>
    <form method="GET" action="{{ route('accounts.filters') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>من تاريخ</label>
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-3">
            <label>إلى تاريخ</label>
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-3">
            <label>نوع العملية</label>
            <select name="type" class="form-select">
                <option value="">الكل</option>
                <option value="revenue" {{ request('type')=='revenue'?'selected':'' }}>إيراد</option>
                <option value="expense" {{ request('type')=='expense'?'selected':'' }}>مصروف</option>
            </select>
        </div>
        <div class="col-md-3">
            <label>الحساب</label>
            <select name="account_id" class="form-select">
                <option value="">الكل</option>
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}" {{ request('account_id')==$account->id?'selected':'' }}>{{ $account->account_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>التاريخ</th><th>الوصف</th><th>النوع</th><th>الحساب</th><th>المبلغ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
                <tr>
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->account->account_name ?? '-' }}</td>
                    <td>{{ number_format($row->amount,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection