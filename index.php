<?php
header("content-type:textml;charset=utf-8");
date_default_timezone_set('PRC');
error_reporting(0);
if($_GET['debug']==1){
	error_reporting(E_ALL);
}

include 'config/config.common.php';
include 'config/config.db.php';
include 'common/tools.php';
include 'common/functions.php';

define('ROOT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

$act = safeGet('act');
$app = safeGet('app') ? str_replace("/", "", safeGet('app')) : '';
$file = ROOT_PATH.'controller/'.$app.'/'.$act.'.php'; 
if(!file_exists($file)){
    $act = 'index';
    $app = '';
    $file = ROOT_PATH.'controller/'.$act.'.php';
}

include($file);
