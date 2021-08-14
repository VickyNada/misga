<div class="middle-box wrapper wrapper-content animated fadeInRight registration" style="margin-left: 25%;max-width: 1400px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="#" onclick="redirectLogin()">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <h2>
                        <strong>Delivery User Registration Form</strong>
                    </h2>
                    <p>
                        Please complete all steps to prceed with registration
                    </p>

                    <?php if ($this->session->userdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissable"><?php echo $this->session->userdata('error'); ?> </div>
                    <?php $this->session->unset_userdata('error');
                    } ?>

                    <?php $attributes = array('id' => 'form', 'class' => 'wizard-big', 'method' => 'post');
                    echo form_open_multipart(base_url() . 'index.php/registration/reg_deliveryuser', $attributes); ?>

                    <h1>Account</h1>
                    <fieldset>
                        <h2>Account Information</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input id="email" name="email" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input id="password" name="password" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password *</label>
                                    <input id="confirm" name="confirm" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <div style="margin-top: 20px">
                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <h1>Profile</h1>
                    <fieldset>
                        <!-- <h2>Profile Information</h2> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input id="firstname" name="firstname" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>NIC *</label>
                                    <input id="nic" name="nic" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Contact number*</label>
                                    <input id="contact1" name="contact1" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input id="lastname" name="lastname" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label> Address *</label>
                                    <input id="baddress" name="baddress" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>City *</label>
                                    <input id="city" name="city" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Profile Picture *</label>
                                    <input type="file" id="profilepic" name="profilepic" />
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <h1>Vehicle Details</h1>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <small>Select Vehicle Type </small>
                                    <select class="form-control m-b" name="vtype" id="vtype">
                                        <option value="0" selected='selected'>Please Select</option>
                                        <option value="Car">Car</option>
                                        <option value="Motor bikes">Motor bikes</option>
                                        <option value="Van">Van</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Trucks">Trucks</option>
                                        <option value="three wheeler">Three wheeler</option>
                                        <option value="others">Others</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <small>Select Vehicle manufacturer name </small>
                                    <select class="form-control m-b" name="mname" id="mname">
                                        <option value="0" selected='selected'>Please Select</option>
                                        <option id="bj" value="Bajaj">Bajaj</option>
                                        <option value="Hero">Hero</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Isuzu">Isuzu</option>
                                        <option value="Mahendra">Mahendra</option>
                                        <option value="Mitsubishi">Mitsubishi</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="Piaggio">Piaggio</option>
                                        <option value="Suzuki">Suzuki</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="TVS">TVS</option>
                                        <option value="Yamaha">Yamaha</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Vehicle Model * </label>
                                    <input id="vmodel" name="vmodel" type="text" class="form-control required">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Registration Number *</label>
                                    <input id="regnumber" name="regnumber" type="text" class="form-control required">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Driving License Number*</label>
                                    <input id="license" name="license" type="text" class="form-control required">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Driving License Expiry Date*</label>
                                    <input id="expiry" name="expiry" type="date" class="form-control required">
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <h1>Vehicle Documents</h1>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Driving License*</label>
                                    <input type="file" id="dril" name="dril" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Revenue license*</label>
                                    <input type="file" id="revl" name="revl" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Insurance *</label>
                                    <input type="file" id="ins" name="ins" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Vehicle Books *</label>
                                    <input type="file" id="vb" name="vb" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function(event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 4) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Submit form input
                form.submit();
            }



        }).validate({
            errorPlacement: function(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password",
                },

                email: {
                    email: true,
                },

                nic: {
                    number: true,
                    minlength: 9,
                    maxlength: 12,
                },

                contact1: {
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },

                area: {
                    number: true,
                    minlength: 1,
                    maxlength: 3,
                },

                contact2: {
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },

                vtype: {
                    required: true,
                },

                mname: {
                    required: true,
                },

                profilepic: {
                    extension: "gif|jpg|png"
                },
            },
            messages: {
                profilepic: {
                    extension: "Files should be in gif or jpg or png format"
                },
            }
        });
    });

    function redirectLogin() {
        <?php $this->session->unset_userdata('error') ?>;
        var url = "<?= base_url() . 'index.php/login/login' ?>";
        window.location.href = url;
    }
</script>