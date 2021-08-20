<!-- <?php var_dump($storage); ?> -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inventory Master</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Inventory Management</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Inventory Products</h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addItemModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add New Item</button></a>
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
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <!-- <th>Category Code</th> -->
                                <th>Category </th>
                                <th>Unit </th>
                                <th>Storage</th>
                                <!-- <th>Additional Details</th> -->
                                <th>Item Status</th>
                                <th>Created Date</th>
                                <!-- <th>Modified Date</th> -->
                                <th>Created by</th>

                                <th id="deleteSort">Action Item </th>
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

        <form id="addItemForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add New Inventory </h4>
                    <small class="font-bold">Please enter the Inventory details </small>
                </div>
                <div class="modal-body">

                    <input type="hidden" placeholder="id" id="addId" name="addId">

                    <div class="form-group"><label>Item Code </label> <input type="text" placeholder="Enter Item Code" id="itemcode" name="itemcode" class="form-control"></div>
                    <small>Select the Unit of Measure </small>
                    <select class="form-control m-b" name="unit" id="unit">
                        <option value="0" selected='selected'>Please Select</option>
                        <?php

                        foreach ($unit as $row) {
                            echo '<option value ="' . $row["unitname"] . '" > ' . $row["unitname"] . ' </option>';
                        }
                        ?>
                        <!-- <option value="1">Kilogram </option>
                        <option value="2">Gram</option>
                        <option value="3">Bottle</option>
                        <option value="4">liter</option> -->
                    </select>

                    <div class="form-group"><label>Item name </label> <input type="text" placeholder="Enter Item name" id="itemname" name="itemname" class="form-control"></div>

                    <small>Select the Item Category </small>
                    <select class="form-control m-b" name="itemcategory" id="itemcategory">
                        <option value="0" selected='selected'>Please Select Item Category </option>
                        <?php

                        foreach ($category as $row) {
                            echo '<option value="' . $row["category"] . ' "> ' . $row["category"] . ' </option>';
                        }
                        ?>

                        <!-- 
                        
                        <option value="1">Flowers </option>
                        <option value="2">Fruits </option>
                        <option value="3">Vegitables </option> -->
                    </select>

                    <small>Select the Item Store </small>
                    <select class="form-control m-b" name="store" id="store">
                        <option value="0" selected='selected'>Please Select Store</option>
                        <?php

                        foreach ($storage as $row) {
                            echo '<option value ="' . $row["type"] . '" > ' . $row["type"] . ' </option>';
                        }
                        ?>

                    </select>


                    <div class="form-group"><label>Additional Details</label> <input type="text" placeholder="Enter Additional Details" id="adddetails" name="adddetails" class="form-control"></div>

                    <small>Select the Item Status </small>
                    <select class="form-control m-b" name="itemstatus" id="itemstatus">
                        <option value="0" selected='selected'>Please Select Item Status</option>
                        <option value="1">Yes </option>
                        <option value="1">No </option>
                    </select>
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

<!-- edit model -->


