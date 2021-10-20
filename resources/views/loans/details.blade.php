@extends('..layout.layout')

@section('content')
    <div class="content">
        <div class="notification">
            <p>{{ session('msg') }}</p>
        </div>
        <div class="details">
            <h1>Loan Details</h1>
            <label for="id">ID:</label>
            <p>{{ $loan->id }}</p>
            <label for="loan_amount">Loan Amount:</label>
            <p>{{ $loan->loan_amount }} &#xE3F</p>
            <label for="loan_term">Loan Term:</label>
            <p>{{ $loan->loan_term }} {{ $loan->loan_term == 1 ? 'Year' : 'Years' }}</p>
            <label for="interest_rate">Interest Rate:</label>
            <p>{{ $loan->interest_rate }} %</p>
            <label for="created_at">Created at:</label>
            <p>{{ $loan->created_at }}</p>
            <a href="/main">Back</a>
        </div>
        <div class="repayment">
            <h1>Repayment Schedule</h1>
            <div class="table">
            <table>
                <tr>
                    <th>Payment No.</th>
                    <th>Date</th>
                    <th>Payment Amount</th>
                    <th>Principal</th>
                    <th>Interest</th>
                    <th>Balance</th>
                </tr>
            @for ($i = 0; $i < $loan->loan_term * 12; $i++)
                <tr>
                    <th>{{ $repayTable[$i]['id'] }}</th>
                    <th>{{ $repayTable[$i]['date'] }}</th>
                    <th>{{ $repayTable[$i]['amount'] }}</th>
                    <th>{{ $repayTable[$i]['principal'] }}</th>
                    <th>{{ $repayTable[$i]['interest'] }}</th>
                    <th>{{ $repayTable[$i]['balance'] }}</th>
                </tr>
            @endfor
            </table>
        </div>
    </div>
@endsection
