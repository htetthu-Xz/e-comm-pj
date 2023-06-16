<?php include(base_path('views/site/layout/header.view.php')) ?>

<?php if(null !== session('warning')) : ?>
    <div class="alert alert-warning success-message mt-5-e"><?= session('warning') ?></div>
<?php endif; ?>

<div class="container emp-profile">
    <form method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="/<?= defaultCustomerProfile(session('customer')) ?>" alt="" class="pf-imgg"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between mt-5">
                    <label for="name" class="pf-lb text-left">Name</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= session('customer')['name'] ?>" disabled="true">
                </div>
                <div class="d-flex justify-content-between">
                    <label for="name" class="pf-lb text-left">Email</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= session('customer')['email'] ?>" disabled="true">
                </div>
                <div class="d-flex justify-content-between">
                    <label for="name" class="pf-lb text-left">Phone</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= session('customer')['phone'] ?>" disabled="true">
                </div>
                <div class="d-flex justify-content-between">
                    <label for="name" class="pf-lb text-left">State</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= $state['name'] ?>" disabled="true">
                </div>
                <div class="d-flex justify-content-between">
                    <label for="name" class="pf-lb text-left">District</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= $district['name'] ?>" disabled="true">
                </div>
                <div class="d-flex justify-content-between">
                    <label for="name" class="pf-lb text-left">Township</label>
                    <input type="text" class="pf-ip text-left" name="name" value="<?= $township['name'] ?>" disabled="true">
                </div>
            </div>
            <div class="col-md-2">
                <a href="/user/profile/edit" class="profile-edit-btn" name="btnAddMore">Edit Profile</a>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Kshiti123</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Kshiti Ghelani</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>kshitighelani@gmail.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>123 456 7890</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Web Developer and Designer</p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Experience</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Hourly Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>10$/hr</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Projects</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>230</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>English Level</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Availability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>6 months</p>
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </form>  
    
    <div class="container mt-5 p-3 shadow-lg rounded-sm">
        <h4 class="mb-4">Your Orders</h4>
        <table class="border border-secondary p-5 table">

            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Order No</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($orders as $key => $order) : ?>

                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $order['order_number'] ?></td>
                        <td><?= $order['amount'] ?> MMK</td>
                        <td><?= getDateDb($order['created_at'],'d-M-Y') ?></td>
                        <td>
                            <a href="/orders/invoice?id=<?= $order['id'] ?>">
                                View invoice
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>


<?php if($_SESSION['update'] === true) : ?>

    <script>

        swal('Your profile updated!')

    </script>
<?php endif; ?>

<?php include(base_path('views/site/layout/footer.view.php')) ?>

