<?php

namespace App\Http\Controllers\API;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarkController extends Controller
{
    public function addBookmark(Request $request)
    {
        $request->validate([
            'advice_id' => 'required|exists:advices,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $bookmark = Bookmark::firstOrCreate($request->all());

        return response()->json($bookmark, 201);
    }

    public function removeBookmark(Request $request)
    {
        $request->validate([
            'advice_id' => 'required',
            'user_id' => 'required',
        ]);

        Bookmark::where('advice_id', $request->advice_id)
            ->where('user_id', $request->user_id)
            ->delete();

        return response()->json(['message' => 'Bookmark removed']);
    }

    public function getBookmarkedAdvices($user_id)
    {
        return Bookmark::with('advice')
            ->where('user_id', $user_id)
            ->latest()
            ->get();
    }
}
