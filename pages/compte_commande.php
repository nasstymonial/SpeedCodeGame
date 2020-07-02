<?php require 'header.php'; 

echo "<link rel='stylesheet' type='text/css' href='../css/compte_commande.css'>";

if(!isset($_SESSION['auth'])){
    $_SESSION['danger'] = "Vous devez vous connecter pour accéder à cet page"; 
    header('Location: connexion.php'); 
    exit(); 
}

//si la variable post est rempli, ça veut dire qu'il a renvoyé soit le mdp soit l'email
if(!empty($_POST)){

    require_once '../inc/db.php'; 

    if(!empty($_POST['email'])){
        
        $user_id = $_SESSION['auth']->id;
        $req = $pdo->prepare('UPDATE users SET email = ? WHERE id = ? ');
        $req->execute(array($_POST['email'], $user_id));

        $req = $pdo->prepare('SELECT * FROM users WHERE email = ?'); 
        $req->execute(array($_POST['email'])); 
        $user = $req->fetch(); 
        unset($_SESSION['auth']);
        $_SESSION['auth'] = $user; 
    }

    if(!empty($_POST['mdp'])){

        $user_id = $_SESSION['auth']->id;
        $mdp_hash = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        $req = $pdo->prepare('UPDATE users SET motdepasse = ? WHERE id = ? ');
        $req->execute(array($mdp_hash, $user_id));

    }

}

?>

<h1>Mon compte</h1>

<div class ="conteneur_all"> 

    <div class="menu-information">
        <h3>Menu</h3>
        <hr />
        <ul class="menu-vertical">
            <li class="info-perso"><a href="compte.php" >Informations Personnelles</a></li>
            <li class="li-histo"><a href="compte_commande.php">Historique de commande</a></li>
        </ul> 
    </div>

    <div class="contenu-menu">
        <h3>Informations Personnelles</h3>
        <hr />
        <div class="mail">
            <form method ="POST" action="" class ="f-mail">
                <h4>E-mail</h4>
                <p><?php echo $_SESSION['auth']->email ?></p>
                <input type="email" name="email" id="email"/>
                <button type="submit" class="bouton_modif"> Modifier</button>
            </form>
        </div>

        <div class="mot-de-passe">
            <form method ="POST" action="" class ="f-mot-de-passe">
                <h4>Mot de passe</h4>
                <input type="password" name="mdp" id="mdp"/>
                <button type="submit" class="bouton_modif">Modifier</button>
            </form>
        </div>
    </div>

</div>

    
        

<?php require 'footer.php'; ?>