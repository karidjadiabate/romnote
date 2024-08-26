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
    <script src="{{ asset('frontend/dashboard/js/list.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/messageError.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/html/admin.css') }}">
    <title>Liste_des_Etablissements</title>
    <style>
        .modal-content {
            border-radius: 0%;
        }

        .modal-content p {
            font-size: 10px;
        }

        .btn-danger,
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

        /* @media (max-width: 768px) {
    .btn {
        width: 50%;
        margin-bottom: 5px;

    } */

        /* } */
    </style>
</head>

<body>
    <!-- header -->
    @include('admin.include.menu')

    <!-- accueil -->
    <div class="container">
        <div class="printableArea">
            <h1 class="mt-4 mb-4 text-center">Liste des Etablissements</h1>

            <!-- Action buttons -->
            <div class="d-flex justify-content-between mb-3 no-print">
                <form class="d-flex search-bar" role="search">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-magnifying-glass" style="margin-right: 5px; color: #A2ADCF;"></i>
                            <input type="search" id="searchInput" placeholder="Rechercher..." aria-label="Search"
                                style="border: none; outline: none;">
                        </span>
                    </div>
                </form>
                {{--  --}}

                
                {{--  --}}
                {{-- <div class="option">
                    <button id="printBtn" class="btn btn-success mr-2" onclick="printDiv()"><i
                            class="fa-solid fa-print"></i> Imprimer</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-export dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-download"></i> Exporter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportTableToExcel('#etablissementTable')">Excel</a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportTableToPDF('#etablissementTable')">PDF</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-ajout mr-2" data-bs-toggle="modal" data-bs-target="#etablissementModal">
                        <i class="fa-solid fa-plus"></i> Ajouter un Etablissement
                    </button>
                </div>
            </div> --}}

                <!-- Table for listing establishments -->
                <div id="noResults">Aucun résultat trouvé</div>
                <div class="table-responsive">
                    <table class="table " id="etablissementTable">
                        <thead class="table-aaa">
                            <tr class="aa">
                                <th>#</th>
                                <th>Nom Etablissement</th>
                                <th>Nom Responsable</th>
                                <th>Prénom Responsable</th>
                                <th>Contact</th>
                                <th>Adresse Etablissement</th>
                                <th>Logo</th>
                                <th class="no-print">Action</th>
                            </tr>
                        </thead>
                        <tbody id="etablissementTables">
                            @foreach ($etablissements as $etablissement)
                                <tr>
                                    <td>{{ $etablissement->id }}</td>
                                    <td>{{ $etablissement->nometablissement }}</td>
                                    <td>{{ $etablissement->nomresponsable }}</td>
                                    <td>{{ $etablissement->prenomresponsable }}</td>
                                    <td>{{ $etablissement->contact }}</td>
                                    <td>{{ $etablissement->adresse }}</td>
                                    <td><img src="{{ asset('storage/logo/' . $etablissement->image) }}" width="50"
                                            height="50" class="img-circle elevation-2" alt=""></td>
                                    <td class="no-print">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editEtablissementModal{{ $etablissement->id }}"
                                            data-id="{{ $etablissement->id }}"
                                            data-nometablissement="{{ $etablissement->nometablissement }}"
                                            data-nomresponsable="{{ $etablissement->nomresponsable }}"
                                            data-prenomresponsable="{{ $etablissement->prenomresponsable }}"
                                            data-contact="{{ $etablissement->contact }}"
                                            data-adresse="{{ $etablissement->adresse }}"
                                            data-logo="{{ asset('storage/logo/' . $etablissement->logo) }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteEtablissementModal{{ $etablissement->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal for editing establishment -->
                                <div class="modal fade" id="editEtablissementModal{{ $etablissement->id }}"
                                    tabindex="-1" aria-labelledby="editEtablissementModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <h1 class="text-center">Modifier</h1>
                                            <form id="editEtablissementForm{{ $etablissement->id }}"
                                                action="{{ route('etablissement.update', $etablissement->id) }}"
                                                method="POST" class="needs-validation" enctype="multipart/form-data"
                                                novalidate>
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                name="nometablissement" placeholder="Nom Etablissement"
                                                                value="{{ $etablissement->nometablissement }}"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Le nom de l'établissement est requis.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                name="nomresponsable" placeholder="Nom Responsable"
                                                                value="{{ $etablissement->nomresponsable }}" required>
                                                            <div class="invalid-feedback">
                                                                Le nom du responsable est requis.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control"
                                                                name="prenomresponsable"
                                                                placeholder="Prénom Responsable"
                                                                value="{{ $etablissement->prenomresponsable }}"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Le prénom du responsable est requis.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="tel" class="form-control" name="contact"
                                                                placeholder="Contact"
                                                                value="{{ $etablissement->contact }}" required>
                                                            <div class="invalid-feedback">
                                                                Le contact est requis.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="adresse"
                                                                placeholder="Adresse Etablissement"
                                                                value="{{ $etablissement->adresse }}" required>
                                                            <div class="invalid-feedback">
                                                                L'adresse est requise.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="file" class="form-control" name="file"
                                                                placeholder="Logo">
                                                            <div class="invalid-feedback">
                                                                Choisissez un logo valide.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-around">
                                                    <button type="submit"
                                                        class="btn btn-success">Sauvegarder</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal for deleting establishment -->
                                <div class="modal" id="deleteEtablissementModal{{ $etablissement->id }}"
                                    tabindex="-1" aria-labelledby="deleteEtablissementModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('frontend/dashboard/images/images.png') }}"
                                                    width="150" height="150" alt=""><br><br>
                                                <p id="sure">Êtes-vous sûr?</p>
                                                <p>Supprimer l'établissement?</p>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <form
                                                    action="{{ route('etablissement.destroy', $etablissement->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <!-- Modal for adding a new establishment -->
        <div class="modal fade" id="etablissementModal" tabindex="-1" aria-labelledby="etablissementModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <h1 class="text-center">Ajouter</h1>
                    <form action="{{ route('etablissement.store') }}" method="POST" class="needs-validation"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nometablissement"
                                        placeholder="Nom Etablissement" required>
                                    <div class="invalid-feedback">
                                        Le nom de l'établissement est requis.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nomresponsable"
                                        placeholder="Nom Responsable" required>
                                    <div class="invalid-feedback">
                                        Le nom du responsable est requis.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="prenomresponsable"
                                        placeholder="Prénom Responsable" required>
                                    <div class="invalid-feedback">
                                        Le prénom du responsable est requis.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control" name="contact" placeholder="Contact"
                                        required>
                                    <div class="invalid-feedback">
                                        Le contact est requis.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="adresse"
                                        placeholder="Adresse Etablissement" required>
                                    <div class="invalid-feedback">
                                        L'adresse est requise.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="logo" placeholder="Logo"
                                        required>
                                    <div class="invalid-feedback">
                                        Choisissez un logo valide.
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
            document.addEventListener('DOMContentLoaded', function() {
                searchTable('#etablissementTables', 'searchInput', 'noResults');
                paginateTable('#etablissementTable');
            });
        </script>
        <script src="{{ asset('frontend/dashboard/js/messageError.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
