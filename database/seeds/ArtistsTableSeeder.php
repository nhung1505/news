<?php

use Illuminate\Database\Seeder;
use App\Artist;
use App\Song;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = new Artist();
        $artist->name = 'Nguyen Binh Duong';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1995-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 1;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Nguyen Van Mach';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1993-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 2;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Tran Anh Tuan';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1994-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 3;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Le Van Manh';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1996-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 4;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Chu Bao Phuong';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1997-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 5;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Nguyen Duy Thanh';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1991-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 6;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Tran Manh Tuan';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1990-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 7;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Pham Van Hoa';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1999-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 8;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Mac Duc Luong';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1989-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 9;
        $artist->user_id = 1;
        $artist->save();

        $artist = new Artist();
        $artist->name = 'Thich Binh Son';
        $artist->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $artist->dob = '1988-08-08';
        $artist->stage_name = 'Bi Beo';
        $artist->description = '....';
        $artist->song_id = 10;
        $artist->user_id = 1;
        $artist->save();
    }
}
