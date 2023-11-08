<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Http\Resources\BookmarkResource;

class BookmarkController extends Controller
{
    public function index()
    {
        return BookmarkResource::collection(Bookmark::all());
    }
}
