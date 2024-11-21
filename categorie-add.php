<?php

require_once('cnx.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.7.0-web/css/all.min.css">
</head>
<body>
<nav>
        <div class="logo">
          <i class="fas fa-user-lock"></i>
        </div>
        <ul>
            <li class="off">
                <i class="fab fa-autoprefixer"></i>
                <span>admin</span>  
            </li>
            <li>
                <i class="fas fa-home"></i>
               <a href="index.html">accuiel</a>
            </li>
        </ul>
        <p></p>
        <ul>
            <li class="off">
                <i class="fab fa-cuttlefish"></i>
                <span>vote</span>
            </li>
            <li>
                <i class="fas fa-plus-circle"></i>
                <a href="categorie-add.php">ajouter mon vote</a>
            </li>
            <li>
                <i class="fas fa-edit"></i>
                <a href="categorie-update.php">modifier mon vote</a>
            </li>
            <li>
                <i class="fas fa-minus-circle" ></i>
                <a href="categorie-delete.php">a propos du site</a>
            </li>
        </ul>
    </nav>
    <main>
       
       <h1>ajouter mon vote</h1>
   <?php
   if(isset($_POST['ajouter'])){
       $sql = 'INSERT INTO categorie
                      (categorie) VALUE (:categorie)';
         $req = $cnx->prepare($sql);    

        $retour = $req->execute(array(
                         ':categorie'=>$_POST['categorie']
         ));         
         if($retour){
                 echo'<div class="success">votre vote a bien ete pris en compte</div>';
         } else{
            echo '<div class="error">votre vote a ete enregistrer</div>';
         }

   }
   ?>

       <form action="" method="post">
           <input type="text" name="categorie" placeholder="mon vote" required>
           <input type="submit" name="ajouter" value="ajouter">
       </form>
   </main>
</body>
</html>
