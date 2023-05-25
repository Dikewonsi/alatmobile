<?php
//mysql_select_db($database_cn, $cn);
require_once('connect.php');
session_start();

if(isset($_POST['update'])){
	

	$id = mysqli_escape_string($conn, $_POST['id']);
	$title = mysqli_escape_string($conn, $_POST['title']);
	$fname = mysqli_escape_string($conn, $_POST['fname']);
	$lname = mysqli_escape_string($conn, $_POST['lname']);
	$gender = mysqli_escape_string($conn, $_POST['gender']);
	$m_status = mysqli_escape_string($conn, $_POST['m_status']);
	$dob = mysqli_escape_string($conn, $_POST['dob']);
	$occupation = mysqli_escape_string($conn, $_POST['occupation']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$phone = mysqli_escape_string($conn, $_POST['phone']);
	$postcode = mysqli_escape_string($conn, $_POST['postcode']);
	$street = mysqli_escape_string($conn, $_POST['street']);
	$city = mysqli_escape_string($conn, $_POST['city']);
	$state = mysqli_escape_string($conn, $_POST['state']);
	$country = mysqli_escape_string($conn, $_POST['country']);
	$acc_num = mysqli_escape_string($conn, $_POST['acc_num']);
	$balance = mysqli_escape_string($conn, $_POST['balance']);
	$acc_type = mysqli_escape_string($conn, $_POST['acc_type']);
	$password = mysqli_escape_string($conn, $_POST['password']);

	$sql=" UPDATE users SET title='$title', fname='$fname', lname='$lname', gender='$gender', m_status='$m_status', dob='$dob', email='$email', phone='$phone', postcode='$postcode',  street='$street', city='$city', state='$state', country='$country', occupation='$occupation', acc_num='$acc_num', balance='$balance', acc_type='$acc_type', password='$password' WHERE id ='$id'  ";

 if ($conn->query($sql) === TRUE) {
 


?>

<script type="text/javascript">
	alert("Update was Successful");
	window.location="edit-user.php";
</script>
<?php 
die();


}
}

?>