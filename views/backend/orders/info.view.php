<?php include(base_path('views/backend/layout/header.view.php')) ?>

<style>
.table td {
    font-weight: bold;
}

.code {
    color: #35a41d;
}

/* .details {
    width: 900px;
    font-size: 14px;
    font-weight: bold;
} */

/* .m-di {
    margin-left: 50px;
} */

/* .m-d-table {
    margin-left: 200px;
} */

/* .m-d-table tr {
    padding: 10px;
} */

/* .pdail{
    padding: 10px;
} */

/* .o-detail th,td {
    padding: 15px;
    border-bottom: 1px solid;
} */

.v-normal td{
    vertical-align: top;
}

.t-l {
    text-align: left;
}

.it-em td{
    font-weight: normal;
    border-bottom: 1px solid #efedea;
}

.t-h {
    border-bottom: 1px solid;
}

</style>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="card-box">
    <div class="product-t pd-20 mb-0">Order details</div>

    <table class="ml-5 table mb-0 table-borderless">

            <tr>
                <td>Order code</td>
                <td class="code"><?= $order['order_code'] ?></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td><?= $order['cus_name'] ?></td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td><?= $order['total'] ?> MMK</td>
            </tr>
            <tr>
                <td>Payment</td>
                <td>
                    <?php 
                        if($order['payment'] == 1) {
                            echo "Card";
                        } else {
                            echo "Cash On delivery";
                        }
                    ?> 
                </td>
            </tr>
            <tr>
                <td>Order Confirm Date</td>
                <td><?= Carbon\Carbon::parse($order['created_at'])->format('d-M-Y, H:i:s A') ?></td>
            </tr>
            <tr class="v-normal mb-4">
                <td>Details - </td>
                <td class="t-l p-0">
                    <div class="pb-3">
                        <table class="">
                            <thead>
                                <tr class="t-h">
                                    <th scope="col">#</th>
                                    <th scope="col">Products name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Shop id</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach(json_decode($order['order_details'], JSON_OBJECT_AS_ARRAY) as $key => $item) : ?>
                                    <tr class="it-em">
                                        <td><?= $key+1 ?></td>
                                        <td><?= $item['product_name'] ?></td>
                                        <td><?= $item['product_quantity'] ?></td>
                                        <td><?= $item['product_price'] ?></td>
                                        <td><?= $item['shop_id'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>			
                    </div>
                </td>
            </tr>

    </table>

  



</div>







<?php include(base_path('views/backend/layout/footer.view.php')) ?>