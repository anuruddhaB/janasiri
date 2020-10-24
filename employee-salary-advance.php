<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Salary Advance</h5>
            <div class="card-body">
                <form action="#" id="basicform" data-parsley-validate="">
                    <label>Find NIC</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  placeholder="NIC" id="emp-adv-id">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary" id="btn-adv-find">Find NIC</button>
                        </div>
                    </div>
                    <label>Employee ID</label>
                    <div class="form-group">
                        <input id="emp-all-id" type="text"  required="" placeholder="Employer ID" autocomplete="off" class="form-control" disabled>
                    </div>
                    <label>Employee Name</label>
                    <div class="form-group">
                        <input id="adv-empname" type="text"  required="" placeholder="Employer Name" autocomplete="off" class="form-control" disabled>
                    </div>
                    <label>Basic Salary</label>
                    <div class="form-group">
                        <input id="adv-basicsal" type="text"   required="" placeholder="Basic Salary" autocomplete="off" class="form-control" disabled>
                    </div>
                    <label>Advance Amount</label>
                    <div class="form-group">
                        <input id="adv-amount" type="text"   required="" placeholder="Advance Amount" autocomplete="off" class="form-control">
                    </div>
                    <div>
                        <div class="float-right m-t-10">
                            <a href="#" class="btn btn-danger" id="btn-adv-clear">Clear</a>
                            <a href="#" class="btn btn-primary" id="btn-adv-save">Save Here</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Salary Advance History</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" style="overflow-y:scroll;height: 200px">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Advance Amount </th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="emp-sal-tb">


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Emp ID</th>
                                <th>Advance Amount </th>
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
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card" >
            <h5 class="card-header">Employee Allowance</h5>
            <div class="card-body">
                <form action="#" id="basicform" data-parsley-validate="">
                    <div class="form-group">
                        <label>Employee ID</label>
                        <input id="all-empid" type="text"  data-parsley-trigger="change" required="" placeholder="Employee ID" autocomplete="off" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input id="all-empname" type="text"  data-parsley-trigger="change" required="" placeholder="Employee Name" autocomplete="off" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Basic Salary</label>
                        <input id="all-empSal" type="text"  data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Food Allowance</label>
                        <input id="all-food" type="text"  data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Transport Allowance</label>
                        <input id="all-trans" type="text"  data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Medical Allowance</label>
                        <input id="all-med" type="text"  data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control">
                    </div>
                    <div class="row">

                        <div class="form-group col-6">
                            <label>Absence Day Count</label>
                            <input id="all-abs-day" type="text" data-parsley-trigger="change" required="" placeholder="0" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label>Absence Amount</label>
                            <input id="all-abs-amt" type="text" data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control" disabled>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label>Total Deduction</label>
                        <input id="all-deduct" type="text" data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Total Payment</label>
                        <input id="all-totSal" type="text"  data-parsley-trigger="change" required="" placeholder="00.00" autocomplete="off" class="form-control" disabled>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-danger " id="btn-clear">Clear</a>
                        <a href="#" class="btn btn-primary " id="btn-all-save">Save Here</a>
                    </div>

            </div>
            </form>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card" style="height: 780px;">
            <h5 class="card-header">Salary History</h5>
            <div class="card-body">
                <form action="#" id="basicform" data-parsley-validate="">
                    <div class="row">
                        <div class="form-group col-7" style="margin-bottom: -13px;">
                            <div class="input-group mb-3">
                                <select class="form-control form-control-sm" id="select-jobRoleSet">
                                    <option class="form-control form-control-sm">Choose Job Role</option>
                                    <option class="form-control form-control-sm">Manager</option>
                                    <option class="form-control form-control-sm">Supervisor</option>
                                    <option class="form-control form-control-sm">Assistance</option>
                                    <option class="form-control form-control-sm">Mechanic</option>
                                    <option class="form-control form-control-sm">Driver</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="emp-allow-set-tbl">
                            <thead>
                                <tr>
                                    <th>EMP ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="emp-all-tb">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>EMP ID</th>
                                    <th>Name</th>
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
    //get Employee Data-Allowance
    $(document).ready(function() {
        $(document).on("click", "#btn-all-find", function() {
            var empID = $("#emp-all-id").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "GET",
                DataType: "JSON",
                data: {
                    empID: empID,
                    path: 'getEmployeeTB'
                },
                success: function(data) {

                    var dataEmpList = $.parseJSON(data);
                    $("#all-empname").val(dataEmpList.name);
                    $("#all-empSal").val(dataEmpList.basicSalary);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("User does not Exists");
                    //console.log(errorThrown);
                }
            });
        });
    });
    //find employee data-Salary Advance
    $(document).ready(function() {
        $(document).on("click", "#btn-adv-find", function() {
            var nic = $("#emp-adv-id").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "GET",
                DataType: "JSON",
                data: {
                    nic: nic,
                    path: 'getEmployeeTB'
                },
                success: function(data) {

                    var dataEmpList = $.parseJSON(data);
                    $("#adv-empname").val(dataEmpList.name);
                    $("#adv-basicsal").val(dataEmpList.basicSalary);
                    $("#emp-all-id").val('EMP000' + dataEmpList.empid);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("User does not Exists");
                    //console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    //Save Salary Advance
    $(document).ready(function() {
        $(document).on("click", "#btn-adv-save", function() {
            var empID = $("#emp-all-id").val();
            var amount = $("#adv-amount").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empID: empID,
                    amount: amount,
                    path: 'empSalaryAdvance'
                },
                success: function(data) {
                    alert('Successfully Saved!!!');
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
    //Search Salary Advance History
    $(document).ready(function() {
        $(document).on("click", "#btn-adv-find", function() {
            var nic = $("#emp-adv-id").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    nic: nic,
                    path: 'salaryAdvanceHistory'
                },
                success: function(data) {
                    $("#emp-sal-tb").html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("User does not Exists");
                    //console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn-allw-find", function() {
            var empid = 'EMP000' + $("#emp-allw-id").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    path: 'setUpdateDetails'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function(index) {
                        $('#all-empname').val(dataSet[1] + " " + dataSet[2]);
                        $('#all-empSal').val("Rs. " + dataSet[13]);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("User does not Exists");
                    //console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on("change", "#select-jobRoleSet", function() {
            var jobRole = $("#select-jobRoleSet").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    jobRole: jobRole,
                    path: 'salaryAllowanceHistory'
                },
                success: function(data) {
                    $("#emp-all-tb").html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("User does not Exists");
                    //console.log(errorThrown);
                }
            });
        });
    });
    // Set Data to Update
    $(document).ready(function(e) {
        $("#emp-allow-set-tbl").on('click', '#btn-setDataAllow', function() {
            var currentRow = $(this).closest("tr");
            var empid = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    path: 'setUpdateDetails'
                },
                success: function(data) {
                    var dataSet = $.parseJSON(data);
                    $('#all-empid').val('EMP000' + dataSet[0]);
                    $("#all-empSal").val(dataSet[13]);
                    $('#all-empname').val(dataSet[1] + " " + dataSet[2]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //calculate deduction
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
    //Prevent Reload
    $(document).ready(function(e) {
        $('#emp-allow-set-tbl').click(function(e) {
            e.preventDefault();
        });
    });
    
    //calculate Totla Salary
    $(document).on("input", "#all-abs-day", function() {
        var absentDay = parseFloat($("#all-abs-day").val());
        var empSal = parseFloat($("#all-empSal").val());
        var food = parseFloat($("#all-food").val());
        var trans = parseFloat($("#all-trans").val());
        var med = parseFloat($("#all-med").val());
        var totDeduct = $("#all-deduct").val();
        if (totDeduct.length == 0) {
            totDeduct = 0;
        }
        var totDeductAmt = parseFloat(totDeduct);
        var totabsAmt = parseFloat(absentDay * 1000);
        $('#all-abs-amt').val(totabsAmt);
        var totSalCal = (empSal + food + trans + med) - (totDeductAmt + totabsAmt);
        $('#all-totSal').val(totSalCal);

    });


</script>
<script>
    //Save Salary Advance
    $(document).ready(function() {
        $(document).on("click", "#btn-all-save", function() {
            var empid = $("#all-empid").val();
            var food = $("#all-food").val();
            var trans = $("#all-trans").val();
            var meds = $("#all-med").val();
            var deduct = $("#all-deduct").val();
            var basicsal = $("#all-empSal").val();
            var absAmt = $("#all-abs-amt").val();
            var totalPay = $("#all-totSal").val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    food: food,
                    trans: trans,
                    meds: meds,
                    deduct: deduct,
                    basicsal: basicsal,
                    absAmt: absAmt,
                    totalPay: totalPay,
                    path: 'allowancePayment'
                },
                success: function(data) {
                    alert(data);
                    //location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Something Wrong,Please Check");
                    console.log(errorThrown);
                }
            });
        });
    });
    //Prevent Reload
    $(document).ready(function(e) {
        $('#btn-all-save').click(function(e) {
            e.preventDefault();
        });
    });
</script>

