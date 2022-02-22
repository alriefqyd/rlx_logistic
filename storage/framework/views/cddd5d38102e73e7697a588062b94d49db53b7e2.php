<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="/home"><i class="fa fa-home"></i> Home </a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page')): ?>
            <li><a><i class="fa fa-edit"></i> Manajemen Page <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/page/home">Home Page</a></li>
                    <li><a href="/page/about">About Page</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['harga-regular','harga-corporate'])): ?>
            <li><a><i class="fa fa-edit"></i> Manajemen Harga <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('harga-regular')): ?>
                    <li><a href="/prices/regular">Regular Harga</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('harga-corporate')): ?>
                    <li><a href="/prices/corporate">Corporate Harga</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('layanan')): ?>
                <li><a href="/layanan"><i class="fa fa-home"></i> Manajemen Layanan </a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delivery')): ?>
                <li><a href="/delivery"><i class="fa fa-truck"></i> Management Pengiriman </a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <li><a href="/admin/users"><i class="fa fa-users"></i> Management User </a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
<?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>