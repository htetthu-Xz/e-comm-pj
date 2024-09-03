<?php include(base_path('views/backend/layout/header.view.php')) ?>
<?php if(null !== session('success')) : ?>
    <div class="alert alert-success success-message"><?= session('success') ?></div>
<?php endif; ?>
<div class="card-box pb-10 p-4">
    <div class="t-right">
        <a href="/admin/shop_slider/create" class="btn btn-primary btn-lg">
            <span class="ri-add-line"></span> Add Images
        </a>
    </div>
    <div class="product-t pd-20 mb-0">Shop_sliders</div>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>Shop Name</th>
                <th>Images Quantity(Max = 5)</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($shop_sliders as $key => $shop_slider) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td class="table-plus">
                    <div class="weight-600"><?= $shop_slider['shop_name'] ?></div>
                </td>
                <td><?= $shop_slider['slider_count'] ?></td>
                <td>
                    <div class="product-action">
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
                                <a class="dropdown-item" href="/admin/shop_slider/edit?id=<?= $shop_slider['shop_id'] ?>"
                                    ><i class="dw dw-edit2"></i> Edit</a
                                >
                                <form action="/admin/shop_slider/delete" method="POST" class="delete_form">
                                    <input type="hidden" name="shop_id" value="<?= $shop_slider['shop_id'] ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="dropdown-item ">
                                        <i class="dw dw-delete-3"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include(base_path('views/backend/layout/footer.view.php')) ?>

<script>
    $('.delete_form').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure want to delete this account?',
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
</script>