<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\User;
use App\Models\Advice;

class RatingSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $advice = Advice::first();

        Rating::create([
            'advice_id' => $advice->id,
            'user_id' => $user->id,
            'rating_value' => 'useful',
        ]);
    }
}
