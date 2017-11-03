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
        $song->name = 'Vầng trăng khóc';
        $song->image = 'image_songs/1/07wdscilQ7D4X7hLdEuretMNMV2faD0LFNUUBtlV.jpeg';
        $song->audio = 'audio_songs/1/Vang Trang Khoc - Nhat Tinh Anh_ Khanh N [320kbps_MP3].mp31509625079.mp3';
        $song->lyric = 'Đã không còn người yêu hỡi ngày xưa ấy đôi ta bên nhau không rời
Ngồi trên cát nhìn biển đêm hát vu vơ mấy câu tình ca
Trái tim buồn vì thương nhớ vì đau xót sao đôi ta mau chia lìa
Đời giông bão nhiều đắng cay cuốn trôi mau biết đâu tình nồng

Thì thôi em đừng mong nhớ đừng thương tiếc chi thêm đau lòng
Tình chúng ta đã phôi pha em và anh mỗi người 1 nơi
Ngồi nơi đây mình đơn côi vầng trăng khóc sao rơi sông dài
Tiếc cho tôi, tiếc cho người và cho bao yêu thương đã trao
Gió đông buồn

Khóc chi người vì anh biết nào ai muốn mai sau chia ly đôi đường
Tình yêu đến chợt bỏ đi mấy ai vui với nhau muôn đời
Chắc khi nào tìm duyên mới thì anh sẽ mau quên đi bao ân tình
Và em chúc người mới quen sẽ bên anh yêu anh thật lòng

Thì thôi em đừng mong nhớ đừng thương tiếc chi thêm đau lòng
Tình chúng ta đã phôi pha em và anh mỗi người một nơi
Ngày mai sau dù gặp nhau thì xin hãy cho nhau một lời
Để không quên những êm đềm mà tình yêu khi xưa đã trao
Giấc mơ đầu';
        $song->description = 'Được sáng tác bởi nhạc sĩ Nguyễn Văn Chung';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Tình Đơn Phương';
        $song->image = 'image_songs/1/Zk1DSaueLpHqo9h5Go51d2hNraL28Bjyok1jMsbd.jpeg';
        $song->audio = 'audio_songs/1/Tinh Don Phuong - Lam Truong [128kbps_MP3].mp31509625271.mp3';
        $song->lyric = 'Nhiều lần ngập ngừng muốn ngõ ý.
Tiếng yêu đương sao chưa thành câu.
Sợ rằng đường về ko còn xa ,để bên em anh đưa lối về.
Nhiều lần trộm nhìn em thật lâu.
Nét thơ ngây chưa vương sầu lắng.
Nàng đẹp tựa ngàn muôn ánh sao.
Dịu dàng mong manh em xinh như cánh hoa đào.
Tình đơn phương .
Đôi khi thấy em cười vui lòng anh xao xuyến .
Nàng ơi hay biết chăng anh đã yêu từ lâu.
Mỗi khi bên em thơ ngây mà dằn lòng đừng nói ra.
E con tim trinh nguyên vương tình sầu chất ngất.
Sợ nụ hồng phai nhanh .em hờn em dỗi .
Anh mang cô đơn trên lối về.
Anh xin yêu em đơn phương thà rằng mình đừng nói ra.
Để mai đây bên em ta chung về lối cũ.
Dù lòng nhiều đớn đau yêu em từ lâu.';
        $song->description = 'Album: Mãi mãi một tình yêu Ra mắt năm: 1999.';
        $song->user_id = 1;
        $song->save();


        $song = new Song();
        $song->name = 'Sống xa anh chẳng dễ dàng';
        $song->image = 'image_songs/1/hGn2r6e08ayOqVTCT4RDK2ZQAD40ha6YPICn8Zp8.jpeg';
        $song->audio = 'audio_songs/1/Song Xa Anh Chang De Dang - Bao Anh [320kbps_MP3].mp31509625463.mp3';
        $song->lyric = 'Nhìn vào hư không ngước vô định vào xa xăm
