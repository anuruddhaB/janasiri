<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-6">
        <div class="card ">
            <h4 class="card-header">Employee Registration</h4>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Emp ID</label>
                        <input id="emp-id" type="text" placeholder="EMP ID" class="form-control form-control-sm" disabled="">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>First Name</label>
                            <input id="first-name" type="text" placeholder="First Name" class="form-control form-control-sm">
                        </div>            
                        <div class="form-group col-6">
                            <label>Last Name</label>
                            <input id="last-name" type="text" placeholder="Last Name" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Gender</label>
                            <select class="form-control form-control-sm" id="select-gender">
                                <option>Choose Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>            
                        <div class="form-group col-6">
                            <label>Date of Birth</label>
                            <input id="dob" type="text" placeholder="DOB" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>NIC</label>
                        <input id="nic" type="text" placeholder="NIC" class="form-control form-control-sm">
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Address Line 1</label>
                            <input id="add-l1" type="text" placeholder="Address Line 1" class="form-control form-control-sm">
                        </div>                
                        <div class="form-group col-4">
                            <label>Address Line 2</label>
                            <input id="add-l2" type="text" placeholder="Address Line 2" class="form-control form-control-sm">
                        </div>                
                        <div class="form-group col-4">
                            <label>Address Line 3</label>
                            <input id="add-l3" type="text" placeholder="Address Line 3" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input id="contact" type="text" placeholder="Contact" class="form-control form-control-sm">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Select Bank</label>
                            <select class="form-control form-control-sm" id="select-bank">
                                <option>Choose Bank Name</option>
                            </select>
                        </div>            
                        <div class="form-group col-6">
                            <label>Account No</label>
                            <input id="accountNo" type="number" placeholder="Account No" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Position</label>
                            <select class="form-control form-control-sm" id="select-jobrole">
                                <option class="form-control form-control-sm">Choose Job Role</option>
                            </select>
                        </div>            
                        <div class="form-group col-6">
                            <label>Basic Salary</label>
                            <select class="form-control form-control-sm" id="select-basicSalary">
                                <option class="form-control form-control-sm">Choose Basic Salary</option>
                            </select>
                        </div> 
                    </div>
                    <div class="float-right" id="buttons">
                        <a href="#" class="btn btn-danger" id="btn-clear">Clear</a>
                        <a href="#" class="btn btn-primary" id="btn-save">Save Here</a>
                    </div>

                </form>
            </div>
        </div>  
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" >
        <div class="card" style="height: 683px;">
            <h5 class="card-header">Recent Employee's</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="emp-list-tbl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="emp-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
<!--<script>
    $(document).ready(function() {
        $('#emp-list-tbl').DataTable({
            "ordering": false,
            "bPaginate": true,
            "bInfo": false,
            "bAutoWidth": false,
            dom: 'frtipB',
           
                
        });
    });
</script>-->

<script>
    //Load JobRole,Bank Name,Basic Salary
    $(document).ready(function () {
        $.ajax({
            url: "class/class_Employee.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'autoLoad_jobRoleSalary'
            },
            success: function (data) {
                var dataJobRole = $.parseJSON(data);
                //alert(opts);
                $.each(dataJobRole, function (key, value) {
                    //alert(key+"is index, "+value.id+" is "+value.jobRole);
                    $('#select-jobrole').append('<option value="' + value.id + '">' + value.jobRole + '</option>');
                    $('#select-basicSalary').append('<option value="' + value.id + '">' + value.basicSalary + '</option>');
                });

            }});
    });
    $(document).ready(function () {
        $.ajax({
            url: "class/class_Employee.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'autoLoad_bankDetails'
            },
            success: function (data) {
                var dataJobRole = $.parseJSON(data);
                //alert(opts);
                $.each(dataJobRole, function (key, value) {
                    //alert(key+"is index, "+value.id+" is "+value.jobRole);
                    $('#select-bank').append('<option value="' + value.id + '">' + value.bankName + '</option>');
                });

            }});
    });
