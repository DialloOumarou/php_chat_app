<?php
    session_start();
    //verifions si l'utilisateur est connectee
    if(!isset( $_SESSION["user"])){
        //sinon on le renvoie a la page de connection
        header("Location:index.php");

    }
   //destruction de la session
   session_destroy();
   //redirection vers la page de connection
   header("Location:index.php");

?>