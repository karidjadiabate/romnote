<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3c4b920158.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="{{asset('frontend/dashboard/css/dash.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/dashboard/css/list.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/dashboard/html/admin.css')}}">
    <title>admin</title>
</head>
<style>

</style>

<body>
    <!-- header -->
   @include('admin.include.menu')
    <!-- accueil -->
    <div class="container">
        <div class="printableArea"> 
         <h1 class="mt-4 mb-4">La liste de demande d'inscription</h1>

        
            <div class="d-flex justify-content-between mb-3">
                <!-- Search bar -->
                <form class="d-flex search-bar" role="search">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-magnifying-glass" style="margin-right: 5px; color: #A2ADCF;"></i>
                            <input type="search" id="searchInput" placeholder="Rechercher..." aria-label="Search"
                                style="border: none; outline: none;">
                        </span>
                    </div>
                </form>
                <div>
                    <button id="printBtn" class="btn btn-success mr-2" onclick="printDiv()"><i class="fa-solid fa-print"></i> Imprimer</button>

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-export dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-download "></i> Exporter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportTableToExcel()">CSV</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportTableToPDF()">PDF</a></li>
                        </ul>
                    </div>
                </div>

            </div>

             <!-- Table for listing teachers -->
            <table class="table" id="inscriptionTable">
                <thead class="table-aaa">
                    <tr class="aa">
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>nomsEtablissement</th>
                        <th>adressesEtablissement</th>
                        <th>motPasse</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody >
                    <!-- Example rows, replace with dynamic data -->
                    @foreach ($listedemandeinscriptions as $listedemandeinscription)
                    <tr>
                        <td>{{$listedemandeinscription->id}}</td>
                        <td>{{$listedemandeinscription->prenom}}</td>
                        <td>{{$listedemandeinscription->nom}}</td>
                        <td>{{$listedemandeinscription->contact}}</td>
                        <td>{{$listedemandeinscription->email}}</td>
                        <td>{{$listedemandeinscription->nometablissement}}</td>
                        <td>{{$listedemandeinscription->adresseetablissement}}</td>
                        <td>{{$listedemandeinscription->password}}</td>
                        <td class="no-print">
                                <button data-bs-toggle="modal" data-bs-target="#validateInscription"
                                    class="btn btn-outline-success btn-sm"><i class="fa-solid fa-check"></i>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#rejectInscription"
                                    class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-times"></i></button>
                            </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <!-- Pagination buttons -->
            <div class="pagination">
                <button class="prev">Précédent</button>
                <button class="next">Suivant</button>
            </div>
                
        </div>
            
    </div>
   

    <!-- Modal de Modification -->
    <!-- <div class="modal " id="editInscription" tabindex="-1" aria-labelledby="editInscriptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content " wi>
                <h1 class="text-center">Modifier</h1>
                <form class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row g-3"> -->
                            <!-- Fields for editing teacher details -->
                            <!-- <div class="col-sm-6">
                                <input type="text" class="form-control" id="editFirstName" placeholder="Nom" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div> -->

                            <!-- <div class="col-sm-6">
                                <input type="text" class="form-control" id="editLastName" placeholder="Prénoms" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="editEmail" placeholder="Email" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="editContact" placeholder="Contacts" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="editContact" placeholder="Nom Etablissement"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="editContact"
                                    placeholder="adresse Etablissement" value="" required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="editContact" placeholder="mot de passe"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn btn-success">Sauvegarder</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


    <!-- Modal de Suppression -->
    <!-- <div class="modal " id="deleteInscription" tabindex="-1" aria-labelledby="deleteInscriptionLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="../images/images.png" width="150" height="150" alt=""><br><br>
                    <p id="sure">Êtes-vous sûr?</p>
                    <p>supprimer cett demande ?</p>
                </div>
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div> -->



    <script src="{{asset('frontend/dashboard/js/list.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
