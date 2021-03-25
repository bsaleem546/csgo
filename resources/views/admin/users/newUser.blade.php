@extends('admin.support.master')
@section('title', 'Add User')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-user-follow"></i></span>Add User</h4>
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
		                                    	<form method="post" action="{{ URL::to('/admin/users/insert')}}">
		                                    		{{ csrf_field() }}
		                                        	<div class="row">
			                                        	<div class="col-md-12">
				                                        	<span class="label_span">Full Name</span>
				                                            <input type="text" class="form-control form-control-sm" name="fullname" required>
			                                        	</div>
		                                        	</div>
		                                        	<br>
		                                        	<div class="row">
			                                        	<div class="col-md-5">
				                                        	<span class="label_span">Phone</span>
				                                            <input type="text" placeholder="" data-mask="0399-9999999" class="form-control form-control-sm" name="phone">
			                                        	</div>
			                                        	<div class="col-md-7">
				                                        	<span class="label_span">Email</span>
				                                            <input type="email" class="form-control form-control-sm" name="email">
			                                        	</div>
			                                        </div>
		                                        	<br>
		                                        	<div class="row">
			                                        	<div class="col-md-3">
				                                        	<span class="label_span">Age</span>
				                                            <input type="number" placeholder="" class="form-control form-control-sm" name="age">
			                                        	</div>
			                                        	<div class="col-md-5">
				                                        	<span class="label_span">CNIC</span>
				                                            <input type="text" class="form-control form-control-sm" data-mask="99999-9999999-9" name="cnic">
			                                        	</div>
			                                        	<div class="col-md-4">
				                                        	<span class="label_span">Role</span>
				                                        	<select class="form-control form-control-sm" name="role" required>
				                                        		<option value="">Select</option>
				                                        		@foreach($role as $key => $role_data)
				                                        			<option value="{{$role_data->id}}" @if($role_data->id == 1) selected @endif>{{$role_data->role}}</option>
				                                        		@endforeach
				                                        	</select>
			                                        	</div>
			                                        </div> 
		                                        	<div class="row">
		                                        		<hr>
		                                        	</div>
		                                        	<div class="row">
			                                        	<div class="col-md-4">
				                                        	<span class="label_span">Username</span>
				                                            <input type="text" placeholder="" name="username" autocomplete="false"  class="form-control form-control-sm" required>
			                                        	</div>
			                                        	<div class="col-md-4">
				                                        	<span class="label_span">Password</span>
				                                            <input type="password" name="password" autocomplete="false"  class="form-control form-control-sm" required>
			                                        	</div>
			                                        	<div class="col-md-4">
				                                        	<span class="label_span">Confirm Password</span>
				                                            <input type="password" name="password_confirmation" class="form-control form-control-sm" required>
			                                        	</div>
			                                        </div>
			                                        <br>
			                                        <div class="row">
			                                        	<div class="col-md-8">
			                                        		&nbsp;
			                                        	</div>
			                                        	<div class="col-md-4 right_side">
			                                        		<button type="submit" class="btn btn-primary">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
			                                        		<a href="{{URL::to('/admin/users')}}" class="btn btn-default">Cancel</a>
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
                text: "<i class='jq-toast-icon glyphicon glyphicon-ok'></i></i><p><strong>Success.! </strong> &nbsp;{{session()->get('success')}}</p>",
                position: 'top-center',
                loaderBg:'#7a5449',
                class: 'jq-has-icon jq-toast-success',
                hideAfter: 3500, 
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
@endsection