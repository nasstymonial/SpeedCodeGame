<?php
class panier{

    private $DB; 

    public function __construct($DB){
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array(); 
        }

        $this->DB = $DB; 

        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']); 
        }
        if(isset($_POST['panier']['quantite'])){
            $this->recalc(); 
        }
    }

    // Permet de recalculer le montant 
    public function recalc(){
        foreach($_SESSION['panier'] as $produit_CodeProduit => $quantite){
            if(isset($_POST['panier']['quantite'][$produit_CodeProduit])){
                $_SESSION['panier'][$produit_CodeProduit] = $_POST['panier']['quantite'][$produit_CodeProduit];
            }
        }
    }

    public function count(){
        return array_sum($_SESSION['panier']); 
    } 

    // Calcul le montant total
    public function total(){
        $total = 0; 
        $ids = array_keys($_SESSION['panier']); 

        if(empty($ids)) {
            $produits = array(); 
        } else {
            $produits = $this->DB->query('SELECT CodeProd, Prix FROM produits WHERE CodeProd IN ('.implode(',',$ids).')');
        }

        foreach($produits as $produit) {
            $total += $produit->Prix * $_SESSION['panier'][$produit->CodeProd]; 
        }

        return $total;
    }

    // Ajout d'un produit au panier
    public function add($produit_CodeProduit){
        if(isset($_SESSION['panier'][$produit_CodeProduit])){
            $_SESSION['panier'][$produit_CodeProduit]++; 
        } else {
            $_SESSION['panier'][$produit_CodeProduit] = 1;
        }
    }

    // Permet de supprimer un produit du panier
    public function del($produit_CodeProduit){
        unset($_SESSION['panier'][$produit_CodeProduit]); 
    }
}