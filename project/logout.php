<?php
Session_start();
Session_destroy();
header('Location: register.php');

?>