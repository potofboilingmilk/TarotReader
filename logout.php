<?php
session_start();
session_unset();
session_destroy();
header("Location: no_access.php");
?>
