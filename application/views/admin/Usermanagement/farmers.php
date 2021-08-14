<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Farmers</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Farmers Management</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Farmers</h5>
                    <!-- <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addUserModal" id="addBtn"><i class="fa fa-plus-circle"></i> Add user</button></a> -->
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
                                <th>Farm Name</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Edit User</th>
                                <th id="deleteSort">Delete User</th>
                                <th>User Status</th>
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

<script>
    $(document).ready(function() {
        $('.footable').footable();
        // Fetch all user data on page load call here 
        getAlluserData(4);
        page();
    });

    // Block the user 
    function blockUser(id, status) {
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/consumer/blockUserData' ?>",
            data: {
                "id": id,
                "status": status
            },
            success: function(response) {
                getAlluserData(4);
            }
        });
    }

    // get all user data on page load 
    function getAlluserData(farmerRole) {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            data: {roleId : farmerRole},
            url: "<?= base_url() . 'index.php/consumer/getAlluserData' ?>",
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
                url: "<?= base_url() . 'index.php/consumer/deleteUserData' ?>",
                data: {
                    "id": id
                },
                success: function(response) {
                    swal("Deleted!", "User has been deleted.", "success");
                    getAlluserData(4);
                }
            });
        });
    }

    function page() {
        $.ajax({
            url: "<?= base_url() . 'index.php/usermanagement/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }
</script>