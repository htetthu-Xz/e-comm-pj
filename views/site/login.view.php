<?php include(base_path('views/site/layout/header.view.php')) ?>

<div class="page-content page-container m-t-sign" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form class="card" action="/login" method="POST">
                    <h5 class="card-title fw-400 p-3">Sign In</h5>
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
                        <div class="form-group">
                            <input class="form-control" name="email" type="text" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                        <button class="btn btn-block btn-bold btn-primary">Sign In</button>
                        <div class="form-group mt-3">
                            Don't have account? <a href="/register">Sign up</a>
                        </div>
                    </div>
                </form>
          </div>
        </div>
    </div>
</div>
<?php if(null !== session('success')) : ?>
    <div class="alert alert-success success-message succ"><?= session('success') ?></div>
<?php endif; ?>
<?php include(base_path('views/site/layout/footer.view.php')) ?>