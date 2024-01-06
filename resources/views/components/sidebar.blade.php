<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Showroom UMKM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PIB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class={{ Request::is('home') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class={{ Request::is('user*') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-user"></i> <span>Users</span></a>
            </li>
            <li class={{ Request::is('product*') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('product.index') }}">
                <i class="fas fa-cart-shopping"></i> <span>Products</span></a>
            </li>
            <li class={{ Request::is('order*') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('order.index') }}">
                <i class="fas fa-truck-fast"></i> <span>Orders</span></a>
            </li>

            <li class="menu-header">Report</li>

            <li class={{ Request::is('report*') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('report.index') }}">
                <i class="fas fa-book"></i> <span>Report</span></a>
            </li>

    </aside>
</div>
