<!-- Menu Path Section -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Wastage Reasons</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Inventory Management</strong>
            </li>
            <li class="breadcrumb-item active">
                <strong>Inventory Setup</strong>
            </li>
            <li class="breadcrumb-item active">Wastage Reasons</li>
        </ol>
    </div>
</div>

<!-- main Page  -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Available Wastage Reasons</h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addWreasonModal" id="addBtn"><i class="fa fa-plus-circle"></i> New Reason</button></a>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content-loader" style="display: none;">
                    <div class="sk-spinner sk-spinner-pulse"></div>
                </div>

                <div class="ibox-content">
                    <input type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Search in table">
                    <table class="footable table table-stripped" data-page-size="12" data-filter=#filter>
                        <thead>
                            <tr>
                                <th>Internal id</th>
                                <th>Wastage Reason Code</th>
                                <th>Reason Description</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody class="tableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Reason modal  -->
<div class="modal inmodal" id="addWreasonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="addWreasonForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon" onClick="window.location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">New Wastage Reason</h4>
                    <small class="font-bold">Please enter the Reason info here</small>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label>Wastage Code</label><input type="text" placeholder="Enter Reason Code Here" id="addWcode" name="addWcode" class="form-control"></div>
                    <div class="form-group"><label>Wastage Description</label><input type="text" placeholder="Enter Wastage Description" id="addWdesc" name="addWdesc" class="form-control"></div>
                    <!-- <div class="form-group"><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" id="addCurrentdate" name="addCurrentdate" class="form-control"></div> -->
                </div>
                <div class="modal-footer">
                    <button id='closeWreasonModal' class="btn btn-primary " data-dismiss="modal" type="button" onClick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
                    <button id="addWreasonBtn" class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- edit user data table start  -->
<div class="modal inmodal" id="editWreasonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="editWreasonForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon" onClick="window.location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit Wastage Reason</h4>
                    <small class="font-bold">Please Edit the Reason info here</small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="id" id="editId" name="editId">
                    <div class="form-group"><label>Wastage Code</label><input readonly="true" type="text" readonly="true" placeholder="Enter Reason Code Here" id="editWcode" name="editWcode" class="form-control"></div>
                    <div class="form-group"><label>Wastage Description</label><input type="text" placeholder="Enter Wastage Description" id="editWdesc" name="editWdesc" class="form-control"></div>
                    <!-- <div class="form-group"><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" id="addCurrentdate" name="addCurrentdate" class="form-control"></div> -->
                </div>
                <div class="modal-footer">
                    <button id='closeWreasonModal' class="btn btn-primary " data-dismiss="modal" type="button" onClick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
                    <button id="editWreasonBtn" class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
        $('.footable').footable();
        // Fetch all wastage reason data on page load call here 
        getWreasonData();
        page();

        // Insert Form data
          $("#addWreasonForm").validate({
            rules: {
                addWcode: {
                    required: true,
                    maxlength: 4,
                },

                addWdesc: {
                    required: true,
                },
            },
            messages:{
                addWcode: {
                    min: "Reason Code is required",
                },
                addWdesc: {
                    min: "Reason Description is required",
                },
            },
            submitHandler: function(form) {
                var data = {
                    'addWcode': $('#addWcode').val(),
                    'addWdesc': $('#addWdesc').val(),                    
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/inventory/addWreason' ?>",
                    data: data,
                    success: function(response) {
                        getWreasonData();
                        $('#addWreasonModal').modal('hide');
                        swal ( "Success" ,  "Wastage Reason added successfully!" ,  "success" )
                    }
                })
            }
        });

        // Update Form data
        $("#editWreasonForm").validate({
            rules: {
                addWdesc: {
                    required: true,
                },
            },
            submitHandler: function(form) {
                var data = {
                    'editId': $('#editId').val(),

                    'editWdesc': $('#editWdesc').val(),
                };

                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/inventory/editWreason' ?>",
                    data: data,
                    success: function(response) {
                        $('#editWreasonModal').modal('hide');
                        getWreasonData();
                        swal ( "Success" ,  "Updated successfully!" ,  "success" )
                    }
                })
            }
        });

        // reset the feild once add btn clicked 
        $("#addBtn").click(function() {
            resetAddFormValues();
        });
    });

    // get all Wastage Reason data on page load 
    function getWreasonData() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/inventory/getWreasonData' ?>",
            success: function(response) {
                $(".ibox-content-loader").css("display", "none");
                $(".ibox-content").css("display", "block");
                $(".tableBody").html('');
                $(".tableBody").append(response);
                // setTimeout(() => {
                //     $("#deleteth").click();

                // }, 200);
            }
        })
    }

    // load Wastage record to edit form
    function editWreason(id) {
        var wrid = (id);
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/inventory/getWreasoneditdata' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editWreasonModal').modal('show');
                $('#editId').val(data[0]['id']);
                $('#editWcode').val(data[0]['wastageReason']);
                $('#editWdesc').val(data[0]['Description']);
            }
        });
    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/inventory/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }
</script>