</script>
<script>
    //Save as a New Employer
    $(document).ready(function () {
        $(document).on("click", "#btn-save", function () {
            var empID = $("#emp-id").val();
            var fname = $("#first-name").val();
            var lname = $("#last-name").val();
            var gender = $("#select-gender").val();
            var dob = $("#dob").val();
            var nic = $("#nic").val();
            var address = $("#add-l1").val() + "," + $("#add-l2").val() + "," + $("#add-l3").val();
            var contact = $("#contact").val();
            var selectBank = $("#select-bank").val();
            var accountNo = $("#accountNo").val();
            var selectJobRole = $("#select-jobrole").val();
            var selectBasicSalary = $("#select-basicSalary").val();

            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empID: empID,
                    fname: fname,
                    lname: lname,
                    gender: gender,
                    dob: dob,
                    nic: nic,
                    address: address,
                    contact: contact,
                    selectBank: selectBank,
                    accountNo: accountNo,
                    selectJobRole: selectJobRole,
                    selectBasicSalary: selectBasicSalary,
                    path: 'EmployeRegistration'
                },
                success: function (data) {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>   
<script>
    //Generate EMP ID
    $(document).ready(function () {
        $.ajax({url: "class/class_Employee.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'autoLoad_EmpID'
            },
            success: function (data) {
                $('#emp-id').val('EMP000' + data);

            }});
    });
</script>
<script>
    //Generate Employee List
    $(document).ready(function () {
        $.ajax({
            url: "class/class_Employee.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'employeeList'
            },
            success: function (data) {
                $("#emp-list").html(data);
            }});
    });
    // Set Data to Update
    $(document).ready(function () {
        $("#emp-list-tbl").on('click', '#btn-edit', function () {
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
                success: function (data) {
                    var dataSet = $.parseJSON(data);
                    $.each(dataSet, function (index) {
                        $('#emp-id').val('EMP000' + dataSet[0]);
                        $('#first-name').val(dataSet[1]);
                        $('#last-name').val(dataSet[2]);
                        $('#select-gender').val(dataSet[3]);
                        $('#dob').val(dataSet[4]);
                        $('#nic').val(dataSet[5]);
                        $('#add-l1').val(dataSet[6]);
                        $('#add-l2').val(dataSet[7]);
                        $('#add-l3').val(dataSet[8]);
                        $("#contact").val(dataSet[9]);
                        $("#select-bank").val(dataSet[10]);
                        $("#accountNo").val(dataSet[11]);
                        $("#select-jobrole").val(dataSet[12]);
                        $("#select-basicSalary").val(dataSet[13]);
                    });
                    $('html,body').scrollTop(0);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
<script>
    //Create Active,Deactive,Update Buttons
    $(document).ready(function () {
        $(document).on("click", "#btn-edit", function () {
            var btn = '<a  class="btn btn-danger text-light" id="btn-deactive">Deactivate</a>\n\
                        <a  class="btn btn-info text-light" id="btn-active">Activate</a>\n\
                       <a  class="btn btn-primary text-light" id="btn-update">Update</a>';
            $('#buttons').html(btn);
            $('#nic').prop('disabled', true);
            $('#accountNo').prop('disabled', true);
            $('#select-bank').prop('disabled', true);
            $('#first-name').prop('disabled', true);
            $('#last-name').prop('disabled', true);
            $('#select-gender').prop('disabled', true);
            $('#dob').prop('disabled', true);
        });
    });
</script>
<script>
    //Update Employer Details
    $(document).ready(function () {
        $(document).on("click", "#btn-update", function () {
            var empID = $("#emp-id").val();
            var address = $("#add-l1").val() + "," + $("#add-l2").val() + "," + $("#add-l3").val();
            var contact = $("#contact").val();
            var selectJobRole = $("#select-jobrole").val();
            var selectBasicSalary = $("#select-basicSalary").val();

            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empID: empID,
                    address: address,
                    contact: contact,
                    selectJobRole: selectJobRole,
                    selectBasicSalary: selectBasicSalary,
                    path: 'updateEmpDetails'
                },
                success: function (data) {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //Change Status
    $(document).ready(function () {
        $(document).on("click", "#btn-active", function () {
            var status = 1;
            var empid = $('#emp-id').val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    status: status,
                    empid: empid,
                    path: 'changeStatus'
                },
                success: function (data) {
                    alert(data);
                    //window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //Change Status
    $(document).ready(function () {
        $(document).on("click", "#btn-deactive", function () {
            var status = 2;
            var empid = $('#emp-id').val();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    status: status,
                    empid: empid,
                    path: 'changeStatus'
                },
                success: function (data) {
                    alert(data);
                    // window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    // Delete Emp Account
    $(document).ready(function () {
        $("#emp-list-tbl").on('click', '#btn-delete', function () {
            var currentRow = $(this).closest("tr");
            var empid = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    path: 'deleteAccount'
                },
                success: function (data) {
                    alert("Successfully Deleted Account EMP00" + data);
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });



</script> 