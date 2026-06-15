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

        // 更新佈告資料的 SQL 指令
        // 從表單(Post)取得修改後的資料
        $sql = "
            update bulletin
            set
                title='{$_POST['title']}',
                content='{$_POST['content']}',
                time='{$_POST['time']}',
                type={$_POST['type']}
            where bid='{$_POST['bid']}'
        ";

        // 執行更新指令
        if (!mysqli_query($conn, $sql)) {

            // 修改失敗
            echo "修改錯誤";

            // 3秒後返回佈告欄列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
        else {

            // 修改成功
            echo "修改成功，三秒鐘後回到佈告欄列表";

            // 3秒後返回佈告欄列表頁面
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>