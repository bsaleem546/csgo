@extends('admin.support.master')
@section('title', 'Add Skin')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-user-follow"></i></span>Add Skin</h4>
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
		                                    	<form method="post" action="{{ URL::to('/admin/skin/insert')}}" enctype="multipart/form-data">
		                                    		{{ csrf_field() }}
		                                        	<div class="row">
			                                        	<div class="col-md-4">
													        <img id="skin-thumb" src="{{URL::to('/dist/img/100x100-place.png')}}" alt="your image" />
													        <input type='file' name="thumb" id="thumbnail" class="form-control"/>
			                                        	</div>
			                                        	<div class="col-lg-8">
			                                        		<div class="row">
				                                        		<div class="col-md-8">
						                                        	<span class="label_span">Skin Name &nbsp;&nbsp;<small>(Steam Hash Name)</small></span><span class="required_span">*</span>
						                                            <input type="text" placeholder="" class="form-control form-control-sm" name="skin_name" required> 
						                                        </div>
																<span class="label_span">Price</span><span class="required_span">*</span>
						                                        <input type="number" step="any" placeholder="" class="form-control form-control-sm" name="skin_price" required>
				                                        	</div>
				                                        	<br><!-- 
				                                        	<div class="row">
				                                        		<div class="col-md-8">
						                                        	<span class="label_span">Steam Asset ID</span><span class="required_span">*</span>
						                                            <input type="text" placeholder="" class="form-control form-control-sm" name="asset_id" required>
						                                        </div>
						                                    </div>
						                                    <br> -->
			                                        		<div class="row">
				                                        		<div class="col-md-12">
					                                        		<span class="label_span">Exterior</span><span class="required_span">*</span>
		                                                            <div class="block-border">
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio1" name="type" value="Factory-New" class="custom-control-input" checked>
		                                                                    <label class="custom-control-label" for="customRadio1">Factory-New</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio2" name="type" value="Minimal-Wear" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio2">Minimal-Wear</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio3" name="type" value="Field-Tested" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio3">Field-Tested</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio4" name="type" value="Well-Worn" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio4">Well-Worn</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio5" name="type" value="Battle-Scarred" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio5">Battle-Scarred</label>
		                                                                </div>
		                                                            </div>
					                                        	</div>
				                                        	</div>

				                                        	 <br>
			                                        		<div class="row">
				                                        		<div class="col-md-12">
					                                        		<span class="label_span">Rarity</span><span class="required_span">*</span>
		                                                            <div class="block-border">
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio6" name="rarity" value="Consumer-grade" class="custom-control-input" checked>
		                                                                    <label class="custom-control-label" for="customRadio6">Consumer-grade</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio7" name="rarity" value="Industrial-grade" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio7">Industrial-grade</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio8" name="rarity" value="Mil-spec" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio8">Mil-spec</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio9" name="rarity" value="Restricted" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio9">Restricted</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio10" name="rarity" value="Classified " class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio10">Classified </label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio11" name="rarity" value="Covert " class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio11">Covert  </label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio11" name="rarity" value="Exceedingly-Rare" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio11">Exceedingly-Rare</label>
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
			                                        		<a href="{{URL::to('/admin/skins')}}" class="btn btn-default">Cancel</a>
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
    @if (session()->has('error'))
        <script type="text/javascript">
            $.toast({
                text: "<i class='jq-toast-icon glyphicon glyphicon-ok'></i><p><strong>Alert.! </strong> &nbsp;{{session()->get('error')}}</p>",
                position: 'top-center',
                loaderBg:'#8b0c12',
                class: 'jq-has-icon jq-toast-danger',
                hideAfter: 3500, 
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
        <script type="text/javascript">
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