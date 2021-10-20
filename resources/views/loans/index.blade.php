@extends('..layout.layout')

@section('content')
    <div class="content">
        <p>{{ session('msg') }}</p>
        <h1>All Loans</h1>
        <a class="btn" href="/create">Add New Loan</a>
        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Loan Amount</th>
                    <th>Loan Term</th>
                    <th>Interest Rate</th>
                    <th>Created at</th>
                    <th>Edit</th>
                </tr>
                @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->loan_amount }}</td>
                    <td>{{ $loan->loan_term }} {{ $loan->loan_term == 1 ? "Year" : "Years" }}</td>
                    <td>{{ $loan->interest_rate }} %</td>
                    <td>{{ $loan->created_at }}</td>
                    <td>
                        <a href="/details/{{ $loan->id }}" class="btn">View</a>
                        <a href="/edit/{{ $loan->id }}" class="btn">Edit</a>
                        <form action="{{ route('loan.destroy', $loan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn" value="DELETE">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">{{ $loans->links() }}</div>
    </div>
@endsection
