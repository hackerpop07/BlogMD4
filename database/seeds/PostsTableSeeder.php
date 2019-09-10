<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            Post::create([
                "title" => "dadsadddddasd",
                "image" => "1.png",
                "description" => "dadsadddddasd",
                "content" => "dadsadddddasd",
                "status" => 1,
                "user_id" => $i
            ]);
        }
    }
}
