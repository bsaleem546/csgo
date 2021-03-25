<div class="nk-social-profile nk-social-profile-container-offset">
	    <div class="row">
	        <div class="col-md-5 col-lg-3">
	            <div class="nk-social-profile-avatar">
	                <a href="#">
	                    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->nickname}}">
	                </a>
	            </div>
	        </div>
	        <div class="col-md-7 col-lg-9">
	            <div class="nk-social-profile-info">
	                <div class="nk-gap-2"></div>
	                <h1 class="nk-social-profile-info-name">{{Auth::user()->name}}</h1>
	                <div class="nk-social-profile-info-username">{{'@'.Auth::user()->nickname}}</div>
	                <div class="nk-social-profile-info-actions">
	                    <a href="{{URL::to('/payment-history')}}" class="nk-btn link-effect-4">Payment History</a>
	                    <a href="{{URL::to('/sell-history')}}" class="nk-btn link-effect-4">Sell History</a>
	                    <a href="{{URL::to('/withdraw-history')}}" class="nk-btn link-effect-4">Withdraw History</a>

	                    <a href="{{Auth::user()->profileurl}}" target="_blank" class="nk-btn link-effect-4 float-right">Steam Profile</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>