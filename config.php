<?php 
ob_start(); 

setlocale(LC_ALL, 'pt_BR.UTF-8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');
date_default_timezone_set('America/Bahia');


error_reporting(1);
ini_set('display_errors', 1);


define("TITLE", "Access Dashboard");
define("WEBSITE", "Access Dashboard");


define( 'PATH', str_replace("\\", "/", __DIR__) );

function directory($extend = '') {
    return PATH."/".$extend;
}


define("DB_HOST", 'localhost');
define("DB_NAME", 'access_dashboard');
define("DB_USER", 'root');
define("DB_PSWD", '');


define("MAIL_HOST", "br830.hostgator.com.br");
define("MAIL_USER", "email@webship.com.br");
define("MAIL_PSWD", '$FUNksgPK766g5');
define("MAIL_MAIL", "email@webship.com.br");

$iterator = new RecursiveIteratorIterator( 
    new RecursiveDirectoryIterator( directory('dist/')  ), 
    RecursiveIteratorIterator::SELF_FIRST
);
foreach($iterator as $file) {
    if($file->isDir()) continue;
    include_once $file->getRealPath();
}

function uri($extend = '') {
    return URL::root($extend);
}

include directory('load.php');

include directory('request/variables.php');
