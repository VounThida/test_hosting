<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $query = Tag::query(); // Start a new query for the Tag model

    // Check if there's a search parameter
    if ($request->has('search')) {
        // Filter tags by name based on the search input
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Use paginate instead of get to enable pagination
    $tags = $query->paginate(10); // Adjust '10' to your desired number of items per page

    // Check if the request is an AJAX request
    if ($request->ajax()) {
        return view('tags.partials.table-rows', compact('tags'))->render();
    }

    // Return the main index view with the paginated tags
    return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:tags']);
        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required|string|max:255|unique:tags,name,' . $tag->id]);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
