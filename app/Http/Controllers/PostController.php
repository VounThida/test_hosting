<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        // Fetch posts with search functionality
        $posts = Post::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                ->orWhereHas('tags', function ($tagQuery) use ($query) {
                    $tagQuery->where('name', 'like', "%{$query}%");
                });
        })->with('category', 'tags')->get();

        if ($request->ajax()) {
            return view('posts.partials.table', compact('posts')); // Return a partial view for AJAX
        }

        return view('posts.index', compact('posts')); // Return the full view
    }



    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        $tags = Tag::all(); // Fetch all tags
        return view('posts.create', compact('categories', 'tags')); // Pass categories and tags
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id'
        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        // Attach tags if any
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }   



    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all(); // Retrieve all tags
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array', // Validate that tags is an array
            'tags.*' => 'exists:tags,id', // Each tag must exist in the tags table
        ]);

        $postData = $request->all();
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $postData['image'] = $request->file('image')->store('images', 'public');
        } else {
            // Keep the old image if no new image is uploaded
            unset($postData['image']);
        }

        $post->update($postData);

        // Sync the tags
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            // If no tags are provided, detach all existing tags
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
