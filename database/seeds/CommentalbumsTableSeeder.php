<?php

use Illuminate\Database\Seeder;
use App\Commentalbum;

class CommentalbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment_album = new Commentalbum();
        $comment_album->id = 1;
        $comment_album->content = 'comment album';
        $comment_album->user_id = 1;
        $comment_album->save();
    }
}
