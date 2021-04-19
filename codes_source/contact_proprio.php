<!DOCTYPE html>
<html>
	<head>
		<title>Contact Propriétaire</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/contact_proprio.css">
	</head>
	
	<body>
	
		<!-- Creation d'une session pour l'utilisateur -->
		<!-- si l'utilisateur n'est pas bon alors il reste sur la même page  sinon il a accès aux différentes fonctionnalités de la page c'est à dire :
		Menu,recherche,contact,profil,etc ... -->
		
		<?php
			session_start();
			if(!(isset($_SESSION['user_connexion']))){
				header("Location: index.php");
			}
			else{
				?>
				
				<nav class="navbar navbar-expand-md">
					<a class="navbar-brand" href="#">Menu</a>
					<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<i class="bi bi-search">
									<a class="nav-link" href="recherche.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
											<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
										</svg> Recherche
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-telephone-fill">
									<a class="nav-link" href="contact.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
										</svg> Contact
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-person-lines-fill">
									<a class="nav-link" href="profil.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
											<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
										</svg> Profil
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-plus-square">
									<a class="nav-link" href="insertionObjet.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
											<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
										</svg> Ajouter un objet
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-plus-circle">
									<a class="nav-link" href="pret_objet.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
										</svg> Ajouter un prêt
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-door-closed-fill">
									<a class="nav-link" href="deconnexion.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
											<path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
										</svg> Deconnexion
									</a>
								</i>
							</li>
						</ul>
					</div>	
				</nav>
				
				<!-- ouverture d'une connexion de la base de donnée .On selectionne les coordonnées des utilisateurs de la table coordonnees
				ainsi que leurs nombres objects prêtés provenant de la table compteur .
				Ensuite on affiche ces informations dans une table -->
				
				<?php
					$id_proprio=$_SESSION['id_proprio'];
					
					require("parametres.php");
					$connexioncontact=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexioncontact,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");
						
					$requete_contact="SELECT * FROM coordonnees WHERE id ='".$id_proprio."'";
					$resultat_contact=mysqli_query($connexioncontact,$requete_contact);
					
					$donnees_proprio = mysqli_fetch_array($resultat_contact);
					
					$requete_pret="SELECT * FROM compteur WHERE id='".$id_proprio."'";
					$resultat_pret=mysqli_query($connexioncontact, $requete_pret);
					$donnees_prets=mysqli_fetch_array($resultat_pret);
				
					mysqli_close($connexioncontact);
					
					
					
					echo "<div class='container'>
						<h1>Coordonnées du propriétaire</h1>

						<table class='table table-striped'>
							<tr>
								<td>Nom</td>
								<td>".$donnees_proprio[1]."</td>
							</tr>
							
							<tr>
								<td>Prénom</td>
								<td>".$donnees_proprio[2]."</td>
							</tr>
									
							<tr>
								<td>Téléphone</td>
								<td>".$donnees_proprio[4]."</td>
							</tr>
													
							<tr>
								<td> Nombre d'objets prêtés</td>
								<td>".$donnees_prets[1]."</td>
							</tr>
							
							<tr>
								<td>Nombre d'objets empruntés</td>
								<td>".$donnees_prets[2]."</td>
							</tr>
							
							
							
						</table>
					</div>";
			}	
		?>
		
		  <!-- Les scripts utilisés -->
		
		<script src="scripts/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="scripts/main.js"></script>
	</body>
</html>