<!DOCTYPE html>    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | DatDrop.net</title>
    <link rel="icon" type="image/png" href="{{URL::to('/')}}/dist/web/assets/images/favicon.png">

    <!-- START: Styles -->

        @include('web.support.style')
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="{{URL::to('/')}}/dist/web/assets/vendor/jquery/dist/jquery.min.js"></script>
    
    
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    <!-- START: Page Preloader -->
        <div class="nk-preloader">
            <div class="nk-preloader-bg"
                 style="background-color: #000;"
                 data-close-frames="23"
                 data-close-speed="1.2"
                 data-close-sprites="{{URL::to('/')}}/dist/web//assets/images/preloader-bg.png"
                 data-open-frames="23"
                 data-open-speed="1.2"
                 data-open-sprites="{{URL::to('/')}}/dist/web//assets/images/preloader-bg-bw.png">
            </div>

            <div class="nk-preloader-content">
                <div>
                    <img class="nk-img" src="{{URL::to('/')}}/dist/web/assets/images/logo-n.png" alt="Logo" width="170">
                    <div class="nk-preloader-animation"></div>
                </div>
            </div>

            <div class="nk-preloader-skip">Skip</div>
        </div>
    <!-- END: Page Preloader -->

        <div class="nk-page-background op-5" data-video="https://youtu.be/UkeDo1LhUqQ" data-video-loop="true" data-video-mute="true" data-video-volume="0" data-video-start-time="0" data-video-end-time="0" data-video-pause-on-page-leave="true" style="background-image: url('{{URL::to('/')}}/dist/web/assets/images/page-background.jpg');"></div>
    <!-- END: Page Background -->

        <div class="nk-page-background-audio d-none" data-audio="{{URL::to('/')}}/dist/web/assets/mp3/purpleplanetmusic-desolation.mp3" data-audio-volume="100" data-audio-autoplay="true" data-audio-loop="true" data-audio-pause-on-page-leave="true"></div>
    <!-- END: Page Background -->

        
        
    <!-- START: Page Border -->
        <div class="nk-page-border">
            <div class="nk-page-border-t"></div>
            <div class="nk-page-border-r"></div>
            <div class="nk-page-border-b"></div>
            <div class="nk-page-border-l"></div>
        </div>
    <!-- END: Page Border -->


    
        

    @include('web.support.header')
    

    <div class="nk-main">
        
            
            @yield('content')
        
            <!-- START: Footer -->
                @include('web.support.footer')
            <!-- END: Footer -->

        
    </div>

    <div id="notify" style="display: none;" class="nk-cookie-alert">
        <span class="nk-cookie-alert-close">
            <span class="nk-icon-close"></span>
        </span>
        <div id="notify-content">
            
        </div>
    </div>

    
<!-- START: Scripts -->
    
    @include('web.support.script')
    @if(Auth::check())
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;
            var uid = {{Auth::user()->id}};
            var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
              cluster: '{{env("PUSHER_APP_CLUSTER")}}'
            });

            var channel = pusher.subscribe('check_participant.'+uid);
            channel.bind('checkParticipant', function(data) {
                var res = data.split("|");
                $('#notify').html('<strong>'+res[1]+'</strong> joined the battle.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="nk-gap"></div><a href="{{URL::to('/watch-battle')}}/'+res[0]+'" class="nk-cookie-alert-confirm nk-btn link-effect-4 nk-btn-bg-white nk-btn-color-dark-1">Watch</a>')
                $('#notify').css({
                    display: "block"
                });
            });
        </script>
    @endif
    @yield('addScript')
</body>
</html>
