<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card" style="height: 683px;">
            <h5 class="card-header">Pending Emplyee List</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="emp-list-tbl">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Account No</th>
                                <th>Job Role</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="emp-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Account No</th>
                                <th>Job Role</th>
                                <th>Salary</th>
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
    //Generate Employee List
    $(document).ready(function() {
        $.ajax({
            url: "class/class_Employee.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'employeePendingList'
            },
            success: function(data) {
                $("#emp-list").html(data);
            }});
    });
    // Delete Emp Account
    $(document).ready(function() {
        $("#emp-list-tbl").on('click', '#btn-delete', function() {
            var currentRow = $(this).closest("tr");
            var empid = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    path: 'deleteAccountPermenant'
                },
                success: function(data) {
                    alert("Successfully Deleted Account " + data);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    //Activate Employee 
    $(document).ready(function() {
        $("#emp-list-tbl").on('click', '#btn-active', function() {
            var currentRow = $(this).closest("tr");
            var empid = currentRow.find("td:eq(0)").text();
            var status = 1;
            $.ajax({
                url: "class/class_Employee.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    empid: empid,
                    status:status,
                    path: 'changeStatus'
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