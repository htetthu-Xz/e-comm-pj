<?php include(base_path('views/backend/layout/header.view.php')) ?>
<style >
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }
    .mailbox-widget .custom-tab .nav-item .nav-link {
        border: 0;
        color: #fff;
        border-bottom: 3px solid transparent;
    }
    .mailbox-widget .custom-tab .nav-item .nav-link.active {
        background: 0 0;
        color: #fff;
        border-bottom: 3px solid #2cd07e;
    }
    .no-wrap td, .no-wrap th {
        white-space: nowrap;
    }
    .table td, .table th {
        padding: .9375rem .4rem;
        vertical-align: top;
        border-top: 1px solid rgba(120,130,140,.13);
    }
    .font-light {
        font-weight: 300;
    }
    .link:hover {
        text-decoration: underline;
    }
</style>
<?php if(null !== session('success')) : ?>
    <div class="alert alert-success success-message"><?= session('success') ?></div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-msg text-white mailbox-widget pb-0">
                    <h2 class="text-white pb-3">Customer Message</h2>
                    <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block"> INBOX</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <?php foreach($messages as $message) : ?>
                                            <tr>
                                                <td class="pl-3">
                                                    <div class="custom-control custom-checkbox" id="rem">
                                                        <?php if($message['is_read'] == true) : ?>
                                                            <span class="badge badge-pill text-white font-medium badge-success mr-2" >Read</span>
                                                        <?php else : ?>
                                                            <span class="badge badge-pill text-white font-medium badge-warning mr-2" >Unread</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-star text-warning"></i></td>
                                                <td>
                                                    <span class="mb-0 text-muted"><?= $message['customer_name'] ?></span>
                                                </td>
                                                <td id="app">
                                                    <a class="link" href="/admin/customer/message-info?id=<?= $message['id'] ?>">
                                                        <!-- <span class="badge badge-pill text-white font-medium badge-danger mr-2">Work</span> -->
                                                        <span class="text-dark"><?= substr($message['message'], 0, 15) ?>...</span>
                                                    </a>
                                                </td>
                                                <td><i class="fa fa-paperclip text-muted"></i></td>
                                                <td class="text-muted"><?= getDateDb($message['created_at'], 'd M') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include(base_path('views/backend/layout/footer.view.php')) ?>
