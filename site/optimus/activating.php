<?php
	session_start();

	include ("connect.php");



	$acc_num = '';
	$acc_num=rand(3137000001,3137100000);
	$status = 'verified';
  $balance = 0;


	$id = mysqli_escape_string($conn, $_GET['id']);
	$sql=" UPDATE users SET status ='$status', balance='$balance', acc_num = '$acc_num'
       
      where id ='$id'  ";

    $check_code = "SELECT * FROM users WHERE id = $id";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $fname = $fetch_data['fname'];
            $password = $fetch_data['password'];
        }

     if ($conn->query($sql) === TRUE){
     	// set the location of the template file to be loaded
            $template_file = "./approved-template.php";

            // set the email 'from' information
            $email_from = "Kariba from Egmont <support@egmontbank.com>";

            // create a list of the variables to be swapped in the html template
            $swap_var = array(
              "{SITE_ADDR}" => "https://egmontbank.com",
              "{EMAIL_TITLE}" => "Account Approved!",       
              "{TO_NAME}" => "$fname",
              "{TO_EMAIL}" => "$email",
              "{PASSWORD}" => "$password"
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
                   ?>
				   <script type="text/javascript">
				   alert("You have successfully activated a new user.");
				   window.location="activate-user.php";
				   </script>
					<?php
					die();
                }else{
                   ?>
				   <script type="text/javascript">
					   alert("Something went wrong.");
					   window.location="activate-user.php";
				   </script>
					<?php
					die();
                }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        

	}


$conn->close();
?>