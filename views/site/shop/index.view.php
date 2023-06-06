<?php include(base_path('views/site/layout/header.view.php')) ?>

<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            <?php foreach($shop_sliders as $shop_slider) : ?>
                <div class="item-slick1 bg-overlay1" style="background-image: url(/<?= $shop_slider['image']  ?>); max-height:500px;  background-repeat: no-repeat;background-attachment: fixed;background-position: center;" data-thumb="" data-caption="Women’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    <!-- Shopping, pleasure..., Your Choice ! -->
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <!-- <a href="" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Shop Now
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <h3 class="mt-5">Description</h3>
        <div class="flex-w flex-sb-m mb-5">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                
                <span class="stext-106 cl6  bor3 trans-04 m-r-32 m-tb-5 ">
                    <?= $shop_slider['shop_description'] ?>
                </span>
            </div>
        </div>
        <h3>Categories</h3>
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button> 

                <?php foreach($categories as $category) : ?>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                        <?= $category['name'] ?>
                    </button>
                <?php endforeach; ?>

            </div>
            
                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <form action="/product/search" method="GET">
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                        </form>
                    </div>	
                </div>
            
        </div>

        
        <?php if(empty($products)) : ?>
            <h2 class="text-center">
                <i class="ri-search-2-line mb-3"></i> <br>
                Hmmm, we're not getting any results.<br>
                Our bad - try another search
            </h2>
        <?php else : ?>
            <div class="row isotope-grid">
                <?php foreach($products as $product) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0" >
                                <img src="../../<?= $product['image1'] ?>" alt="IMG-PRODUCT"  style="max-height:300px">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/product-details?id=<?= $product['id'] ?>" class="stext-9 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?= substr($product['name'], 0, 20) ?> . . .
                                    </a>
                                    <!-- stext-104 cl4 hov-cl1 trans-04  -->
                                    <span class="badge badge-pill badge-info mb-2">
                                        <?php foreach($categories as $category) : ?>
                                            <?php if($category["id"] == $product['category_id']) : ?>
                                                <?= $category['name'] ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </span>

                                    <span class="stext-105 cl3">
                                        <?= number_format($product['price'])  ?> MMK
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <i class="icon-heart1 dis-block trans-04 ri-heart-line"></i>
                                        <i class="icon-heart2 dis-block trans-04 ab-t-l ri-heart-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    


        <!-- Load more -->
        <!-- <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div> -->
    </div>
</div>

<?php include(base_path('views/site/layout/footer.view.php')) ?>