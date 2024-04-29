<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{ route('app.index') }}"><img src="img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <div class="dropdown">
            <span>@auth {{ Auth::user()->name }}@endauth <i class="icon_profile"></i></span>
            <div class="dropdown-content">
                @if (Route::has('login'))

                @auth
                    @if (Auth::user()->utype === 'ADM')
                        <p><a href="{{ route('admin.index') }}">Dashboard</a></p>
                    @else
                        <p><a href="{{ route('user.index') }}">My Account</a></p>
                    @endif
                    <p>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </p>
                @else
                    <p><a href="{{ route('login') }}">Login</a></p>
                    <p><a href="{{ route('register') }}">Register</a></p>
                @endauth
            @endif
            </div>
        </div>
        
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('app.index') }}"><img src="{{ URL('assets/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('app.index') }}">Home</a></li>
                        <li><a href="#">Women’s</a></li>
                        <li><a href="#">Men’s</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./product-details.html">Product Details</a></li>
                                <li><a href="./shop-cart.html">Shop Cart</a></li>
                                <li><a href="./checkout.html">Checkout</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">

                        <div class="dropdown">
                                <span>@auth {{ Auth::user()->name }}@endauth <i class="icon_profile"></i></span>
                                <div class="dropdown-content">

                                    @if (Route::has('login'))

                                        @auth
                                            @if (Auth::user()->utype === 'ADM')
                                                <p><a href="{{ route('admin.index') }}">Dashboard</a></p>
                                            @else
                                                <p><a href="{{ route('user.index') }}">My Account</a></p>
                                            @endif
                                            <p>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            </p>
                                        @else
                                            <a href="{{ route('login') }}">Login</a>
                                            <a href="{{ route('register') }}">Register</a>
                                        @endauth
                                    @endif

                                </div>
                         </div>




                    </div>

                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                            <li><a href="#"><span class="icon_cart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>

                        </ul>


                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown span {
            background-color: #ce1919;
            color: white;
            padding: 10px 14px;
            font-size: 25px;
            border: none;
            cursor: pointer;
        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
