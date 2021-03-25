@extends('web.support.theme')
@section('title', 'Upgrade')
@section('content')

	  <!-- Upgrade Page Start -->

           <section class="upgrade-section" style="padding: 1px 0;">
               <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Upgrade</h2>
                            </div>
                        </div>
                    </div>

                    <div class="main-progress-upd mrg-top">
                        <div class="upd-bg upd-position">
                            <div class="cntr-upd-box">
                                <div class="bg-hox">
                                    <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-pro.png">
                                </div>
                                <div class="gif-file" id="gif-div"></div>
                                <!-- Upgrade Progress Circle -->
                                <div class="upgrd-percent">
                                  <!-- <div id="container">
                                  </div> -->
                                  <div class="upgrd-inner" id="circleBar">
                                    <div class="round" data-value="0.0" data-size="150" data-thickness="6">
                                      <strong id="roundPer">0%</strong>
                                      <span>Upgrade Chance</span>
                                    </div>
                                  </div>
                                </div>
                            <!-- Upgrade Progress Circle -->
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between mob-reverse mrg-top udp-marg">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <div class="upd-main">
                                <div class="upd-innr">
                                    <div class="top-shap">
                                        <div class="innr-top-shap-1"></div>
                                        <div class="innr-top-shap"></div>
                                    </div>
                                    <div class="upd-img">
                                        <input type="hidden" id="inid" value="">
                                        <div class="innr-upd-img-1"></div>
                                        <div class="innr-upd-img" id="ipskinbox">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-gun.png">
                                        </div>
                                    </div>
                                    <div class="upd-pri-nam">
                                        <div class="innr-upd-pri-nam-1"></div>
                                        <div class="innr-upd-pri-nam">
                                            <div class="upd-pri">
                                                <span id="ipskinprice">0 $</span>
                                            </div>
                                        </div>
                                        <div class="inr-immg22">
                                            <div class="upd-nam">
                                                <p style="cursor: pointer;" id="ipskinlabel">Select your item</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <div class="upd-main">
                                <div class="upd-innr upd-innr-right">
                                    <div class="top-shap">
                                        <div class="innr-top-shap-2"></div>
                                        <div class="innr-top-shap-right"></div>
                                    </div>
                                    <div class="upd-img">
                                        <input type="hidden" id="unid" value="">
                                        <div class="innr-upd-img-2"></div>
                                        <div class="innr-upd-img-right" id="upskinbox">
                                            <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-gun.png">
                                        </div>
                                    </div>
                                    <div class="upd-pri-nam">
                                        <div class="innr-upd-pri-nam-2"></div>
                                        <div class="inr-immg44">
                                            <div class="upd-nam">
                                                <p style="cursor: pointer;" id="upskinlabel">Upgrade item</p>
                                            </div>
                                        </div>
                                        <div class="innr-upd-pri-nam-right">
                                            <div class="upd-pri-right">
                                                <span id="upskinprice">0 $</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($inventory as $key => $data)
                            @php
                              $sumprice += $data->skin->skin_price; 
                            @endphp
                            @endforeach
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                        @if(Auth::check()) 
                            <div class="btn-left-side">
                                <div class="use-bal-btn">
                                    <a href="#">Page Value: <strong>{{$sumprice}} $</strong></a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="hidden" id="uptype" value="2">
                            <div class="shap-div">
                                <div class="multi-btnx1">
                                    <div class="multi-btn-xhp" id="multi-btn-xhp1">
                                        <div class="btnx-shp-link">
                                            <a href="javascript::void()" data-type="1" data-target="multi-btn-xhp1">1x</a>
                                        </div>
                                    </div>
                                    <div class="multi-btn-xhp active" id="multi-btn-xhp12">
                                        <div class="btnx-shp-link">
                                            <a href="javascript::void()" data-type="2" data-target="multi-btn-xhp12">1.2x</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="multi-btnx2">
                                    <div class="multi-btn-xhp" id="multi-btn-xhp2">
                                        <div class="btnx-shp-link">
                                            <a href="javascript::void()" data-type="3" data-target="multi-btn-xhp2">2x</a>
                                        </div>
                                    </div>
                                    <div class="multi-btn-xhp" id="multi-btn-xhp5">
                                        <div class="btnx-shp-link">
                                            <a href="javascript::void()" data-type="4" data-target="multi-btn-xhp5">5x</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="btn-right-side">
                                <div class="use-bal-btn">
                                    <a href="javascript:void(0)" id="btnloading" onClick="Circlle('.round');">Upgrade</a>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </section>

           <section class="inventry-section">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12 inventry-col mob-mar">
                           <div class="row-box">
                               <div class="heading">
                                   <h5>My Inventory</h5>
                               </div>
                               <div class="side-pri">
                                   <span>Price</span>
                               </div>
                           </div>
                           <div class="main-inventry-box">
                           		@if($inventory->count() == 0)
	                               <div class="blnk-contnt">
	                                   <div class="blnk-gun-box">
	                                       <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-gun.png">
	                                   </div>
	                                   <div class="name-contnt">
	                                       <h5>Empty inventory</h5>
	                                   </div>
	                                   <div class="btn-inventry-box">
	                                       <a href="{{URL::to('/')}}" class="nk-btn nk-btn-lg link-effect-4 ready">
	                                        <span class="link-effect-inner">
	                                            <span class="link-effect-l">
	                                                <span>
	                                                    <span>Open Cases</span>
	                                                </span>
	                                            </span>
	                                            <span class="link-effect-r">
	                                                <span>
	                                                    <span>Open Cases</span>
	                                                </span>
	                                            </span>
	                                            <span class="link-effect-shade">
	                                                <span>
	                                                    <span>Open Cases</span>
	                                                </span>
	                                            </span>
	                                        </span>
	                                        </a>
	                                   </div>
	                               </div>
	                               <div class="colum-box blnk-box">
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>  
	                               </div>
                               @else
		                           <div class="main-inventry-box">
		                               <div class="colum-box blnk-box" id="invRetainItem">
		                               	@foreach($inventory as $key => $data)
				                        @php
				                          $name = explode(' | ', $data->skin->hash_name);
				                        @endphp
		                                 <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd invItem" data-id="{{base64_encode($data->id)}}">
		                                     <div class="boxex-inner bg-yellow">
		                                         <div class="boxex-skin-img">
		                                             <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->skin->id.'-'.$data->skin->thumbnail}}">
		                                         </div>
		                                         <div class="boxex-dec">
		                                             <h6>{{$name[0]}}</h6>
		                                             <span>{{$name[1]}}</span>
		                                             <p>{{empty($data->skin->skin_price) ? 'Free' : number_format($data->skin->skin_price, 2).' $' }}</p>
		                                         </div>
		                                     </div>
		                                 </div>
		                                 @endforeach
		                                 @php
		                                 	$x = 24-$inventory->count();
		                                 @endphp
		                                 @for($i=0; $i<$x; $i++)
	                                 		<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd"></div>
		                                 @endfor
		                               </div>
		                           </div>
                               @endif
                           </div>
                           @php
                           		$ipages = ceil($incount/24);
                           @endphp
                           <div class="row-pagination">
                               <div class="pagination-upgrade">
                                   <nav aria-label="Page navigation example">
                                      <ul class="pagination pagination-circle pg-blue">
                                        <li class="page-item {{$ip <= 1 ? 'disabled' : ''}}">
                                          <a class="page-link" href="{{$ip >= 1 ? '?ip='.($ip-1) : ''}}" aria-label="Previous">
                                            <span><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>
                                        <li class="page-item {{$ip >= $ipages ? 'disabled' : ''}}">
                                          <a class="page-link" href="{{$ip <= 1 ? '?ip='.($ip+1) : ''}}" aria-label="Next">
                                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link">{{$ip}} / {{$ipages}}</a></li>
                                      </ul>
                                    </nav>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-12 inventry-col">
                           <div class="upgrade-row-box">
                               <div class="heading">
                                   <h5>Upgrade</h5>
                               </div>
                               <div class="side-pri side-20">
                                   <span>Price</span>
                                   <div class="intp00">
                                     <input type="number" id="uppricefil" name="" class="form-controll">
                                   </div>
                               </div>
                           </div>
                           <div class="main-inventry-box" id="upskinsection">
	                               <div class="blnk-contnt">
	                                   <div class="blnk-gun-box" id="upskinimg">
	                                       <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-gun.png">
	                                   </div>
	                                   <div class="name-contnt">
	                                       <h5 id="upskinlabel">Select Skins From Inventory</h5>
	                                   </div>
	                               </div>
	                               <div class="colum-box blnk-box">
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>
	                                 <div class="boxex-size hid-bnk"></div>  
	                               </div>
                           </div>
                           <div class="row-pagination">
                               <div class="pagination-upgrade">
                                   <nav aria-label="Page navigation example">
                                      <ul class="pagination pagination-circle pg-blue">
                                        <li class="page-item disabled">
                                          <a class="page-link" href="#" aria-label="Previous">
                                            <span><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>
                                        <li class="page-item disabled">
                                          <a class="page-link" href="#" aria-label="Next">
                                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link">1 / 1</a></li>
                                      </ul>
                                    </nav>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>

           <!-- Upgrade Page End -->

@endsection

@section('addScript')
	<!-- Progress bar -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/')}}/dist/web/assets/js/upcust.js"></script>

@endsection