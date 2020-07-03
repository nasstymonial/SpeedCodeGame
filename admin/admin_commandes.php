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
    <nav class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="admin_index.php">Gérer les produits</a>
        <a class="nav-item nav-link active" href="admin_commandes.php">Gérer les commandes</a>
        <a class="nav-item nav-link" href="admin_deconnexion.php">Se déconnecter</a>
    </nav>
    <h1 class="text-logo"> SpeedCodeGame</h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des commandes</strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>date</th>
                      <th>total</th>
                      <th>id_user</th>
                      <th>Etat</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require '../inc/db.php';
                        $commandes = $DB->query('SELECT * FROM commandes');
                        foreach($commandes as $commande)
                        {
                            echo '<tr>';
                            echo '<td>'. $commande->date_commande . '</td>';
                            echo '<td>'. number_format($commande->total, 2, '.', '') . '</td>';
                            echo '<td>'. $commande->id_user  . '</td>';
                            echo '<td>'. $commande->etat  . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-primary" href="modifier_commandes.php?id='.$commande->id.'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="supprimer_commandes.php?id='.$commande->id.'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
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