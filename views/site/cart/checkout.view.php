<?php include(base_path('views/site/layout/header.view.php')) ?>


<div class="container m-t-bl">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/cart_details" class="stext-109 cl8 hov-cl1 trans-04">
            Cart Details
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Cart Checkout
        </span>
    </div>
</div>
		

	<!-- Shoping Cart -->
<div class="bg0 p-t-50 p-b-85 mt-4" action="/card_details/update" method="POST">
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
                                        <td class="column-4 pl-1 text-center">
                                            <?= $_SESSION['cart'][$cart['id']]['quantity'] ?>
                                        </td>
                                        <td class="column-5 pl-3">
                                            <span><?= number_format($_SESSION['cart'][$cart['id']]['quantity'] * $cart['price']) ?></span> MMK
                                        </td>
                                    </tr>
                                </form>
                            <?php endforeach; ?>
                        </table>
                        <div class="d-flex">
                            <span class="p-3 mt-4">Delivery fee - </span>
                            <span class="p-3 mt-4"><?= $shipping['state_name'],',','&nbsp;', $shipping['dis_name'],',','&nbsp;', $shipping['town_name'],'&nbsp;'?>  -</span>
                            <span class="p-3 mt-4"><?= $shipping['fee'] ?> MMK</span>
                        </div>
                        <div class="d-flex">
                            <span class="p-3 mt-4">Payment - </span>
                            <?php if(session('payment') === 'cash') : ?>
                                <span class="p-3 mt-4"> Cash on Delivery </span>
                            <?php else : ?>
                                <span class="p-3 mt-4"> Card </span>
                            <?php endif; ?>
                        </div>
                </div>
                <a class="order-button" href="/order_now">
                    Order Now
                </a>
            </div>
        </div>
    </div>
</div>
<?php include(base_path('views/site/layout/footer.view.php')) ?>