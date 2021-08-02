
<!-- Mainly scripts -->
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script>if(typeof(Popper) === 'undefined') {document.write('<script src="static/lib/popper.min.js"><\/script>')}</script>

<script src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);
        });
</script>
            
</body>
</html>