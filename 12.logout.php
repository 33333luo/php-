<?php

session_start();

// 清除所有 session 變數
session_unset();

// 銷毀 session
session_destroy();

echo "登出成功....";
echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";

?>