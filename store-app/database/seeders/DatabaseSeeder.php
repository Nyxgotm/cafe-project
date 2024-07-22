<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'mozhan',
            'email'=>'mzhnfn@gmail.com',
            'password'=>'mzhn1382',
        ]);
        User::create([
            'name'=>'manisa',
            'email'=>'manisafn@gmail.com',
            'password'=>'manisa1382',
        ]);
        $category = Category::create([
            'title' => 'Hot Coffee',
            'image'=> 'public/storage/ZbsuQ9nKkYKc4K7YmGhmegjSrNAYg3wkRIAiAOtv.jpg'
        ]);
        $category2 = Category::create([
            'title' => 'Ice Coffee',
            'image'=> 'public/storage/3iTwNMKciklDj1fTNGFVnYmMIG1OUs60DKfw6UMq.jpg'
        ]);
        Product::create([
            'category_id' => $category->category_id,
            'title'=> 'Espresso',
            'price'=>'30000',
            'image'=>'public/storage/wCtMTGlVCWzP0rzQKYaIE66bNuNSFNcgfQCW2JRF.jpg',
            'description'=>'70/30',
        ]);
        Product::create([
            'category_id' => $category2->category_id,
            'title'=> 'Iced Caramel Macchiato',
            'price'=>'70000',
            'image'=>'public/storage/GUiLm2lv2zYOjBhB5MUICiQlrKBbJWGeoEKG5V7U.jpg',
            'description'=>'Espresso/Milk/Caramel/Ice',
        ]);
    }
}
