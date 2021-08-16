<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Category</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Category Item</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Category Item </h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addCategoryModel" id="addBtn"><i class="fa fa-plus-circle"></i> Add New Category</button></a>
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
                    <table class="footable table table-stripped"  data-page-size="12" data-filter=#filter>
                        <thead>
                            <tr>

                                <th>Category Name</th>
                                <th>Description </th>
                                <th>Status</th>
                                <th>Created Date</th>
                                
                                <th id="deleteSort">Action category </th>

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



<div class="modal inmodal" id="addCategoryModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="addcategory">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add New Category </h4>
                    <small class="font-bold">Please enter the category details </small>
                </div>
                <div class="modal-body">

                    <input type="hidden" placeholder="id" id="addId" name="addId">

                    <div class="form-group"><label>Category Name </label> <input type="text" placeholder="Enter Category Name" id="category" name="category" class="form-control"></div>
                    <div class="form-group"><label>Category Description</label> <input type="text" placeholder="Enter Category Description" id="categorydescription" name="categorydescription" class="form-control"></div>
                    
                    <small>Select the Category Status </small>
                    <select class="form-control m-b" name="categoryStatus" id="categoryStatus">
                        <option value="0" selected='selected'>Please Select Category Status</option>
                        <option value="1">Yes </option>
                        <option value="2">No </option>
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
<!-- 
edit modal -->


<div class="modal inmodal" id="editItem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="editcategorymodal">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit category of Measurement </h4>
                    <small class="font-bold">Please enter the Inventory details </small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="id" id="editId" name="editId">

                    <div class="form-group"><label>category Name </label> <input type="text" placeholder="Enter category Name" id="editcategory" name="editcategory" class="form-control"></div>
                    <div class="form-group"><label>category Description</label> <input type="text" placeholder="Enter category Description" id="editdescription" name="editdescription" class="form-control"></div>

                    <small>Select the Category Status </small>
                    <select class="form-control m-b" name="editStatus" id="editStatus">
                        <option value="0" selected='selected'>Please Select Category Status</option>
                        <option value="1">Yes </option>
                        <option value="2">No </option>
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
        getAllcategory();

        page();

        $("#addcategory").validate({
            rules: {
                category: {
                    required: true,
                },
                categorydescription: {
                    required: true,
                },
                categoryStatus: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                categoryStatus: {
                    min: "Please select a value for Category",
                },
            },

            submitHandler: function(form) {
                var data = {
                    'category': $('#category').val(),
                    'categorydescription': $('#categorydescription').val(),
                    'categoryStatus': $('#categoryStatus').val(),
                  };
                    
                 
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/category/addcategory' ?>",
                    data: data,
                    success: function(response) {
                        getAllcategory();
                        $('#addcategory').modal('hide');
                        swal("Success", "Item added successfully!", "success")
                        resetAddFormValues()
                    }
                })
            }
        });

        $("#editcategorymodal").validate({
            rules: {
                editcategory: {
                    required: true,
                },

                editdescription: {
                    required: true,
                    
                },
                editStatus: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                editStatus: {
                    min: "Please select a value for Category",
                },
            },
         
            submitHandler: function(form) {
                var data = {
                    'editid'              : $('#editId').val(),
                    'editcategory'        : $('#editcategory').val(),
                    'editdescription'     : $('#editdescription').val(),
                    'editStatus'          : $('#editStatus').val(),
                };

            
                  $.ajax({
                    method: "POST",
                    url: "<?= base_url() . 'index.php/category/updatecategoryData' ?>",
                    data: data,
                    success: function(response) {
                        $('#editItem').modal('hide');
                        getAllcategory();
                        swal ( "Success" ,  "category Updated successfully!" ,  "success" )
                       
                    }
                })
            }
        });


        $("#reset").click(function() {
            resetAddFormValues();
        });
    });


    function getAllcategory() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/category/getAllcategory' ?>",
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

    function deletecategory(id) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this category data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/category/deletecategory' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "category has been deleted.", "success");
                    getAllcategory();
                }
            });
        });
    }

    function editcategory(id) {
        var categoryId = id;
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/category/getcategoryData' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editItem').modal('show');
                $('#editId').val(categoryId);
                $('#editcategory').val(data[0]['category']);
                $('#editdescription').val(data[0]['description']);
                $('#editStatus').val(data[0]['status']);

              }

        });
    }


    function resetAddFormValues() {
        $('#category').val('');
        $('#categorydescription').val('');
        $('#categoryStatus').val('0');

    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/category/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }
</script>