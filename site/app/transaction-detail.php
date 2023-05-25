<?php 
    session_start();
    include ("../connect.php");


       if(!isset($_SESSION['id'])){
            header("location:../login.php");
            exit();
        }

    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql= 'SELECT * from transactions where sn = '.$id;
    $result = $conn->query($sql);
    while ($rows = mysqli_fetch_assoc($result)){
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
    <title>Alat - Transaction Details</title>
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

<body class="bg-white">

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
            Transaction Details
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
                <?php
                    $t_type = $rows['type'];
                    if($t_type == 'Funds Transfer')
                    {
                        
                    ?>
                        <h3 class='text-center mt-2'>Debit</h3>
                    <?php
                    }
                    else
                    {
                    ?>                        
                        <h3 class='text-center mt-2'>Credit</h3>
                    <?php
                    }
                ?>
                
            </div>

            <?php
                $t_type = $rows['type'];
                if($t_type == 'Funds Transfer')
                {
                    
                ?>
                    <ul class="listview flush transparent simple-listview no-space mt-3">
                        <li>
                            <strong>Status</strong>
                            <span class="text-success">Success</span>
                        </li>
                        <li>
                            <strong>To</strong>
                            <span>
                                <?php echo $rows['acc_num']; ?>
                            </span>
                        </li>
                        <li>
                            <strong>Beneficiary Name</strong>
                            <span><?php echo $rows['acc_name']; ?></span>
                        </li>
                        <li>
                            <strong>Transaction Category</strong>
                            <span><?php echo $rows['type']; ?></span>
                        </li>
                        <li>
                            <strong>Bank Name</strong>
                            <span><?php echo $rows['bank_name']; ?></span>
                        </li>
                        <li>
                            <strong>Swift Code</strong>
                            <span><?php echo $rows['swift_code']; ?></span>
                        </li>
                        <li>
                            <strong>Date</strong>
                            <span><?php echo $rows['date'] ?></span>
                        </li>
                        <li>
                            <strong>Amount</strong>
                            <h3 class="m-0">
                            $<?php 
                            $amount = $rows['amount']; 
                            $new_amount = number_format($amount);
                            echo $new_amount;
                            ?>                    
                            </h3>
                        </li>                   
                    </ul>  
                <?php
                }
                else
                {
                ?>                        
                    <h3 class='text-center mt-2'>Credit</h3>
                <?php
                }
            ?>
             <?php }?>         
        </div>

    </div>
    <!-- * App Capsule -->


    <?php include('app-bottom.php'); ?>

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