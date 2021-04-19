<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>
	
	<body>
		<!-- Creation d'une session pour l'utilisateur-->
		<!-- si l'utilisateur n'est pas bon alors il reste sur la même page sinon il a accès aux différentes fonctionnalités de la page c'est à dire :
		Menu,recherche,contact,profil,etc ... 
		-->
		<?php
			session_start();
			if((!(isset($_SESSION['user_connexion']))) or($_SESSION['user_connexion']!="admin")){
				
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
				
				
				<!-- Container qui contient les forlulaires d'action de l'administrateur-->
				<div class='container-card-form'>
					<!-- Card contenant le formulaire de suppression d'un objet-->
					<div class="card border-info mb-3" >
						<div class="card-header">Supprimer un objet</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<div class="supprimer_objets" >
										<?php
											require("parametres.php");
											$connexion_sup_objet=mysqli_connect($host,$user,$mdp) 
												or die("Connexion impossible au serveur $serveur pour $login");
											$bd="quartier_du_haras";
											mysqli_select_db($connexion_sup_objet,$bd)
												or die("Impossible d'acc?der ? la base de donn?es");
											
											$requete_sup_objet="SELECT id_objet,nom_objet FROM objets ";
											$resultat_sup_objet=mysqli_query($connexion_sup_objet,$requete_sup_objet);
											
											echo"
												<select class='custom-select' id='inputGroupSelect01' name='objets'>";
													while ($ligne=mysqli_fetch_row($resultat_sup_objet)) {
														echo "<option value='".$ligne[0]."'>".$ligne[1]."</option>";
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
					  
					  <!-- Card contenant le formulaire de suppression d'un utilisateur-->
					<div class="card border-info mb-3">
						<div class="card-header">Supprimer un utilisateur</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<div class="supprimer_utilisateur" >
										<?php
											require("parametres.php");
											$connexion_coordonnees=mysqli_connect($host,$user,$mdp) 
												or die("Connexion impossible au serveur $serveur pour $login");
											$bd="quartier_du_haras";
											mysqli_select_db($connexion_coordonnees,$bd)
												or die("Impossible d'acc?der ? la base de donn?es");
											
											$tables="coordonnees";
											$requete_supprimer="SELECT *FROM $tables ";
											$resultat_supprimer=mysqli_query($connexion_coordonnees,$requete_supprimer);
											
											echo"
												<select class='custom-select' id='inputGroupSelect02' name='coordonnees'>";
													while ($ligne=mysqli_fetch_row($resultat_supprimer)) {
														echo "<option value='".$ligne[0]."'>".$ligne[1]." ".$ligne[2]."</option>";
														
													}
											echo"</select>
											";
											mysqli_close($connexion_coordonnees);
										?>
									</div>
									<button class="btn btn-primary"  name="supprimer_User" type="submit">Supprimer utilisateur</button>
								</form>
							</p>
					  </div>
					</div>
					  
					  
					<!-- Card contenant le formulaire de suppression d'une catégorie-->
					<div class="card border-info mb-3" >
					  <div class="card-header">Supprimer une catégorie</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<div class="supprimer_categorie" >
										<?php
											require("parametres.php");
											$connexion_categorie=mysqli_connect($host,$user,$mdp) 
												or die("Connexion impossible au serveur $serveur pour $login");
											$bd="quartier_du_haras";
											mysqli_select_db($connexion_categorie,$bd)
												or die("Impossible d'acc?der ? la base de donn?es");
											
											$query="SELECT id_categorie FROM categories WHERE categorie ='pas de categorie'";
											$result=mysqli_query($connexion_categorie,$query);


											while ($ligne=mysqli_fetch_row($result)) {
												$id_pas_categorie=$ligne[0];// id_categorie qui correspond a la categorie pas de categorie
											}
											
											$tables="categories";
											$requete_suppression_categorie="SELECT *FROM $tables WHERE id_categorie != '".$id_pas_categorie."'";

											
											$resultat_suppression=mysqli_query($connexion_categorie,$requete_suppression_categorie);
											

											echo"
												<select class='custom-select' id='inputGroupSelect02' name='coordonnees'>";
													while ($ligne=mysqli_fetch_row($resultat_suppression)) {
														echo "<option value='".$ligne[0]."'>".$ligne[1]."</option>";
													}
											echo"</select>
											";

											
											mysqli_close($connexion_categorie);
									
										?>
									</div>
									<button class="btn btn-primary"  name="supprimer_categorie" type="submit">Supprimer une catégorie</button>
								</form>
							</p>
						</div>
					</div>
					
					<!-- Card contenant le formulaire d ajout d'une catégorie-->
					<div class="card border-info mb-3" >
					  <div class="card-header">Ajouter une catégorie</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<input type="text" name="ajouterUneCategorie" placeholder="Nouvelle Catégorie" >
									<button class="btn btn-primary" type="submit" name="creationDeLaCategorie">Ajouter une catégorie</button>
								</form>
							</p>
						</div>
					</div>
					
					<!-- Card contenant le formulaire de modification d'un mot de passe-->
					<div class="card border-info mb-3">
						<div class="card-header">Modifier un mot de passe</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<div class="modifier_mdp" >
										<?php
											require("parametres.php");
											$connexion_modif_mdp=mysqli_connect($host,$user,$mdp) 
												or die("Connexion impossible au serveur $serveur pour $login");
											$bd="quartier_du_haras";
											mysqli_select_db($connexion_modif_mdp,$bd)
												or die("Impossible d'acc?der ? la base de donn?es");
											
											$tables="coordonnees";
											$requete_modif_mdp="SELECT *FROM $tables ";
											$resultat_modif_mdp=mysqli_query($connexion_modif_mdp,$requete_modif_mdp);
											
											echo"
												<select class='custom-select' id='inputGroupSelect02' name='modif_mdp'>";
													while ($ligne=mysqli_fetch_row($resultat_modif_mdp)) {
														echo "<option value='".$ligne[0]."'>".$ligne[1]." ".$ligne[2]."</option>";
														
													}
											echo"</select>
											";
											mysqli_close($connexion_modif_mdp);
										?>
										<input type="text" name="nouveau_mdp" placeholder="Nouveau Mot de passe" > 
										<button class="btn btn-primary"  name="btn_modif_mdp" type="submit" >Modifier le Mot de passe</button>
									</div>
									
								</form>
							</p>
					  </div>
					</div>
					
					<!-- Card contenant le formulaire de modification du mot de passe de l'administrateur-->
					<div class="card border-info mb-3">
						<div class="card-header">Modifier le mot de passe de l'administrateur</div>
						<div class="card-body">
							<p class="card-text">
								<form class="d-flex" method="post">
									<div class="modifier_mdp_admin" >
										<input type="text" name="nouveau_mdp_admin" placeholder="Nouveau Mot de passe" > 
									</div>
									<button class="btn btn-primary"  name="btn_modif_mdp_admin" type="submit" >Modifier le Mot de passe</button>
								</form>
							</p>
					  </div>
					</div>
					
				</div>
				
							
				<!-- Container contenant des tables de la base de données-->
				<div class='container-table'>
				
	
					<!-- Ouverture de la connexion avec la base de donnée -->
					<?php
						require("parametres.php");
						$connexion=mysqli_connect($host,$user,$mdp) 
							or die("Connexion impossible au serveur $serveur pour $login");
						$bd="quartier_du_haras";
						mysqli_select_db($connexion,$bd)
							or die("Impossible d'acc?der ? la base de donn?es");
					?>
					
					<!--tableau de coordonnées des utilisateurs -->
					
					<div class="card border-info mb-3" >
					  <div class="card-header">Coordonnées Utilisateurs</div>
					  <div class="card-body">
						<p class="card-text">
							<?php
								$requetes="SELECT * FROM coordonnees";
								$resultats=mysqli_query($connexion,$requetes);
								echo"<table class='table table-striped' >";
									echo"<tr>";
										echo"<th >Pseudo</th>";
										echo"<th >Nom</th>";
										echo"<th >Prenom</th>";
										echo"<th >Adresse</th>";
										echo"<th >Telephone</th>";
										
									echo"</tr>";
									while ($ligne=mysqli_fetch_row($resultats)) {
										echo"<tr>";
											$requete_affichage_login="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
											$resultat_login=mysqli_query($connexion,$requete_affichage_login);
											$proprietaire_login=mysqli_fetch_array($resultat_login);
											
											echo "<td>".$proprietaire_login[0]."</td>";
											echo "<td>".$ligne[1]."</td>";
											echo "<td>".$ligne[2]."</td>";
											echo "<td>".$ligne[3]."</td>";	
											echo "<td>".$ligne[4]."</td>";	
	
										echo "</tr>";			
									}
								echo "</table>";
							?>
						</p>
					  </div>
					</div>
					
					<!--tableau des objets prêtés et empruntés -->
					<!-- Affiche le nombre d'ojets empruntés et prêtés  dans un tableau en fonction des utilisateurs  -->
					
					<div class="card border-info mb-3" >
					  <div class="card-header">Prêts et Emprunts</div>
					  <div class="card-body">
						<p class="card-text">
							<?php
								$requetes_compteur="SELECT * FROM compteur";
								$resultats_compteur=mysqli_query($connexion,$requetes_compteur);
								
								echo"<table class='table table-striped'>";
									echo"<tr>";
										echo"<th >Pseudo</th>";
										echo"<th >Nombre d'objets prêtés</th>";
										echo"<th >Nombre d'objet empruntés</th>";
									echo"</tr>";
									while ($ligne=mysqli_fetch_row($resultats_compteur)) {
										echo"<tr>";
											$requete_affichage_pseudo="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
											$resultat_pseudo=mysqli_query($connexion,$requete_affichage_pseudo);
											$pseudo=mysqli_fetch_array($resultat_pseudo);
											
											echo "<td>".$pseudo[0]."</td>";
											echo "<td>".$ligne[1]."</td>";
											echo "<td>".$ligne[2]."</td>";	
										echo "</tr>";			
									}
								echo "</table>";
							?>
						</p>
					  </div>
					</div>
					
					<!--tableau des  Objets-->
					
					<div class="card border-info mb-3" >
					  <div class="card-header">Objets du site</div>
					  <div class="card-body">
						<p class="card-text">
							<?php
								$requetes_objet="SELECT * FROM objets ORDER BY id,id_categorie";
								$resultats_objet=mysqli_query($connexion,$requetes_objet);
								
								
								echo"<table class='table table-striped'>";
									echo"<tr>";
										echo"<th >Propriétaire</th>";
										echo"<th >Nom</th>";
										echo"<th >Catégorie</th>";
										echo"<th >Description</th>";
									echo"</tr>";
									
									while ($ligne=mysqli_fetch_row($resultats_objet)) {
										echo"<tr>";
											$requete_affichage_proprio="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
											$resultat_proprio=mysqli_query($connexion,$requete_affichage_proprio);
											$proprietaire_login=mysqli_fetch_array($resultat_proprio);
											
											echo "<td>".$proprietaire_login[0]."</td>";
											echo "<td>".$ligne[2]."</td>";

											$requete_affichage_categorie="SELECT categorie FROM categories WHERE id_categorie ='".$ligne[3]."'";
											$resultat_categorie =mysqli_query($connexion,$requete_affichage_categorie);
											
											while ($ligne_categorie=mysqli_fetch_row($resultat_categorie)) {
												$nom_categorie=$ligne_categorie[0];
											}
											echo "<td>".$nom_categorie."</td>";
											echo "<td>".$ligne[4]."</td>";
										echo "</tr>";
									}
								echo "</table>";
							?>
						</p>
					  </div>
					</div>
				</div>

			<!-- partie des issets -->
			<?php
			
				//Suppression d'une catégorie 
				
				if(isset($_POST['supprimer_categorie'])){
					$categorie_a_supprimer = $_POST['coordonnees']; //recuperation du select

					echo $categorie_a_supprimer;

					$connexion_categorie=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
						
					$bd="quartier_du_haras";
					mysqli_select_db($connexion_categorie,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");

						
					$query="DELETE  FROM categories WHERE id_categorie ='".$categorie_a_supprimer."' ";
					$result=mysqli_query($connexion_categorie,$query);


					echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";

					mysqli_close($connexion_categorie);
				}
				
				//Insertion d'une catégorie
				
				if(isset($_POST['creationDeLaCategorie'])){
					
					$categorie_a_ajouter = $_POST['ajouterUneCategorie']; //recuperation du form de la nouvelle catégorie
					
					require("parametres.php");
					$connexion_categorie=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexion_categorie,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");

					$query="INSERT INTO categories(categorie)";
					$query.="values(?)";
					$result=mysqli_prepare($connexion_categorie,$query);

					mysqli_stmt_bind_param($result,'s',$categorie_a_ajouter);
					mysqli_stmt_execute($result);
					
					echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
					mysqli_close($connexion_categorie);
					
					
				
				}
				
				//Suppression d'un objet
				
				if(isset($_POST['supprimer'])){
						
					if(isset($_POST['objets'] )){
						$id_objets= $_POST['objets'];

						$connexionrecherche=mysqli_connect($host,$user,$mdp) 
							or die("Connexion impossible au serveur $serveur pour $login");
						$bd="quartier_du_haras";
						mysqli_select_db($connexionrecherche,$bd)
							or die("Impossible d'acc?der ? la base de donn?es");
							
						$query="DELETE  FROM objets WHERE id_objet ='".$id_objets."' ";
						$result=mysqli_query($connexionrecherche,$query);
						
						echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
						
						mysqli_close($connexionrecherche);
					}
			
				}
				
				//Suppression d'un utilisateur
					
				if(isset($_POST['supprimer_User'])){
					
					if(isset($_POST['coordonnees'])){
							$id_coordonnees= $_POST['coordonnees'];

							$connexionrecherche=mysqli_connect($host,$user,$mdp) 
								or die("Connexion impossible au serveur $serveur pour $login");
							$bd="quartier_du_haras";
							mysqli_select_db($connexionrecherche,$bd)
								or die("Impossible d'acc?der ? la base de donn?es");
								
							$query="DELETE FROM objets WHERE id ='".$id_coordonnees."' ";
							$query2="DELETE FROM compteur WHERE id ='".$id_coordonnees."' ";
							$query3="DELETE FROM coordonnees WHERE id ='".$id_coordonnees."' ";
							$query4="DELETE FROM connexion WHERE id ='".$id_coordonnees."' ";
							
							$result=mysqli_query($connexionrecherche,$query);
							$result=mysqli_query($connexionrecherche,$query2);
							$result=mysqli_query($connexionrecherche,$query3);
							$result=mysqli_query($connexionrecherche,$query4);
							
							echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
							
							mysqli_close($connexionrecherche);
					}
				}
				
				//Modifier un mdp d'un utilisateur
				
				if(isset($_POST['btn_modif_mdp'])){
					
					$id_utilisateur = $_POST['modif_mdp'];
					$nouveau_mdp = $_POST['nouveau_mdp'];
					$mdp_hash = password_hash($nouveau_mdp,PASSWORD_ARGON2I);
					
					$connexion_modification_mdp=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexion_modification_mdp,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");

					$query_modif_mdp="UPDATE connexion SET password =? WHERE id = ?";
					$result_modif_mdp=mysqli_prepare($connexion_modification_mdp,$query_modif_mdp);
					
					mysqli_stmt_bind_param($result_modif_mdp,'ss',$mdp_hash,$id_utilisateur);
					mysqli_stmt_execute($result_modif_mdp);
					
					echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";

					mysqli_close($connexion_modification_mdp);
				}
				
				//Modifier le mdp de l'admin 
				
				if(isset($_POST['btn_modif_mdp_admin'])){
					$nouveau_mdp_admin = $_POST['nouveau_mdp_admin'];
					$mdp_hash = password_hash($nouveau_mdp_admin,PASSWORD_ARGON2I);
					$admin = "admin";
					
					$connexion_modification_mdp_admin=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexion_modification_mdp_admin,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");
					
					$query_modif_mdp_admin="UPDATE administrateur SET mot_de_passe = ? WHERE login = ? ";
					$result_modif_mdp_admin=mysqli_prepare($connexion_modification_mdp_admin,$query_modif_mdp_admin);
					
					mysqli_stmt_bind_param($result_modif_mdp_admin,'ss',$mdp_hash,$admin);
					mysqli_stmt_execute($result_modif_mdp_admin);
					
					echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";

					mysqli_close($connexion_modification_mdp_admin);
				}
			}
			?>
			
			<!-- Les scripts utilisés -->
		
			<script src="scripts/jquery-3.3.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="scripts/main.js"></script>
		
	</body>
</html>