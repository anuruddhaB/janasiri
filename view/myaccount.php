<?php
session_start();
if (isset($_SESSION['validuser']) && isset($_SESSION['usercusname'])) {
    $loginUsername = $_SESSION['usercusname'];
} else {
    header("Location: index.php");
}
require 'header.php';
?>
<style>
    #editProfile{
        color: #fffc;
    }
    /*    .single-input{
            border: 1px solid #56ec1a;
        }*/
</style>
<section class="cat-area section-gap" id="feature">
    <div class="container">							
        <div class="row">
            <div class="col-md-6">
                <div class="mt-10">
                    <input type="text" id="fname" placeholder="First Name" class="single-input" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-10">
                    <input type="text" id="lname" placeholder="Last Name"  class="single-input" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-10">
                    <input type="email" id="email" placeholder="Email" class="single-input" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="text" id="addl1" placeholder="Address Line 1" class="single-input" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="text" id="addl2" placeholder="Address Line 2" class="single-input" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="text" id="addl3" placeholder="Address Line 3" class="single-input" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-10">
                    <input type="text" id="contactNumber" placeholder="Contact Number" class="single-input" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-10">
                    <input type="text" id="username" placeholder="Username" class="single-input" value='<?php echo $loginUsername ?>' disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="password" id="currentPassword" placeholder="Current Password" class="single-input" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="password" id="password" placeholder="Password" class="single-input" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mt-10">
                    <input type="password" id="confirmPassword" placeholder="Confirm Password" class="single-input" disabled>
                </div>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-12">
                <div class="mt-10">
                    <a  class="btn btn-primary" id="editProfile">Edit Profile</a>
                </div>
            </div>
        </div>
</section>
<?php
require 'footer.php';
?>
<script>
    $(document).ready(function () {
        var username = $('#username').val();
        console.log(username);
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
                $('#fname').val(dataSet['fname']);
                $('#lname').val(dataSet['lname']);
                $('#email').val(dataSet['email']);
                $('#addl1').val(dataSet['addl1']);
                $('#addl2').val(dataSet['addl2']);
                $('#addl3').val(dataSet['addl3']);
                $('#contactNumber').val(dataSet['contact']);
                $('#username').val(dataSet['username']);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR);
                console.log(errorThrown);
            }


        });
    });
    //Enable Data Form
    $(document).ready(function () {
        $(document).on('click', '#editProfile', function () {
            var textData = $('#editProfile').text();
            if (textData == "Edit Profile") {
                event.preventDefault();
                $('.single-input').prop("disabled", false);
                $('#username').prop("disabled", true);
                $('.single-input').css({"border": "1px solid #56ec1a"});
                $('#username').css({"border": ""});
                $('#editProfile').text("Save Profile Data");
            } else if (textData == "Save Profile Data") {
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var contact = $("#contactNumber").val();
                var address = $("#addl1").val() + "," + $("#addl2").val() + "," + $("#addl3").val();
                var username = $("#username").val();
                var currentPassword = $("#currentPassword").val();
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();
                $.ajax({
                    url: "../class/class_userLogin.php",
                    type: "POST",
                    DataType: "JSON",
                    data: {
                        fname: fname,
                        lname: lname,
                        email: email,
                        contact: contact,
                        username: username,
                        currentPassword: currentPassword,
                        password: password,
                        confirmPassword: confirmPassword,
                        address: address,
                        path: 'userProfileUpdate'
                    },
                    success: function (data) {
                        alert(data);
                        this.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                        console.log(errorThrown);
                    }
                });
            }
        });
    });
</script>