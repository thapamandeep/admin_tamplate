@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Hero Section Create</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Start -->
    <form action="{{route('post.hero')}}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block font-medium mb-2">Hero Name:</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}">
        </div>

        <!-- Image Input -->
        <div class="mb-4">
            <label for="image" class="block font-medium mb-2">Hero Image:</label>
            <input type="file" name="image" id="image" class="w-full border border-gray-300 p-2 rounded" accept="image/*">
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="block font-medium mb-2">Description:</label>
            <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 p-2 rounded">{{ old('description') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Hero</button>
    </form>
</div>
@endsection