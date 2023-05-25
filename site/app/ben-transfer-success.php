<?php 
    session_start();
    include('../connect.php');

    if(!isset($_SESSION['id'])){
            header("location:../login.php");
            exit();
        }

    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

     
    $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);
    while ($rows=mysqli_fetch_assoc($result)){
        $acc_type = $rows['acc_type'];
        $acc_num = $rows['acc_num'];
    }

    $acc_num = $_SESSION['acc_num'];
    $acc_name = $_SESSION['ben_name'];
    $swift_code = $_SESSION['swift_code'];
    $bank_name = $_SESSION['bank_name'];
    $narration = $_SESSION['narration'];
    $amount = $_SESSION['amount'];
    $date = $_SESSION['date'];

                

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
    <title>Alat - Transfer To Beneficiary</title>
    <meta name="description" content="Alat Mobile Bank">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">  
    <script src="sweetalert2/jquery-3.6.0.min.js"></script>
    <script src="sweetalert2/sweetalert2.all.min.js"></script>  
</head>

<body class="bg-white">
    <!-- loader -->
    <div id="loader">
        <img src="assets/img/favicon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="index.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Detail
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Funds Sent</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                    <span class="text-success">Success</span>
                </li>
                <li>
                    <strong>To</strong>
                    <span>
                        <?php 
                            echo $acc_name;
                        ?>
                    </span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span>
                        <?php 
                            echo $bank_name;
                        ?>
                    </span>
                </li>
                <li>
                    <strong>Transaction Category</strong>
                    <span>Funds Transfer</span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3  class="m-0">$
                        <?php 
                            $new_amount = number_format($amount);
                            echo $new_amount;                            
                        ?>
                    </h3>
                </li>
                <li>
                    <strong>Narration</strong>
                    <span>
                        <?php 
                            echo $narration;
                        ?>
                    </span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span>
                        <?php 
                            echo $date;
                        ?>
                    </span>
                </li>
            </ul>


        </div>

    </div>
    <!-- * App Capsule -->


    <!-- * App Capsule -->
    <?php include ('app-bottom.php'); ?>

    <?php include('app-sidebar.php'); ?>


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