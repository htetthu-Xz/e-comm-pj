<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="card-box pb-10 p-3">
    <div class="product-t pd-20 mb-0">Orders</div>

    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th class="table-plus">Order code</th>
                <th>Customer</th>
                <th>Total Amount</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $key => $order) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="txt">
                            <div class="weight-600"><?= $order['order_code'] ?></div>
                        </div>
                    </div>
                </td>
                <td><?= $order['cus_name'] ?></td>
                <td><?= $order['total'] ?></td>
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
                                <a class="dropdown-item" href="/admin/orders/info?id=<?= $order['id'] ?>"
                                    ><i class="ri-eye-line"></i> view</a
                                >
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