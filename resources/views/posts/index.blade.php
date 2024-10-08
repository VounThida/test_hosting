@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    <!-- Search Form -->
    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Search posts..." class="border p-2 rounded w-1/3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
    </form>

    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Create New Post</a>

    <table class="min-w-full mt-4 bg-white border border-gray-300 shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Category</th>
                <th class="py-2 px-4 border">Tags</th>
                <th class="py-2 px-4 border text-center">Image</th>
                <th class="py-2 px-4 border text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $post->id }}</td>
                    <td class="py-2 px-4 border text-center">{{ $post->name }}</td>
                    <td class="py-2 px-4 border text-center">{{ $post->category->name }}</td>
                    <td class="py-2 px-4 border text-center">{{ $post->tags->pluck('name')->implode(', ') }}</td>
                    <td class="py-2 px-4 border text-center">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}" class="w-20 h-20 object-cover mx-auto">
                        @else
                            <p>No image</p>
                        @endif
                    </td>
                    <td class="py-2 px-4 border text-center">
                        <a href="{{ route('posts.show', $post) }}" 
                           class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
                           View
                        </a>
                    
                        <a href="{{ route('posts.edit', $post) }}" 
                           class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow ml-2  focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-300">
                           Edit
                        </a>
                    
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white font-semibold py-1 px-4 rounded-lg shadow ml-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300">
                                Delete
                            </button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="search"]').on('keyup', function() {
            let search = $(this).val();
            $.get('{{ route('posts.index') }}', { search: search }, function(data) {
                $('tbody').html(data); // Update only the tbody
            });
        });
    });
</script>
