<div class="left-side-bar left-t">
    <div class="brand-logo">
        <a href="/admin">
            <img 
                src="../../assets/backend/vendors/images/logo-icon.png" 
                alt="" 
                class="dark-logo" 
                style="width:60px; height:60px; padding:10px"
            />
            <img
                src="../../assets/backend/vendors/images/logo-icon.png"
                alt=""
                class="light-logo"
                style="width:60px; height:60px; padding:10px"
            />
            <span style="color:#92999f;">Torofy.com</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/admin" class="dropdown-toggle no-arrow <?= urlIs('/admin') ? 'bg-secondary' : ''; ?>">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon ri-account-box-line"></span
                        ><span class="mtext">Accounts</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/admin/accounts" class="<?= urlIs('/admin/accounts') ? 'bg-secondary' : ''; ?>">Accounts Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/shops" class="dropdown-toggle no-arrow <?= urlIs('/admin/shops') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-store-3-line"></span
                        ><span class="mtext">Shops</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/products" class="dropdown-toggle no-arrow <?= urlIs('/admin/products') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-store-line"></span
                        ><span class="mtext">Products</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/customers" class="dropdown-toggle no-arrow <?= urlIs('/admin/customers') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-group-line"></span
                        ><span class="mtext">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/shop_slider" class="dropdown-toggle no-arrow <?= urlIs('/admin/shop_slider') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-image-2-line"></span
                        ><span class="mtext">Shop Slider</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/category" class="dropdown-toggle no-arrow <?= urlIs('/admin/category') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-function-line"></span
                        ><span class="mtext">Category</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/discount" class="dropdown-toggle no-arrow <?= urlIs('/admin/discount') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-price-tag-3-fill"></span
                        ><span class="mtext">Discount</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/orders" class="dropdown-toggle no-arrow <?= urlIs('/admin/orders') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-shopping-cart-fill"></span
                        ><span class="mtext">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/shipping" class="dropdown-toggle no-arrow <?= urlIs('/admin/shipping') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-truck-line"></span
                        ><span class="mtext">Shipping</span>
                    </a>
                </li>
        </div>
    </div>
</div>