<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Client List</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="username-search" type="text" placeholder="Search username Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="customer-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Contact</th>
                                <th>Join Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="customer-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Contact</th>
                                <th>Join Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>    
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Previous Reservations</h5>
            <div class="card-body">
                <div class="row">            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="product-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Res ID</th>
                                <th>Date</th>
                                <th>V Model</th>
                                <th>Description</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Res ID</th>
                                <th>Date</th>
                                <th>V Model</th>
                                <th>Description</th>
                                <th>Payment</th>
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
            url: "class/class_Customer.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'clientList'
            },
            success: function(data) {
                $("#customer-list").html(data);
            }});
    });
</script>
<script>
    //search vehicle
    $('#username-search').on('keypress', function(e) {
        var username = $("#username-search").val();
        $.ajax({
            url: "class/class_Customer.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                username: username,
                path: 'clientFilter'
            },
            success: function(data) {
                $("#customer-list").html(data);

            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#customer-list-tbl").on('click', '#btn-viewInfo', function() {
            var currentRow = $(this).closest("tr");
            var username = currentRow.find("td:eq(2)").text();

            $.ajax({
                url: "class/class_Customer.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    username: username,
                    path: 'reservationFilter'
                },
                success: function(data) {
                    $("#product-list").html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>
