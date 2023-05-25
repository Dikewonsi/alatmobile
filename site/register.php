<?php
    include('connect.php');
    session_start();
    $errors = array();

      //check for submit
  if(filter_has_var(INPUT_POST, 'submit'))
  {
    $title = htmlspecialchars($_POST['title']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $phone = htmlspecialchars($_POST['phone']);
    $acc_type = htmlspecialchars($_POST['acc_type']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpass = htmlspecialchars($_POST['cpass']);
    $status = 'notverified';
    $gender = 'not_specified';
    $dob = 'not_specified';
    $m_status = 'not_specified';
    $occupation = 'not_specified';
    $street = 'not_specified';
    $city = 'not_specified';
    $state = 'not_specified';
    $postcode = 'not_specified';
    $country = 'not_specified';
    $acc_num = 'not_specified';
    $balance = 0;
    $savings = 0;
    


    //Password Check
    if ($password !== $cpass)
    {
        $errors['password'] = "Login Passwords do not match!";
    }
  
    //Check For User with same Email
    $sql = "SELECT * from users where email = '$email' ";
    $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
           $errors['email'] = "Email that you have entered already exists!";
        }

    //Begin insert into DB
    if(count($errors) === 0)
    {
        $app_num=rand(2022001,2022100);
        $code = rand(999999, 111111);

        $insert_data = "INSERT INTO  users (title, fname, lname, gender, dob, m_status, occupation, street, city, state, postcode, country, phone, acc_type, email, password, acc_num, balance, savings, status, app_num, code, date)
        VALUES ('$title', '$fname', '$lname', '$gender', '$dob', '$m_status', '$occupation', '$street', '$city', '$state', '$postcode', '$country', '$phone', '$acc_type', '$email', '$password', '$acc_num', '$balance', '$savings', '$status', '$app_num', '$code', now())";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            // set the location of the template file to be loaded
            $template_file = "./verify-email-template.php";

            // set the email 'from' information
            $email_from = "Kariba from Alat <alat@jeffreyisibor.dev>";

            // create a list of the variables to be swapped in the html template
            $swap_var = array(
              "{SITE_ADDR}" => "https://jeffreyisibor.dev",
              "{EMAIL_TITLE}" => "Email Address Verification",       
              "{TO_NAME}" => "$fname",
              "{OTP}" => "$code",
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
            foreach (array_keys($swap_var) as $key)
            {
              if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                $email_message = str_replace($key, $swap_var[$key], $email_message);
            }
           if (mail($email_to, $email_subject, $email_message, $email_headers))
            {                                
                    header('location:user-otp.php');
                    exit();
            }
            else
            {
                $errors['db-error'] = "System Failed while sending OTP!";
            }
        }
        else
        {
            $errors['db-error'] = "Failed while inserting data into database!";
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
    <title>Alat - Create an Account</title>

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
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section register">
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

    <!-- Register In start -->
    <section class="sign-in-up register">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-content">
                            <div class="section-header">
                                <h5 class="sub-title">The Power of Financial Freedom</h5>
                                <h2 class="title">Let’s Get Started!</h2>
                                <p>Please Enter your Personal Details to Start your Online Application</p>
                            </div>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="row">
                                    <div class="col-12">
                                            <?php
                                            if(count($errors) == 1){
                                                ?>
                                                <div class="alert alert-danger text-center">
                                                    <?php
                                                    foreach($errors as $showerror){
                                                        echo $showerror;
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }elseif(count($errors) > 1){
                                                ?>
                                                <div class="alert alert-danger">
                                                    <?php
                                                    foreach($errors as $showerror){
                                                        ?>
                                                        <li><?php echo $showerror; ?></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <select class="form-control" name="title">
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Sir">Sir</option>
                                                <option value="Dr">Dr</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="single-input">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" placeholder="John" required>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="single-input">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" placeholder="Fisher" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="phone">Enter Your Phone Number</label>
                                            <input type="tel" name="phone" placeholder="Your Phone number here" requireds>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="email">Account Type</label>
                                            <input type="text" name="acc_type" placeholder="Savings or Current" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="email">Enter Your Email Address</label>
                                            <input type="email" name="email" placeholder="Your email address here" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="confirmPass">Enter Your Password</label>
                                            <div class="password-show d-flex align-items-center">
                                                <input type="text" class="passInput" name="password" autocomplete="off" placeholder="Enter Your Password" required>
                                                <img class="showPass" src="assets/images/icon/show-hide.png" alt="icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="confirmPass">Confirm Password</label>
                                            <div class="password-show d-flex align-items-center">
                                                <input type="text" class="passInput" name="cpass" autocomplete="off" placeholder="Confirm Your Password" required>
                                                <img class="showPass" src="assets/images/icon/show-hide.png" alt="icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-input">
                                            <p>By clicking submit, you agree to <span>Alat's Terms of Use, Privacy Policy, E-sign</span> & <span>communication Authorization.</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <button type="submit" name="submit" class="cmn-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register In end -->

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