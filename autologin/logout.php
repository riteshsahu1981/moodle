<?php
require_once(__DIR__ . "/../config.php");
require_once(__DIR__ . "/../user/lib.php");

$moodle_username=$_POST['moodle_username'];
$autologin_login_table='autologin_login';
$autologin = $DB->get_record($autologin_login_table, array('moodle_username' => $moodle_username));
if(false !== $autologin){
	$autologin->login_status = 0;
	$autologin->updated_at = date("Y-m-d H:i:s");
	$DB->update_record($autologin_login_table, $autologin, $bulk=false);
}
echo "OK";