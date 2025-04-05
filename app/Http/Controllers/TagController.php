<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;

class TagController extends Controller
{
    public function __invoke(string $tag)
    {
        $bookmarks = auth()->check()
          ? Bookmark::withAnyTags([$tag])->get()
          : Bookmark::public()->withAnyTags([$tag])->get();

        return inertia()
          ->render(
              'Tag',
              ['bookmarks' => $bookmarks, 'tagged' => $tag]
          );
    }
}
