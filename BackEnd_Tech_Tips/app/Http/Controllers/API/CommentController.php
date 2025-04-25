<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $request->validate([
            'advice_id' => 'required|exists:advices,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function getCommentsForAdvice($advice_id)
    {
        return Comment::where('advice_id', $advice_id)->with('user')->latest()->get();
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(['message' => 'Comment deleted']);
    }
}

