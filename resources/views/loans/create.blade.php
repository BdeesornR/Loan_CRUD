@extends('..layout.layout')

@section('content')
    <div class="content">
        <h1>Create Loan</h1>
        <form action="/create" method="POST">
            @csrf
            <label for="loan_amount">Loan Amount:</label>
            <!-- cannot specify maximum length on number input -->
            <input type="number" name="amount" min="0" maxlength="12" placeholder="example: 10,000,000.00" required>
            <label for="loan_term">Loan Term:</label>
            <!-- min and max attributes only affect the data submitted -->
            <input type="number" name="term" min="1" placeholder="example: 10" required>
            <label for="interest_rate">Interest Rate:</label>
            <input type="number" name="interest" min="0" max="100" placeholder="example: 10" required>
            <fieldset>
                <label for="start_date">Start Date:</label>
                <select name="start_date[month]" id="month" required>
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
                <select name="start_date[year]" id="year" required>
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
            <input type="submit" value="Create">
            <a href="/main">Back</a>
        </form>
    </div>
@endsection
