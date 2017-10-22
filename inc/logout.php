<?php

session_start();
unset($_SESSION['status']);
header("Location: ../index.php");
exit();
?>