<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card ">
            <h4 class="card-header">Item Registration</h4>
            <div class="card-body">
                <form>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Item Code</label>
                            <input id="item-code" type="text" placeholder="Iteme Code" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Item Name</label>
                            <input id="item-name" type="text" placeholder="Item Name" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Vehicle Vendor</label>
                            <select class="form-control form-control-sm" id="select-vendor">
                                <option class="form-control form-control-sm">Choose Job Role</option>
                                <option class="form-control form-control-sm">Toyota</option>
                                <option class="form-control form-control-sm">Nissan</option>
                                <option class="form-control form-control-sm">Honda</option>
                                <option class="form-control form-control-sm">Suzuki</option>
                                <option class="form-control form-control-sm">Daihatsu</option>
                                <option class="form-control form-control-sm">Mazda</option>
                                <option class="form-control form-control-sm">Mitsubishi</option>
                            </select>
                        </div>            
                        <div class="form-group col-6">
                            <label>Vehicle Type</label>
                            <select class="form-control form-control-sm" id="select-type">
                                <option class="form-control form-control-sm">Choose Basic Salary</option>
                                <option class="form-control form-control-sm">Sedan</option>
                                <option class="form-control form-control-sm">Hutchback</option>
                                <option class="form-control form-control-sm">SUV</option>
                                <option class="form-control form-control-sm">Mini SUV</option>
                                <option class="form-control form-control-sm">Van</option>
                                <option class="form-control form-control-sm">Jeep</option>
                                <option class="form-control form-control-sm">Lorry</option>
                            </select>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Vehicle Model Name</label>
                            <input id="item-model" type="text" placeholder="Vehicle Model" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Year</label>
                            <input id="item-year" type="text" placeholder="Manufacture Year" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Qty</label>
                            <input id="item-qty" type="text" placeholder="Quantity" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-6">
                            <label>Container ID</label>
                            <input id="item-contID" type="text" placeholder="Container ID" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Unit Price</label>
                            <input id="item-unitPrice" type="text" placeholder="Unit Price" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Unit Bulk Price</label>
                            <input id="item-unitBulk" type="text" placeholder="Bulk Price" class="form-control form-control-sm" readonly="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Selling Price</label>
                            <input id="item-sellPrice" type="text" placeholder="Selling Price" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Selling Bulk Price</label>
                            <input id="item-sellBulk" type="text" placeholder="Bulk Price" class="form-control form-control-sm" readonly="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Net Profit</label>
                            <input id="item-profit" type="text" placeholder="Profit" class="form-control form-control-sm" readonly="true">
                        </div> 
                        <div class="form-group col-6">
                            <label>Date</label>
                            <input id="item-date" type="text" placeholder="Date" class="form-control form-control-sm" readonly="true">
                        </div>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-danger" id="btn-item-clear">Clear</a>
                        <a href="#" class="btn btn-primary" id="btn-item-save">Save Here</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Recently Registered Items</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="item-rec-list">


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card ">
            <h4 class="card-header">New Shipment Record</h4>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Shipping From</label>
                            <input id="ship-from" type="text" placeholder="Japan-Tokoyo" class="form-control form-control-sm">
                        </div>            
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Shipped Person</label>
                            <select class="form-control form-control-sm" id="ship-person">
                                <option class="form-control form-control-sm">Choose Shipping Person</option>
                                <option class="form-control form-control-sm">Anuruddha Bandara</option>
                            </select>
                        </div>            
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Container ID</label>
                            <input id="ship-contid" type="text" placeholder="" class="form-control form-control-sm">
                        </div>            
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Shipped Date</label>
                            <input id="ship-date" type="text"  class="form-control form-control-sm">
                        </div>            
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Released Date</label>
                            <input id="ship-release"  type="text" class="form-control form-control-sm">
                        </div>            
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Payment</label>
                            <input id="ship-payment" type="text" placeholder="00.00" class="form-control form-control-sm">
                        </div>            
                    </div>

                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-danger" id="btn-ship-clear">Clear</a>
                        <a href="#" class="btn btn-primary" id="btn-ship-save">Save Here</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Salary Advance History</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" style="overflow-y:scroll;height: 200px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Shipping From</th>
                                <th>Shipper</th>
                                <th>Container ID</th>
                                <th>Released Date</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="ship-list">


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Shipping From</th>
                                <th>Shipper</th>
                                <th>Container ID</th>
                                <th>Released Date</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'base/footer.php';
?> 
<script>
    //Set Date
    $(document).ready(function() {
        var today = new Date();
        var date = today.getDate();

        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        if (date < 10)
        {
            date = '0' + date;
        }

        if (month < 10)
        {
            month = '0' + month;
        }
        today = year + '-' + month + '-' + date;
        $("#item-date").val(today);

    });
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn-ship-save", function() {
            var shipFrom = $("#ship-from").val();
            var shipPer = $("#ship-person").val();
            var shipContid = $("#ship-contid").val();
            var shipDate = $("#ship-date").val();
            var shipRelea = $("#ship-release").val();
            var shipPay = $("#ship-payment").val();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    shipFrom: shipFrom,
                    shipPer: shipPer,
                    shipContid: shipContid,
                    shipDate: shipDate,
                    shipRelea: shipRelea,
                    shipPay: shipPay,
                    path: 'saveShipmentRecorde'
                },
                success: function(data) {
                    alert(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn-item-save", function() {
            var code = $("#item-code").val();
            var name = $("#item-name").val();
            var vendor = $("#select-vendor").val();
            var type = $("#select-type").val();
            var model = $("#item-model").val();
            var year = $("#item-year").val();
            var qty = $("#item-qty").val();
            var contID = $("#item-contID").val();
            var untPrice = $("#item-unitPrice").val();
            var untBlk = $("#item-unitBulk").val();
            var slPrice = $("#item-sellPrice").val();
            var slBulk = $("#item-sellBulk").val();
            var profit = $("#item-profit").val();
            var date = $("#item-date").val();

            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    code: code,
                    name: name,
                    vendor: vendor,
                    type: type,
                    model: model,
                    year: year,
                    qty: qty,
                    contID: contID,
                    untPrice: untPrice,
                    untBlk: untBlk,
                    slPrice: slPrice,
                    slBulk: slBulk,
                    profit: profit,
                    date: date,
                    path: 'ItemRegistration'
                },
                success: function(data) {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    $(document).on("input", "#item-unitPrice", function() {
        var qty = parseInt($("#item-qty").val());
        var unitPrice = parseFloat($("#item-unitPrice").val());
        var tot = qty * unitPrice;
        $("#item-unitBulk").val(tot);
    });
    $(document).on("input", "#item-sellPrice", function() {
        var qty = parseInt($("#item-qty").val());
        var unitPrice = parseFloat($("#item-sellPrice").val());
        var tot = qty * unitPrice;
        $("#item-sellBulk").val(tot);
    });
    $(document).on("input", "#item-sellPrice", function() {
        var unitBulk = parseInt($("#item-unitBulk").val());
        var sellBullk = parseFloat($("#item-sellBulk").val());
        var tot = sellBullk - unitBulk;
        $("#item-profit").val(tot);
    });
</script>
<script>
    //Load Recent Item Registrations
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'loadRecentRegistration'
            },
            success: function(data) {
                $("#item-rec-list").html(data);
            }});
    });
</script>
<script>
    //Load ShipmentRecords
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'loadRecentShipment'
            },
            success: function(data) {
                $("#ship-list").html(data);
            }});
    });
</script>