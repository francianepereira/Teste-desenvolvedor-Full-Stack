<?php
$access_key_mailboxlayer = "188361e68a4aa131d3a9657d4af1aacb";
setcookie("access_key", $access_key_mailboxlayer);
$_SESSION["access_key"] = $access_key_mailboxlayer;
$token = bin2hex(openssl_random_pseudo_bytes(16));
setcookie("token", $token);
$_SESSION["token"] = $token;
?>

