<?php

// 關閉錯誤訊息顯示
error_reporting(0);

// 啟動 Session，讀取登入資訊
session_start();

// 檢查是否已登入
if (!$_SESSION["id"]) {

    // 未登入時顯示提示訊息
    echo "請登入帳號";

    // 3秒後自動跳轉到登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else {

   // 建立 MySQL 資料庫連線
   // mysqli_connect(主機名稱, 使用者名稱, 密碼, 資料庫名稱)
   $conn = mysqli_connect(
       "120.105.96.90",
       "immust",
       "immustimmust",
       "immust"
   );

   // 新增資料的 SQL 指令
   // 將表單送來的 id 與 pwd 寫入 user 資料表
   // 語法：
   // INSERT INTO 資料表(欄位1, 欄位2)
   // VALUES(值1, 值2)
   $sql = "insert into user(id,pwd)
           values('{$_POST['id']}', '{$_POST['pwd']}')";

   // 顯示 SQL 指令（除錯時可使用）
   // echo $sql;

   // 執行 SQL 新增指令
   if (!mysqli_query($conn, $sql)) {

      // 新增失敗時顯示錯誤訊息
      echo "新增命令錯誤";
   }
   else {

      // 新增成功時顯示訊息
      echo "新增使用者成功，三秒鐘後回到網頁";

      // 3秒後自動返回使用者管理頁面
      echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>