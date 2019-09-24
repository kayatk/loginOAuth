<?php
/*
 * @author Shan Peiris
*/
session_start();
$_SESSION = array();
unset($_SESSION);
session_destroy();
header("location:index.php");
?>