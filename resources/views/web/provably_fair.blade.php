@extends('web.support.theme')
@section('title', 'Provably Fair')
@section('content')


            <!-- START: Header Title -->
                <div class="nk-header-title nk-header-title-lg nk-header-title-parallax nk-header-title-parallax-opacity">
                    <div class="bg-image">
                        <img src="{{URL::to('/')}}/dist/web/assets/images/image-1.jpg" alt="" class="jarallax-img">
                    </div>
                    <div class="nk-header-table">
                        <div class="nk-header-table-cell">
                            <div class="container-fluid">
                                <!-- START: Rev Slider -->
                                <div class="hero-silderr set-all">
                                <span class="nk-title display-5 block-title">Live Case Open</span>
                                    <div class="customer-logos">
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/1.png')}}">
                                        <p class="title">OMEGA</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/2.png')}}">
                                        <p class="title">TOOTH</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/3.png')}}">
                                        <p class="title">BUBBLE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/4.png')}}">
                                        <p class="title">HIVE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/5.png')}}">
                                        <p class="title">STRIKE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/6.png')}}">
                                        <p class="title">VISION</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/7.png')}}">
                                        <p class="title">TOXIC</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/8.png')}}">
                                        <p class="title">DREAM</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/9.png')}}">
                                        <p class="title">SHADOW</p>
                                      </a>
                                    </div>
                                </div>
                                <!-- END: Rev Slider -->
                            </div>
                        </div>
                    </div>
                    
                </div>
            <!-- END: Header Title -->


            <!-- Start Provably Fair -->

            <section class="provably-sec">
                <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>PROVABLY FAIR</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-8 mx-auto">
                            <div class="provably-dec">
                                <p>To prove that all results on DAT Drop are truly random, we utilize a provably fair system.</p>
                                <span class="points-cs"></span><p>You can check provably fair for cases, battles and upgrades.</p>
                                <span class="points-cs"></span><p>If you are not familiar with "provably fair", read this article.</p>
                                <span class="points-cs"></span><p>DatDrop provides Roll Validator Form, if you want to check roll number, click "Verify".</p>
                                <span class="points-cs"></span><p>DatDrop shared "provably fair" algorithm. If you want to check algorithm source code and verify roll number for cases and upgrade, follow this URL.</p>
                                <span class="points-cs"></span><p>For battles we use 3rd-party service Random.org tickets to generate random string (beacon). Click here to get more information about how it works. You can check algorithm source code and verify roll number for battles here.</p>
                            </div>
                        </div>
                    </div>


                    <!-- =====After Login Section Start===== -->
                    <!-- ============================= -->
                    @if(Auth::check())
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>CURRENT SERVER SEED</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-10 mx-auto">
                            <div class="prob-typ-val-tbl">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                      <tr>
                                        <th>TYPE</th>
                                        <th>VALUE</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="table-dark-org">
                                        <td>SEED ID</td>
                                        <td>1033783</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>PUBLIC HASH</td>
                                        <td>fde318bb493056709e51c44789d4554090105240828caa4edf2ce37dd89d2d75</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>NONCE</td>
                                        <td>1</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>CREATED AT</td>
                                        <td>2020-09-01 04:07:48</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>ACTION</td>
                                        <td>In order to verify the roll for items received with the current seed, you need to reveal server seed hash.<a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span><span>Reveal Server Hash</span></span></span><span class="link-effect-r"><span><span>Reveal Server Hash</span></span></span><span class="link-effect-shade"><span><span>Reveal Server Hash</span></span></span></span></a></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-10 mx-auto">
                            <div class="btnx-rols-clnt">
                                <a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span><span>Roll Verifier</span></span></span><span class="link-effect-r"><span><span>Roll Verifier</span></span></span><span class="link-effect-shade"><span><span>Roll Verifier</span></span></span></span></a>
                                <a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready"><span class="link-effect-inner"><span class="link-effect-l"><span><span>Change client seed</span></span></span><span class="link-effect-r"><span><span>Change client seed</span></span></span><span class="link-effect-shade"><span><span>Change client seed</span></span></span></span></a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- =====After Login Section End===== -->
                    <!-- ============================= -->
                    
                </div>
            </section>
            <!-- Provably Fair End -->



<script type="text/javascript">
        var tpj=jQuery;
        var revapi50;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_50_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_50_1");
            }else{
                revapi50 = tpj("#rev_slider_50_1").show().revolution({
                    sliderType:"carousel",
                    jsFileLocation:"assets/vendor/revolution/js/",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        onHoverStop:"off",
                    },
                    carousel: {
                        maxRotation: 8,
                        vary_rotation: "off",
                        minScale: 20,
                        vary_scale: "off",
                        horizontal_align: "center",
                        vertical_align: "center",
                        fadeout: "off",
                        vary_fade: "off",
                        maxVisibleItems: 3,
                        infinity: "on",
                        space: -90,
                        stretch: "off"
                    },
                    responsiveLevels:[1240,1024,778,480],
                    gridwidth:[800,600,400,320],
                    gridheight:[600,400,320,280],
                    lazyType:"none",
                    shadow:0,
                    spinner:"off",
                    stopLoop:"on",
                    stopAfterLoops:0,
                    stopAtSlide:0,
                    shuffle:"off",
                    autoHeight:"off",
                    fullScreenAlignForce:"off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });

        $(document).ready(function(){
          $('.customer-logos').slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            }, {
              breakpoint: 520,
              settings: {
                slidesToShow: 2
              }
            }]
          });
        });
    </script>


@endsection