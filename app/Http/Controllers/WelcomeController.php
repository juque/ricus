<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $bookmarks = Bookmark::latest()->paginate(10);
        return inertia()->render('Welcome', [
          'bookmarks' => $bookmarks
        ]);
    }
}
