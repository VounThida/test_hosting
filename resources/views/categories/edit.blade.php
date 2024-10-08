@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Category</h1>
    
    <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT') <!-- Specify the method as PUT for updates -->

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2 " for="description">Description:</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200 ">Update</button>
        <a href="{{ route('categories.index') }}" class="ml-4 text-gray-600 hover:text-blue-600">Back to Categories</a>
    </form>
@endsection
