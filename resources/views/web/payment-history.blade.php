@extends('web.support.theme')
@section('title', 'Payment History')
@section('content')

          
<!-- START: Header Title -->
<!--
    Additional Classes:
        .nk-header-title-sm
        .nk-header-title-md
        .nk-header-title-lg
        .nk-header-title-xl
        .nk-header-title-full
        .nk-header-title-parallax
        .nk-header-title-parallax-opacity
        .nk-header-title-boxed
-->
<div class="nk-header-title nk-header-title-sm nk-header-title-parallax nk-header-title-parallax-opacity">
    <div class="bg-image op-5">
        <img src="{{URL::to('/dist/web')}}/assets/images/image-1.jpg" alt="" class="jarallax-img">
    </div>
    <div class="nk-header-table">
        <div class="nk-header-table-cell">
            <div class="container">
                
                
                
                
                
            </div>
        </div>
    </div>
    
</div>
<!-- END: Header Title -->


        

        
<div class="container">
    
    @include('web.support.profileHeader')

    <div class="row vertical-gap">
        <div class="col-lg-12">
            <div class="nk-gap-2 d-none d-lg-block"></div>
            <div class="nk-social-container">
            	<div class="row">
                    <div class="col-lg-12">
                        <h3 class="nk-social-profile-info-name">Payment History</h3>
                    </div>
            		<div class="col-lg-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Trans#</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Comment</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7">No Record Found.</td>
                                </tr>
                            </tbody>
                        </table>
            		</div>
            	</div>
            </div>
            <div class="nk-gap-4"></div>
        </div>
    </div>
    <div class="nk-gap-3"></div>
</div>


    @include('web.support.counter')

@endsection