<?php

    require '../inc/db.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $descriptionError = $priceError = $featuredError = $categoryError = $name = $description = $price = $featured = $category = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $featured           = checkInput($_POST['vedette']);
        $category           = checkInput($_POST['category']); 
        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($featured) || $featured != 'oui' && $featured != 'non')
        {
            $featuredError = "Veuillez répondre par 'oui' ou par 'non'"; 
            $isSuccess = false; 
        }
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if ($isSuccess) 
        { 
            $statement = $pdo->prepare("UPDATE produits  set NomProd = ?, DescProd = ?, Prix = ?, vedette = ?,  categorie = ? WHERE CodeProd = ?");
            $statement->execute(array($name,$description,$price,$featured, $category, $id));

            header("Location: admin_index.php");
        }
    }
    else 
    {
        $statement = $pdo->prepare("SELECT * FROM produits where CodeProd = ?");
        $statement->execute(array($id));
        $produits = $statement->fetch();
        $name           = $produits->NomProd;
        $description    = $produits->DescProd;
        $price          = $produits->Prix;
        $featured       = $produits->vedette; 
        $category       = $produits->categorie;
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Admin - SpeedCodeGame</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="../css/modifier.css">
    </head>
    
    <body>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier un produit</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'modifier.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nom:
                            
                            <span class="help-inline"><?php echo $nameError;?></span>
                            
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:
                            
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                            
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                        </div>
                        <div class="form-group">
                        <label for="price">Prix: (en €)
                            
                            <span class="help-inline"><?php echo $priceError;?></span>
                            
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                        </div>
                        <div class="form-group">
					    <label>En vedette :</label> <br>
                            
                            <span class="help-inline"><?php echo $featuredError;?></span>
                            
                            <input type="text" class="form-control" id="vedette" name="vedette" placeholder="En vedette" value="<?php echo $featured;?>">
			            </div>
                        <div class="form-group">
                            <label for="category">Catégorie:
                            
                            <span class="help-inline"><?php echo $categoryError;?></span>
                            
                            <select class="form-control" id="category" name="category">
                                <option selected="selected" value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <option value="action">Action</option>
                                <option value="aventure">Aventure</option>
                                <option value="rpg">RPG</option>
                                <option value="créatif">Créatif</option>
                                <option value="sport">Sport</option>
                                <option value="fps">FPS</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="admin_index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>
