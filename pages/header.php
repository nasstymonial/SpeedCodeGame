<?php
require '_header.php';
if(session_status() == PHP_SESSION_NONE){
    session_start(); 
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedCodeGame - la référence du jeux vidéo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1bf014a2d4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js%22%3E"></script> 

    <link rel="stylesheet" type="text/css" href="../css/test.css">
</head>
<body>
    <header>
        <!-- NAVBAR-->
        <div class="site-header sticky-top">
            <nav class="navbar fixed-top navbar-expand-lg" id="startchange">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <a class="navbar-brand" href="../index.php" ><img src="../images/logos/logo_marque_rogner.png" alt="Logo du site"  width="20%"/></a>   
                    
                </div>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <?php if(isset($_SESSION['auth'])) : ?>
                            <a class="nav-link my-2 my-sm-0 mr-2" href="deconnexion.php" >Se déconnecter</a>
                        <?php else: ?>
                            <a class="nav-link my-2 my-sm-0 mr-2" href="connexion.php">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                </svg>
                            </a>
                    </li>
                    <li class="nav-item">
                        <?php endif; ?>
                        <a class=" nav-link my-2 my-sm-0 mr-2" href = "panier.php"> 
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                            (<?= $panier->count(); ?>)
                        </a>
                    </li>      
                </ul>           
            </nav>
        </div>
    </header>