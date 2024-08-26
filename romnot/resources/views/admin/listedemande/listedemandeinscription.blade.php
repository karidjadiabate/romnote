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
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/list.css') }}"> --}}
    <title>demande_d'inscription</title>
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

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-export dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-download "></i> Exporter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"
                                    onclick="exportTableToExcel('#inscriptionTable')">CSV</a></li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="exportTableToPDF('#inscriptionTable')">PDF</a></li>
                        </ul>
                    </div>
                </div>

            </div>


            <!-- Modal pour Accepter -->
            <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="acceptModalLabel">Accepter la demande</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir accepter cette demande et créer l'établissement ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-success" id="confirmAccept">Accepter</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal pour Refuser -->
            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel">Refuser la demande</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir refuser cette demande ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-danger" id="confirmReject">Refuser</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive text-center">
                <table class="table" id="inscriptionTable">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>#</th>
                            <th>Date</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>noms de l'Etablissement</th>
                            <th>adresses de l'Etablissement</th>
                            <th>mote de Passe</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody id="inscriptionTables">
                        <!-- Example rows, replace with dynamic data -->
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($listedemandeinscriptions as $listedemandeinscription)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $listedemandeinscription->created_at->diffForHumans() }}</td>
                                <td>{{ $listedemandeinscription->prenom }}</td>
                                <td>{{ $listedemandeinscription->nom }}</td>
                                <td>{{ $listedemandeinscription->contact }}</td>
                                <td>{{ $listedemandeinscription->email }}</td>
                                <td>{{ $listedemandeinscription->nometablissement }}</td>
                                <td>{{ $listedemandeinscription->adresseetablissement }}</td>
                                <td>{{ $listedemandeinscription->password }}</td>
                                <td class="no-print">
                                    @if (!$listedemandeinscription->accepted && !$listedemandeinscription->rejected)
                                        <button data-id="{{ $listedemandeinscription->id }}" data-bs-toggle="modal"
                                            data-bs-target="#acceptModal"
                                            class="btn btn-outline-success btn-sm btn-accept">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button data-id="{{ $listedemandeinscription->id }}" data-bs-toggle="modal"
                                            data-bs-target="#rejectModal"
                                            class="btn btn-outline-danger btn-sm btn-reject">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    @elseif ($listedemandeinscription->accepted)
                                        <button class="btn btn-success btn-sm" disabled>
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    @elseif ($listedemandeinscription->rejected)
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

            <!-- Pagination buttons -->
            <div class="pagination no-print">
                <button class="prev">Précédent</button>
                <button class="next">Suivant</button>
            </div>

        </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            searchTable('#inscriptionTables', 'searchInput', 'noResults');
            paginateTable('#inscriptionTable');
        });
    </script>
    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            let selectedId = null;

            const routeAccept = '{{ route('demande.accept', ['id' => 'ID']) }}';
            const routeReject = '{{ route('demande.reject', ['id' => 'ID']) }}';

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