<div class="modal inmodal" id="editItem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="editItemForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit Inventory </h4>
                    <small class="font-bold">Please enter the Inventory details </small>
                </div>
                <div class="modal-body">


                    <input type="hidden" placeholder="id" id="editId" name="editId">

                    <!-- <div class="form-group"><label>Item Code </label> <input type="text" placeholder="Enter Item Code" id="edititemcode" name="edititemcode" class="form-control"></div> -->
                    <small>Select the Unit of Measure </small>
                    <select class="form-control m-b" name="editunit" id="editunit">
                        <option value="0" selected='selected'>Please Select</option>
                        <?php

                        foreach ($unit as $row) {
                            echo '<option value ="' . $row["unitname"] . '" > ' . $row["unitname"] . ' </option>';
                        }
                        ?>

                        <!-- 
                        <option value="1">Kilogram </option>
                        <option value="2">Gram</option>
                        <option value="3">Bottle</option>
                        <option value="4">liter</option> -->
                    </select>

                    <div class="form-group"><label>Item name </label> <input type="text" placeholder="Enter Item name" id="edititemname" name="edititemname" class="form-control"></div>

                    <small>Select the Item Category </small>
                    <select class="form-control m-b" name="edititemcategory" id="edititemcategory">
                        <option value="0" selected='selected'>Please Select Item Category </option>
                        <?php

                        foreach ($category as $row) {
                            echo '<option value="' . $row["category"] . ' "> ' . $row["category"] . ' </option>';
                        }
                        ?>


                        <!-- 
                        <option value="1">Flowers </option>
                        <option value="2">Fruits </option>
                        <option value="3">Vegitables </option> -->
                    </select>

                    <small>Select the Item Store </small>
                    <select class="form-control m-b" name="editstore" id="editstore">
                        <?php

                        foreach ($storage as $row) {
                            echo '<option value ="' . $row["type"] . '" > ' . $row["type"] . ' </option>';
                        }
                        ?>
                    </select>


                    <div class="form-group"><label>Additional Details</label> <input type="text" placeholder="Enter Additional Details" id="editadddetails" name="editadddetails" class="form-control"></div>

                    <small>Select the Item Status </small>
                    <select class="form-control m-b" name="edititemstatus" id="edititemstatus">
                        <option value="0" selected='selected'>Please Select Item Status</option>
                        <option value="1">Yes </option>
                        <option value="0">No </option>
                    </select>
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
        getAllProductData();

        page();



        $("#addItemForm").validate({
            rules: {
                itemcode: {
                    required: true,
                },
                itemname: {
                    required: true,
                },
                unit: {
                    required: true,

                },

                itemcategory: {
                    required: true,

                },
                store: {
                    required: true,
                    min: 1,
                },
                adddetails: {
                    required: true,
                },

                itemstatus: {
                    required: true,
                    min: 1,
                },
            },

            messages: {
                unit: {
                    min: "Please select a value for unit",
                },
                itemcategory: {
                    min: "Please select a value for itemcategory",
                },
                store: {
                    min: "Please select a value for store",
                },
                itemstatus: {
                    min: "Please select a value for itemstatus",
                },
            },

            submitHandler: function(form) {

                var data = {
                    'itemcode': $('#itemcode').val(),
                    'itemname': $('#itemname').val(),
                    'itemcategory': $('#itemcategory').val(),
                    'store': $('#store').val(),
                    'adddetails': $('#adddetails').val(),
                    'unit': $('#unit').val(),
                    'itemstatus': $('#itemstatus').val(),
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/Inventory/addItem' ?>",
                    data: data,
                    success: function(response) {
                        getAllProductData();
                        $('#addItemModal').modal('hide');
                        swal("Success", "Item added successfully!", "success")
                        resetAddFormValues()
                    }
                })
            }
        });


        $("#editItemForm").validate({
            rules: {
                itemcode: {
                    required: true,
                },
                itemname: {
                    required: true,
                },
                unit: {
                    required: true,
                    min: 1,
                },

                itemcategory: {
                    required: true,
                    min: 1,
                },
                store: {
                    required: true,
                    min: 1,
                },
                adddetails: {
                    required: true,
                },

                itemstatus: {
                    required: true,
                    min: 1,
                },
            },

            messages: {
                unit: {
                    min: "Please select a value for unit",
                },
                itemcategory: {
                    min: "Please select a value for itemcategory",
                },
                store: {
                    min: "Please select a value for store",
                },
                itemstatus: {
                    min: "Please select a value for itemstatus",
                },
            },

            submitHandler: function(form) {
                var data = {

                    'editId': $('#editId').val(),
                    'itemname': $('#edititemname').val(),
                    'itemcategory': $('#edititemcategory').val(),
                    'store': $('#editstore').val(),
                    'adddetails': $('#editadddetails').val(),
                    'unit': $('#editunit').val(),
                    'itemstatus': $('#edititemstatus').val(),
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/inventory/updateItemData' ?>",
                    data: data,
                    success: function(response) {
                        $('#editItem').modal('hide');
                        getAllProductData();
                        swal("Success", "Item Updated successfully!", "success")
                    }
                })
            }
        });

        $("#reset").click(function() {
            resetAddFormValues();
        });
    });

    function getAllProductData() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/inventory/getAllProductData' ?>",
            datatype : 'json',
            success: function(response) {
                $(".ibox-content-loader").css("display", "none");
                $(".ibox-content").css("display", "block");
                $(".tableBody").html('');
               
                setTimeout(() => {
                    $("#deleteSort").click();

                }, 200);
            }
        })
    }

    function deleteItem(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this item data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/inventory/deleteItemData' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "User has been deleted.", "success");
                    getAllProductData();
                }
            });
        });
    }

    function resetAddFormValues() {
        $('#itemname').val('');
        $('#itemcategory').val('0');
        $('#store').val('0');
        $('#adddetails').val('');
        $('#unit').val('0');
        $('#itemstatus').val('0');
    }

    function editItem(id) {
        var itemId = (id);
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/inventory/getItemData' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editItem').modal('show');
                $('#editId').val(data[0]['id']);
                $('#edititemname').val(data[0]['itemname']);
                $('#edititemcategory').val(data[0]['Item_category']);
                $('#editstore').val(data[0]['storage_id']);
                $('#editadddetails').val(data[0]['additional_details']);
                $('#editunit').val(data[0]['unit']);
                $('#edititemstatus').val(data[0]['Item_status']);
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