<?php include(base_path('views/site/layout/header.view.php')) ?>
<div class="container m-t-bl">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?= previousPage() ?>" class="stext-109 cl8 hov-cl1 trans-04">
            <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>  
            back
        </a>
    </div>
</div>

<div class="card m-invoice invoice section-to-print">
  <div class="card-body" id="print_area">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9 mb-4">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice - <strong id="id">ID: <?= $order['order_number'] ?></strong></p>
        </div>
        <div class="col-xl-3 float-end">
          <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark" onclick="printDocument()"><i
              class="ri-printer-line text-primary"></i> Print</a>
          <!-- <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="ri-file-pdf-line text-danger"></i> Export</a> -->
        </div>
        <hr>
      </div>

      <div class="container mb-5">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <p class="pt-0">COZAStore.com</p>
          </div>

        </div>


        <div class="row mb-5">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted p-1">To: <span style="color:#5d9fc5 ;" id="cus_name"><?= $order['customer_name'] ?></span></li>
              <li class="text-muted p-1"><?= $township['name'] ?>, <?= $district['name'] ?></li>
              <li class="text-muted p-1"><?= $state['name'] ?>, Myanmar</li>
              <li class="text-muted p-1"><i class="ri-phone-fill"></i> <?= session('customer')['phone'] ?></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="ri-checkbox-blank-circle-fill" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Creation Date: </span><?= getDateDb($order['created_at'], 'd-M-Y') ?></li>
              <li class="text-muted"><i class="ri-checkbox-blank-circle-fill" style="color:#84B0CA ;"></i> <span
                  class="me-1 fw-bold">Status: </span><span class="badge bg-success text-black fw-bold">
                  Paid</span></li>
              <li class="text-muted mt-3 ml-5" id="qr">

              </li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Shop</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach(json_decode($order['order_detail'], JSON_OBJECT_AS_ARRAY) as $key => $item) : ?>
                <tr>
                  <th scope="row"><?= $key + 1 ?></th>
                  <td><?= $item['product_name'] ?></td>
                  <td id="shop"><?= getShop($item['shop_id'], $shops) ?></td>
                  <td><?= $item['product_quantity'] ?></td>
                  <td><?= $item['product_price'] ?> MMK</td>
                  <td><?= $item['total_price'] ?> MMK</td>
                </tr>
              <?php endforeach; ?>
              
            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-5">
            <p class="text-black float-start">
              <span class="text-black me-3"> 
                Total Amount -
              </span>
              <span style="font-size: 20px;" id="total">
                <?= $order['amount'] ?> MMK
              </span>
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
          <div class="col-xl-2">
            <div class="badge badge-success">Checked</div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<input type="hidden" id="amount" value="<?= $order['amount'] ?>">


<?php include(base_path('views/site/layout/footer.view.php')) ?>

<script>

function printDocument() {
    window.print();
}


    let id = document.getElementById('id').innerHTML
    let name = document.getElementById('cus_name').innerHTML
    let shop = document.getElementById('shop').innerHTML
    let total = document.getElementById('amount').value


    var qrcode = new QRCode(document.getElementById("qr"), {
      text: `${id}
Customer Name : ${name}
Total Amount : ${total} MMK
Paid
      `,
      width: 120,
      height: 120,
      colorDark : "#87d7e5",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
    });


</script>

<style>

</style>

