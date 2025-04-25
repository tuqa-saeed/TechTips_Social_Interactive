<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Advice;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // استخدم أول مستخدم موجود
        $advice = Advice::first(); // استخدم أول نصيحة موجودة

        Comment::create([
            'advice_id' => $advice->id,
            'user_id' => $user->id,
            'content' => 'This advice is really helpful, thank you!',
        ]);

        Comment::create([
            'advice_id' => $advice->id,
            'user_id' => $user->id,
            'content' => 'Great tips, I will try them out!',
        ]);
    }
}
