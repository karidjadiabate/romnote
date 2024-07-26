<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3c4b920158.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/inscription.css')}}">
    <style>
        .toggle-password {
            color: #4a3dbb;
            cursor: pointer;
        }
    </style>
    <title>Inscription</title>
</head>
<body>
    <div class="full-screen-div">
        <!-- Contenu de la div -->
        <div class="content-container">
            <h2 class="mb-4"><span class="logo">AKP</span> ROM-Note</h2>
            <a href="/" id="btnRetour" class="btn btn-success ml-auto">Retour</a>
        </div>
        <div class="registration">
            <form action="{{route('demandeinscription.store')}}" id="registrationForm" method="POST">
                @csrf
                <h2 class="registration-title">Inscription</h2>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-underline" name="prenom" id="firstName" placeholder="Prénom">
                        <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-underline" name="nom" id="lastName" placeholder="Nom">
                        <div class="invalid-feedback">Veuillez entrer votre nom.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-underline" name="contact" id="contact" placeholder="Contact">
                        <div class="invalid-feedback">Veuillez entrer un numéro de contact valide.</div>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control form-control-underline" name="email" id="email" placeholder="Email">
                        <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-underline" name="nometablissement" id="schoolName" placeholder="Nom de l'établissement">
                        <div class="invalid-feedback">Veuillez entrer le nom de l'établissement.</div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-underline" name="adresseetablissement" id="schoolAddress" placeholder="Adresse de l'établissement">
                        <div class="invalid-feedback">Veuillez entrer l'adresse de l'établissement.</div>
                    </div>
                </div>
                <div class="row mb-3 position-relative">
                    <div class="col-md-6 position-relative">
                        <input type="password" class="form-control form-control-underline" name="password" id="password" placeholder="Créer votre mot de passe">
                        <div class="invalid-feedback">Veuillez créer votre mot de passe.</div>
                        <i class="fas fa-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 toggle-password" data-toggle="password"></i>
                    </div>
                    <div class="col-md-6 position-relative">
                        <input type="password" class="form-control form-control-underline" name="password_confirm" id="confirmPassword" placeholder="Confirmer votre mot de passe">
                        <div class="invalid-feedback">Les mots de passe ne correspondent pas.</div>
                        <i class="fas fa-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 toggle-password" data-toggle="confirmPassword"></i>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check mr-3">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label id="et" class="form-check-label" for="rememberMe">J'ai lu et j'accepte les <a href="#">Termes et Conditions</a> <br>ainsi que la <a href="#">Politique de confidentialité</a></label>
                        <div class="invalid-feedback">Vous devez accepter les termes et conditions.</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
            </form>
        </div>
    </div>
    <!-- Inclure le fichier JavaScript -->
    <script src="{{asset('frontend/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
