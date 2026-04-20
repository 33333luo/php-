<html>
<head>
    <title>使用者管理</title>
</head>
<body>

<?php

// =====================================
// 檔案名稱：18.user.php
// 功能：顯示與管理使用者資料
// =====================================

// 關閉錯誤訊息（避免畫面雜訊）
error_reporting(0);

// 啟用 session
session_start();

// 檢查是否登入
if (!isset($_SESSION["id"])) {

    echo "請登入帳號";

    // 3 秒後跳回登入頁
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";

} else {

    // 標題與功能選單
    echo "<h1>使用者管理</h1>
          [<a href=14.user_add_form.php>新增使用者</a>] 
          [<a href=11.bulletin.php>回佈告欄列表</a>]<br><br>";

    // 建立資料庫連線
    $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

    // 查詢 user 資料表
    $result = mysqli_query($conn, "SELECT * FROM user");

    // 表格標題
    echo "<table border=1 cellpadding=5>
            <tr>
                <td>功能</td>
                <td>帳號</td>
                <td>密碼</td>
            </tr>";

    // 顯示每一筆使用者資料
    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";

        // 修改 / 刪除
        echo "<td>
                <a href=19.user_edit_form.php?id={$row['id']}>修改</a> |
                <a href=17.user_delete.php?id={$row['id']}>刪除</a>
              </td>";

        // 帳號 / 密碼
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['pwd']}</td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>

</body>
</html>