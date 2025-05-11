@extends('layouts.public')

@section('title', 'Our Team | Kopal Public School')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Meet Our Team</h2>

    <div class="row g-4">
        {{-- Example Team Member --}}
        @foreach($teamMembers as $member)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $member->photo) }}" class="card-img-top" alt="{{ $member->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $member->name }}</h5>
                    <p class="card-text">{{ $member->position }}</p>
                    <p class="text-muted small">{{ $member->bio }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
