<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Employe();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Employe();
    $classObject->$methodName();
}

class Employe {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function autoLoad_jobRoleSalary() {
        $query = "select basicSalary,id,jobRole from jobRole ";
        $resultSet = $this->connection->query($query);
        $job_role_load = array();
        while ($row = $resultSet->fetch_assoc()) {
            $jobRole = $row['jobRole'];
            $basicSalary = $row['basicSalary'];
            $jobid = $row['id'];
            $job_role_load[] = array("id" => $jobid, "jobRole" => $jobRole, "basicSalary" => $basicSalary);
        }
        echo json_encode($job_role_load);
    }

    function autoLoad_bankDetails() {
        $query = "select id,bankName from bankDetails ";
        $resultSet = $this->connection->query($query);
        $bannkName_load = array();
        while ($row = $resultSet->fetch_assoc()) {
            $bankName = $row['bankName'];
            $bankid = $row['id'];
            $bannkName_load[] = array("id" => $bankid, "bankName" => $bankName);
        }
        echo json_encode($bannkName_load);
    }

    function autoLoad_EmpID() {
        $query = "select max(id) from employeeRegistration";
        $resultSet = $this->connection->query($query);
        while ($row = $resultSet->fetch_assoc()) {
            $maxID = $row['max(id)'];
            $newID = $maxID + 1;
            echo $newID;
        }
    }

    public function EmployeRegistration() {

        $empID = substr($_POST['empID'], 5);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $selectBank = $_POST['selectBank'];
        $accountNo = $_POST['accountNo'];
        $selectJobRole = $_POST['selectJobRole'];
        $selectBasicSalary = $_POST['selectBasicSalary'];
        $status = 3;
        try {
            $QuerySave = "insert into employeeRegistration values('$empID','$fname','$lname','$dob','$gender',"
                    . "'$nic','$address','$contact','$selectBank','$accountNo','$selectJobRole','$selectBasicSalary',"
                    . "'$status')";
            $this->connection->query($QuerySave);
        } catch (Exception $exc) {
            echo $exc;
        }
    }

    public function getEmployeeTB() {
        $nic = $_GET['nic'];
        $Query = "select * from employeeRegistration where nic='$nic'";
        $resultSet = $this->connection->query($Query);
        $empData = array();
        if ($row = $resultSet->fetch_assoc()) {
            $name = $row['fname'] . " " . $row['lname'];
            $basicSalary = $row['Salary'];
            $empid = $row['id'];
            $empData = array('name' => $name, 'basicSalary' => $basicSalary, 'empid' => $empid);
        }
        echo json_encode($empData);
    }

