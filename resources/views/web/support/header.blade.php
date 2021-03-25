

<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">

<div class="nk-contacts-top">
    <div class="container">
        <div class="d-f-alg-center">
            <div class="nk-contacts-left"> 
                <div class="nk-navbar">
                    <ul class="nk-nav">
                        <li class="nk-drop-item">
                            <a href="#">USA</a>
                            <ul class="dropdown">
                                <li><a href="#">USA</a></li>
                                <li><a href="#">Russia</a></li>
                                <li><a href="#">United Kingdom</a></li>
                                <li><a href="#">France</a></li>
                                <li><a href="#">Spain</a></li>
                                <li><a href="#">Germany</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="nk-contacts-right"> 
                <div class="nk-navbar">
                   <!--  <ul class="nk-nav">
                        <li><a href="#" target="_blank"><span class="ion-social-twitter"></span></a></li>
                        <li><a href="#" target="_blank"><span class="ion-social-dribbble-outline"></span></a></li>
                        <li><a href="#"><span class="ion-social-instagram-outline"></span></a></li>
                        <li><a href="#"><span class="ion-social-pinterest"></span></a></li>
                    </ul> -->
                    <ul class="navbar-nav hero-drop-ul">
                        @if(Auth::check()) 
                            {{-- <li class="nav-item"><a class="nav-link" href="http://localhost:81/csgo/profile">Bal: <b>{{ number_format(empty(Auth::user()->wallet->amount) ? '0' : Auth::user()->wallet->amount, 2)}} $ |</b></a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="{{ url('/profile') }}">Bal: <b>{{ number_format(empty(Auth::user()->wallet->amount) ? '0' : Auth::user()->wallet->amount, 2)}} $ |</b></a></li>
                            <li class="nav-item dropdown">
                            <span class="dropdown-toggle profile-header" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="{{ Auth::user()->avatar}}" width="30" height="30" class="img-circle">&nbsp;&nbsp;{{ Auth::user()->nickname}}
                            </span>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{URL::to('/profile')}}">View Profile</a>
                              <a class="dropdown-item" href="{{URL::to('/auth/logout')}}">Log Out</a>
                            </div>
                          </li>
                        @else
                            <li class="nav-item">
                                <!--a href="{{URL::to('/auth/steam')}}" target="_blank"><i class="fa fa-steam"></i>&nbsp;SIGN IN WITH STEAM</a--> 
                                {{-- <a href="{{URL::to('/auth/steam')}}" target="popup" onclick="MyWindow=window.open('{{URL::to('/auth/steam')}}','popup','width=800,height=600', 'left=500'); return false;"> SIGN IN WITH STEAM</a>   --}}
                                <a href="{{URL::to('/auth/steam')}}"> SIGN IN WITH STEAM</a>  
                            </li>
                        @endif
                    </ul>
                    <!-- <div class="collapse navbar-collapse" id="navbar-list-4">
                        
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-transparent nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="{{URL::to('/')}}" class="nk-nav-logo">
                    <img src="{{URL::to('/')}}/dist/web/assets/images/logo-n.png" alt="" width="150">
                </a>
                
                
                <ul class="nk-nav nk-nav-right d-none d-lg-block" data-nav-mobile="#nk-nav-mobile">
                    <li class="nk-drop-item">
                        <a href="{{URL::to('/partnership')}}">
                            Partnership
                        </a>
                    </li>

                    <li class="nk-drop-item">
                        <a href="{{URL::to('/provably_fair')}}">
                            Provably Fair
                        </a>
                    </li>

                    <li class="nk-drop-item">
                        <a href="{{URL::to('/free_cases')}}">
                            Free Cases
                        </a>
                    </li>

                    <li class="active nk-drop-item">
                        <a href="{{URL::to('/marketplace')}}">
                            Marketplace
                        </a>
                    </li>

                    <li class="active  nk-drop-item">
                        <a href="{{URL::to('/battles')}}">
                            Battle Opening
                        </a>
                    </li>

                    <li class="active  nk-drop-item">
                        <a href="{{URL::to('/upgrade')}}">
                            Upgrade
                        </a>
                    </li>
                </ul>
                
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
                    
                    
                    
                    <!-- <li class="single-icon">
                        <a href="#" class="nk-search-toggle no-link-effect">
                            <span class="nk-icon-search"></span>
                        </a>
                    </li>
                     -->
                    
                    
                    
                    <!-- <li class="single-icon">
                        <a href="#" class="nk-sign-toggle no-link-effect">
                            <span class="nk-icon-toggle">
                                <span class="nk-icon-toggle-front">
                                    <span class="fa fa-sign-in"></span>
                                </span>
                                <span class="nk-icon-toggle-back">
                                    <span class="nk-icon-close"></span>
                                </span>
                            </span>
                        </a>
                    </li>
                     -->
                    
                    
                    <li class="single-icon"> <a href="#"
                    class="no-link-effect" data-nav-toggle="#nk-side"> <span
                    class="nk-icon-burger"> <span class="nk-t-1"></span> <span
                    class="nk-t-2"></span> <span class="nk-t-3"></span>
                    </span> </a> </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>

    
<nav class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-lg nk-navbar-align-center nk-navbar-overlay-content" id="nk-side">
    
    <div class="nk-navbar-bg">
        <div class="bg-image">
            <img src="{{URL::to('/')}}/dist/web/assets/images/bg-nav-side.jpg" alt="" class="jarallax-img">
        </div>
    </div>
    

    <div class="nano">
        <div class="nano-content">
            <div class="nk-nav-table">
                
                <div class="nk-nav-row">
                    <a href="{{URL::to('/')}}" class="nk-nav-logo">
                        <img src="{{URL::to('/')}}/dist/web/assets/images/logo-n.png" alt="" width="150">
                    </a>
                </div>
                
                <div class="nk-nav-row nk-nav-row-full nk-nav-row-center">
                    <ul class="nk-nav">
                        <li class=" ">
                            <a href="{{URL::to('/partnership')}}">PartnerShip</a>
                        </li>
                        <li class=" ">
                            <a href="{{URL::to('/provably_fair')}}">Provably Fair</a>
                        </li>
                        <li class=" ">
                            <a href="{{URL::to('/free_cases')}}">Free Cases</a>
                        </li>
                        <li class=" ">
                            <a href="{{URL::to('/top_wins')}}">Top Wins</a>
                        </li>
                        <li class=" ">
                            <a href="{{URL::to('/')}}">Battle Opening</a>
                        </li>
                        <li class=" ">
                            <a href="{{URL::to('/upgrade')}}">Upgrade</a>
                        </li>
                    </ul>
                </div>
                <div class="nk-nav-row">
                    <div class="nk-nav-footer">
                        &copy; 2018 nK Group Inc. Developed in association with LoremInc. IpsumCompany, SitAmmetGroup, CumSit and related logos are registered trademarks. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- END: Right Navbar -->


<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-left-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="{{URL::to('/')}}/dist/web/assets/images/logo-n.png" alt="" width="150">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div> 

 
<!-- END: Navbar Mobile -->
