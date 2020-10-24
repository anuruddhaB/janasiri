<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Inventory</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="item-code-search" type="text" placeholder="Search Item Code Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="product-list-tbl">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
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
<?php
require 'base/footer.php';
?>
<script>
    //Load Recent Item Registrations
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'productList'
            },
            success: function(data) {
                $("#product-list").html(data);
            }});
    });
</script>    
<script>
    $('#item-code-search').on('keypress', function(e) {
        var itemCode = $("#item-code-search").val();
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                itemCode: itemCode,
                path: 'productListFilter'
            },
            success: function(data) {
                $("#product-list").html(data);

            }
        });
    });
</script>
<script>
    $(document).ready(function(e) {
        $("#product-list-tbl").on('click', '#btn-de-active', function() {
            var currentRow = $(this).closest("tr");
            var itemCode = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    itemCode: itemCode,
                    path: 'deActiveProduct'
                },
                success: function(data) {
                    alert(data);
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
