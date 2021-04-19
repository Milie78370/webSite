<!DOCTYPE html>
<html lang="fr">
  <head>

    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/insertionObjet.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

  </head>
	<body>
	
	<!-- Creation d'une session pour l'utilisateur -->
	<!-- si l'utilisateur n'est pas bon alors il reste sur la même page sinon il a accès aux différentes fonctionnalités de la page c'est à dire :
	Menu,recherche,contact,profil,etc ... 
	-->
	<?php
		session_start();
		if(!(isset($_SESSION['user_connexion']))){
		?>
		
		<!-- le menu de navigation -->
		
		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand" href="#">Menu</a>
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<i class="bi bi-house-fill">
							<a class="nav-link" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
							</svg> Accueil</a>
							</i>
						</li>
						<li class="nav-item">
							<i class="bi bi-person-lines-fill">
								<a class="nav-link" href="contact.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
									<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
									</svg>  Contact</a>
							</i>
						</li>
					</ul>
				</div>
		</nav>
		
		<?php
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
		<?php
		}
		?>
		<!-- Création d'un formulaire -->
		
		<div class='container'>
		
			<h1>Contacter l'administrateur</h1>

			<form class='row g-3' action='contact.php' method='post'>
			
				<div class="col text-center">
			
					<div class="w-50">
				
						<label class="form-label-insertion" >Nom</label>
						<input class="form-control" name="nom" type="text">
		  
						<label class="form-label-insertion" >Prénom</label>
						<input class="form-control" name="prenom" type="text">

						<label class="form-label-insertion" >Email</label>
						<input class="form-control" name="mail" type="mail">

						<label class="form-label-insertion" >Objet</label>
						<input class="form-control" name="objet" type="text">

						<label class="form-label-insertion">Message</label>
						<textarea type="text" name="message"  class="form-control" ></textarea>
						<br/>
					
						<button type='submit' class="btn btn-primary"name='envoyerMessage'>Envoyer</button>
					</div> 
				</div>
			</form>
		</div>
		
		<?php
		
		
		if(isset($_POST['envoyerMessage'])){
				   
			

			$destinataire = $_POST['mail'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$to      = 'webmaster@example.com';
			$subject = $_POST['objet'];
			$message = $_POST['message'];
			
			$headers = 'De: webmaster@example.com' . "\r\n" .
            'Reponse à: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            $texte_du_mail= "De:".$destinataire.": \n".$nom." ".$prenom." vous a envoyé un message suivant: \n"+$message;

            mail($to, $subject, $texte_du_mail, $headers);

		 
		}
	   
		?>
        <!-- Les scripts utilisés -->
        <script src="scripts/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="scripts/main.js"></script>
	</body>
</html>
