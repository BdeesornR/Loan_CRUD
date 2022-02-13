@extends('..layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1 class="m-0">Edit Loan</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('modify', $loan->id) }}" method="POST">
                            @csrf
                            <div class="row justify-content-center align-items-center mb-2">
                                <div class="col-2 text-end pe-4">
                                    <label for="loan_amount" class="form-label m-0">Loan Amount:</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="loan_amount" name="amount" min="0" max="999999999" value="{{ $loan->loan_amount }}" required>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-2">
                                <div class="col-2 text-end pe-4">
                                    <label for="loan_term" class="form-label m-0">Loan Term:</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="loan_term" name="term" min="1" value="{{ $loan->loan_term }}" required>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mb-2">
                                <div class="col-2 text-end pe-4">
                                    <label for="interest_rate" class="form-label m-0">Interest Rate:</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="interest_rate" name="interest" min="0" max="100" value="{{ $loan->interest_rate }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <fieldset>
                                        <div class="row d-flex justify-content-center align-items-center mb-2">
                                            <div class="col-2 text-end pe-4">
                                                <label for="start_date" class="form-label m-0">Start Date:</label>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select" name="start_date[month]" id="start_date" required>
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
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select" name="start_date[year]" id="start_date" required>
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
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mt-2">
                                    <input type="submit" class="btn btn-primary mx-2" value="Update">
                                    <a class="btn btn-danger mx-2" href="/main">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
