<?php

namespace App\Http\Controllers\Bookmark;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookmarkRequest;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmark = Bookmark::with('tags')->orderByDesc('created_at')->get();
        return inertia()->render('Bookmark/Index', [
          'bookmark' => $bookmark,
        ]);
    }

    public function create()
    {
        return inertia()->render('Bookmark/Create');
    }

    public function edit(Bookmark $bookmark) 
    {
      return inertia()->render('Bookmark/Edit', [
        'bookmark' => $bookmark,
        'tags' => $bookmark->tags
      ]);
    }

    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->validated());
        $bookmark->attachTags($request->tags);
        return redirect()->route('bookmark.index', $bookmark)->with('status', 'Registro creado');
    }
    public function update(BookmarkRequest $request, Bookmark $bookmark) 
    {
      $bookmark->update($request->validated());
      $bookmark->syncTags($request->tags);
      return redirect()->route('bookmark.index')->with('status', 'Registro actualizado');
    }
}
