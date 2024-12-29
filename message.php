<?php
    //verifions si l'utilisateur est connectee
    if(isset( $_SESSION["user"])){
        //connection a la base de donnees
        include_once "connect.php";

        $sql="SELECT *FROM messages ORDER BY id  ;";

        $resultat=mysqli_query($conn,$sql);


        if(mysqli_num_rows($resultat)==0){
            echo"la messagerie est vide";
        }
        else{
            while($row=mysqli_fetch_assoc($resultat)){
                if($row['email']==$_SESSION['user']){
                    ?>
                         
                            <div class="message your-message">
                                <span>Vous</span>
                                <p><?=$row['msg']?></p>
                                <p class="dates"><?=$row['dates']?></p>
                            </div>
                
                    <?php
                }
                    else{
                        ?>                 
                            <div class="message others-message">
                                <span><?=$row['email']?></span>
                                <p><?=$row['msg']?></p>
                                <p class="dates"><?=$row['dates']?></p>
                            </div>
                   
                        <?php
                    }

                
            }
        }
    }
?>
























  
