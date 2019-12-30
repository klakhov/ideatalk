<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<20;++$i){
            try{
                factory(Tag::class)->create();
            }catch (Exception $err){}
        }
        $tags = Tag::all();
        Article::all()->each(function ($article) use ($tags){
            $article->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
