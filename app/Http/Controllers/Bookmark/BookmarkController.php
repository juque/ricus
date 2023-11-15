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
        $bookmark = Bookmark::orderByDesc('created_at')->get();
        return inertia()->render('Bookmark/Index', [
          'bookmark' => $bookmark,
        ]);
    }

    public function create()
    {
        return inertia()->render('Bookmark/Create');
    }

    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->validated());
        $bookmark->attachTags($request->tags);
        return redirect()->route('bookmark.index', $bookmark)->with('status', 'Registro creado');
    }
}
