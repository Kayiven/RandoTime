<?php session_start();

// Supprimer toutes les variables de session
session_unset();
// Détruire la session
session_destroy();

// Rediriger vers la page de login (ou autre)
header("Location: ../../Views/Seassion/Invité/Login.php");
exit;?>