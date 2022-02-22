<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="/admin/home"><i class="fa fa-home"></i> Home </a></li>
            @can('page')
            <li><a><i class="fa fa-edit"></i> Manajemen Page <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: block">
                    <li><a href="/admin/page/home">Home Page</a></li>
                    <li><a href="/admin/page/about">About Page</a></li>
                </ul>
            </li>
            @endcan
            @canany(['harga-regular','harga-corporate'])
            <li class=""><a><i class="fa fa-edit"></i> Manajemen Harga <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: block">
                    @can('harga-regular')
                    <li><a href="/admin/prices/regular">Regular Harga</a></li>
                    @endcan
                    @can('harga-corporate')
                    <li><a href="/admin/prices/corporate">Corporate Harga</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('layanan')
                <li><a href="/admin/layanan"><i class="fa fa-home"></i> Manajemen Layanan </a></li>
            @endcan
            @can('delivery')
                <li><a href="/admin/delivery"><i class="fa fa-truck"></i> Management Pengiriman </a></li>
            @endcan
            @can('admin')
                <li><a href="/admin/users"><i class="fa fa-users"></i> Management User </a></li>
            @endcan
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
