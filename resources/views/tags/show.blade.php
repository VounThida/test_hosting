@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">{{ $tag->name }}</h1>
    
    <div class="mt-4">
        <h2 class="text-lg font-semibold">Associated Posts:</h2>
        <ul>
            @forelse($tag->posts as $post)
                <li>{{ $post->name }}</li>
            @empty
                <li>No posts associated with this tag.</li>
            @endforelse
        </ul>
    </div>

    <div class="mt-4">
        <a href="{{ route('tags.edit', $tag) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit Tag</a>
        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete Tag</button>
        </form>
        <a href="{{ route('tags.index') }}" class="ml-4 text-blue-600">Back to Tags</a>
    </div>
@endsection
