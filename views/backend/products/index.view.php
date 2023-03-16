<?php include(base_path('views/backend/layout/header.view.php')) ?>
<?php if(null !== session('success')) : ?>
    <div class="alert alert-success success-message"><?= session('success') ?></div>
<?php endif; ?>
<div class="card-box pb-10 p-3">
    <div class="t-right">
        <a href="/products/create" class="btn btn-primary btn-lg">
            <span class="ri-add-line"></span> Add Product
        </a>
    </div>
    <div class="product-t pd-20 mb-0">Products</div>
    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th class="table-plus">Name</th>
                <th>Quantity</th>
                <th>Shop</th>
                <th>price</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $key => $product) : ?>
            <tr>
                <td><?= $key ?></td>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="avatar mr-2 flex-shrink-0">
                            <img
                                src="../../<?= $product['image1'] ?>"
                                class="border-radius-100 shadow"
                                width="40"
                                height="40"
                                alt=""
                            />
                        </div>
                        <div class="txt">
                            <div class="weight-600"><?= $product['name'] ?></div>
                        </div>
                    </div>
                </td>
                <td><?= $product['quantity'] ?></td>
                <td><?= getShop($product['shop_id'],$shops) ?></td>
                <td>
                    <span
                        class="badge badge-pill p-1"
                        data-bgcolor="#e7ebf5"
                        data-color="#265ed7"
                        ><?= $product['price'] ?></span
                    >
                </td>
                <td>
                    <div class="table-actions">
                        <form action="/products/delete" method="POST" class="delete_form">
                            <input type="hidden" name="shop_id" value="<?= $product['shop_id'] ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button data-color="#e95959" type="submit" class="">
                                <i class="icon-copy dw dw-delete-3"></i>
                            </button>
                        </form>
                        <a data-color="#265ed7" type="submit">
                            <i class="icon-copy dw dw-edit2"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $('.delete_form').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure want to delete this account?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).submit();
            }
        })
    })
</script>
<?php include(base_path('views/backend/layout/footer.view.php')) ?>