@forelse($tags as $tag)
    <tr>
        <td class="py-2 px-4 border">{{ $tag->id }}</td>
        <td class="py-2 px-4 border">{{ $tag->name }}</td>
     
        <td class=" py-2 px-4 border text-center">
            <!-- Edit Button -->
            <a href="{{ route('tags.edit', $tag->id) }}" 
               class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
               Edit
            </a>
            <!-- Delete Button in Center -->
            <div class="inline-block mt-2 ">
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 text-white font-semibold py-1 px-4 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ">
                        Delete
                    </button>
                </form>
            </div>
        </td>
        
        
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center py-4">No tags found.</td>
    </tr>
@endforelse
