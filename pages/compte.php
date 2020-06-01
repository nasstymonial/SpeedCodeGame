<?php require 'header.php'; 

if(!isset($_SESSION['auth'])){
    $_SESSION['danger'] = "Vous devez vous connecter pour accéder à cet page"; 
    header('Location: connexion.php'); 
    exit(); 
}
?>

<h1>Mon compte</h1>

<?php require 'footer.php'; ?>