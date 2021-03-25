@extends('web.support.theme')
@section('title', 'Home')
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
                                <div class="hero-silderr">
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
                                <!-- START: Features -->
                                <div class="container-fluid">
                                    <div class="row giveaway-row">
                                        <div class="col-md-4">
                                            <div class="giveaway-block">
                                                <div id="image">
                                                    <img src="{{URL::to('/dist/web/assets/images/giveaway-bg.png')}}">
                                                </div>
                                                <div id = "overlay1"></div>
                                                <div class="title">Hourly Giveaway</div>
                                                @if(isset($give1))
                                                    <div class="label">{{$give1->skin->hash_name}}</div>
                                                    <img class="icon" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$give1->skin_id}}-{{$give1->skin->thumbnail}}" style="background-image: url('{{URL::to('/dist/web/assets/images/icon-shade.png')}}');">
                                                    <div class="time">Price: <strong>{{empty($give1->price) ? 'Free' : $give1->price.' $' }}</strong></div>
                                                    @php 
                                                        $j1 = 0;
                                                    @endphp
                                                    @if(Auth::check())
                                                        @foreach($give1->participate as $part)
                                                            @if($part->user_id == Auth::user()->id)
                                                                @php
                                                                    $j1 = 1;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if($j1 == 0)
                                                        <a href="{{URL::to('/')}}/giveaway/join/{{ base64_encode($give1->id) }}" class="join">Click to Join</a>
                                                    @else
                                                        <a href="javascript::void()" class="join">Joined &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    @endif
                                                @else
                                                    <div class="comingson">
                                                        <h1>Coming Soon</h1>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="giveaway-block">
                                                <div id="image">
                                                    <img src="{{URL::to('/dist/web/assets/images/giveaway-bg.png')}}">
                                                </div>
                                                <div id = "overlay1"></div>
                                                <div class="title">Daily Giveaway</div>
                                                @if(isset($give2))
                                                    <div class="label">{{$give2->skin->hash_name}}</div>
                                                    <img class="icon" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$give2->skin_id}}-{{$give2->skin->thumbnail}}" style="background-image: url('{{URL::to('/dist/web/assets/images/icon-shade.png')}}');">
                                                    <div class="time">Price: <strong>{{empty($give2->price) ? 'Free' : $give2->price.' $' }}</strong></div>
                                                    @php 
                                                        $j2 = 0;
                                                    @endphp
                                                    @if(Auth::check())
                                                        @foreach($give2->participate as $part)
                                                            @if($part->user_id == Auth::user()->id)
                                                                @php
                                                                    $j2 = 1;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if($j2 == 0)
                                                        <a href="{{URL::to('/')}}/giveaway/join/{{ base64_encode($give2->id) }}" class="join">Click to Join</a>
                                                    @else
                                                        <a href="javascript::void()" class="join">Joined &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    @endif
                                                @else
                                                    <div class="comingson">
                                                        <h1>Coming Soon</h1>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="giveaway-block">
                                                <div id="image">
                                                    <img src="{{URL::to('/dist/web/assets/images/giveaway-bg.png')}}">
                                                </div>
                                                <div id = "overlay1"></div>
                                                <div class="title">Weekly Giveaway</div>
                                                @if(isset($give3))
                                                    <div class="label">{{$give3->skin->hash_name}}</div>
                                                    <img class="icon" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$give3->skin_id}}-{{$give3->skin->thumbnail}}" style="background-image: url('{{URL::to('/dist/web/assets/images/icon-shade.png')}}');">
                                                    <div class="time">Price: <strong>{{empty($give3->price) ? 'Free' : $give3->price.' $' }}</strong></div>
                                                    @php 
                                                        $j3 = 0;
                                                    @endphp
                                                    @if(Auth::check())
                                                        @foreach($give3->participate as $part)
                                                            @if($part->user_id == Auth::user()->id)
                                                                @php
                                                                    $j3 = 1;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if($j3 == 0)
                                                        <a href="{{URL::to('/')}}/giveaway/join/{{ base64_encode($give3->id) }}" class="join">Click to Join</a>
                                                    @else
                                                        <a href="javascript::void()" class="join">Joined &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    @endif
                                                @else
                                                    <div class="comingson">
                                                        <h1>Coming Soon</h1>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="nk-gap-2"></div>
 -->                            </div>
                                <!-- END: Features -->
                            </div>
                        </div>
                    </div>
                    
                </div>
            <!-- END: Header Title -->

            
            <!-- START: Rev Slider -->
            <div class="container-fluid">
                <div class="nk-gap-2"></div>
                <span class="nk-title display-5 block-title">Featured Cases</span>
                <div class="row section-block">
                    @if($featured->count() > 0)
                        @foreach($featured as $key => $case)
                            <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                <div class="top-wins-box">
                                    <a href="{{URL::to('/case/'.preg_replace('/\s+/', '_', $case->label).'/'.base64_encode($case->id))}}">
                                        <div class="top-win-cases">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                        </div>
                                        <div class="case-name-price">
                                            <span class="case-price">{{empty($case->price) ? 'Free' : number_format($case->price, 2).' $' }}</span>
                                        </div>
                                        <div class="case-name">
                                            <h6>{{$case->label}}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <h3 class="no-found">No Cases are available</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- END: Rev Slider -->



            <div class="nk-gap-6"></div>
            <!-- START: Rev Slider -->
            <div class="container-fluid">
                <span class="nk-title display-5 block-title">Official Cases</span>
                <div class="row section-block">
                    @if($official->count() > 0)
                        @foreach($official as $key => $case)
                            <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                <div class="top-wins-box">
                                    <a href="{{URL::to('/case/'.preg_replace('/\s+/', '_', $case->label).'/'.base64_encode($case->id))}}">
                                        <div class="top-win-cases">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                        </div>
                                        <div class="case-name-price">
                                            <span class="case-price">{{empty($case->price) ? 'Free' : number_format($case->price, 2).' $' }}</span>
                                        </div>
                                        <div class="case-name">
                                            <h6>{{$case->label}}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <h3 class="no-found">No Cases are available</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- END: Rev Slider -->



            <div class="nk-gap-6"></div>
            <!-- START: Rev Slider -->
            <div class="container-fluid">
                <span class="nk-title display-5 block-title">Popular Cases</span>
                <div class="row section-block">
                    @if($popular->count() > 0)
                        @foreach($popular as $key => $case)
                            <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                <div class="top-wins-box">
                                    <a href="{{URL::to('/case/'.preg_replace('/\s+/', '_', $case->label).'/'.base64_encode($case->id))}}">
                                        <div class="top-win-cases">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                        </div>
                                        <div class="case-name-price">
                                            <span class="case-price">{{empty($case->price) ? 'Free' : number_format($case->price, 2).' $' }}</span>
                                        </div>
                                        <div class="case-name">
                                            <h6>{{$case->label}}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <h3 class="no-found">No Cases are available</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- END: Rev Slider -->

            @include('web.support.counter')

           

@endsection
@section('addScript')
	
	    
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