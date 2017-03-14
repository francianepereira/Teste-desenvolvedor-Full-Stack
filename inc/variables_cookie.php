<?php
$access_key_mailboxlayer = "188361e68a4aa131d3a9657d4af1aacb";
setcookie("access_key", $access_key_mailboxlayer);
$_SESSION["access_key"] = $access_key_mailboxlayer;
$token = substr(md5(uniqid(rand(), true)), 0, 6);
$_COOKIE["token"] = $token;
$_SESSION["token"] = $token;
?>

