<?php include(base_path('views/backend/layout/header.view.php')) ?>

<style>
/* .post-content{
  border-radius: 4px;
  width: 100%;
  margin-bottom: 20px;
  overflow: hidden;
  position: relative;
} */

.post-content img.post-image, video.post-video, .google-maps{
  width: 100%;
  height: auto;
}

.post-content .google-maps .map{
  height: 300px;
}

.post-content .post-container{
  padding: 20px;
  width: 100%;
}

.post-content .post-container .post-detail{
  margin-left: 65px;
  position: relative;
}

.post-content .post-container .post-detail .post-text{
  line-height: 24px;
  margin: 0;
}

.post-content .post-container .post-detail .reaction{
  position: absolute;
  right: 0;
  top: 0;
}

.post-content .post-container .post-detail .post-comment{
  display: inline-flex;
  margin: 10px auto;
  width: 100%;
}

.post-content .post-container .post-detail .post-comment img.profile-photo-sm{
  margin-right: 10px;
}

.post-content .post-container .post-detail .post-comment .form-control{
  height: 30px;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  margin: 7px 0;
  min-width: 0;
}

img.profile-photo-md {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

img.profile-photo-sm {
    height: 40px;
    width: 40px;
    border-radius: 50%;
}

.text-green {
    color: #8dc63f;
}

.text-red {
    color: #ef4136;
}

.following {
    color: #8dc63f;
    font-size: 12px;
    margin-left: 20px;
}
.mb-r {
    margin-bottom: 150px;
}

.delete {
    margin-left: 65px;
}
</style>

<div class="t-right mr-5">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>

<div class="container card-box  mb-r">
    <div class="row">
        <div class="col-md-8">
            <div class="post-content">
                <div class="post-container">
                    <img src="/<?= defaultCustomerProfile($message) ?>" alt="user" class="profile-photo-md pull-left">
                    <div class="post-detail">
                        <div class="user-info">
                            <h5><span class="profile-link"><?= $message['customer_name'] ?></span> </h5>
                            <p class="text-muted"><?= getDateDb($message['created_at'], 'l jS \o\f F Y h:i:s A') ?></p>
                        </div>
                        <div class="line-divider"></div>
                        <div class="post-text">
                            <p><?= $message['message'] ?></p>
                        </div>
                    </div>
                    <div class="delete">
                        <form action="/admin/customer/message-delete" method="POST" class="delete_form">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $message['id'] ?>">
                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-6-line"></i>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(base_path('views/backend/layout/footer.view.php')) ?>

<script>
    $('.delete_form').on('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure want to delete this message?',
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