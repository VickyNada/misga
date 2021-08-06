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

            <p>You Can Reset Password Here.</p>
            <form class="m-t" role="form" method="post" action = "<?= base_url() . 'index.php/login/reset_password' ?>"id="form">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your registered email " required="" name="email">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your New password" required="" name="password">

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Retype your password" name="repassword">

                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="Login">Submit</button>

            
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
</div>
<!-- 
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
</script>
 -->
