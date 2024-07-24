<?php
function getToken() {
  $s = file_get_contents('/dev/urandom', false, NULL, 0, 24);
  return base64_encode($s);
}

  session_start();
  $token = getToken();
  setcookie('token', $token, 0, '/');
  $_SESSION['token'] = $token;
?>

