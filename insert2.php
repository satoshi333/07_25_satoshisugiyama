<?php
//フォームのデータ受け取り 
//htmlspecialchars($_POST["title"],ENT_QUOTES);セキュリティのために必ず
//Question? postはentry2のどことマッチするのかnameとマッチさせる

//htmlspecialcharsはinsertでは使用しないこと！indexでは使用する！
//$title = htmlspecialchars($_POST["title"],ENT_QUOTES);
//$url = htmlspecialchars($_POST["url"],ENT_QUOTES);
//$detail = htmlspecialchars($_POST["detail"],ENT_QUOTES);

$title = $_POST["title"];
$url = $_POST["url"];
$detail = $_POST["detail"];

echo $title;
echo $url;
echo $detail;

//exit();
//exit();


//DB定義             ここの書き方はあっているのか？４つの項目はいつも同じなのか？同じ項目です。
//DB_PW
//DB_NAME
//const DB = "";
//const DB_ID = "root";
//const DB_PW ="";
//const DB_NAME = "";

//PDOでデータベース接続  PDOExceptioの$eは何？決まり文句？これは決まり文句です！
try {
    $pdo = new
    PDO("mysql:host=localhost;dbname=gs_db;charset=utf8",'root');
}catch (PDOException $e) {
    exit( 'DbconnectError:' . $e->getMessage());
}

//実行したいSQL文    テーブル名を指定すること　DB名ではない
$sql = "INSERT INTO gs_an_table(id, book_name, url, comment, post_date) VALUES
(NULL,:title,:url,:detail,sysdate())";//注）sysdate()の前には:はつけない

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
//$sqlは変数で実行したいのはINSERT INTO~
$stmt = $pdo->prepare($sql);
//bindValue()で実際の値をSQL文にセット　書き方を覚える！
$stmt->bindValue(':title',  $title, PDO::PARAM_STR);
$stmt->bindValue(':url',  $url, PDO::PARAM_STR);
$stmt->bindValue(':detail',  $detail, PDO::PARAM_STR);

//実際に実行➡︎実行ボタンを押したと同じ処理
$flag = $stmt->execute();

//実行完了した場合はentry.phpにリダイレクト
//失敗した場合はエラーメッセージ表示
if($flag==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]); //[2]で正しいのか？意味は？そのまま使うこと！
}else{

header('location:entry2.php'); //注）'location:enter.php'だと違う画面を表示してしまう
exit;
}

?>
