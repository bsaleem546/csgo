@extends('web.support.theme')
@section('title', 'Profile')
@section('content')
 
<!-- START: Header Title -->
<!--
    Additional Classes:
        .nk-header-title-sm
        .nk-header-title-md
        .nk-header-title-lg
        .nk-header-title-xl
        .nk-header-title-full
        .nk-header-title-parallax
        .nk-header-title-parallax-opacity
        .nk-header-title-boxed
-->
<div class="nk-header-title nk-header-title-sm nk-header-title-parallax nk-header-title-parallax-opacity">
    <div class="bg-image op-5">
        <img src="{{URL::to('/dist/web')}}/assets/images/image-1.jpg" alt="" class="jarallax-img">
    </div>
    <div class="nk-header-table">
        <div class="nk-header-table-cell">
            <div class="container">
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
              </div>
            </div>
        </div>
    </div>
    
</div>
<!-- END: Header Title -->


        

        
<div class="container">
    
    @include('web.support.profileHeader')

    <div class="row vertical-gap">
        <div class="col-lg-12">
            <div class="nk-gap-2 d-none d-lg-block"></div>
            <div class="nk-social-container">
            	<div class="row">
            		<div class="col-lg-6">
            			<div class="balance-block">
            				<div class="value">
            					<p>Balance: <span>{{Auth::user()->wallet->amount}} $ </span></p>
              				<a class="nk-btn-pro" href="#" data-toggle="modal" data-target="#payment-mdl">Add</a>
            				</div>
            			</div>
            		</div>
                    <div class="col-lg-6">
                        <form method="post" action="{{URL::to('/profile/update')}}">
                            {{csrf_field()}}
                            <div class="balance-block">
                                <div class="value">
                                    <input type="text" placeholder="Trade Link.." name="trade_link" value="{{Auth::user()->trade_link}}" required="">
                                    <input type="submit" class="nk-btn-pro" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
            	</div>
            </div>
            <br>
            <!-- buttons -->   
                            @foreach($inventory as $key => $data)
                                @php
                                $sumprice += $data->skin->skin_price; 
                                @endphp
                            @endforeach
            <div class="inventory-buttons" style="margin-bottom: 20px;">  
             <a class="nk-btn-sell-all"
             href="javascript::void()" 
             id="reselbtnall" 
             data-href="{{ URL::to('/skin/resellall/') }}">
             Resell {{$sumprice}}$</a>

             
             <a class="nk-btn-cash-out-all">Cash Out {{$sumprice}}$</a>
            </div>
            <!-- START: Rev Slider -->
            <div class="container-fluid"> 
                <span class="nk-title display-5 block-title">Inventory ({{$count}})</span>
                <div class="row section-block">
                    @if($inventory->count() > 0)
                        @foreach($inventory as $key => $data)
                            @php
                              $name = explode(' | ', $data->skin->hash_name); 
                            @endphp
                                <div class="col-lg-2 col-md-2 col-sm-3 col-12 contant-box">
                                    <div class="contant-box-iner bg_industril_grade">
                                        <div id="image">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets//images/caseopeningbox-bg.png">
                                        </div>
                                        <div class="contant-skin-img">
                                             <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->skin->id.'-'.$data->skin->thumbnail}}">
                                         </div>
                                         <div class="contant-dec">
                                             <h4>{{$name[1]}}</h4>
                                             <span>{{$name[0]}}</span>
                                             <span><br></span>
                                             <p>{{$data->skin->exterior}}</p>
                                             <h5>{{empty($data->skin->skin_price) ? 'Free' : number_format($data->skin->skin_price, 2).' $' }}</h5>
                                             <a href="javascript::void()" id="reselbtn" data-href="{{URL::to('/skin/resell/'.base64_encode($data->id))}}" class="nk-btn btn-pro-withdra btn-resel">Resell</a>
                                             <a href="javascript::void()" id="withbtn" data-href="{{URL::to('/skin/withdraw/'.base64_encode($data->id))}}" class="nk-btn btn-pro-withdra">Cash Out</a>
                                         </div>  
                                    </div>
                                </div>
                            @endforeach
                    @else
                        <div class="col-md-12">
                            <h3 class="no-found">No Skins are available</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- END: Rev Slider -->
            <div class="nk-gap-4"></div>
        </div>
    </div>

    <div class="nk-gap-3"></div>
