<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Configuration();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Configuration();
    $classObject->$methodName();
}

class Configuration {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function serverTime() {
        date_default_timezone_set('America/Chicago'); // CDT
        $info = getdate();
        $date = $info['mday'];
        $month = $info['mon'];
        $year = $info['year'];
        $current_date = "$year-$month-$date";
        echo $current_date;
    }

    function bankRegistration() {
        $bankName = $_POST['bankName'];
        $bankAcc = $_POST['bankAcc'];
        $date = date("Y-m-d");
        $status = 1;
        try {
            $QueryBank = "insert into bankDetails(bankName,accNo,date,status) values('$bankName','$bankAcc','$date','$status')";
            $this->connection->query($QueryBank);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function jobRoleRegistration() {
        $jobName = $_POST['jobName'];
        $jobSal = $_POST['jobSal'];
        $date = date("Y-m-d");
        $status = 1;
        try {
            $QueryBank = "insert into jobRole(jobRole,basicSalary,date,status) values('$jobName','$jobSal','$date','$status')";
            $this->connection->query($QueryBank);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>