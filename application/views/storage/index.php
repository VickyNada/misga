<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Storages</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Manage Storage</strong>
            </li>
        </ol>
    </div>
</div>

<di v class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Storages</h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addStorageModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add Storage</button></a>
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
                                <th>Storage Type</th>
                                <th>Sizes</th>
                                <th id="deleteSite">Delete</th>
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

    <div class="modal inmodal" id="addStorageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">

            <form id="addStorageForm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Storage </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label>Site Type</label> <input type="text" placeholder="Enter Storage Type" id="stype" name="stype" class="form-control"></div>
                        <div class="form-group"><label>Available Sizes </label>
                            <div class="form-group"><label>Small</label> <input type="text" placeholder="Enter Quantity" id="Small" name="Small" class="form-control"></div>
                            <div class="form-group"><label>Medium</label> <input type="text" placeholder="Enter Quantity" id="Medium" name="Medium" class="form-control"></div>
                            <div class="form-group"><label>Large</label> <input type="text" placeholder="Enter Quantity" id="Large" name="Large" class="form-control"></div>
                            <div class="form-group"><label>XL</label> <input type="text" placeholder="Enter Quantity" id="XL" name="XL" class="form-control"></div>
                            <div class="form-group"><label>XXL</label> <input type="text" placeholder="Enter Quantity" id="XXL" name="XXL" class="form-control"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                            <button type="submit" id="addUserDataBtn" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.footable').footable();
            // Fetch all user data on page load call here 
            getAllStorageData();
            page();

            $("#addStorageForm").validate({
                rules: {
                    stype: {
                        required: true,
                    },
                    Small: {
                        number: true,
                    },
                    Medium: {
                        number: true,
                    },
                    Large: {
                        number: true,
                    },
                    XL: {
                        number: true,
                    },
                    XXL: {
                        number: true,
                    },
                },
                submitHandler: function(form) {
                    var data = {
                        'stype': $("#stype").val(),
                        'Small': $("#Small").val(),
                        'Medium': $("#Medium").val(),
                        'Large': $("#Large").val(),
                        'XL': $("#XL").val(),
                        'XXL': $("#XXL").val(),
                    };

                    $.ajax({
                        method: "POST",
                        url: "<?= base_url() . 'index.php/storage/addStoragetype' ?>",
                        data: data,
                        success: function(response) {
                            getAllStorageData();
                            $('#addStorageForm').modal('hide');
                            swal("Success", "Storage Type added successfully!", "success")
                        }
                    })
                }
            });
        });

        function getAllStorageData() {
            $(".ibox-content-loader").css("display", "block");
            $(".ibox-content").css("display", "none");
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/storage/getAllStorageData' ?>",
                success: function(response) {
                    $(".ibox-content-loader").css("display", "none");
                    $(".ibox-content").css("display", "block");
                    $(".tableBody").html('');
                    $(".tableBody").append(response);
                    setTimeout(() => {
                        $("#deleteth").click();

                    }, 200);
                }
            })
        }

        function page() {
            $.ajax({
                url: "<?= base_url() . 'index.php/usermanagement/page' ?>",
                success: function(result) {
                    $(".page").html(result);
                }
            });
        }


        function deleteStorage(id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Storage data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ed5565",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    method: "GET",
                    url: "<?= base_url() . 'index.php/storage/deleteStorageData' ?>",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        swal("Deleted!", "Storage has been deleted.", "success");
                        getAllStorageData();
                    }
                });
            });
        }
    </script>