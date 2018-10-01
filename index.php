<?php

$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

switch ($lang){
    case "fr":
        header('location:fr/');
        break;
    case "en":
        header('location:en/');
        break;        
    default:
        header('location:en/');
        break;
}
?>