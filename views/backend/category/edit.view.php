<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Update Category
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
        <form method="POST" action="/admin/category/update"> 
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="name" type="text" value="<?= $category['name'] ?>" required>
                </div>
            </div>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Shops</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="shop_id">
                        <?php foreach($shops as $shop) : ?>
                            <?php if($shop['id'] == $category['shop_id']) : ?>
                                <option value="<?= $shop['id'] ?>" selected><?= $shop['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
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