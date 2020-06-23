<?php require 'header_compte.php'; 

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

<div class ="bloc-bas">   
                <div class ="informations">
                    <div class="menu-information">
                       <ul class="menu-vertical">
                           <li class="info-perso">Informations Personnelles</li>
                           <li class="li-histo">Historique de commande</li>
                       </ul> 
                    </div>

                    <div class="mail">
                        <form method ="POST" action="" class ="f-mail">
                            <h3>E-mail</h3>
                            <p><?php echo $_SESSION['auth']->email ?></p>
                            <input type="email" name="email" id="email"/>
                            <button type="submit" class = "modifier"> Modifier</button>
                        </form>
                    </div>

                    <div class="mot-de-passe">
                        <form method ="POST" action="" class ="f-mot-de-passe">
                            <h3>Mot de passe</h3>
                            <input type="password" name="mdp" id="mdp"/>
                            <button type="submit" class = "modifier">Modifier</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    
        

<?php require 'footer.php'; ?>