</div>
    @include('web.support.counter')


            <!-- Start Payment Modal -->
            <div class="modal fade" id="payment-mdl">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="close-mdl-btn">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="col-lg-12 col-md-12 p-0 text-center">
                            <div class="heading hr-bar">
                                <h2>Refill Balance</h2>
                            </div>
                        </div>
                        <form method="post" action="{{URL::to('/wallet/refill/crypto')}}">
                            {{csrf_field()}}
                            <div id="bdy-case-mdl" class="modal-body bg-ad-case-body">
                                <div id="paymentMain">
                                    <div class="row m-0 mt-50">
                                        <div class="col-lg-12">
                                            <div class="inr-head-paymt">
                                                <h5>Select Your payment method</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="1" id="r1">
                                                    <label class="checkbox-alias" for="r1">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="70" src="{{URL::to('/')}}/dist/web/assets/images/payment/visa.png">
                                                                    <img class="img-fluid" width="70" src="{{URL::to('/')}}/dist/web/assets/images/payment/mastercard.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Bank Card</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main cryptocurrency">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="2" id="r2">
                                                    <label class="checkbox-alias" for="r2">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/crypto.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Cryptocurrency</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="3" id="r3">
                                                    <label class="checkbox-alias" for="r3">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/skrill.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Skrill</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="4" id="r4">
                                                    <label class="checkbox-alias" for="r4">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/webmoney.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>WebMoney</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="5" id="r5">
                                                    <label class="checkbox-alias" for="r5">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/giftcard.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Gift Card</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <input type="radio" name="rGroup" value="6" id="r6">
                                                    <label class="checkbox-alias" for="r6">
                                                        <div class="fixd00_hr">
                                                            <div class="fix_00-img">
                                                                <div class="img-imgs">
                                                                    <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/neteller.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Neteller</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  id="cryptoDisplay" style="display: none;">
                                    <div class="row m-0 mt-50">
                                        <div class="col-lg-12">
                                            <div class="inr-head-paymt">
                                                <h5>CryptoCurrency</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fixd00_hr-main cryptocurrency">
                                                <div class="invisible-checkboxes">
                                                    <a href="javascript::void()" class="cryptoSelect" data-type="BitCoin">
                                                        <label class="checkbox-alias" for="r2">
                                                            <div class="fixd00_hr">
                                                                <div class="fix_00-img">
                                                                    <div class="img-imgs">
                                                                        <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/bitcoin.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </a>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>BitCoin</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <a href="javascript::void()" class="cryptoSelect" data-type="BitCoin Cash">
                                                        <label class="checkbox-alias" for="r3">
                                                            <div class="fixd00_hr">
                                                                <div class="fix_00-img">
                                                                    <div class="img-imgs">
                                                                        <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/bitcoin-cash.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </a>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>BitCoin Cash</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <a href="javascript::void()" class="cryptoSelect" data-type="LiteCoin">
                                                        <label class="checkbox-alias" for="r4">
                                                            <div class="fixd00_hr">
                                                                <div class="fix_00-img">
                                                                    <div class="img-imgs">
                                                                        <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/lite-coin.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </a>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>LiteCoin</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fixd00_hr-main">
                                                <div class="invisible-checkboxes">
                                                    <a href="javascript::void()" class="cryptoSelect" data-type="Ethereum">
                                                        <label class="checkbox-alias" for="r5">
                                                            <div class="fixd00_hr">
                                                                <div class="fix_00-img">
                                                                    <div class="img-imgs">
                                                                        <img class="img-fluid" width="100" src="{{URL::to('/')}}/dist/web/assets/images/payment/ethereum.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </a>
                                                </div>
                                                <div class="paymnt-name">
                                                    <h6>Ethereum</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End The Modal -->
