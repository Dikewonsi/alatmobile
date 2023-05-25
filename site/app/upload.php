<?php 
// Include the database configuration file  
include('../connect.php');

$id = 1;
$fname = 'jeffreys';
 
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
                header("location: account_settings.php");                   
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