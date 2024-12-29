<?php
    session_start();
    //verifions si l'utilisateur est connectee
    if(!isset( $_SESSION["user"])){
        //sinon on le renvoie a la page de connection
        header("Location:index.php");

    }
    $user=$_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$user?> | Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <div class="mail-btn">
            <span><?=$user?></span>
            <a href="deconnexion.php" class="deconnexion-btn">Deconnexion</a>
        </div>
        <!-- messages -->

        <div class="messages-box">
            <?php include('message.php');?>
        </div>

        
        <?php
            //envoie des messages
            if($_SERVER['REQUEST_METHOD']=='POST'){
                extract($_POST);

                $email=$user;

                include('connect.php');

                if(!empty($message)){

                    $sql = "INSERT INTO messages (email,msg,dates) 
                    VALUES ('$email','$message',NOW());";
                    
                    $result2=mysqli_query($conn,$sql);

                   

                    header('Location:chat.php');
                     

                }
            }
        ?>


         <form action="" method="POST" class="send-message">
            <textarea  id="" cols="30" rows="2" name="message" placeholder="votre message"></textarea>
            <input type="submit" value="envoye" name="send">
         </form>
    </div>
</body>
</html>