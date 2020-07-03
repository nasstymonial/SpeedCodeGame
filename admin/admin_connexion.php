<?php
if(!empty($_POST) && !empty($_POST['username'] && !empty($_POST['motdepasse']))){
    require_once '../inc/db.php'; 
    $root = 'administrateur'; 
    $req = $pdo->prepare("SELECT * FROM users WHERE username = '${root}'"); 
    $req->execute(['username' => $_POST['username']]); 
	$user = $req->fetch(); 
	
    if($user != false && password_verify($_POST['motdepasse'], $user->motdepasse)){
        session_start(); 
        $_SESSION['auth'] = $user; 
        header('Location: admin_index.php'); 
        exit(); 
    } else {
        $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte'; 
	}
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

        <link rel="stylesheet" type="text/css" href="../css/admin_connexion.css">
    </head>
    
    <body>
        <div class="container">
            <div class="mx-auto">
                <h1>Veuillez vous connecter</h1>
                <?php
                    if(isset($_SESSION['danger'])) {
                ?>
                        <div class="alerte">
                            <p>
                                <?php 
                                    echo $_SESSION['danger']; 
                                ?>
                            </p>
                <?php } ?>
                </div>
                <form method="POST" action="">
                     
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" name="username" id="username" placeholder="Nom d'utilisateur" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" name="motdepasse" id="motdepasse" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" name="login" class="btn btn-success">Se connecter</button>
                        </div>
                    </div>

                    <a href="../index.php">Retour sur le site</a>
                </form>
            </div>
        </div>
    </body>
</html>

