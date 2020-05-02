<?php
    require 'pages/header.php';
?>
<div id = "corps-de-page" class = "corps-de-page"> 
    <div class = "formulaire-recherche">
        <form method ="POST" action ="#">
            <div class ="recherche">
                <p>
                    <select name = "plateforme" id ="plateforme">
                        <option>TOUS</option>
                        <option>Steam</option>
                        <option>Origin</option>
                        <option>Xbox360</option>
                        <option>Play Station 4</option>
                        <option>Uplay</option>
                        <option>battle.net</option>
                    </select>
                </p>
            </div>
            <div class = "recherche" id = "champ">
                <input type = "search" id = "Recherche" name ="Recherche"  maxlength = "50" />
            </div>
            <button class = "recherche">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class = "produit">
        <div class = "banniere">
            <span> En Vedette </span>
                <!-- IMAGE EN BACKGROUNG SUR CSS -->    
        </div>
        <div class = "meilleures-ventes">
            <!-- REQUETE SQL -->
            <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd=6'); ?>
            <?php foreach ($produits as $produit): ?>
                <div class ="prod-MV-banniere" data-index ="0">
                <div class = "image">
                    <span><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" width="100%"></span>
                    <div class = "promotion">
                        <span>-30%</span>
                    </div>
                </div>
                <div class = "info-jeu">
                    <span><a href = "#"><?= $produit->NomProd; ?></a></span>
                    <div class = "logo-info-jeu">
                        <div class = "logo-steam">
                            <i class="fab fa-steam"></i>
                        </div>
                        <div class ="logo-conn-internet">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
                <div class = "prix-prod">
                    <span style="text-decoration: line-through;"><?= number_format($produit->Prix,2,',',' '); ?>€</span> <br>
                    <span><?php $pourcentage = 30; echo $produit->Prix - ($produit->Prix * ($pourcentage/100));?> €</span>
                </div>
            <?php endforeach; ?>
        </div> 
        <!-- REQUETE SQL -->
        <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd BETWEEN 1 AND 10'); ?>
        <?php foreach ($produits as $produit): ?>
            <div class =" prod-MV" data-index ="0">
                <div class = "image">
                    <!-- IMAGE AVEC APPELLE DE LA BDD -->
                    <span><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" width="100%"></span>
                    <div class = "promotion">
                        <span>-30%</span>
                    </div>
                </div>
                <div class = "info-jeu">
                    <span><a href = "#"><?= $produit->NomProd; ?></a></span>
                    <div class = "logo-info-jeu">
                        <div class = "logo-steam">
                            <i class="fab fa-steam"></i>
                        </div>
                        <div class ="logo-conn-internet">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
                <div class = "prix-prod">
                    <span style="text-decoration: line-through;"><?= number_format($produit->Prix,2,',',' '); ?>€</span> <br>
                    <span><?php $pourcentage = 30; echo $produit->Prix - ($produit->Prix * ($pourcentage/100));?> €</span>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <div class = "precommandes">
            <span>PRECOMMANDES</span>
            <!-- REQUETE SQL -->
            <?php $produits = $DB->query('SELECT * FROM produits WHERE CodeProd BETWEEN 1 AND 20'); ?>
            <?php foreach ($produits as $produit): ?>
                <div class = "jeu-preco">
                    <div>
                        <div class = "date-sortie">
                            <span>date</span>
                        </div>
                    </div>
                    <div class = "image-jeu-preco">
                        <!-- IMAGE AVEC APPELLE DE LA BDD -->
                        <span><img src="images/produits/<?= $produit->CodeProd; ?>.jpg" alt="un jeux" width="100%"></span>
                    </div>
                    <div class ="info-jeu-preco">
                        <h3><?= $produit->NomProd; ?></h3>
                        <div class = "logo-steam-preco">
                            <i class="fab fa-steam"></i>
                        </div>
                        <div class = "logo-monde-preco">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class = " prix-jeu-preco">
                            <span><?= number_format($produit->Prix,2,',',' '); ?>€</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require 'pages/footer.php'; ?>