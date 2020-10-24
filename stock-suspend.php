<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Suspended List</h5>
            <div class="card-body">
                <a href="class/clas_employePayment.php"></a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="stock-suspend-tbl">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="stock-suspend-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Vendor</th>
                                <th>Model</th>
                                <th>Year</th>
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
    //Suspend List
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Stock.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'productSuspendList'
            },
            success: function(data) {
                $("#stock-suspend-list").html(data);
            }});
    });
</script>    
<script>
    $(document).ready(function(e) {
        $("#stock-suspend-tbl").on('click', '#btn-active', function() {
            var currentRow = $(this).closest("tr");
            var itemCode = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Stock.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    itemCode: itemCode,
                    path: 'activeProduct'
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