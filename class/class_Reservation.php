<?php

require '../assets/invoicr/invoicr.php';
if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Reservation();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Reservation();
    $classObject->$methodName();
}

class Reservation {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function userReservation() {
        $messageBox = [];
        $username = filter_input(INPUT_POST, 'username');
        $year = filter_input(INPUT_POST, 'year');
        $vehicleModel = filter_input(INPUT_POST, 'vehicleModel');
        $timeSlot = filter_input(INPUT_POST, 'timeSlot');
        $serviceType = filter_input(INPUT_POST, 'serviceType');
        $message = filter_input(INPUT_POST, 'message');
        $date = filter_input(INPUT_POST, 'date');
        $section = 0;
        $queryuser = "select id from customerlogin where username='$username'";
        $resultuser = $this->connection->query($queryuser);
        if ($row = $resultuser->fetch_assoc()) {
            $userid = $row['id'];
        }
        $querytime = "select id from servicetimeslot where timeSlot='9.00AM'";
        $resulttime = $this->connection->query($querytime);
        if ($row = $resulttime->fetch_assoc()) {
            $timeid = $row['id'];
        }
        $queryservice = "select id from servicetype where serviceName='$serviceType'";
        $resultservice = $this->connection->query($queryservice);
        if ($row = $resultservice->fetch_assoc()) {
            $serviceid = $row['id'];
        }

        if ($userid == null || $userid == "") {
            $messageBox = array("status" => "basic", "message" => "user is not valid,please login with valid user", "title" => "Basic Data Fetching Failed");
            echo json_encode($messageBox);
            return true;
        } else if ($timeid == null || $timeid == "") {
            $messageBox = array("status" => "basic", "message" => "time slot is not valid,please login with valid time slot", "title" => "Basic Data Fetching Failed");
            echo json_encode($messageBox);
            return true;
        } else if ($serviceid == null || $serviceid == "") {
            $messageBox = array("status" => "basic", "message" => "service is not valid,please login with valid service", "title" => "Basic Data Fetching Failed");
            echo json_encode($messageBox);
            return true;
        } else {
            $resid = $this->generateValidReservationID();
            $datetime = $this->generateDateTime();
            $resdate = $datetime['date'];
            $restime = $datetime['time'];
            try {
                $queryreservation = "insert into userreservation "
                        . "values('$resid','$userid','$serviceid','$timeid','$message','$resdate','$restime','2','$vehicleModel','$year','Nothing','Nothing','$date','$section')";
                $this->connection->query($queryreservation);
                $messageBox = array("status" => true, "message" => "Successfully Submitted", "title" => "Reservation Complete");
                echo json_encode($messageBox);
            } catch (Exception $exc) {
                $messageBox = array("status" => false, "message" => "Data not submitted", "title" => "Reservation Incomplete");
                echo json_encode($messageBox);
                //echo $exc->getTraceAsString();
            }
        }
    }

    function generateValidReservationID() {
        $random = rand();
        $resid = "RES" . $random;
        $query = "select id from userreservation where id='$resid'";
        $result = $this->connection->query($query);
        if (mysqli_num_rows($result) == 0) {
            return $resid;
        } else {
            $this->generateValidReservationID();
        }
    }

    function generateDateTime() {
        date_default_timezone_set("Asia/Colombo");
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        $datetime = array("date" => $date, "time" => $time);
        return $datetime;
    }

