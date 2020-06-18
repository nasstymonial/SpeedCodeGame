<?php require 'header.php'; ?>

<div class="checkout">
    <div class="title">
        <div class="wrap">
            <h2 class="titre_panier">Panier</h2>
            <a href="#" class="proceed">
                Proceder au paiement
            </a>
        </div>
    </div>

    <form method="post" action="panier.php">
        <div class="table">
            <div class="wrap">

                <div class="rowtitle">
                    <span class="name">Nom du jeu</span>
                    <span class="prix">Prix</span>
                    <span class="quantite">Quantité</span>
                    <span class="action">Actions</span>
                </div>

                <!-- DYNAMISE DES AJOUTS DE PRODUITS DANS LE PANIER -->
                <?php
                    // Permet de récupérer les clé du tableau
                    $ids = array_keys($_SESSION['panier']); 
                    
                    if(empty($ids)) {
                        $produits = array();
                    } else {
                        $produits = $DB->query('SELECT * FROM produits WHERE CodeProd IN ('.implode(',',$ids).')');
                    }
                    
                    // Commencement de la boucle à chaque ajout de produits dans notre panier
                    foreach($produits as $produit):
                    ?>
                    <div class="row">
                        <a href="produit.php?CodeProd=<?=$produit->CodeProd;?>" class="img_produit_panier"><img src="../images/produits/$produit->CodeProd; ?>.png" width="40%"></a>
                        <span class="name"><?= $produit->NomProd; ?></span>
                        <span class="prix"><?= $produit->Prix; ?></span>
                        <span class="quantite"><input type="text" name="panier[quantite][<?= $produit->CodeProd; ?>]" value="<?= $_SESSION['panier'][$produit->CodeProd]; ?> " ></span>
                        <span class="action">
                            <a href="panier.php?delPanier=<?= $produit->CodeProd; ?>" class="del">Supprimer</a>
                        </span>
                    </div>
                <?php endforeach; ?>

                <input type="submit" value="Recalculer">

                <div class="rowtotal">
                        Total à payer : <span class="total"><?= $panier->total(); ?>€</span>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require 'footer.php'; ?>