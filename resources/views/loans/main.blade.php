@extends('..layout.layout')

@section('content')
    <div class="container">
        {{-- <p>{{ session('msg') }}</p> --}}
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h1 class="m-0">Loan Application</h1>
                            </div>
                            <div class="col-4 text-end">
                                <a class="btn btn-outline-primary" href="{{ route('show-create') }}">New Loan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover m-0">
                            <thead>
                                <tr class="align-middle text-center">
                                    <th>ID</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Term</th>
                                    <th>Interest Rate</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($loans as $loan)
                                    <tr class="align-middle text-center">
                                        <td>{{ $loan->id }}</td>
                                        <td>{{ $loan->loan_amount }}</td>
                                        <td>{{ $loan->loan_term }} {{ $loan->loan_term == 1 ? "Year" : "Years" }}</td>
                                        <td>{{ $loan->interest_rate }} %</td>
                                        <td>{{ $loan->created_at }}</td>
                                        <td>
                                            <button class="btn btn-outline-info" onclick="onView({{ $loan->id }})">View</button>
                                            <button class="btn btn-outline-warning" onclick="onEdit({{ $loan->id }})">Edit</button>
                                            <button class="btn btn-outline-danger" onclick="onDelete({{ $loan->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">{{ $loans->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/main.js') }}"></script>
@endpush
