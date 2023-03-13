<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="/admin/accounts" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Edit                             
        <?php if($user['is_admin'] === "1") : ?>
            <span class="t-admin">Admin <?= $user['name'] ?></span>
        <?php else: ?>
            <span class="t-owner">Owner <?= $user['name'] ?></span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php if(isset($errors)) : ?>
            <div class="alert alert-danger">
                 <ul class="error-list-style">
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                 </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="/admin/accounts/update" enctype="multipart/form-data">
            <div class="select-role">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn" >
                        <input type="radio" name="is_admin" id="admin" value=1 
                            <?php if($user['is_admin'] == 1) : ?>
                                checked
                            <?php endif;?>
                        />
                        <div class="icon">
                            <img
                                src="../../assets/backend/vendors/images/admin.svg"
                                class="svg"
                                alt=""
                            />
                            <!-- <i class="ri-admin-line svg svg-w"></i> -->
                        </div>
                        <span>For</span>
                        Admin
                    </label>
                    <label class="btn">
                        <input type="radio" name="is_admin" id="user" value=0 
                            <?php if($user['is_admin'] == 0) : ?>
                                checked
                            <?php endif;?>
                        />
                        <div class="icon">
                            <img
                                src="../../assets/backend/vendors/images/user.svg"
                                class="svg"
                                alt=""
                            />
                        </div>
                        <span>For</span>
                        Owner
                    </label>
                </div>
            </div>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="name" type="text" value="<?= $user['name'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="email" type="email" value="<?= $user['email'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="password"  type="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="confirm_password"  type="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="phone" type="text" value="<?= $user['phone'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control"  name="address"><?= $user['address'] ?></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label>Profile</label>
                <div class="custom-file" style="max-width: 986px;">
                    <input type="file" name="profile" class="custom-file-input ml-15">
                    <label class="col-sm-12  custom-file-label">Choose....</label>
                    <span class="w-info">Please choose your profile while edit your profile *</span>
                </div>
            </div>
            <div class="t-center m-tt-46 ">
                <button type="submit" class="btn btn-primary btn-lg">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
							

<?php include(base_path('views/backend/layout/footer.view.php')) ?>