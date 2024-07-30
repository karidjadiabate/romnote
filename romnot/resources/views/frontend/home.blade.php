<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKP ROM-Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3c4b920158.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

</head>
<style>
     .modal-content {
        background-color: #4a3dbb;
            border-radius: 0;
            color: white;
        }
        .modal-header, .modal-body, .modal-footer {
            border: none;
        }
        .modal-body p {
            font-size: 1em;
        }
        .modal-header h1{
            font-size:20px;
            text-align:center
        }
        @media (max-width: 768px) {
        .hero-section {
            flex-direction: column;
            text-align: center;
        }

        .item-left,
        .item-right {
            width: 100%;
            margin-bottom: 20px;
        }
    }
      
</style>

<body>

    <header class="navbar navbar-expand-lg fixed-top">
        <!-- <nav class="navbar navbar-expand-lg fixed-top"> -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AKP <span>ROM-Note</span></a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('nostarifs')}}">Nos tarifs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact">Contactez-nous</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="{{route('login')}}" id="btnlogin" class="btn btn-outline-success btn-no-rounded"
                        type="submit">Connexion</a>
                </form>
            </div>
        </div>
        </nav>
    </header>

   
    <div class="pt-5 text-center">

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
</div>

<!--  -->
<section class="hero-section">

        <img src="{{asset('frontend/img/Fichier 6@9x.png')}} " alt="Foreground Image" class="foreground-image active">
        <img src="{{asset('frontend/img/ste.png')}} " alt="Foreground Image" class="foreground-image">
        <img src="{{asset('frontend/img/ti.png')}} "alt="Foreground Image" class="foreground-image">
        <div class="content">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, eveniet?</p>
            <form class="d-flex mb-3">
                <a href="{{route('demandeinscription')}}" id="btnInscription" type="submit"
                            class="btn btn-custom">Inscrivez-vous</a>
                <a href="#demo" class="btn btn-outline-success btn-no-rounded">
                    <i class="fa-solid fa-play" style="color: #f8f9fc; margin-right: 2px;"></i> Regardez un démo
                </a>
            </form>
        </div>
        <div class="bouton">
            <span class="btn-small" data-index="0"></span>
            <span class="btn-small" data-index="1"></span>
            <span class="btn-small" data-index="2"></span>
        </div>
    </section>
    <!--  -->
  
    <section class="feature-section text-center">
        <div class="container">
            <h2 id="feature-heading">AKP ROM Note en bref</h2><br><br>
            <div class="row mb-3 feature-row">
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/securite.png')}}" alt="Sécurisation des evaluations">
                    <h5 class="feature-heading">Sécurisation des evaluations</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/temps.png')}}" alt="Gain de temps">
                    <h5 class="feature-heading">Gain de temps</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/feedback.png')}}" alt="Feedback rapide">
                    <h5 class="feature-heading">Feedback rapide</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/objectif.png')}}" alt="Objectivité">
                    <h5 class="feature-heading">Objectivité</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/erreur.png')}}" alt="Reduction de la marge d’erreur">
                    <h5 class="feature-heading">Reduction de la marge d’erreur</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('frontend/img/resultats.png')}}" alt="Accès aux résultats">
                    <h5 class="feature-heading">Accès aux résultats</h5>
                </div>
                <div class="row justify-content-center text-align-center">
                    <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#essai">Demander un essai gratuit</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="essai" tabindex="-1" aria-labelledby="essaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-center" id="essaiLabel">Bienvenue sur<a class="navbar-brand" href="#"> AKP <span>ROM-Note</span></a></h1>
                </div>
                <div class="modal-body text-start"> 
                    <p>Inscrivez-vous dès maintenant pour profiter de notre essai gratuit exclusif et découvrir toutes les fonctionnalités incroyables que Romnote a à offrir. Ne manquez pas cette opportunité de transformer votre expérience d'apprentissage !</p>
                </div>
                <div class="modal-footer justify-content-center">
                <form class="d-flex mb-3">
                <a href="{{route('demandeinscription')}}" id="btnInscription" type="submit"
                            class="btn btn-custom">Inscrivez-vous</a>
                
            </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->



    <section id="demo" class="video-section">
        <video class="bg-video" autoplay muted loop>
            <source src="{{asset('frontend/img/demo.mp4')}}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </section>
    <section class="trusted-partners py-5">
        <div class="container text-center">
            <h2 class="mb-5 title-hover">Ils nous font confiance</h2>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <!-- Première ligne avec 5 images -->
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/esatic.png')}}" alt="Logo 1" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/Fupa.png')}}" alt="Logo 2" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/inphb.png')}}" alt="Logo 3" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/logo-iua.png')}}" alt="Logo 4" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/logo-pg.png')}}" alt="Logo 5" class="img-fluid">
                    </div>
                    <!-- Deuxième ligne avec 5 images -->
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/logo-UFHB.png')}}" alt="Logo 6" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/Logo.png')}}" alt="Logo 7" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/UNIVERSITE-NORD-SUD-.png')}}" alt="Logo 8" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/UCAO.UUA_.png')}}" alt="Logo 9" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-2 mb-4 d-flex justify-content-center">
                        <img src="{{asset('frontend/img/Loko.png')}}" alt="Logo 10" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="contact" class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-info mb-3 mb-md-0">
                    <h2><span>AKP</span> ROM-Note</h2>
                    <p>La reconnaissance optique de marques (ROM) permet de collecter des données sur les personnes en
                        identifiant des marques sur un papier. Elle permet le traitement horaire de centaines, voire de
                        milliers de documents.</p>
                </div>
                <div class="col-md-4 logo-info mb-3 mb-md-0 mx-auto">
                    <h2 class="text-start">Nos autres solutions:</h2>
                    <div class="row ">
                        <div class="col-6 "><img  src="{{asset('frontend/img/logo boodruch 2.png')}}" alt="KPANY" class="img-fluid"></div>
                        <div class="col-6 mb-3"><img src="{{asset('frontend/img/familia pro.png')}}" alt="KPANY" class="img-fluid"></div>
                        <div class="col-6 mb-3"><img src="{{asset('frontend/img/Log1.png')}}" alt="FEMILIA" class="img-fluid"></div>
                        <div class="col-6 mb-3"><img src="{{asset('frontend/img/Log4.png')}}" alt="VEMISTERS" class="img-fluid"></div>
                        <div class="col-6 mb-3"><img src="{{asset('frontend/img/bodruch.png')}}" alt="BODRUCH" class="img-fluid"></div>
                    </div>
                </div>
                <div class="col-md-4 contact-info mb-3 mb-md-0">
                    <h2>Nos contacts</h2>
                    <p><i class="fas fa-map-marker-alt"></i> Riviera Palmeraie, Fin de la rue Rose Marie Guiraud, SIPIM
                        1 Abidjan, Côte d'Ivoire</p>
                    <p><i class="fas fa-phone-alt"></i> +225 27-22-23-52-15</p>
                    <p><i class="fas fa-phone-alt"></i> +225 05-46-35-22-31</p>
                    <p><i class="fas fa-envelope"></i> infos@akpany.ci</p>
                    <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-bottom">
        <div class="container">
            <p>© 2024 Tous Droits Réservés. AKPANY, Software & Media Solution</p>
        </div>
    </section>

    
    <script>
        $(document).ready(function() {
            $('#essai').modal('show');
        });
    </script>
    <script src="{{asset('frontend/js/landing.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
