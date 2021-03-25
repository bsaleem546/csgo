@extends('web.support.theme')
@section('title', 'Watch Battle')
@section('content')
	
            
           
             <!-- Start Watch Battle -->

            <section class="ballte-sec">
                <div class="container-fluid">
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Battle Opening</h2>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row bg-golden-00 row-justify">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-5">
                            <div class="watch_batle-top">
                                <div class="fair-box">
                                    <a href="#" data-toggle="modal" data-target="#watch-fairness"><img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/fairnes.png"> <span>Fairness</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-7">
                            <div class="watch-bat-link">
                               <span><i class="fa fa-link" aria-hidden="true"></i></span> <input readonly="" type="text" value="https://datdrop.com/battle/IAcNXJV5S/invite">
                            </div>
                        </div>
                    </div>
                    <?php $cost = empty($total_cost) ? '0' : $total_cost; ?>
                    <input type="hidden" name="btl_id" id="btl_id" value="{{base64_encode($battles->id)}}">
                    <div class="row mt-10">
                        <div class="main-rows-batle bg-batle">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                                <div class="total-cost-div">
                                    <h5>Total Cost <span class="tc-div">${{$cost}}</span></h5>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                <div class="total-skin-div">
                                    <h5 id="case_round">1</h5>
                                    <span class="ts-div">Rounds</span>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                                <div class="type-sort-div"> 
                                    @php
                                        $pid = empty(Auth::user()->id) ? '0' : Auth::user()->id;
                                    @endphp
                                    <button class="nk-btn-pro" id="bco" onclick="stbattle(this)" {{empty($battles->players[1]->user->name) ? 'style=display:none;' : ''}} {{$battles->players[0]->play_user_id_ != $pid ? 'style=display:none;' : ''}} {{$battles->status != '0' ? 'style=display:none;' : ''}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start Battle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modl-row mt-5 positn-relative">
                        <div class="main-bg-battle">
                                        <div class="col-6 pad_00 right-batle">
                                            <div class="modl-row">
                                                <div class="col-12 pad_00 bordrx_box">
                                                    <div class="main-batle-bg">
                                                        <div class="inner-batle-col">
                                                            <div class="battle_box-bg"></div>
                                                            <!-- waiting-loader -->
                                                            <div class="waiting-loader" id="furlo1">
                                                                <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/batle-loader.gif">
                                                            </div>
                                                            <!-- waiting-loader-End -->
                                                            <!-- Skin-Spiner -->
                                                            <div class="raffle-over" id="fur1"  style="display: none;">
                                                                <div class="raffle-roller">
                                                                    <div class="raffle-roller-holder">
                                                                        <span class="line-borders"></span>
                                                                        <div class="raffle-roller-container" id="p1container" style="margin-top: 0px;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Skin-Spiner-End -->
                                                            <!-- Result-Box -->
                                                            <div class="result-div" id="furre1" style="display: none;">
                                                                <div class="winer-div">
                                                                    <h2>Winner!</h2>
                                                                    <div class="win_price">
                                                                        <p>5.14$</p>
                                                                    </div>
                                                                    <span class="total-win">Total Winning</span>
                                                                    <h3>6.12$</h3>
                                                                </div>
                                                                <div class="loser-div" style="display: none;">
                                                                    <h2>Looser!</h2>
                                                                    <div class="lose_price">
                                                                        <p>5.14$</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Result-Box-End -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pad_00 mar_top left-skin-box">
                                                    <div class="main_plyer_div plyer-win-bg">
                                                        <div class="plyer-name-id">
                                                            <a href="#">
                                                                <img class="img-fluid" width="25px" src="{{$battles->players[0]->user->avatar}}">
                                                                {{$battles->players[0]->user->nickname}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pad_00 left-skin-box">
                                                    <div class="main-battle-box">
                                                        <div class="colum-box blnk-box" id="1winskin">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($battles->players[0]->play_user_id_ != $pid)
                                            <input type="hidden" name="t" id="t" value="0">
                                        @else
                                            <input type="hidden" name="t" id="t" value="1">
                                        @endif
                            <div class="col-6 pad_00 right-batle">
                                <div class="modl-row">
                                    <div class="col-12 pad_00 bordrx_box">
                                        <div class="main-batle-bg">
                                            <div class="inner-batle-col">
                                                <div class="battle_box-bg"></div>
                                                @php
                                                    $player2 = empty($battles->players[1]->play_user_id_)  ? '0' : $battles->players[1]->play_user_id_;

                                                @endphp
                                                <!-- waiting-loader -->
                                                <div class="waiting-loader"  id="furlo2">
                                                    @if($player2 == 0)
                                                        @if($player2 != Auth::user()->id)
                                                            @if($battles->players[0]->play_user_id_ != $pid)
                                                                <div class="join-balt">
                                                                    <a href="{{URL::to('/battle/participate/'.base64_encode($battles->id))}}" class="nk-btn link-effect-4" style="z-index: 9999;">Join</a>
                                                                </div>
                                                            @else
                                                                <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/batle-loader.gif">
                                                            @endif
                                                        @endif
                                                    @else
                                                        <img class="img-fluid" src="{{URL::to('/')}}/dist/web/assets/images/batle-loader.gif">
                                                    @endif
                                                </div>
                                                <!-- waiting-loader-End -->
                                                <!-- Skin-Spiner -->
                                                <div class="raffle-over" id="fur2" style="display: none;">
                                                    <div class="raffle-roller">
                                                        <div class="raffle-roller-holder">
                                                            <span class="line-borders"></span>
                                                            <div class="raffle-roller-container" id="p2container" style="margin-top: 0px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Skin-Spiner-End -->
                                                <!-- Result-Box -->
                                                <div class="result-div" id="furre2" style="display: none;">
                                                </div>
                                                <!-- Result-Box-End -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pad_00 mar_top left-skin-box">
                                        <div class="main_plyer_div plyer-win-bg">
                                            <div class="plyer-name-id">
                                                <a href="#" id="username-p2">
                                                    @if(empty($battles->players[1]->user->nickname))
                                                        Waiting..
                                                    @else
                                                        <img class="img-fluid" width="25px" src="{{$battles->players[1]->user->avatar}}">
                                                        {{$battles->players[1]->user->nickname}}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 pad_00 left-skin-box">
                                        <div class="main-battle-box">
                                            <div class="colum-box blnk-box" id="2winskin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- Watch Battle End -->

 


            

    <script type="text/javascript">
      const item_entries = [];
      var items = {!! $jsdetail !!};
      var csitt = {!! $total !!}
      for(let i=0; i<csitt; i++){
          item_entries[i] = Object.values(items[i]);
      }
      var total = {!! $skintotal !!};
    </script>

    @if(Auth::check())
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;
            var uid = {{Auth::user()->id}};
            var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
              cluster: '{{env("PUSHER_APP_CLUSTER")}}'
            });

            var channel = pusher.subscribe('check_participant.'+uid);
            channel.bind('checkParticipant', function(data) {
                window.location.reload(true);
            });
        </script>
    @endif

@endsection
@section('addScript')
	
    <script src="{{URL::to('/')}}/dist/web/assets/js/spiner.js"></script>
    <script src="{{URL::to('/')}}/dist/web/assets/js/batle.js"></script>
    <script>
       Pusher.logToConsole = true;
        
        var bid = {{$battles->id}};
        var uid = {{Auth::user()->id}};

        var battlechannel = pusher.subscribe('battle_start.'+bid+'.'+uid);
        battlechannel.bind('battleStart', function(data) {
          viewbattle(data);
        });
  </script>
    

	
@endsection