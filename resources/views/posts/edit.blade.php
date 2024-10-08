@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Specify the method as PUT for updates -->

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Name:</label>
                <input type="text" name="name" value="{{ old('name', $post->name) }}" required 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Tags:</label>
                <select name="tags[]" multiple 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Category:</label>
                <select name="category_id" required 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Image:</label>
                <input type="file" name="image" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image.</p>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Update Post
            </button>
        </form>
    </div>
@endsection
