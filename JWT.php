<?php

// updated_at : ON CASCADE UPDATED AT CURRENTTIMESTAMP

// UN DOSSIER PAR ENTITE DANS UPLOADS 

//  SERVER STATELESS, SANS GARDER EN MEMOIRE ENTRE LES REQUETES
//  JWT TOKKEN de 3 blocs de texte séparé par des points 
//  encodé en base64 qui permet de transiter en HTTP 
//  HEADER, BODY, SIGNATURE

//  HEADER précise l'algo utilisé pour la signature
// BODY  Désigne le json pour définir id name role exp.. 
//  DEFINIR DATE DE CREATION ET EXPRIRATION DU TOKEN ( exp = expiration)
//  SIGNATURE PERMET DE VALIDER LE TOKKEN 

// ----------- PROCESS ---------------
//  RECUPERATION DES DONNES + FILTRES

$password1 = filter_input(INPUT_POST, 'password');
$password2 = filter_input(INPUT_POST, 'password');
if ($password1 != $password2) {
    # code... message erreur
}
password_hash($password1, PASSWORD_DEFAULT);
if (empty($error)) {
    # code...
}
// VOIR HOMECTRL 
// SI DECONNEXION RENVOYE VERS SIGNOUTCTRL
// Detruit la session et redirection vers page d'accueil
unset($_SESSION['user']);
session_destroy();
header('location: /');
