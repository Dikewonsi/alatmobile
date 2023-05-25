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
    <title>Alat - Upload Picture</title>
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
    // Include the database configuration file  
    include('../connect.php');
     
    // If file upload form is submitted 
    $status = $statusMsg = ''; 
    if(isset($_POST["upload"])){ 
        $status = 'error'; 
        if (isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {
            
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error']; 
             
            if($error === 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc, $allowed_exs)){
                   $new_img_name = uniqid($fname, true).'.'.$img_ex_to_lc;
                   $img_upload_path = 'upload/'.$new_img_name;
                   move_uploaded_file($tmp_name, $img_upload_path);

                   // Insert into Database
                    $update_data=" UPDATE users SET fname='$fname', image='$new_img_name' WHERE id ='$id'  ";
                    $data_check = mysqli_query($conn, $update_data);
                    header("location: account-settings.php");                   
                    exit;         
                }else {
                   $em = "You can't upload files of this type";
                   header("Location: ../index.php?error=$em&$data");
                   exit;
                }
             }else {
                $em = "unknown error occurred!";
                header("Location: ../index.php?error=$em&$data");
                exit;
             } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
    } 
     
    // Display status message 
    echo $statusMsg; 
    ?>

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
            Profile Picture
        </div>        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="section-title">Upload Picture</div>
            <div class="card">
                <div class="card-body">

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="custom-file-upload" id="fileUpload1">
                            <input type="file" id="fileuploadInput" name="image" required accept=".png, .jpg, .jpeg">
                            <label for="fileuploadInput">
                                <span>
                                    <strong>
                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                        <i>Upload a Photo</i>
                                    </strong>
                                </span>
                            </label>
                        </div>
                        <div class="mt-1"></div>

                        <button type="submit" name="upload" class="btn btn-primary btn-block">Upload</button>

                    </form>

                </div>
            </div>
        </div>


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