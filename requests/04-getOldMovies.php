<?php

// Réaliser une requête qui permet de récupérer tous les films d'avant 2002

require_once('../connect.php');

$req_select_before = "SELECT ";
$req_get_before = $db->query($req_select_before);

while ($a = $req_get_before->fetch(PDO::FETCH_ASSOC)) {
    echo $a . "\n";
}