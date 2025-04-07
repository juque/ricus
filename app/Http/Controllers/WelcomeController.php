<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Spatie\Tags\Tag;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $tagList = Tag::all();

        $bookmarks = auth()->check()
          ? Bookmark::with('tags')->latest()->paginate(3)
          : Bookmark::public()->with('tags')->latest()->paginate(3);

        return inertia()->render('Welcome', [
          'bookmarks' => $bookmarks,
          'tagList'   => $tagList
        ]);
    }
}
