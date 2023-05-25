<?php
	session_start();

	include ("connect.php");

	$id = mysqli_escape_string($conn, $_GET['id']);
    $sql= 'DELETE from users where id = '.$id;

     if ($conn->query($sql) === TRUE){
     	 ?>
		   <script type="text/javascript">
		   alert("You have successfully deleted a User.");
		   window.location="delete-user.php";
		   </script>
			<?php
			die();

	} else{
		?>
		<script type="text/javascript">
		   alert("an error occured.");
		   window.location="delete-user.php";
		  </script>
		  <?php
      die();
	}


$conn->close();

?>