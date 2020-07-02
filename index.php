<?php
    require 'pages/header_index.php';
?>
<div id = "corps-de-page" class = "corps-de-page"> 

    <!-- REQUETE SQL -->

    <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd=5'); ?>

    <?php foreach ($produits as $produit): ?>
        <div class ="card w-100 bg-dark text-white vedette">
            <span><a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" width="100%"></a></span>
            <div class="card-img-overlay">
                <h5 class="card-title"><a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><?= $produit->NomProd; ?></a></h5>
                <span><?= number_format($produit->Prix,2,',',' '); ?>€</span> <br>

                <br>

                <a href="pages/addpanier.php?CodeProd=<?= $produit->CodeProd; ?>" class="btn btn-success" id="addPanier">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0v-2z"/>
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    Commander maintenant
                </a>

            </div>
        </div>
    <?php endforeach; ?>

    <!-- REQUETE SQL -->
    <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd BETWEEN 1 AND 10'); ?>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a href="#" id="actif" class="nav-link active">En Vedette</a>
                </li>
                <li class="nav-item">
                    <a href="pages/action.php" class="nav-link">Action</a>
                </li>
                <li class="nav-item">
                    <a href="pages/aventure.php" class="nav-link">Aventure</a>
                </li>
                <li class="nav-item">
                    <a href="pages/course.php" class="nav-link">Course</a>
                </li>
                <li class="nav-item">
                    <a href="pages/fps.php" class="nav-link">FPS</a>
                </li>
                <li class="nav-item">
                    <a href="pages/creatif.php" class="nav-link">Créatif</a>
                </li>
                <li class="nav-item">
                    <a href="pages/rpg.php" class="nav-link">RPG</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mt-5 ml-5 mr-3 row-cols-1 row-cols-md-5">
                <?php foreach ($produits as $produit): ?>
                    <div class="col mb-5 rounded">
                        <div class ="card produit" style="width: 18rem;">
                            <span><a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" width="100%"></a></span>
        
                            <div class="card-body">
                                <span>-30%</span>
                                <h5 class="card-title"><a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><?= $produit->NomProd; ?></a></h5>
                                <span style="text-decoration: line-through;"><?= number_format($produit->Prix,2,',',' '); ?>€</span> <br>
                                <span class="text-deco"><?php $pourcentage = 30; echo $produit->Prix - ($produit->Prix * ($pourcentage/100));?> €</span>
                                <br>
        
                                <a href="pages/addpanier.php?CodeProd=<?= $produit->CodeProd; ?>" class="btn btn-success" id="addPanier">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0v-2z"/>
                                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    Ajouter au panier
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <h2 class="title-precommandes">Précommandes</h2>
    <?php foreach ($produits as $produit): ?>
        <div class="precommandes card mb-3 rounded" style="max-width: 50%;">

            <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd BETWEEN 1 AND 20'); ?>

            <div class="row no-gutters">
                <div class="col-md-4">
                    <span><a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" class="card-img"></a></span>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="pages/produit.php?CodeProd=<?=$produit->CodeProd;?>"><h3 class="card-title"><?= $produit->NomProd; ?></h3></a>
                        <span class="card-text"><?= number_format($produit->Prix,2,',',' '); ?>€</span> <br>
                        <a href="pages/addpanier.php?CodeProd=<?= $produit->CodeProd; ?>" class="btn btn-success" id="addPanier">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require 'pages/footer_index.php'; ?>