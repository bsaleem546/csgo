								@if($skins->count() == 0)
	                               <div class="blnk-contnt">
	                                   <div class="blnk-gun-box">
	                                       <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/upd-gun.png">
	                                   </div>
	                                   <div class="name-contnt">
	                                       <h5>No Skins Found</h5>
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
		                               <div class="colum-box blnk-box">
		                               	@foreach($skins as $key => $data)
				                        @php
				                          $name = explode(' | ', $data->hash_name);
				                        @endphp
		                                 <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd upgItem" data-id="{{base64_encode($data->id)}}">
		                                     <div class="boxex-inner bg-blue">
		                                         <div class="boxex-skin-img">
		                                             <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->id.'-'.$data->thumbnail}}">
		                                         </div>
		                                         <div class="boxex-dec">
		                                             <h6>{{$name[0]}}</h6>
		                                             <span>{{$name[1]}}</span>
		                                             <p>{{empty($data->skin_price) ? 'Free' : number_format($data->skin_price, 2).' $' }}</p>
		                                         </div>
		                                     </div>
		                                 </div>
		                                 @endforeach
		                                 @php
		                                 	$x = 24-$skins->count();
		                                 @endphp
		                                 @for($i=0; $i<$x; $i++)
	                                 		<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd"></div>
		                                 @endfor
		                               </div>
		                           </div>
		                       @endif
