<?php

/**
 * Etape 1 : On se connecte
 * 
 * On récupère un PDO
 */
// DSN = Data Source Name
$dsn = 'mysql:host=localhost;dbname=blog';

// PDO = PHP Data Object
$bdd = new PDO($dsn, 'root', '');
// Je suis connecté

/**
 * Etape 2 : Requête SQL
 * 
 * On récupère un résultat "en binaire"
 */
$resultat = $bdd->query('SELECT * FROM article');

/**
 * Etape 3 : Manipuler / Récupérer mes données
 * 
 * On récupère un tableau
 * OU
 * Un tableau de tableaux
 */
$unArticle = $resultat->fetch(PDO::FETCH_ASSOC); // array
$tousLesArticles = $resultat->fetchAll(PDO::FETCH_ASSOC); // array d'arrays
$apresDernierArticle = $resultat->fetch(PDO::FETCH_ASSOC); // false

/**
 * Le fetch fait "avancer le curseur" de 1
 * Le fetchAll fait avancer le curseur jusqu'à la fin
 * 
 * S'il n'y a plus de ligne dans le jeu de résultat
 * fetch renvoie false
 */