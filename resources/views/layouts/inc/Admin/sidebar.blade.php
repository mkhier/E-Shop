<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="{{ url('/dashboard') }}" class="simple-text logo-normal">
            E-shop
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Categories') }}</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ url('products') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Products') }}</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Orders') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
