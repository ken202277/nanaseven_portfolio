<?php
session_start();
require('../dbconnect.php'); 

if(!isset($_SESSION['join'])) {
  header('Location: index.php');
    exit();
}

header('Location: thanks.php');
    exit();

if(!empty($_POST)){  
    $statement=$db->prepare('INSERT INTO members SET name=?,email=?,password=?, picture=?, created=NOW()');
    echo $ret=$statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        sha1($_SESSION['join']['password']),
        $_SESSION['join']['image']
    ));
    unset($_SESSION['join']); 

    
    
}
?>


<form action=""method="post">
    <input type="hidden" name="action" value="submit"/>
    <dl>
        <dt>ニックネーム</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES);?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
        <?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES);?>
        </dd>
        <dt>パスワード</dt>
        <dd>
          表示されません
       </dd>
       <dt>写真など</dt>
       <dd>
        <img src="../member_picture/<?php echo htmlspecialchars($_SESSION['join']['image'],ENT_QUOTES);?>" width="100" alt="" />
      </dd>
</dt>
<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>|<input type="submit" value="登録する" /></div>
</form>