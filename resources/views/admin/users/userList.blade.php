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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-people"></i></span>Users</h4>
                    <div class="right_side">
                    	<a href="{{ URL::to('/admin/users/Add') }}" class="btn btn-primary"><i class="icon-user-follow"></i>&nbsp;Add User</a>
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
                                                        <th>Full Name</th>
                                                        <th>Username</th>
                                                        <th>Age</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@php
                                                		$s=1;
                                                	@endphp
                                                	@foreach($databelt as $key => $data)
                                                    <tr>
                                                        <th scope="row">{{$s}}</th>
                                                        <td>{{$data->fullname}}</td>
                                                        <td>{{$data->username}}</td>
                                                        <td><strong>{{$data->age}}</strong>y</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->phone}}</td>
                                                        <td>
                                                        	@if($data->role_id == 1)
                                                        		<span class="badge badge-danger">Admin</span>
                                                            @elseif($data->role_id == 2)
                                                                <span class="badge badge-info">Editor</span>
                                                        	@endif
														</td>
                                                        <td>
                                                            @if($data->status == 1)
                                                                <span class="badge badge-success">Active</span>
                                                            @else
                                                                <span class="badge badge-danger">In-Active</span>
                                                            @endif
                                                        </td>
														<td>
                                                            <div class="btn-group">
                                                                <div class="dropdown">
                                                                    <a href="#" aria-expanded="false" data-toggle="dropdown" class="btn btn-link dropdown-toggle btn-icon-dropdown"><span class="feather-icon"><i data-feather="server"></i></span> <span class="caret"></span></a>
                                                                    <div role="menu" class="dropdown-menu">
                                                                        <a class="dropdown-item" href="{{URL::to('/')}}/admin/users/edit/{{ base64_encode($data->id) }}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                                        @if($data->status == 1)
                                                                            <a class="dropdown-item inac-tst" data-id="{{ base64_encode($data->id) }}" href="#"><i class="linea-icon linea-basic" data-icon="g"></i>&nbsp;In-Active</a>
                                                                        @else
                                                                            <a class="dropdown-item ac-tst" data-id="{{ base64_encode($data->id) }}" href="#"><i class="glyphicon glyphicon-ok"></i>&nbsp;Active</a>
                                                                        @endif
                                                                        
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item tst2" data-id="{{ base64_encode($data->id) }}" href="#"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
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
            
           $('.tst2').on('click',function(e){
                var del_data = $(this).data("id");
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to delete this user?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/users/delete/'+del_data+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
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