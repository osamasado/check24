<?php


$server_path = '../../';
session_start();
if(isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
    header("location:" . $server_path);
    exit;
}
include_once($server_path . 'src/components/main_menu.php');
require_once ('../service/DatabaseConnector.php');
$username = "osama";
$password = md5("osama");
$error_flag = false;
if($_POST) {
    if($username == $_POST["username"] && $password == md5($_POST["password"])) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("location:".$server_path);
        exit;
    }
    else
        $error_flag = true;
}
?>
<html>
    <body>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="userName">Username</label>
                            <input type="text" class="form-control" name="username" id="userName" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                        </div>
                    </div>
                    <?php
                    if($error_flag) {
                    ?>
                    <div class="p-3 mb-2 bg-danger text-white">Incorrect Username/Password</div>
                    <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-primary" name="SubmitButton">Log-in</button>
                </form>
            </div
            <div class="col-3"></div>
        </div>
    </body>
</html>
