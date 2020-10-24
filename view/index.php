<?php
//session_start();
//if (isset($_SESSION['usercusname'])) {
//    $loginUsername = $_SESSION['usercusname'];
//} else {
//    $loginUsername = "Not Logged In";
//}
require 'header.php';
?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    You'r Wheel's in Good Hand				
                </h1>
            </div>	
        </div>
    </div>
</section>
<section>
    <div class='container'>
        <div class="row">
            <div class='col-md-4'>
                <div class="mt-10">
                    <input type="text" id="loginusername" name="logusername" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
                </div>
            </div>
            <div class='col-md-4'>
                <div class="mt-10">
                    <input type="password" id="loginpassword" name="logpassword" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">                     
                </div>
            </div>
            <div class='col-md-4 float-right'>
                <div class="mt-10">
                    <button type="submit" name="loginUser" class="genric-btn success" id="btn-login">Log In</button> 
                    <button type="button" class="genric-btn primary" data-toggle="modal" data-target="#myModal">Register</button>                   
                </div>
            </div>                       
        </div>
    </div>
</section>
<!-- End banner Area -->
<section class="cat-area section-gap" id="feature">
    <div class="container">							
        <div class="row">
            <div class="col-lg-4">	
                <div class="single-cat d-flex flex-column">
                    <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-magic-wand"></span></span></a>
                    <h4 class="mb-20" style="margin-top: 23px;">Maintenance</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
                    </p>
                </div>															
            </div>
            <div class="col-lg-4">	
                <div class="single-cat">
                    <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-rocket"></span></span></a>
                    <h4 class="mt-40 mb-20">Residental Service</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
                    </p>
                </div>															
            </div>
            <div class="col-lg-4">
                <div class="single-cat">
                    <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-bug"></span></span></a>
                    <h4 class="mt-40 mb-20">Commercial Service</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
                    </p>
                </div>							
            </div>
        </div>
    </div>	
</section>
<!-- End cat Area -->		

<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-30 header-text text-center">
                <h1 class="mb-10">Our Capturing Market Sectors</h1>
                <p>
                    Who are in extremely love with eco friendly system..
                </p>
            </div>
        </div>						
        <div class="row">
            <div class="col-lg-4">
                <div class="single-service">
                    <div class="thumb">
                        <img src="img/s1.jpg" alt="">									
                    </div>
                    <h4>Automotive Engineering</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service">
                    <div class="thumb">
                        <img src="img/s2.jpg" alt="">									
                    </div>
                    <h4>Construction & Engineering</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service">
                    <div class="thumb">
                        <img src="img/s3.jpg" alt="">									
                    </div>
                    <h4>Industrial Engineering</h4>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                    </p>
                </div>
            </div>												
        </div>
    </div>	
</section>
<!-- End service Area -->


<!-- Start faq Area -->
<section class="faq-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 col-md-6">
                <div class="single-faq">
                    <div class="circle">
                        <div class="inner"></div>
                    </div>
                    <h5><span class="counter">2</span>K+</h5>
                    <p>
                        Projects Completed
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-faq">
                    <div class="circle">
                        <div class="inner"></div>
                    </div>
                    <h5><span class="counter">5.5</span>K</h5>
                    <p>
                        Total Employees
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-faq">
                    <div class="circle">
                        <div class="inner"></div>
                    </div>
                    <h5 class="counter">959</h5>
                    <p>
                        Happy Clients
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-faq">
                    <div class="circle">
                        <div class="inner"></div>
                    </div>
                    <h5 class="counter">367</h5>
                    <p>
                        Tickets Submited
                    </p>
                </div>
            </div>																		
        </div>
    </div>	
</section>
<!-- End faq Area -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="mt-30 text-center">
                                <h3>Register Here</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-10">
                                        <input type="text" id="fname" placeholder="First Name" class="single-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-10">
                                        <input type="text" id="lname" placeholder="Last Name"  class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-10">
                                        <input type="email" id="email" placeholder="Email" class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mt-10">
                                        <input type="text" id="addl1" placeholder="Address Line 1" class="single-input">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-10">
                                        <input type="text" id="addl2" placeholder="Address Line 2" class="single-input">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-10">
                                        <input type="text" id="addl3" placeholder="Address Line 3" class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-10">
                                        <input type="text" id="contactNumber" placeholder="Contact Number" class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-10">
                                        <input type="text" id="username" placeholder="Username" class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-10">
                                        <input type="text" id="password" placeholder="Password" class="single-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-10">
                                        <input type="text" id="confirmPassword" placeholder="Confirm Password" class="single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 text-rigth">
                                <a href="#" class="genric-btn success" id="btn-createAccount">Create Account</a>                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
require 'footer.php';
?>
<script>
    //Register new customer
    $(document).ready(function () {
        $(document).on("click", "#btn-createAccount", function () {
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var contact = $("#contactNumber").val();
            var address = $("#addl1").val() + "," + $("#addl2").val() + "," + $("#addl3").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var cpassword = $("#confirmPassword").val();
            if (password == cpassword) {
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
                        password: password,
                        cpassword: cpassword,
                        address: address,
                        path: 'userSignUp'
                    },
                    success: function (data) {
                        alert(data);
                        console.log(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                        console.log(errorThrown);
                    }
                });
            } else {
                alert("Please enter matching password");
            }

        });
    });
    //Login customer
    $(document).ready(function () {
        $(document).on("click", "#btn-login", function () {
            var username = $("#loginusername").val();
            var password = $("#loginpassword").val();
            $.ajax({
                url: "../class/class_userLogin.php",
                type: "POST",
                DataType: "JSON",
                data: {
                    username: username,
                    password: password,
                    path: 'usersLogin'
                },
                success: function (data) {
                    var dataSet = $.parseJSON(data);
                    var status = dataSet.stat;
                    if (status == "notmatch" || status == 'notmatch') {
                        alert("Please Check username and password");
                    } else if (status == "match" || status == 'match') {
                        location.reload();
                    } else if (status == "wrong" || status == 'wrong') {
                        alert("Please Check username and password");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });

</script>   
