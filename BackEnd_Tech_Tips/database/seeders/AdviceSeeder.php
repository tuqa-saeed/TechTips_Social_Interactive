<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advice;
use App\Models\Category;
use App\Models\User;

class AdviceSeeder extends Seeder
{
    public function run()
    {
        $category = Category::first();
        if (!$category) {
            echo "لا توجد فئة في قاعدة البيانات.\n";
            return;  
        }

        // التأكد من وجود المستخدم
        $user = User::first();
        if (!$user) {
            echo "لا يوجد مستخدم في قاعدة البيانات.\n";
            return;  
        }

        Advice::create([
            'title' => 'How to stay productive',
            'content' => 'Here are some tips to stay productive during the day...',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

        // يمكن إلغاء تعليق السطر التالي إذا كنت تريد إضافة نصيحة ثانية:
        /*
        Advice::create([
            'title' => 'Healthy eating habits',
            'content' => 'Eating healthy is crucial for a balanced life...',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);
        */
    }
}
