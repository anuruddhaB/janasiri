<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Common();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Common();
    $classObject->$methodName();
}

class Common {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    //Load Service Section to Dropdown
    function loadServiceSection() {
        $users_arr = array();
        $query = "select * from serviceSection where status='1'";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $section = $row['serviceSection'];
            $secid = $row['id'];

            //$users_arr[] = array("id" => $secid, "name" => $section);
            echo "<option value='$secid'>$section</option>";
        }
        echo json_encode($users_arr);
    }

    function loadStatus() {
        $users_arr = array();
        $query = "select * from status";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $status = $row['status'];
            $id = $row['id'];

            //$users_arr[] = array("id" => $secid, "name" => $section);
            echo "<option value='$id'>$status</option>";
        }
    }

    function loadServiceTime() {
        $query = "select * from servicetimeslot";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $section = $row['timeSlot'];

            echo "<option>$section</option>";
        }
    }

//    function autoload_timeSlot() {
//        $query = "select * from servicetimeslot";
//        $resultSet = $this->connection->query($query);
//        while ($row = $resultSet->fetch_assoc()) {
//            $timeSlot = $row['timeSlot'];
//            $id = $row['id'];
//            $dataSet = array("id"=>$id,"timeSlot"=>$timeSlot);
//            echo $dataSet;
//        }
//        
//        
//    }
    function autoLoad_timeSlot() {
        $query = "select * from servicetimeslot";
        $resultSet = $this->connection->query($query);
        $dataSet = array();
        while ($row = $resultSet->fetch_assoc()) {
            $timeSlot = $row['timeSlot'];
            $id = $row['id'];
            $dataSet[] = array("id" => $id, "timeSlot" => $timeSlot);
        }
        echo json_encode($dataSet);
    }

}

?>