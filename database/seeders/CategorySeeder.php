<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // In your CategorySeeder.php

public function run()
{
    $categories = [
        ['name' => 'For Home'],
        ['name' => 'For Student'],
        ['name' => 'For Office'],
        ['name' => 'For Gaming'],
    ];

    foreach ($categories as $category) {
        Category::create($category);
    }
}

}