    function pendingReservationList() {
        $Query = "select u.id,c.fname ,c.lname,u.vehicleModel,t.timeSlot,u.message,u.resdate,s.serviceName from userreservation u,customerlogin c,servicetype s ,servicetimeslot t where u.servicetypeid = s.id and u.userid = c.id and u.timeslotid = t.id and u.status ='2' ";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['fname'] . " " . $row['lname'];
            $vModel = $row['vehicleModel'];
            $time = $row['timeSlot'];
            $message = $row['message'];
            $service = $row['serviceName'];
            $date = $row['resdate'];
            $vModel = $row['vehicleModel'];
            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$name</td>"
            . "<td>$vModel</td>"
            . "<td>$date</td>"
            . "<td>$service</td>"
            . "<td>"
            . "<input type='button' value='Approve' id='btn-app' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#updateModal'>&nbsp;"
            . "<input type='button' value='Delete' id='btn-delete' class='btn btn-danger btn-sm'>"
            . "</td>"
            . "</tr>";
        }
    }

    function updateReservation() {
        $sSection = filter_input(INPUT_POST, 'sSection');
        $rNote = filter_input(INPUT_POST, 'rNote');
        $oNote = filter_input(INPUT_POST, 'oNote');
        $rID = filter_input(INPUT_POST, 'rID');
        $status = filter_input(INPUT_POST, 'status');

        try {
            $Query = "update userreservation set replaceNote = '$rNote',note = '$oNote',sectionid = '$sSection',status = '$status' where id = '$rID'";
            $resultSet = $this->connection->query($Query);
            $messageBox = array("status" => true, "message" => "Successfully Submitted", "title" => "Reservation Complete");
            echo json_encode($messageBox);
        } catch (Exception $exc) {
            $messageBox = array("status" => false, "message" => "Data not submitted", "title" => "Reservation Incomplete");
            echo json_encode($messageBox);
        }
    }

    function generateReservation() {
        $rID = filter_input(INPUT_POST, 'rID');
        $status = filter_input(INPUT_POST, 'status');
        $dataset = [];
        try {
            $query = "select u.id,u.note,u.replaceNote,c.fname ,c.lname,c.email,c.contact,u.vehicleModel,u.Vehicleyear,t.timeSlot,u.message,u.resdate,s.serviceName from userreservation u,customerlogin c,servicetype s ,servicetimeslot t where u.servicetypeid = s.id and u.userid = c.id and u.timeslotid = t.id and u.status ='$status' and u.id = '$rID'";
            $resultSet = $this->connection->query($query);
            if (mysqli_num_rows($resultSet) !== 0) {
                if ($row = $resultSet->fetch_assoc()) {
                    $id = $row['id'];
                    $resdate = $row['resdate'];
                    $name = $row['fname'] . " " . $row['lname'];
                    $contact = $row['contact'];
                    $vmodel = $row['vehicleModel'];
                    $year = $row['Vehicleyear'];
                    $service = $row['serviceName'];
                    $email = $row['email'];
                    $message = $row['message'];
                    $replaceNote = $row['replaceNote'];
                    $note = $row['note'];
                    $time = $row['timeSlot'];
                }
                $dataset = array('id' => $id, 'rdate' => $resdate, 'name' => $name, 'contact' => $contact, 'vmodel' => $vmodel, 'year' => $year, 'message' => $message, 'service' => $service, 'email' => $email, 'note' => $note, 'rnote' => $replaceNote, 'time' => $time);
                echo json_encode($dataset);
            } else {
                echo json_encode("No data");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function deleteReservation() {
        $rID = filter_input(INPUT_POST, 'rID');
        try {
            $Query = "update userreservation set status = '4' where id = '$rID'";
            $resultSet = $this->connection->query($Query);
            $messageBox = array("status" => true, "message" => "Successfully Deleted", "title" => "Deletion Complete");
            echo json_encode($messageBox);
        } catch (Exception $exc) {
            $messageBox = array("status" => false, "message" => "Deletion Failed", "title" => "Error Occured,Please try again");
            echo json_encode($messageBox);
        }
    }

    function onProcessList() {
        $date = date('Y-m-d');
        $Query = "select u.id,c.fname ,c.lname,u.vehicleModel,t.timeSlot,u.message,u.resdate,s.serviceName,ss.serviceSection from userreservation u,customerlogin c,servicetype s ,servicetimeslot t,servicesection ss where u.sectionid = ss.id and u.servicetypeid = s.id and u.userid = c.id and u.timeslotid = t.id and u.status ='1' and resdate = '$date'";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $service = $row['serviceName'];
            $section = $row['serviceSection'];

            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$section</td>"
            . "<td>$service</td>"
            . "<td>"
            . "<i type='button' value='' id='btn-editinfo' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#reservationUpdateModal'><span class='fa fa-edit'></span></i>&nbsp;"
            . "<input type='button' value='Complete' id='btn-complete' class='btn btn-success btn-sm'data-toggle='modal' data-target='#reservationCompleteModal'/>"
            . "</td>"
            . "</tr>";
        }
    }

    function sectionUpdation() {
        $rNote = filter_input(INPUT_POST, 'rnote');
        $oNote = filter_input(INPUT_POST, 'note');
        $rID = filter_input(INPUT_POST, 'rID');
        try {
            $Query = "select replaceNote,note from userreservation where id = '$rID'";
            $resultSet = $this->connection->query($Query);
            if (mysqli_num_rows($resultSet) !== 0) {
                if ($row = $resultSet->fetch_assoc()) {
                    $replaceNote = $row['replaceNote'];
                    $note = $row['note'];
                    $newRonte = $replaceNote . "\n" . $rNote;
                    $newNote = $note . "\n" . $oNote;
                }
            } else {
                $newRonte = $rNote;
                $newNote = $note;
            }
            $Query = "update userreservation set replaceNote = '$newRonte',note = '$newNote' where id = '$rID'";
            $resultSet = $this->connection->query($Query);
            $messageBox = array("status" => true, "message" => "Successfully Submitted", "title" => "Reservation Complete");
            echo json_encode($messageBox);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $messageBox = array("status" => false, "message" => "Data not submitted", "title" => "Reservation Incomplete");
            echo json_encode($messageBox);
        }
    }

    function sectionSorting() {
        $secid = filter_input(INPUT_POST, 'secid');
        $date = date('Y-m-d');
        try {
            $Query = "select u.id,c.fname ,c.lname,u.vehicleModel,t.timeSlot,u.message,u.resdate,s.serviceName,ss.serviceSection from userreservation u,customerlogin c,servicetype s ,servicetimeslot t,servicesection ss where u.sectionid = ss.id and u.servicetypeid = s.id and u.userid = c.id and u.timeslotid = t.id and u.status ='1' and resdate = '$date' and sectionid = '$secid'";
            $resultSet = $this->connection->query($Query);
            $dataSet[] = array();
            while ($row = $resultSet->fetch_assoc()) {
                $id = $row['id'];
                $service = $row['serviceName'];
                $section = $row['serviceSection'];

                echo "<tr>"
                . "<td>$id</td>"
                . "<td>$section</td>"
                . "<td>$service</td>"
                . "<td>"
                . "<i type='button' value='' id='btn-editinfo' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#reservationUpdateModal'><span class='fa fa-edit'></span></i>&nbsp;"
                . "<input type='button' value='Complete' id='btn-complete' class='btn btn-success btn-sm'/>"
                . "</td>"
                . "</tr>";
            }
        } catch (Exception $ex) {
            
        }
    }

    function customerNameSearch() {
        $rID = filter_input(INPUT_POST, 'rID');
        $dataset = [];
        try {
            $query = "SELECT u.id,c.fname,c.lname,c.address,c.email,c.contact from userreservation u,customerlogin c where u.id='$rID' and u.userid = c.id and u.status ='1'";
            $resultSet = $this->connection->query($query);
            if (mysqli_num_rows($resultSet) !== 0) {
                if ($row = $resultSet->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['fname'] . " " . $row['lname'];
                    $address = $row['address'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                }
                $dataset = array('id' => $id, 'name' => $name, 'address' => $address, 'contact' => $contact, 'email' => $email);
                echo json_encode($dataset);
            } else {
                echo json_encode("nulldata");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function testInvoice() {
        $invoice = new Invoicr();
        $invoice->set("company", [
            (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "cb-logo.png",
            __DIR__ . DIRECTORY_SEPARATOR . "cb-logo.png",
            "Janasiri Motor Traders & Service Station",
            "No-57,Colombo Street,Kandy",
            "Phone:  077-725-2549 | Fax: 081-388-5607",
            "https://www.janasirimotors.com",
            "jmtinfo@gmail.com"
        ]);
        $invoice->set("invoice", [
            ["Invoice #", "CB-123-456"],
            ["DOP", "2011-11-11"],
            ["P.O. #", "CB-789-123"],
            ["Due Date", "2011-12-12"]
        ]);
        $invoice->set("billto", [
            "Customer Name",
            "Street Address",
            "City, State, Zip"
        ]);
        $invoice->set("shipto", [
            "Customer Name",
            "Street Address",
            "City, State, Zip"
        ]);
        $items = [
            ["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
            ["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
            ["Rubber Band", "", 10, "$0.10", "$1.00"],
            ["Rubber Stamp", "", 3, "$12.30", "$36.90"],
            ["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
        ];
        foreach ($items as $i) {
            $invoice->add("items", $i);
        }
        $invoice->set("totals", [
            ["SUB-TOTAL", "$108.00"],
            ["DISCOUNT 10%", "-$10.80"],
            ["GRAND TOTAL", "$97.20"]
        ]);
        $invoice->set("notes", [
            "Cheques should be made payable to Code Boxx",
            "Get a 10% off with the next purchase with discount code DOGE1234!"
        ]);
        $invoice->template("simple");
        $invoice->outputPDF(1, "../invoice.pdf");
    }

}

?>
