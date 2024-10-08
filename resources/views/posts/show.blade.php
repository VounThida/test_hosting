@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">{{ $post->name }}</h1>

    <div class="mt-4">
        <h2 class="text-lg font-semibold">Tag:</h2>
        <p>{{ $post->tag }}</p>
    </div>
    
    <div class="mt-4">
        <h2 class="text-lg font-semibold">Category:</h2>
        <p>{{ $post->category->name }}</p>
    </div>

    <div class="mt-4">
        <h2 class="text-lg font-semibold">Image:</h2>
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}" class="mt-2">
        @else
            <p>No image available.</p>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('posts.edit', $post) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit Post</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete Post</button>
        </form>
        <a href="{{ route('posts.index') }}" class="ml-4 text-blue-600">Back to Posts</a>
    </div>
@endsection
