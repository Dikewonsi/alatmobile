<?php
	session_start();

	include ("connect.php");

	$status = 1;


	$sn = mysqli_escape_string($conn, $_GET['sn']);
     $sql=" UPDATE loans SET status ='$status'
       
      where sn ='$sn'  ";

     if ($conn->query($sql) === TRUE){
     	 ?>
		   <script type="text/javascript">
		   alert("You have successfully granted a loan.");
		   window.location="dashboard.php";
		   </script>
			<?php
			die();

	} else{
		?>
		<script type="text/javascript">
		   alert("an error occured.");
		   window.location="grant-loan.php";
		  </script>
		  <?php
      die();
	}


$conn->close();
?>