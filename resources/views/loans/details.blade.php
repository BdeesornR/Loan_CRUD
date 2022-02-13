@extends('..layout.layout')

@section('content')
    <div class="container">
        {{-- <p>{{ session('msg') }}</p> --}}
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1 class="m-0">Loan Details</h1>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center gx-4">
                            <div class="col-auto d-flex">
                                <label for="id">ID:</label>
                                <p class="ms-2 mb-0" id="id">{{ $loan->id }}</p>
                            </div>
                            <div class="col-auto">|</div>
                            <div class="col-auto d-flex">
                                <label for="loan_amount">Loan Amount:</label>
                                <p class="ms-2 mb-0" id="loan_amount">{{ $loan->loan_amount }} &#xE3F</p>
                            </div>
                            <div class="col-auto">|</div>
                            <div class="col-auto d-flex">
                                <label for="loan_term">Loan Term:</label>
                                <p class="ms-2 mb-0" id="loan_term">{{ $loan->loan_term }} {{ $loan->loan_term == 1 ? 'Year' : 'Years' }}</p>
                            </div>
                            <div class="col-auto">|</div>
                            <div class="col-auto d-flex">
                                <label for="interest_rate">Interest Rate:</label>
                                <p class="ms-2 mb-0" id="interest_rate">{{ $loan->interest_rate }} %</p>
                            </div>
                            <div class="col-auto">|</div>
                            <div class="col-auto d-flex">
                                <label for="created_at">Created at:</label>
                                <p class="ms-2 mb-0" id="created_at">{{ $loan->created_at }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a class="btn btn-outline-secondary" href="{{ route('show-main') }}">Back to main page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header">
                        <h1 class="m-0">Repayment Schedule</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover m-0">
                            <thead>
                                <tr class="align-middle text-center">
                                    <th>Payment No.</th>
                                    <th>Date</th>
                                    <th>Payment Amount</th>
                                    <th>Principal</th>
                                    <th>Interest</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $loan->loan_term * 12; $i++)
                                    <tr class="align-middle text-center">
                                        <td>{{ $repaymentTable[$i]['seq'] }}</td>
                                        <td>{{ $repaymentTable[$i]['repayment_date'] }}</td>
                                        <td>{{ $repaymentTable[$i]['repayment_amount'] }}</td>
                                        <td>{{ $repaymentTable[$i]['principal'] }}</td>
                                        <td>{{ $repaymentTable[$i]['interest'] }}</td>
                                        <td>{{ $repaymentTable[$i]['balance'] }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
