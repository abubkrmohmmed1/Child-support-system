@extends('layouts.accounts')

@section('title', 'تقرير الميزانية')

@section('content')
    <h2 class="mb-4">تقرير الميزانية</h2>
    <table class="table">
        <thead>
            <tr>
                <th>البند</th>
                <th>الميزانية التقديرية</th>
                <th>الصرف الفعلي</th>
                <th>الفرق</th>
                <th>النسبة %</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->category }}</td>
                    <td>{{ number_format($row->expected,2) }}</td>
                    <td>{{ number_format($row->actual,2) }}</td>
                    <td>{{ number_format($row->diff,2) }}</td>
                    <td>{{ number_format($row->percent,2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection