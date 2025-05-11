@extends('layouts.public')

@section('title', 'Gallery | Kopal Public School')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">School Gallery</h2>

    <div class="row g-4">
        @foreach($images as $image)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('storage/gallery/' . $image) }}" class="card-img-top" alt="Gallery Image">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
