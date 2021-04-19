<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Quartier le Haras</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	
	<body>
		<!--Menu de lanivgation-->
		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand" href="#">Menu</a>
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<i class="bi bi-house-fill">
							<a class="nav-link" href="index.php">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
									<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
								</svg> Accueil
							</a>
						</i>
					</li>
					<li class="nav-item">
						<i class="bi bi-door-closed-fill">
							<a class="nav-link" href="inscription.php">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
									<path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg> S'inscrire
							</a>
						</i>
					</li>
					<li class="nav-item">
						<i class="bi bi-person-lines-fill">
							<a class="nav-link" href="contact.php">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
									<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
								</svg> Contact
							</a>
						</i>
					</li>
				</ul>

				<form class='row g-3' method='post' action='index.php'>
					<div class='col-sm'>
						<label for='validationServer01' class='form-label'>Identifiant</label>
						<input type='text' name='user_connexion'>
					</div>
					<div class='col-sm'>
						<label for='validationServer02' class='form-label'>Mot de Passe</label>
						<input type='password'  name='password_connexion'>
					</div>
					<div class='col-sm'>
						<button type='submit' name='send' class='btn btn-primary '>Se connecter</button>
					</div>
				</form>

				<?php
					//Si on clique sur le bouton envoyer:
					if(isset($_POST['send'])) {

							//vérification de la condition que les formules soient remplis et pas vides!
							if(isset($_POST['user_connexion']) AND $_POST['user_connexion']!= "" AND isset($_POST['password_connexion']) AND $_POST['password_connexion'] != ""){
								
								//connexion à la base de donnée du quartier du haras
								require('parametres.php');
								$connexion = mysqli_connect($host,$user,$mdp)
									or die("Impossible d'acc?der ? la base de donn?es");
								$bd="quartier_du_haras";
								mysqli_select_db($connexion,$bd)
									or die("Impossible d'acc?der ? la base de donn?es");
								
								//à modifier! vérification que l'on se connecte en tant qu'admin
								if($_POST['user_connexion']== "admin" ){

									//requête qui donne le mot de passe où l'identifiant est celui de l'admin dans la base de donnée
									$requeteMdp= "SELECT  mot_de_passe FROM administrateur WHERE login= ?" ;
									
									$reqprepMdp= mysqli_prepare($connexion,$requeteMdp);
									$admin='admin';
									mysqli_stmt_bind_param($reqprepMdp,'s',$admin);
									mysqli_stmt_execute($reqprepMdp);
									$resultatMdp = mysqli_stmt_get_result($reqprepMdp);									
									
									
									//on stock le mot de passe dans un tableau
									$verifMdp = mysqli_fetch_array($resultatMdp);
									$mdp =$_POST['password_connexion'];
																		
									//test de la condition si le mot de passe récupéré de la base de donnée correspond à ce que l'utilisateur entre alors on se connecte en admin
									if(password_verify($mdp,$verifMdp[0])){
										session_start();//démarrage d'une session
										$_SESSION['user_connexion']="admin";
										header('Location: admin.php');
										exit();
									}
							
								}
								//dans le cas contraire, si on est pas admin
								else{

									//récuperation des saisis des formulaires: identifiant, mot de passe
									$login = $_POST['user_connexion'];
									$password= $_POST['password_connexion'];

									//requete qui va chercher dans la base de donné le mot de passe qui correspond à l'identifiant que l'on a entré dans les formulaires
									
									$sql= "SELECT  password FROM connexion WHERE login= ?" ;

									$reqprepsql= mysqli_prepare($connexion,$sql);
		
									mysqli_stmt_bind_param($reqprepsql,'s',$login);
									mysqli_stmt_execute($reqprepsql);
									$resultat = mysqli_stmt_get_result($reqprepsql);									
									
									$data = mysqli_fetch_array($resultat);
																
									mysqli_close($connexion);

									//vérification du mot de passe saisi dans le formulaire avec celui hashé dans la base de donnée, s'ils coincident:
									if(password_verify($password,$data[0])){

										//reconnexion à la base de donnée					
										$connexion1 = mysqli_connect($host,$user,$mdp)
												or die("Impossible d'acc?der ? la base de donn?es");
										$bd="quartier_du_haras";
										mysqli_select_db($connexion1,$bd)
											or die("Impossible d'acc?der ? la base de donn?es");
											
										//requête sql qui recupère l'id de l'utilisateur où son identifiant entré correspond à son identifiant dans la bd
										$requete = "select id from connexion where login = '".$login."'";
										$resultat = mysqli_query($connexion1, $requete);
										//on stock l'id dans un tableau
										$donnee = mysqli_fetch_array($resultat);
										$id = $donnee[0];
											
										mysqli_close($connexion1);
											
										session_start();
										//démarage d'une session 
										$_SESSION['user_connexion'] = $id;
										header('Location: recherche.php');
										exit();
									}
									//affiche un message d'erreur si on a pas réussi à se connecter
									
							
								}	
							}
							
						}	
					?>
				</div>	
			</nav>
			<!--Carrousel pour le slider en page d'accueil-->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<!--Les 3 images constituant le slider-->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/viroflay4.jpg" >
					</div>
					<div class="carousel-item">
						<img src="images/viroflay5.jpg">
					</div>
					<div class="carousel-item">
						<img src="images/viroflay6.jpg">
					</div>
				</div>
				<!-- Aller à l'image d'avant -->
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<!-- Aller à l'image suivant-->
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<div class="overlay"></div>
				<div class="description">
					<h1>Bienvenue au quartier du haras de Viroflay</h1>
				</div>
			</div>
			
			<script src="scripts/jquery-3.3.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script src="scripts/main.js"></script>
	</body>
</html>