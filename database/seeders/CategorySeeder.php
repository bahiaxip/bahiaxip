<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
           "name"=>"Programación",
            "slug"=>"programacion",
            "body"=>"NULL",
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Category::create([
           "name"=>"Tecnología",
            "slug"=>"tecnología",
            "body"=>"NULL",
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
    }
}
