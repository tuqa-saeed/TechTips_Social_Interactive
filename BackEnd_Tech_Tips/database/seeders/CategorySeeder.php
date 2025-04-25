<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Productivity',
            'description' => 'Tips to enhance your productivity at work and in life.',
        ]);

        Category::create([
            'name' => 'Health',
            'description' => 'All about maintaining a healthy lifestyle.',
        ]);
    }
}
