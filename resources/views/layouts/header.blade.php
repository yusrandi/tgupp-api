<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
       
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('assets/vendors/images/photo1.jpg') }}" alt="">
                    </span>
                    <span class="user-name">{{ auth()->user()->fullname }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> --}}
                    {{-- <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> --}}
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="dw dw-logout"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="{{ asset('assets/vendors/images/github.svg') }}" alt=""></a>
        </div>
    </div>
</div>