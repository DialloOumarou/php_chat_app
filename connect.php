<?php
    //connexion a la base de donnees
    $conn=mysqli_connect("localhost","root","","chat_db");
    //gerer les accents et autres caracteres en frncais
    $req=mysqli_query($conn,"SET NAMES UTF8");

    if(!$conn){
        echo"connexion echoue";
    }
?>