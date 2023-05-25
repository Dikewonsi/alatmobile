<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
	<script src="sweetalert2/jquery-3.6.0.min.js"></script>
    <script src="sweetalert2/sweetalert2.all.min.js"></script>
</head>
<body>

</body>
</html>
<?php
	session_start();

	include ("../connect.php");

	$sn = mysqli_escape_string($conn, $_GET['sn']);
    $sql= 'DELETE from beneficiary where sn = '.$sn;

     if ($conn->query($sql) === TRUE){
     	 ?>
		   <script type="text/javascript">
            Swal.fire(
              'Success!',
              'You have successfully deleted a beneficiary',
              'success'
            )
            window.location="beneficiary.php";
        </script>		   
			<?php
			die();

	} else{
		?>
		<script type="text/javascript">
		   alert("an error occured.");
		   window.location="delete-customers.php";
		  </script>
		  <?php
      die();
	}


$conn->close();

?>