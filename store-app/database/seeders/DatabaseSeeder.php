<?php

namespace Database\Seeders;

use App\Models\Article;
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
        Article::create([
            'title'=>'22 of the Best Pizza Places in the United States',
            'image'=>'/bk9llFtdFaJaI7zNYeDeGMliRqM1D1HHgP0duauA.jpg',
            'description'=>'Pizza in America has never been better. The wood-fire Neapolitan pizzerias that took off in the early 2000s, and have been spreading ever since, taught Americans to ask more of a dish they already loved.
             The ensuing craft pizza renaissance is a rare culinary convergence: born of metropolitan chef culture but not confined to big cities. There are great pizzerias virtually everywhere in the United States, from small New England towns to the Mississippi Delta to rural Iowa to Los Angeles to Alaska. And they’re being opened by chefs from an unusually wide array of backgrounds.
             Pizza in America has never been better. The wood-fire Neapolitan pizzerias that took off in the early 2000s, and have been spreading ever since, taught Americans to ask more of a dish they already loved.
             The ensuing craft pizza renaissance is a rare culinary convergence: born of metropolitan chef culture but not confined to big cities. There are great pizzerias virtually everywhere in the United States, from small New England towns to the Mississippi Delta to rural Iowa to Los Angeles to Alaska. And they’re being opened by chefs from an unusually wide array of backgrounds.'
        ]);
        Article::create([
            'title'=>'‘I’d be better off if I hadn’t been to uni’: UK graduates tell of lives burdened by student loans',
            'image'=>'/igqVK3U7s2pagkacbh7aOR4rjGnI4Y2zkkWsNhhY.jpg',
            'description'=>'faced with unaffordable student loan repayments, many UK graduates on moderate salaries are leaving their jobs, or turning down promotions in sectors plagued by staff shortages, such as teaching and healthcare. Loans totalling as much as £120,000 – many swollen by surging interest rates – are putting them off trying to progress in their careers, people responding to an online callout or explaining their experience in interviews shared with the Observer.
            The repayments also made buying a home much harder or impossible, they said, and were affecting their mental health and plans to start a family.
            Many said they had avoided jobs with salaries high enough to trigger student loan repayments, with some opting to work in part-time minimum wage jobs despite having degrees in sought-after subjects. Several said they had left or not applied for jobs paying more money because of the resulting higher loan repayments, and having to pay the 40% income tax rate.
            Olivia, a 30-year-old project manager whose £68,000 debt when she graduated has grown to nearly £75,000, said she took a lower-paid role to decrease the monthly repayments of £350, which she struggled to afford. “Combined with the lower tax rate and lower repayments, I am actually better off financially,” she said.'
        ]);
    }
}