Thở dài tiếc nuối biết bao ân hận với một người
Nặng lời nhau đau vỡ trái tim, người tổn thương đi rồi
Nhận ra phải sống xa anh chẳng dễ dàng, chẳng dễ dàng.

Ong đã biết cần hoa lấy mật
Biết đợi nắng sưởi ấm mỗi ngày
Em giờ không trẻ con như trước
Sẽ không để lạc nhau dù một bước.

[ĐK1:]
Nếu quá khứ có trở lại
Hứa với anh sẽ chẳng còn sự khờ dại
Và sẽ yêu anh êm đềm vững chãi
Gió thôi gợn sóng trả lại mặt hồ yên ả.

Có những nỗi nhớ lấn át
Chẳng biết vui bao giờ để nở nụ cười buồn
Trái tim em bây giờ chẳng khác
Có cả thế giới nhưng trong lòng lại chơi vơi
Vì anh chính là cả cuộc đời
Anh chiếm hết cả cuộc đời.

[Mr.Siro:]
Từ lâu tôi nghĩ rằng bao ngốc nghếch
Chịu đựng vì yêu ai cũng trải qua
Người yêu dỗi hờn hay trách móc là quan tâm đến ta
Chẳng hiểu sao hai đứa cứ xa dần
Thương nhưng vẫn không sao lại gần nữa.

[ĐK2:]
Nhắm mắt nhớ phút đắm đuối
Lúc đôi môi anh thì thầm gọi nhẹ babe
Thắm thiết hôn từ sau
Có những cảm giác ám ảnh chẳng thể phai màu.

I just can\'t stop missing you babe
Nhưng không ta đã kết thúc
Chẳng thể nói ra lời thật lòng muộn màng để nói câu
Em xin lỗi, buông xuôi quá khứ chấp nhận vùi bao nhớ thương
Dù ngọt đắng cũng chỉ vì anh.

[End:]
Nặng lời nhau đau vỡ trái tim, người tổn thương không về.';
        $song->description = 'Bài hát được hát sau khi chia tay người yêu của Bảo Anh';
        $song->user_id = 1;
        $song->save();


        $song = new Song();
        $song->name = 'Fly Away';
        $song->image = 'image_songs/1/99P8y8nT9z0IThmHRhwgLFqkQa9KYOUby18QZmA4.jpeg';
        $song->audio = 'audio_songs/1/Fly Away - TheFatRat_ Anjulie [320kbps_MP3].mp31509625627.mp3';
        $song->lyric = '[Intro]
Come and fly away with me
Come and fly away with me-e-e-e-e
Come and fly away with me
Co-co-come and fly away with me-e-e-e-e-e-e

[Intro]
Come and fly away with me
Come and fly away with me-e-e-e-e
Come and fly away with me
Co-co-come and fly away with me-e-e-e-e-e-e

[Pre-Build]
Don’t you be afraid
Everything will change
You and I
Jumping off the edge
They say dreamers never die

[Build]
So, come and fly
Come and fly
Come and fly away with me

[Chorus]
We’re rising, we’re falling
We’ll make it through
We’re climbing, we’re soaring
A thousand views

[Distorted Chorus]
We’re rising, we’re falling
We’ll make it through
We’re climbing, we’re soaring
A thousand views

[Verse 2]
Somewhere by the emerald sea
Where the moon and water meet
Somewhere close to harmony
When the world is sound asleep

[Verse 3]
Something\'s gonna bring a change
Journeys we are meant to take
Something at the edge of space
Calling us to fly away

[Pre-Build]
Don’t you be afraid
Everything will change
You and I
Jumping off the edge
They say dreamers never die

[Build]
So, come and fly
Come and fly
Come and fly away with me
[Chorus]
We’re rising, we’re falling
We’ll make it through
We’re climbing, we’re soaring
A thousand views

[Distorted Chorus]
We’re rising, we’re falling
We’ll make it through
We’re climbing, we’re soaring
A thousand views

