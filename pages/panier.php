<?php require 'header.php'; 
echo "<link rel='stylesheet' type='text/css' href='../css/panier.css'>";
require_once '../inc/db.php'; 

// inscription de l'utilisateur avec les requêtes preparé
if (!empty($_POST)){
    $req=$pdo->prepare('INSERT INTO commandes(date_commande, total, id_user)
        VALUES (now(), :total, :id_user)');
    $arr = array(
        'total' => $panier->total(),
        'id_user' => $_SESSION['auth']->id
    );
    $req->execute($arr);
    header('location: success.php');   
}

?>

<div class="container">
	<form method="post" action="panier.php">
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
			<table class="produits" style="table-layout: fixed;width: 100%;">
				<tr>
					<th class="name" colspan="4"><h2><?= $produit->NomProd; ?></h2></th>
				</tr>
				<tr>
					<td style="width: 25%;"><a href="produit.php?CodeProd=<?=$produit->CodeProd;?>" class="img_produit_panier"><img src="../images/produits/<?= $produit->CodeProd; ?>.jpg" width="50%" ></a></td>
					<td class="prix "style="width: 25%;"><?= $produit->Prix; ?> €</td>
					<td class="action" style="width: 25%;"><a href="panier.php?delPanier=<?= $produit->CodeProd; ?>"><span class="del btn btn-danger">Supprimer</span></a></td>
				</tr>
			</table>
        <?php endforeach; ?>

		<h4 style="margin-top: 40px;margin-bottom: 40px;">Total à payer : <span class="total"><?= $panier->total(); ?>€</span></h4>

        <input type="hidden" name="id_user" value="<?= $_SESSION['auth']->id; ?>">


        <input type="submit" value="Procéder au paiement" class="btn btn-success" style="width:100%;padding:8px;font-size:16px;"><br>	

	</form>

    <a href="../index.php"><input type="button" value="Continuer à faire des achats" class="btn btn-warning" style="width:100%;padding:8px;font-size:16px;"></a>
	
	
</div>

<?php require 'footer.php'; ?>