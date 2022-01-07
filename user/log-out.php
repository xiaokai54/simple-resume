<?php
setcookie("User_name",base64_decode($_COOKIE["User_name"]),time()-1,'/');
header("refresh:0;url='../'");