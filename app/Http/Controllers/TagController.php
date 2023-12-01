<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Tags\Tag;
use Inertia\Inertia;
use App\Models\Bookmark;

class TagController extends Controller
{
    public function __invoke(Request $request, $tag)
		{
      $bookmarks = auth()->check()
        ? Bookmark::withAnyTags([$tag])->get()
        : Bookmark::public()->withAnyTags([$tag])->get();

				return inertia()->render('Tag', [
          'bookmarks' => $bookmarks,
          'tagged' => $tag
				]
			);
    }
}
