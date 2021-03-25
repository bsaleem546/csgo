@extends('web.support.theme')
@section('title', 'Battle')
@section('content')
	
            <!-- Start Top Wins -->

            <section class="ballte-sec">
                <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Battle opening</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-golden-00 row-justify">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="batle-HTP">
                                <div class="htp-box">
                                    <a href="how-to-work.html">how to Play?</a>
                                </div>
                                <div class="fair-box">
                                    <a href="#" data-toggle="modal" data-target="#fairness"><img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/fairnes.png"> <span>Fairness</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="crete-bat-btnx">
                                <a href="create-battle" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready">
                                    <span class="link-effect-inner">
                                        <span class="link-effect-l">
                                            <span>
                                                <span>Create battles</span>
                                            </span>
                                        </span>
                                        <span class="link-effect-r">
                                            <span>
                                                <span>Create battles</span>
                                            </span>
                                        </span>
                                        <span class="link-effect-shade">
                                            <span>
                                                <span>Create battles</span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="tbl-bat">
                            <table class="table table-hover tabl-respsve">
                                <thead class="tbl-thead">
                                    <tr>
                                        <th style="width: 110px;">Rounds</th>
                                        <th>Battle Scenario</th>
                                        <th style="width: 90px;">Cost</th>
                                        <th style="width: 110px;">Players</th>
                                        <th style="width: 190px;"></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody-box">
                                    @foreach($battles as $key => $battle)
                                    <tr class="table-light-org tb-box">
                                        <td>
                                            <div class="justify-td">
                                                <div class="td-pad">
                                                    <div class="td-no active"> 1 </div>
                                                    <div class="active-runing">
                                                        <span>Running</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="batle-img-box"><?php $cost =0; ?>
                                                @foreach($battle->battleinfo as $b_detail)
                                                <div class="bat-bg-img mil-00">
                                                    @if($b_detail->qty > 1)<div class="tag-bat"><span>X{{$b_detail->qty}}</span></div>@endif
                                                    <?php $cost+=$b_detail->case->price*$b_detail->qty ?>
                                                    <div class="bat-inr ">
                                                        <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$b_detail->case->id}}-{{$b_detail->case->thumbnail}}">
                                                    </div>
                                                </div>
                                                @endforeach
                                                <!-- <div class="bat-bg-img mil-01">
                                                    <div class="bat-inr">
                                                        <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/giveaway-thumbs/9.png">
                                                    </div>
                                                </div> -->
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="justify-td">
                                                <div class="td-pad">
                                                    <div class="td-cost">${{$cost}} </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="justify-td">
                                                <div class="td-pad">
                                                    <div class="td-plyes"> {{count($battle->players)}}/2 </div>
                                                    <div class="plyers-box">
                                                        @foreach($battle->players as $key => $val)
                                                            <span class="ply-img">
                                                                <img class="img-fluid" src="{{$val->user->avatar}}">
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="justify-td">
                                                <div class="td-pad">
                                                    <a href="watch-battle/{{base64_encode($battle->id)}}" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready">
                                                        <span class="link-effect-inner">
                                                            <span class="link-effect-l">
                                                                <span>
                                                                    <span>Watch battles</span>
                                                                </span>
                                                            </span>
                                                            <span class="link-effect-r">
                                                                <span>
                                                                    <span>Watch battles</span>
                                                                </span>
                                                            </span>
                                                            <span class="link-effect-shade">
                                                                <span>
                                                                    <span>Watch battles</span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                   @if(count($battles) == 0)
                                    <tr>
                                        <td colspan="5"><br><h5>No Battles Available.</h5></td>
                                    </tr>
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </section>

            <!-- Top Wins End -->




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