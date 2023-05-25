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


    if(isset($_POST['continue'])){

        //code..
    $date = date("d/m/Y");

    $acc_num = mysqli_escape_string($conn, $_POST['acc_num']);
    $ben_name = mysqli_escape_string($conn, $_POST['ben_name']);
    $bank_name = mysqli_escape_string($conn, $_POST['bank_name']);
    $swift_code = mysqli_escape_string($conn, $_POST['swift_code']);
    $amount = mysqli_escape_string($conn, $_POST['amount']);
    $narration = mysqli_escape_string($conn, $_POST['narration']);

    $_SESSION['acc_num'] = $acc_num;
    $_SESSION['ben_name'] = $ben_name;
    $_SESSION['swift_code'] = $swift_code;
    $_SESSION['bank_name'] = $bank_name;
    $_SESSION['amount'] = $amount;
    $_SESSION['date'] = $date;    
    $_SESSION['narration'] = $narration;
    header('location:ben-transfer-details.php');
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
    <title>Alat - Transfer Beneficiary</title>
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
    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">To Saved Beneficiary</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="section-title">Enter Transfer Details</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                            $sn = mysqli_escape_string($conn, $_GET['sn']);
                            $sql= 'SELECT * from beneficiary where sn = '.$sn;
                            $result = $conn->query($sql);
                            while ($rows = mysqli_fetch_assoc($result)){                            
                        ?>
                        <ul class="listview image-listview transparent flush">
                             <li>
                                <div class="item">
                                    <img src="assets/img/sample/avatar/user.png" alt="image" class="image">
                                    <div class="in">
                                        <div>
                                            <?php 
                                                $ben_name = $rows['ben_name'];
                                                $ben_name1 = strtoupper($ben_name);
                                                echo $ben_name1;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <input type="hidden" class="form-control" name="ben_name" value="<?php echo $rows['ben_name'] ?>"> 
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Account Number</label>
                                <input type="number" class="form-control" name="acc_num" value="<?php echo $rows['acc_num'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>                                        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" value="<?php echo $rows['bank_name'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Swift Code</label>
                                <input type="text" class="form-control" name="swift_code" value="<?php echo $rows['swift_code'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Amount</label>
                                <input type="number" class="form-control" name="amount" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Narration</label>
                                <input type="text" class="form-control" name="narration" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="mt-1"></div>

                    <button name="continue" class="btn btn-primary btn-block" >CONTINUE</button> 
                     
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <br>                


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

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>