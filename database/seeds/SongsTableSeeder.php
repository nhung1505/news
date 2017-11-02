<?php

use Illuminate\Database\Seeder;
use \App\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $song = new Song();
        $song->id = 1;
        $song->name = 'vang trang khoc';
        $song->image = '';
        $song->audio = '';
        $song->lyric = 'hello';
        $song->description = 'luong, ha , nhung';
        $song->user_id = 1;
        $song->save();
    }
}
