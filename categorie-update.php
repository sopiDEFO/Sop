<?php

require_once('cnx.php');
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
       
        <h1>modifier mon vote</h1>
        <?php
        if(isset($_POST['update'])){

         $sql = 'SELECT categorie FROM categorie
                    WHERE catID = :catID';
          $req = $cnx->prepare($sql)  ;        
          $req->execute(array(':catID'=>$_POST['cat']));

          $data = $req->fetch(PDO::FETCH_ASSOC)
        
        ?>
        <form action="" method="post">
            <p><a href="">&lt; &lt; retour </a></p>
            <input type="text" name="categorie" value="<?= $data['categorie'];?>" required>
            <input type="submit" value="modifier">
        </form>
        <?php
        }else{
        ?>
        <form action="" method="post">

      
        <select name="cat">
    <?php
    $sql = 'SELECT * FROM categorie
               ORDER BY categorie';
     $req = $cnx->prepare($sql);
     $req->execute();
     
     while($datas = $req->fetch(PDO::FETCH_ASSOC)){
         echo'<option value="'.$datas['catID'].'">'.$datas['categorie'].'<option>';
     }
       
     
    ?>       
        </select>
        <input type="submit" name="update" value="modifier">
        </form>
        <?php
        } 
        ?>
    </main>
</body>
</html>