[Break]
Come and fly away
Come and
Come and fly away
Come and fly away with me

[Break]
Come and fly away
Come and
Come and fly away
Come and fly away with me

[Verse 3 - Outro]
Something\'s gonna bring a change
Journeys we are meant to take
Something at the edge of space
Calling us to fly away';
        $song->description = 'Ca khúc của ca sĩ trên youtube';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hello';
        $song->image = 'image_songs/1/nyLnbEf7iJ3R6pVh46kbSssZy7Ju2Xs3qpFjEmuf.jpeg';
        $song->audio = 'audio_songs/1/Hello - Adele [320kbps_MP3].mp31509674554.mp3';
        $song->lyric = '"Hello"

Hello, it\'s me
I was wondering if after all these years you\'d like to meet
To go over everything
They say that time\'s supposed to heal ya
But I ain\'t done much healing
Hello, can you hear me?
I\'m in California dreaming about who we used to be
When we were younger and free
I\'ve forgotten how it felt
Before the world fell at our feet

There\'s such a difference between us
And a million miles

Hello from the other side
I must have called a thousand times
To tell you I\'m sorry for everything that I\'ve done
But when I call you never seem to be home
Hello from the outside
At least I can say that I\'ve tried
To tell you I\'m sorry for breaking your heart
But it don\'t matter, it clearly doesn\'t tear you apart
Anymore

Hello, how are you?
It\'s so typical of me to talk about myself, I\'m sorry
I hope that you\'re well
Did you ever make it out of that town
Where nothing ever happened?

It\'s no secret that the both of us
Are running out of time

So hello from the other side (other side)
I must have called a thousand times (thousand times)
To tell you I\'m sorry for everything that I\'ve done
But when I call you never seem to be home
Hello from the outside (outside)
At least I can say that I\'ve tried (I\'ve tried)
To tell you I\'m sorry for breaking your heart
But it don\'t matter, it clearly doesn\'t tear you apart
Anymore

(Highs, highs, highs, highs, lows, lows, lows, lows)
Anymore
(Highs, highs, highs, highs, lows, lows, lows, lows)
Anymore
(Highs, highs, highs, highs, lows, lows, lows, lows)
Anymore
(Highs, highs, highs, highs, lows, lows, lows, lows)
Anymore

Hello from the other side (other side)
I must have called a thousand times (thousand times)
To tell you I\'m sorry for everything that I\'ve done
But when I call you never seem to be home
Hello from the outside (outside)
At least I can say that I\'ve tried (I\'ve tried)
To tell you I\'m sorry for breaking your heart
But it don\'t matter, it clearly doesn\'t tear you apart
Anymore';
        $song->description = 'Bài hát được trình diễn năm 2015 bởi Adele';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hello';
        $song->image = 'image_songs/1/sBZhSik5hgeyqE0r6OZjAIcjSMHLlgAFgTozUeRF.jpeg';
        $song->audio = 'audio_songs/1/Hello - Lionel Richie_ Jennifer Nettles [320kbps_MP3].mp31509674878.mp3';
        $song->lyric = 'I\'ve been alone with you
Inside my mind
And in my dreams I\'ve kissed your lips
A thousand times
I sometimes see you
Pass outside my door
Hello!
Is it me you\'re looking for?
I can see it in your eyes
I can see it in your smile
You\'re all I\'ve ever wanted
And my arms are open wide
\'cause you know just what to say
And you know just what to do
And I want to tell you so much
I love you

I long to see the sunlight in your hair
And tell you time and time again
How much I care
Sometimes I feel my heart will overflow
Hello!
I\'ve just got to let you know
\'cause I wonder where you are
And I wonder what you do
Are you somewhere feeling lonely?
Or is someone loving you?
Tell me how to win your heart
For I haven\'t got a clue
But let me start by saying I love you

