<?php

/*
 * ici, nous aurons les fonctions utiles à notre projet
 * utilisable sur toutes les pages.
 */

// Permet de rediriger un utilisateur sur une nouvelle page
function redirection($page) {
    header('Location: '.$page);
}

// Permet de debugger une variable
function debug($data) {
    echo '<pre>';
    print_r( $data );
    echo '</pre>';
}