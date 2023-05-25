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

    $fullname = $fname." " .$lname;

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
    <title>Alat - Apply for Loan</title>
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

<body>

  <?php
      //check for submit
  if(filter_has_var(INPUT_POST, 'submit')) {
    $amount = htmlspecialchars($_POST['amount']);
    $duration = htmlspecialchars($_POST['duration']);
    $reason = htmlspecialchars($_POST['reason']);
    $fixed_fee = '12%';
    $status = 0;


  
        
    $insert_data = "INSERT INTO  loans (userid, fullname, amount, duration, reason, fixed_fee, status, date)
    VALUES ('$id', '$fullname', '$amount', '$duration', '$reason', '$fixed_fee', '$status', now())";
    $data_check = mysqli_query($conn, $insert_data);
    if($data_check){
      //Recipient Email
      $toEmail = 'alat@jeffreyisibor.dev';
      // Password - miLgEuSKO~e1
      $subject = 'Loan Request From '.$fullname;
      $body = '<h2>Loan Request</h2>
      <h4>Name</h4><p>'.$fullname.'</p>
      <h4>Loan Amount</h4><p>'.$amount.'</p>';

      //Email Headers 
      $headers = "MIME-Version:1.0" ."\r\n";
      $headers .= "Content-Type:text/html; charset=UTF-8" ."\r\n";

      //Additional Headers
      $headers .= "From :" .$fullname. "\r\n";


      if(mail($toEmail, $subject, $body, $headers)){
        //Email Sent
        ?>
        <script>
            Swal.fire(
              'Request Lodged!',
              'Your request for a loan was successful, your loan should arrive within 2 hours!',
              'success'
            )
        </script>

        <?php
      } else{
        //Failed
        ?>
        <script>
            Swal.fire(
              'Request not Lodged!',
              'You request for a loan was unsuccessful, please try again, and make sure to fill in all details!',
              'error'
            )
        </script>;
        <?php
      }
      
    } else{
      //Fill in all fields
      ?>
      <script>
          Swal.fire(
              'Empty field(s)!',
              'Please fill in all fields!',
              'info'
            )
      </script>

      <?php
    }
  }

?>

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="loans.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Apply for Loan</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        


        <div class="section mt-2">
            <div class="section-title">Loan Preference</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label">Enter Amount Needed</label>
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount Needed" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label">Enter Duration</label>
                                <select class="form-control" name="duration" required>
                                    <option>--select duration--</option>
                                    <option value="3 months">3 Months</option>
                                    <option value="6 months">6 Months</option>
                                    <option value="9 months">9 Months</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Years">2 Years</option>
                                    <option value="3+ Years">3- More Years</option>
                                </select>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group basic animated">
                            <div class="input-wrapper">
                                <label class="label">Reason for Loan</label>
                                <textarea type="text" name="reason" class="form-control" placeholder="Enter Narration"></textarea required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="mt-1"></div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block">CONTINUE</button>
                    </form>
                </div>

                <div class="section mt-2"> 
                    <div class="row">
                        <div class="col-sm-2" >
                            <i class="material-icons bg-">info</i>
                        </div>
                        <div class="col-sm-10">
                            Please wait 2 hours after applying for a loan, for confirmation and funds sent directly to your account. Fixed percentage rate of 12% applies to all loaned out amount
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>                


    <?php include('app-bottom.php'); ?>

    <?php include('app-sidebar.php'); ?>



    <!-- iOS Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Alat</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Alat</strong> on your Android's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Android Add to Home Action Sheet -->    

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