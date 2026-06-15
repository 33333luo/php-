<?php

    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，讀取登入資訊
    session_start();

    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {

        // 未登入時顯示提示訊息
        echo "請登入帳號";

        // 3秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 建立 MySQL 資料庫連線
        // mysqli_connect(主機, 帳號, 密碼, 資料庫名稱)
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );

        // 刪除佈告的 SQL 指令
        // 從網址參數(GET)取得欲刪除的佈告編號(bid)
        $sql = "delete from bulletin where bid='{$_GET["bid"]}'";

        // 除錯時可查看 SQL 指令
        // echo $sql;

        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {

            // 刪除失敗
            echo "佈告刪除錯誤";

        } else {

            // 刪除成功
            echo "佈告刪除成功";
        }

        // 3秒後返回佈告欄列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }

?>