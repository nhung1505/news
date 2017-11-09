<?php

use Illuminate\Database\Seeder;
use App\Song;

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
        $song->image = "image_songs/1/y81Rl33PuZKAHIKf9ZMPbDEuocjIKr7vo1e6Tn3H.jpeg";
        $song->audio = 'audio_songs/1/cxUJHcWca7GMi3aHZd5ErTS2AlRWILbLUizxTmgK.mpga';
        $song->lyric = '
        Đã không còn người yêu hỡi ngày xưa ấy đôi ta bên nhau không rời
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
        Giấc mơ đầu        
        ';
        $song->description = 'Được sáng tác vào năm 2002 bởi nhạc sĩ Nguyễn Văn Chung';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Tình đơn phương';
        $song->image = "image_songs/1/Cq1i95YMiH0Fbz5WpB7pBvs7JNmIQ00AZHbuhthq.jpeg";
        $song->audio = 'audio_songs/1/MgL2BFokC9JfNRBXlYIJ7gKmwQEqh8V806jPjce8.mpga';
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
Dù lòng nhiều đớn đau yêu em từ lâu.        
        ';
        $song->description = 'Được biểu diễn lại bởi ca sĩ Lam Trường';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Sống xa anh chẳng dễ dàng';
        $song->image = "image_songs/1/fveCslwbdsBXMlKQqawid9fO9tvJ9xuoBqpXTr8Z.jpeg";
        $song->audio = 'audio_songs/1/9O1rBIKR5hKD2DhG3sVT40Gq9TDd3f0OL2x4GaSM.mpga';
        $song->lyric = '
        Nhìn vào hư không ngước vô định vào xa xăm
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
Nặng lời nhau đau vỡ trái tim, người tổn thương không về.        
        ';
        $song->description = 'Được ca sĩ Bảo Anh hát sau khi chia tay người yêu.';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Forever';
        $song->image = "image_songs/1/LEHftRR4QdVmt191onL3VtIdmapu0WvEGJHYSlDy.jpeg";
        $song->audio = 'audio_songs/1/rCkkaBXFyzsaraNZMmTZXMmQh2IULkAsihBC4tSC.mpga';
        $song->lyric = '
        I stand alone in the darkness
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
would you wait for me forever?       
        ';
        $song->description = 'Nhạc phim mối tình đầu nổi tiếng.';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Forever and one';
        $song->image = "image_songs/1/ZbFlXlYotDxpNE3QRHfHMuv0bjGHYTEDUCTzVWqR.jpeg";
        $song->audio = 'audio_songs/1/eq8X87hS6mL2VcDNwoWmQ9XIjdmSePO9Lj7EmjvD.mpga';
        $song->lyric = '
        What can I do?
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
Your lies       
        ';
        $song->description = 'Trình diễn bởi nhóm nhạc rock Helloween vào năm 1996';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Fly away';
        $song->image = "image_songs/1/EmOs8jfZBYubvYTR5BOdtStxhTiK6IAQwikRkClA.jpeg";
        $song->audio = 'audio_songs/1/7IizyqvgGYtZO4rFPEuO4jTK3yupBTTnYpspGggt.mpga';
        $song->lyric = '
        [Intro]
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
Calling us to fly away     
        ';
        $song->description = 'Được biểu diễn bởi ca sĩ The Fat Rat trên youtube';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hallelujah';
        $song->image = "image_songs/1/k0c5TWm4sIeuGx1sPtRBhfQlcRoemmIxMFHPFzve.jpeg";
        $song->audio = 'audio_songs/1/d3LwNoslcr70Tw0V92pDtBiu4rouhEJs17ioBYUV.mpga';
        $song->lyric = '
        Un soldado a casa hoy regresó
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
Aleluya, aleluya       
        ';
        $song->description = 'Được biểu diễn bởi nhóm nhạc Il Divo vào năm 2008.';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hello';
        $song->image = "image_songs/1/Q86ZUvKkC0DW0VIvUkchXkkI2sYIwlnyXVP6ZLEr.jpeg";
        $song->audio = 'audio_songs/1/hWEyisVlaO4tyUrBxEXJPIRyfkYbu47huOgwOwUf.mpga';
        $song->lyric = '
        I\'ve been alone with you
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
But let me start by saying I love you       
        ';
        $song->description = 'Được biểu diễn bởi ca sĩ Lionel Richie vào năm 1983';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hello';
        $song->image = "image_songs/1/S5psWHUp5qRm2iuvM37dIRzECGBwzWenFwpuJR6c.jpeg";
        $song->audio = 'audio_songs/1/sQ6XRWBhogOC8DvIgGItAEiyNKiwez1zGaoR30rO.mpga';
        $song->lyric = '
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
Anymore   
        ';
        $song->description = 'Được biểu diễn bởi ca sĩ Adele vào năm 2015.';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Right here waiting';
        $song->image = "image_songs/1/PxBax6FJwmW4gn2ur47grpReM9yNq9HGMrikTR9f.jpeg";
        $song->audio = 'audio_songs/1/QlEh6QYxzRVaIMuNJlbfArFuZS7F7AZskdXOnUkb.mpga';
        $song->lyric = '
        Oceans apart day after day
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
Waiting for you       
        ';
        $song->description = 'Biểu diễn bởi Richard Marx vào năm 1989';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Hotel California';
        $song->image = "image_songs/1/GYn5ogaAaSrl9U2qvicLGLbRxCPDblJLuYjKhLfo.jpeg";
        $song->audio = 'audio_songs/1/yCB8qcaaQSfcC5sHghvxKWfEqENTxJniR6dTXdU3.mpga';
        $song->lyric = '
        On a dark desert highway, cool wind in my hair
