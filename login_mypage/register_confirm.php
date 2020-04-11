<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する。「image」という名前のフォルダを作成しておく必要あり。
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名をimageフォルダに元ファイル名で移動させる。
move_uploaded_file($temp_pic_name,$path_filename);

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href = "register_confirm1.css">
 </head>
    
    <body>
        
   <header>
        <img src = "4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header> 
    
    <main>
        <div class="form">
        <div class="touroku">
        <h2>会員登録　確認</h2>
            
        <h3>こちらの内容で登録してもよろしいでしょうか？</h3>
        <div class="jouhou">
            氏名：
            <?php echo $_POST['name'];?><br><br>
            メール：
            <?php echo $_POST['mail'];?><br><br>
            パスワード：
            <?php echo $_POST['password'];?><br><br>
            プロフィール写真：
            <?php echo $original_pic_name;?><br><br>
            コメント：
            <?php echo $_POST['comments'];?><br><br>
        </div>
            
        <div class="syuusei">
            <input type="submit" class="submit_button1" size="35" onclick="history.back()"value="戻って修正する">
        
            <div class="submit_button">
            <form action="register_insert.php" method="post">
                <input type="hidden" value="<?php echo $_POST['name'];?>" name="name"> 
                <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                <input type="hidden" value="<?php echo $path_filename;?>" name="filename">
                <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                <input type="submit"class="submit_button2"size="35"value="登録する">
                
                </form>
            </div>
            </div>
          </div>
        </div>  
    </main>
        <footer>
        ©️ 2018 InterNous.inc.All rights reserved
        </footer>
    </body>
</html>