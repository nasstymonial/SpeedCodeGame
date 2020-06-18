<?php require '_header.php'; 
$json = array('error' => true); 

if(isset($_GET['CodeProd'])){
    $produit = $DB->query('SELECT CodeProd FROM produits WHERE CodeProd=:CodeProd', array('CodeProd' => $_GET['CodeProd']));

    if(empty($produit)){
        $json['message'] = "Ce produit n'existe pas"; 
    }

    // ajout dans le panier
    $panier->add($produit[0]->CodeProd); 
    $json['error'] = false; 
    $json['total'] = number_format($panier->total(),2,',',' '); 
    $json['count'] = $panier->count(); 
    $json['message'] = 'Le produit a bien été ajouté à votre panier'; 
} else {
    $json['message'] = "Vous n'avez pas séléctionné de produit à ajouter au panier"; 
}
echo json_encode($json); 