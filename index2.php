<?php

//DB定義
//const DB = "localhost";
//const DB_ID = "root";
//const DB_PW = "";
//const DB_NAME = "gs_db";

//PDOでデータベース接続
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gs_db;charset=utf8",'root','');
}catch (PDOException $e) {
    exit( 'DbconnectError;' .$e->getMessage());
}

//実行したいSQL文
//SELECT*FORM テーブル名 ORDER BY カラム名 ASC;
$sql='SELECT * FROM gs_an_table';

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値を入れる。

$stmt = $pdo->prepare($sql);
$flag = $stmt->execute();

//データ表示

$view ="";

if($flag==false){
   $error = $stmt->errorInfo();
    exit("ErroQuery:".$error[2]);
}else{
    
?>
   
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>BOOKRIマーク！</title>
<!--
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
-->
</head>

<body>
  
   <h1 class="title_1" style="text-align:center; color:blue;">BOOKRIマーク！</h1>
   
  <table border="1" class="table_1" style="margin: auto">
  <tr> 
    <th scope="col">ID</th> 
    <th scope="col">書籍名</th> 
    <th scope="col">書籍URL</th> 
    <th scope="col">書籍コメント</th> 
    <th scope="col">登録日時</th>
  </tr> 
   
    <?php
    while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    
<!--    $view .="<td>".$result["id"]."</td>";-->
    
  <tr> 
    <td><?php echo(htmlspecialchars($result['id'])); ?> </td> 
    <td><?php print(htmlspecialchars($result['book_name'])); ?> </td> 
    <td><?php print(htmlspecialchars($result['url'])); ?> </td> 
    <td><?php print(htmlspecialchars($result['comment'])); ?> </td>
    <td><?php print(htmlspecialchars($result['post_date'])); ?> </td>  
  </tr> 
  
  <?php
    }
    ?>
    
  
<!--"<td>".$result["book_name"]."</td>""<td>".$result["url"]."</td>""<td>".$result["comment"]."</td>""<td>".$result["post_date"]."</td>";-->
  
<!--    <div><?=$view?></div>-->
    

   
</table>
</body>
</html>

    <?php
    }
    ?>
    

<!--phpの間にhtmlを書くときには　}に気をつける。-->
 
 
 


 
 
