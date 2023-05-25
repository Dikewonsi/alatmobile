<?php
	session_start();

	include ("connect.php");



	$acc_num = '';
	$acc_num=rand(3137000001,3137100000);
	$status = 'verified';


	$id = mysqli_escape_string($conn, $_GET['id']);
     $sql=" UPDATE users SET status ='$status', acc_num = '$acc_num'
       
      where id ='$id'  ";

    $check_code = "SELECT * FROM users WHERE id = 1";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $fname = $fetch_data['fname'];
        }

    echo $fname;
?>