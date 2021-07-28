<?php
session_start();
include("config.php");
$sql=$dbh->prepare("DELETE FROM chatters WHERE uname=?");
$sql->execute(array($_SESSION['user']));
session_destroy();
header("Location: registration.php");
?>