Hello!
Is it me you\'re looking for?
\'cause I wonder where you are
And I wonder what you do
Are you somewhere feeling lonely?
Or is someone loving you?
Tell me how to win your heart
For I haven\'t got a clue
But let me start by saying I love you';
        $song->description = 'Bài hát được trình diễn vào năm 1976 bởi nhóm nhạc The Eagles';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Don\'t Speak';
        $song->image = 'image_songs/1/SrghFiYk0UrK2VIuoNsrt4aCfGMcr1JbsaR17zXT.jpeg';
        $song->audio = 'audio_songs/1/Don_t Speak - No Doubt [320kbps_MP3].mp31509675227.mp3';
        $song->lyric = 'You and me
We used to be together
Everyday together always
I really feel
That I\'m losing my best friend
I can\'t believe
This could be the end
It looks as though you\'re letting go
And if it\'s real
Well I don\'t want to know
Don\'t speak
I know just what you\'re saying
So please stop explaining
Don\'t tell me \'cause it hurts
Don\'t speak
I know what you\'re thinking
I don\'t need your reasons
Don\'t tell me \'cause it hurts
Our memories
Well, they can be inviting
But some are altogether
Mighty frightening
As we die, both you and I
With my head in my hands
I sit and cry
Don\'t speak
I know just what you\'re saying
So please stop explaining
Don\'t tell me \'cause it hurts (no, no, no)
Don\'t speak
I know what you\'re thinking
I don\'t need your reasons
Don\'t tell me \'cause it hurts
It\'s all…';
        $song->description = 'Bài hát đoạt giải bài hát của năm 1995, được trình bày bởi nhóm nhạc No Doubt';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Forever And One';
        $song->image = 'image_songs/1/2Z4kFGtLIkzFG84D2gHpHEdvbl7sIPhwXD0oRgYr.jpeg';
        $song->audio = 'audio_songs/1/Forever And One - Helloween - Helloween [320kbps_MP3].mp31509675390.mp3';
        $song->lyric = 'What can I do?
Will I be getting through?
Now that I must try
To leave it all behind
Did you see
What you have done to me
So hard to justify
Slowly is passing by
Forever and one
I will miss you
However, I kiss you
Yet again
Way down in Neverland
So hard I was trying
Tomorrow I\'ll still be crying
How could you hide
Your lies, your lies
Here I am
Seeing you once again
My mind\'s so far away
My heart\'s so close
to stay
Too proud to fight
I\'m walking back into night
Will I ever find
Someone to believe?
Forever and one
I will miss you
However, I kiss you
Yet again
Way down in Neverland
So hard I was trying
Tomorrow I\'ll still be crying
How could you hide your lies
Your lies';
        $song->description = 'Bản nhạc rock được trình bày bởi nhóm nhạc Helloween';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Right Here Waiting';
        $song->image = 'image_songs/1/IvyLAH3tqifWhS1kWv7LvmT4HVKQ2vTO4okYsgcP.jpeg';
        $song->audio = 'audio_songs/1/Right Here Waiting - Richard Mar [320kbps_MP3].mp31509675607.mp3';
        $song->lyric = 'Oceans apart day after day
And I slowly go insane
I hear your voice on the line
But it doesn\'t stop the pain
If I see you next to never
How can we say forever
Wherever you go
Whatever you do
I will be right here waiting for you
Whatever it takes
Or how my heart breaks
I will be right here waiting for you
I took for granted, all the times
That I thought would last somehow
I hear the laughter, I taste the tears
But I can\'t get near you now
Oh, can\'t you see it baby
You\'ve got me going crazy
Wherever you go
Whatever you do
I will be right here waiting for you
Whatever it takes
Or how my heart breaks
I will be right here waiting for you
I wonder how we can survive
This romance
But in the end if I\'m with you
I\'ll take the chance
Oh, can\'t you see it baby
You\'ve got me going crazy
Wherever you go
Whatever you do
I will be right here waiting for you
Whatever it takes
Or how my heart breaks
I will be right here waiting for you
Waiting for you';
        $song->description = 'Được trình diễn vào năm 1989 bởi Richard Marx và đề cử giải Grammy cho giải giọng nam pop xuất sắc nhất';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hallelujah';
        $song->image = 'image_songs/1/A2YB9A606aH2I2sYGN7utAUb32XIpcY5A6K2Hx0u.jpeg';
        $song->audio = 'audio_songs/1/Hallelujah - Il Divo [320kbps_MP3].mp31509675708.mp3';
        $song->lyric = 'Un soldado a casa hoy regresó
