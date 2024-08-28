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
            <h1 class="mt-4 mb-4">Liste des Administrateurs</h1>

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
                            class="fa-solid fa-print"></i>
                        Imprimer</button>

                    <!-- Dropdown for Export options -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-export dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-download "></i> Exporter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportTableToExcel('#adminTable')">Excel</a>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="exportTableToPDF('#adminTable')">PDF</a>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-ajout mr-2" data-bs-toggle="modal" data-bs-target="#admin"><i
                            class="fa-solid fa-plus"></i> Ajouter un Admin</button>
                </div>
            </div>

            <!-- Table for listing teachers -->
            <div id="noResults">Aucun résultat trouvé</div>
            <div class="table-responsive">
                <table class="table" id="adminTables">
                    <thead class="table-aaa">
                        <tr class="aa">
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>contact</th>
                            <th>Email</th>
=                            <th>Etablissement</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows, replace with dynamic data -->
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($administrateurs as $administrateur)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{$administrateur->nom}}</td>
                            <td>{{$administrateur->prenom}}</td>
                            <td>{{$administrateur->contact}}</td>
                            <td>{{$administrateur->email}}</td>
                            <td>{{$administrateur->nometablissement}}</td>
                            <td class="no-print">
                                <button class="btn btn-outline-primary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#editAdmin{{$administrateur->id}}"
                                    data-id="{{$administrateur->id}}"
                                    data-nom="{{$administrateur->nom}}"
                                    data-prenom="{{$administrateur->prenom}}"
                                    data-email="{{$administrateur->email}}"
                                    data-etablissement_id="{{$administrateur->etablissement_id}}"
                                    >
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteAdmin{{$administrateur->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal de Modification -->
                        <div class="modal fade" id="editAdmin{{$administrateur->id}}" tabindex="-1" aria-labelledby="editAdminLabel{{$administrateur->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <h1 class="text-center">Modifier</h1>
                                    <form action="{{route('user.update', $administrateur->id)}}" method="POST" class="needs-validation" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <!-- Fields for editing teacher details -->
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="editNom{{$administrateur->id}}" name="nom" placeholder="Nom" value="{{$administrateur->nom}}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Nom est requis.
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="editPrenom{{$administrateur->id}}" name="prenom" placeholder="Prénoms" value="{{$administrateur->prenom}}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Prénom est requis.
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" class="form-control" id="editEmail{{$administrateur->id}}" name="email" placeholder="Email" value="{{$administrateur->email}}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Email est requis.
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <input type="tel" class="form-control" id="editContact{{$administrateur->id}}" name="contact" placeholder="Contact" value="{{$administrateur->contact}}"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Contact est requis.
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <select class="select2-multiple form-control w-100" name="etablissement_id" id="select2Multiple">
                                                        @foreach ($etablissements as $etablissement)
                                                            <option value="{{ $etablissement->id }}" @if ($etablissement->id == $administrateur->etablissement_id) selected @endif>
                                                                {{ $etablissement->nometablissement }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Contact est requis.
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


                        <!-- Modal de Suppression -->
                        <div class="modal fade" id="deleteAdmin{{$administrateur->id}}" tabindex="-1" aria-labelledby="deleteAdminLabel{{$administrateur->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <img src="{{asset('frontend/dashboard/images/images.png')}}" width="150" height="150" alt=""><br><br>
                                        <p id="sure">Êtes-vous sûr?</p>
                                        <p>Supprimer cet enseignant ?</p>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <form action="{{route('user.destroy', $administrateur->id)}}" method="POST">
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
            </div>

            <!-- Pagination buttons -->
            <div class="pagination no-print">
                <button class="prev">Précédent</button>
                <button class="next">Suivant</button>
            </div>
        </div>
    </div>


    <!-- Modal ajout -->
    <div class="modal fade" id="admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h1 class="text-center">Ajouter un admin</h1>
                <form action="{{route('user.store')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Fields for adding teacher details -->
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstName" name="nom" placeholder="Nom" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastName" name="prenom" placeholder="Prenoms" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                            </div>

                           {{--  <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid subject is required.
                                </div>
                            </div> --}}

                            <div class="col-sm-6">
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->nomrole}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Valid class is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <select name="etablissement_id" id="etablissement_id" class="form-control" required>
                                    <option value="">Selectionnez un établissement</option>
                                    @foreach ($etablissements as $etablissement)
                                        <option value="{{$etablissement->id}}">{{$etablissement->nometablissement}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Valid class is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid subject is required.
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
            searchTable('#adminTables', 'searchInput', 'noResults');
            paginateTable('#adminTable');
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
