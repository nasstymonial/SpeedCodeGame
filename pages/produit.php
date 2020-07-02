<?php 
    require_once 'header.php'; 
    require_once '../inc/db.php'; 

    echo "<link rel='stylesheet' type='text/css' href='../css/produit.css'>";
    if(isset($_GET['CodeProd']))  {
        $produits = $pdo->prepare('SELECT * FROM produits WHERE CodeProd = ?');
        $produits->execute(array($_GET['CodeProd']));
    }
    foreach ($produits as $produit): 
?>

<h1>Acheter <?= $produit->NomProd; ?></h1>

<section class="section_principale">


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="../images/carousel1/<?= $produit->CodeProd; ?>.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="../images/produits/<?= $produit->CodeProd; ?>.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="../images/carousel2/<?= $produit->CodeProd; ?>.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="../images/carousel3/<?= $produit->CodeProd; ?>.jpg" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="conteneurpanier">

        <div class="imagepanier">
            <img src="../images/produits/<?= $produit->CodeProd; ?>.jpg" alt="image age of empire 2" />
        </div>
        
        <h2><?= $produit->NomProd; ?></h2>

        <div class="acheter">
            <button class="btn_achat">Acheter <?= $produit->Prix;?> €</button>
        </div>
    
        <div class="vendeur">
            <span>Vendu par SpeedCodeGame</span>
        </div>

        <div class="conteneurOffres">
            <span>Profitez de -30% de promo : <?php $pourcentage = 30; echo $produit->Prix - ($produit->Prix * ($pourcentage/100));?> €</span>
        </div>

        <div class="logo-general">
            <div class="logo">
                <img src="../images/logos/steam.png">
            </div>

            <div class="logo">
                <img src="../images/logos/logo1.png">
            </div>

            <div class="logo">
                <img src="../images/logos/logo2.png">
            </div>
        </div>

    </div> 


</section>

    <div class="details">
        
        <div class="description">
            <h3>Description :</h3>
            <p>
                <?php
                    echo $produit->DescProd; 
                ?>
            </p>
        </div>
        
        <div class="configuration">
            <h3>Configuration :</h3>
            <p>
                Requires a 64-bit processor and operating system
                OS: 64-bit Windows 7 / 64-Bit Windows 10
                Processor: Intel Core i5 @ 3.3 GHz or better, or AMD Ryzen 3 @ 3.1 GHz or better
                Memory: 8 GB RAM
                Graphics: NVIDIA GeForce GTX 1050Ti (4GB), GTX 1060 (3GB), GTX 1650 (4GB) or AMD Radeon R9 280(3GB), AMD Radeon R9 290 (4GB), RX 470 (4GB)
                Network: Broadband Internet connection
                Storage: 50 GB available space
            </p>
        </div>
        
        <div class="activation">
            <h3>Activation :</h3>
            <p>
                Installez le jeu <?= $produit->NomProd; ?> et démarrez le.
                A ce moment là, le jeu vous demandera de rentrer votre clé produit.
                Il vous suffira de l'écrire et vous pourrez ainsi accéder au contenu.
            </p>
        </div>
        
    </div>

<?php

    endforeach;

    require 'footer.php';
?>

