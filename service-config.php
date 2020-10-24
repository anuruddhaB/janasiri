<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Time Slot Management</h4>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input id="time-id" type="text" placeholder="ID" class="form-control form-control-sm" disabled="">
                    </div>
                    <div class="form-group">
                        <input id="time-slot" type="text" placeholder="Time Slot" class="form-control form-control-sm">
                        <p class="text-dark">Ex:8.00AM</p>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-primary" id="btn-timeSlot-save">Save Here</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Vehicle Model Registration</h4>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input id="veh-id" type="text" placeholder="id" class="form-control form-control-sm" disabled="">
                    </div>
                    <div class="form-group">
                        <input id="veh-name" type="text" placeholder="Vehicle Type" class="form-control form-control-sm">
                        <p class="text-dark">Ex:Sedan,HutchBack</p>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-primary" id="btn-vehModel-save">Save Here</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Service Type Registration</h4>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input id="sect-id" type="text" placeholder="Id" class="form-control form-control-sm" disabled="">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm" id="sect-section">
                            <option>Service Section</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="sect-name" type="text" placeholder="Section Name" class="form-control form-control-sm">
                        <p class="text-dark">Ex:Painting,Change Wheels,Inspection</p>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="sect-desc" rows="3"></textarea>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-primary" id="btn-sect-save">Save Here</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Servicing Section Creation</h4>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input id="sec-id" type="text" placeholder="Id" class="form-control form-control-sm" disabled="" >
                    </div>
                    <div class="form-group">
                        <input id="sec-name" type="text" placeholder="Section Name" class="form-control form-control-sm">
                        <p class="text-dark">Ex:Servicing,Painting</p>
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-primary" id="btn-section-save">Save Here</a>
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
    //Service Section Reg
    $(document).ready(function() {
        $(document).on("click", "#btn-section-save", function() {
            var secid = $('#sec-id').val();
            var secname = $('#sec-name').val();
            $.ajax({
                url: "class/class_Service.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    secid: secid,
                    secname: secname,
                    path: 'sectionReg'
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
    //Service Section Type Reg
    $(document).ready(function() {
        $(document).on("click", "#btn-sect-save", function() {
            var sectid = $('#sect-id').val();
            var sectsec = $('#sect-section').val();
            var sectname = $('#sect-name').val();
            var sectdesc = $('#sect-desc').val();
            $.ajax({
                url: "class/class_Service.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    sectid: sectid,
                    sectname: sectname,
                    sectdesc: sectdesc,
                    sectsec: sectsec,
                    path: 'sectionTypeReg'
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
    //Service Vehicle Model Reg
    $(document).ready(function() {
        $(document).on("click", "#btn-vehModel-save", function() {
            var vehid = $('#veh-id').val();
            var vehname = $('#veh-name').val();
            $.ajax({
                url: "class/class_Service.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    vehid: vehid,
                    vehname: vehname,
                    path: 'vehicleModelReg'
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
    //Time Slot Registration
    $(document).ready(function() {
        $(document).on("click", "#btn-timeSlot-save", function() {
            var timeid = $('#time-id').val();
            var timeslot = $('#time-slot').val();
            $.ajax({
                url: "class/class_Service.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    timeid: timeid,
                    timeslot: timeslot,
                    path: 'timeSlotReg'
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
    //Generate ID List
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Service.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'autoloadID'
            },
            success: function(data) {
                var dataSet = $.parseJSON(data);
                $.each(dataSet, function(index) {
                    $("#time-id").val(dataSet[0]);
                    $("#veh-id").val(dataSet[1]);
                    $("#sec-id").val(dataSet[2]);
                    $("#sect-id").val(dataSet[3]);
                });
            }});
    });
</script>
<script>
    //Generate Service Dropdown
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Common.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'loadServiceSection'
            },
            success: function(data) {
                $("#sect-section").append(data);
            }});
    });
</script>