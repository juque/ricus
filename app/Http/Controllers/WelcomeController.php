<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Spatie\Tags\Tag;

class WelcomeController extends Controller
{
  public function __invoke(Request $request)
  {
    $tagList = Tag::all();
    $bookmarks = Bookmark::with('tags')->latest()->paginate(10);
    return inertia()->render('Welcome', [
      'bookmarks' => $bookmarks,
      'tagList'   => $tagList
    ]);
  }
}
