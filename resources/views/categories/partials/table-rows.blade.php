@forelse($categories as $category)
    <tr>
        <td class="py-2 px-4 border">{{ $category->id }}</td>
        <td class="py-2 px-4 border">{{ $category->name }}</td>
        <td class="py-2 px-4 border">{{ $category->description }}</td>
        <td class="py-2 px-4 border">
            <a href="{{ route('categories.edit', $category->id) }}" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 text-center">
                Edit
             </a>
             
             <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                 @csrf
                 @method('DELETE')
                 <button type="submit" 
                         class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300 text-center ml-4">
                     Delete
                 </button>
             </form>
             
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center py-4">No categories found.</td>
    </tr>
@endforelse
