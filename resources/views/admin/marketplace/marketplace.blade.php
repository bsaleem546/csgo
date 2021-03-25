@extends('admin.support.master')
@section('title', 'Market Place')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-people"></i></span>Marketplace</h4>
                </div>
                <!-- /Title -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <form method="post">
                            {{csrf_field()}}
                            <section class="hk-sec-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Add Skin to Market</h6>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Skin</label>
                                        <select class="form-control form-control-sm select2" name="skin_id" required>
                                            <option value="">Select</option>
                                            @foreach($skins as $key => $skin)
                                                <option value="{{$skin->id}}" data-price="{{$skin->price}}">{{$skin->hash_name.' ('.$skin->exterior.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Sugg.Price</label>
                                        <input type="number" step="any" class="form-control form-control-smn" id="stpric" name="stprice">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Sale Price</label>
                                        <input type="number" step="any" class="form-control form-control-smn" id="spric" name="sprice">
                                    </div>
                                    <div class="col-md-2">
                                        <label><br></label><br>
                                        <button type="submit" id="subbtn" class="btn btn-primary btn-sm">&nbsp;&nbsp;Add&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <!-- /Row -->
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
                                                        <th>Skin Hash Name</th>
                                                        <th>Exterior</th>
                                                        <th>Rarity</th>
                                                        <th>St. Price</th>
                                                        <th>Sl. Price</th>
                                                        <th>Sold</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $s=1; @endphp
                                                    @foreach($data as $key => $da)
                                                        <tr>
                                                            <td>{{$s}}</td>
                                                            <td><img src="{{URL::to('/')}}/dist/web/assets/images/skins/{{$da->skin->id}}-{{$da->skin->thumbnail}}" width="30px"></td>
                                                            <td>{{$da->skin->hash_name}}</td>
                                                            <td>{{$da->skin->exterior}}</td>
                                                            <td>{{$da->skin->rarity}}</td>
                                                            <td>{{'$'.number_format($da->sugg_price, 2) }}</td>
                                                            <td>{{'$'.number_format($da->price, 2) }} <a href="javascript::void()" data-id="{{base64_encode($da->id)}}" data-sprice="{{$da->price}}" data-stprice="{{$da->sugg_price}}" data-skin="{{$da->skin->hash_name}}" class="editprice"><span class="fa fa-edit"></span></a></td>
                                                            <td>{{count($da->sale)}}</td>
                                                            <td class="time-stamp">{{date("d-M-Y h:i A", strtotime($da->created_at))}}</td>
                                                            <td><div class="toggle toggle-sm toggle-light {{$da->status == '1' ? 'marketStatusOn' : 'marketStatusOff'}} marketStatus" data-id="{{base64_encode($da->id) }}" data-status="{{$da->status}}"></div></td>
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{URL::to('/admin/marketplace/editprice')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="mp_id" id="mp_id">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Price</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Skin</label>
                                        <input type="text" class="form-control form-control-sm" name="skin" id="skin" readonly>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Suggested Price</label>
                                        <input type="number" step="any" name="stprice" class="form-control form-control-sm" id="stprice">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Sale Price</label>
                                        <input type="number" step="any" name="sprice" class="form-control form-control-sm" id="sprice">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

@section('addStyle')
<link href="/vendors4/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('addScript')
    
    <script src="/vendors4/select2/dist/js/select2.full.min.js"></script>
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
        $(".select2").select2();    
        $(document).ready(function() {
            "use strict";
            $('.select2').change(function(){
               var pri = $(this).find(':selected').attr('data-price');
               $('#spric').val(pri);
               $('#stpric').val(pri);
            });
            
            $('.editprice').click(function(){
                var id = $(this).data("id");
                var skin = $(this).data("skin");
                var sprice = $(this).data("sprice");
                var stprice = $(this).data("stprice");
                $('#mp_id').val(id);
                $('#skin').val(skin);
                $('#sprice').val(sprice);
                $('#stprice').val(stprice);
                $('#exampleModal').modal('show'); 
            }); 

            $('.marketStatus').click(function(){
                var id = $(this).data("id");
                var status = $(this).data("status");
                $.ajax({
                  type:'GET',
                  url: "marketplace/status/"+id+"/"+status,
                  success: (data) => {
                   
                  },
                  error: function(data){
                   console.log(data);
                  }
                });
            }); 
            $('.marketStatusOn').toggles({
                drag: true, // allow dragging the toggle between positions
                click: true, // allow clicking on the toggle
                text: {
                on: 'Act.', // text for the ON position
                off: 'Dis.' // and off
                },
                on: true, // is the toggle ON on init
                animate: 250, // animation time (ms)
                easing: 'swing', // animation transition easing function
                checkbox: 'status', // the checkbox to toggle (for use in forms)
                clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
                
                type: 'compact' // if this is set to 'select' then the select style toggle will be used
            });
            $('.marketStatusOff').toggles({
                drag: true, // allow dragging the toggle between positions
                click: true, // allow clicking on the toggle
                text: {
                on: 'Act.', // text for the ON position
                off: 'Dis.' // and off
                },
                on: false, // is the toggle ON on init
                animate: 250, // animation time (ms)
                easing: 'swing', // animation transition easing function
                checkbox: 'status', // the checkbox to toggle (for use in forms)
                clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
                
                type: 'compact' // if this is set to 'select' then the select style toggle will be used
            });
           $('.delete').on('click',function(e){
                var del_data = $(this).data("id");
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    heading: 'Are you sure you want to delete this skin?',
                    text: '<i class="jq-toast-icon ti-alert"></i><a href="{{ URL::to("/")}}/admin/skin/delete/'+del_data+'" class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;</a>',
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