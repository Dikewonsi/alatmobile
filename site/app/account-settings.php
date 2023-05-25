<?php 
    session_start();
    include('../connect.php');

    if(!isset($_SESSION['id'])){
            header("location:../login.php");
            exit();
        }

    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];

     $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);
    while ($rows=mysqli_fetch_assoc($result)){        
        $balance = $rows['balance'];
        $fname = $rows['fname'];
        $acc_num = $rows['acc_num'];        
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta http-equiv="refresh" content="900;url=time-out.php">
    <meta name="theme-color" content="#000000">
    <title>Alat - Account Settings</title>
    <meta name="description" content="Alat Mobile Bank">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/favicon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Settings
        </div>        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#" data-bs-toggle="modal" data-bs-target="#actionSheetIconed">
                    <img src="upload/<?=$_SESSION['image']?>" alt="profile-picture" class="imaged w100 rounded">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <!-- Iconed Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Picture</h5>
                    </div>
                    <div class="modal-body">
                        <ul class="action-button-list">
                            <li>
                                <a href="upload-profile-picture.php" class="btn btn-list">
                                    <span>
                                        <ion-icon name="cloud-upload-outline"></ion-icon>
                                        Upload Profile Picture
                                    </span>
                                </a>
                            </li>                            
                            <li class="action-divider"></li>
                            <li>
                                <a href="#" class="btn btn-list text-danger" data-bs-dismiss="modal">
                                    <span>
                                        <ion-icon name="close-outline"></ion-icon>
                                        Cancel
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Iconed Action Sheet -->

        <div class="listview-title mt-1">Theme</div>
        <ul class="listview image-listview text inset no-line">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Dark Mode
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                            <label class="form-check-label" for="darkmodeSwitch"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul> 

        <div class="listview-title mt-1">Notifications</div>
        <ul class="listview image-listview text inset">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Payment Alert
                            <div class="text-muted">
                                Send notification when new payment received
                            </div>
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                            <label class="form-check-label" for="SwitchCheckDefault1"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Notification Sound</div>
                        <span class="text-primary">Beep</span>
                    </div>
                </a>
            </li>
        </ul>       

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#actionSheetAlertError">
                    <div class="in">
                        <div>Update E-mail</div>
                    </div>
                </a>
            </li>
            <!-- Alert Error Action Sheet -->
            <div class="modal fade action-sheet" id="actionSheetAlertError" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="action-sheet-content">
                                <div class="iconbox text-danger">
                                    <ion-icon name="alert-circle"></ion-icon>
                                </div>
                                <div class="text-center p-2">
                                    <h3>Error</h3>
                                    <p>Access Denied.</p>
                                </div>
                                <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Alert Error Action Sheet -->
            <li>
                <a href="update-personal.php" class="item">
                    <div class="in">
                        <div>Personal</div>
                        <span class="text-primary">Edit</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="update-password.php" class="item">
                    <div class="in">
                        <div>Update Password</div>
                    </div>
                </a>
            </li>
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            2 Step Verification
                        </div>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
                            <label class="form-check-label" for="SwitchCheckDefault3"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedButtonInline">
                    <div class="in">
                        <div>Log out all devices</div>
                    </div>
                </a>
            </li>
        </ul>

        <!-- Dialog Iconed Inline -->
        <div class="modal fade dialogbox" id="DialogIconedButtonInline" data-bs-backdrop="static" tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Logging out of all devices</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure about that?
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal">
                                <ion-icon name="close-outline"></ion-icon>
                                CANCEL
                            </a>
                            <a href="logout.php" class="btn btn-text-primary">
                                <ion-icon name="checkmark-outline"></ion-icon>
                                YES
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Dialog Iconed Inline -->


    </div>
    <!-- * App Capsule -->


    <?php include('app-bottom.php'); ?>

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


</body>

</html>