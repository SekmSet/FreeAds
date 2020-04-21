<?php

use App\Article;
use App\Color;
use App\Image;
use App\Theme;
use App\User;
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

        factory(Color::class,10)->create();
        $colors =  Color::all('id')->pluck('id')->toArray();

        factory(Theme::class,10)->create();
        $themes =  Theme::all('id')->pluck('id')->toArray();

        factory(User::class, 20)->create()->each(function ($user) use ($themes, $colors) {
            factory(Article::class,3)->create([
                'user_id' => $user->id,
                'color_id' => $colors[array_rand($colors)],
                'theme_id' => $themes[array_rand($themes)],
            ])->each(function ($article) {
                factory(Image::class,2)->create([
                    'article_id' => $article->id,
                ]);
            });
        });
    }
}
