@extends('support.master')
@section('title', 'Edit User')
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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="icon-user-follow"></i></span>Edit User</h4>
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
		                                    	<form method="post" action="{{ URL::to('/admin/users/update')}}">
		                                    		{{ csrf_field() }}
		                                    		<input type="hidden" name="user_id" value="{{$databelt['id']}}">
		                                        	<div class="row">
			                                        	<div class="col-md-12">
				                                        	<span class="label_span">Full Name</span>
				                                            <input type="text" class="form-control form-control-sm" name="fullname" value="{{$databelt['fullname']}}" required>
			                                        	</div>
		                                        	</div>
		                                        	<br>
		                                        	<div class="row">
			                                        	<div class="col-md-5">
				                                        	<span class="label_span">Phone</span>
				                                            <input type="text" placeholder="" data-mask="0399-9999999" class="form-control form-control-sm" value="{{$databelt['phone']}}" name="phone">
			                                        	</div>
			                                        	<div class="col-md-7">
				                                        	<span class="label_span">Email</span>
				                                            <input type="email" value="{{$databelt['email']}}" class="form-control form-control-sm" name="email">
			                                        	</div>
			                                        </div>
		                                        	<br>
		                                        	<div class="row">
			                                        	<div class="col-md-3">
				                                        	<span class="label_span">Age</span>
				                                            <input type="number" placeholder="" class="form-control form-control-sm" value="{{$databelt['age']}}" name="age">
			                                        	</div>
			                                        	<div class="col-md-5">
				                                        	<span class="label_span">CNIC</span>
				                                            <input type="text" class="form-control form-control-sm" data-mask="99999-9999999-9" value="{{$databelt['cnic']}}" name="cnic">
			                                        	</div>
			                                        	<div class="col-md-4">
				                                        	<span class="label_span">Role</span>
				                                        	<select class="form-control form-control-sm" name="role" required>
				                                        		<option value="">Select</option>
				                                        		@foreach($role as $key => $role_data)
				                                        			<option value="{{$role_data->id}}" @if($databelt['role_id'] == $role_data->id) selected @endif>{{$role_data->role}}</option>
				                                        		@endforeach
				                                        		
				                                        	</select>
			                                        	</div>
			                                        </div> 
		                                        	<div class="row">
		                                        		<hr>
		                                        	</div>
			                                        <br>
			                                        <div class="row">
			                                        	<div class="col-md-8">
			                                        		&nbsp;
			                                        	</div>
			                                        	<div class="col-md-4 right_side">
			                                        		<button type="submit" class="btn btn-primary">&nbsp;&nbsp;Update&nbsp;&nbsp;</button>
			                                        		<a href="{{URL::to('/users')}}" class="btn btn-default">Cancel</a>
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
