<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Vehicle();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Vehicle();
    $classObject->$methodName();
}

class Vehicle {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function VehicleRegistration() {
        $QueryMAxID = "select max(id) from vehicleDetails";
        $resultSet = $this->connection->query($QueryMAxID);
        if ($row = $resultSet->fetch_assoc()) {
            $vehicleID = $row['max(id)'] + 1;
        }

        $vehicleType = $_POST['vehicleType'];
        $company = $_POST['company'];
        $engineNo = $_POST['engineNo'];
        $chasisNo = $_POST['chasisNo'];
        $vinNo = $_POST['vinNo'];
        $mileage = $_POST['mileage'];
        $purchase = $_POST['purchase'];
        $condition = $_POST['condition'];
        $purpose = $_POST['purpose'];
        $date = date("Y-m-d");
        $status = 3;
        try {
            $query = "insert into vehicleDetails values('$vehicleID','$vehicleType','$company','$engineNo','$chasisNo','$vinNo','$mileage','$purchase','$condition','$purpose','$status','$date')";
            $this->connection->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getPendingVehicleList() {
        $Query = " select * from vehicleDetails where status !='1'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $vin = $row['vin'];
            $type = $row['type'];
            $companyName = $row['companyName'];
            $purpose = $row['purpose'];
            $condition = $row['condition'];


            echo "<tr>"
            . "<td>$vin</td>"
            . "<td>$type</td>"
            . "<td>$companyName</td>"
            . "<td> $purpose</td>"
            . "<td>$condition</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-edit'><i class='mdi mdi-account-edit'></i></button>&nbsp<button class='btn btn-sm btn-danger' id='btn-delete'><i class='mdi mdi-delete-sweep'></i></button></td>"
            . "</tr>";
        }
    }

    function updateDetails() {
        $vinNo = $_POST['vinNo'];
        $Query = "select * from vehicleDetails where vin='$vinNo'";
        $resultSet = $this->connection->query($Query);
        $updateData[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $vehicleType = $row['type'];
            $company = $row['companyName'];
            $engineNo = $row['engine'];
            $chasisNo = $row['chasis'];
            $vinNo = $row['vin'];
            $mileage = $row['mileage'];
            $purchase = $row['purchaseDate'];
            $condition = $row['condition'];
            $purpose = $row['purpose'];
            $status = $row['status'];

            $updateData[] = array("type" => $vehicleType, "company" => $company, "engine" => $engineNo, "chasis" => $chasisNo
                , "vin" => $vinNo, "mileage" => $mileage, "purchase" => $purchase, "condition" => $condition, "purpose" => $purpose);
        }
        echo json_encode($updateData);
    }

    function changeStatus() {
        $vin = $_POST['vin'];
        if ($_POST['status'] == 1) {
            $status = 1;
            $message = "Successfully Activated";
        } elseif ($_POST['status'] == 2) {
            $status = 2;
            $message = "Successfully Deactivated";
        }
        $Query = "update vehicleDetails set status = '$status' where vin = '$vin'";
        $this->connection->query($Query);
        echo $message;
    }

    function rentingVehicleList() {
        $date = date("Y-m-d");
        $status = 5;
        $Query = "select vd.* from vehicleRentLog vrl ,vehicleDetails vd where vrl.status='$status' and vrl.date='$date' and vrl.vehicleId = vd.id and vd.purpose='rent'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $vin = $row['vin'];
            $condition = $row['condition'];
            $purpose = $row['purpose'];

            echo "<tr>"
            . "<td>$vin</td>"
            . "<td>$condition</td>"
            . "<td>$purpose</td>"
            . "<td><button class='btn btn-sm btn-success' id='btn-setRent'><i class='ti ti-settings'></i></button></td>"
            . "</tr>";
        }
    }

    function registeredVehicleList() {
        $Query = " select * from vehicleDetails";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $companyName = $row['companyName'];
            $model = $row['type'];
            $engine = $row['engine'];
            $vin = $row['vin'];
            $purdate = $row['purchaseDate'];


            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$companyName</td>"
            . "<td>$model</td>"
            . "<td>$engine</td>"
            . "<td>$vin</td>"
            . "<td>$purdate</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-suspend'>Suspend</button>&nbsp<button class='btn btn-sm btn-danger' id='btn-delete'><i class='mdi mdi-delete-sweep'></i></button></td>"
            . "</tr>";
        }
    }

    function vehicleListFilter() {
        $code = $_POST['vehicleType'];
        try {
            $QuerySetData = "select * from vehicleDetails where companyName like '%$code%'";
            $resultSet = $this->connection->query($QuerySetData);
            if (mysqli_num_rows($resultSet) !== 0) {
                while ($row = $resultSet->fetch_assoc()) {
                    $id = $row['id'];
                    $companyName = $row['companyName'];
                    $model = $row['type'];
                    $engine = $row['engine'];
                    $vin = $row['vin'];
                    $purdate = $row['purchaseDate'];


                    echo "<tr>"
                    . "<td>$id</td>"
                    . "<td>$companyName</td>"
                    . "<td>$model</td>"
                    . "<td>$engine</td>"
                    . "<td>$vin</td>"
                    . "<td>$purdate</td>"
                    . "<td><button class='btn btn-sm btn-primary' id='btn-suspend'>Suspend</button>&nbsp<button class='btn btn-sm btn-danger' id='btn-delete'><i class='mdi mdi-delete-sweep'></i></button></td>"
                    . "</tr>";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