Warm smell of colitas, rising up through the air
Up ahead in the distance, I saw a shimmering light
My head grew heavy and my sight grew dim
I had to stop for the night
There she stood in the doorway;
I heard the mission bell
And I was thinking to myself,
"This could be Heaven or this could be Hell"
Then she lit up a candle and she showed me the way
There were voices down the corridor,
I thought I heard them say...

Welcome to the Hotel California
Such a lovely place (Such a lovely place)
Such a lovely face
Plenty of room at the Hotel California
Any time of year (Any time of year)
You can find it here

Her mind is Tiffany-twisted, she got the Mercedes bends
She got a lot of pretty, pretty boys she calls friends
How they dance in the courtyard, sweet summer sweat.
Some dance to remember, some dance to forget

So I called up the Captain,
"Please bring me my wine"
He said, "We haven\'t had that spirit here since nineteen sixty nine"
And still those voices are calling from far away,
Wake you up in the middle of the night
Just to hear them say...

Welcome to the Hotel California
Such a lovely place (Such a lovely place)
Such a lovely face
They livin\' it up at the Hotel California
What a nice surprise (what a nice surprise)
Bring your alibis

Mirrors on the ceiling,
The pink champagne on ice
And she said "We are all just prisoners here, of our own device"
And in the master\'s chambers,
They gathered for the feast
They stab it with their steely knives,
But they just can\'t kill the beast

Last thing I remember, I was
Running for the door
I had to find the passage back
To the place I was before
"Relax, " said the night man,
"We are programmed to receive.
You can check-out any time you like,
But you can never leave! "       
        ';
        $song->description = 'Biểu diễn bởi nhóm nhạc The Eagles vào năm 1976';
        $song->user_id = 1;
        $song->save();

        $song = new Song();
        $song->name = 'Don\'t Speak';
        $song->image = "image_songs/1/pLV6XdvXbnmKMjBy6scYKOuJNw5FU7MGADyYUuVR.jpeg";
        $song->audio = 'audio_songs/1/84OgpCAhYXIQLvUshCG9k6ORrekKuzd9dAH2lAm7.mpga';
        $song->lyric = '
        You and me
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
It\'s all ending
I gotta stop pretending who we are
You and me I can see us dying, are we?
Don\'t speak
I know just what you\'re saying
So please stop explaining
Don\'t tell me \'cause it hurts (no, no, no)
Don\'t speak
I know what you\'re thinking
And I don\'t need your reasons
Don\'t tell me \'cause it hurts
Don\'t tell me \'cause it hurts!
I know what you\'re saying
So please stop explaining
Don\'t speak
Don\'t speak
Don\'t speak
Oh I know what you\'re thinking
And I don\'t need your reasons
I know you\'re good
I know you\'re good
I know you\'re real good
Oh, la la la la la la, la la la la la la
Don\'t, don\'t, uh-huh hush, hush darlin\'
Hush, hush darlin\' hush, hush
Don\'t tell me tell me \'cause it hurts
Hush, hush darlin\' hush, hush darlin\'
Hush, hush don\'t tell me tell me \'cause it hurts    
        ';
        $song->description = 'Biểu diễn bởi nhóm nhạc No Doubt vào năm 1995s';
        $song->user_id = 1;
        $song->save();
    }
}
