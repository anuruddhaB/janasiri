<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Stock Refilling</h4>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                        <input id="item-code-search" type="text" placeholder="Search Item Code Here...." class="form-control ">
                    </div>            
                </div>
                <form>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Item Code</label>
                            <input id="item-code" type="text" placeholder="Iteme Code" class="form-control form-control-sm" disabled="true">
                        </div>            
                        <div class="form-group col-6">
                            <label>Item Name</label>
                            <input id="item-name" type="text" placeholder="Item Name" class="form-control form-control-sm" disabled="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Vehicle Model Name</label>
                            <input id="item-model" type="text" placeholder="Vehicle Model" class="form-control form-control-sm" disabled="true">
                        </div>            
                        <div class="form-group col-6">
                            <label>Year</label>
                            <input id="item-year" type="text" placeholder="Manufacture Year" class="form-control form-control-sm" disabled="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Qty</label>
                            <input id="item-qty" type="text" placeholder="Quantity" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-6">
                            <label>Container ID</label>
                            <input id="item-contid" type="text" placeholder="Container ID" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Unit Price</label>
                            <input id="item-unitPrice" type="text" placeholder="Unit Price" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Unit Bulk Price</label>
                            <input id="item-unitBulk" type="text" placeholder="Bulk Price" class="form-control form-control-sm" disabled="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Selling Price</label>
                            <input id="item-sellPrice" type="text" placeholder="Selling Price" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Selling Bulk Price</label>
                            <input id="item-sellBulk" type="text" placeholder="Bulk Price" class="form-control form-control-sm" disabled="true">
                        </div>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-primary" id="btn-item-new">New Item</a>
                        <a href="#" class="btn btn-danger" id="btn-item-clear">Clear</a>
                        <a href="#" class="btn btn-primary" id="btn-item-refill">Save Here</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Item Quantity Filter</h4>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                        <input id="item-qty-search" type="text" placeholder="Search Quantity Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="stock-qty-tbl">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="item-quantity-filter">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
<div class="row">
    
</div>
<?php
require 'base/footer.php';
?> 
<script>
    // Check Container ID Availability
    $(document).ready(function() {
        $(document).on("click", "#btn-item-refill", function(e) {
            var containerID = $('#item-contid').val();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    containerID: containerID,
                    path: 'checkStatus'
                },
                success: function(data) {
                    if (data == "") {

                    } else {
                        alert(data);
                    }
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
    $('#item-code-search').on('keypress', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            var itemCode = $("#item-code-search").val();
            $.ajax({
                url: "class/class_Stock.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    itemCode: itemCode,
                    path: 'setRefillDetails'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function(index) {
                        $('#item-code').val(dataSet[0]);
                        $('#item-name').val(dataSet[1]);
                        $('#item-model').val(dataSet[2]);
                        $('#item-year').val(dataSet[3]);
                    });

                }});
        }
    });
</script>
<script>
    // Refill Stock
    $(document).ready(function() {
        $(document).on("click", "#btn-item-refill", function() {
            var code = $('#item-code').val();
            var qty = $('#item-qty').val();
            var unitPrice = $('#item-unitPrice').val();
            var sellPrice = $('#item-sellPrice').val();
            var containerID = $('#item-contid').val();

            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    code: code,
                    qty: qty,
                    unitPrice: unitPrice,
                    sellPrice: sellPrice,
                    containerID: containerID,
                    path: 'refillStock'
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
    $('#item-qty-search').on('keypress', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            var itemQty = $("#item-qty-search").val();
            $.ajax({
                url: "class/class_Stock.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    itemQty: itemQty,
                    path: 'QuantityFilter'
                },
                success: function(data) {
                    $("#item-quantity-filter").html(data);
                }
            });
        }
    });
</script>
<script>
    $('#btn-item-new').on('click', function(e) {
        location.replace('stock-new.php');
    });
</script>
<script>
    $(document).ready(function(e) {
        $("#stock-qty-tbl").on('click', '#btn-refill', function() {
            var currentRow = $(this).closest("tr");
            var itemCode = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    itemCode: itemCode,
                    path: 'setFromTable'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $('#item-code').val(dataSet[0]);
                    $('#item-name').val(dataSet[1]);
                    $('#item-model').val(dataSet[2]);
                    $('#item-year').val(dataSet[3]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>