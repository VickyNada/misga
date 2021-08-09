
DASHBOARD 

<script>
    $(document).ready(function() {
        var username = '<?php echo $this->session->userdata('username') ?>';
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 2000
            };
            toastr.success('Welcome to Dashboard', username);
        }, 500);
    });
</script>