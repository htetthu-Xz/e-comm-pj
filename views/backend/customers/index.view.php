<?php include(base_path('views/backend/layout/header.view.php')) ?>
<?php if(null !== session('success')) : ?>
    <div class="alert alert-success success-message"><?= session('success') ?></div>
<?php endif; ?>
<div class="card-box pb-10 p-3">
    <!-- <div class="t-right">
        <a href="/admin/customers/create" class="btn btn-primary btn-lg">
            <span class="ri-add-line"></span> Add Customers
        </a>
    </div> -->
    <div class="product-t pd-20 mb-0">Customers</div>

    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th class="table-plus">Name</th>
                <th>Email</th>
                <th>phone</th>
                <th>Address</th>
                <th>Status</th>
                <?php if(session('auth_user')['is_admin'] == 1) :?>
                    <th class="datatable-nosort">Actions</th>
                <?php endif; ?>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($customers as $key => $customer) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="avatar mr-2 flex-shrink-0">
                            <img
                                src="../../<?= defaultCustomerProfile($customer) ?>"
                                class="border-radius-100 shadow"
                                width="40"
                                height="40"
                                alt=""
                            />
                        </div>
                        <div class="txt">
                            <div class="weight-600"><?= $customer['name'] ?></div>
                        </div>
                    </div>
                </td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td><?= $customer['address'] ?></td>
                <td>
                    <?php if($customer['is_active'] == 1 ) : ?>
                        <span class="badge badge-pill p-2" data-bgcolor="#def5da" data-color="#3ed726">
                            Active
                        </span>
                    <?php else : ?>
                        <span class="badge badge-pill p-2" data-bgcolor="#f5dadc" data-color="#db2735">
                            Not active
                        </span>
                    <?php endif; ?>
                </td>
                <?php if(session('auth_user')['is_admin'] == 1) :?>
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
                                <a class="dropdown-item" href="/admin/customers/edit?id=<?= $customer['id'] ?>"
                                    ><i class="dw dw-edit2"></i> Edit</a
                                >
                                <form action="/admin/customers/delete" method="POST" class="delete_form">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>">
                                    <button type="submit" class="dropdown-item ">
                                        <i class="dw dw-delete-3"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td> 
                <?php endif; ?>
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