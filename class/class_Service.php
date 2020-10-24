<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Service();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Service();
    $classObject->$methodName();
}

class Service {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function autoloadID() {
        $arrayID[] = array();
        $timeSlotID = "select max(id) from servicetimeslot";
        $resultSet = $this->connection->query($timeSlotID);
        if ($row = $resultSet->fetch_assoc()) {
            $timeSlot = $row['max(id)'] + 1;
        }
        $sectionID = "select max(id) from serviceSection";
        $resultSet = $this->connection->query($sectionID);
        if ($row = $resultSet->fetch_assoc()) {
            $section = $row['max(id)'] + 1;
        }
        $secTypeID = "select max(id) from servicetype";
        $resultSet = $this->connection->query($secTypeID);
        if ($row = $resultSet->fetch_assoc()) {
            $secType = $row['max(id)'] + 1;
        }
        $vehTypeID = "select max(id) from vehicletype";
        $resultSet = $this->connection->query($vehTypeID);
        if ($row = $resultSet->fetch_assoc()) {
            $vehType = $row['max(id)'] + 1;
        }
        $arrayID = array($timeSlot, $vehType, $section, $secType);
        echo json_encode($arrayID);
    }

    function sectionReg() {
        $id = $_POST['secid'];
        $section = $_POST['secname'];
        $date = date("Y-m-d");
        $status = 1;
        try {
            $query = "insert into serviceSection values('$id','$section','$date','$status')";
            $this->connection->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function vehicleModelReg() {
        $id = $_POST['vehid'];
        $vehname = $_POST['vehname'];
        $status = 1;
        try {
            $query = "insert into vehicletype values('$id','$vehname','$status')";
            $this->connection->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function timeSlotReg() {
        $id = $_POST['timeid'];
        $timeslot = $_POST['timeslot'];
        $status = 1;
        try {
            $query = "insert into serviceTimeSlot values('$id','$timeslot','$status')";
            $this->connection->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function sectionTypeReg() {
        $sectid = $_POST['sectid'];
        $sectname = $_POST['sectname'];
        $sectdesc = $_POST['sectdesc'];
        $sectsec = $_POST['sectsec'];
        $date = date("Y-m-d");
        $status = 1;
        try {
            $querySave = "insert into servicetype values('$sectid','$sectname','$sectdesc','$sectsec','$date','$status')";
            $this->connection->query($querySave);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    function autoLoadServiceSection() {
        $query = "select * from servicesection WHERE  status = '1'";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $secid = $row['id'];
            $section = $row['serviceSection'];

            echo "<tr>"
            . "<td>$secid</td>"
            . "<td>$section</td>"
            . "<td style='width:75px'><button class='btn btn-danger btn-xs'id='btn-section-delete'>Delete</button></td>"
            . "</tr>";
        }
    }

    function autoLoadServiceType() {
        $query = "select * from servicetimeslot WHERE  status = '1'";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $secid = $row['id'];
            $section = $row['timeSlot'];

            echo "<tr>"
            . "<td>$secid</td>"
            . "<td>$section</td>"
            . "<td style='width:75px'><button class='btn btn-danger btn-xs'id='btn-time-delete'>Delete</button></td>"
            . "</tr>";
        }
    }

    function autoLoadServiceList() {
        $query = "SELECT st.id,st.serviceName,st.description,ss.serviceSection,st.date FROM servicetype st,servicesection ss WHERE st.secid=ss.id AND st.status = '1'";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $service = $row['serviceName'];
            $desc = $row['description'];
            $section = $row['serviceSection'];
            $date = $row['date'];

            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$service</td>"
            . "<td>$section</td>"
            . "<td>$desc</td>"
            . "<td>$date</td>"
            . "<td style='width:75px'><button class='btn btn-danger btn-xs' id='btn-service-delete'>Delete</button></td>"
            . "</tr>";
        }
    }

    function serviceListFilter() {
        $serviceName = $_POST['serviceName'];
        $serviceSection = $_POST['serviceSection'];
        try {
            $QuerySetData = "SELECT st.id,st.serviceName,st.description,ss.serviceSection,st.date FROM servicetype st,servicesection ss WHERE st.secid=ss.id AND serviceName LIKE '%$serviceName%'";
            $resultSet = $this->connection->query($QuerySetData);
            if (mysqli_num_rows($resultSet) !== 0) {
                while ($row = $resultSet->fetch_assoc()) {
                    $id = $row['id'];
                    $serviceName = $row['serviceName'];
                    $serviceSection = $row['serviceName'];
                    $desc = $row['description'];
                    $date = $row['date'];

                    echo "<tr>"
                    . "<td>$id</td>"
                    . "<td>$serviceName</td>"
                    . "<td>$desc</td>"
                    . "<td>$serviceSection</td>"
                    . "<td>$date</td>"
                    . "<td style='width:75px'><button class='btn btn-danger btn-xs' id='btn-service-delete'>Delete</button></td>"
                    . "</tr>";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function removeFromTableService() {
        $id = $_POST['serviceCode'];
        echo $id;
        try {
            $query = "update servicetype set status='2' where id='$id'";
            $this->connection->query($query);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    function removeFromTableTime() {
        $id = $_POST['serviceCode'];
        echo $id;
        try {
            $query = "update servicetimeslot set status='2' where id='$id'";
            $this->connection->query($query);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

    function removeFromTableSection() {
        $id = $_POST['serviceCode'];
        echo $id;
        try {
            $query = "update servicesection set status='2' where id='$id'";
            $this->connection->query($query);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

}
?>

