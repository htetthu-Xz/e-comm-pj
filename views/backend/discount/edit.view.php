<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Edit Discount
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
        <form method="POST" action="/admin/discount/update"> 
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Products</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="product_id">
                        <?php foreach($products as $product) : ?>
                            <?php if($discount['product_id'] == $product['id']) : ?>
                                <option value="<?= $product['id'] ?>" selected><?= $product['product_name'] ?> (<?= $product['shop_name'] ?> Shop)</option>
                            <?php else : ?>
                                <option value="<?= $product['id'] ?>"><?= $product['product_name'] ?> (<?= $product['shop_name'] ?> Shop)</option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $discount['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Discount Type</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="dis_type">
                        <?php foreach($discount_types as $discount_type) : ?>
                            <?php if($discount_type['id'] == $discount['discount_type']) : ?>
                                <option value="<?= $discount_type['id'] ?>" selected><?= $discount_type['type'] ?> </option>
                            <?php else : ?>
                                <option value="<?= $discount_type['id'] ?>"><?= $discount_type['type'] ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Discount Amount</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="dis_amount"  type="text" value="<?= $discount['amount'] ?>" required>
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