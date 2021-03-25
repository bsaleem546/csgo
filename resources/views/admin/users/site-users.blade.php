@extends('admin.support.master')
@section('title', 'Site Users')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-people"></i></span>Site Users</h4>
                    <br><br>
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
                                            <table id="datatable" class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Avatar</th>
                                                        <th>Full Name</th>
                                                        <th>Nickname</th>
                                                        <th>Steam ID</th>
                                                        <th>Steam Profile</th>
                                                        <th>Created at</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@php
                                                		$s=1;
                                                	@endphp
                                                	@foreach($databelt as $key => $data)
                                                    <tr>
                                                        <th scope="row">{{$s}}</th>
                                                        <td><img src="{{$data->avatar}}" width="40px"/></td>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->nickname}}</td>
                                                        <td>{{$data->steamid}}</td>
                                                        <td><a href="{{$data->profileurl}}" target="_blank"><i class="fa fa-steam"></i> Steam</td>
                                                        <td>
                                                            {{date('d-M-Y h:i A', strtotime($data->created_at))}}
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

@section('addStyle')
        <!-- Data Table CSS -->
    <link href="/vendors4/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/vendors4/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('addScript')
    
        <!-- Data Table JavaScript -->
    <script src="/vendors4/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors4/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendors4/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/vendors4/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            
           $('#datatable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                language: { 
                    search: "",
                    searchPlaceholder: "Search",
                    sLengthMenu: "_MENU_items"
                }
            });
        });
    </script>
@endsection