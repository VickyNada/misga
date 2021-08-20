<!-- Menu Path Section -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Delivery</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Manage Delivery</strong>
            </li>
            <li class="breadcrumb-item active">
                <strong>All Delivery</strong>
            </li>
        </ol>
    </div>
</div>

<!-- main Page  -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <!-- <div class="ibox-title">
                    <h5>All Delivery Information</h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#adddelmodel" id="addBtn"><i class="fa fa-plus-circle"></i> New Delivery</button></a>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div> -->

                <div class="ibox-content-loader" style="display: none;">
                    <div class="sk-spinner sk-spinner-pulse"></div>
                </div>

                <div class="ibox-content">
                    <input type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Search in table">
                    <table class="footable table table-stripped" data-page-size="12" data-filter=#filter>
                        <thead>
                            <tr>
                                <th>Delivery Id</th>
                                <th>Delivery Date</th>
                                <th>Driver Id</th>
                                <th>Driver Name</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Delivery Charge</th>
                                <th>Delivery Status</th>
                                <th>Driver Payment</th>
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

<script>
    $(document).ready(function() {
    $('.footable').footable();
        getallDeliveryData();
        page();
    });

 // get all Delivery Record data on page load 
 function getallDeliveryData() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/delivery/getallDeliveryData' ?>",
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

    function page() {
        $.ajax({
        url: "<?= base_url() . 'index.php/delivery/page' ?>",
        success: function(result) {
        $(".page").html(result);
        }
        });
        }      
        


</script>