@endsection
@section('addScript')
    <script type="text/javascript">
         $(document).ready(function() {
            if (window.location.hash) {
              var initial_nav = window.location.hash;
              if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                  scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
              }
            }


            $(document).on('click', '#reselbtn', function(e) {
                var url = $(this).data('href');
                if(confirm('Are you sure want to Resell this Skin?')){
                  window.location = url;
                }
            });

            $(document).on('click', '#reselbtnall', function(e) {
                var url = $(this).data('href');
                if(confirm('Are you sure want to Resell this Skin?')){
                  window.location = url;
                }
            });

            $(document).on('click', '#withbtn', function(e) {
                var url = $(this).data('href');
                if(confirm('Are you sure want to Withdraw this Skin?')){
                  window.location = url;
                }
            });

            $('.cryptocurrency').click(function(){
                $('#paymentMain').css("display", "none");
                $('#cryptoDisplay').css("display", "block");
            }); 

            $(document).on('click', '.copy', function(e) {
                var id = $(this).data('id');
                var copyText = document.getElementById(id);
                  copyText.select();
                  copyText.setSelectionRange(0, 99999)
                  document.execCommand("copy");
                  alert("Copied.!");
            }); 

            
            $('.cryptoSelect').click(function(){
                var type = $(this).data('type');
                if(type == 'BitCoin'){
                    $('#cryptoDisplay').html('<div class="row m-0 mt-20"><div class="col-lg-12"><input type="hidden" name="cryptoType" value="'+type+'"><div class="inr-head-paymt"><h5>'+type+'</h5></div></div><div class="col-lg-2"></div><div class="col-lg-3"><label>On Chain</label><br><img src="{{URL::to('/')}}/dist/web/assets/images/payment/qr-bitcoin-onchain.jpg" width="100%"><div class="balance-block"><div class="value"><input type="text" value="3Qbt6xJjZkCxLAUv9zvV5TMFy5tpMb7qH4" id="wa-bch-onchain"><input type="button" id="copy" class="copy nk-btn-pro" data-id="wa-bch-onchain" value="Copy"></div></div></div><div class="col-lg-2"></div><div class="col-lg-3"><label>Lightning</label><br><img src="{{URL::to('/')}}/dist/web/assets/images/payment/qr-bitcoin-lightning.jpg" width="100%"><div class="balance-block"><div class="value"><input type="text" value="lnbc1psprf8jpp52u4wvyhrwqngwfgla8rhx6ew5tf4lv23resw0fzs8dtk0ayhrc4qdqu2askcmr9wssx7e3q2dshgmmndp5scqzpgxqyz5vqsp56r6zgr3vt5363xvae3arqjsn46mkrjjrhwgfglw9n3ujhdskwu9s9qy9qsqrp2kmdmu97qxd7h3ww80uaw2fwdfw9d2jwymd6ulu8qvllteh9zqf2hl54h0czr28k3myy6ygn9lp34dx63h6tn5dgr8gmdtlpe3n3qpjv4p2r" id="wa-bch-lightning"><input type="button" id="copy" class="copy nk-btn-pro" data-id="wa-bch-lightning" value="Copy"></div></div></div><div class="col-lg-2"></div><div class="col-lg-4"></div><div class="col-lg-4"><br><label class="label">Amount ($)</label><input type="number" step="any" class="form-control" name="amount" required><br><label class="label">Your Wallet Address</label><input type="text" name="wallet_address" class="form-control" required></div><div class="col-lg-4"></div><div class="col-lg-12"><div class="text-center paymnt-btn-box"><button type="submit" class="btn refill-btn">Refill</button></div></div><div class="col-lg-12"><br><h4>Payment Instructions</h4><ul><li>Scan or copy the adress to your wallet</li><li>Enter the adress you are sending the '+type+' from, copy the entire adress if you can or enter first and last 4 digits of the adress separated by a dash "0xs5f-3s13"</li><li>Enter the amount you are sending as close as possible, deduct fees if possible</li><li>Send '+type+' from your wallet and click the Pay button, please don`t spam pay if you did not send anything</li><li>The minimum deposit amount of '+type+' is equivalent to 1$</li><li>'+type+' deposit will be credited after 6 confirmations</li><li>If your deposit is not credited after 2 hours or if you have other issue with the deposit please contact support at <a href="mailto:example@support.com">example@support.com</a></li></ul></div></div>');
                }else if(type == 'BitCoin Cash'){
                    $('#cryptoDisplay').html('<div class="row m-0 mt-20"><div class="col-lg-12"><input type="hidden" name="cryptoType" value="'+type+'"><div class="inr-head-paymt"><h5>'+type+'</h5></div></div><div class="col-lg-2"></div><div class="col-lg-4"><img src="{{URL::to('/')}}/dist/web/assets/images/payment/qr-bitcoin-cash.png" width="100%"><div class="balance-block"><div class="value"><input type="text" value="qp8n5gy226sde4kz5f5m4783s3722jqceqzdpcer98" id="wa-bch"><input type="button" id="copy" class="copy nk-btn-pro" data-id="wa-bch" value="Copy"></div></div></div><div class="col-lg-4"><br><label class="label">Amount ($)</label><input type="number" step="any" class="form-control" name="amount" required><br><label class="label">Your Wallet Address</label><input type="text" name="wallet_address" class="form-control" required><br><div class="text-center paymnt-btn-box"><button type="submit" class="btn refill-btn">Refill</button></div></div><div class="col-lg-2"></div><div class="col-lg-6"></div><div class="col-lg-4"></div><div class="col-lg-2"></div><div class="col-lg-12"><br><h4>Payment Instructions</h4><ul><li>Scan or copy the adress to your wallet</li><li>Enter the adress you are sending the '+type+' from, copy the entire adress if you can or enter first and last 4 digits of the adress separated by a dash "0xs5f-3s13"</li><li>Enter the amount you are sending as close as possible, deduct fees if possible</li><li>Send '+type+' from your wallet and click the Pay button, please don`t spam pay if you did not send anything</li><li>The minimum deposit amount of '+type+' is equivalent to 1$</li><li>'+type+' deposit will be credited after 6 confirmations</li><li>If your deposit is not credited after 2 hours or if you have other issue with the deposit please contact support at <a href="mailto:example@support.com">example@support.com</a></li></ul></div></div>');
                }else if(type == 'LiteCoin'){
                    $('#cryptoDisplay').html('<div class="row m-0 mt-20"><div class="col-lg-12"><input type="hidden" name="cryptoType" value="'+type+'"><div class="inr-head-paymt"><h5>'+type+'</h5></div></div><div class="col-lg-2"></div><div class="col-lg-4"><img src="{{URL::to('/')}}/dist/web/assets/images/payment/qr-litecoin.png" width="100%"><div class="balance-block"><div class="value"><input type="text" value="LRP2R3bktH9U8QSz12rTzG5ZUGd24DH9aD" id="wa-ltc"><input type="button" id="copy" class="copy nk-btn-pro" data-id="wa-ltc" value="Copy"></div></div></div><div class="col-lg-4"><br><label class="label">Amount ($)</label><input type="number" step="any" class="form-control" name="amount" required><br><label class="label">Your Wallet Address</label><input type="text" name="wallet_address" class="form-control" required><br><div class="text-center paymnt-btn-box"><button type="submit" class="btn refill-btn">Refill</button></div></div><div class="col-lg-2"></div><div class="col-lg-6"></div><div class="col-lg-4"></div><div class="col-lg-2"></div><div class="col-lg-12"><br><h4>Payment Instructions</h4><ul><li>Scan or copy the adress to your wallet</li><li>Enter the adress you are sending the '+type+' from, copy the entire adress if you can or enter first and last 4 digits of the adress separated by a dash "0xs5f-3s13"</li><li>Enter the amount you are sending as close as possible, deduct fees if possible</li><li>Send '+type+' from your wallet and click the Pay button, please don`t spam pay if you did not send anything</li><li>The minimum deposit amount of '+type+' is equivalent to 1$</li><li>'+type+' deposit will be credited after 6 confirmations</li><li>If your deposit is not credited after 2 hours or if you have other issue with the deposit please contact support at <a href="mailto:example@support.com">example@support.com</a></li></ul></div></div>');
                }else if(type == 'Ethereum'){
                    $('#cryptoDisplay').html('<div class="row m-0 mt-20"><div class="col-lg-12"><input type="hidden" name="cryptoType" value="'+type+'"><div class="inr-head-paymt"><h5>'+type+'</h5></div></div><div class="col-lg-2"></div><div class="col-lg-4"><img src="{{URL::to('/')}}/dist/web/assets/images/payment/qr-ethereum.png" width="100%"><div class="balance-block"><div class="value"><input type="text" value="0xc0BC2CfA732f258fBBa05a905Da4264CF6f9CFe7" id="wa-eth"><input type="button" id="copy" class="copy nk-btn-pro" data-id="wa-eth" value="Copy"></div></div></div><div class="col-lg-4"><br><label class="label">Amount ($)</label><input type="number" step="any" class="form-control" name="amount" required><br><label class="label">Your Wallet Address</label><input type="text" name="wallet_address" class="form-control" required><br><div class="text-center paymnt-btn-box"><button type="submit" class="btn refill-btn">Refill</button></div></div><div class="col-lg-2"></div><div class="col-lg-6"></div><div class="col-lg-4"></div><div class="col-lg-2"></div><div class="col-lg-12"><br><h4>Payment Instructions</h4><ul><li>Scan or copy the adress to your wallet</li><li>Enter the adress you are sending the '+type+' from, copy the entire adress if you can or enter first and last 4 digits of the adress separated by a dash "0xs5f-3s13"</li><li>Enter the amount you are sending as close as possible, deduct fees if possible</li><li>Send '+type+' from your wallet and click the Pay button, please don`t spam pay if you did not send anything</li><li>The minimum deposit amount of '+type+' is equivalent to 1$</li><li>'+type+' deposit will be credited after 6 confirmations</li><li>If your deposit is not credited after 2 hours or if you have other issue with the deposit please contact support at <a href="mailto:example@support.com">example@support.com</a></li></ul></div></div>');
                }
            });  

          });

    </script>
@endsection