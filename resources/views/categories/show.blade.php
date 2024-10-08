@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">{{ $category->name }}</h1>

    <div class="mt-4">
        <h2 class="text-lg font-semibold">Description:</h2>
        <p>{{ $category->description }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('categories.edit', $category) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit Category</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete Category</button>
        </form>
        <a href="{{ route('categories.index') }}" class="ml-4 text-blue-600">Back to Categories</a>
    </div>
@endsection
