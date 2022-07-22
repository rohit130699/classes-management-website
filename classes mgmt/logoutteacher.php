<?php
session_start();
unset($_SESSION['teacher']);
header("Location:index.html");
exit;
?>