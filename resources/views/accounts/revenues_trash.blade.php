@extends('layouts.accounts')

@section('title', 'المحذوفات - الإيرادات')

@section('content')
    <h2>الإيرادات المحذوفة</h2>
    <x-print-button />
    <table class="table table-striped">
        <thead>
            <tr>
                <th>الطفل</th>
                <th>الوصف</th>
                <th>المبلغ</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenues as $revenue)
                <tr>
                    <td>{{ $revenue->child->name ?? '' }}</td>
                    <td>{{ $revenue->description }}</td>
                    <td>{{ $revenue->amount }}</td>
                    <td>{{ $revenue->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('accounts.revenues') }}" class="btn btn-primary">رجوع</a>
@endsection