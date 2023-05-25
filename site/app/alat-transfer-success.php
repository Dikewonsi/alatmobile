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

    $sender_name = $fname." " .$lname;

    $date = date('m/d/Y h:i:s a', time());

     
    $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);
    while ($rows=mysqli_fetch_assoc($result)){
        $acc_type = $rows['acc_type'];
        $acc_num = $rows['acc_num'];
        $email = $rows['email'];
    }

    if(isset($_SESSION['id'])){
        $acc_num = $_SESSION['acc_num'];        
        $swift_code = 'NIL';
        $bank_name = 'Alat Bank';
        $narration = $_SESSION['narration'];
        $amount = $_SESSION['amount'];
        $date = $_SESSION['date'];
        $my_acc_num = $_SESSION['my_acc_num'];
        $receiver_balance = $_SESSION['receiver_balance'];
        $sender_balance = $_SESSION['sender_balance'];
        $receiver_name = $_SESSION['receiver_name']; 


        // set the location of the template file to be loaded
            $template_file = "./debit-email-template.php";

            // set the email 'from' information
            $email_from = "Kariba from Alat <alat@jeffreyisibor.dev>";

            //amount chnage to number format
            $amount1 = number_format($amount);

            // create a list of the variables to be swapped in the html template
            $swap_var = array(
              "{SITE_ADDR}" => "https://jeffreyisibor.dev",
              "{EMAIL_TITLE}" => "Debit Alert",       
              "{FROM_ACC}" => "$my_acc_num",
              "{TO_NAME}" => "$receiver_name",
              "{TO_ACCT}" => "$acc_num",
              "{AMOUNT}" => "$amount",
              "{DESC}" => "$narration",
              "{DATE}" => "$date",
              "{S_BAL}" => "$sender_balance",
              "{TO_EMAIL}" => "$email"
            );

            // create the email headers to being the email
            $email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
            $email_headers .= "MIME-Version: 1.0\r\n";
            $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

              // load the email to and subject from the $swap_var
            $email_to = $swap_var['{TO_EMAIL}'];
            $email_subject = $swap_var['{EMAIL_TITLE}']; // you can add time() to get unique subjects for testing: time();

            // load in the template file for processing (after we make sure it exists)
            if (file_exists($template_file))
              $email_message = file_get_contents($template_file);
            else
              die ("Unable to locate your template file");

            // search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
            foreach (array_keys($swap_var) as $key){
              if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                $email_message = str_replace($key, $swap_var[$key], $email_message);
            }
           if (mail($email_to, $email_subject, $email_message, $email_headers)) {                                
                
                }else{
                
                }
    }
    //credit alert
    if(isset($_SESSION['id'])){
            $sql = "SELECT * from users where acc_num = $acc_num";
            $result = $conn->query($sql);
            while ($rows=mysqli_fetch_assoc($result)){
                $acc_type = $rows['acc_type'];
                $acc_num = $rows['acc_num'];
                $email = $rows['email'];
            }


        // set the location of the template file to be loaded
            $template_file = "./credit-email-template.php";

            // set the email 'from' information
            $email_from = "Kariba from Alat <alat@jeffreyisibor.dev>";

            //amount chnage to number format
            $amount1 = number_format($amount);

            // create a list of the variables to be swapped in the html template
            $swap_var = array(
              "{SITE_ADDR}" => "https://jeffreyisibor.dev",
              "{EMAIL_TITLE}" => "Credit Alert",                                   
              "{TO_ACC}" => "$acc_num",
              "{FROM_NAME}" => "$sender_name",
              "{AMOUNT}" => "$amount1",
              "{DESC}" => "$narration",
              "{DATE}" => "$date",
              "{S_BAL}" => "$sender_balance",
              "{TO_EMAIL}" => "$email"
            );

            // create the email headers to being the email
            $email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
            $email_headers .= "MIME-Version: 1.0\r\n";
            $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

              // load the email to and subject from the $swap_var
            $email_to = $swap_var['{TO_EMAIL}'];
            $email_subject = $swap_var['{EMAIL_TITLE}']; // you can add time() to get unique subjects for testing: time();

            // load in the template file for processing (after we make sure it exists)
            if (file_exists($template_file))
              $email_message = file_get_contents($template_file);
            else
              die ("Unable to locate your template file");

            // search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
            foreach (array_keys($swap_var) as $key){
              if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                $email_message = str_replace($key, $swap_var[$key], $email_message);
            }
           if (mail($email_to, $email_subject, $email_message, $email_headers)) {                                
                
                }else{
                
                }
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
                            echo $receiver_name;
                        ?>
                    </span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span>
                       Alat
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