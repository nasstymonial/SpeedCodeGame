<?php

// connexion a la BDD 
$pdo = new PDO('mysql:dbname=heroku_415d890bad2fb94;host=eu-cdbr-west-03.cleardb.net', 'bd9b02415785c5', '4d40357c');

// se rendre compte des erreurs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des infos sur mode objet
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);