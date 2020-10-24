<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new Customer();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new Customer();
    $classObject->$methodName();
}

class Customer {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function clientList() {
        $Query = "select * from customerlogin";
        $resultSet = $this->connection->query($Query);
        $dataSet[] = array();
        while ($row = $resultSet->fetch_assoc()) {
            $id = "USR000" . $row['id'];
            $name = $row['fname']." ".$row['lname'];
            $username = $row['username'];
            $email = $row['email'];
            $contact = $row['contact'];
            $date = $row['date'];

            echo "<tr>"
            . "<td>$id</td>"
            . "<td>$name</td>"
            . "<td>$username</td>"
            . "<td>$email</td>"
            . "<td>$contact</td>"
            . "<td>$date</td>"
            . "<td><button class='btn btn-sm btn-info' id='btn-viewInfo'>View Info</button></td>"
            . "</tr>";
        }
    }

    function clientFilter() {
        $username = $_POST['username'];
        try {
            $query = "select * from customerlogin where username like '%$username%'";
            $resultSet = $this->connection->query($query);

            while ($row = $resultSet->fetch_assoc()) {
                $id = "USR000" . $row['id'];
                $name = $row['name'];
                $username = $row['username'];
                $email = $row['email'];
                $contact = $row['contact'];
                $date = $row['date'];

                echo "<tr>"
                . "<td>$id</td>"
                . "<td>$name</td>"
                . "<td>$username</td>"
                . "<td>$email</td>"
                . "<td>$contact</td>"
                . "<td>$date</td>"
                . "<td><button class='btn btn-sm btn-info' id='btn-viewInfo'>View Info</button></td>"
                . "</tr>";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function reservationFilter() {
        $username = $_POST['username'];
        try {
            $query = "select * from customerlogin where username = '$username'";
            $resultSet = $this->connection->query($query);

            while ($row = $resultSet->fetch_assoc()) {
                $id = "USR000" . $row['id'];
                $name = $row['fname']." ".$row['lname'];
                $username = $row['username'];
                $email = $row['email'];
                $contact = $row['contact'];
                $date = $row['date'];

                echo "<tr>"
                . "<td>$id</td>"
                . "<td>$name</td>"
                . "<td>$username</td>"
                . "<td>$email</td>"
                . "<td>$contact</td>"
                . "<td>$date</td>"
                . "<td>$date</td>"
                . "</tr>";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>