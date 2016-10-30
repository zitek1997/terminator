<?php
include("ajax/config.php");
if (isset($_SESSION['uid']))
{
include("archiwum/index.html");
}else{
include("archiwum/login.html");
}

?>
