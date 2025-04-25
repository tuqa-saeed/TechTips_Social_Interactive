<?php
namespace App\Http\Controllers\API;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function likeAdvice(Request $request)
    {
        $request->validate([
            'advice_id' => 'required|exists:advices,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $like = Like::firstOrCreate($request->all());

        return response()->json($like, 201);
    }

    public function unlikeAdvice(Request $request)
    {
        $request->validate([
            'advice_id' => 'required',
            'user_id' => 'required',
        ]);

        Like::where('advice_id', $request->advice_id)
            ->where('user_id', $request->user_id)
            ->delete();

        return response()->json(['message' => 'Like removed']);
    }

    public function getLikesForAdvice($advice_id)
    {
        return Like::where('advice_id', $advice_id)->count();
    }
}

