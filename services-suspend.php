<?php
require 'base/header.php';
?>
<div class="row">
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Service Section</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="customer-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="section-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>   
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Reservation Time Slot's</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="customer-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="time-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
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
            <h5 class="card-header">Service List</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="item-type-search" type="text" placeholder="Search Here...." class="form-control btn-xs">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="customer-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th>Section</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody id="service-list">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th>Section</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>   
    <?php
    require 'base/footer.php';
    ?>      
    <script>
        //Generate Service Section List
        $(document).ready(function() {
            $.ajax({
                url: "class/class_Service.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'autoLoadServiceSection'
                },
                success: function(data) {
                    $("#section-list").html(data);
                }});
        });
    </script>
    <script>
        //Generate Service Section List
        $(document).ready(function() {
            $.ajax({
                url: "class/class_Service.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'autoLoadServiceType'
                },
                success: function(data) {
                    $("#time-list").html(data);
                }});
        });
    </script>
    <script>
        //Generate Service Section List
        $(document).ready(function() {
            $.ajax({
                url: "class/class_Service.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'autoLoadServiceList'
                },
                success: function(data) {
                    $("#service-list").html(data);
                }});
        });
    </script>
    <script>
        //search service
        $('#item-type-search').on('keypress', function(e) {
            var code = e.keyCode || e.which;
            if (code == 13) {
                var serviceName = $('#item-type-search').val();
                var serviceSection = $('#item-type-search').val();
                $.ajax({
                    url: "class/class_Service.php",
                    context: document.body,
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        serviceName: serviceName,
                        serviceSection: serviceSection,
                        path: 'serviceListFilter'
                    },
                    success: function(data) {
                        $("#service-list").html(data);

                    }
                });
            }

        });
    </script>
    <script>
        $(document).ready(function(e) {
            $("#service-list").on('click', '#btn-service-delete', function() {
                var currentRow = $(this).closest("tr");
                var serviceCode = currentRow.find("td:eq(0)").text();
                $.ajax({
                    url: "class/class_Service.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        serviceCode: serviceCode,
                        path: 'removeFromTableService'
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
        $(document).ready(function(e) {
            $("#time-list").on('click', '#btn-time-delete', function() {
                var currentRow = $(this).closest("tr");
                var serviceCode = currentRow.find("td:eq(0)").text();
                $.ajax({
                    url: "class/class_Service.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        serviceCode: serviceCode,
                        path: 'removeFromTableTime'
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
        $(document).ready(function(e) {
            $("#section-list").on('click', '#btn-section-delete', function() {
                var currentRow = $(this).closest("tr");
                var serviceCode = currentRow.find("td:eq(0)").text();
                $.ajax({
                    url: "class/class_Service.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        serviceCode: serviceCode,
                        path: 'removeFromTableSection'
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