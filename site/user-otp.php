<?php
include('connect.php');
$errors = array();
session_start();


//if user click verification code submit button
    if(isset($_POST['check'])){
        $one = mysqli_real_escape_string($conn, $_POST['one']);
        $two = mysqli_real_escape_string($conn, $_POST['two']);
        $three = mysqli_real_escape_string($conn, $_POST['three']);
        $four = mysqli_real_escape_string($conn, $_POST['four']);
        $five = mysqli_real_escape_string($conn, $_POST['five']);
        $six = mysqli_real_escape_string($conn, $_POST['six']);

        //concatenate otp codes
        $otp_code = $one.''.$two.''.$three.''.$four.''.$five.''.$six;


        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $fname = $fetch_data['fname'];
            $app_num = $fetch_data['app_num'];
            $code = 0;            
            $update_otp = "UPDATE users SET code = $code WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                // set the location of the template file to be loaded
                $template_file = "./welcome-template.php";

                // set the email 'from' information
                $email_from = "Kariba from Zaphir <alat@jeffreyisibor.dev>";

                // create a list of the variables to be swapped in the html template
                $swap_var = array(
                  "{SITE_ADDR}" => "https://jeffreyisibor.dev",
                  "{EMAIL_TITLE}" => "Welcome to Alat",       
                  "{TO_NAME}" => "$fname",
                  "{A_NUM}" => "$app_num",
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
                        header('location:success-signup.php');
                        exit();
                    }else{
                       $errors['db-error'] = "System Failed while sending OTP!";
                    }
        }else{
            $errors['otp-error'] = "Wrong OTP Code!";
        }
    }
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alat - User OTP</title>

    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugin/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugin/slick.css">
    <link rel="stylesheet" href="assets/css/arafat-font.css">
    <link rel="stylesheet" href="assets/css/plugin/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section register verify-number">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar d-flex justify-content-between navbar-expand-lg navbar-dark">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo.png" class="logo" alt="logo">
                        </a>
                        <div class="d-flex align-items-center justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    Already have account
                                </li>
                            </ul>
                            <div class="right-area header-action d-flex align-items-center">
                                <a href="login.php" class="cmn-btn">Login Now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

    <!-- Verify Number In start -->
    <section class="sign-in-up verify-number">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-content">
                            <div class="section-header">
                                <h5 class="sub-title">Give yourself the Zaphir Edge</h5>
                                <h2 class="title">Verify Your Email Address</h2>
                                <p>A 6 digit One Time Password (OTP) has been sent to your given email address which will expire in 15 minutes, after which you will need to resend the code.</p>
                            </div>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="row">
                                    <div>                                        
                                        <?php
                                        if(count($errors) > 0){
                                            ?>
                                            <div class="alert alert-danger text-center">
                                                <?php
                                                foreach($errors as $showerror){
                                                    echo $showerror;
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-5 col-lg-6 col-md-6">
                                        <div class="single-input">
                                            <label for="mobileOTP">Enter OTP Here</label>
                                            <div class="mobile-otp d-flex align-items-center">
                                                <div id="mobileOTP" class="inputs d-flex flex-row justify-content-center">
                                                    <input class="text-center form-control" name="one" type="text" placeholder="-" maxlength="1"/>
                                                    <input class="text-center form-control" name="two" type="text" placeholder="-" maxlength="1"/>
                                                    <input class="text-center form-control" name="three" type="text" placeholder="-" maxlength="1"/>
                                                    <input class="text-center form-control" name="four" type="text" placeholder="-" maxlength="1"/>
                                                    <input class="text-center form-control" name="five" type="text" placeholder="-" maxlength="1"/>
                                                    <input class="text-center form-control" name="six" type="text" placeholder="-" maxlength="1"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <a href="javascript:void(0)">Resend Code</a>
                                    <button name="check" class="cmn-btn">Submit OTP</button>
                                </div>
                            </form>
                            <div class="btn-back mt-60 d-flex align-items-center">
                                <a href="register.php" class="back-arrow"><img src="assets/images/icon/arrow-left.png"
                                        alt="icon">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Verify Number In end -->

    <!--==================================================================-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/plugin/slick.js"></script>
    <script src="assets/js/plugin/waypoint.min.js"></script>
    <script src="assets/js/plugin/counter.js"></script>
    <script src="assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugin/wow.min.js"></script>
    <script src="assets/js/plugin/plugin.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>