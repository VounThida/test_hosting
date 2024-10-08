@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tags</h1>
       <!-- Search Form -->
       <form action="{{ route('tags.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Search tags..." class="border p-2 rounded w-1/3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
    </form>
    <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Create New Tag</a>

    <table class="min-w-full bg-white border border-gray-300 shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $tag->id }}</td>
                    <td class="py-2 px-4 border">{{ $tag->name }}</td>
                    <td class="py-2 px-4 border">
                        {{-- <a href="{{ route('tags.show', $tag) }}" class="text-blue-600 hover:underline">View</a> --}}
                        <a href="{{ route('tags.edit', $tag) }}" 
                        class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-300 ml-2">
                        Edit
                     </a>
                     
                     <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" 
                                 class="bg-red-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ml-2">
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
            $.get('{{ route('tags.index') }}', { search: search }, function(data) {
                $('tbody').html(data); // Update only the tbody
            });
        });
    });
</script>
