<?php

require_once('connect.php');

$req_insert_movies_categories = "INSERT INTO categories_has_infos_movies (`categories_id`, `infos_movies_id`) VALUES (:id_cat, :id_movies)";

$req_select_id_movie = "SELECT id FROM infos_movies WHERE title = :title";
$req_select_id_cat = "SELECT id FROM categories WHERE category = :cat";

$req_get_id_movie = $db->prepare($req_select_id_movie);
$req_get_id_cat = $db->prepare($req_select_id_cat);
$req_movie_cat = $db->prepare($req_insert_movies_categories);

$file = fopen('./film.csv','r');
if ($file !==FALSE) {
    while(($row = fgetcsv($file, null, ";", "'", "\n"))!== FALSE){

        $req_get_id_movie->bindValue(':title', $row[0], PDO::PARAM_STR);
        $req_get_id_movie->execute();
        $id_movie = $req_get_id_movie->fetch(PDO::FETCH_ASSOC);

        $one_cat = explode (",", $row[2]); 
        for ($i=0; $i < count($one_cat) ; $i++) { 
            $req_get_id_cat->bindValue(':cat', $one_cat[$i], PDO::PARAM_STR);
            $req_get_id_cat->execute();
            $id_cat = $req_get_id_cat->fetch(PDO::FETCH_ASSOC);
            
            $req_movie_cat->bindValue(':id_cat', $id_cat["id"], PDO::PARAM_INT);
            $req_movie_cat->bindValue(':id_movies', $id_movie["id"], PDO::PARAM_INT);
            $req_movie_cat->execute();
        }
    }
}
