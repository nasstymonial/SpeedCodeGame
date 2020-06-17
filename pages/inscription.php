<?php require 'header.php'; ?>
<?php

// Gestion des erreurs de saisie
if(!empty($_POST)){
    $errors = array(); 
    require_once '../inc/db.php'; 

    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)"; 
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?'); 
        $req->execute([$_POST['username']]);
        $user = $req->fetch(); 
        if($user){
            $errors['username'] = 'Ce pseudo est déjà pris'; 
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide"; 
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?'); 
        $req->execute([$_POST['email']]);
        $user = $req->fetch(); 
        if($user){
            $errors['email'] = 'Cet email est déjà utilisé'; 
        }
    }

    if(empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse_confirm']){
        $errors['motdepasse'] = "Vous devez rentrer un mot de passe valide";
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
<h1>S'inscrire</h1>

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
<form class="form-inscription" action="" method="post">
    <div class="form-group-inscription">
        <label class ="label-group-inscription"for="">Pseudo</label>
        <input class ="input-group-inscription"type="text" name="username" required />
    </div>

    <div class="form-group-inscription">
        <label class ="label-group-inscription"for="">Email</label>
        <input class ="input-group-inscription"type="email" name="email" required />
    </div>

    <div class="form-group-inscription">
        <label class ="label-group-inscription"for="">Mot de passe</label>
        <input class ="input-group-inscription"type="password" name="motdepasse" required />
    </div>

    <div class="form-group-inscription">
        <label class ="label-group-inscription"for="">Confirmer le mot de passe</label>
        <input class ="input-group-inscription"type="password" name="motdepasse_confirm" required />
    </div>


    <button class ="submit-inscription" type="submit">M'inscrire</button>
</form>