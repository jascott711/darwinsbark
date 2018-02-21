<?php

$DB_host = "138.197.84.156";
$DB_user = "jas";
$DB_pass = "Thrice1";
$DB_name = "users";

$DBcon = mysqli_connect($DB_host,$DB_user,$DB_pass,$DB_name);

if (!$DBcon) {
    die('Could not connect: ' . mysqli_error($DBcon));
}

$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];
$doj = $_POST['doj'];

$stmt = $DBcon->prepare("INSERT INTO users.tbl_users (fld_user_name,fld_user_email,fld_facebook_id,fld_user_doj) VALUES (?,?,?,?)");

$stmt->bind_param(sssi,$name,$email,$id,$doj);

if($stmt->execute()){
	echo 'success';
}
else {
	echo 'failure';
}

?>