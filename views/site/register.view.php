<?php include(base_path('views/site/layout/header.view.php')) ?>

<div class="page-content page-container m-t-sign" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form class="card" action="/signup" method="POST" enctype="multipart/form-data">
                    <h5 class="card-title fw-400 p-3">Sign Up</h5>
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
                            <input class="form-control" name="name" type="text" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" type="text" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phone" type="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" type="text" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input class="form-control" name="profile" type="file" placeholder="profile">
                        </div>
                        <button class="btn btn-block btn-bold btn-primary" type="submit">Sign up</button>
                        <div class="form-group mt-3">
                            Already have account? <a href="/login">Sign In</a>
                        </div>
                    </div>
                </form>
          </div>
        </div>
    </div>
</div>
<script>

<?php include(base_path('views/site/layout/footer.view.php')) ?>