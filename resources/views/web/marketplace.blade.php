@extends('web.support.theme')
@section('title', 'Marketplace')
@section('content')
	
            
            <!-- Start Top Wins -->

            <section class="top-wins-sec">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Marketplace</h2>     
                                 <div class="alert alert-warning" style="font-size: 15px;">
                                   You can use Marketplace balance to buy skins p2p. Please add balance from inventory by selecting 'Cash Out' Option.  
                                 </div> 
                            </div>
                        </div>
                        @if(Auth::check()) 
                        <div class = "MarketBalance" style="right: -20px; position: relative; top: 10px; margin-top: -5px; font-variant-caps: all-small-caps; font-size: 25px;">
                             <text> <strong> Market Balance: {{number_format(Auth::user()->wallet->refund, 2)}}$</strong> </text> 
                        </div> 
                        @endif
                    </div>

                    <div class="row mrg-top">
                        @foreach($databelt as $key => $da)
                            @php 
                                $name = explode(' | ', $da->skin->hash_name);
                                $oldprice = $da->sugg_price;
                                $newprice = $da->price;
                                $per = ($newprice*100)/$oldprice;
                                $fper = 100-$per;
                            @endphp
                            <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                <div class="marketplace-box">
                                    <span class="mp-exterior">{{$da->skin->exterior}}
                                    
                                    <img src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$da->skin->id}}-{{$da->skin->thumbnail}}" class="mp-skin">

                                    <span class="mp-weapon">{{$name[0]}}</span>
                                    <span class="mp-skin-label">{{$name[1]}}</span>
                                    <span class="mp-type">{{$da->skin->rarity}}</span>

                                    <span class="mp-price">{{'$'.number_format($da->price, 2) }} <span class="mp-discount">-{{number_format($fper)}}%</span></span>
                                    
                                    <span class="mp-suggest-price">Suggested Price: {{'$'.number_format($oldprice, 2) }}</span>

                                    <a href="javascript::void()" data-id="{{base64_encode($da->id)}}" class="mp-buy buy">Buy Now</a>
                                </div>
                            </div>
                        @endforeach
                        @if(count($databelt) == 0)
                            <div class="col-md-12">
                                <h5>No Items Found</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- Top Wins End -->




            @include('web.support.counter')

           

@endsection
@section('addScript')
	@if (session()->has('success'))
        <script type="text/javascript">
            jQuery(document).ready(function() {
                alert("Success: {{session()->get('success')}}");
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script type="text/javascript">
            jQuery(document).ready(function() {
                alert("Alert: {{session()->get('error')}}");
            });
        </script>
    @endif
	    
    <script type="text/javascript">
        var tpj=jQuery;
        var revapi50;
        tpj(document).ready(function() {
            
            $(".buy").click(function() {
                var id = $(this).attr("data-id");
                if(confirm('Are you really want to buy this item?')){
                    window.location.href = "marketplace/purchase/"+id;
                }
            });
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