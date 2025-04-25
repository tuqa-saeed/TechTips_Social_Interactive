<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\User;
use App\Models\Advice;

class LikeSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $advice = Advice::first();

        Like::create([
            'advice_id' => $advice->id,
            'user_id' => $user->id,
        ]);
    }
}
