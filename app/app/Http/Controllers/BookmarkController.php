<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($eventId) {
        $user = \Auth::user();
        if (!$user->is_Bookmark($eventId)) {
            $user->Bookmark_event()->attach($eventId);
        }
        return back();
    }

    public function destroy($eventId) {
        $user = \Auth::user();
        if ($user->is_Bookmark($eventId)) {
            $user->Bookmark_event()->detach($eventId);
        }
        return back();
    }
}
