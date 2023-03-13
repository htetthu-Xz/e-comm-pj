<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Create Shop
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
        <form method="POST" action="/shops/create" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Shop Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="shop_name" type="text" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Owner</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="owner_id">
                        <?php foreach($users as $user) : ?>
                            <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Open Time</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="open_time" type="time" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Close Time</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="close_time" type="time" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Shop Description</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control"  name="description"></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label>Logo</label>
                <div class="custom-file" style="max-width: 986px;">
                    <input type="file" name="logo" class="custom-file-input ml-15">
                    <label class="col-sm-12  custom-file-label">Choose file</label>
                </div>
            </div>
            <div class="t-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>
							

<?php include(base_path('views/backend/layout/footer.view.php')) ?>