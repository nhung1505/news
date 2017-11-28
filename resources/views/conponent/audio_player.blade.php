<div class="music-right">
    <!--/video-main-->
    <div class="video-main">
        <div class="video-record-list">
            <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                <div class="jp-type-playlist">
                    <div id="jquery_jplayer_1" class="jp-jplayer" style="width: 480px; height: 270px;">
                        <img id="jp_poster_0" src="" style="width: 480px; height: 270px; display: inline;">
                        <video id="jp_video_0" preload="metadata" src="http://192.168.30.9/vijayaa/2015/Dec/mosaic/web/video/Ellie-Goulding.webm" title="1. Ellie-Goulding" style="width: 0px; height: 0px;">

                        </video>
                    </div>
                    <div class="jp-gui">
                        <div class="jp-video-play" style="display: block;">
                            <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                        </div>
                        <div class="jp-interface">
                            <div class="jp-progress">
                                <div class="jp-seek-bar" style="width: 100%;">
                                    <div class="jp-play-bar" style="width: 0%;"></div>
                                </div>
                            </div>
                            <div class="jp-current-time" role="timer" aria-label="time">00:00</div>
                            <div class="jp-duration" role="timer" aria-label="duration">00:18</div>
                            <div class="jp-controls-holder">
                                <div class="jp-controls">
                                    <button class="jp-previous" role="button" tabindex="0">previous</button>
                                    <button class="jp-play" role="button" tabindex="0">play</button>
                                </div>
                                <div class="jp-volume-controls">
                                    <button class="jp-mute" role="button" tabindex="0">mute</button>
                                    <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                    <div class="jp-volume-bar">
                                        <div class="jp-volume-bar-value" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="jp-toggles">
                                    <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                </div>
                            </div>
                            <div class="jp-details" style="display: none;">
                                <div class="jp-title" aria-label="title">1. Ellie-Goulding</div>
                            </div>
                        </div>
                    </div>
                    <div class="jp-playlist">
                        <ul style="display: block;">
                            @foreach($songs as $song)
                                <div>
                                    <a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a>
                                    <a href="javascript:;" class="jp-playlist-item jp-playlist-current" tabindex="0">
                                        {{$song->name}}
                                        <span class="jp-artist">by Pixar</span>
                                    </a>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="jp-no-solution" style="display: none;">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- script for play-list -->
    <link href="{{ asset('css/jplayer.blue.monday.min.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery.jplayer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jplayer.playlist.js')}}"></script>
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){
            new jPlayerPlaylist({
                jPlayer: "#jquery_jplayer_1",
                cssSelectorAncestor: "#jp_container_1"
            }, [
                    @foreach($songs as $song)
                {
                title:"{{$song->name}}",
                artist:"",
                mp3:"{{asset('storage/'.$song->audio)}}",
                oga:"{{asset('storage/'.$song->audio)}}",
                poster: "{{asset('storage/'.$song->image)}}"
        },
                @endforeach
            ], {
                playlistOptions: {
                    autoPlay: true,
                    enableRemoveControls: false,
                    loopOnPrevious: true,
                    shuffleOnLoop: true
                },
                loop: true,
                swfPath: "{{asset('swf/jquery.jplayer.swf')}}",
                solution: "flash,html",
                supplied: "webmv, ogv, m4v, oga, mp3",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: false,
                audioFullScreen: false,
                remainingDuration: true,
                toggleDuration: true
            });
        });
        //]]>
    </script>
</div>
    <!-- script for play-list -->
    <link href="{{asset('css/css/jplayer.blue.monday.min.css')}}" rel="stylesheet" type="text/css">
    <!-- //script for play-list -->
    <!--/start-paricing-tables-->
</div>