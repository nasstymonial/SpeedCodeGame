<?php 
    require_once 'header.php'; 
    require_once '../inc/db.php'; 
    if(isset($_GET['CodeProd']))  {
        $produits = $pdo->prepare('SELECT * FROM produits WHERE CodeProd = ?');
        $produits->execute(array($_GET['CodeProd']));
    }
    foreach ($produits as $produit): 
?>
<section class="background">
    
    <div class="backgroundTransition"></div>
    <h1>Acheter <?= $produit->NomProd; ?></h1>
            <div class="image-principale">
                <img src="../images/produits/<?= $produit->CodeProd; ?>.jpg" />
            </div>

            <div class="conteneur-prix">

                <div class="opaque">

                    <div class="logo-general">
                        <div class="logo">
                            <img src="../images/logos/logo_marque.png">
                        </div>

                        <div class="logo">
                            <img src="../images/logos/logo1.png">
                        </div>

                        <div class="logo">
                            <img src="../images/logos/logo2.png">
                        </div>

                    </div>
                    
                    <div class="acheter">
                        <span>Acheter <?= $produit->Prix;?> €</span>
                    </div>
                
                <div class="vendeur">
                    <span>Vendu par SpeedCodeGame</span>
                </div>

                <div class="conteneurOffres">
                    <span>Profitez de -30% de promo : <?php $pourcentage = 30; echo $produit->Prix - ($produit->Prix * ($pourcentage/100));?> €</span>
                </div>

              </div>
            </div> 
        
        <div class="conteneur-image">
            <!-- The expanding image container -->
            
            <div class="container">
                <!-- Close the image -->
                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                
                <!-- Expanded image -->
                <img id="expandedImg" style="width:100%">
                
                <!-- Image text -->
                <div id="imgtext"></div>
            </div>
            <div class="row">
                <div class="column">
                    <img src="../images/carousel1/<?= $produit->CodeProd; ?>.jpg"  alt="Nature" onclick="myFunction(this);">
                </div>

                <div class="column">
                    <img src="../images/carousel2/<?= $produit->CodeProd; ?>.jpg"  onclick="myFunction(this);">
                </div>

                <div class="column">
                    <img src="../images/carousel3/<?= $produit->CodeProd; ?>.jpg"  alt="Mountains" onclick="myFunction(this);">
                </div>

                <div class="column">
                    <img src="../images/carousel4/<?= $produit->CodeProd; ?>.jpg"  alt="Lights" onclick="myFunction(this);">
                </div>   
            </div>
        </div>
</section>

    <div class="details">
        
        <ul>
            <li><a href="Description">Description</a></li>
            <li><a href="Configuration requise">Configuration</a></li>
            <li><a href="Détails relatifs à l'activation">Détails relatifs à l'activation</a></li>
        </ul> 
            
            <div class="description">
                <p>
                    <?php
                     echo $produit->DescProd; 
                    ?>
                </p>
            </div>
            
            <div class="configuration">
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
                <p>
                    Go to Bethesda website and download Bethesda Launcher
                    Install and start the application, login with your Account name and Password (create one if you don't have)
                    Click on the top left corner of the Launcher and then on "Redeem Code"
                    Enter your code and click "Redeem"
                </p>
            </div>
        </div>
    </div>

        <div class="evaluation">
         <p> <span class="evaluationProduit"> Évaluation du produit 4.9(8 Nombre de votes) </span> <span class="ajouterCommentaire"> Ajouter un commentaire : </span> </p>
         
         <div class="commentaire1">
             <p>Awesome!!!!!!!!Fast delivery, nd the game is awesomeee!!!!!.NET <span class="note1"></span></p>
            </div>
            
            <div class="commentaire2">
                <p>Fantastico veloci come sempre il gioco è meraviglioso anche se mette un po in crisi la mia scheda video grazie mille :-)<span class="note2"></span></p>
            </div>
            
            <div class="commentaire3">
                <p>10/10 :) vous pouvez l'acheter les yeux fermés si vous etes fan de fps et de baston<span class="note3"></span></p>
            </div>
            
            <div class="commentaire4">
                <p>Works great and fast, no complaints <span class="prix1"></span></p>
            </div>
        </div>
<?php

    endforeach;

    require 'footer.php';
?>

