<nav class="hk-nav hk-nav-dark">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin') }}" >
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                                <span class="feather-icon"><i data-feather="gift"></i></span>
                                <span class="nav-link-text">Give Away</span>
                            </a>
                            <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ URL::to('/admin/giveaway/type/'.base64_encode('1')) }}">Hourly</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ URL::to('/admin/giveaway/type/'.base64_encode('2')) }}">Daily</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ URL::to('/admin/giveaway/type/'.base64_encode('3')) }}">Weekly</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/cases/') }}" >
                                <span class="feather-icon"><i data-feather="package"></i></span>
                                <span class="nav-link-text">Cases</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/skins/') }}" >
                                <span class="feather-icon"><i data-feather="layers"></i></span>
                                <span class="nav-link-text">Skins</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/withdraw/request') }}" >
                                <span class="feather-icon"><i data-feather="download"></i></span>
                                <span class="nav-link-text" id="wdig">Withdraw Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/deposit/request') }}" >
                                <span class="feather-icon"><i data-feather="credit-card"></i></span>
                                <span class="nav-link-text" id="drig">Deposit Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/marketplace') }}" >
                                <span class="feather-icon"><i data-feather="gift"></i></span>
                                <span class="nav-link-text" id="wdig">Marketplace</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Settings</span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/users') }}" >
                                <i class="icon-people"></i>
                                <span class="nav-link-text">Admin Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/admin/site-users') }}" >
                                <i class="icon-people"></i>
                                <span class="nav-link-text">Site Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>