<?php
    session_start(); //啟動session
    
    if(isset($_POST['send'])){
        require 'db.inc.php';

        $uid = $_SESSION['userUid'];
        $msg = $_POST['msg'];
       

        $sql="INSERT INTO messages(uid,msg) VALUES('$uid','$msg')";
        $result = $conn->query($sql);
    }
    header("Location: ../chatroom.php");

?>