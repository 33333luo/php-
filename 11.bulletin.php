<?php

// 關閉錯誤訊息顯示（避免畫面出現 warning）
error_reporting(0);

// 啟用 session（用來判斷是否登入）
session_start();

// 如果沒有登入（session 裡沒有 id）
if (!$_SESSION["id"]) {

    echo "請先登入";

    // 3 秒後跳回登入頁
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";

} else {

    // 顯示歡迎訊息與功能連結
    echo "歡迎, " . $_SESSION["id"] . 
         " [<a href=12.logout.php>登出</a>] 
           [<a href=18.user.php>管理使用者</a>] 
           [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

    // 建立資料庫連線
    $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

    // 查詢 bulletin 資料表
    $result = mysqli_query($conn, "SELECT * FROM bulletin");

    // 建立表格標題
    echo "<table border=2>
            <tr>
                <td>功能</td>
                <td>佈告編號</td>
                <td>佈告類別</td>
                <td>標題</td>
                <td>佈告內容</td>
                <td>發佈時間</td>
            </tr>";

    // 逐筆顯示資料
    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";

        // 修改 / 刪除功能
        echo "<td>
                <a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
                <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a>
              </td>";

        // 顯示各欄位資料
        echo "<td>" . $row["bid"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>