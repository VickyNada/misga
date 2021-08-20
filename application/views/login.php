<div class="middle-box text-center loginscreen animated fadeInDown" style="padding: 8PX;">
    <div style="background-color:#f3f3f4 ; padding: 14px; width: 325px;border-radius: 20px;">
        <div>
            <div>
                <img src="<?= base_url(); ?>assets/img/design.png" class="logo-img" style="width: 229px; height: 239px;">
            </div>
            <h3>Welcome to Krish Villa Organic  </h3>
            <?php if ($this->session->userdata('error')) { ?>
                <div class="alert alert-danger alert-dismissable"><?php echo $this->session->userdata('error'); ?> </div>
            <?php $this->session->unset_userdata('error');
            } ?>
            <?php if ($this->session->userdata('success')) { ?>
                <div class="alert alert-success alert-dismissable"><?php echo $this->session->userdata('success'); ?> </div>
            <?php $this->session->unset_userdata('success');
            } ?>            
           
         
            <p>Login</p>

            
            <form class="m-t" role="form" method="post" action="<?= base_url() . 'index.php/login/login' ?>" id="form">
            <div class="form-group">
                    <input type="hidden" class="form-control" name="role" value ="<?= ($role);?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="Login">Login</button>

               
                <a href="<?= base_url() . 'index.php/login/reset_password' ?>"><small>Forgot password ?</small></a><br>
                <a href="<?= base_url() . 'index.php/role/index' ?>"><small>Wanna change Role ?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <!-- <a class="btn btn-sm btn-white btn-block" href="<?= base_url() . 'index.php/registration' ?>">Create an account</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                    Create an account
                </button>
            </form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Select</h4>
                <small class="font-bold">The User Account Type You Want To Create.</small>
            </div>
            <div class="modal-body">
                <div style="margin:auto;">
                    <button type="button" class="btn btn-outline btn-success" onclick="redirect('1')" style="width: 30%;margin-left: 15px;">Customer</button>
                    <button type="button" class="btn btn-outline btn-primary" onClick="redirect('2')"style="width: 30%;margin-right: 15px;margin-left: 10px;">Farmer</button>
                    <button type="button" class="btn btn-outline btn-warning" onClick="redirect('3')">Delivery Person</button>
                </div>
            </div>   
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
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

        $("#form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5,
                },

                username: {
                    customEmail: {
                        customEmail: true
                    }
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });

    function redirect(loc) {
        var url = '#'
        if (loc == 1) {
            url = "<?= base_url() . 'index.php/registration/reg_customer' ?>";
        } else if (loc == 2) {
            url = "<?= base_url() . 'index.php/registration/reg_farmer' ?>";
        } else if (loc == 3) {
            url = "<?= base_url() . 'index.php/registration/reg_deliveryuser' ?>";
        }
        window.location.href = url;
    }
</script>