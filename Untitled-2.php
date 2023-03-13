<table class="data-table table stripe hover mt-4 rounded-lg shadow-lg p-1" id="">
        <thead class="thead-dark">
            <tr class="t-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email </th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $key => $user) : ?>
                <tr class="t-center">
                    <th scope="row"><?= $key + 1 ?></th>
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
                    <td><?= getDateDb($user['created_at']) ?></td>
                    <td>
                        <a href="" class="btn btn-success icon-wrap" style="padding:8px">
                            <i class="ri-edit-box-line text-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="" class="btn btn-danger icon-wrap" style="padding:8px">
                            <i class="ri-delete-bin-6-line text-2"></i>
                            <span>Delete</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>