<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Twilio\Rest\Client;

require '../assets/phpMailer/autoload.php';
require '../assets/Twilio/autoload.php';

require '../assets/phpMailer/Exception.php';
require '../assets/phpMailer/PHPMailer.php';
require '../assets/phpMailer/SMTP.php';
if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Notification();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Notification();
    $classObject->$methodName();
}

class Notification {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function userNotification() {
        $messageBox = [];
        $rid = filter_input(INPUT_POST, 'rid');
        $email = filter_input(INPUT_POST, 'email');

        $query = "select c.fname,c.lname,u.id,s.serviceSection,t.timeSlot,u.resdate,u.message,st.serviceName from userreservation u ,servicesection s ,servicetimeslot t ,servicetype st , customerlogin c where u.sectionid = s.id and u.timeslotid = t.id and u.userid = c.id and u.id ='$rid'";
        $resultset = $this->connection->query($query);
        if (mysqli_num_rows($resultset) !== 0) {
            if ($row = $resultset->fetch_assoc()) {
                $rid = $row['id'];
                $name = $row['fname'] . " " . $row['lname'];
                $section = $row['serviceSection'];
                $time = $row['timeSlot'];
                $resdate = $row['resdate'];
                $msg = $row['message'];
                $service = $row['serviceName'];
            }
            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPAuth = true;
                $mail->Username = 'anonymousbusinesssolution@gmail.com';
                $mail->Password = 'Neeta@12430';
                $mail->isHTML(true);
                $mail->setFrom('anonymousbusinesssolution@gmail.com', 'Janasiri Motor & Service Station');
                $mail->addReplyTo('anonymousbusinesssolution@gmail.com', 'Janasiri Motor & Service Station');
                $mail->addAddress($email, 'Janasiri Motor & Service Station');
                $mail->Subject = 'JMT - Customer Reservation Reminder';
                $mail->Body = "<html><body><h2>Customer Reservation</h2><ul><li>Res ID - $rid</li><li>Name - $name</li><li>Date - $resdate</li><li>Time - $time</li><li>Service - $service</li><li>Section - $section</li><li>Message - $msg</li></ul></body></html>";
                if (!$mail->send()) {
                    $messageBox = array("status" => false, "message" => "email not sent", "title" => "Customer Reminder");
                    echo json_encode($messageBox);
                } else {
                    $messageBox = array("status" => true, "message" => "email sent successfully", "title" => "Customer Reminder");
                    echo json_encode($messageBox);
                }
            } catch (Exception $exc) {
                $messageBox = array("status" => "exec", "message" => "something unexpected happen,please try again ->\n '$exc->getTraceAsString()'", "title" => "Something Unexpected");
                echo json_encode($messageBox);
            }
        } else {
            $messageBox = array("status" => "nan", "message" => "email sent successfully", "title" => "Customer Reminder");
            echo json_encode($messageBox);
        }
    }

    function userReminderSMS() {
        $contact = filter_input(INPUT_POST, 'contact');
        $contact_number = '+94' . $contact;
        $message_body = filter_input(INPUT_POST, 'message');
        $account_sid = 'AC2aeac73bb7b2bff35f8ede1d98e985a6';
        $auth_token = '2361211621c4fb624713c621bf0928f2';
        $twilio_number = "+17276108158";
        $client = new Client($account_sid, $auth_token);
//        $client->messages->create(
//                $contact_number,
//                array(
//                    'from' => $twilio_number,
//                    'body' => $message_body
//                )
//        );
    }

    function userReminderEmamil() {
        $messageBox = [];
        $rid = filter_input(INPUT_POST, 'rid');
        $email = filter_input(INPUT_POST, 'email');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = 'anonymousbusinesssolution@gmail.com';
            $mail->Password = 'Neeta@12430';
            $mail->isHTML(true);
            $mail->setFrom('anonymousbusinesssolution@gmail.com', 'Janasiri Motor & Service Station');
            $mail->addReplyTo('anonymousbusinesssolution@gmail.com', 'Janasiri Motor & Service Station');
            $mail->addAddress($email, 'Janasiri Motor & Service Station');
            $mail->Subject = $title;
            $mail->Body = $body;
            if (!$mail->send()) {
                $messageBox = array("status" => false, "message" => "email not sent", "title" => "Customer Reminder");
                echo json_encode($messageBox);
            } else {
                $messageBox = array("status" => true, "message" => "email sent successfully", "title" => "Customer Reminder");
                echo json_encode($messageBox);
            }
        } catch (Exception $exc) {
            $messageBox = array("status" => "exec", "message" => "something unexpected happen,please try again ->\n '$exc->getTraceAsString()'", "title" => "Something Unexpected");
            echo json_encode($messageBox);
        }
    }

}

?>  