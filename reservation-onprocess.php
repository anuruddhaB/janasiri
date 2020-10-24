<?php
require './base/header.php';
?>
<div class="row">
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">On Process Reservation - <?php echo date('Y-m-d') ?></h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-8">
                        <select class="form-control form-control-sm" id="res-section">
                            <option value="0">Select Status</option>
                        </select>
                    </div>  
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first" id="reservation-list-tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Section</th>
                                <th>Service Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="onprocess-list">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Service Section</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" >
        <div class="card">
            <h5 class="card-header">Customer Info</h5>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-8">
                        <input id="res-id-search" type="text" placeholder="RES1206561399" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <a href="#" class="btn btn-primary btn-sm btn-block" id="btn-id-search">Search</a>
                    </div>
                </div>
                <div class="row">
                    <ul>
                        <li>Name : <label class="badge-light badge-pill" id="search-name"></label></li>
                        <li>Email : <label class="badge-light badge-pill" id="search-email"></label></li>
                        <li>Contact : <label class="badge-light badge-pill" id="search-contact"></label></li>
                        <li>Address : <label class="badge-light badge-pill" id="search-address"></label></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Remind Customer(SMS & Email)</label>
                        <textarea class="form-control form-control-sm" id="search-message" rows="3" placeholder="Speciel Reminder for Customer"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <button  type="button" class="btn btn-success btn-sm btn-block" id="btn-sms">Send Reminder</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
<div id="reservationUpdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reservation Details</h4>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Time</label>
                                <input id="res-time" type="text" class="form-control form-control-sm" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Replace Notes</label>
                            <textarea class="form-control form-control-sm" id="res-replace" rows="7" ></textarea>
                        </div>     
                        <div class="form-group col-6">
                            <label>Other Notes</label>
                            <textarea class="form-control form-control-sm" id="res-note" rows="7" ></textarea>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-6 right">
                    <div class="row">
                        <div class="col-8">
                            <button type="button" class="btn btn-success btn-block" id="btn-update"><i class="fa fa-edit"></i>Update</button>
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
<div id="reservationCompleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md"">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reservation Completion</h4>
                <button type="button" class="close" id="btn-close"data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body text-center">
                <h5 class="text-left">Are your sure this <span>RES484316131</span> is Completed ?</h5>
                <i class="fa  fa-trophy fa-4x "></i>
            </div>
            <div class="modal-footer ">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-dark btn-block" id="btn-yes">Yes</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-dark btn-block" id="btn-no">No</button>
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
        $(document).on('click', '#btn-sms', function () {
            $.ajax({

            });
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
            url: "class/class_Reservation.php",
            context: document.body,
            type: "POST",
            DataType: "JSON",
            data: {
                path: 'onProcessList'
            },
            success: function (data) {
                $("#onprocess-list").html(data);
            }});
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-editinfo', function () {
            var currentRow = $(this).closest("tr");
            var resId = currentRow.find("td:eq(0)").text();
            var status = 1;
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rID: resId,
                    status: status,
                    path: 'generateReservation'
                },
                success: function (data) {
                    var stack = JSON.parse(data);
                    $('#res-id').val(stack.id);
                    $('#res-date').val(stack.rdate);
                    $('#res-name').val(stack.name);
                    $('#res-time').val(stack.time);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-update', function () {
            var resId = $('#res-id').val();
            var rnote = $('#res-replace').val();
            var note = $('#res-note').val();
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rID: resId,
                    rnote: rnote,
                    note: note,
                    status: status,
                    path: 'sectionUpdation'
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
                        }, 0750);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function () {
        $(document).on('change', '#res-section', function () {
            var section = $('#res-section').val();
            alert(section);
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    secid: section,
                    path: 'sectionSorting'
                },
                success: function (data) {
                    $("#onprocess-list").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-id-search', function () {
            var resId = $('#res-id-search').val();
            if (resId == null || resId == '') {
                toastr.info("Please enter reservation id", "Missing Information");
            } else {
                $.ajax({
                    url: "class/class_Reservation.php",
                    context: document.body,
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        rID: resId,
                        path: 'customerNameSearch'
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);
                        $('#search-name').text(obj.name);
                        $('#search-email').text(obj.email);
                        $('#search-address').text(obj.address);
                        $('#search-contact').text(obj.contact);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                        console.log(errorThrown);
                    }
                });
            }
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-sms', function () {
            var contact = $('#search-contact').text();
            var rid = $('#res-id-search').val();
            var email = $('#search-email').text();
            var message = $('#search-message').val();
            var title = "JMT - Message from Service Centre";
            $.ajax({
                url: "class/class_Notification.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    contact: contact,
                    message: message,
                    path: 'userReminderSMS'
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
                        }, 0750);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
            $.ajax({
                url: "class/class_Notification.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    rid: rid,
                    email: email,
                    body: message,
                    title: title,
                    path: 'userReminderEmamil'
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
                        }, 0750);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-yes', function () {
            $.ajax({
                url: "class/class_Reservation.php",
                context: document.body,
                type: "POST",
                DataType: "JSON",
                data: {
                    path: 'testInvoice'
                },
                success: function (data) {
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>

