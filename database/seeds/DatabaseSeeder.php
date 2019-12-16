<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;
use function foo\func;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
