<!-- Menu Path Section -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Inventory Wastage</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url() . 'index.php/dashboard/index' ?>">Home</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>Inventory Management</strong>
            </li>
            <li class="breadcrumb-item active">
                Inventory Wastage
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
                    <h5>List of Inventory Wastage Records</h5>
                    <a href="http://localhost/misga/index.php/inventory/wastageReason"><button type="button" style=" float: right; margin-top: -5px;" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addWastageModal" id="addBtn"><i class="fa fa-plus-circle"></i> Wastage Reason</button></a>
                    <a><button type="button" style=" float: right; margin-top: -5px; margin-right: 10px" 
                            class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#addWastageModal" 
                            id="addBtn2"><i class="fa fa-plus-circle"></i> New Transaction</button></a>
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
                                <th>Internal id</th>
                                <th>Wastage ID</th>
                                <th>Wastage Reason</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Batch #</th>
                                <th>Qty</th>
                                <th>Unit Cost</th>
                                <th>Total Cost</th>
                                <th>Remarks</th>
                                <th>Created Date</th>
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

<!-- Add Reason modal  -->
<div class="modal inmodal" id="addWastageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <form id="addWastageForm">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModalIcon" onClick="window.location.reload();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">New Wastage</h4>
                    <small class="font-bold">Please enter the Wastage info here</small>
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="" id="woid" name="woid">
                    <div class="form-group"><label>Order Id</label><input readonly="true" type="text" placeholder="" id="Worderid" name="Worderid" class="form-control"></div>
                    <div class="form-group"><label>Wastage Reason</label>
                        <select class="form-control" name="Wreason" id="Wreason">   
                        <option value="" disabled selected>Select Reason Code</option>                       
                        </select>
                    </div>
                    <div class="form-group"><label>Item Code</label>
                        <select class="form-control" name="WitemCode" id="WitemCode">   
                        <option value="" disabled selected>Select Item Code</option>                       
                        </select>
                    </div>
                    <div class="form-group"><label>Item Description</label><input readonly="true" type="text" placeholder="" id="Witemdesc" name="Witemdesc" class="form-control"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><label>Select Batch No</label>
                                <select class="form-control" name="Wbatch" id="Wbatch">   
                                    <option value="" disabled selected>Select Batch No</option>                       
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group"><label>Available Quantity</label>
                                <input readonly="true" type="number" placeholder="" id="AWqty" name="AWqty" step=".01" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Quantity</label><input type="number" placeholder="Watage Qty" id="Wqty" name="Wqty" max="0.00" step=".01" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                            <div class="form-group"><label>Cost</label><input readonly="true" value="" type="number" placeholder="" id="Wcost" name="Wcost" min="0" value="0" step=".01" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                            <div class="form-group"><label>Total Amount</label><input readonly="true" type="number" placeholder="" id="Wtotal" name="Wtotal" step=".01" class="form-control"></div>
                            </div>
                        </div>
                        <input type="hidden" placeholder="" id="Remqty" name="Remqty" step=".01">
                        <input type="hidden" placeholder="" id="Remval" name="Remval" step=".01">
                    </div>
                    <div class="form-group"><label>Remarks</label><input type="text" placeholder="Enter Additional Remarks here" id="Wremarks" name="Wremarks" class="form-control"></div>
                    <!-- <div class="form-group"><input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" id="addCurrentdate" name="addCurrentdate" class="form-control"></div> -->
                </div>
                <div class="modal-footer">
                    <button id='closeWastageModal' class="btn btn-primary " data-dismiss="modal" type="button" onClick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
                    <button id="addWastageBtn" class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.footable').footable();
        // Fetch all user data on page load call here 
        getWastageData();
        page();

        // Insert Form data
        $("#addWastageForm").validate({
                rules: {
                    Wreason: {
                        required: true,
                    },

                    WitemCode: {
                        required: true,
                    },
                    Wqty:{
                        required: true,
                    }

                },
                messages:{
                    addWcode: {
                        min: "Reason Code is required",
                    },
                    addWdesc: {
                        min: "Reason Description is required",
                    },
                },
                submitHandler: function(form) {
                    var data = {
                        'woid': $('#woid').val(),
                        'Worderid': $('#Worderid').val(),
                        'Wreason': $('#Wreason').val(), 
                        'WitemCode': $('#WitemCode').val(),  
                        'Witemdesc': $('#Witemdesc').val(),   
                        'Wbatch':   $('#Wbatch').val(),
                        'Wqty'      :  $('#Wqty').val(), 
                        'Wcost': $('#Wcost').val(), 
                        'Wtotal': $('#Wtotal').val(),   
                        'Wremarks': $('#Wremarks').val(), 
                        'Remqty': $('#Remqty').val(), 
                        'Remval': $('#Remval').val(), 
                    };
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url() . 'index.php/inventory/addWastage' ?>",
                        data: data,
                        success: function(response) {
                            getWastageData();
                            $('#addWastageModal').modal('hide');
                            swal ( "Success" ,  "Wastage Reason added successfully!" ,  "success" )
                        }
                    })
                }
            });

    });

    // Fetch next number and Transfer to Order Id field
    $("#addBtn2").on('click',function(){ 
        var $dropdown = $("#woid");
        $dropdown.empty();
        $.ajax({
            url: 'http://localhost/misga/index.php/inventory/get_next_num/',
            method: 'get',
            datatype: 'json',
            success: function(response){
            console.log(response)
            const items = JSON.parse(response);
            items?.map(function(nextnumber,index){
                $("#woid").val(parseInt(nextnumber.CurrentNumber)+1);
                $("#Worderid").val('WO-'+nextnumber.CurrentNumber);
            })
            }
        });
    });
    // Fetch Wastage Reason Code  
    $('#addBtn2').on('click',function(){ 
             var $dropdown = $("#Wreason");
                $dropdown.empty();
                $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                // $("#addIdesc").val("");
             $.ajax({
                 method: "GET",
                 url: "<?= base_url() . 'index.php/inventory/get_was_res_code' ?>",
                 success: function(response) {
                     var rList = jQuery.parseJSON(response);
                     for (let i = 0; i < rList.length; i++) {
                         var resCode        = rList[i].wastageReason;
                         var resDesc  = rList[i].Description;
                         var resConcat = resCode.concat(" - ").concat(resDesc);
                        //  var itemDesc = itemList[i].description;
                         // var name = itemCode.concat(itemDesc);
                         var name = resCode;
                         var id = rList[i].id;
                         // alert (name);
                         $dropdown.append($("<option />").val(name).text(resConcat));
                     }
                 }
            });  
        });

    // Fetch Item Code 
    $('#addBtn2').on('click',function(){ 
             var $dropdown = $("#WitemCode");
                $dropdown.empty();
                $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                $("#Witemdesc").val("");
                $("#Wqty").val("");
                $("#Wbatch").val("");
                $("#AWqty").val("");
                $("#Wcost").val("");
                $("#Wtotal").val("");
                $("#Wremarks").val("");
                $("#Remqty").val("");
                $("#Remval").val("");
             $.ajax({
                 method: "GET",
                 url: "<?= base_url() . 'index.php/inventory/getitemDetails' ?>",
                 success: function(response) {
                     var rItem = jQuery.parseJSON(response);
                     for (let i = 0; i < rItem.length; i++) {
                         var itemCode    = rItem[i].Itemcode;
                         var itemDesc    = rItem[i].itemname;
                         var name2 = itemCode.concat(" - ").concat(itemDesc);
                         var name = itemCode;
                         var id = rItem[i].id;
                         // alert (name);
                         $dropdown.append($("<option />").val(name).text(name2));
                     }
                 }
            });  
        });
    //Fetch Batch # After changing the Item Code 
    $("#WitemCode").change(function(e){
            var $dropdown = $("#Wbatch");
                $dropdown.empty();
                $dropdown.append(("<option")+(" ")+("disabled selected>")+("</option>"));
                $("#AWqty").val("");
                $("#Wqty").val("");
                $("#Wcost").val("");
                $("#Wtotal").val("");
                $("#Wremarks").val("");
            $.ajax({
                url: 'http://localhost/misga/index.php/inventory/get_item_batch/'+ e.target.value,
                method: 'get',
                datatype: 'json',
                success: function(response){
                console.log(response)
                const items = JSON.parse(response);
                items?.map(function(item,index){
                    $dropdown.append($("<option />").val(item.batchno).text(item.batchno));
     
                })
                }
            });
        });
    // Fetch Item Description after changing item 
    $("#WitemCode").change(function(e){
            var $dropdown = $("#Witemdesc");
            $dropdown.empty();
            $.ajax({
                url: 'http://localhost/misga/index.php/inventory/get_item_desc/'+ e.target.value,
                method: 'get',
                datatype: 'json',
                success: function(response){
                console.log(response)
                const items = JSON.parse(response);
                items?.map(function(item,index){
                    $("#Witemdesc").val(item.itemname);
                })
                }
            });
        });
    // Fetch Item batch qty and cost after changing item 
    $("#Wbatch").change(function(e){
            var $dropdown = $("#AWqty");
                $dropdown.empty();
            $.ajax({
                url: 'http://localhost/misga/index.php/inventory/get_item_batch_qty/'+ e.target.value,
                method: 'get',
                datatype: 'json',
                success: function(response){
                console.log(response);
                const items = JSON.parse(response);
                items?.map(function(item,index){
                    $("#AWqty").val(item.quantity);
                    $("#Wcost").val(item.unit_price);
                })
                }
            });
        });




    // Calculate Total Amount  
    $("#Wqty").change(function(e){
        var qty   = parseFloat($("#Wqty").val());
        var cost  = parseFloat($("#Wcost").val());
        var total = (qty * cost);
        $('#Wtotal').val(parseFloat(total).toFixed(2));        
    });
    // Calculate Remaning Qty and Amount  
    $("#Wqty").change(function(e){
        var availableqty = parseFloat($("#AWqty").val());
        var qty          = parseFloat($("#Wqty").val());
        var cost         = parseFloat($("#Wcost").val());
        var total        = parseFloat($("#Wtotal").val());
        var avavalue     = (availableqty*cost)
        var remqty       = (availableqty+(qty));
        var remval       = (avavalue+(total));
        $('#Remqty').val(parseFloat(remqty).toFixed(2));    
        $('#Remval').val(parseFloat(remval).toFixed(2));     
    });





    // get all Wastage Record data on page load 
    function getWastageData() {
        $(".ibox-content-loader").css("display", "block");
        $(".ibox-content").css("display", "none");
        $.ajax({
            method: "GET",
            url: "<?= base_url() . 'index.php/inventory/getWastageData' ?>",
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
            url: "<?= base_url() . 'index.php/inventory/page' ?>",
            success: function(result) {
                $(".page").html(result);
            }
        });
    }

</script>