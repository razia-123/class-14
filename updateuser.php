<?php
session_start();
include_once './../../contact.php';

$fname = trim($_REQUEST['fname']);
$lname = trim($_REQUEST['lname']);
$email = trim($_REQUEST['email']);
$avatar = $_FILES['avatar'];


$avatarExtension=pathinfo($avatar['name'], PATHINFO_EXTENSION);
$expectedExtension =['jpg','jpeg','png','webp'];
$errors =[];

echo'<pre>';
print_r($avatar);
echo'</pre>';

if(!in_array($avatarExtension ,$expectedExtension)){
    echo 'only jpg,jpeg,png and webp format is allowed';
}
elseif( $avatar['size'] >5000000){
    echo'your file too large.max file size 5 mb';
}
else{
var_dump(move_uploaded_file($avatar['tmp_name'],'./../../uploads/'.uniqid().'.'.$avatarExtension));
}
exit();





//First Name Validation
if (empty($fname)) {
    $errors['fnameError'] = 'First name is required';
} elseif (strlen($fname) > 20) {
    $errors['fnameError'] = 'First name can not be more than 20 Character.';
}


//Last Name Validation
if (empty($lname)) {
    $errors['lnameError'] = 'Last name is required';
} elseif (strlen($lname) > 20) {
    $errors['lnameError'] = 'Last name can not be more than 20 Character.';
}

//Email Validation
if (empty($email)) {
    $errors['emailError'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailError'] = 'Invalid Email Address';
}



//avater/profile Validation


// if(count($errors) > 0){
//     $_SESSION = $errors;
//     header('Location: ./../../backend/register.php');
// }else{
//     $query = "INSERT INTO users(fname, lname, email, password) VALUES ('$fname','$lname','$email','$hashPassword')";
//     $result = mysqli_query($conn, $query);
    
    
    
//     if($result){
//         $_SESSION["success"] ="Account Created Successfully. Please login your account.";
//         header('Location: ./../../backend/login.php');
//     }else{
//         $_SESSION["failed"] ="Account Creation Failed.";
//         header('Location: ./../../backend/register.php');
//     }
  
// }



?>
