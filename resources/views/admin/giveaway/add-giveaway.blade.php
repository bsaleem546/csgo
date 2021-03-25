@extends('admin.support.master')
@section('title', 'Add Giveaway')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-user-follow"></i></span>Add Give-Away</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                    		 @if ($errors->any())
                                    		 	<div class="col-md-12">
                                    		 		<div class="alert alert-danger">
														<ul class="error_list">
														     @foreach ($errors->all() as $error)
														         <li>{{$error}}</li>
														     @endforeach
														 </ul>
													 </div>
												 </div>
											 @endif
	                                    	<div class="col-md-2">
	                                    		&nbsp;
	                                    	</div>
	                                        <div class="col-md-8">
		                                    	<form method="post" action="{{ URL::to('/admin/giveaway/insert')}}" enctype="multipart/form-data">
		                                    		{{ csrf_field() }}
		                                        	<div class="row">
			                                        	<div class="col-lg-12">
			                                        		<div class="row">
				                                        		<div class="col-md-7">
						                                        	<span class="label_span">Label</span>
						                                            <input type="text" placeholder="" class="form-control form-control-sm" name="label" required>
						                                        </div>
				                                        		<div class="col-md-5">
						                                        	<span class="label_span">Giveaway Price <small>(Optional)</small></span>
						                                            <input type="number" placeholder="" class="form-control form-control-sm" name="price">
						                                        </div>
				                                        	</div>
				                                        	<br>
				                                        	<div class="row">
								                                <div class="col-md-12 col-sm-12 col-12">
						                                        	<span class="label_span">Duration</span>
								                                    <input class="form-control" type="text" name="datetimes" required />
								                                </div>
						                                    </div>
						                                    <br>
				                                        	<div class="row">
				                                        		<div class="col-md-12">
						                                        	<span class="label_span">Skin</span>
						                                        	<select class="form-control select2" name="skinid" required>
						                                        		<option value="">Select</option>
						                                        		@foreach($skins as $key => $skin)
						                                        			<option value="{{$skin->id}}">{{$skin->hash_name}}</option>
						                                        		@endforeach
						                                        	</select>
						                                        </div>
						                                    </div>
						                                    <br>
			                                        		<div class="row">
				                                        		<div class="col-md-12">
			                                        		<span class="label_span">Type</span><span class="required_span">*</span>
                                                            <div class="block-border">
                                                                <div class="custom-control custom-radio block">
                                                                    <input type="radio" id="customRadio1" name="type" value="1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="customRadio1">Hourly</label>
                                                                </div>
                                                                <div class="custom-control custom-radio block">
                                                                    <input type="radio" id="customRadio2" name="type" value="2" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio2">Daily</label>
                                                                </div>
                                                                <div class="custom-control custom-radio block">
                                                                    <input type="radio" id="customRadio3" name="type" value="3" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customRadio3">Weekly</label>
                                                                </div>
                                                            </div>
			                                        	</div>
				                                        	</div>
			                                        	</div>
		                                        	</div> 
		                                        	<div class="row">
		                                        		<hr>
		                                        	</div>
			                                        <div class="row">
			                                        	<div class="col-md-8">
			                                        		&nbsp;
			                                        	</div>
			                                        	<div class="col-md-4 right_side">
			                                        		<button type="submit" class="btn btn-primary">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
			                                        		<button class="btn btn-default" type="reset">Cancel</button>
			                                        	</div>
			                                        </div>
		                                    	</form>
	                                        </div>
	                                    	<div class="col-md-2">
	                                    		&nbsp;
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
		   function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#skin-thumb').attr('src', e.target.result);
		            }
		            
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    
		    $("#thumbnail").change(function(){
		        readURL(this);
		    });
        </script>
@endsection