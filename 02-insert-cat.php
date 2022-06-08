<?php

require_once('connect.php');

$req_insert_categories = "INSERT INTO categories (`category`) SELECT * FROM (SELECT :category AS `category`) AS temp WHERE NOT EXISTS ( SELECT `category` FROM categories WHERE `category` = :category )";

$req_cat = $db->prepare($req_insert_categories);

$file = fopen('./film.csv','r');
if ($file !==FALSE) {
    while(($row = fgetcsv($file, null, ";", "'", "\n"))!== FALSE){
        $one_cat = explode (",", $row[2]);
        for ($i=0; $i < count($one_cat) ; $i++) { 
            $req_cat->bindValue(':category', $one_cat[$i], PDO::PARAM_STR);
            $req_cat->execute();
        }
    }
}