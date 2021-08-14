    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Customer</a>
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
                                <h5>Delivery Address</h5>
                                <p><i class="fa fa-map-marker">&nbsp;</i><?= $consumerInfo[0]->Delivery; ?></p>
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
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Contact Number </label>
                                <div class="col-lg-10"><input type="text" name="contact1" id="contact1" value="<?= $consumerInfo[0]->contact1; ?>" placeholder="Contact Number 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label"> Whatsapp Number</label>
                                <div class="col-lg-10"><input type="text" name="contact2" id="contact2" value="<?= $consumerInfo[0]->contact2; ?>" placeholder="Contact Number 2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Billing Address</label>
                                <div class="col-lg-10"><input type="text" name="billing" id="billing" value="<?= $consumerInfo[0]->Billing ?>" placeholder="Billing Address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Delivery Address</label>
                                <div class="col-lg-10"><input type="text" name="delivery" id="delivery" value="<?= $consumerInfo[0]->Delivery; ?>" placeholder="Farm Address" class="form-control">
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
                    farmnane: {
                        required: true,
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
                    delivery: {
                        required: true,
                    },
                },
                submitHandler: function(form) {
                    var data = {
                        'id': $('#id').val(),
                        'role': $('#role').val(),
                        'farmname': $('#farmname').val(),
                        'email': $('#email').val(),
                        'firstname': $('#firstname').val(),
                        'lastname': $('#lastname').val(),
                        'nic': $('#nic').val(),
                        'contact1': $('#contact1').val(),
                        'contact2': $('#contact2').val(),
                        'billing': $('#billing').val(),
                        'delivery': $('#delivery').val(),
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
        })
    </script>