<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>FooTable</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>User Management</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Simple FooTable with pagination, sorting and filter</h5>


                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addUserModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add user</button></a>
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
                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                        <thead>

                            <tr>
                                <th>Role</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Edit User</th>
                                <th id="deleteth">Delete User</th>
                                <th>User Block</th>
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


<!-- Add user modal  -->

<div class="modal inmodal" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="addUserForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add User </h4>
                    <small class="font-bold">Please enter the User details </small>
                </div>

                <div class="modal-body">
                    <small>Select the User role </small>
                    <select class="form-control m-b" name="addRole" id="addRole">
                        <option value="0" selected='selected'>Please Select</option>
                        <option value="1">Admin</option>
                        <option value="2">Standard User</option>
                    </select>

                    <input type="hidden" placeholder="id" id="addId" name="addId">

                    <div class="form-group"><label>First Name</label> <input type="text" placeholder="Enter your First Name" id="addFname" name="addFname" class="form-control"></div>
                    <div class="form-group"><label>Last Name </label> <input type="text" placeholder="Enter your Last Name" id="addLname" name="addLname" class="form-control"></div>
                    <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter your Email" id="addEmail" name="addEmail" class="form-control"></div>
                    <div class="form-group"><input type="hidden" value="1" id="addpass" name="addpass" class="form-control"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                    <button type="button" id="addUserDataBtn" class="btn btn-primary">Save changes</button>

                </div>
            </div>
        </form>
    </div>
</div>

<!-- edit user data table start  -->

<div class="modal inmodal" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="editUserForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit User </h4>
                    <small class="font-bold">Please enter the User details </small>
                </div>

                <div class="modal-body">
                    <small>Select the User role </small>
                    <select class="form-control m-b" name="editRole" id="editRole">
                        <option value="0" selected='selected'>Please Select</option>
                        <option value="1">Admin</option>
                        <option value="2">Standard User</option>
                    </select>

                    <input type="hidden" placeholder="id" id="editId" name="editId">
                    <div class="form-group"><label>First Name</label> <input type="text" placeholder="Enter your First Name" id="editFname" name="editFname" class="form-control"></div>
                    <div class="form-group"><label>Last Name </label> <input type="text" placeholder="Enter your Last Name" id="editLname" name="editLname" class="form-control"></div>
                    <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter your Email" id="editEmail" name="editEmail" class="form-control"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                    <button type="button" id="editUserDataBtn" class="btn btn-primary">Save changes</button>

                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.footable').footable();
        $('.footable2').footable();
        // Fetch all user data on page load call here 
        getAlluserData();
        page();

        // Add user data to database



        $("#addUserDataBtn").click(function() {

            var data = {

                'addRole': $('#addRole').val(),
                'addFname': $('#addFname').val(),
                'addLname': $('#addLname').val(),
                'addEmail': $('#addEmail').val(),
                'addpass': $('#addpass').val(),

            };
            $.ajax({
                method: "POST",
                url: "<?= base_url() . 'index.php/userManagement_controler/addUser' ?>",
                data: data,
                success: function(response) {
                    getAlluserData();
                }
            })

        });

    });
    // Block the user 
    function blockUser(id, status) {
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/userManagement_controler/blockUserData' ?>",
            data: {
                "id": id,
                "status": status
            },
            success: function(response) {
                getAlluserData();
            }
        });
    }


    // get all user data on page load 
    function getAlluserData() {

        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");

        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/userManagement_controler/getAlluserData' ?>",
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



    // function deleteUser(id) {
    //     $.ajax({
    //         method: "GET",
    //         url: "<?= base_url() . 'index.php/userManagement_controler/deleteUserData' ?>",
    //         data: {
    //             "id": id
    //         },
    //         success: function(response) {
    //             getAlluserData();
    //         }
    //     });
    // }


    // delete the user data from table (With sweet alert )

    function deleteUser(id) {

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this User data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ed5565",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                method: "GET",
                url: "<?= base_url() . 'index.php/userManagement_controler/deleteUserData' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "User has been deleted.", "success");
                    getAlluserData();
                }
            });

        });
    }

    function editUser(id) {
        var userid = (id);
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/userManagement_controler/getUserData' ?>",
            data: {
                "id": id
            },
            dataType: 'json',
            success: function(data) {
                $('#editUserModal').modal('show');
                $('#editId').val(data[0]['id']);
                $('#editRole').val(data[0]['role']);
                $('#editFname').val(data[0]['first_name']);
                $('#editLname').val(data[0]['last_name']);
                $('#editEmail').val(data[0]['email']);
            }

        });

        $("#editUserDataBtn").click(function() {

            var data = {
                'editId': $('#editId').val(),
                'editRole': $('#editRole').val(),
                'editFname': $('#editFname').val(),
                'editLname': $('#editLname').val(),
                'editEmail': $('#editEmail').val(),
            };
            console.log(data);

            $.ajax({
                method: "POST",
                url: "<?= base_url() . 'index.php/userManagement_controler/updateUserData' ?>",
                data: data,
                success: function(response) {
                    $('#editUserModal').modal('hide');
                    getAlluserData();
                }
            })

        });
    }



    // reset the feild once add btn clicked 

    $("#addBtn").click(function() {
        resetAddFormValues();
    });

    function resetAddFormValues() {
        $('#addRole').val('0');
        // $('#addFname').val('');
        // $('#addLname').val('');
        // $('#addEmail').val('');

    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/userManagement_controler/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });


    }
</script>