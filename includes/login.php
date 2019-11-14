<?php include "db.php"?>
<?php session_start();?>
<?php

if(isset($_POST['login'])){
	$username= $_POST['username'];
	$password= $_POST['password'];

	$query="SELECT * FROM users WHERE username='{$username}'";
	$select_user=mysqli_query($connection,$query);
	$db_user=mysqli_fetch_assoc($select_user);
	$db_id=$db_user['user_id'];
	$db_username=$db_user['username'];
	$db_password=$db_user['user_password'];
	$db_user_firstname=$db_user['user_firstname'];
	$db_user_lastname=$db_user['user_lastname'];
	$db_user_role=$db_user['user_role'];


	if($username===$db_username && $password===$db_password){
		$_SESSION['username']=$db_username;
		$_SESSION['firstname']=$db_user_firstname;
		$_SESSION['lastname']=$db_user_lastname;
		$_SESSION['user_role']=$db_user_role;
		header("Location:../admin");
	}else{
		header("Location:../");
	}

}

?>