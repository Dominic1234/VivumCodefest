<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
session_destroy();
echo "<script>window.location.replace('/')</script>";
?>
