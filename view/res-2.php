<?php
require 'header.php';

$connection = new mysqli("localhost", "root", "", "jmt_db");
$queryService = "select * from servicesection where status ='1'";
$resultSetService = $connection->query($queryService);
$queryTime = "select * from servicetimeslot where status ='1'";
$resultSetTime = $connection->query($queryTime);
?>
<section class="button-area">
    <div class="container border-top-generic">
        <h3 class="text-heading">Make You'r Reservation</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="mt-10">
                    <input type="text" name="password" placeholder="Name" id="one" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="password" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="password" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="password" placeholder="Contact No" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-10">
                            <input type="text" name="password" placeholder="Vehicle Model" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-10">
                            <input type="text" name="password" placeholder="Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-10">
                            <div class="input-group-icon mt-10">
                                <div class="form-select" id="default-select">
                                    <select id="service-type">
                                        <option>Select Service</option>
                                        <?php
                                        while ($row = $resultSetService->fetch_assoc()) {
                                            $section = $row['serviceSection'];
                                            $secid = $row['id'];
                                            echo "<option value='$secid'>$section</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group-icon mt-10">
                            <div class="form-select" id="default-select">
                                <select id="time-slot">
                                    <option>Time Slot</option>
                                    <?php
                                    while ($row = $resultSetTime->fetch_assoc()) {
                                        $section = $row['timeSlot'];
                                        $secid = $row['id'];
                                        echo "<option value='$secid'>$section</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                </div>
                <div class="mt-10 text-rigth"> 
                    <button type="submit" name="login" value="Submit" class="genric-btn success large">Make Reservation</button>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require 'footer.php';
?>

