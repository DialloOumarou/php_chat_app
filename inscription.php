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

         

            //verifions si les champs ne sont pas vides
            if(!empty($email) && !empty($password1) && !empty($password2)){
                
               

                if($password1===$password2){
                        
                    $sql1="SELECT *FROM utilisateurs
                    WHERE email='$email';";

                    $result1=mysqli_query($conn,$sql1);

                  
                    
                    if(mysqli_num_rows($result1)>0){
                        $error="cet email est deja pris !!!";
                        
                    }
                    else{

                        $sql2 = "INSERT INTO utilisateurs (email,pwd) 
                        VALUES ('$email', '$password1');";

                      
                        
                        $result2=mysqli_query($conn,$sql2);


                         
                        $_SESSION['message']="<p class='message_inscription'>votre compte a ete cree avec succes!!!</p>";
                        //redirection vers la page de connection
                        header("Location:index.php");
                    }
                
                }
                else{
                    $error="Les Mots de pass ne  sont pas conformes";
                }
            
            }
            else{ 
                $error="veuillez remplir tous les champps!!!";
            }
        }
    ?>
    <form action="" method="POST" class="form-connexion-inscription">
        <h1>INSCRIPTION</h1>

        <?php
            if(isset($error)){
                echo "<p class='error-msg'>{$error}</p>";
            }
        ?>

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" >

        <label for="password">Mot de passe:</label>
        <input type="password" id="password1" name="password1" class="password1" >

        <label for="password">Confirmation du Mot de passe:</label>
        <input type="password" id="password2" name="password2" class="password2">

        <input type="submit" value="Inscription" name="inscription_btn">

        <p class="link">Avez vous un compte ? <a href="index.php">Se connecter</a></p>
    </form>

    <script src="script.js"></script>
</body>
</html>