Y un niño enfermo se curó
Y hoy no hay trabajo en el bosque
Que la lluvia
Un desamparado se salvó
Por causa de una buena acción
Y hoy nadie lo repudia
Aleluya
Aleluya, aleluya
Aleluya, aleluya
Un ateo que consiguió creer
Y un hambriento hoy tiene de comer
Y hoy donaron a una iglesia una fortuna
Que la guerra pronto se acabará
Y en el mundo al fin reinará la paz
Que no habrá miseria alguna
Aleluya
Aleluya, aleluya
Aleluya, aleluya
Por qué el amor no hace al amor
Y no gorbierne la cruzión si no
Lo bueno y lo mejor del alma pura
Por que Dios nos proteja de un mal final
Por que un día podamos escarmentar
Por que acaban con tanta furia
Aleluya
Aleluya, aleluya
Aleluya, aleluya
Aleluya, aleluya';
        $song->description = 'Trình bày năm 2008 bởi nhóm nhạc Il Divo';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Eyes On Me';
        $song->image = 'image_songs/1/oTDG7lVvLiwtyZyhQtFwjY7UAMMpkVbKnpCUWAFX.jpeg';
        $song->audio = 'audio_songs/1/Eyes On Me - Vuong Phi [320kbps_MP3].mp31509675872.mp3';
        $song->lyric = 'Whenever sang my songs
On the stage, on my own
Whenever said my words
Wishing they would be heard
I saw you smiling at me
Was it real or just my fantasy
You\'d always be there in the corner
Of this tiny in little bar
My last night here for you
Same old songs, just once more
My last night tear with you?
Maybe yes, maybe no
I kind of liked it to your way
How you shyly placed your eyes on me
Oh, did you ever know?
That I had mine on you
Darling, so there you are
With that look on your face
As if you\'re never hurt
As if you\'re never down
Shall I be the one for you
Who pinches you softly but sure
If frown is shown then
I will know that you are no dreamer
So let me come to you
Close as I wanted to be
Close enough for me
To feel your heart beating fast
And stay there as I whisper
How I loved your peaceful eyes on me
Did you ever know
That I had mine on you
Darling, so share with me
Your love if you have enough
your tears if you\'re holding back
Or pain if that\'s what it is
How can I let you know
I\'m more than the dress and the voice
Just reach me out then
You will know that you\'re not dreaming
Darling, so there you are
With that look on your face
As if you\'re never hurt
As if you\'re never down
Shall I be the one for you
Who pinches you softly but sure
If frown is shown then
I will know that you are no dreamer';
        $song->description = 'Được trình bày bởi Vương Phi(Faye Wong) và là nhạc game chính trong game Final Fantasy VIII';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Forever';
        $song->image = 'image_songs/1/FC8bKtHedB5ktWywmU4a6GdXmAf7yUXeBcr1DfbU.jpeg';
        $song->audio = 'audio_songs/1/Forever - Stratovarius [320kbps_MP3].mp31509676039.mp3';
        $song->lyric = 'I stand alone in the darkness
the winter of my life came so fast
memories go back to my childhood
to days I still recall

Oh how happy I was then
there was no sorrow there was no pain
walking through the green fields
sunshine in my eyes

I\'m still there everywhere
I\'m the dust in the wind
I\'m the star in the northern sky
I never stayed anywhere
I\'m the wind in the trees
would you wait for me forever?';
        $song->description = 'Nhạc nền phim mối tình đầu';
        $song->user_id = 1;
        $song->save();
    }
}
