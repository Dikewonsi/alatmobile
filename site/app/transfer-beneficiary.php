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


     
    $sn = mysqli_escape_string($conn, $_GET['sn']);
    $sql= 'SELECT * from beneficiary where sn = '.$sn;
    $result = $conn->query($sql);
    while ($rows = mysqli_fetch_assoc($result)){

        $ben_names= $rows['ben_name'];
     

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
    <style>
  .profile-pic{
    background: #1a4dbe;
    color: #fff;
    border-radius: 70%;
    height: 100px;
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 3.1rem;
  }
</style>
</head>

<body>
    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Transfer</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <?php
                function getProfilePicture($ben_names){
                  $name_slice = explode(' ',$ben_names);
                    $name_slice = array_filter($name_slice);
                    $initials = '';
                  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
                  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
                  return '<div class="profile-pic">'.$initials.'</div>';
                }
              ?>


            <?php echo getProfilePicture($ben_names);?>
            </div>
        </div>
        


        <div class="section mt-2">
            <div class="section-title">Beneficiary Details</div>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group basic">
                           
                            <div class="input-wrapper">
                                <label class="label" for="userid3">Beneficiary Name</label>
                                <input type="text" class="form-control" name="ben_name" value="<?php echo $rows['ben_name'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="userid3">Account Number</label>
                                <input type="text" class="form-control" name="acc_num" value="<?php echo $rows['acc_num'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="userid3">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" value="<?php echo $rows['bank_name'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="userid3">Swift Code</label>
                                <input type="text" class="form-control" name="swift_code" value="<?php echo $rows['swift_code'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>                            
                        </div>
                        
                    
                        
                        <div class="mt-1"></div>

                    <a href="confirm-ben-transfer.php?sn= <?php echo $rows["sn"]; ?>" class="btn btn-primary btn-block" >CONFIRM</a> 
                     
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>

        <br>                


    <?php include ('app-bottom.php'); ?>


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