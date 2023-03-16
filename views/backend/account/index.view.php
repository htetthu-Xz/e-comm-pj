<?php

    unset($_SESSION['success'])

?>
<?php include(base_path('views/backend/layout/header.view.php')) ?>
    <div class="t-right">
        <a href="/admin/accounts/create" class="btn btn-primary btn-lg mb-3">
            <span class="ri-add-line"></span> Create Account
        </a>
    </div>
    <!-- <?php if(null !== session('success')) : ?>
        <div class="alert alert-success success-message"><?= session('success') ?></div>
    <?php endif; ?> -->
    <div class="card-box mb-30">
        <div class="pb-20 p-4">
            <table class="data-table table stripe hover nowrap">
                <thead class="thead-dark">
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created_at</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $key => $user) : ?>
                    <tr>
                        <td class="table-plus"><?= $key + 1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td>
                            <?php if($user['is_admin'] === "1") : ?>
                                <div class="admin-badge t-center">Admin</div>
                            <?php else: ?>
                                <div class="owner-badge t-center">Owner</div>
                            <?php endif; ?>
                        </td>
                        <td><?= getDateDb($user['created_at'], 'j-M-Y H:i:s A') ?></td>
                        <td>
                            <div class="dropdown">
                                <a
                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href=""
                                    role="button"
                                    data-toggle="dropdown"
                                >
                                    <i class="dw dw-more"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                >
                                    <span class="dropdown-item view"
                                        ><i class="dw dw-eye"></i> View</span
                                    >
                                    <a class="dropdown-item" href="/admin/accounts/edit?id=<?= $user['id'] ?>"
                                        ><i class="dw dw-edit2"></i> Edit</a
                                    >
                                    <?php if(getAuthUser()['email'] !== $user['email']) : ?>
                                    <form action="/admin/accounts/delete" method="POST" class="delete_form">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="delete_id" value="<?= $user['id'] ?>">
                                        <button type="submit" class="dropdown-item ">
                                            <i class="dw dw-delete-3"></i> Delete
                                        </button type="submit">
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> 

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

    $('.view').on('click', function(e) {
        swal.fire({
            title: 'This page in under Maintenance',
            icon: 'info',
        })
    })
</script>

<?php include(base_path('views/backend/layout/footer.view.php')) ?>