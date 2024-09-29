<nav class="sidebar vertical-scroll dark_sidebar  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{ asset('elaadmin/img/logo_white.png')}}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="admin" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('elaadmin/img/menu-icon/dashboard.svg')}}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('elaadmin/img/menu-icon/2.svg')}}" alt>
                </div>
                <span>Category</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="{{route('products.index')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('elaadmin/img/menu-icon/8.svg')}}" alt>
                </div>
                <span>Products</span>
            </a>
        </li>
        
    </ul>
</nav>
