/**
 * Created by luong on 10/11/2017.
 */
function openAlbum() {
    document.getElementById("myAlbum").style.display = "block";
    document.getElementById("myAlbum").style.width = "300px";


}

function closeAlbum() {
    document.getElementById("myAlbum").style.display = "none";
}


function myFunction() {
    return confirm("Are you sure ?");
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$("#lyric-song-full").hide();
function seeAlllyric() {
    $("#lyric-song").hide();
    $("#lyric-song-full").show();
}
function back_lyricsong() {
    $("#lyric-song").show();
    $("#lyric-song-full").hide();
}

$("#unlike").hide();

function like() {
    $("#like").hide();
    $("#unlike").show();
}

function unlike() {
    $("#like").show();
    $("#unlike").hide();
}

$("#AllComment").hide();
function AllComment() {
    $("#itemComment").hide();
    $("#AllComment").show();
}

function itemComment() {
    $("#itemComment").show();
    $("#AllComment").hide();
}



$(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
        auto: true,
        pager:true,
        nav:true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });


});



$(document).ready(function() {
    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
});


$(window).load(function() {
    $("#flexiselDemo1").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 2
            },
            landscape: {
                changePoint:640,
                visibleItems: 3
            },
            tablet: {
                changePoint:800,
                visibleItems: 4
            }
        }
    });
});