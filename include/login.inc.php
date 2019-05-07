<?php

if(isset($_POST['login'])){

    require 'db.inc.php';  //載入連結的褲料庫
    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if(empty($mailuid) || empty($pwd)){

        header("Location: ../index.php?error = emptyfrields");
        exit();
    }
    else{
        //查詢使用者帳戶
        $sql = "SELECT * FROM user WHERE uid=? OR email=?; ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ss" , $mailuid,$pwd);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd,$row['pwd']); //驗證是否有此密碼
                if($pwdCheck === false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }else if($pwdCheck === true){ 
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUid'] = $row['uid'];
                    header("Location: ../chatroom.php?login=success");
                    exit();

                }else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }else{
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    

}else{
    header("Location: ../index.php");
    exit();
}

?>
