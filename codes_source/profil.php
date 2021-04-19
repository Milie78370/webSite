<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/profil.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			/*Ouvre une session*/
			session_start();
			if(!(isset($_SESSION['user_connexion']))){
				header("Location: index.php");
			}
			else{
				/*Se connecte à la base de données*/
				require("parametres.php");
				$connexion=mysqli_connect($host,$user,$mdp) 
					or die("Connexion impossible au serveur $serveur pour $login");
				$bd="quartier_du_haras";

				mysqli_select_db($connexion,$bd)
					or die("Impossible d'acc?der ? la base de donn?es");
				?>
				
				<!-- La barre de navigation-->
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
				
				
				<?php
					/*Connexion à la base de données*/
					require("parametres.php");
					$connexion_profil=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexion_profil,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");
					
					/*Container avec la table qui contient les informations de l'utilisateur*/
					echo "<div class='container'>

						<form class='profil' method='post' action='profil.php'>
							<h1>Profil de l'utilisateur</h1>
							
							<!-- Affiche le tableau avec les informations-->
							<table class='table table-striped'>
								<tr>
									<td>Nom</td>
									<td>
										<input type='submit' class='btn btn-primary-outline' name='NomButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";
										
										$id = $_SESSION['user_connexion'];
										
										
										$requete_selection_coordoonees="SELECT * FROM coordonnees WHERE id = ? ";
										$resultat_adresse =mysqli_prepare($connexion_profil,$requete_selection_coordoonees);
										
										mysqli_stmt_bind_param($resultat_adresse,'s',$id);
										mysqli_stmt_execute($resultat_adresse);
										$nom = mysqli_stmt_get_result($resultat_adresse); 
										$adresse_affichage = mysqli_fetch_array($nom);

										echo $adresse_affichage[1];
										
										/*Nom*/
										if(isset($_POST['NomButton'])){

											echo "<td>
												<form method='post' action='profil.php'>
													<input type='text' name='changementNom'>";//saisi du nouveau nom

													echo"<button type='submit' name='validerChangementNom'>";//envoyer la modification

														echo"<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";

										}
										
										/*Permet de valider le changement de nom*/
										if(isset($_POST["validerChangementNom"])){

											$nouveau_nom = $_POST['changementNom'];

											$requete_changemement_nom = "UPDATE coordonnees SET nom = ? WHERE id = ?";
											$resultat_requete = mysqli_prepare($connexion_profil,$requete_changemement_nom);
											
											mysqli_stmt_bind_param($resultat_requete ,'ss',$nouveau_nom,$id);
											mysqli_stmt_execute($resultat_requete);
											
											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$nom_affichage[1] = $nouveau_nom;

											echo $nouveau_nom;

											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";

										}
									echo "</td>";

									echo"

								</tr>
								<tr>
									<td>Prénom</td>";
									echo"<td>";
										echo"<input type='submit' class='btn btn-primary-outline' name='PrenomButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";
										$requete_selection_coordoonees="SELECT * FROM coordonnees WHERE id = ? ";
										$resultat_adresse =mysqli_prepare($connexion_profil,$requete_selection_coordoonees);
										
										mysqli_stmt_bind_param($resultat_adresse,'s',$id);
										mysqli_stmt_execute($resultat_adresse);
										
										$prenom = mysqli_stmt_get_result($resultat_adresse); 
										$adresse_affichage = mysqli_fetch_array($prenom);

										echo $adresse_affichage[2];
										
										/*Prénom*/
										if(isset($_POST['PrenomButton'])){

											echo "<td>
												<form method='post' action='profil.php'>
													<input type='text' name='changementPrenom'>";//saisi du nouveau prénom
													echo "<button type='submit' name='validerChangementPrenom'>";//envoyer la modification
														echo "<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";
										}
										
										/*Permet de valider le changement de prénom*/
										if(isset($_POST["validerChangementPrenom"])){

											$nouveau_prenom = $_POST['changementPrenom'];

											$requete_changemement_prenom = "UPDATE coordonnees SET prenom = ? WHERE id = ? ";
											
											$resultat_requete = mysqli_prepare($connexion_profil,$requete_changemement_prenom);
											
											mysqli_stmt_bind_param($resultat_requete,'ss',$nouveau_prenom,$id);
											mysqli_stmt_execute($resultat_requete);
											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$prenom_affichage[2] = $nouveau_prenom;

											echo $nouveau_prenom;

											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
										}
									echo"</td>";
									echo"

								</tr>
								<tr>
									<td>Pseudo</td>";


									echo"<td>";
										echo"<input type='submit' class='btn btn-primary-outline' name='PseudoButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";
										$requete_selection_connexion="SELECT * FROM connexion WHERE id = ? ";
										$resultat_pseudo =mysqli_prepare($connexion_profil,$requete_selection_connexion);
										
										mysqli_stmt_bind_param($resultat_pseudo,'s',$id);
										mysqli_stmt_execute($resultat_pseudo);
										
										$pseudo = mysqli_stmt_get_result($resultat_pseudo);
										$pseudo_affichage = mysqli_fetch_array($pseudo);

										echo $pseudo_affichage[1];
										
										/*Pseudo*/
										if(isset($_POST['PseudoButton'])){

											echo "<td>
												<form method='post' action='profil.php'>
													<input type='text' name='changementPseudo'>";//saisi du nouveau pseudo
													echo"<button type='submit' name='validerChangementPseudo'>";//envoyer la modification
														echo"<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";
										}
										/*Permet de valider le changement de pseudo*/
										if(isset($_POST["validerChangementPseudo"])){

											$nouveau_pseudo = $_POST['changementPseudo'];

											$requete_changemement_pseudo = "UPDATE connexion SET login = ? WHERE id = ?";
											mysqli_stmt_bind_param($requete_changemement_pseudo,'ss',$nouveau_pseudo,$id);
											mysqli_stmt_execute($requete_changemement_pseudo);
											$resultat_requete = mysqli_query($connexion_profil,$requete_changemement_pseudo);

											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$pseudo_affichage[1] = $nouveau_pseudo;

											echo $nouveau_pseudo;

											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
										}

									echo"</td>";

									echo"
								</tr>
								<tr>
									<td>Mot de passe</td>";

									echo"<td>
										<input type='submit' class='btn btn-primary-outline' name='passwordButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";
										$requete_selection_connexion="SELECT * FROM connexion WHERE id = ?";
										
										$resultat_mdp =mysqli_prepare($connexion_profil,$requete_selection_connexion);
										
										mysqli_stmt_bind_param($resultat_mdp,'s',$id);
										mysqli_stmt_execute($resultat_mdp);
										
										$mdp = mysqli_stmt_get_result($resultat_mdp);
										$mdp_affichage = mysqli_fetch_array($mdp);

										//echo $mdp_affichage[2];
										
										/*Mot de passe*/
										if(isset($_POST['passwordButton'])){

											echo"<td>
												<form method='post' action='profil.php'>
													<input type='password' name='changementPassword'>";//saisi du nouveau mot de passe
													echo"<button type='submit' name='validerChangementPassword'>";//envoyer la modification
														echo"<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";
										}
										
										/*Permet de valider le changement de mot de passe*/
										if(isset($_POST["validerChangementPassword"])){

											$nouveau_password = $_POST['changementPassword'];
											$nv_mdp = password_hash($nouveau_password,PASSWORD_ARGON2I);

											$requete_changemement_password = "UPDATE connexion SET password =? WHERE id = ?";
											$resultat_requete = mysqli_prepare($connexion_profil,$requete_changemement_password);
											
											mysqli_stmt_bind_param($resultat_requete,'ss',$nv_mdp,$id);
											mysqli_stmt_execute($resultat_requete);
											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$password_affichage[2] = $nouveau_password;


											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
										}
									echo"</td>";

									echo"
								</tr>
								<tr>
									<td>Adresse</td>";

									echo "<td>";
										echo"<input type='submit' class='btn btn-primary-outline' name='adresseButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";

										$requete_selection_coordoonees="SELECT * FROM coordonnees WHERE id = ? ";
										$resultat_adresse =mysqli_prepare($connexion_profil,$requete_selection_coordoonees);
										
										mysqli_stmt_bind_param($resultat_adresse,'s',$id);
										mysqli_stmt_execute($resultat_adresse);
										
										$adresse = mysqli_stmt_get_result($resultat_adresse);
										$adresse_affichage = mysqli_fetch_array($adresse);

										echo $adresse_affichage[3];

										/*adresse*/
										if(isset($_POST['adresseButton'])){

											echo "<td>
												<form method='post' action='profil.php'>
													<input type='text' name='changementAdresse'>";//saisi de la nouvelle adresse
														echo"<button type='submit' name='validerChangementAdresse'>";//envoyer la modification
														echo"<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";
										}
										
										/*Permet de valider le changement d'adresse*/
										if(isset($_POST["validerChangementAdresse"])){

											$nouveau_adresse = $_POST['changementAdresse'];

											$requete_changemement_adresse = "UPDATE coordonnees SET adresse = ? WHERE id = ?";

											$resultat_requete = mysqli_prepare($connexion_profil,$requete_changemement_adresse);
											mysqli_stmt_bind_param($resultat_requete ,'ss',$nouveau_adresse,$id);
											mysqli_stmt_execute($resultat_requete );
											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$adresse_affichage[4] = $nouveau_adresse;

											echo $nouveau_adresse;

											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
										}
									echo"</td>";
									echo"
								</tr>
								<tr>
									<td>Téléphone</td>";

									echo"<td>
										<input type='submit' class='btn btn-primary-outline' name='TelButton' value=''>
										<i class='bi bi-pen-fill'>
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
												<path d='M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
											</svg>
										</i>";

										$requete_selection_coordoonees="SELECT * FROM coordonnees WHERE id = ?";
										$resultat_telephone =mysqli_prepare($connexion_profil,$requete_selection_coordoonees);
										mysqli_stmt_bind_param($resultat_telephone ,'s',$id);
										mysqli_stmt_execute($resultat_telephone );
										
										$telephone = mysqli_stmt_get_result($resultat_telephone);
										$telephone_affichage = mysqli_fetch_array($telephone);
									
										echo $telephone_affichage[4];
										
										/*Téléphone*/
										if(isset($_POST['TelButton'])){

											echo "<td>
												<form method='post' action='profil.php'>
													<input type='text' name='changementTel'>";//saisi du nouveau téléphone

													echo"<button type='submit' name='validerChangementTel'>";//envoyer la modification

														echo"<i class='bi bi-check-square'>
															<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
																<path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
																<path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
															</svg>
														</i>
													</button>
												</form>
											</td>";
										}
										
										/*Permet de valider le changement de téléphone*/
										if(isset($_POST["validerChangementTel"])){
											$nouveau_tel = $_POST['changementTel'];

											$requete_changemement_tel = "UPDATE coordonnees SET telephone =? WHERE id =?";

											$resultat_requete = mysqli_prepare($connexion_profil,$requete_changemement_tel);
											mysqli_stmt_bind_param($resultat_requete  ,'ss',$nouveau_tel,$id);
											mysqli_stmt_execute($resultat_requete  );
											//$nouveau_email_affichage = mysqli_fetch_array($resultat_requete);

											$tel_affichage[4] = $nouveau_tel;

											echo $nouveau_tel;

											echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
										}
									echo"</td>";
									echo"
								</tr>
								<tr>
									<td> Nombre d'objets empruntés</td>";
										/*Objets empruntés*/
										$requete_emprunt = "SELECT objets_empruntes FROM compteur WHERE id = '".$id."'";
										$resultat_adresse =mysqli_query($connexion_profil,$requete_emprunt);
										$emprunt_affichage = mysqli_fetch_array($resultat_adresse);

										echo"<td>".$emprunt_affichage[0]."</td>";
									echo"
								</tr>
								<tr>
									<td> Nombre d'objets prêtés</td>";
										/*Objets prêtés*/
										$requete_pret = "SELECT objets_pretes FROM compteur WHERE id = '".$id."' ";
										$resultat_adresse = mysqli_query($connexion_profil,$requete_pret);

										$pret_affichage = mysqli_fetch_array($resultat_adresse);

										echo "<td>".$pret_affichage[0]."</td>";
									echo"
								</tr>

							</table>";
							mysqli_close($connexion_profil);
							
			}
		?>
						</form>
					
					</div>
					<div class='container-card-form' >
					<!-- Card contenant le formulaire de suppression d'un objet-->
						<div class="card border-info mb-3" id="sup">
							<div class="card-header">Supprimer un objet</div>
							<div class="card-body" id="sup2">
								<p class="card-text">
									<form class="d-flex" method="post">
										<div class="supprimer_objets" >
											<?php
											$id = $_SESSION['user_connexion'];
												require("parametres.php");
												$connexion_sup_objet=mysqli_connect($host,$user,$mdp) 
													or die("Connexion impossible au serveur $serveur pour $login");
												$bd="quartier_du_haras";
												mysqli_select_db($connexion_sup_objet,$bd)
													or die("Impossible d'acc?der ? la base de donn?es");
												
												$requete_sup_objet="SELECT id_objet,nom_objet FROM objets where id ='".$id."'";
												$resultat_sup_objet=mysqli_query($connexion_sup_objet,$requete_sup_objet);
												
												echo"
													<select class='custom-select' id='inputGroupSelect01' name='objets' >";
														while ($ligne=mysqli_fetch_row($resultat_sup_objet)) {
															echo "<option  value='".$ligne[0]."'>".$ligne[1]."</option>";
														}
												echo"</select>
												";
												mysqli_close($connexion_sup_objet);
											?>
										</div>
										
										<button class="btn btn-primary"  name="supprimer" type="submit">Supprimer</button>
									</form>
								</p>
							</div>
						</div>
					</div>
					<?php
						//suppression d'objet
						//echo "avant if";
						if(isset($_POST['supprimer'])){
							echo "apres if";
							if(isset($_POST['objets'] )){
								$id_objets= $_POST['objets'];
								require("parametres.php");
								$connexionrecherche=mysqli_connect($host,$user,$mdp) 
									or die("Connexion impossible au serveur $serveur pour $login");
								$bd="quartier_du_haras";
								mysqli_select_db($connexionrecherche,$bd)
									or die("Impossible d'acc?der ? la base de donn?es");
									
								$query="DELETE  FROM objets WHERE id_objet ='".$id_objets."' ";
								$result=mysqli_query($connexionrecherche,$query);
								
								echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";
								
								mysqli_close($connexionrecherche);
							}
					
						}
					?>
					
					
        
		
		<script src="scripts/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="scripts/main.js"></script>
		
	</body>
</html>