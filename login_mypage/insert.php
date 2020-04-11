<?php
mb_internal_encoding("utf8");

try{
//DB接続
$pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","root");
}catch(PDOException $e){
die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインしてください。</p>
   <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
   );
}

//プリペアードステートメントでSQL文の型を作る
$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

//bindValueを使用し、実際に各カラムに何をinsertするかを記述
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);

//executeでクエリを実行
$stmt->execute();
$pdo = NULL;

?>