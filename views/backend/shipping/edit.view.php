<?php include(base_path('views/backend/layout/header.view.php')) ?>

<div class="t-right">
    <a href="<?= previousPage() ?>" class="btn btn-dark btn-sm mb-3">
        <span class="ri-arrow-drop-left-line"></span> Back
    </a>
</div>



<div class="card rounded-lg shadow-sm">
    <div class="card-header">
        Edit Shippings
    </div>
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
    </div>
    <form method="POST" class="p-4" action="/admin/shipping/update"> 
        <div class="appenD">           
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select states</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12 aj" name="state_id">
                        <?php foreach($states as $state) : ?>
                            <?php if($state['id'] == $shipping['state_id']) : ?>
                                <option value="<?= $state['id'] ?>" class="" selected><?= $state['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $state['id'] ?>" class=""><?= $state['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row district">
                <label class="col-sm-12 col-md-2 col-form-label ">Select District</label>
                <div class="col-sm-12 col-md-10">
                    <select class="distr custom-select col-12 " id="tw" name="district_id" onchange="fun()">
                        <?php foreach($districts as $district) : ?>
                            <?php if($district['id'] == $shipping['district_id']) : ?>
                                <option value="<?= $district['id'] ?>" class="" selected><?= $district['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $district['id'] ?>" class=""><?= $district['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row township">
                <label class="col-sm-12 col-md-2 col-form-label ">Select Township</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12 tow" name="township_id">
                        <?php foreach($townships as $township) : ?>
                            <?php if($township['id'] == $shipping['township_id']) : ?>
                                <option value="<?= $township['id'] ?>" class="" selected><?= $township['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $township['id'] ?>" class=""><?= $township['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div> 

        <input type="hidden" name="shipping_id" value="<?= $shipping['id'] ?>">
        <input type="hidden" name="_method" value="PATCH">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Delivery fee</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="fee" type="text" required value="<?= $shipping['fee'] ?>">
            </div>
        </div>

        <div class="t-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                Create
            </button>
        </div>
    </form>
</div>
<?php include(base_path('views/backend/layout/footer.view.php')) ?>

<script>

    let ev;

$('.aj').on('change', function(e) {
    e.preventDefault();

    // let state_id = this.value
    // console.log(state_id)
    $('.district').remove()
    $('.township').remove()

    $.ajax({
        url: '/admin/shipping/district',
        method: 'GET',
        data: {
            id: this.value
        },
    }).done(function(res) {
        let data = JSON.parse(res).data

        console.log(data)

        let template = `<div class="form-group row district">
                            <label class="col-sm-12 col-md-2 col-form-label ">Select District</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="distr custom-select col-12 " id="tw" name="district_id" onchange="fun()">
                                    <option value="" class="">Select District...</option>
                                
                                </select>
                            </div>
                        </div>`
        
        $('.appenD').append(template)


        data.forEach((item, index) => {
            $('.distr').append('<option value="' + item.id + '" > ' + item.name + '</option>') 
        })   

    })
    
});

function fun() {
    let v = document.querySelector('.distr').value

    $('.township').remove()

    $.ajax({
        url: '/admin/shipping/township',
        method: 'GET',
        data: {
            id: v
        },
    }).done(function(res) {
        let data = JSON.parse(res).data

        let template = `<div class="form-group row township">
                            <label class="col-sm-12 col-md-2 col-form-label ">Select Township</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12 tow" name="township_id">
                                    <option value="" class="">Select township...</option>
                                
                                </select>
                            </div>
                        </div>`
        
        $('.appenD').append(template)

        data.forEach((item, index) => {
            $('.tow').append("<option value='" + item.id + "' > " + item.name + "</option>") 
        })   

    })

}

</script>