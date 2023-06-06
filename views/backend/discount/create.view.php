<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Create Discount
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
        <?php if(isset($_SESSION['errors'])) : ?>
            <div class="alert alert-danger error-message">
                <ul class="error-list-style">
                    <?php foreach($_SESSION['errors'] as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="/admin/discount/create"> 
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Products</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="product_id">
                        <?php foreach($products as $product) : ?>
                            <option value="<?= $product['id'] ?>"><?= $product['product_name'] ?> (<?= $product['shop_name'] ?> Shop)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Discount Type</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="dis_type">
                        <?php foreach($discount_types as $discount_type) : ?>
                            <option value="<?= $discount_type['id'] ?>"><?= $discount_type['type'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Discount Amount</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="dis_amount"  type="text" required>
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