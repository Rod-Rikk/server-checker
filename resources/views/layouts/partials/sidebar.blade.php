<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            {{-- <img src="/resources/images/icon/sidebar_logo1.png" alt="Cool Admin" /> --}}
            <img src="{{ asset('images/icon/sidebar_logo1M.png' ) }} " alt="Server Checker" />
        </a>
    </div>
    <div class=" menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="/home">Dashboard 1</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/servers">
                        <i class="fas fa-desktop"></i>Servers</a>
                </li>

                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->