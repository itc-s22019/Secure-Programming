<?php
function getParam($key, $pattern, $error) {
$val = filter_input(INPUT_GET, $key);
if (! mb_check_encoding($val, 'Shift_JIS')) {
die('文字エンコーディングが不正です');
}
$val = mb_convert_encoding($val, 'UTF-8', 'Shift_JIS');
if (preg_match($pattern, $val) !== 1) {
die($error);
}
return $val;
}
$name = getParam('name', '/\A[[:^cntrl:]]{1, 20}\z/',
'20文字以内で氏名を入力してください(必須項目)。制御文字は使用できません');
?>
<body>
名前は<?php echo htmlspecialchars($name, ENT_NOQUOTES, 'UTF-8'); ?>です
</body>
