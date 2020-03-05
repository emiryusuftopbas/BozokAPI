<?php

$dirname= strtolower(dirname($_SERVER['SCRIPT_NAME']));
$dirname != '/' ? $dirname: null;

define('SitePath', $dirname);

?>