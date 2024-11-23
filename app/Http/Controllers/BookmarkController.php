<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->get();
        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookmarkRequest $request)
    {
        $bookmarkData = $request->validated();

        $bookmarkData['image'] = $this->handleImageUpload($request);

        $bookmark = auth()->user()->bookmarks()->create($bookmarkData);

        return to_route('bookmarks.show', $bookmark)->with('success', 'Bookmark created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookmark $bookmark)
    {
        Gate::authorize('editBookmark', $bookmark);

        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        Gate::authorize('editBookmark', $bookmark);

        return view('bookmarks.edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark)
    {
        Gate::authorize('editBookmark', $bookmark);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $this->handleImageUpload($request);
        }

        $bookmark->update($validated);

        return to_route('bookmarks.show', $bookmark)->with('success', 'Bookmark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        Gate::authorize('editBookmark', $bookmark);

        $bookmark->delete();

        return to_route('bookmarks.index')->with('success', 'Bookmark deleted successfully');
    }

    protected function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('bookmarks', 'public');
        }

        return null;
    }
}
