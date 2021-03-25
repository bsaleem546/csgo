@extends('web.support.theme')
@section('title', 'Case Details')
@section('content')
	  <!-- Start Watch Battle -->

            <section class="open-case-sec">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                      </div>
                        <div class="col-md-12 case_oping-bg" id="case-block1">
                                    <br>
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="heading hr-bar">
                                    <h2>{{$case->label}}</h2>
                                </div>
                            </div>
                            <!-- Case-Box -->
                            <div class="case_oping-shp-img">
                                <div class="case_oping-box-inr">
                                    <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$case->id}}-{{$case->thumbnail}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tag-pp">
                                    <span class="price-case-tag" id="dprice">{{empty($case->price) ? 'Free' : number_format($case->price, 2).' $' }}</span>
                                </div>
                                <div class="case-add-box">
                                    <span class="rutate bg-theme"><span class="minus">-</span></span>
                                    <span class="rutate-input mrg-ato"><input type="number" class="count" name="case-add-box" value="1" disabled=""></span>
                                    <span class="rutate bg-theme"><span class="plus">+</span></span>
                                </div>
                                  <input type="hidden" id="caseid" value="{{base64_encode($case->id)}}">
                                  <input type="hidden" id="oqty" name="oqty" value="1">
                                  <input type="hidden" name="oprice" id="oprice" value="{{number_format($case->price, 2)}}">
                                  <input type="hidden" name="otprice" id="otprice" value="{{number_format($case->price, 2)}}">
                            </div>
                            <div class="col-lg-12 opn-case-box text-center">
                                <div class="case-open-btn" style="margin-top: 20px; margin-bottom: 10px;">
                                    <button id="co" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready">
                                        <span class="link-effect-inner">
                                            <span class="link-effect-l">
                                                <span>
                                                    <span>Case Open</span>
                                                </span>
                                            </span>
                                            <span class="link-effect-r">
                                                <span>
                                                    <span>Case Open</span>
                                                </span>
                                            </span>
                                            <span class="link-effect-shade">
                                                <span>
                                                    <span>Case Open</span>
                                                </span>
                                            </span>
                                        </span>
                                    </button>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#oddsRange" class="">Check Odds Range</a>
                            </div>
                            <!-- Case-Box-End -->

                            <!-- Case-Spiner -->
                            <!-- <div class="col-lg-12 no-pad case-bg-frm">
                                <div class="raffle-overr">
                                    <div class="raffle-rollerr">
                                        <div class="raffle-roller-holderr">
                                            <span class="line-borderss"></span>
                                            <div class="raffle-roller-containerr" style="margin-left: 0px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button onclick="generate(1);">go</button> -->
                            <!-- Case-Spiner-end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Watch Battle End -->

            <section class="case-contant-sec">
                <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Case Contains</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($detail as $key => $data)
                        @php
                          $name = explode(' | ', $data->skin->hash_name);
                        @endphp
                            <div class="col-lg-2 col-md-2 col-sm-3 col-12 contant-box">
                                <div class="contant-box-iner bg_mil_spec">
                                    <div id="image">
                                        <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets//images/caseopeningbox-bg.png">
                                    </div>
                                    <div class="case-detail-skin-img">
                                         <img class="img-fluid" style="height: 150px" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->skin->id.'-'.$data->skin->thumbnail}}">
                                     </div>
                                     <div class="contant-dec">
                                         <h4>{{$name[1]}}</h4>
                                         <span>{{$name[0]}}</span>
                                         <span><br></span>
                                         <p>{{$data->skin->exterior}}</p>
                                         <h5>{{empty($data->skin->skin_price) ? 'Free' : number_format($data->skin->skin_price, 2).' $' }}</h5>
                                     </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

                <!-- Open Case Modal -->
                <div class="modal fade modal-case-opener" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="case-detail-mdl modal-dialog " role="document">
                      <div class="modal-content">
                        <div class="close-mdl-btn">
                            <button type="button" class="close" data-dismiss="modal">×</button> 
                        </div>
                        <div class="modal-body case-modal-body">
                          <div class="text-center">
                            <div class="cup-icon">
                              <i class="fa fa-trophy" aria-hidden="true"></i>
                            </div>
                            <div class="heading hr-bar">
                                <h4>Win Case</h4>
                            </div>
                          </div>
                          <div class="col-lg-12 text-center">
                              <div class="row inventoryy"> 
                              </div>
                          </div>
                          <!-- <div class="col-12 mt-4 text-center">
                            <div class="case-namee">
                              <h5 id="caselabel">Case Name</h5>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Open Case Modal -->
     <div id="avSkin2" style="display: none;">
        <div class="col-lg-12 no-pad case-bg-frm">
                                <div class="raffle-overr">
                                    <div class="raffle-rollerr">
                                        <div class="raffle-roller-holderr">
                                            <span class="line-borderss"></span>
                                            <div class="raffle-roller-containerr" style="margin-left: 0px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
      </div>
      <div id="avSkin" style="display: none;">
        <div class="slide-darmowa">
          <div class="slider-cate">
            <div id="owl-cate" class="owl-carousel owl-theme owl-cate-box">
              @foreach($detail as $key => $data)
              @php
                $name = explode(' | ', $data->skin->hash_name);
              @endphp
                <div class="item">
                  <div id="octagon" class="img-cate">
                    <a href="#">
                      <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->skin->id.'-'.$data->skin->thumbnail}}" >
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">
      var items = {!! $jsdetail !!};
      const item_entries = Object.values(items);
      var total = {!! $total !!};
    </script>



            <!-- Start The Modal -->
            <div class="modal fade" id="oddsRange">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="close-mdl-btn">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="col-lg-12 col-md-12 p-0 text-center">
                            <div class="heading hr-bar">
                                <h2>Odds Range</h2>
                                <p><small>Every skin has own winning number range. Once you roll in that skin's range, you win the skin.</small></p>
                            </div>
                        </div>
                        <div id="bdy-case-mdl" class="modal-body bg-ad-case-body">
                            <div class="row modl-row">
                              <div class="col-md-12">
                                <div class="table-responsive">
                                  <table class="table" style="width: 100%;">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Odds</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php $s=1; @endphp
                                      @foreach($detail as $key => $so)
                                        <tr>
                                          <td>{{$s}}</td>
                                          <td>{{$so->skin->hash_name.' ('.$so->skin->exterior.')'}}</td>
                                          <td>{{$so->odds}}%</td>
                                        </tr>
                                        @php $s++; @endphp
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- End The Modal -->
@endsection
@section('addScript')
    <script src="{{URL::to('/')}}/dist/web/assets/js/case-open-spiner.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 );
        $('#oqty').val(parseInt($('#oqty').val()) + 1 );
        if ($('.count').val() > 4) {
            $('.count').val(4);
            $('#oqty').val(4);
        }else{
          $('#otprice').val(parseFloat($('#otprice').val()) + parseFloat($('#oprice').val()));
          $('#dprice').html(parseFloat($('#otprice').val()).toFixed(2)+" $");
        }
        });
          $(document).on('click','.minus',function(){
          $('.count').val(parseInt($('.count').val()) - 1 );
          $('#oqty').val(parseInt($('#oqty').val()) - 1 );
            if ($('.count').val() == 0) {
            $('.count').val(1);
            $('#oqty').val(1);
            }else{
              $('#otprice').val(parseFloat($('#otprice').val()) - parseFloat($('#oprice').val()));
              $('#dprice').html(parseFloat($('#otprice').val()).toFixed(2)+" $");
            }

            });
          
    });

    
</script>
@endsection