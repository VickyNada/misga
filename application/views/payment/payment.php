
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Payment type</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Payment types</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Payment type </h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addItemModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add New type</button></a>
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

                                <th>Internal ID</th>
                                <th>Payment Type </th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th id="deleteSort">Action Unit </th>

                            </tr>
                        </thead>
                        <tbody class="tableBody">

                        </tbody>
                        <tfoot>
                            <tr class="page">
                                <!-- <td colspan="5">
                                    <ul class="pagination float-right"></ul> -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal inmodal" id="addItemModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="addUnit">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add new type </h4>
                    <small class="font-bold">Please enter the payment details </small>
                </div>
                <div class="modal-body">

                    <input type="hidden" placeholder="id" id="addId" name="addId">

                    <div class="form-group"><label>Paymwnt Type </label> <input type="text" placeholder="Enter payment Type" id="paymenttype" name="paymenttype" class="form-control"></div>
                    <div class="form-group"><label>Payment Description</label> <input type="text" placeholder="Enter payment Description" id="description" name="description" class="form-control"></div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-reset="modal" id='reset'>Reset</button>
                    <!-- <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button> -->
                    <button type="submit" id="addtypeBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- 
edit modal -->


<div class="modal inmodal" id="editItem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="editUnit">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit payment type </h4>
                    <small class="font-bold">Please enter the payment details </small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="id" id="editId" name="editId">

                    <div class="form-group"><label>Paymwnt Type </label> <input type="text" placeholder="Enter Paymwnt Type" id="edittype" name="edittype" class="form-control"></div>
                    <div class="form-group"><label>Payment Description</label> <input type="text" placeholder="Enter Unit Payment Description" id="editdescription" name="editdescription" class="form-control"></div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-white" data-reset="modal" id='reset'>Reset</button> -->
                    <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                    <button type="submit" id="editTypeBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.footable').footable();
        getAlltype();

        page();

        $("#addUnit").validate({
            rules: {
                paymenttype: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },

            submitHandler: function(form) {
                var data = {
                    'paymenttype': $('#paymenttype').val(),
                    'description': $('#description').val(),

                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/payment/addtype' ?>",
                    data: data,
                    success: function(response) {
                        getAlltype();
                        $('#addItemModal').modal('hide');
                        swal("Success", "Type added successfully!", "success")
                        resetAddFormValues()
                    }
                })
            }
        });

        $("#editUnit").validate({
            rules: {
                edittype: {
                    required: true,
                },

                editdescription: {
                    required: true,
                    
                },
            },
         
            submitHandler: function(form) {
                var data = {
                   
                    'editid'             : $('#editId').val(),
                    'edittype'           : $('#edittype').val(),
                    'editdescription'    : $('#editdescription').val(),
                    
                };

            
                  $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/payment/updatetypeData' ?>",
                    data: data,
                    success: function(response) {
                        $('#editItem').modal('hide');
                        getAlltype();
                        swal ( "Success" ,  "type Updated successfully!" ,  "success" )
                       
                    }
                })
            }
        });


        $("#reset").click(function() {
            resetAddFormValues();
        });
    });


    function getAlltype() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/payment/getAlltype' ?>",
            success: function(response) {
                $(".ibox-content-loader").css("display", "none");
                $(".ibox-content").css("display", "block");
                $(".tableBody").html('');
                $(".tableBody").append(response);
                setTimeout(() => {
                    $("#deleteSort").click();

                }, 200);
            }
        })
    }

    function deletetype(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this type data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/payment/deletetype' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "type has been deleted.", "success");
                    getAlltype();
                }
            });
        });
    }

    function edittype(id) {
        var typeId = id;
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/payment/gettypeData' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editItem').modal('show');
                $('#editId').val(typeId);
                $('#edittype').val(data[0]['payment_type']);
                $('#editdescription').val(data[0]['payment_description']);
               
            }

            
        });
    }


    function resetAddFormValues() {
        $('#paymenttype').val('');
        $('#description').val('');

    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/payment/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }
</script>