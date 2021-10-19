@extends('..layout.layout')

<?php
    use Carbon\Carbon;

    $GLOBALS['balance'] = $loan->loan_amount;
    $GLOBALS['rate'] = ($loan->interest_rate/100)/12;
    $term = $loan->loan_term;
    $GLOBALS['amount'] = ($GLOBALS['balance']*$GLOBALS['rate'])/(1-((1+$GLOBALS['rate'])**((-12)*$term)));
    $GLOBALS['principal'] = 0;
    $GLOBALS['interest'] = 0;

    $dt = Carbon::parse($loan->start_date);

    function calPayment() {
        $GLOBALS['interest'] = $GLOBALS['rate']*$GLOBALS['balance'];
        $GLOBALS['principal'] = $GLOBALS['amount']-$GLOBALS['interest'];
        return round($GLOBALS['amount'], 2);
    }

    function calBalance() {
        $bal = $GLOBALS['balance']-$GLOBALS['principal'];
        $GLOBALS['balance'] = $bal;
        return abs(round($GLOBALS['balance'], 2));
    }
?>

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
                    <th><?php echo $i+1; ?></th>
                    <th><?php echo $dt->addMonth()->monthName." ".$dtYear = $dt->year; ?></th>
                    <th><?php echo calPayment(); ?></th>
                    <th><?php echo round($GLOBALS['principal'], 2) ?></th>
                    <th><?php echo round($GLOBALS['interest'], 2) ?></th>
                    <th><?php echo calBalance(); ?></th>
                </tr>
            @endfor
            </table>
        </div>
    </div>
@endsection