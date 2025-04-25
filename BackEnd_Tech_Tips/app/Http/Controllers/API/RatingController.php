<?php

namespace App\Http\Controllers\API;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function submitRating(Request $request)
    {
        $request->validate([
            'advice_id' => 'required|exists:advices,id',
            'user_id' => 'required|exists:users,id',
            'rating_value' => 'required|in:Useful,False',
        ]);

        $rating = Rating::updateOrCreate(
            ['advice_id' => $request->advice_id, 'user_id' => $request->user_id],
            ['rating_value' => $request->rating_value]
        );

        return response()->json($rating, 201);
    }

    public function getAdviceRating($advice_id)
    {
        return [
            'Useful' => Rating::where('advice_id', $advice_id)->where('rating_value', 'Useful')->count(),
            'False' => Rating::where('advice_id', $advice_id)->where('rating_value', 'False')->count(),
        ];
    }

    public function getUserRating($advice_id, $user_id)
    {
        return Rating::where('advice_id', $advice_id)
                     ->where('user_id', $user_id)
                     ->first();
    }
}
