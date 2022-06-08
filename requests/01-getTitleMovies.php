<?php

// Réaliser une requête qui permet de récupérer tous les titres des films

require_once('../connect.php');

$req_select_title = "SELECT title FROM `infos_movies`";
$req_get_title = $db->query($req_select_title);

while ($a = $req_get_title->fetch(PDO::FETCH_ASSOC)) {
    echo $a['title'] . "\n";
}

?>
        