    function empSalaryAdvance() {
        $QueryMAxID = "select max(id) from employeeSalaryAdvance";
        $resultSet = $this->connection->query($QueryMAxID);
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['max(id)'] + 1;
        }
        $date = date("Y-m-d");
        $empid = substr($_POST['empID'], 6);
        $amount = $_POST['amount'];
        $status = 1;
        try {
            $QuerySave = "insert into employeeSalaryAdvance values('$id','$empid','$amount','$date','$status')";
            $this->connection->query($QuerySave);
        } catch (Exception $exc) {
            echo $exc;
        }
        echo $empid;
    }

    function employeeList() {
        $Query = "select id,fname,lname from employeeRegistration where status !='3'";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $id = "EMP000" . $row['id'];
            $name = $row['fname'] . " " . $row['lname'];
            $dataSet[] = array('id' => $id, 'name' => $name);

            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$name</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-edit'><i class='mdi mdi-account-edit'></i></button>&nbsp<button class='btn btn-sm btn-danger' id='btn-delete'><i class='mdi mdi-delete-sweep'></i></button></td>"
            . "</tr>";
        }
    }

    function setUpdateDetails() {
        $empid = $_POST['empid'];
        $id = substr($empid, 5);
        $Query = "select * from employeeRegistration where id='$id'";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        if ($row = $resultSet->fetch_assoc()) {
            $empID = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $nic = $row['nic'];
            $address = $row['address'];
            list($l1, $l2, $l3) = explode(",", $address);
            $linel = $l1;
            $line2 = $l2;
            $line3 = $l3;
            $contact = $row['contact'];
            $selectBank = $row['bankName'];
            $accountNo = $row['accountNo'];
            $selectJobRole = $row['jobRole'];
            $selectBasicSalary = $row['Salary'];
            $dataSet = array($empID, $fname, $lname, $gender, $dob, $nic, $linel, $line2, $line3, $contact, $selectBank, $accountNo, $selectJobRole, $selectBasicSalary);
        }
        echo json_encode($dataSet);
    }

    function updateEmpDetails() {
        $empID = substr($_POST['empID'], 5);
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $selectJobRole = $_POST['selectJobRole'];
        $selectBasicSalary = $_POST['selectBasicSalary'];

        $Query = "update employeeRegistration set address='$address',contact='$contact',jobRole='$selectJobRole',Salary='$selectBasicSalary' where id='$empID'";
        $this->connection->query($Query);
    }

    function changeStatus() {
        $empid = substr($_POST['empid'], 5);

        if ($_POST['status'] == 1) {
            $status = 1;
            $message = "Successfully Activated";
        } elseif ($_POST['status'] == 2) {
            $status = 2;
            $message = "Successfully Deactivated";
        }
        $Query = "update employeeRegistration set status = '$status' where id = '$empid'";
        $this->connection->query($Query);
        echo $empid;
    }

    function deleteAccount() {
        $empid = substr($_POST['empid'], 5);
        $Query = "update employeeRegistration set status = '3' where id = '$empid'";
        $this->connection->query($Query);
        echo $empid;
    }

    function employeePendingList() {
        $Query = "select * from employeeRegistration where status ='3'";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $id = "EMP000" . $row['id'];
            $name = $row['fname'] . " " . $row['lname'];
            $nic = $row['nic'];
            $acc = $row['accountNo'];
            $job = $row['jobRole'];
            $sal = $row['Salary'];
            //$dataSet[] = array('id' => $id, 'name' => $name,'nic'=>$nic,'acc'=>$acc,'job'=>$job,'sal'=>$sal);

            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$name</td>"
            . "<td>$nic</td>"
            . "<td>$acc</td>"
            . "<td>$job</td>"
            . "<td>$sal</td>"
            . "<td><button class='btn btn-sm btn-primary' id='btn-active'>Activate</button>&nbsp<button class='btn btn-sm btn-danger' id='btn-delete'><i class='mdi mdi-delete-sweep'></i></button></td>"
            . "</tr>";
        }
    }

    function deleteAccountPermenant() {
        $empid = substr($_POST['empid'], 6);
        echo $empid;
        $Query = "delete from employeeRegistration where id = '$empid'";
        $this->connection->query($Query);
        //echo $empid;
    }

    function salaryAdvanceHistory() {
        $nic = $_POST['nic'];
        $date = date("Y-m");
        $Query = "select e.id,s.advanceAmount,s.date from employeeRegistration e,employeeSalaryAdvance s  where s.date like '$date%' and e.nic='$nic' and e.id=s.empid order by date  desc LIMIT 10";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $date = $row['date'];
            $id = $row['id'];
            $amount = $row['advanceAmount'];

            echo "<tr>"
            . "<td>EMP000$id</td>"
            . "<td>$amount</td>"
            . "<td>$date</td>"
            . "</tr>";
        }
    }

    function salaryAllowanceHistory() {
        $jobRole = $_POST['jobRole'];
        $Query = "select id,fname,lname from employeeRegistration where jobRole ='$jobRole'";
        $resultSet = $this->connection->query($Query);
        while ($row = $resultSet->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['fname'] . " " . $row['lname'];

            echo "<tr>"
            . "<td>EMP000$id</td>"
            . "<td>$name</td>"
            . "<td><button class='btn btn-sm btn-success' id='btn-setDataAllow'><i class='fas fa-edit '></i></button></td>"
            . "</tr>";
        }
    }

    function calculateSalaryDeduction() {
        $empid = substr($_POST['empid'], 6);
        $date = date("Y-m");
        $Query = "select sum(advanceAmount) from employeeSalaryAdvance where date like '$date%' and empid='$empid'";
        $resultSet = $this->connection->query($Query);
        if ($row = $resultSet->fetch_assoc()) {
            $deduction = $row['sum(advanceAmount)'];
            echo $deduction;
        }
    }

    function allowancePayment() {
        $empid = substr($_POST['empid'], 6);
        $food = $_POST['food'];
        $trans = $_POST['trans'];
        $meds = $_POST['meds'];
        $deduct = $_POST['deduct'];
        $absAmt = $_POST['absAmt'];
        $totalPay = $_POST['totalPay'];
        $date = date("Y-m-d");
        $status = 1;

        try {
            $Query = "insert into employeepayment(empid,food,medical,transport,deduction,absAmount,totalPaid,date,status) values('$empid','$food','$meds','$trans','$deduct','$absAmt','$totalPay','$date','$status')";
            $this->connection->query($Query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
