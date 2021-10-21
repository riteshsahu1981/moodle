<?php
require_once(__DIR__ . "/../config.php");
require_once(__DIR__ . "/../user/lib.php");

$payload=json_decode(base64_decode($_GET['enc_pl']), true);

$moodle_username=$payload['moodle_username'];
$laravel_username=$payload['laravel_username'];
$password='fredpass6';
$firstname=$payload['firstname'];
$lastname=$payload['lastname'];
$email=$payload['email'];

$user = $DB->get_record('user', array('username' => $moodle_username));

if($user===false){
	$user=create_user_record( $moodle_username, $password );
}

$user->firstname=$firstname;
$user->lastname=$lastname;
$user->email=$email;
user_update_user($user);
complete_user_login($user);

$autologin_login_table='autologin_login';
$autologin = $DB->get_record($autologin_login_table, array('moodle_username' => $moodle_username));
if(false===$autologin){
	$autologin = new stdClass();
	$autologin->moodle_username = $moodle_username;
	$autologin->laravel_username = $laravel_username;
	$autologin->login_status = 1;
	$autologin->created_at=date("Y-m-d H:i:s");
	$autologin->id = $DB->insert_record($autologin_login_table, $autologin, $returnid=true, $bulk=false);
}else{
	$autologin->login_status=1;
	$autologin->updated_at=date("Y-m-d H:i:s");
	$DB->update_record($autologin_login_table, $autologin, $bulk=false);
}
redirect('/');