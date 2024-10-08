{{-- @extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Tag</h1>

        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Tag Name:</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3 transition duration-300 ease-in-out" placeholder="Enter tag name">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-500 transition duration-300 ease-in-out">Create Tag</button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('tags.index') }}" class="text-blue-600 hover:underline hover:text-blue-800 transition duration-300 ease-in-out">← Back to Tags</a>
        </div>
    </div>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Create tag</h1>
        
        <form action="{{ route('tags.store') }}" method="POST" class="bg-white p-8 rounded shadow-md">
            @csrf
            
            <!-- Category Name Input -->
            <div class="mb-5">
                <label for="name" class="block text-gray-700 font-semibold"> tag Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="border border-gray-300 p-3 w-full rounded focus:outline-none focus:border-blue-500"
                    placeholder="Enter category name">
            </div>
            
          
            
          
                
                <!-- Create Button -->
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection