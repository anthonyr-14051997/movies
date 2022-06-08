<?php

// Réaliser une requête permettant de récupérer le titre, l'année de sortie et le réalisateur de chaque film

require_once('../connect.php');

$req_select_before = "SELECT title, release_year, director_name, directors_id, infos_movies_id FROM infos_movies AS s INNER JOIN release_year AS m ON s.release_year=m.id INNER JOIN directors AS a ON directors_has_infos_movies.infos_movies_id = directors_has_infos_movies.infos_movies_id";
$req_get_before = $db->query($req_select_before);

while ($a = $req_get_before->fetch(PDO::FETCH_ASSOC)) {
    echo $a . "\n";
}