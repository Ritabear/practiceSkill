# practiceSkill

### 練習 1 --做一個實作登入
1-1:請設計一組給GM使用的Email&密碼登入

![image-20211031210749643](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031210749643.png)

輸入帳號：admin@mail.com 輸入密碼：a123456

1-2:判斷登入失敗訊息！ 如下圖所示

![image-20211031210831587](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031210831587.png)

1-3:登入成功時，顯示帳號名稱以及觀迎訊息！



![image-20211031210840048](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031210840048.png)

並確保在瀏覽器刷新後也會顯示帳號名稱和歡迎訊息(檢查session是否登入)

 帳號名稱:Tony(從資料庫欄位獲取) 

1-4:登入成功後請顯示一個登出按鈕，並實作登出.

![image-20211031211000923](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031211000923.png)

請登出成功後確保在瀏覽器刷新後會回到登入視窗(檢查是否清除session。



### 練習 2 --API獲取

2-1:透過API獲取A_Name_Ch資料並在網頁顯示如下

![image-20211031211708922](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031211708922.png)

2-2:呈現動物圖片，點擊動物列表後，獲取A_Pic02_URL資料欄位圖片呈現

![image-20211031211743253](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031211743253.png)

### 練習 3 --記事本管理

3-1. 請建立如下之欄位，來完成帳款登記畫面

![image-20211031211902041](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031211902041.png)

 id:自動創建遞增欄位

姓名：以文字方式輸入

身分證：以唯一值文字方式輸入

款項類型：以文字方式輸入

金額：以數字方式輸入

 日期：以日期方式輸入

 操作：編輯或刪除動作

 新增：創建新增畫面

 輸出Excel：將資料輸出成表格文件（xlsx格式）

 3-2.創建新增畫面 

![image-20211031212012645](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031212012645.png)

帳款項目欄位：可選擇[ 年費，捐款，入會費 ]

身分證：以文字輸入身分證字號

金額：以數字方式輸入

收款日期：以日期選擇方式輸入

備註：以文字輸入備註

新增資料按鈕：完成後送出，並更新資料庫，返回列表畫面

返回：不進行任何動作，返回列表畫面



 3-3.顯示列表畫面，將新增成功的話畫面顯示如上列表，並可選擇操作編輯或刪除

![image-20211031212031766](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031212031766.png)

3-4.編輯畫面:服務項目包含可選擇年費、入會費、捐款，身分證不可修改，其餘可修改，並更新資料，更新後回到顯示列表 

![image-20211031212207086](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031212207086.png)

3-5.刪除款項畫面，刪除款項後顯示更新畫面，刪除後更新顯示列表

![image-20211031212148690](C:\Users\User\AppData\Roaming\Typora\typora-user-images\image-20211031212148690.png)

3-6.輸出表格:將上述資料表欄位輸出Excel表格(xlsx)

