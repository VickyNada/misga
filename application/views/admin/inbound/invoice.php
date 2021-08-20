<div class="row wrapper border-bottom white-bg page-heading" id="theHeading">
    <div class="col-lg-8">
        <h2>Invoice</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                Other Pages
            </li>
            <li class="breadcrumb-item active">
                <strong>Invoice</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <a href="#" target="_blank" class="btn btn-primary" id="printbtn"><i class="fa fa-print"></i> Print Invoice </a>
            <a href="#" class="btn btn-danger" id="savebtn"><i class="fa fa-check"></i> Complete Order </a>
        </div>
    </div>
</div>
<div class="row" id="theContent">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Company:</h5>
                        <address>
                            <strong>Krish and Vila.</strong><br>
                            106 Jorg Avenu, 600/10<br>
                            Chicago, VT 32456<br>
                            <abbr title="Phone">P:</abbr> (123) 601-4590
                        </address>
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>Invoice No.</h4>
                        <h4 class="text-navy">INV-000567F7-00</h4>
                        <span>From:</span>
                        <span class="toAddress">

                        </span>
                        <p>
                            <span><strong>Invoice Date:</strong> <?= date("Y/m/d") ?></span><br />
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Unit</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody class="tableBody">

                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

                <table class="table invoice-total">
                    <tbody class="invoice-total-body">

                    </tbody>
                </table>
                <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        var newData = window.localStorage.getItem('tableData');
        getInvoiceData(newData);


        $("#printbtn").click(function() {
            $("#theHeading").css("display", "none");
            window.print();
            $("#theHeading").css("display", "block");
        })


        $("#savebtn").click(function() {
            $.ajax({
                method: "POST",
                url: "<?= base_url() . 'index.php/inbound/saveinvoicedata' ?>",
                data: {
                    "str": newData
                },
                dataType: 'json',
                success: function(response) {
                    alert('svaed');
                }
            })
        })

    });

    function getInvoiceData(newData) {
        $.ajax({
            method: "POST",
            url: "<?= base_url() . 'index.php/inbound/generateinvoicedata' ?>",
            data: {
                "str": newData
            },
            dataType: 'json',
            success: function(response) {
                $(".tableBody").html('');
                $(".tableBody").append(response['dataString']);

                $(".invoice-total-body").html('');
                $(".invoice-total-body").append(response['dataString2']);

                $(".toAddress").html('');
                $(".toAddress").append(response['dataString3']);
            }
        })
    }
</script>