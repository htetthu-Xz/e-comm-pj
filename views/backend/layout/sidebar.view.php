<div class="left-side-bar">
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
                    <a href="/shops" class="dropdown-toggle no-arrow <?= urlIs('/shops') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-store-3-line"></span
                        ><span class="mtext">Shops</span>
                    </a>
                </li>
                <li>
                    <a href="/products" class="dropdown-toggle no-arrow <?= urlIs('/products') ? 'bg-secondary' : ''; ?>">
                        <span class="micon ri-store-line"></span
                        ><span class="mtext">Products</span>
                    </a>
                </li>
        </div>
    </div>
</div>