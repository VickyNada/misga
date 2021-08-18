
<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login As</h4>
                <small class="font-bold">The User Account Type You Want To Login.</small>
            </div>
            <div class="modal-body">
                <div style="margin:auto;">
                   
                    <button type="button" class="btn btn-outline btn-success" onclick="redirect('3')" style="width: 30%;margin-left: 15px;">Customer</button>
                    <button type="button" class="btn btn-outline btn-primary" onClick="redirect('4')"style="width: 30%;margin-right: 15px;margin-left: 10px;">Farmer</button>
                    <button type="button" class="btn btn-outline btn-warning" onClick="redirect('5')">Delivery Person</button>
                </div>
            </div>   
            <div class="modal-footer">
               
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myModal2').modal('show');
    });

    function redirect(loc) {
        url = "<?= base_url() . 'index.php/Login/index?roleid=' ?>"+loc;
        window.location.href = url;
    }
</script>