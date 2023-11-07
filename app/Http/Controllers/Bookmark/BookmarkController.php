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
        return inertia()->render('Bookmark/Index');
    }

    public function create()
    {
      return inertia()->render('Bookmark/Create');
    }

    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->validated());
        return redirect()->route('bookmark', $bookmark)->with('status', 'Registro creado');
    }
}
