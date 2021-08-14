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
                        <a href="<?= base_url() . 'index.php/login/login' ?>">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <h2>
                        <strong>Customer Registration Form</strong>
                    </h2>
                    <p>
                        Please complete all steps to prceed with registration
                    </p>

                    <?php if ($this->session->userdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissable"><?php echo $this->session->userdata('error'); ?> </div>
                    <?php $this->session->unset_userdata('error');
                    } ?>

                    <?php $attributes = array('id' => 'form', 'class' => 'wizard-big', 'method' => 'post');
                    echo form_open_multipart(base_url() . 'index.php/registration/reg_customer', $attributes); ?>

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
                        <h2>Profile Information</h2>
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
                                    <label>Delivery Address *</label>
                                    <input id="daddress" name="daddress" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input id="lastname" name="lastname" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Billing Address *</label>
                                    <input id="baddress" name="baddress" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>City *</label>
                                    <input id="city" name="city" type="text" class="form-control required">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <h1>Contact Details</h1>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Contact number *</label>
                                    <input id="contact1" name="contact1" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Whatsapp number </label>
                                    <input id="contact2" name="contact2" type="text" class="form-control required">
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
                if (currentIndex === 2 && priorIndex === 3) {
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

                nic: {
                    number: true,
                    minlength: 9,
                    maxlength: 12,
                },

                contact1: {
                    number: true,
                    minlength: 10,
                    maxlength: 13,
                },

                contact2: {
                    number: true,
                    minlength: 10,
                    maxlength: 13,
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
</script>