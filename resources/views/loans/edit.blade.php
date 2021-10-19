@extends('..layout.layout')

@section('content')
    <div class="content">
        <h1>Edit Loan</h1>
        <form action=<?php echo "/edit/$loan->id"; ?> method="POST">
            @csrf
            <label for="loan_amount">Loan Amount:</label>
            <input type="text" name="amount" value={{ $loan->loan_amount }}>
            <label for="loan_term">Loan Term:</label>
            <input type="text" name="term" value={{ $loan->loan_term }}>
            <label for="interest_rate">Interest Rate:</label>
            <input type="text" name="interest" value={{ $loan->interest_rate }}>
            <fieldset>
                <label for="start_date">Start Date:</label>
                <select name="start_date[month]" id="month">
                    <option selected value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="start_date[year]" id="year">
                    <option selected value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </fieldset>
            <input type="submit" value="Update">
            <a href="/main">Back</a>
        </form>
    </div>
@endsection