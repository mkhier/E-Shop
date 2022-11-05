<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ __('E-Shop') }}</a>
        <div class="search-bar">
            <form action="{{ url('search-product') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="search_product" name="product_name" required
                        placeholder="Seacrh Products" aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ Request::is('category') ? 'Active' : '' }}">
                    <a class="nav-link" href="{{ url('category') }}">{{ __('Category') }}</a>
                </li>
                <li class="nav-item {{ Request::is('cart') ? 'Active' : '' }}">
                    <a class="nav-link" href="{{ url('cart') }}">{{ __('Cart') }}
                        <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('wishlist') ? 'Active' : '' }}">
                    <a class="nav-link" href="{{ url('wishlist') }}">{{ __('Wishlist') }}</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('my-orders') }}">
                                    {{ __('My Orders') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    My Profile
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
