@foreach ($posts as $post)
    <tr>
        <td class="py-2 px-4 border">{{ $post->id }}</td>
        <td class="py-2 px-4 border">{{ $post->name }}</td>
        <td class="py-2 px-4 border">{{ $post->category->name }}</td>
        <td class="py-2 px-4 border">{{ $post->tags->pluck('name')->implode(', ') }}</td>
        <td class="py-2 px-4 border">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}"
                    class="w-20 h-20 object-cover">
            @else
                <p>No image</p>
            @endif
        </td>
        <td class="py-2 px-4 border">
            <a href="{{ route('posts.show', $post) }}" 
               class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
               View
            </a>
        
            <a href="{{ route('posts.edit', $post) }}" 
               class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow ml-2 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-300">
               Edit
            </a>
        
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
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
