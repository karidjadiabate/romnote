@extends("frontend.layout")

@section("title", "AKP ROM-note")

@section("content")
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-around">

      <div class="logo">
        <h1 class="text-light logo-text"><a href="{{ route('home') }}"><span class="navbar-title">AKP</span> <span>ROM-Note</span></a></h1>
      </div>

      <nav class="nav-menu  d-none d-lg-block">
          
        <ul>
          <li><a href="{{ route('home') }}">Accueil</a></li>
          <li><a href="{{ route('nostarifs') }}">Nos tarifs</a></li>
          <li><a href="#footer">Contactez-nous</a></li>
          <li class="conn-link-mobile" style="display:none;padding: 10px 20px;"><button class="btn-conn"><a  href="{{ route('login') }}">Connexion</a></button></li>
        </ul>

      </nav><!-- .nav-menu -->
      <span class="float-right">
        <button class="btn-conn conn-link"><a href="{{ route('login') }}">Connexion</a></button>
      </span>

    </div>
  </header><!-- End Header -->
<section class="head-content">
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center mt-5">
      <div class="col-md-12 d-flex justify-content-around align-items-center">
     <div class="row col-md-12 d-flex justify-content-around align-items-center">
         
    <div class="col-md-6 text-head d-flex justify-content-end">
      <div class="text-car w-75 d-flex align-items-center justify-content-start text-start flex-column">
        <h1 class="title-head w-100">Lorem ipsum dolor sit amet.</h1>
        <p class="text-carousel">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
        <form class="d-flex mb-3">
            <a href="{{ route('demandeinscription') }}" id="btnInscription" type="submit"
                class="btn btn-custom">Inscrivez-vous</a>
            <a href="#demo" class="btn btn-video">
                <i class="fa-solid fa-play"></i> Regardez un démo
            </a>
        </form>
      </div>
    </div>
    
    <div id="heroCarousel" class="col-md-6">
      <span class="circle"></span>
        <div class="owl-carousel testimonials-carousel">
              <!-- Slide 1 -->
        <div class="item active" data-slide-item="0">
          <div class="carousel-container">
            <p class="img-carousel animated fadeInUp" style="margin-top: 7.5rem;"><img src="{{ asset('assets/img/Prof.png') }}" alt="User 1" srcset=""></p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="item"  data-slide-item="1">
          <div class="carousel-container">
            <p class="animated fadeInUp"  style="margin-top: 7.5rem;"><img src="{{ asset('assets/img/Student_2.png') }}"  alt="User 2" srcset=""></p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="item"  data-slide-item="2">
          <div class="carousel-container">
            <p class="animated fadeInUp" style="margin-top: 7.5rem;"><img src="{{ asset('assets/img/Scanner.png') }}" height="450" width="auto" alt="Imprimante" srcset=""></p>
          </div>
        </div>
      </div>
       <ol class="carousel-indicators col-md-12 d-flex justify-content-center">
         <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
         <li data-target="#customCarousel1" data-slide-to="1"></li>
         <li data-target="#customCarousel1" data-slide-to="2"></li>
      </ol>
  </div>
  </div>         
</div>

  </section><!-- End Hero -->
      <img src="{{ asset('assets/img/Bottom.png') }}" class="img-sect" alt="bande" srcset="">
