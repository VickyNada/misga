<div class="middle-box text-center loginscreen animated fadeInDown" style="padding: 8PX;">
    <div style="background-color:#f3f3f4 ; padding: 14px; width: 325px;border-radius: 20px;">
        <div>
            <div>

                <!--  <h1 class="logo-name">Logo</h1> -->

                <img src="<?= base_url(); ?>assets/img/design.png" class="logo-img" style="width: 229px; height: 239px;">

            </div>
            <h3>Welcome to Warriors </h3>
            
            <?php if ($this->session->userdata('error')) { ?>
                <div class="alert alert-danger alert-dismissable"><?php echo $this->session->userdata('error'); ?> </div>
            <?php $this->session->unset_userdata('error');
            } ?>
       
            <!--  <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
           </p> -->

            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="post" action="<?= base_url() . 'index.php/login/login' ?>" id="form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="Login">Login</button>

                <a href="forget.php"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
</div>

<!-- <script>
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
                    maxlength: 12
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
</script> -->

