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
    <script src="{{asset('frontend/dashboard/js/list.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/dashboard/css/dash.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/dashboard/css/list.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/dashboard/html/admin.css')}}">
    <title>matiere</title>
</head>
<style>
    .modal-content {
        border-radius: 0%;
    }

    .modal-content p {
        font-size: 10px;

    }

    .btn-danger {
        border-radius: 0%;
    }

    .btn-secondary,
    .btn-success {
        border-radius: 0%;
    }

    .form-control:focus {
        box-shadow: none;
        outline: none;
    }

    #sure {
        font-size: 14px;
        color: darkgray;
    }

    /* #editTeacher {
        width: 100px;
        height: 100px;
    } */
</style>

<body>
    <!-- header -->
    @include('admin.include.menu')

    <!-- accueil -->
    <div class="container">
        <div class="printableArea">
            <h1 class="mt-4 mb-4 text-center">Liste des matières</h1>

            <!-- Action buttons -->
            <div class="d-flex justify-content-between mb-3 no-print">
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
                    <button id="printBtn" class="btn btn-success mr-2" onclick="printDiv()"><i
                            class="fa-solid fa-print"></i> Imprimer</button>
                    <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#importModal"><i
                            class="fa-solid fa-upload"></i> Importer</button>
                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-export dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-download "></i> Exporter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"
                                    onclick="exportTableToExcel('#matiereTable')">Excel</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportTableToPDF('#matiereTable')">PDF</a>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-ajout mr-2" data-bs-toggle="modal" data-bs-target="#addMatiere"><i
                            class="fa-solid fa-plus"></i> Ajouter une matière</button>
                </div>
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-filter"></i> Filtrer par
                    </button>
                    <ul class="dropdown-menu" id="filterMenu">
                        <li class="dropdown-header">Matière</li>
                        <li><a class="dropdown-item" href="#" onclick="filterTable('Comptabilité')">Comptabilité</a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="filterTable('Économie')">Économie</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterTable('Informatique')">Informatique</a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="filterTable('')">Toutes les matières</a></li>
                    </ul>
                </div> -->

            </div>
            <div id="noResults">Aucun résultat trouvé</div>
            <!-- Table for listing teachers -->
            <table class="table" id="matiereTable">
                <thead class="table-aaa">
                    <tr class="aa">
                        <th>#</th>
                        <th>Nom de la Matière</th>
                        <th class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody id="matiereTables">
                    <!-- Example rows, replace with dynamic data -->
                    @php
                        $num = 1;
                    @endphp
                    @foreach ($matieres as $matiere)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $matiere->nommatiere }}</td>
                        <td class="no-print">
                            <button class="btn btn-outline-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#editMatiere{{$matiere->id}}"
                                data-id="{{$matiere->id}}"
                                data-nommatiere="{{$matiere->nommatiere}}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deletematiere{{$matiere->id}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>


                     <!-- Modal de Modification -->
                    <div class="modal " id="editMatiere{{$matiere->id}}" tabindex="-1" aria-labelledby="editMatiereLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content " wi>
                                <h1 class="text-center">Modifier</h1>
                                <form action="{{route('matiere.update', $matiere->id)}}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <!-- Fields for editing teacher details -->
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="nommatiere" placeholder="Nom Etablissement" value="{{$matiere->nommatiere}}" required>

                                                <div class="invalid-feedback">
                                                    Valid last name is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal de Suppression -->
                    <div class="modal " id="deleteMatiere{{$matiere->id}}" tabindex="-1" aria-labelledby="deleteMatiereLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img src="{{asset('frontend/dashboard/images/images.png')}}" width="150" height="150" alt=""><br><br>
                                    <p id="sure">Êtes-vous sûr?</p>
                                    <p>supprimer cette matière ?</p>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <form action="{{route('matiere.destroy', $matiere->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach

                </tbody>
            </table>

            <!-- Pagination buttons -->
            <div class="pagination no-print">
                <button class="prev">Précédent</button>
                <button class="next">Suivant</button>
            </div>
        </div>
    </div>

    <!-- Modal for importing a file -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/path/to/your/upload/handler" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5 text-center" id="importModalLabel">Importer un fichier</h1>
                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choisissez un fichier à importer</label>
                            <input type="file" class="form-control" id="fileInput" name="importedFile" required>
                            <div class="invalid-feedback">
                                Veuillez sélectionner un fichier excel.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Importer</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal ajout -->

    <div class="modal " id="addMatiere" tabindex="-1" aria-labelledby="addMatiereLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content " wi>
                <h1 class="text-center">Ajouter</h1>
                <form action="{{route('matiere.store')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <input type="text" name="nommatiere" class="form-control" id="editLastName"
                                    placeholder="Nom de la Matière" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            searchTable('#matiereTables', 'searchInput', 'noResults');
            paginateTable('#matiereTable');
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