</section>

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services mt-5 mb-4">
      <div class="container">
          <div class="row feature-row">
            <div class="col-md-12 d-flex align-items-center justify-content-center mb-4"><h2 class="feature-title">AKP ROM Note en bref</h2></div>
            
            <div class="row mb-3">
              <div class="col-12 col-sm-6 col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/securite.png') }}" alt="Sécurisation des evaluations">
                <h5 class="feature-heading">Sécurisation des evaluations</h5>
            </div>
            <div class="col-12 col-sm-6 col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/temps.png') }}" alt="Gain de temps">
                <h5 class="feature-heading">Gain de temps</h5>
            </div>
            <div class="col-12  col-sm-6 col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/feedback.png') }}" alt="Feedback rapide">
                <h5 class="feature-heading">Feedback rapide</h5>
            </div>
            <div class="col-12  col-sm-6 col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/objectif.png') }}" alt="Objectivité">
                <h5 class="feature-heading">Objectivité</h5>
            </div>
            <div class="col-12 col-sm-6 col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/erreur.png') }}" alt="Reduction de la marge d’erreur">
                <h5 class="feature-heading">Reduction de la marge d’erreur</h5>
            </div>
            <div class="col-12 col-sm-6  col-md-4 text-center mb-2">
                <img src="{{ asset('assets/img/resultats.png') }}" alt="Accès aux résultats">
                <h5 class="feature-heading">Accès aux résultats</h5>
            </div>
            </div>
            <div class="row col-md-12 d-flex align-items-center justify-content-center mb-3">
                <button href="#" class="btn btn-essai mt-3" type="button" data-toggle="modal" data-target="#exampleModalCenter">Demander un essai gratuit</button>
            </div>
        </div>
     </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <video class="bg-video" autoplay muted loop>
          <source src="{{ asset('assets/video/demo.mp4') }}" type="video/mp4">
        </video>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">
        <div class="row d-flex justify-content-center">
             <!-- Prémière ligne avec 5 images -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex align-items-center">
            <img src="{{ asset('assets/img/universite/logo-pg.png') }}"  height="100" width="auto" alt="Logo 5">
        </div>
        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center  justify-content-center">
            <img src="{{ asset('assets/img/universite/logo-iua.png') }}" alt="Logo 4">
        </div>
        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center  justify-content-center">
            <img src="{{ asset('assets/img/universite/logo-UFHB.png') }}" alt="Logo 6">
        </div>
        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center  justify-content-center">
            <img src="{{ asset('assets/img/universite/UNIVERSITE-NORD-SUD-.png') }}"  height="180" width="auto" alt="Logo 8">
        </div>
        <div class="col-12 col-sm-6 col-md-2 mb-4  d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/universite/Fupa.png') }}"  alt="Logo 2">
        </div>
                <!-- Deuxième ligne avec 5 images -->
        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/universite/Loko.png') }}" alt="Logo 10">
        </div>
        
        <div class="col-12 col-sm-6 mb-4 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/universite/Logo.png') }}" alt="Logo 7">
        </div>

        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/universite/UCAO.UUA_.png') }}" alt="Logo 9">
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/universite/esatic.png') }}" height="100" width="auto" alt="Logo 1">
        </div>

        <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex align-items-center">
            <img src="{{ asset('assets/img/universite/inphb.png') }}" alt="Logo 3" class="img-fluid">
        </div>
        </div>
      </div>
      
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top mb-3">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">
                <!-- Première colonne -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h3><span>AKP</span> ROM-Note</h3>
                    <p>La reconnaissance optique de marques (ROM) permet de collecter des données sur les personnes en
                        identifiant des marques sur un papier. Elle permet le traitement horaire de centaines, voire de
                        milliers de documents.</p>
                </div>

                <!-- Deuxième colonne -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h3 class="text-start">Nos autres solutions</h3>
                    <ul class="list-unstyled col-12 col-sm-12 col-mm-12 d-flex flex-wrap justify-content-start">
                        <li class="col-12 col-sm-6 col-md-4 col-md-6 text-center mb-2">
                            <a href="#"><img src="{{ asset('assets/img/footer/akpany.png') }}" height="30" width="auto" alt="AKPANY"></a>
                        </li>
                        <li class="col-12 col-sm-6 col-6 col-md-6 text-center mb-2">
                            <a href="#"><img src="{{ asset('assets/img/footer/familia pro.png') }}" height="30" width="auto" alt="KPANY"></a>
                        </li>
                        <li class="col-12 col-sm-6 col-6 col-md-6 text-center mb-2">
                            <a href="#"><img src="{{ asset('assets/img/footer/Log1.png') }}" height="30" width="auto" alt="FAMILIA Pro"></a>
                        </li>
                        <li class="col-12 col-sm-6 col-md-6 text-center mb-2">
                            <a href="#"><img src="{{ asset('assets/img/footer/Log4.png') }}" height="30" width="auto" alt="VEMASTERS"></a>
                        </li>
                        <li class="col-12 col-sm-6 col-6 col-md-6 text-center mb-2">
                            <a href="#"><img src="{{ asset('assets/img/footer/logo boodruch 2.png') }}" height="30" width="auto" alt="BODRUCH"></a>
                        </li>
                    </ul>
                </div>

                <!-- Troisième colonne -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <h3>Nous contacter</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Riviera Palmeraie, Fin de la rue Rose Marie Guiraud, SIPIM 1 Abidjan, Côte d'Ivoire.<br>
                        <strong><i class="fas fa-phone-alt"></i></strong> +225 27-22-23-52-15<br>
                        <strong><i class="fas fa-phone-alt"></i></strong> +225 05-46-35-22-31<br>
                        <strong>Email:</strong> info@akpany.ci<br>
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="copyright">
        <p>© 2024 Tous Droits Réservés. AKPANY, Software & Media Solution</p>
      </div>
    </div>
  </footer><!-- End Footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"><span class="navbar-title">AKP</span> ROM-Note</h5>
          <p class="modal-title h6 font-weight-bold">Essayez ROM-Note gratuitement</p>
        </div>
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre nom et prenom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre établissement">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entez votre email">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre numéro de telephone">
          </div>
          <div class="form-group">
            <input type="checkbox" id="exampleInputEmail1"> <span style="color: #4a3dbb;">J'ai lu et j'accepte les Termes et conditions ainsi que la <a href="" style='text-decoration: underline;color: #4a3dbb;'>Politique de confidentialité.</a> </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-md-12 d-flex justify-content-center">
          <button type="button" class="btn btn-save-essai  w-100">Demander un essai gratuit</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
