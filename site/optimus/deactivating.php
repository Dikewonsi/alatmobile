<?php
	session_start();

	include ("connect.php");

	$status = 'notverified';


	$id = mysqli_escape_string($conn, $_GET['id']);
     $sql=" UPDATE users SET status ='$status'
       
      where id ='$id'  ";

     if ($conn->query($sql) === TRUE){
     	 ?>
		   <script type="text/javascript">
		   alert("You have successfully deactivated a user.");
		   window.location="activate-user.php";
		   </script>
			<?php
			die();

	} else{
		?>
		<script type="text/javascript">
		   alert("an error occured.");
		   window.location="activate-user.php";
		  </script>
		  <?php
      die();
	}


$conn->close();
?>