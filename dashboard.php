<?php
// Fichier: dashboard.php

// Démarrer la session pour accéder aux variables
session_start();

// Définissez ici le nom d'utilisateur qui aura les droits spéciaux
define('VALID_USERNAME', 'bureau');


// ---- C'EST LE GARDE DU CORPS ! ----
// Si la variable de session 'is_logged_in' n'existe pas ou n'est pas 'true',
// alors l'utilisateur n'est pas connecté. On le renvoie vers la page de login.
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit; // Il est crucial de stopper l'exécution du script ici.
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Tableau de Bord - Association MAVANA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <!-- Mêmes balises que sur les autres pages pour la cohérence -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <!-- Navbar du Tableau de Bord -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
         <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <img src="img/logo-mavana.png" alt="Logo Association MAVANA" style="height: 50px;">
                <span class="ms-2 d-none d-sm-inline text-white-50">Espace Administration</span>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapseDashboard">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapseDashboard">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                     <!-- Message de bienvenue -->
                    <div class="nav-item nav-link text-white-50 pe-4">
                        Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </div>
                     <!-- Le lien de déconnexion pointe vers logout.php -->
                    <a href="logout.php" class="btn btn-outline-primary py-2 px-3">
                        Déconnexion
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-sign-out-alt"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    
    <!-- Contenu du Tableau de Bord -->
    <div class="container-xxl py-5" style="margin-top: 100px;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Tableau de Bord</div>
                <h1 class="display-5 mb-5">Centre de Gestion MAVANA</h1>
            </div>

            <!-- Cartes de fonctionnalités -->
            <div class="row g-4 justify-content-center">

                <!-- Carte 1: Gestion Événementielle -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5 shadow-sm">
                        <div class="icon-container mb-4">
                            <i class="bi bi-calendar-check text-primary display-4"></i>
                        </div>
                        <h4 class="mb-3">Gestion Événementielle</h4>
                        <p class="mb-4">Suivi et gestion des inscriptions du prochain évènement.</p>
                        <a href="https://forms.gle/TrcLHhSPCsc3kjcB9" target="_blank" class="btn btn-outline-primary mt-2 w-100">Lien vers le formulaire d'inscription</a>
                        <a href="https://docs.google.com/spreadsheets/d/1yQhApenBTWQEjQ8X9PM7oE1UG_-jSFh9xF11at2IM44/edit?usp=sharing"  target="_blank" class="btn btn-primary mt-2 w-100">Consulter la liste des inscrits (Excel)</a>
                    </div>
                </div>

                <!-- Carte 2: Documents de l'Association -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5 shadow-sm">
                        <div class="icon-container mb-4">
                            <i class="bi bi-file-earmark-text text-primary display-4"></i>
                        </div>
                        <h4 class="mb-3">Documents de l'Association</h4>
                        <p class="mb-4">Accès rapide aux documents officiels et administratifs.</p>
                        <!-- Pour que ce lien fonctionne, créez un dossier "docs" et mettez-y votre PDF -->
                        <a href="docs/statuts-mavana.pdf" target="_blank" class="btn btn-outline-primary mt-2 w-100">Télécharger les Statuts (PDF)</a>
                        
                    </div>
                </div>

                <!-- Carte 3: Communication -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5 shadow-sm">
                        <div class="icon-container mb-4">
                            <i class="bi bi-people-fill text-primary display-4"></i>
                        </div>
                        <h4 class="mb-3">Centre de communication</h4>
                        <p class="mb-4">Gestion des outils de communication interne.</p>
                        <a href="https://id.ionos.fr/identifier?client_app=IONOSMAIL" target="_blank" class="btn btn-outline-primary mt-2 w-100">Accès webmail</a>
						
						<?php if (isset($_SESSION['username']) && $_SESSION['username'] === VALID_USERNAME): ?>
							<div class="text-start mt-4">
								<p class="mb-2"><strong>Mail :</strong> contact@association-mavana.org</p>
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<strong class="me-2">Mot de passe :</strong>
										<code id="webmail-password" data-password="Manambato2025!">************</code>
									</div>
									<button type="button" id="toggle-password-btn" class="btn btn-sm btn-outline-secondary" title="Afficher/Masquer le mot de passe">
										<i id="toggle-password-icon" class="bi bi-eye-slash"></i>
									</button>
								</div>
							</div>
						<?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contenu du Tableau de Bord Fin -->

    <!-- Footer Start : Identique aux autres pages -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <!-- ... (Contenu du footer copié de login.php) ... -->
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-12 text-center">
                    <h1 class="fw-bold text-primary mb-4">ASSOCIATION <span class="text-white">MAVANA</span></h1>
                    <p>Vous êtes dans l'espace d'administration de l'association.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        © <span id="year"></span> Association MAVANA – Tous droits réservés.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                       <a href="index.html" class="text-white-50">Retour au site public</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JS Libraries et Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>