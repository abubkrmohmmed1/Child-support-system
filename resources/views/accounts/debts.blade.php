@extends('layouts.accounts')

@section('title', 'المديونيات والتحصيل')

@section('content')
    <h2 class="mb-4">المديونيات والتحصيل</h2>
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>إجمالي الرسوم</th>
                <th>المدفوع</th>
                <th>المتبقي</th>
                <th>تاريخ آخر دفعة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($debts as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ number_format($row->total_fees,2) }}</td>
                    <td>{{ number_format($row->paid,2) }}</td>
                    <td>{{ number_format($row->remaining,2) }}</td>
                    <td>{{ $row->last_payment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection