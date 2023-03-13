<?php include(base_path('views/backend/layout/header.view.php')) ?>

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
                <th>price</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Female</td>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="avatar mr-2 flex-shrink-0">
                            <img
                                src="vendors/images/photo4.jpg"
                                class="border-radius-100 shadow"
                                width="40"
                                height="40"
                                alt=""
                            />
                        </div>
                        <div class="txt">
                            <div class="weight-600">Jennifer O. Oster</div>
                        </div>
                    </div>
                </td>
                <td>Female</td>
                <td>
                    <span
                        class="badge badge-pill"
                        data-bgcolor="#e7ebf5"
                        data-color="#265ed7"
                        >Typhoid</span
                    >
                </td>
                <td>
                    <div class="table-actions">
                        <a href="#" data-color="#265ed7"
                            ><i class="icon-copy dw dw-edit2"></i
                        ></a>
                        <a href="#" data-color="#e95959"
                            ><i class="icon-copy dw dw-delete-3"></i
                        ></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include(base_path('views/backend/layout/footer.view.php')) ?>