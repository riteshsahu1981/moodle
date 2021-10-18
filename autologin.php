<?php

include( 'config.php' );

/* if(isloggedin()){
	echo "Logout action";
	require_logout();
} */

$username=$_GET['username'];
$password='fredpass6';
$firstname=$_GET['firstname'];
$lastname=$_GET['lastname'];
$email=$_GET['email'];

$user = $DB->get_record('user', array('username' => $username));
if($user===false){
	$user=create_user_record( $username,$password );
}else{
	echo "User exists ". $user->id;
}
$user->firstname=$firstname;
$user->lastname=$lastname;
$user->email=$email;
require('user/lib.php');
user_update_user($user);
complete_user_login($user);
redirect('/');
	
//
//var_dump(validate_internal_user_password($username,$password));

/* if($user=authenticate_user_login($username, $password, true))
{
	$user->firstname=$firstname;
	$user->lastname=$lastname;
	$user->email=$email;
	require('user/lib.php');
	user_update_user($user);
	complete_user_login($user);
	
	
} */
//var_dump($user);