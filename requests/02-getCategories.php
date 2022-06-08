<?php

// Réaliser une requête qui permet de récupérer toutes les catégories

require_once('../connect.php');

$req_select_cat = "SELECT category FROM `categories`";
$req_get_cat = $db->query($req_select_cat);

while ($a = $req_get_cat->fetch(PDO::FETCH_ASSOC)) {
    echo $a['category'] . "\n";
}

// Réaliser une requête qui permet d'afficher le nombre de films par catégories

$req_select_nbr = "SELECT COUNT(categories_id) FROM `categories_has_infos_movies` WHERE infos_movies_id";
$req_get_nbr = $db->query($req_select_nbr);

while ($a = $req_get_nbr->fetch(PDO::FETCH_ASSOC)) {
    echo $a . "\n";
}

