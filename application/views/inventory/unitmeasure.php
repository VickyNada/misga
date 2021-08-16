<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Unit of Measurement</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Unit of Measurement</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Unit Measurement </h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addItemModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add New Unit</button></a>
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

                                <th>Unit Name</th>
                                <th>Description </th>
                                <th>Created Date</th>
                                <th>Created by</th>
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
                    <h4 class="modal-title">Add New Unit of Measurement </h4>
                    <small class="font-bold">Please enter the Measurement details </small>
                </div>
                <div class="modal-body">

                    <input type="hidden" placeholder="id" id="addId" name="addId">

                    <div class="form-group"><label>Unit Name </label> <input type="text" placeholder="Enter Unit Name" id="unitName" name="unitName" class="form-control"></div>
                    <div class="form-group"><label>Unit Description</label> <input type="text" placeholder="Enter Unit Description" id="unitdescription" name="unitdescription" class="form-control"></div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-reset="modal" id='reset'>Reset</button>
                    <!-- <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button> -->
                    <button type="submit" id="addItemBtn" class="btn btn-primary">Save changes</button>
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
                    <h4 class="modal-title">Edit Unit of Measurement </h4>
                    <small class="font-bold">Please enter the Inventory details </small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="id" id="editId" name="editId">

                    <div class="form-group"><label>Unit Name </label> <input type="text" placeholder="Enter Unit Name" id="editunitname" name="editunitname" class="form-control"></div>
                    <div class="form-group"><label>Unit Description</label> <input type="text" placeholder="Enter Unit Description" id="editdescription" name="editdescription" class="form-control"></div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-white" data-reset="modal" id='reset'>Reset</button> -->
                    <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                    <button type="submit" id="editItemBtn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.footable').footable();
        getAllUnit();

        page();

        $("#addUnit").validate({
            rules: {
                unitName: {
                    required: true,
                },
                unitdescription: {
                    required: true,
                },
            },

            submitHandler: function(form) {
                var data = {
                    'unitName': $('#unitName').val(),
                    'unitdescription': $('#unitdescription').val(),

                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/unit/addunit' ?>",
                    data: data,
                    success: function(response) {
                        getAllUnit();
                        $('#addUnit').modal('hide');
                        swal("Success", "Item added successfully!", "success")
                        resetAddFormValues()
                    }
                })
            }
        });

        $("#editUnit").validate({
            rules: {
                editunitname: {
                    required: true,
                },

                editdescription: {
                    required: true,
                    
                },
            },
         
            submitHandler: function(form) {
                var data = {
                   
                    'editid'              : $('#editId').val(),
                    'editunitname'        : $('#editunitname').val(),
                    'editdescription'     : $('#editdescription').val(),
                    
                };

            
                  $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/unit/updateunitData' ?>",
                    data: data,
                    success: function(response) {
                        $('#editItem').modal('hide');
                        getAllUnit();
                        swal ( "Success" ,  "unit Updated successfully!" ,  "success" )
                       
                    }
                })
            }
        });


        $("#reset").click(function() {
            resetAddFormValues();
        });
    });


    function getAllUnit() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/unit/getAllUnit' ?>",
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

    function deleteunit(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this unit data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/unit/deleteunit' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "Unit has been deleted.", "success");
                    getAllUnit();
                }
            });
        });
    }

    function editunit(id) {
        var unitId = id;
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/unit/getunitData' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editItem').modal('show');
                $('#editId').val(unitId);
                $('#editunitname').val(data[0]['unitname']);
                $('#editdescription').val(data[0]['description']);
               
            }

            
        });
    }


    function resetAddFormValues() {
        $('#unitName').val('');
        $('#unitdescription').val('');

    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/unit/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }
</script>