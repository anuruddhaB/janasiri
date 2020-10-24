<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Registered Vehicle List</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="vehicle-type-search" type="text" placeholder="Search Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="vehicle-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Manufacture</th>
                                <th>Model</th>
                                <th>Engine No</th>
                                <th>Vin</th>
                                <th>Purchase Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="vehicle-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Manufacture</th>
                                <th>Model</th>
                                <th>Engine No</th>
                                <th>Vin</th>
                                <th>Purchase Date</th>
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
            url: "class/class_Vehicle.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'registeredVehicleList'
            },
            success: function(data) {
                $("#vehicle-list").html(data);
            }});
    });
</script>
<script>
    //search vehicle
    $('#vehicle-type-search').on('keypress', function(e) {
        var vehicleType = $("#vehicle-type-search").val();
        $.ajax({
            url: "class/class_Vehicle.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                vehicleType: vehicleType,
                path: 'vehicleListFilter'
            },
            success: function(data) {
                $("#vehicle-list").html(data);

            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#emp-allow-set-tbl").on('click', '#btn-setDataAllow', function() {
            var currentRow = $(this).closest("tr");
            var empid = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    path: 'calculateSalaryDeduction'
                },
                success: function(data) {
                    $('#all-deduct').val(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>