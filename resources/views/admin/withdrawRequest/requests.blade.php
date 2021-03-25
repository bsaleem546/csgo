@extends('admin.support.master')
@section('title', 'Users')
@section('content')
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
            	<br>
            </nav>	
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-download"></i></span>Withdraw Request &nbsp;&nbsp;<small>({{$count}}) Pending</small></h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Thumbnail</th>
                                                        <th>Skin</th>
                                                        <th>Price</th>
                                                        <th>Username</th>
                                                        <th>SteamID</th>
                                                        <th>Trade Link</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@php
                                                		$s=1;
                                                	@endphp
                                                	@foreach($databelt as $key => $data)
                                                    <tr>
                                                        <th scope="row">{{$s}}</th>
                                                        <td><img class="icon" src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$data->skin_id}}-{{$data->skin->thumbnail}}" height="30"></td>
                                                        <td>{{$data->skin->hash_name}}</td>
                                                        @if($data->market == '1')
                                                            <td><strong>{{empty($data->mp_price) ? 'Free' : $data->mp_price.' $' }}</strong></td>
                                                        @else
                                                            <td><strong>{{empty($data->skin->skin_price) ? 'Free' : $data->skin->skin_price.' $' }}</strong></td>
                                                        @endif
                                                        <td><a href="{{$data->user->profileurl}}" target="_blank">{{$data->user->nickname}}</a></td>
                                                        <td>{{$data->user->steamid}}</td>
                                                        <td>
                                                        	<a href="javascript::void()" data-text="{{$data->user->trade_link}}" class="copy"><i class="fa fa-copy"></i> Copy to Clipboard</a> 
														</td>
                                                        <td>
                                                            <select class="form-control form-control-sm status" data-id="{{base64_encode($data->id)}}">
                                                                <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Pending</option>
                                                                <option value="2" {{$data->status == '2' ? 'selected' : ''}}>Completed</option>
                                                                <option value="3" {{$data->status == '3' ? 'selected' : ''}}>Rejected</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    @php
                                                    	$s++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->
@endsection

@section('addScript')
    
    @if (session()->has('success'))
        <script type="text/javascript">
            $.toast({
                text: "<i class='jq-toast-icon glyphicon glyphicon-ok'></i><p><strong>Success.! </strong> &nbsp;{{session()->get('success')}}</p>",
                position: 'top-center',
                loaderBg:'#7a5449',
                class: 'jq-has-icon jq-toast-success',
                hideAfter: 3500, 
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            
           $('.status').on('change',function(e){
                var stid = $(this).data("id");
                var val = $(this).val();
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to change the status?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/withdraw/status/'+stid+'/'+val+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
                    position: 'top-center',
                    loaderBg:'#7a5449',
                    class: 'jq-has-icon jq-toast-warning',
                    hideAfter: 3500, 
                    stack: 6,
                    showHideTransition: 'fade'
                });
                return false;
            });

            $('.copy').on('click',function(e){
                var copyText = $(this).data("text");
                copyToClipboard(copyText);
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Trade link copied.',
                    position: 'top-center',
                    loaderBg:'#7a5449',
                    class: 'jq-has-icon jq-toast-warning',
                    hideAfter: 3500, 
                    stack: 6,
                    showHideTransition: 'fade'
                });
                return false;
            });

           $('.inac-tst').on('click',function(e){
                var del_data = $(this).data("id");
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to In-Active this user?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/users/inactive/'+del_data+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
                    position: 'top-center',
                    loaderBg:'#7a5449',
                    class: 'jq-has-icon jq-toast-warning',
                    hideAfter: 3500, 
                    stack: 6,
                    showHideTransition: 'fade'
                });
                return false;
            });

           $('.ac-tst').on('click',function(e){
                var del_data = $(this).data("id");
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to Active this user?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/users/active/'+del_data+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
                    position: 'top-center',
                    loaderBg:'#7a5449',
                    class: 'jq-has-icon jq-toast-warning',
                    hideAfter: 3500, 
                    stack: 6,
                    showHideTransition: 'fade'
                });
                return false;
            });
        });


        function copyToClipboard(text) {
            var selected = false;
            var el = document.createElement('textarea');
            el.value = text;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            if (document.getSelection().rangeCount > 0) {
                selected = document.getSelection().getRangeAt(0)
            }
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            if (selected) {
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
            }
        }
    </script>
@endsection