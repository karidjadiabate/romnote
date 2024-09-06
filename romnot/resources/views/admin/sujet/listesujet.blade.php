<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enseignant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons (if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- pdf & excel -->
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">


</head>


<body>
    <!-- header -->
    @include('admin.include.menu')
    <!-- accueil -->
    <div class="container">
        <div class="printableArea">
            <h2 class="text-start">Liste des enseignants</h2>
            <div class="d-flex justify-content-between align-items-center flex-wrap action-buttons mb-3 no-print">
                <div class="d-flex search-container">
                    <i class="fa fa-search"></i>
                    <input id="searchInput" type="text" id="search" class="form-control search-bar"
                        placeholder="Rechercher...">
                </div>

                <div class="d-flex justify-content-end flex-wrap">
                    <button class="btn btn-custom btn-imprimer" id="printBtn" onclick="printDiv()"><i
                            class="fa fa-print"></i> Imprimer</button>
                    <button class="btn btn-custom btn-importer" data-bs-toggle="modal" data-bs-target="#importModal"><i
                            class="fa fa-upload"></i> Importer</button>

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button class="btn btn-custom btn-exporter dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-download"></i> Exporter
                        </button>
                        <ul class="dropdown-menu" id="menu">
                            <!-- Assurez-vous que ces liens ont bien l'attribut href="#" et que onclick est correct -->
                            <li><a class="dropdown-item" id="excel" href="#"
                                    onclick="exportTableToExcel('#inscriptionTable')">Excel</a></li>
                            <li><a class="dropdown-item" id="pdf" href="#"
                                    onclick="exportTableToPDF('#inscriptionTable')">PDF</a></li>

                        </ul>
                    </div>
                    <button class="btn btn-custom btn-ajouter"
                        onclick="window.location.href='../dashboard/html/sujt.html'"><i class="fa fa-plus"></i> Creer
                        un
                        sujet</button>
                </div>


                <div class="dropdown" id="filterMenu">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-filter"></i> Filtrer par
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#"
                                data-bs-toggle="dropdown">Matière</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Matière', 'Comptabilité')">Comptabilité</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Matière', 'Physique')">Physique</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Matière', 'Chimie')">Chimie</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Classe</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Classe', 'MA1A')">MA1A</a>
                                </li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Classe', 'RHCOM1A')">RHCOM1A</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="applyFilter('Classe', 'CF2A')">CF2A</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive">
                <table id="inscriptionTable" class="table">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>Identifiant</th>
                            <th>Code</th>
                            <th>Matière</th>
                            <th>Filière</th>
                            <th>Classes</th>
                            <th>Date de création</th>
                            <th>statut</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>&nbsp;&nbsp;
                    <tbody>
                        <tr>
                            <td data-label="Identifiant">0001</td>
                            <td data-label="Code">Koffi</td>
                            <td data-label="Matière">Marc Brice</td>
                            <td data-label="Filière">KoffiMarc@gmail.com</td>
                            <td data-label="Classes">0707532281</td>
                            <td data-label="Date de création">Comptabilité</td>
                            <td data-label="statut">MA1A - RHCOM1A - CF2A - RGL1C</td>
                            <td data-label="Action" class="action-icons no-print">
                                <button data-bs-toggle="modal" data-bs-target="#editTeacher"> <i
                                        class="fas fa-eye"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#editTeacher"> <i
                                        class="fa-solid fa-print"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#editTeacher"> <i
                                        class="fa-solid fa-list"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#deleteTeacher"><i
                                        class="fa-solid fa-box-archive"></i></button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>

            <div class="pagination-container  no-print">
                <div class="pagination-info">
                    Affiche
                    <select id="rowsPerPageSelect" data-table-id="#inscriptionTable">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    de
                </div>
                <div class="pagination-buttons">
                    <button class="btn prev">‹</button>
                    <button class="btn active">1</button>
                    <button class="btn next">›</button>
                    <span id="nbr">sur 2</span>
                </div>
            </div><br>
        </div>
    </div>
    <!--  -->

    <!--  -->


    <!-- importer -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <!-- Modal Body -->
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->
                </button>
                <h1 class="modal-title fs-5 text-center" id="importModalLabel">Importer un fichier</h1>

                <form action="/path/to/your/upload/handler" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choisissez un fichier à importer</label>
                            <input type="file" class="form-control" id="fileInput" name="importedFile" required>
                            <div class="invalid-feedback">
                                Veuillez sélectionner un fichier.
                            </div>
                        </div>
                </form>

                <!-- Modal Footer -->
                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Importer</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la configuration pour ce fichier
            setTableConfig({
                'Matière': 5, // Index de la colonne "Matière"
                'Classe': 6 // Index de la colonne "Classe"
            });

            // Définir l'ID du tableau pour les fonctions de recherche et de pagination
            setTableId('#inscriptionTable');
            // Appel des fonctions de recherche et de pagination
            searchTable('#inscriptionTable tbody', 'searchInput', 'noResults');
            paginateTable('#inscriptionTable');
        });
    </script>


    </script>

    <!-- Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script>
        function loadPageContent() {
            const modalBody = document.getElementById('modalContent');

            // Charge le contenu de la page externe dans le modal
            fetch('../html/sujt.html')
                .then(response => response.text())
                .then(data => {
                    modalBody.innerHTML = data; // Remplace le contenu du modal par celui de la page externe
                })
                .catch(error => {
                    modalBody.innerHTML = 'Erreur lors du chargement de la page.';
                });
        }
        $(document).ready(function() {
            // Initialize Select2 on both select elements
            $('#select-example1').select2({
                placeholder: "Select options",
                allowClear: true,
                width: '100%'
            });

            $('#select-example2').select2({
                placeholder: "Select options",
                allowClear: true,
                width: '100%'
            });

            $('#role_id').select2({
                placeholder: "Select role",
                width: '100%',
                minimumResultsForSearch: Infinity

            });
        });
    </script>
</body>

</html>
