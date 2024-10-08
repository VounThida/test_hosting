@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit Tag</h1>

        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 transition duration-300 ease-in-out" placeholder="Enter tag name">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-500 transition duration-300 ease-in-out">Update Tag</button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('tags.index') }}" class="text-blue-600 hover:underline hover:text-blue-800 transition duration-300 ease-in-out">← Back to Tags</a>
        </div>
    </div>
@endsection
