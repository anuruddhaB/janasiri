<?php

if (isset($_POST['path'])) {
    $methodName = $_POST['path'];
    $classObject = new userLogin();
    $classObject->$methodName();
}
if (isset($_GET['path'])) {
    $methodName = $_GET['path'];
    $classObject = new userLogin();
    $classObject->$methodName();
}

class userLogin {

    function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "jmt_db");
    }

    function userSignUp() {
        $QueryMAxID = "select max(id) from customerlogin";
        $resultSet = $this->connection->query($QueryMAxID);
        if ($row = $resultSet->fetch_assoc()) {
            $id = $row['max(id)'] + 1;
        }
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $date = date("Y-m-d");
        $status = 1;
        $encpassword = md5($password);
        $enccpassword = md5($cpassword);

        $queryUsernameExist = "select * from customerlogin where username='$username'";
        $resultExistUsername = $this->connection->query($queryUsernameExist);
        if ($row = $resultExistUsername->fetch_assoc()) {
            $existUsername = $row['id'];
        }

        if ($existUsername == null || $existUsername == "") {
            try {
                if ($enccpassword == $enccpassword) {
                    $query = "insert into customerlogin values('$id','$fname','$lname','$address','$contact','$email','$username','$encpassword','$date','$status')";
                    $this->connection->query($query);
                } else {
                    echo "Please Check Password Mismatch Please check Again";
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            echo "username exist";
        }
    }

    function usersLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encpassword = md5($password);
        $query = "select * from customerlogin where username = '$username' and password = '$encpassword'";
        $resultSet = $this->connection->query($query);
        $status = "";
        if (mysqli_num_rows($resultSet) == 0) {
            $status = "notmatch";
            $dataSet = array("name" => "Nodata", "email" => "Nodata", "contact" => "Nodata", "username" => "Nodata", "stat" => $status);
            echo json_encode($dataSet);
        } else {
            $dataSet[] = array();
            if ($row = $resultSet->fetch_assoc()) {
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $contact = $row['contact'];
                $username = $row['username'];
                $userPassword = $row['password'];
                if ($userPassword == $encpassword) {
                    $status = "match";
                    session_start();
                    $_SESSION['usercusname'] = $username;
                    $_SESSION['validuser'] = true;
                    $dataSet = array("fname" => $fname, "lname" => $lname, "email" => $email, "contact" => $contact, "username" => $username, "stat" => $status);
                    echo json_encode($dataSet);
                } else {
                    $status = "wrong";
                    $dataSet = array("fname" => $fname, "lname" => $lname, "email" => $email, "contact" => $contact, "username" => $username, "stat" => $status);
                    echo json_encode($dataSet);
                }
            }
        }
    }

    function userProfileData() {
        $name = $_POST['username'];
        $query = "select * from customerlogin where username='$name'";
        $resultSet = $this->connection->query($query);
        $status = "";
        if (mysqli_num_rows($resultSet) == 0) {
            $status = "notmatch";
            $dataSet = array("name" => "Nodata", "email" => "Nodata", "contact" => "Nodata", "username" => "Nodata", "stat" => $status);
            echo json_encode($dataSet);
        } else {
            $dataSet[] = array();
            if ($row = $resultSet->fetch_assoc()) {
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $contact = $row['contact'];
                $username = $row['username'];
                $address = explode(",", $row['address']);

                $dataSet = array("fname" => $fname, "lname" => $lname, "email" => $email, "addl1" => $address[0], "addl2" => $address[1], "addl3" => $address[2], "contact" => $contact, "username" => $username, "stat" => $status);
                echo json_encode($dataSet);
            }
        }
    }

    function userProfileUpdate() {
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $contact = filter_input(INPUT_POST, 'contact');
        $updateUsername = filter_input(INPUT_POST, 'username');
        $originCurrentPassword = filter_input(INPUT_POST, 'currentPassword');
        $currentPassword = md5(filter_input(INPUT_POST, 'currentPassword'));
        $password = md5(filter_input(INPUT_POST, 'password'));
        $confirmPassword = md5(filter_input(INPUT_POST, 'confirmPassword'));
        $address = filter_input(INPUT_POST, 'address');

        $QueryDataSet = "select * from customerlogin where username='$updateUsername'";
        $resultSet = $this->connection->query($QueryDataSet);

        if ($row = $resultSet->fetch_assoc()) {
            $encPassword = $row['password'];
            $message = null;
            $status = null;
            $messageSet = array("status" => "", "message" => "");
            if ($originCurrentPassword == null || $originCurrentPassword == "") {
                $queryUpdate = "update customerLogin set fname='$fname' ,lname='$lname',email ='$email',address='$address' where username = '$updateUsername'";
                $this->connection->query($queryUpdate);
                echo json_encode("Done");
            } else {
                if ($encPassword == $currentPassword) {
                    if ($encPassword == $password) {
                        $messageSet['status'] = "False";
                        $messageSet['message'] = "Same Password is used";
                        echo json_encode($messageSet);
                    } else {
                        $queryUpdate = "update customerLogin set fname='$fname' ,lname='$lname',email ='$email',address='$address',password='$password' where username = '$updateUsername'";
                        $this->connection->query($queryUpdate);
                        echo json_encode("Done");
                    }
                } else {
                    //previous password not match
                    $messageSet['status'] = "False";
                    $messageSet['message'] = "Currenr password not match";
                    echo json_encode($messageSet);
                }
            }
        }
    }

}

?>
