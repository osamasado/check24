<?php
$server_path = '../../';
session_start();
if(isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"]) {
    header("location:" . $server_path);
    exit;
}
include_once($server_path . 'src/components/header.php');
$username1 = "osama";
$password1 = md5("osama");
$username2 = "sado";
$password2 = md5("sado");
$error_flag = false;
if($_POST) {
    if(($username1 == $_POST["username"] && $password1 == md5($_POST["password"])) || ($username2 == $_POST["username"] && $password2 == md5($_POST["password"])) ) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("location:".$server_path);
        exit;
    }
    else
        $error_flag = true;
}
?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="row">
                <label for="userName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="userName" placeholder="Username" required>
                </div>
            </div>
            <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                 <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                </div>
            </div>
            <div class="row">
                <div  class="col-sm-2"></div>
            <?php
            if($error_flag) {
            ?>
            <div class="p-3 mb-3 mt-3 bg-danger text-white rounded col-sm-10">Incorrect Username/Password</div>
            <?php
            }
            ?>
            </div>
            <div class="mt-3"></div>
            <div class="row">
                <div  class="col-sm-2"></div>
                <div class="col-sm-10">
                     <button type="submit" class="btn btn-primary" name="SubmitButton">Login</button>
                </div>
            </div>
        </form>
    </div
    <div class="col-3"></div>
</div>
<?php
include_once($server_path.'src/components/footer.php');
?>
