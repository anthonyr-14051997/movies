<?php

// Réaliser une requête affichant le nombre d'années entre le film le plus récent et le film le plus vieux

require_once('../connect.php');

$req_select_diff = "SELECT release_year FROM release_years, Max(release_year) - Min(release_year) as diff";
$req_get_diff = $db->query($req_select_diff);

while ($a = $req_get_diff->fetch(PDO::FETCH_ASSOC)) {
    echo $a . "\n";
}