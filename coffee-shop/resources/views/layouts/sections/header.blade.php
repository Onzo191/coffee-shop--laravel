<header class="p-3 text-white">
    <div class="container">
        <div class="overlay"></div>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <a class="navbar-brand" href="{{ route('home') }}">Coffee<small>Shop</small></a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item {{ request()->is('great-deals') ? 'active' : '' }}">
                    <a class="nav-link px-3" href="/great-deals">Khuyến mãi</a>
                </li>
                <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}">
                    <a class="nav-link px-3" href="/menu">Sản phẩm</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a class="nav-link px-3" href="/about">Về chúng tôi</a>
                </li>
            </ul>

            <div class="d-flex" x-data="{ menuOpen: false }">
                <div class="icon" @click="menuOpen = !menuOpen">
                    <i class="fa-solid fa-user"></i>
                </div>
                @if (Route::has('login'))
                    <div class="account-menu" x-show="menuOpen" @click.away="menuOpen = false">
                        @auth
                            <h3 class="menu-title">{{ __(Auth::user()->name) }}
                                <br>
                                <span class="menu-subtitle">
                                    @if (Auth::user()->is_admin)
                                        Admin
                                    @else
                                        Guest
                                    @endif
                                </span>
                            </h3>

                            @admin
                                <a href="{{ url('/admin') }}" class="">Dashboard</a>
                            @endadmin

                            <a href="{{ route('profile.edit') }}">
                                Profile
                            </a>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <h3 class="menu-title">Coffee Shop</h3>
                            <a href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a class="icon" href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </div>
</header>
