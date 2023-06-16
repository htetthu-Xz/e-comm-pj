<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Edit Customer
    </div>
    <div class="card-body">
        <?php if(isset($errors)) : ?>
            <div class="alert alert-danger error-message">
                 <ul class="error-list-style">
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                 </ul>
            </div> 
        <?php endif; ?>
        <form method="POST" action="/admin/customers/update" enctype="multipart/form-data"> 
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>">
            <!-- <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="name" type="text" value="<?= $customer['name'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="email" type="email" value="<?= $customer['email'] ?>" required>
                </div>
            </div> -->
            <!-- <div class="form-group row">
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
            </div> -->
            <!-- <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="phone" value="<?= $customer['phone'] ?>" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control" value="<?= $customer['address'] ?>" name="address"></textarea>
                </div>
            </div> -->
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 ">Status</label>
                <div class="col-sm-12 col-md-10">
                    Active :
                    <input type="checkbox" data-toggle="switchbutton" name="is_active" <?= isActive($customer['is_active']) ?> data-size="xs" data-onstyle="success">
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
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
							

<?php include(base_path('views/backend/layout/footer.view.php')) ?>