@extends('web.support.theme')
@section('title', 'Create Battle')
@section('content')
<style type="text/css">
    .btn-adcase {
    background-color: #ffffff03;
}
</style>

            <!-- Start Top Wins -->

            <section class="ballte-sec">
                <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Create Battle</h2>
                            </div>
                        </div>
                    </div>


                    <div class="row bg-blck-00 row-justify">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="create-sorting-box">
                                <form class="ordering" method="get">
                                    <label>Sort By: </label>
                                    <select name="orderby" class="orderby" aria-label="Shop order">
                                        <option value=""  selected="selected">Public battle</option>
                                        <option value="">Private battle</option>
                                    </select>
                                    <input type="hidden" name="paged" value="1">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-10">
                        <div class="main-rows-batle bg-batle">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                                <div class="total-cost-div">
                                    <h5>Total Cost <span class="tc-div">$<span id="battle_cost_total">0</span></span></h5>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                <div class="total-skin-div">
                                    <h5>1</h5>
                                    <span class="ts-div">Rounds</span>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                                <div class="type-sort-div">
                                    <h5>Type: <span class="typ-srt-div">Public battle</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <form action="battleadd" method="post"> -->
                        <form method="post" action="{{ URL::to('/battleadd')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <div class="row mt-10" id="item-tray">
                        <!-- <div id="casebox" class="col-lg-2 col-md-3 col-sm-4 col-12">
                            <div class="main-add-case bordr-solid">
                                <span id="close" class="close-box" onclick="deletediv(this)"><span class="close-x">x</span></span>
                                <div class="casebox-bg"></div>
                                <div class="inr-add-case">
                                    <div class="img-case-imgs">
                                        <div class="case-img">
                                            <img class="img-fluid" src="assets/images/giveaway-thumbs/box-case.png">
                                        </div>
                                        <div class="skin-img">
                                            <img class="img-fluid" src="assets/images/giveaway-thumbs/1.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="skin-nam-pri">
                                    <h6>Gun Ak47 <span>$10</span></h6>
                                </div>
                                
                                <div class="case-add-box">
                                    <span class="rutate bg-theme"><span class="minus">-</span></span>
                                    <span class="rutate-input"><input type="number" class="count" name="case-add-box" value="1"></span>
                                    <span class="rutate bg-theme"><span class="plus">+</span></span>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-2 col-md-3 col-sm-4 col-12 order-last">
                            <div class="main-add-case bordr-dash">
                                <div id="image-add">
                                    <img src="{{URL::to('/')}}/dist/web/assets/images/giveaway-bg.png">
                                </div>
                                <div class="addcase-btn">
                                    <a href="#" data-toggle="modal" data-target="#add-cases" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready">
                                        <span class="link-effect-inner">
                                            <span class="link-effect-l">
                                                <span>
                                                    <span>Add Case</span>
                                                </span>
                                            </span>
                                            <span class="link-effect-r">
                                                <span>
                                                    <span>Add Case</span>
                                                </span>
                                            </span>
                                            <span class="link-effect-shade">
                                                <span>
                                                    <span>Add Case</span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>


            

            <!-- Top Wins End -->


            <div class="create-batle-box text-center mb-10">
                <button id="co" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready">
                    <span class="link-effect-inner">
                        <span class="link-effect-l">
                            <span>
                                <span>Create Battle</span>
                            </span>
                        </span>
                        <span class="link-effect-r">
                            <span>
                                <span>Create Battle</span>
                            </span>
                        </span>
                        <span class="link-effect-shade">
                            <span>
                                <span>Create Battle</span>
                            </span>
                        </span>
                    </span>
                </button>
            </div>

            </form>

            <!-- Start The Modal -->
            <div class="modal fade" id="add-cases">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="close-mdl-btn">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="col-lg-12 col-md-12 p-0 text-center">
                            <div class="heading hr-bar">
                                <h2>Featured Cases</h2>
                            </div>
                        </div>
                        <div id="bdy-case-mdl" class="modal-body bg-ad-case-body">
                            <div class="modl-row ad_ca_jus mrg-btm bg-bdy-rows">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="ad_case_pri">
                                        <h6>CASES ADDING <span>$<span id="battle_cost_tot">0</span></span></h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 pad-ser">
                                    <div class="ad_case_search">
                                        <input class="form-control" type="text" placeholder="Lookup cases" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <div class="row modl-row">
                                @if($popular->count() > 0)
                                @foreach($popular as $key => $case)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                                        <div class="chlid">
                                            <div class="main-add-case bordr-solid">
                                                <div class="casebox-bg"></div>
                                                <div class="inr-add-case">
                                                    <div class="img-case-imgs">
                                                        <div class="case-img">
                                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/giveaway-thumbs/box-case.png">
                                                        </div>
                                                        <div class="skin-img">
                                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-d-none">
                                                    <div class="skin-nam-pri">
                                                        <h6>{{$case->label}}</h6>
                                                    </div>
                                                    <div class="add-btn-case">
                                                        <button class="btn btn-adcase" onclick="adddiv(this)">
                                                            <span class="s-case-pri">${{$case->price}}</span>
                                                            <span class="s-case-btn">Add Case</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-p-block" style="display: none;">
                                                <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                                                    <div class="main-add-case bordr-solid">
                                                        <span id="close" class="close-box" onclick="deletediv(this)"><span style="display: none;">{{$case->price}}</span><span class="close-x">x</span></span>
                                                        <div class="casebox-bg"></div>
                                                        <div class="inr-add-case">
                                                            <div class="img-case-imgs">
                                                                <div class="case-img">
                                                                    <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/giveaway-thumbs/box-case.png">
                                                                </div>
                                                                <div class="skin-img">
                                                                    <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="skin-nam-pri">
                                                            <h6>{{$case->label}} <span>${{$case->price}}</span></h6>
                                                        </div>

                                                            <input type="hidden" name="caseid[]" value="{{$case->id}}">
                                                            <input type="hidden" class="countval{{$case->id}}" name="qty[]" value="1">
                                                        
                                                        
                                                        <div class="case-add-box">
                                                            <span class="rutate bg-theme"><span class="minus" data-id="{{$case->id}}" data-price="{{$case->price}}">-</span></span>
                                                            <span class="rutate-input"><input type="number" class="count count{{$case->id}}" name="qty[]" value="1" disabled=""></span>
                                                            <span class="rutate bg-theme"><span class="plus" data-id="{{$case->id}}" data-price="{{$case->price}}">+</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                                        <h3 class="no-found">No Cases are available</h3>
                                    </div>
                                @endif

                            </div>
                            <div class="add_case_md_footer">
                                <button class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready" data-dismiss="modal">
                                    <span class="link-effect-inner">
                                        <span class="link-effect-l">
                                            <span>
                                                <span>Confirm</span>
                                            </span>
                                        </span>
                                        <span class="link-effect-r">
                                            <span>
                                                <span>Confirm</span>
                                            </span>
                                        </span>
                                        <span class="link-effect-shade">
                                            <span>
                                                <span>Confirm</span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- End The Modal -->




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

    <script type="text/javascript">
    $(document).ready(function(){
        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
            var id = $(this).data("id");
            var price = parseFloat($(this).data("price"));
            $('.count'+id).val(parseInt($('.count'+id).val()) + 1 );
            $('.countval'+id).val(parseInt($('.countval'+id).val()) + 1 );
            var oldpr = parseFloat($('#battle_cost_total').html());
            var newpr = oldpr+price;

            $('#battle_cost_total').html(newpr.toFixed(2));
        });
          $(document).on('click','.minus',function(){
              var id = $(this).data("id");
              var price = parseFloat($(this).data("price"));
              $('.count'+id).val(parseInt($('.count'+id).val()) - 1 );
              $('.countval'+id).val(parseInt($('.countval'+id).val()) - 1 );
              if ($('.count'+id).val() == 0) {
                 $('.count'+id).val(1);
                 $('.countval'+id).val(1);
              }else{
                var oldpr = parseFloat($('#battle_cost_total').html());
                var newpr = oldpr-price;

                $('#battle_cost_total').html(newpr.toFixed(2));
              }
          });
    });
</script>
<script>
    function deletediv(div){
        var d = div.parentNode.parentNode;
        d.remove();
        var sp = $(div).children();
        var price = parseFloat($(sp).first().html());
        var total_pri = parseFloat($('#battle_cost_total').html());
        total_pri = total_pri-price;
        total_pri.toFixed(2);
        $('#battle_cost_total').html(total_pri);
        $('#battle_cost_tot').html(total_pri);
    }
    function adddiv(div){
        div.removeAttribute('onclick');
        var sp = $(div).children();
        var pr = $(sp).first().html();
        var pri = pr.split('$');
        var price = parseFloat(pri[1]);
        var total_pri = parseFloat($('#battle_cost_total').html());
        total_pri = total_pri+price;
        total_pri.toFixed(2);
        $('#battle_cost_total').html(total_pri);
        $('#battle_cost_tot').html(total_pri);
        var d = div.parentNode.parentNode.parentNode.parentNode.children;
        $('#item-tray').append(d[1].innerHTML);

    }
</script>

	
@endsection