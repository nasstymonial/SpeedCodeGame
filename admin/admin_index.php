<?php
    require '../pages/_header.php'; 

    if(!isset($_SESSION['auth'])){
        $_SESSION['danger'] = "Vous devez vous connecter pour accéder à cet page"; 
        header('Location: admin_connexion.php'); 
        exit(); 
    }
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - SpeedCodeGame</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1bf014a2d4.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="../css/admin_index.css">
    </head>
    
    <body>
    <h1 class="text-logo"> SpeedCodeGame</h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des produits  </strong><a href="ajouter.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Catégorie</th>
                      <th>Vedette</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require '../inc/db.php';
                        $produits = $DB->query('SELECT * FROM produits');
                        foreach($produits as $produit)
                        {
                            echo '<tr>';
                            echo '<td>'. $produit->NomProd . '</td>';
                            echo '<td>'. $produit->DescProd  . '</td>';
                            echo '<td>'. number_format($produit->Prix, 2, '.', '') . '</td>';
                            echo '<td>'. $produit->categorie . '</td>';
                            echo '<td>'. $produit->vedette . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-primary" href="modifier.php?id='.$produit->CodeProd.'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="supprimer.php?id='.$produit->CodeProd.'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>