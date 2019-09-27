<?php
session_start();
session_destroy();
setcookie ('mantener','',time()-1);
header('location: login.php');
