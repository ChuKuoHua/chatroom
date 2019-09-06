<?php
    session_start(); //啟動session
    require 'include/db.inc.php';  
    header("Content-Type:text/html; charset=utf-8");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="chat.css">
    <title>chatroom</title>
</head>
<body>

<div class="container col-md-4 border border-secondary" id="main">
    <div class=" form-group nav justify-content-center alert alert-primary text-center" role="alert">
    <?php 
    if(isset($_SESSION['userUid'])){
        echo $_SESSION['userUid'];
    } ?> - Welcome Chat
    </div>
    <div id="output">
        <?php
        $sql = "SELECT * FROM messages";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "".$row["uid"]." ".": ".$row["msg"]." 　-- ".$row["date"]."<br>";
                
                }
            }else {
                echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div  id="lgot">        
            <form action="include/send.inc.php" method="post">
                <textarea name="msg" class="form-control border border-dark float-left col-md-10" cols="10" rows="2" placeholder="輸入文字.."></textarea>
                <button type="submit" class="col-md-2 float-right " name="send"> <i class="far fa-paper-plane"></i> </button>                    
            </form>
    </div>    
    <div >
        <form action="include/logout.inc.php" method="post">
        <button  class="btn btn-outline-danger col-12"  type="submit" name="logout">Logout</button>        
        </form>
    </div>    
</div>
</body>
</html>
