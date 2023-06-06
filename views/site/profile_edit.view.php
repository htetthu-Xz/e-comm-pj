<?php include(base_path('views/site/layout/header.view.php')) ?>

<div class="page-content page-container m-t-sign" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form class="card" action="/user/profile/update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="cus_id" value="<?= session('customer')['id'] ?>">
                    <h5 class="card-title fw-400 p-3">Edit Profile</h5>
                    <div class="card-body">
                    <?php if(isset($errors)) : ?>
                        <div class="alert alert-danger error-message">
                            <ul class="error-list-style">
                                <?php foreach($errors as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                        <div class="appenD">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Name" value="<?= session('customer')['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="text" placeholder="Email" value="<?= session('customer')['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="phone" type="phone" value="<?= session('customer')['phone'] ?>" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="profile">Profile</label>
                                <input class="form-control" name="profile" type="file" placeholder="profile">
                            </div>
                            <div class="form-group mb-4 edit">
                                <label for="">Address</label>
                                <span class="text-add p-1 my-4"><?= $state['name'] ?>, <?= $district['name'] ?>,</span><br>
                                <span class="text-add p-1"> <?= $township['name'] ?>  <i class="ri-edit-2-line ml-2 clk bg-success p-1 text-white pointer"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-block btn-bold btn-primary" type="submit">Update</button>
                    </div>
                </form>
          </div>
        </div>
    </div>
</div>


<?php include(base_path('views/site/layout/footer.view.php')) ?>

<script>

$('.clk').on('click', function(e) {
    e.preventDefault();

    // let state_id = this.value
    // console.log(state_id)
    $('.edit').remove()

    $.ajax({
        url: '/admin/shipping/state',
        method: 'GET'
    }).done(function(res) {
        let data = JSON.parse(res).data

        let s_template = `<div class="form-group mt-4 mb-4">
                            <select class="custom-select col-12 state" name="state_id" onchange="district()">
                                <option value="" class="">Select State...</option>
                            
                            </select>
                        </div>`
        
        $('.appenD').append(s_template)


        data.forEach((item) => {
            $('.state').append('<option value="' + item.id + '" > ' + item.name + '</option>') 
        })   

    })
    
});



function district() {

    let state_val = document.querySelector('.state').value

    $('.tow').remove()
    $('.dis').remove()

    $.ajax({
        url: '/admin/shipping/district',
        method: 'GET',
        data: {
            id: state_val
        },
    }).done(function(res) {
        let data = JSON.parse(res).data

        let d_template = `<div class="form-group mt-4 mb-4 dis">
                            <select class="custom-select col-12 district" name="district_id" onchange="township()">
                                <option value="" class="">Select District...</option>
                            
                            </select>
                        </div>`
        
        $('.appenD').append(d_template)


        data.forEach((item) => {
            $('.district').append('<option value="' + item.id + '" > ' + item.name + '</option>') 
        })   

    })
}



function township() {

let district_val = document.querySelector('.district').value

$('.tow').remove()

$.ajax({
    url: '/admin/shipping/township',
    method: 'GET',
    data: {
        id: district_val
    },
}).done(function(res) {
    let data = JSON.parse(res).data

    let t_template = `<div class="form-group mt-4 mb-4 tow">
                        <select class="custom-select col-12 township" name="township_id">
                            <option value="" class="">Select Township...</option>
                        
                        </select>
                    </div>`
    
    $('.appenD').append(t_template)


    data.forEach((item) => {
        $('.township').append('<option value="' + item.id + '" > ' + item.name + '</option>') 
    })   

})
}
    


</script>