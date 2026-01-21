<?php
// Fichier: login.php

// Démarrer une session PHP pour "se souvenir" de l'utilisateur.
session_start();

// Inclure nos informations de configuration
require_once 'config.php';

// Si l'utilisateur est déjà connecté, le rediriger vers le tableau de bord.
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error_message = '';

// Vérifier si le formulaire a été soumis (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier si l'identifiant est correct ET si le mot de passe correspond au hash.
    if ($username === VALID_USERNAME && password_verify($password, PASSWORD_HASH)) {
        // Le mot de passe est correct !
        
        // On enregistre dans la session que l'utilisateur est connecté.
        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;

        // Rediriger vers la page du tableau de bord.
        header("Location: dashboard.php");
        exit;
    } else {
        // Identifiants incorrects.
        $error_message = 'Identifiant ou mot de passe incorrect.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion Espace Membre - MAVANA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start : COPIÉE DEPUIS INDEX.HTML ET ADAPTÉE -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
			<div class="col-lg-6 px-5 text-start">
				<small><i class="fa fa-map-marker-alt me-2"></i>Intervention : Manambato-Vavony, Madagascar (Siège : Sainte-Marie, La Réunion)</small>
				<small class="ms-4"><i class="fa fa-phone me-2"></i>+262 693 10 58 36</small>
			</div>
            <div class="col-lg-6 px-5 text-end">
                <small>Plus d'infos sur l'association :</small>
                <a class="text-white-50 ms-3" href="https://facebook.com/associationmavana" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href="https://twitter.com/asso_mavana" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="text-white-50 ms-3" href="https://www.linkedin.com/company/mavana" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="text-white-50 ms-3" href="https://www.instagram.com/association_mavana" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <img src="img/logo-mavana.png" alt="Logo Association MAVANA" style="height: 50px;">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <!-- MODIFIÉ : la classe "active" est enlevée et les liens pointent vers index.html -->
                    <a href="index.html" class="nav-item nav-link">Accueil</a>
                    <a href="index.html#section-apropos" class="nav-item nav-link">À propos</a>
                    <a href="index.html#section-event" class="nav-item nav-link">Nos actions</a>
                    <a href="index.html#section-contact" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <!-- MODIFIÉ : Le bouton "Espace Adhérent" est remplacé par un bouton "Retour à l'accueil" -->
                    <a class="btn btn-outline-primary py-2 px-3" href="index.html">
                        Retour à l'accueil
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Login Form Start -->
    <!-- Le style "margin-top" est utile pour décaler le contenu sous la navbar fixe -->
    <div class="container-xxl py-5" style="margin-top: 100px; margin-bottom: 50px;">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-6 col-md-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center mx-auto mb-5">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Espace Membre</div>
                        <h1 class="display-6 mb-5">Connexion des adhérents</h1>
                    </div>
                    <div class="bg-light rounded p-4 p-sm-5 shadow-sm">
                        <!-- Le formulaire envoie ses données à cette même page (login.php) en méthode POST -->
                        <form action="login.php" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="username" name="username" placeholder="Identifiant" required>
                                        <label for="username">Identifiant</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0" id="password" name="password" placeholder="Mot de passe" required>
                                        <label for="password">Mot de passe</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary py-3 px-5" type="submit">
                                        Se connecter
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                                <?php if (!empty($error_message)): ?>
                                    <div class="col-12 text-center text-danger mt-3">
                                        <?php echo htmlspecialchars($error_message); // Sécurisation de l'affichage ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
    
    <!-- Footer Start : COPIÉ DEPUIS INDEX.HTML ET ADAPTÉ -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">ASSOCIATION <span class="text-white">MAVANA</span></h1>
                    <p>Agir pour un avenir durable à Manambato-Vavony, Madagascar, par le sport, l'éducation et la préservation de la nature.</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href="https://twitter.com/asso_mavana" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href="https://facebook.com/associationmavana" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="https://youtube.com/@associationmavana" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href="https://www.linkedin.com/company/mavana" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Coordonnées</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Siège : 48 bis rue MANES, 97438 Sainte-Marie, La Réunion (France)</p>
                    <p><i class="fa fa-flag me-3"></i>Zone d'intervention : Manambato-Vavony, Madagascar</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+262 693 10 58 36</p>
                    <p><i class="fa fa-envelope me-3"></i><a href="mailto:contact@association-mavana.org">contact@association-mavana.org</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Accès rapide</h5>
                    <!-- MODIFIÉ : Liens pointant vers index.html -->
                    <a class="btn btn-link" href="index.html#section-apropos">Qui sommes‑nous</a>
                    <a class="btn btn-link" href="index.html#section-event">Nos actions</a>
                    <a class="btn btn-link" href="index.html#section-contact">Contact</a>
                    <a class="btn btn-link" href="login.php">Espace adhérent</a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        © <span id="year"></span> Association MAVANA (Manambato Vavony Nature) – Tous droits réservés.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // Mise à jour automatique de l'année dans le footer
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>