<?php 
$cookieName = "roll";
$cookieValue = "123";
setcookie($cookieName,$cookieValue, time()-(8600*30),"/");
echo "cookie value " . $_COOKIE[$cookieName];
?>