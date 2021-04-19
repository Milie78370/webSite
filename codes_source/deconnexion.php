<?php
	/*Permet de fermer la session pour se déconnecter*/
	session_start();
	session_destroy();
	header('Location: index.php');//Rédirige vers l'index
?>
