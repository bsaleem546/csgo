@extends('web.support.theme')
@section('title', 'Sell History')
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
            
            <!-- START: Rev Slider -->
            <div class="container-fluid">
                <span class="nk-title display-5 block-title">Sell History ({{$count}})</span>
                <div class="row section-block">
                    @if($history->count() > 0)
                        @foreach($history as $key => $data)
                            @php
                              $name = explode(' | ', $data->skin->hash_name);
                            @endphp
                                <div class="col-lg-2 col-md-2 col-sm-3 col-12 contant-box">
                                    <div class="contant-box-iner">
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
                                             <a href="javascript::void()" class="nk-btn btn-pro-withdra">Sold</a>
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

@endsection