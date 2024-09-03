<?php include(base_path('views/backend/layout/header.view.php')) ?>

    <div class="t-right">
        <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
            <span class="ri-arrow-drop-left-line"></span> Back
        </a>
    </div>
    <div class="card rounded-lg shadow-sm">
        <div class="card-header">
            Update Shop Slider
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
            <?php if(0 !== count($sliders)) : ?>
                <div class="shadow-sm rounded p-3 d-flex mb-3">
                    <?php foreach($sliders as $slider) : ?>
                        <span class="position-relative">
                            <img src="/<?= $slider['image'] ?>" class="sw border border-dark shadow-sm rounded-sm ml-2"/>
                            <form action="/admin/shop_slider/slider_delete" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="delete_id" value="<?= $slider['id'] ?>">
                                <input type="hidden" name="shop_id" value="<?= $shop_id ?>">
                                <button class="position-absolute cancel"> X </button>
                            </form>       
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if((count($sliders)) < 5)  : ?>
                <form method="POST" action="/admin/shop_slider/update" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Select Shops</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="shop_id" value="<?= $shop_id ?>">
                            <select class="custom-select col-12" name="shop_id" disabled>
                                <?php foreach($shops as $shop) : ?>
                                    <?php if($shop['id'] == $sliders['0']['shop_id']) : ?>
                                        <option value="<?= $shop['id'] ?>" selected><?= $shop['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label>Select Image(<?= 5 - count($sliders) ?> images <br> left of 5 images)<span class="text-danger">*</span></label>
                        <div class="custom-file" style="max-width: 986px;">
                            <input type="file" name="images[]" class="custom-file-input ml-15" multiple>
                            <label class="col-sm-12  custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="t-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Update
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

<?php include(base_path('views/backend/layout/footer.view.php')) ?>