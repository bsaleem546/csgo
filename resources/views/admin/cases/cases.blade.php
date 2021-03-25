@extends('admin.support.master')
@section('title', 'Cases List')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-people"></i></span>Cases List</h4>
                    <div class="right_side">
                    	<a href="{{ URL::to('/admin/case/add') }}" class="btn btn-primary"><i class="fa fa-cubes"></i>&nbsp;Add Case</a>
                    </div>
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
                                                        <th>Label</th>
                                                        <th>Category</th>
                                                        <th>Case Price</th>
                                                        <th>No. of Skins</th>
                                                        <th>Expiry</th>
                                                        <th>Opened</th>
                                                        <th>Created By</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $s=1;
                                                    @endphp
                                                    @foreach($databelt as $key => $data)
                                                        <tr>
                                                            <td>{{$s}}</td>
                                                            <td><img src="{{URL::to('/')}}/dist/web/assets/images/cases/{{$data->id}}-{{$data->thumbnail}}" width="30px"></td>
                                                            <td>{{$data->label}}</td>
                                                            <td>{{$data->category->category}}</td>
                                                            <td>{{number_format($data->price, 2)}} $</td>
                                                            <td>{{$data->detail_count}}</td>
                                                            <td>{{empty($data->expiry_date) ? 'Never' : date('d-M-Y', strtotime($data->expiry_date))}}</td>
                                                            <td>0</td>
                                                            <td>{{$data->user->username}}</td>
                                                            <td class="time-stamp">{{date('d-M-Y h:i a', strtotime($data->created_at))}}</td>  
                                                            <td>
                                                                <div class="btn-group">
                                                                    <div class="dropdown">
                                                                        <a href="#" aria-expanded="false" data-toggle="dropdown" class="btn btn-link dropdown-toggle btn-icon-dropdown"><span class="feather-icon"><i data-feather="server"></i></span> <span class="caret"></span></a>
                                                                        <div role="menu" class="dropdown-menu">
                                                                            <a class="dropdown-item" href="{{URL::to('/')}}/case/details/{{ base64_encode($data->id) }}"><i class="fa fa-bars"></i>&nbsp;&nbsp;Details</a>
                                                                            <div class="dropdown-divider"></div>
                                                                            <a class="dropdown-item" href="{{URL::to('/')}}/admin/case/edit/{{ base64_encode($data->id) }}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                                            <a class="dropdown-item tst2" data-id="{{ base64_encode($data->id) }}" href="#"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
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
            
           $('.tst2').on('click',function(e){
                var del_data = $(this).data("id");
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to delete this user?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/case/delete/'+del_data+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
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
    </script>
@endsection