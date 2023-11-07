<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookmarkRequest;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function index()
    {
        return inertia()->render('Admin/Bookmark');
    }

    public function store(BookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->validated());
        return redirect()->route('bookmark', $bookmark)->with('status', 'Registro creado');
    }
}
