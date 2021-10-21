<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'test-server-explico-10152021.cfbpn8gu2e6x.ap-southeast-1.rds.amazonaws.com';
$CFG->dbname    = 'Moodle_Staging';
$CFG->dbuser    = 'admin';
$CFG->dbpass    = 'ChangeMe01#';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_0900_ai_ci',
);

$CFG->wwwroot   = 'https://staging.elearningcommons.com';
$CFG->dataroot  = '/var/www/moodledata-staging';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
