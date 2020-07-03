<?php
     
     require_once '../inc/db.php';
 
    $nameError = $descriptionError = $priceError = $categoryError = $name = $description = $price = $category = "";

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
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if($isSuccess) 
        {
            $statement = $pdo->prepare("INSERT INTO produits (NomProd, DescProd, Prix, vedette, categorie) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$featured, $category));
            header("Location: admin_index.php");
        }
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
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo">SpeedCodeGame</h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un produit</strong></h1>
                <br>
                <form class="form" action="ajouter.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                        <span class="help-inline"><?php echo $descriptionError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                        <span class="help-inline"><?php echo $priceError;?></span>
                    </div>
                    <div class="form-group">
					    <label>En vedette :</label> <br>
						<input class="form-check-input" type="radio" name="vedette" id="vedette" value="oui" required>
						<label class="form-check-label" for="inlineRadio1">Oui</label>
						<input class="form-check-input" type="radio" name="vedette" id="vedette" value="oui" required>
						<label class="form-check-label" for="inlineRadio2">Non</label>
			        </div>
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                            <option value="action">Action</option>
                            <option value="aventure">Aventure</option>
                            <option value="rpg">RPG</option>
                            <option value="créatif">Créatif</option>
                            <option value="sport">Sport</option>
                            <option value="fps">FPS</option>
                        <span class="help-inline"><?php echo $categoryError;?></span>
                    </div>
                    <br>
                    
                    <input type="submit" value="Ajouter" class="btn btn-success">	
                    <a class="btn btn-primary" href="admin_index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   
                </form>
            </div>
        </div>   
    </body>
</html>