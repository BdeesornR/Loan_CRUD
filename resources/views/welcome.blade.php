@extends('layout.layout')

@section('content')
    <div class="container vh-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-6 text-center">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="text-primary mb-4">Loans Application</h1>
                        <a class="btn btn-outline-secondary" href="{{ route('show-main') }}">Go to Site</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
