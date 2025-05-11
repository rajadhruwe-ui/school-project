@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Gallery</h1>

    @foreach($categories as $category)
        <div class="mb-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ $category->name }}</h2>

            @if($category->galleries->isEmpty())
                <p class="text-gray-500">No images in this category.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($category->galleries as $image)
                        <div class="bg-white shadow rounded-2xl overflow-hidden">
                            <img src="{{ asset('storage/gallery/' . $image->filename) }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $image->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $image->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
