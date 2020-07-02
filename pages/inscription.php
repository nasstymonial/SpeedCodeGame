<?php require 'header.php'; 
echo "<link rel='stylesheet' type='text/css' href='../css/inscription.css'>"; ?>
<?php

// Gestion des erreurs de saisie
if(!empty($_POST)){
    $errors = array(); 
    require_once '../inc/db.php'; 

    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "* Votre pseudo n'est pas valide (alphanumérique)"; 
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?'); 
        $req->execute([$_POST['username']]);
        $user = $req->fetch(); 
        if($user){
            $errors['username'] = '* Ce pseudo est déjà pris'; 
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "* Votre email n'est pas valide"; 
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?'); 
        $req->execute([$_POST['email']]);
        $user = $req->fetch(); 
        if($user){
            $errors['email'] = 'Cet email est déjà utilisé'; 
        }
    }

    if(empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse_confirm']){
        $errors['motdepasse'] = "* Vous devez rentrer un mot de passe valide";
    }

    if(empty($errors)){
        // inscription de l'utilisateur avec les requêtes preparé
        $req = $pdo->prepare("INSERT INTO users SET username = ?, motdepasse = ?, email = ?");
        $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT); 
        $req->execute([$_POST['username'], $motdepasse, $_POST['email']]);
        die('Votre compte a bien été crée');   
    }

    //debug($errors); 
}

?>
	<div class="container">
	    <div class="mx-auto">
            <h1>Créer un compte</h1>
            <?php if(!empty($errors)): ?>
                <div class="alerte">
                    <p>Vous n'avez pas rempli le formulaire correctement</p>
                    <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
	        <form method="POST" action="">	 		
	            <div class="form-group row">
	                <div class="col-sm-10">
	                <input type="text" name="username"  class="form-control" placeholder="Votre nom d'utilisateur" required>
	                </div>
                </div>
                <div class="form-group row">
	                <div class="col-sm-10">
	                <input type="email"  class="form-control" name="email" placeholder="Votre adresse éléctronique" required>
	                </div>
	            </div>
	            <div class="form-group row">
	                <div class="col-sm-10">
	                <input type="password"  class="form-control" name="motdepasse" placeholder="Entrez un mot de passe" required>
	                </div>
	            </div>
	            <div class="form-group row">
	                <div class="col-sm-10">
	                <input type="password" class="form-control" name="motdepasse_confirm" placeholder="Confirmez votre mot de passe" required>
	                </div>
	            </div>
	            <div class="form-group row">
	                <div class="col-sm-10">
	                <button type="submit" class="btn btn-success">S'inscrire</button>
	                </div>
	            </div>
	        </form>
	    </div>
	</div>
