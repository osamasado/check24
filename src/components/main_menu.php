<?php
$loggedIn = false;
$disabled = "disabled";
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    $loggedIn = true;
    $disabled = "";
}
else {
    $path = $_SERVER['PHP_SELF'];
    $file = strtolower(basename($path));
    if(($file != 'index.php') && ($file != 'login.php') && ($file != 'logout.php') && ($file != 'imprint.php')) {
        header("location:".$server_path);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php $server_path;?>assets/style.css">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<table style="height: 150px;">
    <tbody>
    <tr>
        <td class="align-baseline">
            <a href="/check24">
                <img class="rounded float-left"
                     src="https://via.placeholder.com/150x150.png/0000FF/FFFFFF?text=Check24">
            </a>
        </td>

        <td class="align-bottom"><span class="align-bottom"><strong>Osama Sado</strong></span></td>
    </tr>
    </tbody>
</table>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/check24">Übersicht</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo $disabled?>" href="<?php echo $server_path?>src/views/article.php">Neuer Eintrag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo $server_path?>src/views/imprint.php">Impressum</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                        if ($loggedIn) {
                            ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo $server_path?>src/views/logout.php">Logout</a>
                            <?php
                        } else {
                            ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo $server_path?>src/views/login.php">Login</a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <!--
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            -->
        </div>
    </div>
</nav>
</body>
</html>