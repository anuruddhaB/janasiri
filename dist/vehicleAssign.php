<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
        <div class="card" >
            <h5 class="card-header">Car Renting</h5>
            <div class="card-body">
                <form action="#" id="basicform" data-parsley-validate="">
                    <div class="form-group">
                        <label>Vin No</label>
                        <input id="rent-vinno" type="text"  data-parsley-trigger="change" required="" placeholder="Vin Number" autocomplete="off" class="form-control" readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Reservation ID</label>
                        <input id="rent-resid" type="text"  data-parsley-trigger="change" required="" placeholder="Reservation ID" autocomplete="off" class="form-control">
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-danger " id="btn-clear">Clear</a>
                        <a href="#" class="btn btn-primary " id="btn-rent-save">Save Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
        <div class="card" >
            <h5 class="card-header">Available Car List</h5>
            <div class="card-body">
                <form action="#" id="basicform" data-parsley-validate="">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="rent-car-set-tbl">
                            <thead>
                                <tr>
                                    <th>VIN NO</th>
                                    <th>Purpose</th>
                                    <th>Condition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="vehicle-update-set">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>VIN NO</th>
                                    <th>Purpose</th>
                                    <th>Condition</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php
require 'base/footer.php';
?> 
<script>
    //Save as a New Renting
    $(document).ready(function() {
        $(document).on("click", "#btn-rent-save", function() {
            var vinno = $("#rent-vinno").val();
            var resid = $("#rent-resid").val();
            var time = new Date().toLocaleTimeString();
            $.ajax({
                url: "class/class_Vehicle.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    vinno:vinno,
                    resid:resid,
                    time:time,
                    path:'bookCar'
                    
                },
                success: function(data) {
                    alert(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                }

            });
        });
    });

    $(document).ready(function() {
        $.ajax({
            url: "class/class_Vehicle.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'rentingVehicleList'
            },
            success: function(data) {
                $("#vehicle-update-set").html(data);
            }
        });
    });
    $(document).ready(function(e) {
        $("#rent-car-set-tbl").on('click', '#btn-setRent', function() {
            var currentRow = $(this).closest("tr");
            var vinid = currentRow.find("td:eq(0)").text();
            $("#rent-vinno").val(vinid);
        });
    });
</script>