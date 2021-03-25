@extends('admin.support.master')
@section('title', 'Add Case')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-cube"></i></span>Add Case</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                        	<form method="post" action="{{ URL::to('/admin/case/insert')}}" enctype="multipart/form-data">
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
	                                        <div class="col-md-4">
		                                    	
		                                    		{{ csrf_field() }}
		                                        	<div class="row">
			                                        	<div class="col-md-6">
													        <img id="skin-thumb" src="{{URL::to('/dist/img/100x100-place-c.png')}}" alt="your image" />
													        <input type='file' name="thumb" id="thumbnail" class="form-control"/>
													        <br>
			                                        	</div>
			                                        	<div class="col-lg-12">
			                                        		<div class="row">
				                                        		<div class="col-md-12">
						                                        	<span class="label_span">Label</span><span class="required_span">*</span>
						                                            <input type="text" placeholder="" class="form-control form-control-sm" name="label" required>
						                                        </div>
				                                        	</div>
				                                        	<br>
				                                        	<div class="row">
				                                        		<div class="col-md-7">
						                                        	<span class="label_span">Expiry</span>
						                                            <input type="date" placeholder="" class="form-control form-control-sm" name="expiry">
						                                        </div>
				                                        		<div class="col-md-5">
						                                        	<span class="label_span">Price</span><span class="required_span">*</span>
						                                            <input type="number" step="any" placeholder="" class="form-control form-control-sm" name="price" required>
						                                        </div>
						                                    </div>
						                                    <br>
						                                    <div class="row">
						                                    	<div class="col-md-12">
					                                        		<span class="label_span">Category</span><span class="required_span">*</span>
		                                                            <div class="block-border">
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio1" name="category" value="1" class="custom-control-input" checked>
		                                                                    <label class="custom-control-label" for="customRadio1">Featured</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio2" name="category" value="2" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio2">Official</label>
		                                                                </div>
		                                                                <div class="custom-control custom-radio block">
		                                                                    <input type="radio" id="customRadio3" name="category" value="3" class="custom-control-input">
		                                                                    <label class="custom-control-label" for="customRadio3">Popular</label>
		                                                                </div>
		                                                            </div>
					                                        	</div>
						                                    </div>
			                                        	</div>
		                                        	</div> 
		                                        	<div class="row">
		                                        		<hr>
		                                        	</div>
	                                        </div>
	                                    	<div class="col-md-8" style="background-color: #eaeaea;">
	                                    		<div class="row">
	                                    			<div class="col-lg-8">
	                                    				<h3>Skin Details</h3>
	                                    			</div>
	                                    			<div class="col-lg-4">
	                                    				<input type="hidden" id="totalOd" value="0">
	                                    				<h6>Total Odds: <span id="totalOdds">0</span></h6>
	                                    				<span>Total Odds must be 100.</span>
	                                    			</div>
	                                    		</div>
	                                    		<div class="row row-bg">
	                                    			<div class="col-lg-12">
		                                    			<table class="skin-table">
		                                    				<thead>
			                                    				<tr>
			                                    					<th style="width: 60%;">Skin</th>
			                                    					<th style="width: 35%;">Odds</th>
			                                    					<th style="width: 5%;">-</th>
			                                    				</tr>
		                                    				</thead>
		                                    				<tbody id="skinitem">
			                                    				<tr>
			                                    					<td>
						                                        	<select class="form-control form-control-sm select2" name="skinid[]" required>
						                                        		<option value="">Select</option>
						                                        		@foreach($skins as $key => $skin)
						                                        			<option value="{{$skin->id}}">{{$skin->hash_name.' ('.$skin->exterior.')'}}</option>
						                                        		@endforeach
						                                        	</select>
			                                    					</td>
			                                    					<td><input type="number" step="any" name="sods[]" class="form-control form-control-sm skinOdd" required></td>
			                                    					<td><button class="btn btn-success btn-sm" id="addbtn"><span class="fa fa-plus"></span></button></td>
			                                    				</tr>
			                                    			</tbody>
		                                    			</table>
		                                    		</div>
	                                    		</div>
	                                    		<div class="row">
			                                        <div class="col-md-12 right_side">
			                                        	<br><br>
			                                        	<button type="submit" id="subbtn" class="btn btn-primary">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
			                                        	<a href="{{URL::to('/admin/cases')}}" class="btn btn-default">Cancel</a>
		                                    			
			                                        </div>
			                                    </div>
	                                    	</div>
                                    </div>
                                </div>
                            </div>
                            </form>
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
        	$(document).ready(function() {
			    var max_fields = 10;
			    var wrapper = $("#skinitem");
			    var add_button = $("#addbtn");

			    var x = 1;
			    $(add_button).click(function(e) {
			        e.preventDefault();
			        if (x < max_fields) {
			            x++;
			            $(wrapper).append('<tr><td><select class="form-control form-control-sm select2" name="skinid[]" required><option value="">Select</option>@foreach($skins as $key => $skin)<option value="{{$skin->id}}">{{$skin->hash_name." (".$skin->exterior.")"}}</option>@endforeach</select></td><td><input type="number" name="sods[]" class="form-control form-control-sm skinOdd" step="any" required></td><td><button class="btn btn-danger btn-sm delete"><span class="fa fa-minus"></span></button></td></tr>'); //add input box
			            	$(".select2").select2();
			        } else {
			            alert('You Reached the limits')
			        }
			    });

			     $(document).on('keyup','.skinOdd', function() {
	        		var inputs = $('.skinOdd');
	        		var val = 0;
					for(var i = 0; i < inputs.length; i++){
					    val = val + parseFloat($(inputs[i]).val());
					}
					$('#totalOdds').html(val);
					$('#totalOd').val(val);
					if(val != 100){
						$('#subbtn').attr('disabled', 'true');
					}else{
						$('#subbtn').removeAttr('disabled');
					}
			    });

			    $(wrapper).on("click", ".delete", function(e) {
			        e.preventDefault();
			        $(this).parent('td').parent('tr').remove();
			        x--;
			    })
			});
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