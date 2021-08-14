<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Delivery User</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Profile</h5>
                </div>
                <div>
                    <div class="ibox-content profilepic-profilepage">
                        <img alt="image" src="<?= base_url() . $consumerInfo[0]->picture; ?>">
                    </div>
                    <div class="ibox-content profile-content" style=" padding-bottom: 8px;">
                        <h5>Full Name</h5>
                        <h4><strong><?= $consumerInfo[0]->first_name . ' ' . $consumerInfo[0]->last_name; ?> </strong></h4>
                        <br>
                        <h5>Email</h5>
                        <h4><strong><?= $consumerInfo[0]->email; ?></strong></h4>
                        <br>
                        <h5>Billing Address</h5>
                        <p><i class="fa fa-map-marker">&nbsp;</i><?= $consumerInfo[0]->Billing; ?></p>
                        <h5>
                            <h5>Driving License</h5>
                            <h4><strong><?= $consumerInfo[0]->drivinglicense; ?></strong></h4>
                            <br>
                            <h5>Contact Number</h5>
                            <h4><strong><?= $consumerInfo[0]->contact1; ?></strong></h4>
                            <br><br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Account Details</h5>
                </div>
                <div class="ibox-content">
                    <form id="editFarmerForm">
                        <input type="hidden" id="id" value="<?= $consumerInfo[0]->id; ?>" />
                        <input type="hidden" id="role" value="<?= $consumerInfo[0]->role; ?>" />
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>
                            <div class="col-lg-10"><input type="email" name="email" id="email" value="<?= $consumerInfo[0]->email; ?>" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">First Name</label>
                            <div class="col-lg-10"><input type="text" name="firstname" id="firstname" value="<?= $consumerInfo[0]->first_name; ?>" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Last Name</label>
                            <div class="col-lg-10"><input type="text" name="lastname" id="lastname" value="<?= $consumerInfo[0]->last_name; ?>" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">NIC</label>
                            <div class="col-lg-10"><input type="text" name="nic" id="nic" value="<?= $consumerInfo[0]->nic; ?>" placeholder="NIC" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Driving License</label>
                            <div class="col-lg-10"><input type="text" name="drivinglicense" id="drivinglicense" value="<?= $consumerInfo[0]->drivinglicense; ?>" placeholder="Driving License" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Expiry Date</label>
                            <div class="col-lg-10"><input type="text" name="expirydate" id="expirydate" value="<?= $consumerInfo[0]->expirydate; ?>" placeholder="Expiry Date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Contact Number 1</label>
                            <div class="col-lg-10"><input type="text" name="contact1" id="contact1" value="<?= $consumerInfo[0]->contact1; ?>" placeholder="Contact Number 1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label"> Contact Number 2</label>
                            <div class="col-lg-10"><input type="text" name="contact2" id="contact2" value="<?= $consumerInfo[0]->contact2; ?>" placeholder="Contact Number 2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label"> Address</label>
                            <div class="col-lg-10"><input type="text" name="billing" id="billing" value="<?= $consumerInfo[0]->Billing ?>" placeholder="Address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">City</label>
                            <div class="col-lg-10"><input type="text" name="city" id="city" value="<?= $consumerInfo[0]->city; ?>" placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-sm btn-primary" id="updatebtn">Update Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Vehicle Details</h5>
                </div>
                <div class="ibox-content">
                    <form id="editVehicleForm">
                        <input type="hidden" id="userId" name="userId" value="<?= $consumerInfo[0]->id; ?>" />
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Vehicle Type</label>
                            <div class="col-lg-10"><input type="text" name="vehicle_type" id="vehicle_type" value="<?= $vehicleInfo[0]->vehicle_type; ?>" placeholder="Vehicle Type" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Manufacturer</label>
                            <div class="col-lg-10"><input type="text" name="manufacturer" id="manufacturer" value="<?= $vehicleInfo[0]->manufacturer; ?>" placeholder="Manufacturer" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Vehicle Model</label>
                            <div class="col-lg-10"><input type="text" name="vehicle_model" id="vehicle_model" value="<?= $vehicleInfo[0]->vehicle_model; ?>" placeholder="Vehicle Model" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Registration Number</label>
                            <div class="col-lg-10"><input type="text" name="regnumber" id="regnumber" value="<?= $vehicleInfo[0]->regnumber; ?>" placeholder="Registration Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-sm btn-primary" id="updatebtn">Update Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <h2>Vehicle Documents</h2>
                    <div class="lightBoxGallery">
                        <?php foreach ($vehicleImages as $image) { ?>
                            <a href="<?= base_url() . $image->image; ?>" title="Farm images " data-gallery=""><img src="<?= base_url() . $image->image; ?>" style="width: 200px;height:150px;border:1px solid;"></a>
                        <?php } ?>
                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        jQuery.validator.addMethod("customEmail", function(value, element) {
            return this.optional(element) ||
                (value.indexOf('.') !== -1 &&
                    value.indexOf('@') !== -1 &&
                    value.indexOf('.') < (value.length - 1)
                );
        }, "Please enter a valid email");

        $("#editFarmerForm").validate({
            rules: {
                email: {
                    required: true,
                    customEmail: {
                        customEmail: true
                    }
                },
                firstname: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
                nic: {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 12,
                },
                drivinglicense: {
                    required: true,
                },
                expirydate: {
                    required: true,
                },
                contact1: {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 14,
                },
                contact2: {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 14,
                },
                billing: {
                    required: true,
                },
                city: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                var data = {
                    'id': $('#id').val(),
                    'role': $('#role').val(),
                    'email': $('#email').val(),
                    'firstname': $('#firstname').val(),
                    'lastname': $('#lastname').val(),
                    'nic': $('#nic').val(),
                    'drivinglicense': $('#drivinglicense').val(),
                    'expirydate': $('#expirydate').val(),
                    'contact1': $('#contact1').val(),
                    'contact2': $('#contact2').val(),
                    'billing': $('#billing').val(),
                    'city': $('#city').val(),
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/consumer/updateConsumer' ?>",
                    data: data,
                    success: function(response) {
                        swal("Success", "User Updated successfully!", "success")
                    }
                })
            }
        });


        $("#editVehicleForm").validate({
            rules: {
                vehicle_type: {
                    required: true,
                },
                manufacturer: {
                    required: true,
                },
                vehicle_model: {
                    required: true,
                },
                regnumber: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                var data = {
                    'userId': $('#userId').val(),
                    'vehicle_type': $('#vehicle_type').val(),
                    'manufacturer': $('#manufacturer').val(),
                    'vehicle_model': $('#vehicle_model').val(),
                    'regnumber': $('#regnumber').val(),
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/consumer/updateVehicle' ?>",
                    data: data,
                    success: function(response) {
                        swal("Success", "Vehicl Details Updated successfully!", "success")
                    }
                })
            }
        });
    })
</script>