<html>
    <head>
        <title>修改使用者</title>
    </head>
    <body>

    <?php

    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，讀取登入資訊
    session_start();

    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {

        // 未登入時顯示提示訊息
        echo "請登入帳號";

        // 3秒後自動跳轉到登入頁面
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

        // 查詢指定使用者資料
        // 從網址參數(GET)取得欲修改的使用者帳號
        $result = mysqli_query(
            $conn,
            "select * from user where id='{$_GET['id']}'"
        );

        // 取出查詢結果的一筆資料
        $row = mysqli_fetch_array($result);

        // 顯示修改表單
        echo "
        <form method=post action=20.user_edit.php>

            <!-- 隱藏欄位，將帳號傳送到修改程式 -->
            <input type=hidden name=id value={$row['id']}>

            <!-- 顯示帳號(不可修改) -->
            帳號：{$row['id']}<br>

            <!-- 顯示原密碼，可直接修改 -->
            密碼：
            <input type=text name=pwd value={$row['pwd']}><p></p>

            <!-- 送出修改資料 -->
            <input type=submit value=修改>

        </form>
        ";
    }

    ?>

    </body>
</html>