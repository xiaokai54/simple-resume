<?php
setcookie("User_name",$_COOKIE["User_name"],time()-1,'/');
header("refresh:0;url='../login'");