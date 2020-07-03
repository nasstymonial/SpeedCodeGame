<?php
    require_once '../inc/db.php'; 
    
    session_start(); 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!isset($_SESSION['auth'])){
        $_SESSION['danger'] = "Vous devez vous connecter pour accéder à cet page"; 
        header('Location: admin_connexion.php'); 
        exit(); 
    }
    
    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $statement = $pdo->prepare("DELETE FROM commandes WHERE id = ?");
        $statement->execute(array($id));
        header("Location: admin_commandes.php"); 
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SpeedCodeGame</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1bf014a2d4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/supprimer.css">
    </head>
    
    <body>
         <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer une commande</strong></h1>
                <br>
                <form class="form" action="supprimer_commandes.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-danger">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-danger">Oui</button>
                      <a class="btn btn-default" href="admin_index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>

