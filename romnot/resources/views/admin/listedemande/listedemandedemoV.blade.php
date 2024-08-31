<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enseignant</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons (if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- pdf & excel -->
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/lists.css') }}">
    <title>demande_demo</title>

</head>

<style>
    /* .btn-outline-success,
    .btn-success,
    .btn-outline-danger,
    .btn-danger {
        border-radius: 50% !important;
        border: 2px solid;
        white: 30px;
        height: 30px;
        display: flex
    } */
</style>

<body>
    <!-- header -->
    @include('admin.include.menu')
    <!-- accueil -->
    <div class="container">
        <div class="printableArea">
            <h2 class="text-start">La liste de demande de demo</h2>
            <div class="d-flex justify-content-between align-items-center flex-wrap action-buttons mb-3 no-print">
                <div class="d-flex search-container" id="recherche">
                    <i class="fa fa-search"></i>
                    <input id="searchInput" type="text" id="search" class="form-control search-bar"
                        placeholder="Rechercher...">
                </div>

                <div class="d-flex justify-content-end flex-wrap action-buttons ">
                    <button class="btn btn-custom btn-imprimer" id="printBtn" onclick="printDiv()"><i
                            class="fa fa-print"></i> Imprimer</button>
                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button class="btn btn-custom btn-exporter dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-download"></i> Exporter
                        </button>
                        <ul class="dropdown-menu" id="menu">
                            <!-- Assurez-vous que ces liens ont bien l'attribut href="#" et que onclick est correct -->
                            <li><a class="dropdown-item" id="excel" href="#"
                                    onclick="exportTableToExcel('#demoTable')">Excel</a></li>
                            <li><a class="dropdown-item" id="pdf" href="#"
                                    onclick="exportTableToPDF('#demoTable')">PDF</a></li>

                        </ul>
                    </div>

                </div>





            </div>
            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive">
                <table id="demoTable" class="table">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>Identifiant</th>
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>noms de l'Etablissement</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>&nbsp;&nbsp;
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($listedemandemos as $listedemandemo)
                            <tr>
                                <td data-label="Identifiant">{{ $num++ }}</td>
                                <td data-label="date">{{ $listedemandemo->created_at->format('d/m/Y') }}</td>
                                <td data-label="nom">{{ $listedemandemo->nom }}</td>
                                <td data-label="prenoms">{{ $listedemandemo->prenom }}</td>
                                <td data-label="contact">{{ $listedemandemo->numerotel }}</td>
                                <td data-label="email">{{ $listedemandemo->email }}</td>
                                <td data-label="etablissement">{{ $listedemandemo->nometablissement }}</td>
                                <td data-label="Action" style="display: flex">
                                    @if (!$listedemandemo->accepted && !$listedemandemo->rejected)
                                        <button data-id="{{ $listedemandemo->id }}" data-bs-toggle="modal"
                                            data-bs-target="#acceptModal"
                                            class="btn btn-outline-success btn-sm btn-accept">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button data-id="{{ $listedemandemo->id }}" data-bs-toggle="modal"
                                            data-bs-target="#rejectModal"
                                            class="btn btn-outline-danger btn-sm btn-reject">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    @elseif ($listedemandemo->accepted)
                                        <button class="btn btn-success btn-sm" disabled>
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    @elseif ($listedemandemo->rejected)
                                        <button class="btn btn-danger btn-sm" disabled>
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    @endif
                                </td>


                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

            <div class="pagination-container  no-print">
                <div class="pagination-info">
                    Affiche
                    <select id="rowsPerPageSelect" data-table-id="#demoTable">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
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
                    <span>sur 2</span>
                </div>
            </div><br>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <!-- Modal  accept-->
    <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->

                <!-- Modal Body -->
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->
                </button>
                <h1 class="modal-title fs-5 text-center" id="acceptModalLabel">Accepter la demande</h1>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir accepter cette demande et créer l'établissement ?
                </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-success"id="confirmAccept">Accepter</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>

    <!--  -->


    <!-- modal refus  -->
    <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->

                <!-- Modal Body -->
                <button type="button" class="custom-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i> <!-- Font Awesome close icon -->
                </button>
                <h1 class="modal-title fs-5 text-center" id="acceptModalLabel">Accepter la demande</h1>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir refuser cette demande ?
                </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-success"id="confirmReject">Refuser</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
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
            setTableId('#demoTable');
            searchTable('#demoTable tbody', 'searchInput', 'noResults');
            paginateTable('#demoTable');
        });
    </script>


    </script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            let selectedId = null;

            const routeAccept = '{{ route('demo.accept', ['id' => 'ID']) }}';
            const routeReject = '{{ route('demo.reject', ['id' => 'ID']) }}';

            function setSelectedId(id) {
                selectedId = id;
            }

            // Gestionnaires d'événements pour les boutons "accepter" et "rejeter"
            $(document).on('click', '.btn-accept', function() {
                const id = $(this).data('id');
                setSelectedId(id);
            });

            $(document).on('click', '.btn-reject', function() {
                const id = $(this).data('id');
                setSelectedId(id);
            });

            $('#confirmAccept').on('click', function() {
                if (selectedId) {
                    $.ajax({
                        url: routeAccept.replace('ID', selectedId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#acceptModal').modal('hide');
                                window.location.reload();
                            } else {
                                alert('Une erreur est survenue: ' + response.message);
                            }
                        },
                        error: function(xhr) {
                            alert('Une erreur est survenue lors de la requête: ' + xhr.status +
                                ' ' + xhr.statusText);
                        }
                    });
                }
            });

            $('#confirmReject').on('click', function() {
                if (selectedId) {
                    $.ajax({
                        url: routeReject.replace('ID', selectedId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#rejectModal').modal('hide');
                                window.location.reload();
                            } else {
                                alert('Une erreur est survenue: ' + response.message);
                            }
                        },
                        error: function(xhr) {
                            alert('Une erreur est survenue lors de la requête: ' + xhr.status +
                                ' ' + xhr.statusText);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
