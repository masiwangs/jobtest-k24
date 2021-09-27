<header class="mb-5">
    <div class="header-top py-2">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="/assets/images/logo/Logo-k24klik-hijau-tulisan-new-01-01-768x290.png" style="height: 3rem" alt="Logo" srcset=""></a>
            </div>
            <div class="header-top-right">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar bg-success">
        <div class="container">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('home') }}" class='menu-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Profil Anda</span>
                    </a>
                </li>
                <li class="menu-item me-auto">
                    <a href="{{ route('users') }}" class='menu-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Daftar Member</span>
                    </a>
                </li>

                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="{{ route('logout') }}" class='submenu-link text-danger'><i class="bi bi-power"></i> Logout</a>
                                </li>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>