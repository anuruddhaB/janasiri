<?php
require 'base/header.php';
?>

<div class="card col-10">
    <h3 class="card-header">Vehicle Registration</h3>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="form-group col-8">
                    <label>Vehicle Type</label>
                    <select class="form-control form-control-sm" id="vehicle-type">
                        <option value="null">Choose Type</option>
                        <option value="sedan">Sedan</option>
                        <option value="HatchBack">HatchBack</option>
                        <option value="pickup Truck">Pickup Truck</option>
                        <option value="Tow truck">Tow Truck</option>
                    </select>
                </div>            
                <div class="form-group col-8">
                    <label>Manufacture Name</label>
                    <input id="company" type="text" placeholder="Company Name" class="form-control ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label>Engine Number</label>
                    <input id="engine-no" type="text" placeholder="ENGINE NO" class="form-control ">
                </div>
                <div class="form-group col-4">
                    <label>Chasis Number</label>
                    <input id="chasis-no" type="text" placeholder="CHASIS NO" class="form-control">
                </div>
                <div class="form-group col-4">
                    <label>Vin Number</label>
                    <input id="vin-no" type="text" placeholder="VIN NO" class="form-control ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Mileage</label>
                    <input id="mileage" type="text" placeholder="Mileage" class="form-control ">
                </div>
                <div class="form-group col-6">
                    <label>Purchase Date</label>
                    <input id="purchase" type="text" placeholder="Purchase Date - DD/MM/YYYY" class="form-control ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Condition</label>
                    <select class="form-control form-control-sm " id="condition">
                        <option>Choose Condition</option>
                        <option>Brand New</option>
                        <option>Re-Conditioned</option>
                        <option>Used</option>
                    </select>
                </div>   
                <div class="form-group col-6">
                    <label>Purpose</label>
                    <select class="form-control form-control-sm" id="purpose">
                        <option>Choose Purpose</option>
                        <option>Rent</option>
                        <option>Towing</option>
                        <option>Yard Use</option>
                    </select>
                </div>  
            </div>
            <div class="line-w">
                <div class="form-group float-right" id="buttons">
                    <a  class="btn btn-danger text-light" id="btn-clear">Clear</a>
                    <a  class="btn btn-primary text-light" id="btn-save">Save Here</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card col-12">
    <h3 class="card-header">Vehicle Registration</h3>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="my-table">
                <thead>
                    <tr>
                        <th>VIN No</th>
                        <th>Model</th>
                        <th>Company</th>
                        <th>Purpose</th>
                        <th>Condition</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="veh-tbody">

                </tbody>
                <tfoot>
                    <tr>
                        <th>VIN No</th>
                        <th>Model</th>
                        <th>Company</th>
                        <th>Purpose</th>
                        <th>Condition</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php
require 'base/footer.php';
?> 

<!--<script>
    $(document).ready(function() {
        $('#my-table').DataTable({
//            "ordering": false,
//            "bPaginate": true,
//            "bLengthChange": false,
//            "bFilter": true,
//            "bInfo": false,
//            "bAutoWidth": false,
//            dom: 'frtipB',
            buttons: [
                'print', 'csv', 'pdf'
            ]
        });
    });
</script>-->
<script>
    //Save as a New Vehicle
    $(document).ready(function() {
        $(document).on("click", "#btn-save", function() {
            var vehicleType = $("#vehicle-type").val();
            var company = $("#company").val();
            var engineNo = $("#engine-no").val();
            var chasisNo = $("#chasis-no").val();
            var vinNo = $("#vin-no").val();
            var mileage = $("#mileage").val();
            var purchase = $("#purchase").val();
            var condition = $("#condition").val();
            var purpose = $("#purpose").val();
            $.ajax({
                url: "class/class_Vehicle.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    vehicleType: vehicleType,
                    company: company,
                    engineNo: engineNo,
                    chasisNo: chasisNo,
                    vinNo: vinNo,
                    mileage: mileage,
                    purchase: purchase,
                    condition: condition,
                    purpose: purpose,
                    path: 'VehicleRegistration'
                },
                success: function(data) {
                    alert("Saved");
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //Load data to table
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Vehicle.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'getPendingVehicleList'
            },
            success: function(data) {
                $("#veh-tbody").html(data);
            }});
    });
    //Set Update Data
    $(document).ready(function() {
        $("#my-table").on('click', '#btn-edit', function() {
            var currentRow = $(this).closest("tr");
            var vinNo = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Vehicle.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    vinNo: vinNo,
                    path: 'updateDetails'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function(key, value) {
                        $('#vehicle-type').val(value.type);
                        $('#company').val(value.company);
                        $('#engine-no').val(value.engine);
                        $('#chasis-no').val(value.chasis);
                        $('#vin-no').val(value.vin);
                        $('#mileage').val(value.mileage);
                        $('#purchase').val(value.purchase);
                        $('#condition').val(value.condition);
                        $('#purpose').val(value.purpose);
                    });
                    $('html,body').scrollTop(0);
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
        $(document).on("click", "#btn-edit", function() {
            var btn = '<a  class="btn btn-danger text-light" id="btn-deactive">Deactivate</a>\n\
                        <a  class="btn btn-info text-light" id="btn-active">Activate</a>\n\
                       <a  class="btn btn-primary text-light" id="btn-new">New</a>';
            $('#buttons').html(btn);
            $('#vin-no').prop('readonly', true);
            $('#engine-no').prop('readonly', true);
            $('#chasis-no').prop('readonly', true);

        });
    });

</script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn-update", function() {
            var btn = '<a  class="btn btn-danger text-light" id="btn-clear">Clear</a>\n\
                        <a  class="btn btn-primary text-light" id="btn-save">Save Here</a>';
            $('#buttons').html(btn);
            $('#vin-no').prop('readonly', false);
            $('#engine-no').prop('readonly', false);
            $('#chasis-no').prop('readonly', false);

        });
    });
    $(document).ready(function() {
        $(document).on("click", "#btn-active", function() {
            var status = 1;
            var vin = $('#vin-no').val();
            $.ajax({
                url: "class/class_Vehicle.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    status: status,
                    vin: vin,
                    path: 'changeStatus'
                },
                success: function(data) {
                    alert(data);
                    //window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on("click", "#btn-deactive", function() {
            var status = 2;
            var vin = $('#vin-no').val();
            $.ajax({
                url: "class/class_Vehicle.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    status: status,
                    vin: vin,
                    path: 'changeStatus'
                },
                success: function(data) {
                    alert(data);
                    // window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //Clear
    $(document).ready(function() {
        $(document).on("click", "#btn-clear", function() {
            $("#vehicle-type").val('Choose Type');
            $("#company").val('');
            $("#engine-no").val('');
            $("#chasis-no").val('');
            $("#vin-no").val('');
            $("#mileage").val('');
            $("#purchase").val('');
            $("#condition").val('Choose Condition');
            $("#purpose").val('Choose Purpose');

        });
    });
    $(document).ready(function() {
        $(document).on("click", "#btn-new", function() {
            location.reload(true);
        });
    });
</script>