<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::User()->roles == 'ADMIN')

            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li><!-- End Home -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.category.index') }}">
                    <i class="bi bi-handbag-fill"></i>
                    <span>Category</span>
                </a>
            </li>
            {{-- End Category --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.product.index') }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Product</span>
                </a>
            </li>
            {{-- End Product --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.transaction.index') }}">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Transaction</span>
                </a>
            </li>
            {{-- End Transaction --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.user.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
            </li>
            {{-- End Users --}}

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.my-transaction.index') }}">
                    <i class="bi bi-cart"></i>
                    <span>My Transaction</span>
                </a>
            </li>
            {{-- End Users --}}

        @else

            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li><!-- End Home -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.my-transaction.index') }}">
                    <i class="bi bi-cart"></i>
                    <span>My Transaction</span>
                </a>
            </li>
            
        @endif

    </ul>

</aside>
