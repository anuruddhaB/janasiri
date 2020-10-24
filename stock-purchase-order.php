<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card ">
            <h3 class="card-header">Custom Order's</h3>
            <div class="card-body">
                <form>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Order ID</label>
                            <input id="product-order-id" type="text"  class="form-control form-control-sm" disabled>
                        </div>            
                        <div class="form-group col-6">
                            <label>Date</label>
                            <input id="product-order-date" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Customer Name</label>
                            <input id="product-order-customer" type="text"  class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Contact No</label>
                            <input id="product-order-contact" type="text"  class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Manufacturer</label>
                            <input id="product-order-vendor" type="text"  class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-4">
                            <label>Model</label>
                            <input id="product-order-model" type="text"  class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-4">
                            <label>Year</label>
                            <input id="product-order-year" type="text"  class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Name</label>
                            <input id="product-order-name" type="text" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Condition</label>
                            <input id="product-order-condition" type="text" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Advance Payment</label>
                            <input id="product-order-advPayment" type="text"  class="form-control form-control-sm">
                        </div>            

                    </div>


                    <div class="row"> 
                        <div class="form-group col-12">
                            <label >Description/Special Note</label>
                            <textarea class="form-control" id="product-order-descrip" rows="4"></textarea>
                        </div> 

                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-danger" id="btn-item-clear">Clear</a>
                        <a href="#" class="btn btn-success" id="btn-item-clear">Print</a>
                        <a href="#" class="btn btn-primary" id="btn-order-save">Confirm & Pay</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card ">
            <h3 class="card-header">Order Arrival</h3>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Order ID</label>
                            <input id="order-id" type="text"  class="form-control form-control-sm">
                        </div> 
                        <div class="form-group col-6">
                            <label>Order Date</label>
                            <input id="order-date" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Customer Name</label>
                            <input id="order-customer-name" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                        <div class="form-group col-6">
                            <label>Contact No</label>
                            <input id="order-contact" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Arrival Date</label>
                            <input id="order-arrive-date" type="text"  class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Total Payment</label>
                            <input id="order-payment" type="text"  class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-6">
                            <label>Advance Amount</label>
                            <input id="order-advPay" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-12">
                            <label>Balance Amount</label>
                            <input id="order-balance-amount" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-danger" id="btn-item-clear">Clear</a>
                        <a href="#" class="btn btn-primary" id="btn-order-arrival-save">Order Checked In</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Custom Order List-Not Arrived</h5>
            <div class="card-body">
                <a href="class/clas_employePayment.php"></a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="stock-custom-order-tbl">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Customer Name</th>
                                <th>Contact No</th>
                                <th>Advance Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="stock-custom-order-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Customer Name</th>
                                <th>Contact No</th>
                                <th>Advance Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    

</div>
<div class="modal fade" id="orderCancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Custom Order & Refund</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>

<?php
require 'base/footer.php';
?> 
<script>
    //Save Custom Order
    $(document).ready(function() {
        $(document).on("click", "#btn-order-save", function() {
            var orderId = $("#product-order-id").val();
            var date = $("#product-order-date").val();
            var cusName = $("#product-order-customer").val();
            var cusNo = $("#product-order-contact").val();
            var manufac = $("#product-order-vendor").val();
            var model = $("#product-order-model").val();
            var year = $("#product-order-year").val();
            var name = $("#product-order-name").val();
            var condition = $("#product-order-condition").val();
            var advPay = $("#product-order-advPayment").val();
            var descrip = $("#product-order-descrip").val();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    orderId: orderId,
                    date: date,
                    cusName: cusName,
                    cusNo: cusNo,
                    manufac: manufac,
                    model: model,
                    year: year,
                    name: name,
                    condition: condition,
                    advPay: advPay,
                    descrip: descrip,
                    path: 'orderPurchase'
                },
                success: function(data) {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Something Wrong,Please Check");
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    //Generate ORDER ID
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'autoLoad_orderID'
            },
            success: function(data) {
                $('#product-order-id').val('ODR000' + data);


            }});
    });
</script>
<script>
    //Generate ServerTime
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'serverTime'
            },
            success: function(data) {
                $('#product-order-date').val(data);
            }});
    });
</script>
<script>
    // Find Order
    $('#order-id').on('keypress', function(e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            var orderId = $("#order-id").val();
            $.ajax({
                url: "class/class_Stock.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    orderId: orderId,
                    path: 'customOderFilter'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function(index) {
                        $('#order-id').val('ODR0' + dataSet[0]);
                        $('#order-customer-name').val(dataSet[1]);
                        $('#order-contact').val(dataSet[2]);
                        $('#order-advPay').val(dataSet[3]);
                        $('#order-date').val(dataSet[4]);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }

            });
        }
    });
</script>
<script>
    // Calculate Balance
    $(document).on("input", "#order-payment", function() {
        var total = $('#order-payment').val();
        var advPay = $('#order-advPay').val();
        var balance = total - advPay;
        $('#order-balance-amount').val(balance);
    });
</script>
<script>
    //Save Custom Order Arrival
    $(document).ready(function() {
        $(document).on("click", "#btn-order-arrival-save", function() {
            var orderId = $("#order-id").val();
            var orderdate = $("#order-date").val();
            var arriveDate = $("#order-arrive-date").val();
            var totPay = $("#order-payment").val();
            var balancePay = $("#order-balance-amount").val();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    orderId: orderId,
                    orderdate: orderdate,
                    arriveDate: arriveDate,
                    totPay: totPay,
                    balancePay: balancePay,
                    path: 'orderPurchaseArrival'
                },
                success: function(data) {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Something Wrong,Please Check");
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    //Generate ORDER ID
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'customOrderList'
            },
            success: function(data) {
                $('#stock-custom-order-list').html(data);


            }});
    });
</script>
<script>
    // Set Data to Order arrival
    $(document).ready(function(e) {
        $("#stock-custom-order-tbl").on('click', '#btn-arrival', function() {
            var currentRow = $(this).closest("tr");
            var orderId = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Stock.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    orderId: orderId,
                    path: 'customOderFilter'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function(index) {
                        $('#order-id').val('ODR0' + dataSet[0]);
                        $('#order-customer-name').val(dataSet[1]);
                        $('#order-contact').val(dataSet[2]);
                         $('#order-advPay').val(dataSet[3]);
                        $('#order-date').val(dataSet[4]);
                    });
                    $('html,body').scrollTop(0);
                    scrollTo(0);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }

            });
        });
    });
</script>
