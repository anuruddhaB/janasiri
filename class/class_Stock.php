<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Stock();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Stock();
    $classObject->$methodName();
}

class Stock {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function saveShipmentRecorde() {
        $shipPer = $_POST['shipPer'];

        $QuerySelect = "select id from shippingperson where name ='$shipPer'";
        $resultSet = $this->connection->query($QuerySelect);
        if ($row = $resultSet->fetch_assoc()) {
            $shipPerID = $row['id'];
        }


        $QueryID = "select max(id) from shipmentrecord";
        $resultSet = $this->connection->query($QueryID);
        if ($row = $resultSet->fetch_assoc()) {
            $recId = $row['max(id)'] + 1;
        }


        $shipFrom = $_POST['shipFrom'];
        $shipContid = $_POST['shipContid'];
        $shipDate = $_POST['shipDate'];
        $shipRelea = $_POST['shipRelea'];
        $shipPay = $_POST['shipPay'];
        $date = date("Y-m-d");
        $status = 3;
        try {
            $Query = "insert into shipmentrecord values('$recId','$shipFrom','$shipPerID','$shipContid','$shipDate','$shipRelea','$shipPay','$date','$status')";
            $this->connection->query($Query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function ItemRegistration() {
        $QueryID = "select max(id) from stockDetails";
        $resultSet = $this->connection->query($QueryID);
        if ($row = $resultSet->fetch_assoc()) {
            $itemID = $row['max(id)'] + 1;
        }
        $code = $_POST['code'];
        $name = $_POST['name'];
        $vendor = $_POST['vendor'];
        $type = $_POST['type'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $qty = $_POST['qty'];
        $contID = $_POST['contID'];
        $untPrice = $_POST['untPrice'];
        $slPrice = $_POST['slPrice'];
        $profit = $_POST['profit'];
        $date = $_POST['date'];
        $status = 1;

        $QueryGetId = "select e.id as type,f.id as vendor from vehicleType e ,vehicleVendor f where e.type='$type' AND f.vendor='$vendor'";
        $resultSet = $this->connection->query($QueryGetId);

        if (mysqli_num_rows($resultSet) !== 0) {
            if ($row = $resultSet->fetch_assoc()) {
                $typeID = $row['type'];
                $vendorID = $row['vendor'];
            }
        } else {
            echo 'Does Not Exist';
        }

        $QueryGetContainer = "select id from shipmentrecord where containerid='$contID'";
        $resultSet = $this->connection->query($QueryGetContainer);

        if (mysqli_num_rows($resultSet) !== 0) {
            if ($row = $resultSet->fetch_assoc()) {
                $containerID = $row['id'];
            }
        } else {
            echo 'Please Enter Valid Container Identification';
        }

        try {
            $Query = "insert into stockDetails values('$itemID','$code','$name','$vendorID','$typeID','$model','$year','$date','$status')";
            $this->connection->query($Query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        try {
            $QueryInventory = "insert into stockInventory(itemCode,qty,unitPrice,sellPrice,status) values('$code','$qty','$untPrice','$slPrice','$status')";
            $this->connection->query($QueryInventory);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        try {
            $QueryStockLog = "insert into stockRefillLog(itemCode,qty,unitPrice,sellPrice,contId,date,status) values('$code','$qty','$untPrice','$slPrice','$containerID','$date','$status')";
            $this->connection->query($QueryStockLog);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function setRefillDetails() {
        $code = $_POST['itemCode'];
        try {
            $QuerySetData = "select e.* from stockDetails e , stockInventory f where e.itemCode = f.itemCode AND f.itemCode like'%$code%'";
            $resultSet = $this->connection->query($QuerySetData);
            $dataSet[] = array();
            if (mysqli_num_rows($resultSet) !== 0) {
                if ($row = $resultSet->fetch_assoc()) {
                    $code = $row['itemCode'];
                    $name = $row['name'];
                    $model = $row['model'];
                    $year = $row['year'];
                    $dataSet = array($code, $name, $model, $year);
                }
                echo json_encode($dataSet);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function refillStock() {
        $code = $_POST['code'];
        $qty = $_POST['qty'];
        $unitPrice = $_POST['unitPrice'];
        $sellPrice = $_POST['sellPrice'];
        $contID = $_POST['containerID'];
        $date = date("Y-m-d");
        $status = 1;

        //Quantity Adding
        $QuerySelect = "select * from stockInventory where itemCode='$code'";
        $resultSet = $this->connection->query($QuerySelect);
        if ($row = $resultSet->fetch_assoc()) {
            $currentQty = $row['qty'];
            $newQty = $currentQty + $qty;
        }
        // Get Container ID
        $QueryGetContainer = "select id from shipmentrecord where containerid='$contID'";
        $resultSet = $this->connection->query($QueryGetContainer);
        if (mysqli_num_rows($resultSet) !== 0) {
            if ($row = $resultSet->fetch_assoc()) {
                $containerID = $row['id'];
            }
        } else {
            echo 'Please Enter Valid Container Identification';
        }
        //Update Inventory
        try {
            $QueryRefill = "update stockInventory set unitPrice='$unitPrice',sellPrice='$sellPrice',qty='$newQty' where itemCode='$code'";
            $this->connection->query($QueryRefill);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        //Save Stock Log
        try {
            $QueryStockLog = "insert into stockRefillLog(itemCode,qty,unitPrice,sellPrice,contId,date,status) values('$code','$qty','$unitPrice','$sellPrice','$containerID','$date','$status')";
            $this->connection->query($QueryStockLog);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function QuantityFilter() {
        $itemQty = $_POST['itemQty'];
        $QueryFilter = "select s.itemcode,s.name,f.vendor,i.qty from stockDetails s , vehicleVendor f , stockInventory i where i.qty <= '$itemQty' AND s.itemCode=i.itemCode";
        $resultSet = $this->connection->query($QueryFilter);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $itemCode = $row['itemcode'];
            $name = $row['name'];
            $vendor = $row['vendor'];
            $qty = $row['qty'];
            echo "<tr>"
            . "<td>$itemCode</td>"
            . "<td>$name</td>"
            . "<td>$vendor</td>"
            . "<td>$qty</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-refill'><i class='mdi mdi-account-edit'></i>Re-Fill</button></td>"
            . "</tr>";
        }
    }

    function checkStatus() {
        if ($_POST['containerID']) {
            $contID = $_POST['containerID'];
            $QueryGetContainer = "select id from shipmentrecord where containerid='$contID'";
            $resultSet = $this->connection->query($QueryGetContainer);
            if (mysqli_num_rows($resultSet) !== 0) {
                
            } else {
                echo 'Please Enter Valid Container Identification';
            }
        }
    }

    function setFromTable() {
        $itemCode = $_POST['itemCode'];
        try {
            $QuerySelect = "select * from stockDetails where itemCode = '$itemCode'";
            $resultSet = $this->connection->query($QuerySelect);
            $dataSet[] = array();
            if ($row = $resultSet->fetch_assoc()) {
                $code = $row['itemCode'];
                $name = $row['name'];
                $model = $row['model'];
                $year = $row['year'];
                $dataSet = array($code, $name, $model, $year);
            }
            echo json_encode($dataSet);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function loadRecentRegistration() {
        $Query = "select * from stockDetails  order by date  desc LIMIT 10  ";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $itemCode = $row['itemCode'];
            $name = $row['name'];
            $vendor = $row['vendor'];
            $model = $row['model'];
            $year = $row['year'];
            $date = $row['date'];


            echo "<tr>"
            . "<td>$itemCode</td>"
            . "<td>$name</td>"
            . "<td>$vendor</td>"
            . "<td>$model</td>"
            . "<td>$year</td>"
            . "<td>$date</td>"
            . "</tr>";
        }
    }

    function loadRecentShipment() {
        $Query = "select s.*,p.name from shipmentRecord s ,shippingPerson p where s.person=p.id order by date  desc LIMIT 10";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $from = $row['from'];
            $name = $row['name'];
            $containerid = $row['containerid'];
            $releasedDate = $row['releasedDate'];
            $date = $row['date'];


            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$from</td>"
            . "<td>$name</td>"
            . "<td>$containerid</td>"
            . "<td>$releasedDate</td>"
            . "<td>$date</td>"
            . "</tr>";
        }
    }

    function productList() {
        $Query = "select s.itemCode,s.name,v.vendor,t.type,s.model,si.qty,s.date from stockDetails s ,vehicleType t,vehicleVendor v , stockinventory si where s.itemCode = si.itemCode AND s.type=t.id AND s.vendor = v.id AND s.status='1'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $itemCode = $row['itemCode'];
            $name = $row['name'];
            $vendor = $row['vendor'];
            $model = $row['model'];
            $qty = $row['qty'];
            $date = $row['date'];


            echo "<tr>"
            . "<td>$itemCode</td>"
            . "<td>$name</td>"
            . "<td>$vendor</td>"
            . "<td>$model</td>"
            . "<td>$qty</td>"
            . "<td>$date</td>"
            . "<td  style='width:130px;'><button class='btn btn-sm btn-danger' id='btn-de-active'>De-active</button>&nbsp</td>"
            . "</tr>";
        }
    }

    function productSuspendList() {
        $Query = "select s.itemCode,s.name,v.vendor,t.type,s.model,s.year from stockDetails s ,vehicleType t,vehicleVendor v where s.type=t.id AND s.vendor = v.id AND s.status ='2'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $itemCode = $row['itemCode'];
            $name = $row['name'];
            $vendor = $row['vendor'];
            $model = $row['model'];
            $year = $row['year'];
            echo "<tr>"
            . "<td>$itemCode</td>"
            . "<td>$name</td>"
            . "<td>$vendor</td>"
            . "<td>$model</td>"
            . "<td>$year</td>"
            . "<td  style='width:130px;'><button class='btn btn-sm btn-success' id='btn-active'>Activate</button>&nbsp</td>"
            . "</tr>";
        }
    }

    function productListFilter() {
        $code = $_POST['itemCode'];
        try {
            $QuerySetData = "select e.itemCode,e.name,v.vendor,e.model,e.year,e.date from stockDetails e , stockInventory f ,vehicleVendor v where e.itemCode = f.itemCode AND e.vendor=v.id AND f.itemCode like '%$code%'";
            $resultSet = $this->connection->query($QuerySetData);
            $dataSet[] = array();
            if (mysqli_num_rows($resultSet) !== 0) {
                while ($row = $resultSet->fetch_assoc()) {
                    $code = $row['itemCode'];
                    $name = $row['name'];
                    $vendor = $row['vendor'];
                    $model = $row['model'];
                    $year = $row['year'];
                    $date = $row['date'];
                    echo "<tr>"
                    . "<td>$code</td>"
                    . "<td>$name</td>"
                    . "<td>$vendor</td>"
                    . "<td>$model</td>"
                    . "<td>$year</td>"
                    . "<td>$date</td>"
                    . "<td  style='width:130px;'><button class='btn btn-sm btn-danger' id='btn-de-active'>De-active</button>&nbsp</td>"
                    . "</tr>";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function deActiveProduct() {
        $itemCode = $_POST['itemCode'];
        try {
            $QueryDeactive = " update stockinventory si,stockDetails sd set si.status ='2',sd.status='2' where sd.itemCode=si.itemCode AND sd.itemCode = '$itemCode'";
            $this->connection->query($QueryDeactive);
            echo "Successfully Deactivated!!!";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function activeProduct() {
        $itemCode = $_POST['itemCode'];
        try {
            $QueryDeactive = " update stockinventory si,stockDetails sd set si.status ='1',sd.status='1' where sd.itemCode=si.itemCode AND sd.itemCode = '$itemCode'";
            $this->connection->query($QueryDeactive);
            echo "Successfully Activated!!!";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function autoLoad_orderID() {

        try {
            $Query = "select max(id) as id from stockCustomOrder";
            $resultSet = $this->connection->query($Query);
            while ($row = $resultSet->fetch_assoc()) {
                $orderID = $row['id'];
                $maxOderId = $orderID + 1;
                echo $maxOderId;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function orderPurchase() {
        $orderId = $_POST['orderId'];
        $date = $_POST['date'];
        $cusName = $_POST['cusName'];
        $cusNo = $_POST['cusNo'];
        $manufac = $_POST['manufac'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $name = $_POST['name'];
        $condition = $_POST['condition'];
        $advPay = $_POST['advPay'];
        $tot = 0.0;
        $balance = 0.0;
        $descrip = $_POST['descrip'];
        $status = 1;

        try {
            $queryOrder = "insert into stockCustomOrder values('$orderId','$date','$cusName','$cusNo','$manufac','$model','$year','$name','$condition','$advPay','$tot','$balance','$descrip','$status')";
            $this->connection->query($queryOrder);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function orderPurchaseArrival() {
        $orderId = substr($_POST['orderId'], 6);
        $orderdate = $_POST['orderdate'];
        $arriveDate = $_POST['arriveDate'];
        $totPay = $_POST['totPay'];
        $balancePay = $_POST['balancePay'];
        $date = date("Y-m-d");
        $status = 1;
        try {
            $QueryOrderArrival = "insert into stockcustomorderlog(orderid,arrivedate,date,status) values('$orderId','$arriveDate','$date','$status')";
            $this->connection->query($QueryOrderArrival);
            $QueryOrderUpdate ="update stockCustomOrder set totPay='$totPay',balance='$balancePay',status='6' where id='$orderId'";
            $this->connection->query($QueryOrderUpdate);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
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

    function customOderFilter() {

        try {           
            $orderID = substr($_POST['orderId'], 4);            
            $QueryFilter = "select id,cusName,cusNo,advPay,date from stockCustomOrder where id='$orderID' and status='1'";
            $resultSet = $this->connection->query($QueryFilter);
            while ($row = $resultSet->fetch_assoc()) {
                $orderid = $row['id'];
                $cusName = $row['cusName'];
                $cusNo = $row['cusNo'];
                $advPay = $row['advPay'];
                $date = $row['date'];
                $dataSet = array($orderID, $cusName, $cusNo, $advPay, $date);
            }
            echo json_encode($dataSet);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
        function customOrderList() {
        $Query = " select * from stockCustomOrder where status='1'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $orderid = "ODR0".$row['id'];
            $cusName = $row['cusName'];
            $cusNo = $row['cusNo'];
            $date = $row['date'];
            $advPay = $row['advPay'];
            $name = $row['name'];


            echo "<tr>"
            . "<td>$orderid</td>"
            . "<td>$name</td>"
            . "<td>$cusName</td>"
            . "<td>$cusNo</td>"
            . "<td>$advPay</td>"
            . "<td>$date</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-arrival'>Arrived</button></td>"
            . "</tr>";
        }
    }

}


?>