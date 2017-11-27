<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $album = new Album();
        $album->name = 'Nhạc trẻ';
        $album->image = 'image_albums/1/gqsqyJeiS4hKVKT5q09ZLW2VMQosOztMrGyCtdBs.png';
        $album->description = 'Các bản nhạc của những người trẻ tuổi';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach([1,2,3,4,5,6]);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);

        $album = new Album();
        $album->name = 'Nhạc trữ tình';
        $album->image = 'image_albums/1/6NCcncfKOk6nYEftGJF62Ez7kRwb6arwq79chcsi.jpeg';
        $album->description = 'Các bản nhạc tình cảm lãng mạn';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(2);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc thư giãn';
        $album->image = 'image_albums/1/Xf4GNQtfi1eSr9CtYg4RrxGjqXVwYdNNjf0xiggF.jpeg';
        $album->description = 'Các bản nhạc giúp bạn thoải mái tinh thần, tập trung làm việc.';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(3);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc tiệc tùng';
        $album->image = 'image_albums/1/H42qFCLWHx7uLQ3kA1wTM1ECTueJBeJjiChLRtZv.jpeg';
        $album->description = 'Bài hát cho những bữa tiệc sôi động';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(4);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc EDM';
        $album->image = 'image_albums/1/ZSJd56IsbalosJ9cyaAeHlHt5s1k48Tk04Pm7fmq.jpeg';
        $album->description = 'Các bài nhạc điện tử được các bạn trẻ yêu thích hiện nay.';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(5);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc giao hưởng';
        $album->image = 'image_albums/1/LP5J9dTG2xKnTA62hzA4zczYdRcWY9szi2Oh7Bm9.jpeg';
        $album->description = 'Các bản nhạc giao hưởng không lời hay.';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(7);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc phim';
        $album->image = 'image_albums/1/CABYRD8JPLChL6J5esYkJ7h78cJi0SDxw6kzWhh3.jpeg';
        $album->description = 'Các bản nhạc phim tuyển chọn hay nhất';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(8);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc thiếu nhi';
        $album->image = 'image_albums/1/Fw8YWzCHwSo5YnZ8CLVmQJ3K7ws7nLeAmcYSkPhc.jpeg';
        $album->description = 'Các bản nhạc thiếu nhi hay nhất.';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(9);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



        $album = new Album();
        $album->name = 'Nhạc Motivation';
        $album->image = 'image_albums/1/hj0xzpnIpmWw0ZNRMC9JHxstRwfS4nfZwj5oKcw2.jpeg';
        $album->description = 'Các bản nhạc tiếp thêm động lực cho bạn trong khoảng thời gian khó khăn trong ngày.';
        $album->user_id = 1;
        $album->save();
        $album->songs()->attach(10);
        $album->commentalbums()->attach(1);
        $album->likealbums()->attach(1);



    }
}
