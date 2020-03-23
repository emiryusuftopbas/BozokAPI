<?php

$dirname= strtolower(dirname($_SERVER['SCRIPT_NAME']));
$dirname != '/' ? $dirname: null;
$dirname = ($dirname == '\\') ? '' : $dirname;

$hostname = $_SERVER['HTTP_HOST'];
define('SitePath', $dirname);
define('SiteHost', $hostname);
?>