@extends('web.support.theme')
@section('title', 'Partnership')
@section('content')


            <!-- START: Header Title -->
                <div class="nk-header-title nk-header-title-lg nk-header-title-parallax nk-header-title-parallax-opacity">
                    <div class="bg-image">
                        <img src="{{URL::to('/')}}/dist/web/assets/images/image-1.jpg" alt="" class="jarallax-img">
                    </div>
                    <div class="nk-header-table">
                        <div class="nk-header-table-cell">
                            <div class="container-fluid">
                                <!-- START: Rev Slider -->
                                <div class="hero-silderr set-all">
                                <span class="nk-title display-5 block-title">Live Case Open</span>
                                    <div class="customer-logos">
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/1.png')}}">
                                        <p class="title">OMEGA</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/2.png')}}">
                                        <p class="title">TOOTH</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/3.png')}}">
                                        <p class="title">BUBBLE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/4.png')}}">
                                        <p class="title">HIVE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/5.png')}}">
                                        <p class="title">STRIKE</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/6.png')}}">
                                        <p class="title">VISION</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/7.png')}}">
                                        <p class="title">TOXIC</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/8.png')}}">
                                        <p class="title">DREAM</p>
                                      </a>
                                      <a href="#" class="slide">
                                        <span class="price">2.5 $</span>
                                        <img src="{{URL::to('/dist/web/assets/images/case-thumbs/9.png')}}">
                                        <p class="title">SHADOW</p>
                                      </a>
                                    </div>
                                </div>
                                <!-- END: Rev Slider -->
                            </div>
                        </div>
                    </div>
                    
                </div>
            <!-- END: Header Title -->


            <!-- Start PartnerShip -->

            <section class="partnership-sec">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>Partnership</h2>
                            </div>
                        </div>
                    </div>

                    <!-- =====After Login Section Start===== -->
                    <!-- ============================= -->
                    @if(Auth::check())
                    <div class="row mrg-top">
                        <div class="col-lg-8">
                            <div class="partner-links">
                                <div class="form-label-name">
                                    <label>Your partner link</label>
                                </div>
                                <form class="form clearfix">
                                    <label class="form-label" style="width: 100%; cursor: pointer;">
                                        <input class="form-input form-control" readonly="" type="text" placeholder="Your partner link" value="https://datdrop.com/p/1763511">
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="promo-code">
                                <div class="form-label-name">
                                    <label>PROMOCODE:</label>
                                </div>
                                <div class="code-btn">
                                    <form class="form clearfix">
                                        <label class="form-label" style="cursor: pointer;">
                                            <input class="form-input" type="text" placeholder="Promocode" value="1763511">
                                        </label>
                                        <button class="btn btn-code-chnge"> Change</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-12">
                            <div class="partner-tab-2">
                                <table class="table table-hover text-center">
                                    <thead>
                                      <tr>
                                        <th>YOUR LEVEL</th>
                                        <th>TOTAL REFERRALS</th>
                                        <th>ACTIVE REFERRALS</th>
                                        <th>TO NEXT LEVEL</th>
                                        <th>YOUR PERCENTAGE</th>
                                        <th>REFERRAL DEPOSITED</th>
                                        <th>YOUR EARNINGS</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="table-dark-org">
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0 $ / 2000 $</td>
                                        <td>1%</td>
                                        <td>0$</td>
                                        <td>0$</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="btnx-pay-bal">
                                <a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready btn-pay"><span class="link-effect-inner">
                                    <span class="link-effect-l">
                                        <span>
                                            <span>Skins Payout</span>
                                        </span>
                                    </span>
                                        <span class="link-effect-r">
                                            <span>
                                                <span>Skins Payout</span>
                                            </span>
                                        </span>
                                    <span class="link-effect-shade">
                                        <span>
                                            <span>Skins Payout</span>
                                        </span>
                                    </span>
                                </span>
                                </a>
                                <a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready btn-pay"><span class="link-effect-inner">
                                    <span class="link-effect-l">
                                        <span>
                                            <span>Balance Payout</span>
                                        </span>
                                    </span>
                                        <span class="link-effect-r">
                                            <span>
                                                <span>Balance Payout</span>
                                            </span>
                                        </span>
                                    <span class="link-effect-shade">
                                        <span>
                                            <span>Balance Payout</span>
                                        </span>
                                    </span>
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-6">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="heading hr-bar">
                                    <h6>FOLLOWERS NOTIFICATION</h6>
                                </div>
                            </div>
                            <div class="folwer-noti-tab">
                                <table class="table table-hover text-center">
                                    <thead>
                                      <tr>
                                        <th>YOUR FOLLOWERS</th>
                                        <th>NOTIFY FOLLOWERS</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="table-dark-org">
                                        <td><i class="fa fa-users" aria-hidden="true"></i> 0</td>
                                        <td>
                                            <a href="#" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready btn-pay">
                                                <span class="link-effect-inner">
                                                    <span class="link-effect-l">
                                                        <span>
                                                            <span>Notify</span>
                                                        </span>
                                                    </span>
                                                    <span class="link-effect-r">
                                                        <span>
                                                            <span>Notify</span>
                                                        </span>
                                                    </span>
                                                    <span class="link-effect-shade">
                                                        <span>
                                                            <span>Notify</span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="heading hr-bar">
                                    <h6>NOTIFICATIONS FAQ</h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="partner-tips">
                                    <h5><span class="points-cs"></span> What are notifications for?</h5>
                                    <p>You can send a message to all your followers through DatDrop notifications. The messages will be delivered even if followers have DatDrop page closed (note that the user needs to enable browser notifications, otherwise messages will be delivered only to those followers who are currently online on DatDrop).</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="partner-tips">
                                    <h5><span class="points-cs"></span> What are the limitations for notifications?</h5>
                                    <p>Only users with the 3+ partner level can create notifications. It is technically allowed to send up to 5 notifications per hour, but we do not recommend sending notifications too often, because followers can unfollow you. The maximum message length is limited to 64 characters, but we would recommend that you use no more than 40 characters, as the remaining characters may be truncated by browsers. You can specify only DatDrop link. Referral links are prohibited.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- =====After Login Section End===== -->
                    <!-- ============================= -->

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="p-details-box">
                                <div class="p-det-img">
                                    <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                </div>
                                <div class="p-det-nam-dec">
                                    <h5>Dynamic affiliates</h5>
                                    <p>Invited referral is not bound to one person forever, like on the other services. On DatDrop referral will be linked to that partner whose promo link/code he had used for the last time.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="p-details-box">
                                <div class="p-det-img">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                                <div class="p-det-nam-dec">
                                    <h5>Skin payout</h5>
                                    <p>With the DatDrop's partnership balance you'll be able to order a direct payout with any skins you choose.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="p-details-box">
                                <div class="p-det-img">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                </div>
                                <div class="p-det-nam-dec">
                                    <h5>Sponsorship</h5>
                                    <p>Do you have Youtube or Twitch channel?</p>
                                    <a href="#">Apply for partnership</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>PARTNER LEVELS</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="partner-lev-tbl">
                                <table class="table table-hover text-center">
                                    <thead>
                                      <tr>
                                        <th>LEVEL</th>
                                        <th>TO NEXT LEVEL</th>
                                        <th>YOUR PERCENTAGE</th>
                                        <th>REFERRAL RECEIVE</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="table-dark-org">
                                        <td>1</td>
                                        <td>0 $</td>
                                        <td>1%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>2</td>
                                        <td>2000 $</td>
                                        <td>2%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>3</td>
                                        <td>5000 $</td>
                                        <td>3%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>4</td>
                                        <td>7500 $</td>
                                        <td>4%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>5</td>
                                        <td>10000 $</td>
                                        <td>5%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>6</td>
                                        <td>20000 $</td>
                                        <td>6%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>7</td>
                                        <td>40000 $</td>
                                        <td>7%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>8</td>
                                        <td>60000 $</td>
                                        <td>8%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-dark-org">
                                        <td>9</td>
                                        <td>80000 $</td>
                                        <td>9%</td>
                                        <td>+5% to deposit</td>
                                      </tr>
                                      <tr class="table-light-org">
                                        <td>10</td>
                                        <td>100000 $</td>
                                        <td>10%</td>
                                        <td>+5% to deposit</td>
                                      </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>TIPS FOR PARTNERS</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-12">
                            <div class="partner-tips">
                                <h5><span class="points-cs"></span> Promote your partner link</h5>
                                <p>Promote your partner link or partner code at comments under Youtube videos.</p>
                                <p> More people visit your link, more partner balance you'll get and more expensive skins you can take away.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="partner-tips">
                                <h5><span class="points-cs"></span> Use icon</h5>
                                <p>Do you have Youtube or Twitch channel, website, blog...?</p>
                                <p>Add DatDrop's icon with your partner link to get even more affiliates!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="heading hr-bar">
                                <h2>FAQ</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mrg-top">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="accordion" id="faqExample">
                                <div class="card">
                                    <div class="card-header p-2" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingtwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingthree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingfour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingfive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="accordion" id="faqExample">
                                <div class="card">
                                    <div class="card-header p-2" id="headingsix">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingseven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingeight">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseeight" aria-expanded="true" aria-controls="collapseeight">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingnine">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2" id="headingten">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="true" aria-controls="collapseten">
                                              <span class="points-cs"></span> What is this partner program about?
                                            </button>
                                          </h5>
                                    </div>

                                    <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#faqExample">
                                        <div class="card-body">
                                            <span class="points-cs"></span><span class="p-span">As a DatDrop partner you get your referral link and your promo code.</span><br>
                                            <span class="p-span">You earn % of your referrals' deposits on DatDrop.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </section>
            <!-- End PartnerShip -->


