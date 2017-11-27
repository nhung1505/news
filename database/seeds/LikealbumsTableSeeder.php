<?php

use Illuminate\Database\Seeder;
use App\Likealbum;

class LikealbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $like = new Likealbum();
        $like->id = 1;
        $like->likes = 0;
        $like->user_id = 1;
        $like->save();

    }
}
