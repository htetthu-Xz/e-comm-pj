<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="main-container pt-0">
<div class="pd-ltr-20">
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="../../<?= session('auth_user')['profile'] ?>" alt="" style="width:200px;height:200px"/>
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back
                    <div class="weight-600 font-30 text-blue"><?= session('auth_user')['name'] ?></div>
                </h4>
                <p class="font-18 max-width-600">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                    hic non repellendus debitis iure, doloremque assumenda. Autem
                    modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                    mollitia animi error corporis.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <!-- <div id="chart"></div> -->
                        <i class="ri-handbag-line p-count"></i>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $product_count['count'] ?></div>
                        <div class="weight-600 font-14">Total Products</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <i class="ri-article-line o-count"></i>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $total_sale['count'] ?></div>
                        <div class="weight-600 font-14">Total orders</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <i class="ri-wallet-3-line s-count"></i>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= number_format($sale_amount['sale_amount']) ?> MMK</div>
                        <div class="weight-600 font-14">Total sale amounts</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data">
                        <i class="ri-shield-user-line u-count"></i>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $cus_count['count'] ?></div>
                        <div class="weight-600 font-14">Total customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include(base_path('views/backend/layout/footer.view.php')) ?>
		
