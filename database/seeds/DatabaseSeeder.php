<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 50)->create();
        factory(\App\Category::class, 50)->create();
        factory(\App\Question::class, 50)->create();
        factory(\App\Reply::class, 50)->create()->each(function($reply){
            return $reply->likes()->save(factory(\App\Like::class)->make());
        });

    }
}
