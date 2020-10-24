<?php
require 'header.php';
?>

<section class="cat-area section-gap" id="feature">
    <div class="container">	
        <form action="" name="registration">
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-10">
                        <input type="text" class="single-input" id="name" placeholder="Name" disabled>
                    </div>
                    <div class="mt-10">
                        <input type="text" class="single-input" id="username" placeholder="Username" value="<?php echo $loginUsername ?>" disabled>
                    </div>
                    <div class="mt-10">
                        <input type="text" class="single-input" id="email" placeholder="Email" disabled>
                    </div>
                    <div class="mt-10">
                        <input type="text" class="single-input" id="address" placeholder="Address" disabled>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-10">
                                <input type="text"  class="single-input" id="contact" placeholder="Contact No" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-10">
                                <span class="validityText" id="vResDate">Please select date</span>
                                <input type='date'  id="resDate" class="single-input"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="mt-10">
                                <span class="validityText" id="vModel">Please select vehicle model</span>
                                <input type="text" id="vehicle-model" class="single-input" placeholder="Vehicle Model">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-10">
                                <span class="validityText" id="vYear">Please select year</span>
                                <input type="text" id="year" class="single-input" placeholder="Year" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-10">
                                <div class="input-group-icon mt-10">
                                    <span class="validityText" id="vService">Please select service</span>
                                    <div class="form-select" id="default-select" >
                                        <select id="service-type">
                                            <option value="0"> Choose Service Type</option>>
                                            <option> Engine Repair</option>>
                                            <option> Monthly Service</option>>
                                            <option> Wash and Wax</option>>
                                            <option> Paint Job</option>>
                                            <option> Other</option>>
                                            <option> Body repair</option>>
                                            <option> Accident Evaluation</option>>
                                            <option> Checkup and maintain</option>>
                                        </select>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-icon mt-10">
                                <span class="validityText" id="vTimeSlot">Please select time slot</span>
                                <div class="form-select" id="default-select">
                                    <select id="timeSlot">
                                        <option value="0">Choose Time Slot</option>
                                        <option>9.00AM</option>
                                        <option>10.00AM</option>
                                        <option>11.00AM</option>
                                        <option>12.00</option>
                                        <option>13.00PM</option>
                                        <option>14.00PM</option>
                                        <option>15.00PM</option>
                                        <option>16.00PM</option>
                                        <option>17.00PM</option>
                                        <option>18.00PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <textarea class="single-textarea" id="message" placeholder="Message"></textarea>
                    </div>
                    <div class="mt-10 text-rigth"> 
                        <button type="button" id="btn-clear" class="genric-btn danger">Clear</button>
                        <button type="button" id="btn-save" class="genric-btn success">Save</button>
                    </div>
                </div>
                <div class="col-md-6 " style="background:url('img/mecha.jpg')">

                </div>
            </div>
        </form>
    </div>	
</section
<?php
require 'footer.php';
?>
<script>
    $(document).ready(function () {
        $('.validityText').hide();
        $('#year').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
    });
    $(document).ready(function () {
        var username = $('#username').val();
        $.ajax({
            url: "../class/class_userLogin.php",
            type: "POST",
            DataType: "JSON",
            data: {
                username: username,
                path: 'userProfileData'
            },
            success: function (data) {
                var dataSet = JSON.parse(data);
                $('#name').val(dataSet['fname'] + " ," + dataSet['lname']);
                $('#email').val(dataSet['email']);
                $('#address').val(dataSet['addl1'] + " , " + dataSet['addl2'] + " , " + dataSet['addl3']);
                $('#contact').val(dataSet['contact']);
                $('#username').val(dataSet['username']);
                $('.single-input').css("border", "1px solid black");
                $('.single-textarea').css("border", "1px solid #28df99");
                $('.form-select').css("border", "1px solid black");
                $('#year , #vehicle-model').css("border", "1px solid #28df99");
                $('.form-select').css("border", "1px solid #28df99");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR);
                console.log(errorThrown);
            }
        });
    });
    $(document).ready(function () {
        $(document).on('click', '#btn-save', function () {
            var username = $('#username').val();
            var year = $('#year').val();
            var vehicleModel = $('#vehicle-model').val();
            var resdate = $('#resDate').val();
            var serviceType = $('#service-type').val();
            var timeSlot = $('#timeSlot').val();
            var message = $('#message').val();
            var info = "Please fill the relavent values";
            var title = "Missing information";
            if (vehicleModel == "" || vehicleModel == null) {
                toastr.info(info, title);
            } else if (year == null || year == "") {
                toastr.info(info, title);
            } else if (resdate == null || resdate == "") {
                toastr.info(info, title);
            } else if (serviceType == 0) {
                toastr.info(info, title);
            } else if (timeSlot == 0) {
                toastr.info(info, title);
            } else {
                vModel(vehicleModel);
                vYear(year);
                vService(serviceType);
                vTimeSlot(timeSlot);
                vResDate(resdate);
                $.ajax({
                    url: "../class/class_Reservation.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        username: username,
                        year: year,
                        vehicleModel: vehicleModel,
                        serviceType: serviceType,
                        timeSlot: timeSlot,
                        message: message,
                        date: resdate,
                        path: 'userReservation'
                    },
                    success: function (data) {
                        var obj = JSON.parse(data);
                        if (obj.status == true) {
                            toastr.success(obj.message, obj.title);
                        } else if (obj.status == false) {
                            toastr.error(obj.message, obj.title);
                        } else {
                            toastr.info(obj.message, obj.title);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.error("Something Unexpected happen,please try again", "Unexpected Issue");
                    }
                });
            }


        });
    });

    function  vModel(value) {
        if (value == null || value == "") {
            $('#vModel').show();
        } else if (value !== null || value !== "") {
            $('#vModel').hide();
        }
    }
    function  vYear(value) {
        if (value == null || value == "") {
            $('#vYear').show();
        } else if (value !== null || value !== "") {
            $('#vYear').hide();
        }
    }
    function  vService(value) {
        if (value == 0 || value == "0") {
            $('#vService').show();
        } else if (value !== 0 || value !== "0") {
            $('#vService').hide();
        }
    }
    function  vTimeSlot(value) {
        if (value == 0 || value == "0") {
            $('#vTimeSlot').show();
        } else if (value !== 0 || value !== "0") {
            $('#vTimeSlot').hide();
        }
    }
    function  vResDate(value) {
        if (value == null || value == "") {
            $('#vResDate').show();
        } else if (value !== 0 || value !== "0") {
            $('#vResDate').hide();
        }
    }
    $(document).ready(function () {
        $(document).on("click", "#btn-clear", function () {
            $(this).closest('form').find("#year,#message,#vehicle-model").val("");
        })
    });
</script>

<?php
?>

