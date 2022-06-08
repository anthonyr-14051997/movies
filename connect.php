<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
try {
    $db = new PDO('mysql:host=127.0.1;dbname=movies-ecf', 'phpmyadmin', 'azz0Lan12');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>