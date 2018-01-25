<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKRIマーク！</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
       <h1 style="color:blue;text-align:center;">BOOKRIマーク！</h1>
       <p>BOOKRIマーク！の内容は<a href="./" target=_blank>こちらから</a>覗けます！</p>
       <form action="insert2.php" method="post">
           <ul>
               <li class="form-item">
                   <label for="title">書籍名</label>
                   <input type="text" name="title" id="title" class="uk-input">
               </li>
               <li class="form-item">
                   <label for="url">書籍URL</label>
                   <input type="text" name="url" id="url">
               </li>
               <li>
                   書籍コメント<textarea name="detail" id="detail" cols="35" rows="15"></textarea>
               </li>
           </ul>
           <div style="text-align: center;">
           <input type="submit" value="投稿">
           </div>
       </form>
   </div>
    
</body>
</html>