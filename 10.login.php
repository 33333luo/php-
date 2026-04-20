<?php

// mysqli_connect()：建立資料庫連線
$conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");

// mysqli_query()：執行 SQL 查詢（抓取 user 資料表所有資料）
$result = mysqli_query($conn, "SELECT * FROM user");

// 設定登入狀態（預設為 false）
$login = FALSE;

// mysqli_fetch_array()：逐筆讀取資料
while ($row = mysqli_fetch_array($result)) {

    // 比對使用者輸入的帳號密碼是否與資料庫一致
    if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
        $login = TRUE;
    }
}

// 判斷是否登入成功
if ($login == TRUE) {

    // 啟用 session
    session_start();

    // 將使用者帳號存入 session
    $_SESSION["id"] = $_POST["id"];

    // 顯示成功訊息
    echo "登入成功";

    // 3 秒後跳轉到公告頁
    echo "<meta http-equiv='REFRESH' content='3; url=11.bulletin.php'>";

} else {

    // 登入失敗訊息
    echo "帳號/密碼錯誤";

    // 3 秒後跳回登入頁
    echo "<meta http-equiv='REFRESH' content='3; url=2.login.html'>";
}

?>