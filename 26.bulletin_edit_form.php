<?php

    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，讀取登入資訊
    session_start();

    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {

        // 未登入時顯示提示訊息
        echo "please login first";

        // 3秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        // 建立 MySQL 資料庫連線
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );

        // 根據網址參數(bid)查詢指定佈告資料
        $result = mysqli_query(
            $conn,
            "select * from bulletin where bid={$_GET['bid']}"
        );

        // 取得查詢結果
        $row = mysqli_fetch_array($result);

        // 初始化 Radio Button 的 checked 狀態
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";

        // 根據資料庫中的 type 值設定預設勾選項目
        if ($row['type'] == 1)
            $checked1 = "checked";

        if ($row['type'] == 2)
            $checked2 = "checked";

        if ($row['type'] == 3)
            $checked3 = "checked";

        // 顯示修改佈告表單
        echo "
        <html>
            <head>
                <title>新增佈告</title>
            </head>

            <body>

                <!-- 表單送至 27.bulletin_edit.php 進行更新 -->
                <form method=post action=27.bulletin_edit.php>

                    <!-- 顯示佈告編號 -->
                    佈告編號：{$row['bid']}

                    <!-- 隱藏欄位，將 bid 傳送給修改程式 -->
                    <input type=hidden name=bid value={$row['bid']}><br>

                    <!-- 顯示原標題 -->
                    標    題：
                    <input type=text name=title value={$row['title']}><br>

                    <!-- 顯示原內容 -->
                    內    容：<br>
                    <textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>

                    <!-- 顯示原佈告類型 -->
                    佈告類型：
                    <input type=radio name=type value=1 {$checked1}>系上公告
                    <input type=radio name=type value=2 {$checked2}>獲獎資訊
                    <input type=radio name=type value=3 {$checked3}>徵才資訊
                    <br>

                    <!-- 顯示原發布日期 -->
                    發布時間：
                    <input type=date name=time value={$row['time']}><p></p>

                    <!-- 送出修改 -->
                    <input type=submit value=修改佈告>

                    <!-- 清除表單內容 -->
                    <input type=reset value=清除>

                </form>

            </body>
        </html>
        ";
    }

?>