<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('assets/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li >
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                    </a>
                    
                </li>
                <li>
                    <a href="{{ route('employment') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-building"></span><span class="mtext">Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('title') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-building"></span><span class="mtext">Gelar</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user-11"></span><span class="mtext">Data Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user.index') }}">Tabel Pengguna</a></li>
                        <li><a href="{{ route('user.create') }}">Tambah Pengguna</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Data Rapat</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('meet.index') }}">Tabel Rapat</a></li>
                        <li><a href="{{ route('meet.create') }}">Tambah Rapat</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>
