<?php
include("ajax/config.php");
if (isset($_SESSION['uid']))
{
  if($_SESSION['admin']==TRUE){
    include("archiwum/index.html");
  }else{
    include("archiwum/indexu.html");
  }
}else{
  include("archiwum/login.html");
}

?>
