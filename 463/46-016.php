<?php
  session_start();
  $token = $_COOKIE['token'];
  if (! $token || $token != $_SESSION['token']) {
    die('認証エラー');
  }
?>
<body> 認証に成功しました </body>
