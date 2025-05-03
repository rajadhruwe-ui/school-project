@extends('layouts.public')

@section('title', 'Student Portal | Kopal School')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Student Portal</h2>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">View Results</h5>
                    <p class="card-text">Access your exam results.</p>
                    <a href="{{ route('results') }}" class="btn btn-primary">Go to Results</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Admission Info</h5>
                    <p class="card-text">Check the admission status and process.</p>
                    <a href="{{ route('admission') }}" class="btn btn-success">View Admission</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
