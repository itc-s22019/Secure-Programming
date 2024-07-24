<?php
  function ex($s) {
    echo htmlspecialchars($s, ENT_COMPAT, 'UTF-8');
  }
  session_start();
  $id = @$_SESSION['id'];
  $pwd = filter_input(INPUT_POST, 'pwd');
?>
<body>
<?php ex($id); ?>さんのパスワードを<?php ex($pwd); ?>に変更しました
</body>

