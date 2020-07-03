<?php

session_start();

unset($_SESSION['auth']); 
$_SESSION['flash']['succes'] = 'Vous êtes maintenant déconnecté'; 
header('Location: admin_connexion.php'); 

