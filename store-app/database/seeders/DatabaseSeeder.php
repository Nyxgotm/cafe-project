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
            'password'=>'$2y$10$dDjZUYSkhHLP8QizcWidC.evfU3HB2ijd7jCoClhdDvfaGhqRn0Xa',
        ]);
        User::create([
            'name'=>'manisa',
            'email'=>'manisafn@gmail.com',
            'password'=>'$2y$10$NccvH1OddXY4Wn4GqF1zF.3FF4T66JVD58ALUq.SDnDLq5ppRiWn.',
        ]);
        $category = Category::create([
            'title' => 'Hot Coffee',
            'image'=> '/UXmIhm4zxhsXOgh89jF9NM8Cdmb2BGchsqGNsuiU.jpg'
        ]);
        $category2 = Category::create([
            'title' => 'Ice Coffee',
            'image'=> '3iTwNMKciklDj1fTNGFVnYmMIG1OUs60DKfw6UMq.jpg'
        ]);
        Product::create([
            'category_id' => $category->category_id,
            'title'=> 'Espresso',
            'price'=>'30000',
            'image'=>'wCtMTGlVCWzP0rzQKYaIE66bNuNSFNcgfQCW2JRF.jpg',
            'description'=>'70/30',
        ]);
        Product::create([
            'category_id' => $category2->category_id,
            'title'=> 'Iced Caramel Macchiato',
            'price'=>'70000',
            'image'=>'GUiLm2lv2zYOjBhB5MUICiQlrKBbJWGeoEKG5V7U.jpg',
            'description'=>'Espresso/Milk/Caramel/Ice',
        ]);
    }
}
