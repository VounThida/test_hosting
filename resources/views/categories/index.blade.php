@extends('layouts.app')

@section('content')

<div class="px-6 py-3 text-right" >
    <div class="px-6 py-2 text-end">
<div class=" px-6 py-2 text-center"  >
    <ul class=" flex  justify-end">
        <li class="mr-4">
            <a href="{{ route('tags.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4 inline-block   ">
                Tags
            </a>
        </li>
        <li class="mr-4" >
            {{-- <div class="text-justify"> --}}
            <a href="{{ route('posts.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4 inline-block">
                Post
            </a>
        </li>
        <li class="mr-4">
            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4 inline-block">
                Login
            </a>
        </li>
        <li class="mr-4">
            <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4 inline-block">
                Register
            </a>
        </li>
    </ul>


</a>
</div>

</div>
</div>
    <h1 class="text-2xl font-bold mb-6">Categories</h1>
    
  <!-- Search Form -->
  <form action="{{ route('categories.index') }}" method="GET" class="mb-4">
    <input type="text" name="search" placeholder="Search categories..." class="border p-2 rounded w-1/3">
    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded ">Search</button>
</form>
    
    <!-- Create Category Button -->
    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-6">
        Create Category
    </a>
    
    <!-- Categories Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border text-center">ID</th>
                    <th class="py-2 px-4 border text-center">Name</th>
                    <th class="py-2 px-4 border">Description</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @include('categories.partials.table-rows', ['categories' => $categories])
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $categories->links() }}
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="search"]').on('keyup', function() {
            let search = $(this).val();
            $.get('{{ route('categories.index') }}', { search: search }, function(data) {
                $('tbody').html(data); // Update only the tbody
            });
        });
    });
</script>
