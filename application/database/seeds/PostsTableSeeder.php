<?php

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
        DB::table('posts')->insert([
            'title' => 'Post THREE',
            'body' => 'This is the 3rd Post body, and it is here, and here it is.',
            'user_id' => 1
        ]);
    }
}
