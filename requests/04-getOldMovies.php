<?php

// Réaliser une requête qui permet de récupérer tous les films d'avant 2002

require_once('../connect.php');

$req_select_before = "SELECT title, release_years_id, release_year FROM infos_movies INNER JOIN release_years ON release_years.id = infos_movies.release_years_id WHERE release_years.release_year < 2002";
$req_get_before = $db->query($req_select_before);

while ($a = $req_get_before->fetch(PDO::FETCH_ASSOC)) {
    echo $a . "\n";
}