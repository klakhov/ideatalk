<?php

use App\Article;
use App\User;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function($user){
           $articles = factory(Article::class, rand(1,3))->make();
           $user->articles()->saveMany($articles);
        });
    }
}
