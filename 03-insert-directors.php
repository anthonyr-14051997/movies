<?php

require_once('connect.php');

$req_insert_directors = "INSERT INTO directors (`director_name`) SELECT * FROM (SELECT :name_director AS `director_name`) AS temp WHERE NOT EXISTS ( SELECT `director_name` FROM directors WHERE `director_name` = :name_director )";

$req_dir = $db->prepare($req_insert_directors);

$file = fopen('./film.csv','r');
if ($file !==FALSE) {
    while(($row = fgetcsv($file, null, ";", "'", "\n"))!== FALSE){
        $one_dir = explode (",", $row[3]);
        for ($i=0; $i < count($one_dir) ; $i++) { 
            $req_dir->bindValue(':name_director', $one_dir[$i], PDO::PARAM_STR);
            $req_dir->execute();
        }
    }
}