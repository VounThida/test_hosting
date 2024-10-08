@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Create Category</h1>
        
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-8 rounded shadow-md">
            @csrf
            
            <!-- Category Name Input -->
            <div class="mb-5">
                <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="border border-gray-300 p-3 w-full rounded focus:outline-none focus:border-blue-500"
                    placeholder="Enter category name">
            </div>
            
            <!-- Category Description Input -->
            <div class="mb-5">
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="border border-gray-300 p-3 w-full rounded focus:outline-none focus:border-blue-500" 
                    placeholder="Enter category description (optional)"></textarea>
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-between items-center">
                <!-- Back Button -->
                <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Back
                </a>
                
                <!-- Create Button -->
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
