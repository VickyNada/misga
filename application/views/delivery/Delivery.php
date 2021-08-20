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
                <strong>Ongoing Delivery</strong>
            </li>
        </ol>
    </div>
</div>

<!-- main Page  -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of Ongoing Deliveries</h5>
                    <a><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#adddelmodel" id="addBtn"><i class="fa fa-plus-circle"></i> New Delivery</button></a>
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
                                <th>Delivery Id</th>
                                <th>Delivery Date</th>
                                <th>Driver Id</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Customer Delivery Address</th>
                                <th>Customer Contact No</th>
                                <th>Land Marks/Additional info</th>
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

<!-- Add discount modal  -->
<div class="modal inmodal" id="adddelmodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="adddelform">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon" onClick="window.location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">New Delivery</h4>
                    <small class="font-bold">Please enter New Delivery info here</small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="" id="doid" name="doid">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" placeholder="" id="ddid" name="ddid">  
                            <div class="form-group"><label>Driver Name</label>
                                    <select class="form-control" name="Dname" id="Dname">   
                                    <option value="" disabled selected>Select Driver</option>                       
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group"><label>Order Id</label>
                                    <select class="form-control" name="Dorder" id="Dorder">   
                                    <option value="" disabled selected>Select Order Id</option>                       
                                    </select>
                            </div>
                        </div>
                            <div class="col-lg-8">
                                <div class="form-group"><label>Customer Name</label><input readonly="true" type="text" placeholder="" id="Dcusname" name="Dcusname" class="form-control"></div>
                            </div>
                        </div>
                    
                    <div class="form-group"><label>Delivery Address</label><input type="text" placeholder="" id="Daddress" name="Daddress" class="form-control"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><label>Mobile Number</label><input type="text" placeholder="" id="Dmobile" name="Dmobile" class="form-control"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><label>Delivery Date</label><input type="date" placeholder="" id="Ddate" name="Ddate" class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Land Marks/Additional info</label><input type="text" placeholder="" id="Daddinfo" name="Daddinfo" class="form-control"></div>
                    <div class="row">
                        <div class="col-lg-5">
                        <div class="form-group"><label>Delivery Charges</label><input type="text" placeholder="" id="Dcharg" name="Dcharg" class="form-control"></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group"><label>Delivery Status</label>
                                    <select class="form-control" name="Dsts" id="Dsts">   
                                    <option value="1" selected>In Progress</option>    
                                    <option value="2">Delivered</option>                 
                                    </select>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button id='closediscountmodel' class="btn btn-primary " data-dismiss="modal" type="button" onClick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
                    <button id="adddelBtn" class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('.footable').footable();
        getDeliveryData();
        page();

        // Insert Form data
        $("#adddelform").validate({
                rules: {
                    Dname: {
                        required: true,
                    },

                    Dorder: {
                        required: true,
                    },
                    Daddress:{
                        required: true,
                    },
                    Ddate:{
                        required:true,
                    },

                },
                messages:{
                    Dname: {
                        min: "Driver name is required",
                    },
                    Dorder: {
                        min: "Order Id is required",
                    },
                    Daddress: {
                        min: "Delivery address is required",
                    },
                    Ddate: {
                        min: "Delivery date is required",
                    },
                },
                submitHandler: function(form) {
                    var data = {
                        'Dorderid': $('#Dorderid').val(),
                        'Dname': $('#Dname').val(),
                        'Dorder': $('#Dorder').val(), 
                        'Ddate': $('#Ddate').val(), 
                        'Dcusname': $('#Dcusname').val(),  
                        'Daddress': $('#Daddress').val(),   
                        'Dmobile':   $('#Dmobile').val(),
                        'Daddinfo'      :  $('#Daddinfo').val(), 
                        'Dcharg': $('#Dcharg').val(), 
                        'Dsts': $('#Dsts').val(),   
                    };
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url() . 'index.php/delivery/insert_delivery' ?>",
                        data: data,
                        success: function(response) {
                            getDeliveryData();
                            $('#adddelmodel').modal('hide');
                            swal ( "Success" ,  "Delivery Record added successfully!" ,  "success" )
                        }
                    })
                }
            });

    });

 // get all Delivery Record data on page load 
 function getDeliveryData() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/delivery/getDeliveryData' ?>",
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



    // Fetch Driver Name  
    $('#addBtn').on('click',function(){ 
             var $dropdown = $("#Dname");
                $dropdown.empty();
                $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                // $("#addIdesc").val("");
             $.ajax({
                 method: "GET",
                 url: "<?= base_url() . 'index.php/delivery/get_driver_name' ?>",
                 success: function(response) {
                     var rList = jQuery.parseJSON(response);
                     for (let i = 0; i < rList.length; i++) {
                         var res_id        = rList[i].id;
                         var res_f_name  = rList[i].firstname;
                         var res_L_name  = rList[i].lastname;
                         var res_full_name = res_f_name.concat(" ").concat(res_L_name);
                        //  var itemDesc = itemList[i].description;
                         // var name = itemCode.concat(itemDesc);
                         var name = res_full_name;
                         var id = rList[i].id;
                         // alert (name);
                         $dropdown.append($("<option />").val(id).text(name));

                     }
                 }
            });  
        });

    // Fetch Completed Orders  
    $('#addBtn').on('click',function(){ 
             var $dropdown = $("#Dorder");
                $dropdown.empty();
                $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                // $("#addIdesc").val("");
             $.ajax({
                 method: "GET",
                 url: "<?= base_url() . 'index.php/delivery/get_com_order_list' ?>",
                 success: function(response) {
                     var rList = jQuery.parseJSON(response);
                     for (let i = 0; i < rList.length; i++) {
                         var res_id        = rList[i].order_id;
                         var res_cus_name  = rList[i].id;
                        //  var res_full_name = res_f_name.concat(" ").concat(res_L_name);
                        //  var itemDesc = itemList[i].description;
                        // var name = itemCode.concat(itemDesc);
                         var name = res_id;
                         var id = rList[i].id;
                         // alert (name);
                         $dropdown.append($("<option />").val(name).text(name));
                         
                     }
                 }
            });  
        });

    //Fetch Batch # After changing the Item Code 
    $("#Dorder").change(function(e){
                var $dropdown = $("#Dcusname");
                    $dropdown.empty();
                    // $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                    // $("#AWqty").val("");
                $.ajax({
                    url: 'http://localhost/misga-local/index.php/delivery/get_cus_name/'+ e.target.value,
                    method: 'get',
                    datatype: 'json',
                    success: function(response){
                    console.log(response)
                    const items = JSON.parse(response);
                    items?.map(function(order_consumers,index){
                        var fname = (order_consumers.firstname);
                        var lname = (order_consumers.lastname);
                        var full = fname.concat(" ").concat(lname);
                        $("#Dcusname").val(full);
                        })
                    }
                });
            }); 


        // Complete the Payment 
        function payDelivery(delivery_id, pay_status) {
        $.ajax({
        method: "GET",
        url: "<?= base_url() . 'index.php/delivery/payDelivery' ?>",
        data: {
        "delivery_id": delivery_id,
        "pay_status": pay_status
        },
        success: function(response) {
            getDeliveryData();
        }
        });
        }

         // Complete the Delivery 
         function comDelivery(delivery_id, del_status) {
        $.ajax({
        method: "GET",
        url: "<?= base_url() . 'index.php/delivery/comDelivery' ?>",
        data: {
        "delivery_id": delivery_id,
        "del_status": del_status
        },
        success: function(response) {
            getDeliveryData();
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