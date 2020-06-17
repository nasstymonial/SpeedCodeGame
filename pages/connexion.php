<?php require 'header.php';

if(!empty($_POST) && !empty($_POST['username'] && !empty($_POST['motdepasse']))){
    require_once '../inc/db.php'; 
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :username'); 
    $req->execute(['username' => $_POST['username']]); 
    $user = $req->fetch(); 
    if(password_verify($_POST['motdepasse'], $user->motdepasse)){
        $_SESSION['auth'] = $user; 
        header('Location: compte.php'); 
        exit(); 
    } else {
        $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte'; 
    }
}
?>

<h1>Se connecter</h1>

<div class="formulaire_connexion">
    <form class="form-connexion"action="" method="post">
        <div class="form-group">
            <label class="label-connexion" for="">Pseudo ou email </label>
            <input class="input-connexion" type="text" name="username" required />
        </div>

        <div class="form-group">
            <label class="label-connexion" for="">Mot de passe</label>
            <input class="input-connexion" type="password" name="motdepasse" required />
        </div>

        <button class="submit-connexion" type="submit">Se connecter</button>
    </form>
</div>

<a class="a-connexion" href="inscription.php">Pas encore inscrit ? Cliquez ici</a>