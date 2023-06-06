<?php include(base_path('views/site/layout/header.view.php')) ?>


<div class="container m-t-bl">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Cart Details
        </span>
    </div>
</div>


<div class="m-la mt-5 mb-3">
    <a href="/card_details/empty_cart" class="btn bt-d">
        <i class="ri-delete-bin-6-line"></i>
        Empty Cart
    </a>
</div>
		

	<!-- Shoping Cart -->
<div class="bg0 p-t-50 p-b-85" action="/card_details/update" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class=" q">Quantity</th>
                                <th class="column-3 txt-center">Amount</th>
                                <th class="column-5"></th>
                            </tr>

                            <?php foreach($carts as $cart) : ?> 
                                <form action="/card_details/update" method="POST">
                                    <input type="hidden" name="id" value="<?= $cart['id'] ?>">
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="/<?= $cart['image1'] ?>" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2 pr-2"><?= $cart['name'] ?></td>
                                        <td class="column-3"><?= number_format($cart['price']) ?> <br>MMK</td>
                                        <td class="column-4 pl-1">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <button class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" type="submit">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </button>

                                                <input class="mtext-104 cl3 txt-center num-product" id="qty" type="text" name="product_quantity" value="<?= $_SESSION['cart'][$cart['id']]['quantity'] ?>">

                                                <button class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" type="submit">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="column-5 pl-3">
                                            <span><?= number_format($_SESSION['cart'][$cart['id']]['quantity'] * $cart['price']) ?></span> MMK
                                        </td>
                                        <td>
                                            <a href="/card_details/remove_card_item?id=<?= $cart['id'] ?>" class="btn bt-d wx">
                                                <i class="ri-delete-bin-6-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </form>
                            <?php endforeach; ?>

                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                                
                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div>
                        </div>

                        <!-- <button class="flex-c-m stext-101 cl2 size-119 bg8 bor13 p-lr-15 trans-04 pointer m-tb-10">
                            Update Cart
                        </button> -->
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?= number_format(getSubTotal($carts)) ?> MMK
                            </span>
                        </div>
                    </div>

                    <!-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                            </p>
                            
                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                </div>
                                
                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                MMK
                            </span>
                        </div>
                    </div> -->

                    <a class="mt-4 flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 text-white p-lr-15 trans-04 pointer" href="/cart_checkout">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include(base_path('views/site/layout/footer.view.php')) ?>