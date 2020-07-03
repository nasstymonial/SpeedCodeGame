<?php

    require '../inc/db.php';

    session_start(); 
    if(!isset($_SESSION['auth'])){
        $_SESSION['danger'] = "Vous devez vous connecter pour accéder à cet page"; 
        header('Location: admin_connexion.php'); 
        exit(); 
    }
    
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $statusError = $status = "";

    if(!empty($_POST)) 
    {
        $status               = checkInput($_POST['status']); 
        $isSuccess          = true;
       
        if(empty($status)) 
        {
            $statusError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if ($isSuccess) 
        { 
            $statement = $pdo->prepare("UPDATE commandes set etat = ? WHERE id = ?");
            $statement->execute(array($status, $id));

            header("Location: admin_commandes.php");
        }
    }
    else 
    {
        $statement = $pdo->prepare("SELECT * FROM commandes where id = ?");
        $statement->execute(array($id));
        $commandes = $statement->fetch();
        $status = $commandes->etat;
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Admin - SpeedCodeGame</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="../css/modifier.css">
    </head>
    
    <body>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier l'état de la commande</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'modifier_commandes.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="status">status:
                            
                            <span class="help-inline"><?php echo $statusError;?></span>
                            
                            <select class="form-control" id="status" name="status">
                                <option selected="selected" value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                <option value="en cours de traitement">en cours de traitement</option>
                                <option value="envoyé">Envoyé</option>
                                <option value="annulé">Annulé</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="admin_index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>
