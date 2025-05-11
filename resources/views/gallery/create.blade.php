@extends('layouts.app')

@section('title', 'Upload Image')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-2xl mt-10">
    <h2 class="text-2xl font-semibold text-center mb-6">Upload Image</h2>

    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Category</label>
            <select name="category_id" class="w-full border-gray-300 rounded p-2">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border-gray-300 rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Image</label>
            <input type="file" name="image" class="w-full border-gray-300 rounded p-2">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Upload
        </button>
    </form>
</div>
@endsection
