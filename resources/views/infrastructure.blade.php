@extends('layouts.public')

@section('title', 'Infrastructure - Kopal School')

@section('content')
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1>Our Infrastructure</h1>
            <p class="lead">Explore the state-of-the-art facilities that support our students’ growth and learning.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/library.jpg') }}" class="card-img-top" alt="Library">
                <div class="card-body">
                    <h5 class="card-title">Modern Library</h5>
                    <p class="card-text">Our library is stocked with a wide range of books and digital resources to support academic excellence.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/science-lab.jpg') }}" class="card-img-top" alt="Science Lab">
                <div class="card-body">
                    <h5 class="card-title">Science Laboratories</h5>
                    <p class="card-text">Fully equipped physics, chemistry, and biology labs for hands-on scientific exploration.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/computer-lab.jpg') }}" class="card-img-top" alt="Computer Lab">
                <div class="card-body">
                    <h5 class="card-title">Computer Lab</h5>
                    <p class="card-text">Advanced computer lab with internet access for learning programming, research, and digital literacy.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
