<?php 
    session_start();
    include('../connect.php');

    if(!isset($_SESSION['id'])){
            header("location:../login.php");
            exit();
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
    <title>Alat - Transfer Verification</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    <script src="sweetalert2/jquery-3.6.0.min.js"></script>
    <script src="sweetalert2/sweetalert2.all.min.js"></script>  
</head>

<body class="bg-white">

    <?php
        $userid = $_SESSION['id'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];

        $fullnames = $fname." " .$lname;

        $tran_type = "Funds Transfer";

        $acc_num = $_SESSION['acc_num'];
        $receiver_name = $_SESSION['acc_name'];
        $swift_code = $_SESSION['swift_code'];;
        $bank_name = $_SESSION['bank_name'];
        $narration = $_SESSION['narration'];
        $amount = $_SESSION['amount'];
        $date = $_SESSION['date'];

        $uni_num='ALA-'.rand(9999999999, 1111111111);


         
        $sql = "SELECT * from users where id = $userid";
        $result = $conn->query($sql);
        while ($rows=mysqli_fetch_assoc($result))
        {
            $balance = $rows['balance'];
            $lname = $rows['lname'];
            $fname = $rows['fname'];
        }


        if(isset($_POST['confirm'])){     
                if(!($balance >= $amount)) {
                    // code...
                     ?>
                    <script>
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Insufficient funds!'              
                        })
                    </script>;
                    <?php

                }
                else{
                    $insert_data = "INSERT INTO  transactions (u_id, userid, type, acc_num, acc_name, bank_name, swift_code, narration, amount)
                    VALUES ('$uni_num', '$userid', '$tran_type', '$acc_num', '$receiver_name', '$bank_name', '$swift_code', '$narration', '$amount')";
                    $data_check = mysqli_query($conn, $insert_data);

                    //debit sender and send email alert
                    $update_data = " UPDATE users SET balance=balance - $amount-2.5 WHERE id ='$userid'";
                    $update_check = mysqli_query($conn, $update_data);
                    if($update_check){                        

                    $sql = "SELECT * from users where id = $userid";
                    $result = $conn->query($sql);
                    while ($rows=mysqli_fetch_assoc($result)){        
                        $sender_balance = $rows['balance'];
                        $_SESSION['sender_balance'] = $sender_balance;
                    }                                   


                    
                    
                    header('location:others-transfer-success.php');
                }
            }                      
    } 

    ?>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/favicon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border">        
        <div class="pageTitle">
            Transfer Verification
        </div>
        <div class="right"> </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section">
            <div class="splash-page mt-5 mb-5">

                <div class="transfer-verification">
                    <div class="transfer-amount">
                        <span class="caption">Amount</span>
                        <h2>$
                        <?php 
                            $amount = $_SESSION['amount']; 
                            $new_amount = number_format($amount);
                            echo $new_amount;
                        ?></h2>
                    </div>
                    <div class="from-to-block mb-5">
                        <div class="item text-start">
                            <img src="assets/img/sample/avatar/user.png" alt="avatar" class="imaged w32">
                            <strong>Self</strong>
                        </div>
                        <div class="item text-end">
                            <img src="assets/img/sample/avatar/user.png" alt="avatar" class="imaged w32">
                            <strong><?php echo $_SESSION['acc_name']; ?></strong>
                        </div>
                        <div class="arrow"></div>
                    </div>
                </div>
                <h2 class="mb-2 mt-2">Confirm the Transaction</h2>
                <p>
                    You are sending <strong class="text-primary">$
                        <?php 
                            $amount = $_SESSION['amount']; 
                            $new_amount = number_format($amount);
                            echo $new_amount;
                        ?></strong> to <?php echo $_SESSION['acc_name']; ?>. <br>Are you sure?
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-6">
                    <a href="frequent-transactions.php" class="btn btn-lg btn-outline-secondary btn-block">Cancel</a>
                </div>
                <div class="col-6">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <button name="confirm" class="btn btn-lg btn-primary btn-block">Confirm</button>                      
                </div>
            </div>
        </div>

        <!-- DialogIconedDanger -->
             <!-- <div class="modal fade dialogbox" id="DialogIconedDanger" data-bs-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-icon text-danger">
                            <ion-icon name="close-circle"></ion-icon>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                        </div>
                        <div class="modal-body">
                            An unauthorized login from an unknown source has been detected on your account, and our systems have temporarily disabled transfers of funds on your account. Please contact our support team for account verification. 
                        </div>
                        <div class="modal-footer">
                            <div class="btn-inline">
                                <a href="frequent-transactions.php" class="btn" >CLOSE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- * DialogIconedDanger -->

    </div>
    <!-- * App Capsule -->


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