<?php

// connexion a la BDD 
$pdo = new PDO('mysql:dbname=speedcodegame;host=localhost:3308', 'nassim', 'tjvbk1');

// se rendre compte des erreurs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des infos sur mode objet
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);