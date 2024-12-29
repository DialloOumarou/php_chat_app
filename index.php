<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection | chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //seconnecter a la base de donnees
            include_once("connect.php");
            //extraire les infos du formmulaire
            extract($_POST);

            $error=null;
            //verifions si les champs ne sont pas vides
            if(!empty($email) && !empty($password1)){

                $sql="SELECT *FROM utilisateurs
                WHERE email='$email' AND pwd='$password1';";

                $result=mysqli_query($conn,$sql);
                
               
                if(mysqli_num_rows($result)>0){
                    //creation d'une session qui contient l'email
                    $_SESSION["user"]=$email;
                    //redirection vers la page chat
                    header("Location:chat.php");

                    //destrustion de la variable de session message
                    unset($_SESSION['message']);
                    
                }
                else{
                    $error="incorrect email or password!!";
                }
            }
            else{
              
                $error="veuillez remplir tous les champps!!!";

              

            }
        }
    ?>

    
    <form action="" method="post" class="form-connexion-inscription">
        <h1>CONNEXION</h1>
         
           <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }

                if(isset($error)){
                 echo "<p class='error-msg'>{$error}</p>";
                }
           ?>
      

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" >

        <label for="password">Mot de passe:</label>
        <input type="password" id="password1" name="password1" >

        <input type="submit" value="Connexion" name="conn_btn">

        <p class="link">Vous n'avez pas de compte ? <a href="inscription.php">Cree un compte</a></p>
    </form>

</body>
</html>