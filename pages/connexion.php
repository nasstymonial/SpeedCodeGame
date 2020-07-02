<?php require 'header.php';
echo "<link rel='stylesheet' type='text/css' href='../css/connexion.css'>";
if(!empty($_POST) && !empty($_POST['username'] && !empty($_POST['motdepasse']))){
	require_once '../inc/db.php'; 
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :username'); 
    $req->execute(['username' => $_POST['username']]); 
    $user = $req->fetch(); 
    if(($user = $req->fetch(PDO::FETCH_OBJ)) && (password_verify($_POST['motdepasse'], $user->motdepasse)){
		session_start(); 
        $_SESSION['auth'] = $user; 
        header('Location: compte.php'); 
        exit(); 
    } else {
        $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte'; 
	}
}
?>
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
								session_destroy(); 
							?>
						</p>
			<?php } ?>
			</div>
	        <form method="POST" action="">
	 			
	            <div class="form-group row">
	                <div class="col-sm-10">
	                <input type="text" class="form-control" id="inputEmail3" name="username" id="username" placeholder="Pseudo ou email" required>
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
	        </form>
	        
	        <p>
                Pas encore inscrit ? <a class="a-connexion" href="inscription.php">Cliquez ici</a>
	        </p>
	    </div>
	</div>