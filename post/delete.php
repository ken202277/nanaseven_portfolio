<?php
session_start();
require('dbconnect.php');

if(isset($_SESSION['id'])){ //2
    $id=$_REQUEST['id'];

 $message=$db->prepare('SELECT*FROM posts WHERE id=?');  //3
 $message->execute(array($id));
 $message=$message->fetch();    //教科書のsいらない
 

 if($message['member_id'] == $_SESSION['id']){  //4

    $del=$db->prepare('DELETE FROM posts WHERE id=?');  //5
    $del->execute(array($id));
 }
}

header('Location: index.php'); exit();
?>