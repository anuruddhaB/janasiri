<?php
require './base/header.php';
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Pending Reservation - <?php echo date('Y-m-d') ?></h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <input id="username-search" type="text" placeholder="Search Name Here...." class="form-control ">
                    </div>            
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="reservation-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Vehicle Model</th>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="reservation-list">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Vehicle Model</th>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>  
<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update & Approve Reservation</h4>
                <button type="button" class="close" id="btn-close"data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Reservation ID</label>
                                <input id="res-id" type="text" class="form-control form-control-sm" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Reservation Date</label>
                                <input id="res-date" type="text" class="form-control form-control-sm" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input id="res-name" type="text" class="form-control form-control-sm" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Email</label>
                            <input id="res-email" type="text" class="form-control form-control-sm" disabled>
                        </div>            
                        <div class="form-group col-6">
                            <label>Contact</label>
                            <input id="res-contact" type="text"  class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Vehicle Model</label>
                            <input id="res-vmodel" type="text" class="form-control form-control-sm" disabled>
                        </div>            
                        <div class="form-group col-6">
                            <label>Year</label>
                            <input id="res-year" type="text" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Service Type</label>
                            <input id="res-servicetype" type="text" class="form-control form-control-sm" disabled>
                        </div>            
                        <div class="form-group col-4">
                            <label>Service Section</label>
                            <select class="form-control form-control-sm" id="res-section">
                                <option value="0">Service Section</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Change Status</label>
                            <select class="form-control form-control-sm" id="res-status">
                                <option value="0">Select Status</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Message</label>
                            <textarea class="form-control form-control-sm" id="res-message" rows="3" disabled></textarea>
                        </div>
                        <div class="form-group col-4">
                            <label>Replace Note</label>
                            <textarea class="form-control form-control-sm" id="res-replace" rows="3" placeholder="anything related to job"></textarea>
                        </div>            
                        <div class="form-group col-4">
                            <label>Other Note</label>
                            <textarea class="form-control form-control-sm" id="res-other" rows="3" placeholder="other clarifications"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-6">
                    <button type="button" class="btn btn-success btn-block " id="btn-modal-email"><i class="fa fa-envelope"></i> Remind Customer</button>
                </div>
                <div class="col-6 right">
                    <div class="row">
                        <div class="col-8">
                            <button type="button" class="btn btn-primary btn-block" id="btn-modal-app"><i class="fa fa-edit"></i>Approve</button>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-danger btn-block" id="btn-exit"><i class="fas fa-times"></i> Exit</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>

<?php
require './base/footer.php';
?>
<script>
    //Load Pending Reservation list
    $(document).ready(function () {
        $.ajax({
            url: "class/class_Reservation.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'pendingReservationList'
            },
            success: function (data) {
                $("#reservation-list").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus);
                console.log(errorThrown);
            }
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-app', function () {
            var currentRow = $(this).closest("tr");
            var resId = currentRow.find("td:eq(0)").text();
            var status = 2;
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rID: resId,
                    status :status,
                    path: 'generateReservation'
                },
                success: function (data) {
                    var stack = JSON.parse(data);
                    $('#res-id').val(stack.id);
                    $('#res-date').val(stack.rdate);
                    $('#res-name').val(stack.name);
                    $('#res-contact').val(stack.contact);
                    $('#res-vmodel').val(stack.vmodel);
                    $('#res-year').val(stack.year);
                    $('#res-servicetype').val(stack.service);
                    $('#res-message').val(stack.message);
                    $('#res-email').val(stack.email);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
            $.ajax({
                url: "class/class_Common.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'loadServiceSection'
                },
                success: function (data) {
                    $("#res-section").append(data);
                }});
            $.ajax({
                url: "class/class_Common.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'loadStatus'
                },
                success: function (data) {
                    $("#res-status").append(data);
                }});
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-modal-app', function () {
            var serviceSection = $("#res-section").val();
            var status = $("#res-status").val();
            var replaceNote = $("#res-replace").val();
            var otherNote = $("#res-other").val();
            var resId = $("#res-id").val();
            if (serviceSection == 0 || serviceSection == "0") {
                var info = "Please fill the relavent values";
                var title = "Missing information";
                toastr.info(info, title);
            } else {
                $.ajax({
                    url: "class/class_Reservation.php",
                    context: document.body,
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        sSection: serviceSection,
                        rNote: replaceNote,
                        oNote: otherNote,
                        rID: resId,
                        status: status,
                        path: 'updateReservation'
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);
                        if (obj.status == true) {
                            toastr.success(obj.message, obj.title);
                            $("#btn-modal-app").attr('disabled', true);
                        } else if (obj.status == false) {
                            toastr.error(obj.message, obj.title);
                        } else {
                            toastr.info(obj.message, obj.title);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.error("Something Unexpected happen", "Unexpected Error");
                    }
                });
            }
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-close', function () {
            location.reload();
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-exit', function () {
            $('#btn-exit').attr("data-dismiss", "modal");
            ;
        });
    });
    $(document).ready(function () {

        $(document).on('click', '#btn-modal-email', function () {

        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-modal-email', function () {
            var rid = $('#res-id').val();
            var email = $('#res-email').val();
            alert(email);
            $.ajax({
                url: "class/class_Notification.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rid: rid,
                    email: email,
                    path: 'userNotification'
                },
                success: function (data) {
                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.status == true) {
                        toastr.success(obj.message, obj.title);
                    } else if (obj.status == false) {
                        toastr.error(obj.message, obj.title);
                    } else if (obj.status == "exec") {
                        toastr.error(obj.message, obj.title);
                    } else if (obj.status == "nan") {
                        toastr.info(obj.message, obj.title);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-delete', function () {
            var currentRow = $(this).closest("tr");
            var resId = currentRow.find("td:eq(0)").text();
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rID: resId,
                    path: 'deleteReservation'
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == true) {
                        toastr.success(obj.message, obj.title);
                        setTimeout(function () {
                            location.reload(true);
                        }, 1750);
                    } else if (obj.status == false) {
                        toastr.error(obj.message, obj.title);
                        setTimeout(function () {
                            location.reload(true);
                        }, 1750);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                }
            });
        });
    });

</script>