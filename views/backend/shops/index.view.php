<?php include(base_path('views/backend/layout/header.view.php')) ?>
    <?php if(null !== session('success')) : ?>
        <div class="alert alert-success success-message"><?= session('success') ?></div>
    <?php endif; ?>
    <div class="main-container mt-2 pt-2">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="container pd-0">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="page-h">
                                    <span class="font-26 font_b">Shops</span>
                                    <?php if(session('auth_user')['is_admin'] == '1') : ?> 
                                        <div class="t-right dpy-i">
                                            <a href="/admin/shops/create" class="btn btn-primary btn-lg">
                                                <span class="ri-add-line"></span> Create Shop
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-directory-list">
                        <ul class="row">
                            <?php foreach($shops as $shop) : ?>
                                <li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="contact-directory-box">
                                        <div class="contact-dire-info text-center h">
                                            <div class="contact-avatar">
                                                <span>
                                                    <img src="../../<?= $shop['logo'] ?>" alt="" class="w-100 h-100" />
                                                </span>
                                            </div>
                                            <div class="contact-name">
                                                <h4 class="mb-1"><?= $shop['name'] ?></h4>
                                                <p class="mb-1">Opened - Since <?= getDateDb($shop['created_at'], 'j-M-Y') ?></p>
                                                <div class="work text-success">
                                                    <i class="ion-android-person"></i> Owner - <?= getOwner($shop['owner_id'], $users) ?>
                                                </div>
                                            </div>
                                            <div class="contact-skill">
                                                <span class="badge badge-pill ">Open Time - <?= getDateDb($shop['open_time'], 'H:i A')  ?></span>
                                                <span class="badge badge-pill ">Close Time - <?= getDateDb($shop['close_time'], 'H:i A') ?></span>
                                            </div>
                                            <div class="profile-sort-desc">
                                                <?= $shop['description'] ?>
                                            </div>
                                        </div>
                                        <?php if(session('auth_user')['is_admin'] == '1') : ?>          
                                            <div class="shop-action">
                                                <div class="dropdown">
                                                    <a
                                                        class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href=""
                                                        role="button"
                                                        data-toggle="dropdown"
                                                    >
                                                        <span class="icon-copy ti-angle-down"></span> Option
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                                    >
                                                        <a class="dropdown-item view" href="#"
                                                            ><i class="dw dw-eye"></i> View</a
                                                        >
                                                        <a class="dropdown-item" href="/admin/shops/edit?id=<?= $shop['id'] ?>"
                                                            ><i class="dw dw-edit2"></i> Edit</a
                                                        >
                                                        <?php if(getAuthUser()['id'] !== $shop['owner_id']) : ?>
                                                        <form action="/admin/shops/delete" method="POST" class="delete_form">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="delete_id" value="<?= $shop['id'] ?>">
                                                            <button type="submit" class="dropdown-item ">
                                                                <i class="dw dw-delete-3"></i> Delete
                                                            </button>
                                                        </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                     
<?php include(base_path('views/backend/layout/footer.view.php')) ?>

<script>
    $('.delete_form').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure want to delete this shop?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).submit();
            }
        })
    })

    $('.view').on('click', function(e) {
        swal.fire({
            title: 'This page in under Maintenance',
            icon: 'info',
        })
    })
</script>