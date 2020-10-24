<?php
session_start();


if (isset($_POST["login"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encpassword = md5($password);

    $connection = new mysqli("localhost", "root", "", "jmt_db");
    $query = "select * from customerlogin where username = ' $username ' and password = ' $encpassword '";

    $resultSet = $connection->query($query);
    if ($row == $resultSet->fetch_assoc()) {
        $username_db = $row['username'];
        $usercusname_db = $row['name'];
        $password_db = $row['password'];

        if ($encpassword == $password_db) {
            $_SESSION['username'] = $username_db;
            $_SESSION['usercusname'] = $usercusname_db;
        }
    }
}
?>
<html lang="en">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Janasiri Motor Station</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">	
        <link rel="stylesheet" href="css/hexagons.min.css">							
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/modal-theme.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form action="testForm.php" method="post">
                        <div class="mt-30 text-center">
                            <h3>Login Here</h3>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                        </div>
                        <div class="mt-10 text-rigth"> 
                            <button type="submit" name="login" value="Submit" class="genric-btn success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>