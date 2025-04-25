<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\Advice;

class BookmarkSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $advice = Advice::first();

        Bookmark::create([
            'advice_id' => $advice->id,
            'user_id' => $user->id,
        ]);
    }
}
