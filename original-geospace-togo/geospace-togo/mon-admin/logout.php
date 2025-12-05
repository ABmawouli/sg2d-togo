<?php
session_start();
session_unset();
session_destroy();

// Redirection vers la page d'accueil
header("Location: /geospace-togo/"); // ← ici, retour à l'accueil
exit();
