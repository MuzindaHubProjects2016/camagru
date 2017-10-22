<?php

session_start();

unset($_SESSION['email']);
unset($_SESSION['status']);
header("Location: ../index1.php");
exit();
?>