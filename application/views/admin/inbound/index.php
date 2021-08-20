<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Customer</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Add Entires</h5>
                </div>
                <div class="ibox-content">
                    <form id="addItem">
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Select Farmer</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="farmer_id" id="farmer_id">
                                    <?php foreach ($farmerinfo as $item) { ?>
                                        <option value="<?= $item->id; ?>"><?= $item->first_name . ' ' . $item->last_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Select Item</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="item_id" id="item_id">
                                    <?php foreach ($iteminfo as $item) { ?>
                                        <option value="<?= $item->id; ?>"><?= $item->itemname; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Select Unit</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="item_unit" id="item_unit">
                                    <option value="0" selected='selected'>Please Select</option>
                                    <?php

                                    foreach ($unit as $row) {
                                        echo '<option value ="' . $row["unitname"] . '" > ' . $row["unitname"] . ' </option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Quantity</label>
                            <div class="col-lg-10"><input type="text" name="quantity" id="quantity" value="" placeholder="Quantity" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Unit Price</label>
                            <div class="col-lg-10"><input type="text" name="unitprice" id="unitprice" value="" placeholder="Unit Price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Total Price </label>
                            <div class="col-lg-10"><input type="text" disabled name="totalprice" id="totalprice" value="" placeholder="Total Price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-sm btn-primary" id="addItemBtn">Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Item List</h5>
                </div>
                <div class="ibox-content">
                    <div class="jqGrid_wrapper">
                        <table id="table_list_1"></table>
                        <div id="pager_list_1"></div>
                    </div>
                    <br>
                    <div class="row text-left">
                        <div class="col">
                            <div class=" m-l-md">
                                <span class="h5 font-bold m-t block" id="noiText">0</span>
                                <small class="text-muted m-b block">Number Of Items</small>
                            </div>
                        </div>
                        <div class="col">
                            <span class="h5 font-bold m-t block" id="totalQuantityText">0</span>
                            <small class="text-muted m-b block">Toatl Quantity</small>
                        </div>
                        <div class="col">
                            <span class="h5 font-bold m-t block" id="totalPriceText">0</span>
                            <small class="text-muted m-b block">Total Price</small>
                        </div>

                    </div>
                    <br>
                    <div>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-danger" id="printonly">Print Preview</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="res"></div>

<script>
    $(document).ready(function() {
        var mydata = [];

        loadGrid();

        $("#addItem").validate({
            rules: {
                farmer_id: {
                    required: true,
                },
                item_id: {
                    required: true,
                },

                item_unit: {
                    required: true,
                },
                quantity: {
                    required: true,
                    number: true
                },
                unitprice: {
                    required: true,
                    number: true
                },

                totalprice: {
                    required: true,
                    number: true
                },
            },

            submitHandler: function(form) {
                var farmer_id = $("#farmer_id").val();
                var farmer_name = $("#farmer_id").find(":selected").text();
                var item_id = $("#item_id").val();
                var item_name = $('#item_id').find(":selected").text();
                var item_unit = $("#item_unit").val();
                var item_quantity = $("#quantity").val();
                var item_unitprice = $("#unitprice").val();
                var item_totalprice = $("#totalprice").val();

                mydata.push({
                    id: mydata.length + 1,
                    item_id: item_id,
                    item_name: item_name,
                    unit: item_unit,
                    quantity: item_quantity,
                    amount: item_unitprice,
                    totalamount: item_totalprice,
                    farmer_id: farmer_id
                });
                $("#table_list_1").jqGrid('GridUnload');
                loadGrid(mydata);

                var totalPrice = 0;
                $.each(mydata, function(i, row) {
                    totalPrice += parseFloat(row.totalamount);
                });

                var totalQuantity = 0;
                $.each(mydata, function(i, row) {
                    totalQuantity += parseFloat(row.quantity);
                });

                $("#noiText").text(mydata.length);
                $("#totalQuantityText").text(totalQuantity);
                $("#totalPriceText").text(totalPrice);
            }
        });



        $("#quantity").blur(function() {
            var totPrice = $('#unitprice').val() * $('#quantity').val();
            $('#totalprice').val(totPrice);
        })

        $("#unitprice").blur(function() {
            var totPrice = $('#unitprice').val() * $('#quantity').val();
            $('#totalprice').val(totPrice);
        })


        $("#printonly").click(function() {
            window.localStorage.setItem('tableData', JSON.stringify(mydata));
            window.location.href = "<?= base_url() . 'index.php/inbound/generateInvoice' ?>";
        });

    });

    function loadGrid(mydata) {
        $("#table_list_1").jqGrid({
            data: mydata,
            datatype: "local",
            height: 250,
            autowidth: true,
            shrinkToFit: true,
            rowNum: 14,
            rowList: [10, 20, 30],
            colNames: ['Item No', 'Item Name', 'Unit', 'Quantity', 'Value', 'Total Value'],
            colModel: [{
                    name: 'id',
                    index: 'id',
                    width: 30,
                    sorttype: "int"
                },
                {
                    name: 'item_name',
                    index: 'item',
                    width: 100
                },
                {
                    name: 'unit',
                    index: 'unit',
                    width: 40
                },
                {
                    name: 'quantity',
                    index: 'quantity',
                    width: 40,
                    align: "right",
                    sorttype: "float",
                    formatter: "number"
                },
                {
                    name: 'amount',
                    index: 'amount',
                    width: 80,
                    align: "right",
                    sorttype: "float"
                },
                {
                    name: 'totalamount',
                    index: 'totalamount',
                    width: 80,
                    align: "right",
                    sorttype: "float"
                },
            ],
            pager: "#pager_list_1",
            viewrecords: true,
            hidegrid: false
        });
    }
</script>