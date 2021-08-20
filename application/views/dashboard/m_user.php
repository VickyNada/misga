<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Tables</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>FooTable</strong>
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

                    <a><button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus-circle"></i> Add user</button></a>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // print all user data in the loop
                            foreach ($allusers as $user) {
                                // assign the user role 
                                if ($user->role == 1) {
                                    $userrole = "Admin";
                                } else {
                                    $userrole = "Standard User";
                                }

                                // Creating a object and assign the values as sperate using comma
                                $userObj = $user->id . "," . $user->role . "," . $user->first_name . "," . $user->last_name . "," . $user->email;

                                // saving the datas into the table 
                            ?> <tr class="grade">
                                    <td><?= $userrole; ?></td>
                                    <td><?= $user->first_name; ?></td>
                                    <td><?= $user->last_name; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td>
                                        <!--  Print the user object and pass the object to jS -->
                                        <a class="btn btn-warning btn-rounded" data-toggle="modal" data-user-obj="<?= $userObj ?>" data-target="#myModal" href="<?= base_url() . 'index.php/m_user/editUser?id=' . $user->id ?>">Edit</a>
                                        <a class="btn btn-danger btn-rounded" id="deleteUserBtn" href="<?= base_url() . 'index.php/m_user/Delete?id=' . $user->id ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php  }   ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editUserForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" id="editcloseUserIcon">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit User </h4>
                    <small class="font-bold">Please enter the new details </small>
                </div>
                <div class="modal-body">
                    <small>Select the User role </small>
                    <select class="form-control m-b" name="account" id="account">
                        <option value="1">Admin</option>
                        <option value="2">Standard User</option>
                    </select>

                    <input type="hidden" placeholder="id" id="userId" name="userId">
                    <div class="form-group"><label>First Name</label> <input type="text" placeholder="Enter your First Name" id="firstname" name="firstname" class="form-control"></div>
                    <div class="form-group"><label>Last Name </label> <input type="text" placeholder="Enter your Last Name" id="lastname" name="lastname" class="form-control"></div>
                    <div class="form-group"><label>Email </label> <input type="email" placeholder="Enter your Email" id="email" name="email" class="form-control"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal" id="editcloseUserModal">Close</button>
                    <button type="button" class="btn btn-primary" id="editUserSubmitBtn">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--edit user end  -->
<!-- Add new user start  -->

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
                    <div class="form-group"><label>Email </label> <input type="email" placeholder="Enter your Email" id="addEmail" name="addEmail" class="form-control"></div>
                    <div class="form-group"><label>Password </label> <input type="Password" placeholder="Enter your Password" id="addPass" name="addPass" class="form-control"></div>
                    <div class="form-group"><label>Retype Password </label> <input type="Password" placeholder="Please retype Password" id="retype" name="retype" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal" id='closeUserModal'>Close</button>
                    <button type="button" id="addUserData" class="btn btn-primary">Save changes</button>

                </div>
            </div>
        </form>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('.footable').footable();

        $("#addRole").prop("selectedIndex", -1);

        $('#myModal').on('show.bs.modal', function(e) {
            var userObj = $(e.relatedTarget).data('user-obj');
            var userArray = userObj.split(',');
            $(e.currentTarget).find('input[name="userId"]').val(userArray[0]);
            $(e.currentTarget).find('select[name="account"]').val(userArray[1]);
            $(e.currentTarget).find('input[name="firstname"]').val(userArray[2]);
            $(e.currentTarget).find('input[name="lastname"]').val(userArray[3]);
            $(e.currentTarget).find('input[name="email"]').val(userArray[4]);
        });

        $("#editUserSubmitBtn").click(function() {
            $("#editUserSubmitBtn").attr('disabled', true);
            // console.log($("#editUserForm").serialize());
            $.ajax({
                url: "<?= base_url() . 'index.php/m_user/editUser' ?>",
                data: $("#editUserForm").serialize(),
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        $("#editUserSubmitBtn").attr('disabled', false);

                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                showMethod: 'slideDown',
                                timeOut: 2000
                            };
                            toastr.warning('User updated successfully');
                            $('#myModal').modal('hide');
                        }, 0);

                    } else {
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                showMethod: 'slideDown',
                                timeOut: 2000
                            };

                            toastr.error('User updated failed');
                        }, 0);
                    }
                }
            });
        });

        $('#editcloseUserModal').click(function() {
            location.reload();
        })

        $('#editcloseUserIcon').click(function() {
            location.reload();
        })




        // add user 
        $('#addUserModal').on('show.bs.modal', function(e) {
            resetAddFormValues();
        });

        $('#closeUserModal').click(function() {
            location.reload();
        })

        $('#closeModalIcon').click(function() {
            location.reload();
        })
    });

    $("#addUserData").click(function() {
        $("#addUserData").attr('disabled', true);
        $.ajax({
            url: "<?= base_url() . 'index.php/m_user/addUser' ?>",
            data: $("#addUserForm").serialize(),
            method: 'post',
            dataType: 'json',
            success: function(data) {
                if (data == 1) {
                    $("#addUserData").attr('disabled', false);
                    resetAddFormValues();
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            showMethod: 'slideDown',
                            timeOut: 2000
                        };
                        toastr.success('User added successfully');
                        location.reload();

                    }, 0);
                } else {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            showMethod: 'slideDown',
                            timeOut: 2000
                        };
                        toastr.error('User added failed');
                    }, 0);
                }
            }
        });
    });

    function resetAddFormValues() {
        $('#addRole').val(0);
        $('#addFname').val('');
        $('#addLname').val('');
        $('#addEmail').val('');
        $('#addPass').val('');
        $('#retype').val('');
    }
</script>