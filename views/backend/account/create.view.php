<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Create Account
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
        <form method="POST" action="/admin/accounts" enctype="multipart/form-data"> 
            <div class="select-role">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn active" >
                        <input type="radio" name="is_admin" id="admin" value=1 />
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
                        <input type="radio" name="is_admin" id="user" value=0 />
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
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="name" type="text" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="email" type="email" required>
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
                    <input class="form-control" name="phone" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="gender">
                        <option selected="">Choose...</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control"  name="address"></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label>Profile</label>
                <div class="custom-file" style="max-width: 986px;">
                    <input type="file" name="profile" class="custom-file-input ml-15">
                    <label class="col-sm-12  custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="t-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>						

<?php include(base_path('views/backend/layout/footer.view.php')) ?>