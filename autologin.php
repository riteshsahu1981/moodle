<?php
include( 'config.php' );
require('user/lib.php');

$payload=json_decode(base64_decode($_GET['enc_pl']), true);

$username=$payload['username'];
$password='fredpass6';
$firstname=$payload['firstname'];
$lastname=$payload['lastname'];
$email=$payload['email'];

$user = $DB->get_record('user', array('username' => $username));

if($user===false){
	$user=create_user_record( $username,$password );
}

$user->firstname=$firstname;
$user->lastname=$lastname;
$user->email=$email;
user_update_user($user);
complete_user_login($user);
redirect('/');