@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-gray-700">Category</label>
            <select name="category_id" id="category" class="border border-gray-300 p-2 w-full rounded" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700">Tags</label>
            <select name="tags[]" id="tags" class="border border-gray-300 p-2 w-full rounded" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="border border-gray-300 p-2 w-full rounded">
        </div>        

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Post</button>
    </form>
@endsection