<script type="text/javascript">
        var tpj=jQuery;
        var revapi50;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_50_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_50_1");
            }else{
                revapi50 = tpj("#rev_slider_50_1").show().revolution({
                    sliderType:"carousel",
                    jsFileLocation:"assets/vendor/revolution/js/",
                    sliderLayout:"auto",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        onHoverStop:"off",
                    },
                    carousel: {
                        maxRotation: 8,
                        vary_rotation: "off",
                        minScale: 20,
                        vary_scale: "off",
                        horizontal_align: "center",
                        vertical_align: "center",
                        fadeout: "off",
                        vary_fade: "off",
                        maxVisibleItems: 3,
                        infinity: "on",
                        space: -90,
                        stretch: "off"
                    },
                    responsiveLevels:[1240,1024,778,480],
                    gridwidth:[800,600,400,320],
                    gridheight:[600,400,320,280],
                    lazyType:"none",
                    shadow:0,
                    spinner:"off",
                    stopLoop:"on",
                    stopAfterLoops:0,
                    stopAtSlide:0,
                    shuffle:"off",
                    autoHeight:"off",
                    fullScreenAlignForce:"off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });

        $(document).ready(function(){
          $('.customer-logos').slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            }, {
              breakpoint: 520,
              settings: {
                slidesToShow: 2
              }
            }]
          });
        });
    </script>


@endsection