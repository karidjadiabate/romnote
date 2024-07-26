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
    <script src="../js/list.js"></script>
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/list.css">
    <link rel="stylesheet" href="admin.css">
    <title>admin</title>
</head>
<style>

</style>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg  ">
        <div class="container-fluid">
            <!-- logo -->
            <a class="navbar-brand" href="#" style="margin-left:5px;">AKP <span>ROM-Note</span></a>
            <!-- menu -->
            <button class="navbar-toggler" type="button" id="toggleButton" aria-controls="offcanvasScrolling"
                aria-expanded="false" aria-label="Toggle navigation">
                <!-- <form class="d-flex search-bar" id="sea" role="search">
                    <div class="input-group">
                        <span class="input-group-text"
                            style="background-color:white; border: 1px solid white; border-radius: 30px; padding: 5px 6px;">
                            <i class="fa-solid fa-magnifying-glass" style="margin-right: 5px;color: initial;"></i>
                            <input class="form-control" type="search" placeholder="Rechercher..." aria-label="Search"
                                style="border: none; outline: none; height: 30px; font-size: 12px;">
                        </span>
                    </div>
                </form>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <li class="nav-item dropdown" id="noti">
                    <a class="nav-link" href="#" role="" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Notification 1</a></li>
                        <li><a class="dropdown-item" href="#">Notification 2</a></li>
                        <li><a class="dropdown-item" href="#">Notification 3</a></li>
                    </ul>
                </li>&nbsp;&nbsp;

                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown" id="profi">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../images/kad.jpg" alt="User" class="rounded-circle"
                            style="width: 50px; height: 40px; margin-right: 10px; margin-top: -9px;"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Diabate karidja</a></li>
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                    </ul>
                </li>

                <span class="solid" id="menuIcon" style="margin-top: 4px; cursor: pointer;">
                    <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" style="background-color:  #4a3dbb" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
                aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> <a class="navbar-brand" href="#"
                            style="margin-left:5px;">AKP <span>ROM-Note</span></a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </li>
                        <!-- tableau de bord -->
                        <li class="nav-item" id="tableau">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.798" height="34.798"
                                        viewBox="0 0 34.798 34.798">
                                        <path id="Tracé_366" data-name="Tracé 366"
                                            d="M3,20.4a1.933,1.933,0,0,0,1.933,1.933h11.6A1.933,1.933,0,0,0,18.466,20.4V4.933A1.933,1.933,0,0,0,16.533,3H4.933A1.933,1.933,0,0,0,3,4.933ZM3,35.865A1.933,1.933,0,0,0,4.933,37.8h11.6a1.933,1.933,0,0,0,1.933-1.933V28.132A1.933,1.933,0,0,0,16.533,26.2H4.933A1.933,1.933,0,0,0,3,28.132Zm19.332,0A1.933,1.933,0,0,0,24.265,37.8h11.6A1.933,1.933,0,0,0,37.8,35.865V20.4a1.933,1.933,0,0,0-1.933-1.933h-11.6A1.933,1.933,0,0,0,22.332,20.4ZM24.265,3a1.933,1.933,0,0,0-1.933,1.933v7.733A1.933,1.933,0,0,0,24.265,14.6h11.6A1.933,1.933,0,0,0,37.8,12.666V4.933A1.933,1.933,0,0,0,35.865,3Z"
                                            transform="translate(-3 -3)" fill="#fff" />
                                    </svg>
                                    <span>Tableau de Bord</span>
                                </div>
                            </a>
                        </li>
                        <!-- role -->
                        <li class="nav-item" id="role">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.798" height="34.798"
                                        viewBox="0 0 34.798 34.798">
                                        <path id="Tracé_366" data-name="Tracé 366"
                                            d="M3,20.4a1.933,1.933,0,0,0,1.933,1.933h11.6A1.933,1.933,0,0,0,18.466,20.4V4.933A1.933,1.933,0,0,0,16.533,3H4.933A1.933,1.933,0,0,0,3,4.933ZM3,35.865A1.933,1.933,0,0,0,4.933,37.8h11.6a1.933,1.933,0,0,0,1.933-1.933V28.132A1.933,1.933,0,0,0,16.533,26.2H4.933A1.933,1.933,0,0,0,3,28.132Zm19.332,0A1.933,1.933,0,0,0,24.265,37.8h11.6A1.933,1.933,0,0,0,37.8,35.865V20.4a1.933,1.933,0,0,0-1.933-1.933h-11.6A1.933,1.933,0,0,0,22.332,20.4ZM24.265,3a1.933,1.933,0,0,0-1.933,1.933v7.733A1.933,1.933,0,0,0,24.265,14.6h11.6A1.933,1.933,0,0,0,37.8,12.666V4.933A1.933,1.933,0,0,0,35.865,3Z"
                                            transform="translate(-3 -3)" fill="#fff" />
                                    </svg>
                                    <span>Role</span>
                                </div>
                            </a>
                        </li>
                        <!-- utilisateurs -->
                        <li class="nav-item" id="users">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.798" height="34.798"
                                        viewBox="0 0 34.798 34.798">
                                        <path id="Tracé_366" data-name="Tracé 366"
                                            d="M3,20.4a1.933,1.933,0,0,0,1.933,1.933h11.6A1.933,1.933,0,0,0,18.466,20.4V4.933A1.933,1.933,0,0,0,16.533,3H4.933A1.933,1.933,0,0,0,3,4.933ZM3,35.865A1.933,1.933,0,0,0,4.933,37.8h11.6a1.933,1.933,0,0,0,1.933-1.933V28.132A1.933,1.933,0,0,0,16.533,26.2H4.933A1.933,1.933,0,0,0,3,28.132Zm19.332,0A1.933,1.933,0,0,0,24.265,37.8h11.6A1.933,1.933,0,0,0,37.8,35.865V20.4a1.933,1.933,0,0,0-1.933-1.933h-11.6A1.933,1.933,0,0,0,22.332,20.4ZM24.265,3a1.933,1.933,0,0,0-1.933,1.933v7.733A1.933,1.933,0,0,0,24.265,14.6h11.6A1.933,1.933,0,0,0,37.8,12.666V4.933A1.933,1.933,0,0,0,35.865,3Z"
                                            transform="translate(-3 -3)" fill="#fff" />
                                    </svg>
                                    <span>admin</span>
                                </div>
                            </a>
                        </li>
                        <!-- demande d'inscription -->
                        <li class="nav-item" id="inscription">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.798" height="34.798"
                                        viewBox="0 0 34.798 34.798">
                                        <path id="Tracé_366" data-name="Tracé 366"
                                            d="M3,20.4a1.933,1.933,0,0,0,1.933,1.933h11.6A1.933,1.933,0,0,0,18.466,20.4V4.933A1.933,1.933,0,0,0,16.533,3H4.933A1.933,1.933,0,0,0,3,4.933ZM3,35.865A1.933,1.933,0,0,0,4.933,37.8h11.6a1.933,1.933,0,0,0,1.933-1.933V28.132A1.933,1.933,0,0,0,16.533,26.2H4.933A1.933,1.933,0,0,0,3,28.132Zm19.332,0A1.933,1.933,0,0,0,24.265,37.8h11.6A1.933,1.933,0,0,0,37.8,35.865V20.4a1.933,1.933,0,0,0-1.933-1.933h-11.6A1.933,1.933,0,0,0,22.332,20.4ZM24.265,3a1.933,1.933,0,0,0-1.933,1.933v7.733A1.933,1.933,0,0,0,24.265,14.6h11.6A1.933,1.933,0,0,0,37.8,12.666V4.933A1.933,1.933,0,0,0,35.865,3Z"
                                            transform="translate(-3 -3)" fill="#fff" />
                                    </svg>
                                    <span>Demande d'inscription</span>
                                </div>
                            </a>
                        </li>
                        <!-- school -->
                        <li class="nav-item" id="school">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.798" height="34.798"
                                        viewBox="0 0 34.798 34.798">
                                        <path id="Tracé_366" data-name="Tracé 366"
                                            d="M3,20.4a1.933,1.933,0,0,0,1.933,1.933h11.6A1.933,1.933,0,0,0,18.466,20.4V4.933A1.933,1.933,0,0,0,16.533,3H4.933A1.933,1.933,0,0,0,3,4.933ZM3,35.865A1.933,1.933,0,0,0,4.933,37.8h11.6a1.933,1.933,0,0,0,1.933-1.933V28.132A1.933,1.933,0,0,0,16.533,26.2H4.933A1.933,1.933,0,0,0,3,28.132Zm19.332,0A1.933,1.933,0,0,0,24.265,37.8h11.6A1.933,1.933,0,0,0,37.8,35.865V20.4a1.933,1.933,0,0,0-1.933-1.933h-11.6A1.933,1.933,0,0,0,22.332,20.4ZM24.265,3a1.933,1.933,0,0,0-1.933,1.933v7.733A1.933,1.933,0,0,0,24.265,14.6h11.6A1.933,1.933,0,0,0,37.8,12.666V4.933A1.933,1.933,0,0,0,35.865,3Z"
                                            transform="translate(-3 -3)" fill="#fff" />
                                    </svg>
                                    <span>Etablissement</span>
                                </div>
                            </a>
                        </li>
                        <!-- Enseignants -->
                        <li class="nav-item" id="enseignants">
                            <a class="nav-link" href="list-ensignants.html">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30.448" height="34.798"
                                        viewBox="0 0 30.448 34.798">
                                        <path id="user-tie-solid"
                                            d="M6.525,8.7a8.7,8.7,0,1,0,8.7-8.7A8.7,8.7,0,0,0,6.525,8.7Zm6.423,13.607,1.264,2.107-2.263,8.421L9.5,22.85a1.006,1.006,0,0,0-1.217-.768A10.961,10.961,0,0,0,0,32.711,2.087,2.087,0,0,0,2.087,34.8H28.362a2.087,2.087,0,0,0,2.087-2.087,10.961,10.961,0,0,0-8.285-10.63,1.016,1.016,0,0,0-1.217.768L18.5,32.834l-2.263-8.421L17.5,22.306a1.086,1.086,0,0,0-.931-1.645H13.885a1.087,1.087,0,0,0-.931,1.645Z"
                                            fill="#fff" />
                                    </svg>
                                    <span>Enseignants</span>
                                </div>
                            </a>
                        </li>
                        <!-- etudiants -->

                        <li class="nav-item" id="etudiants">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <div class="icon-text-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43.75" height="35"
                                            viewBox="0 0 43.75 35">
                                            <path id="users-solid"
                                                d="M9.844,0A5.469,5.469,0,1,1,4.375,5.469,5.469,5.469,0,0,1,9.844,0ZM35,0a5.469,5.469,0,1,1-5.469,5.469A5.469,5.469,0,0,1,35,0ZM0,20.419a7.3,7.3,0,0,1,7.294-7.294h2.919a7.333,7.333,0,0,1,3.049.663,8.6,8.6,0,0,0-.13,1.524,8.753,8.753,0,0,0,2.96,6.562H1.456A1.462,1.462,0,0,1,0,20.419Zm27.706,1.456h-.048a8.729,8.729,0,0,0,2.96-6.562,9.362,9.362,0,0,0-.13-1.524,7.227,7.227,0,0,1,3.049-.663h2.919a7.3,7.3,0,0,1,7.294,7.294,1.457,1.457,0,0,1-1.456,1.456ZM15.313,15.313a6.562,6.562,0,1,1,6.562,6.562A6.562,6.562,0,0,1,15.313,15.313ZM8.75,33.175a9.114,9.114,0,0,1,9.112-9.112h8.025A9.114,9.114,0,0,1,35,33.175,1.825,1.825,0,0,1,33.175,35h-22.6A1.825,1.825,0,0,1,8.75,33.175Z"
                                                fill="#fff" />
                                        </svg>
                                        <span>Etudiants</span>
                                    </div>
                            </a>
                        </li>
                        <!-- filieres -->
                        <li class="nav-item" id="Filiere">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31.318" height="34.798"
                                        viewBox="0 0 31.318 34.798">
                                        <path id="Tracé_381" data-name="Tracé 381"
                                            d="M34.318,5.48H9.96a3.48,3.48,0,0,0,0,6.96H34.318V35.058a1.74,1.74,0,0,1-1.74,1.74H9.96A6.96,6.96,0,0,1,3,29.838V8.96A6.96,6.96,0,0,1,9.96,2H32.578a1.74,1.74,0,0,1,1.74,1.74Zm-1.74,5.22H9.96a1.74,1.74,0,0,1,0-3.48H32.578Z"
                                            transform="translate(-3 -2)" fill="#fff" />
                                    </svg>
                                    <span>Filière</span>
                                </div>
                            </a>
                        </li>
                        <!-- classe -->
                        <li class="nav-item" id="classe">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38.889" height="35"
                                        viewBox="0 0 38.889 35">
                                        <g id="book" transform="translate(-2 -3.998)" style="isolation: isolate">
                                            <path id="Tracé_376" data-name="Tracé 376"
                                                d="M9.778,4A7.778,7.778,0,0,0,2,11.776V27.331a7.778,7.778,0,0,0,7.778,7.778l5.851.019a4.017,4.017,0,0,1,2.689,1.3,10.169,10.169,0,0,1,1.165,1.223A2.364,2.364,0,0,0,21.444,39c1.155-.006,1.53-.791,1.944-1.338a11.068,11.068,0,0,1,1.075-1.11,4.57,4.57,0,0,1,2.814-1.441h5.833a7.778,7.778,0,0,0,7.778-7.778V11.776A7.778,7.778,0,0,0,33.111,4H27.278a7.672,7.672,0,0,0-5.833,2.734A7.672,7.672,0,0,0,15.611,4Zm0,3.889h5.833A3.888,3.888,0,0,1,19.5,11.776l.012,20.706a7.135,7.135,0,0,0-3.9-1.262H9.778a3.888,3.888,0,0,1-3.889-3.889V11.776A3.888,3.888,0,0,1,9.778,7.887Zm17.5,0h5.833A3.888,3.888,0,0,1,37,11.776V27.331a3.888,3.888,0,0,1-3.889,3.889H27.278a7.153,7.153,0,0,0-3.9,1.287l.008-20.732A3.888,3.888,0,0,1,27.278,7.887Z"
                                                transform="translate(0 0)" fill="#fff" />
                                            <path id="Tracé_377" data-name="Tracé 377"
                                                d="M11.833,8H6v3.889h5.833Zm0,5.833H6v3.889h5.833ZM6,19.667h5.833v3.889H6ZM29.333,8H23.5v3.889h5.833ZM23.5,13.833h5.833v3.889H23.5Zm5.833,5.833H23.5v3.889h5.833Z"
                                                transform="translate(3.778 3.78)" fill="#fff" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                    <span>Classe</span>
                                </div>
                            </a>
                        </li>
                        <!-- calendrier -->
                        <li class="nav-item" id="calendrier">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33.158" height="35"
                                        viewBox="0 0 33.158 35">
                                        <g id="calendar-event-fill" transform="translate(-3 -2)"
                                            style="isolation: isolate">
                                            <path id="Tracé_374" data-name="Tracé 374"
                                                d="M10.368,3A7.369,7.369,0,0,0,3,10.368v1.842H36.158V10.368A7.369,7.369,0,0,0,28.789,3H10.368Z"
                                                transform="translate(0 0.842)" fill="#fff" />
                                            <path id="Tracé_375" data-name="Tracé 375"
                                                d="M12.211,2a1.842,1.842,0,0,1,1.842,1.842V7.526a1.842,1.842,0,1,1-3.684,0V3.842A1.842,1.842,0,0,1,12.211,2ZM3,16.737V29.632A7.369,7.369,0,0,0,10.368,37H28.789a7.369,7.369,0,0,0,7.368-7.368V16.737Zm23.947,3.684h1.842a1.843,1.843,0,0,1,1.842,1.842v1.842a1.843,1.843,0,0,1-1.842,1.842H26.947a1.843,1.843,0,0,1-1.842-1.842V22.263A1.843,1.843,0,0,1,26.947,20.421ZM28.789,3.842a1.842,1.842,0,0,0-3.684,0V7.526a1.842,1.842,0,0,0,3.684,0Z"
                                                transform="translate(0 0)" fill="#fff" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                    <span>Calendrier</span>
                                </div>
                            </a>
                        </li>
                        <!-- sujet -->
                        <li class="nav-item" id="sujet">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35">
                                        <path id="Soustraction_4" data-name="Soustraction 4"
                                            d="M27.223,35H7.777A7.786,7.786,0,0,1,0,27.223V7.777A7.786,7.786,0,0,1,7.777,0H27.223A7.786,7.786,0,0,1,35,7.777V27.223A7.786,7.786,0,0,1,27.223,35Zm-3.89-13.608a1.944,1.944,0,1,0,1.944,1.944A1.946,1.946,0,0,0,23.333,21.392Zm-11.665,0a1.944,1.944,0,1,0,1.944,1.944A1.946,1.946,0,0,0,11.667,21.392Zm11.665-5.833A1.944,1.944,0,1,0,25.277,17.5,1.946,1.946,0,0,0,23.333,15.559Zm-11.665,0A1.944,1.944,0,1,0,13.611,17.5,1.946,1.946,0,0,0,11.667,15.559ZM23.333,9.725a1.945,1.945,0,1,0,1.944,1.946A1.947,1.947,0,0,0,23.333,9.725Zm-11.665,0a1.945,1.945,0,1,0,1.944,1.946A1.947,1.947,0,0,0,11.667,9.725Z"
                                            fill="#fff" />
                                    </svg>


                                    <span>Sujet</span>
                                </div>
                            </a>
                        </li>
                        <!-- correction -->
                        <li class="nav-item" id="correction">
                            <a class="nav-link" href="#">
                                <div class="icon-text-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38.889" height="35"
                                        viewBox="0 0 38.889 35">
                                        <g id="printer2" transform="translate(-2 -3)" style="isolation: isolate">
                                            <path id="Tracé_379" data-name="Tracé 379"
                                                d="M2,11.833A5.833,5.833,0,0,1,7.833,6h3.889a1.945,1.945,0,0,1,.87.205L16.07,7.944H35.056a5.833,5.833,0,0,1,5.833,5.833V23.5a5.833,5.833,0,0,1-5.833,5.833H31.167V25.444h3.889A1.944,1.944,0,0,0,37,23.5V13.778a1.944,1.944,0,0,0-1.944-1.944H15.611a1.944,1.944,0,0,1-.87-.205L11.263,9.889H7.833a1.944,1.944,0,0,0-1.944,1.944V23.5a1.944,1.944,0,0,0,1.944,1.944h3.889v3.889H7.833A5.833,5.833,0,0,1,2,23.5Z"
                                                transform="translate(0 2.833)" fill="#fff" fill-rule="evenodd" />
                                            <path id="Tracé_380" data-name="Tracé 380"
                                                d="M8.889,6.889A3.889,3.889,0,0,1,12.778,3H24.444a3.889,3.889,0,0,1,3.889,3.889v3.889H24.444V6.889H12.778v3.659L9.758,9.039a1.945,1.945,0,0,0-.87-.205ZM28.333,28.278v5.833A3.889,3.889,0,0,1,24.444,38H12.778a3.889,3.889,0,0,1-3.889-3.889V24.389a1.944,1.944,0,0,1,0-3.889H28.333a1.944,1.944,0,1,1,0,3.889Zm-3.889-3.889H12.778v9.722H24.444ZM8.889,16.611a1.944,1.944,0,1,1-1.944-1.944A1.944,1.944,0,0,1,8.889,16.611Z"
                                                transform="translate(2.833)" fill="#fff" fill-rule="evenodd" />
                                        </g>
                                    </svg>

                                    <span>Correction</span>
                                </div>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>
    </nav>
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
            <table class="table" id="adminTable">
                <thead class="table-aaa">
                    <tr class="aa">
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>contact</th>
                        <th>Email</th>
                        <th>Usermane</th>
                        <th>Etablissement</th>
                        <th class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows, replace with dynamic data -->
                    <tr>
                        <td>01</td>
                        <td>Dani</td>
                        <td>Marc</td>
                        <td>0707532281</td>
                        <td>KoffiMarc@gmail.com</td>
                        <td>DaniMark</td>
                        <td>Pigier</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Ani</td>
                        <td>axel</td>
                        <td>0507532281</td>
                        <td>ani@gmail.com</td>
                        <td>Aniaxel</td>
                        <td>UVCI</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>N'Dri</td>
                        <td>Julien</td>
                        <td>0102535524</td>
                        <td>julien@gmail.com</td>
                        <td>Julienndri</td>
                        <td>UCAO</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>N'Dri</td>
                        <td>Julien</td>
                        <td>0102535524</td>
                        <td>julien@gmail.com</td>
                        <td>Julienndri</td>
                        <td>UCAO</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>N'Dri</td>
                        <td>Julien</td>
                        <td>0102535524</td>
                        <td>julien@gmail.com</td>
                        <td>Julienndri</td>
                        <td>UCAO</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>N'Dri</td>
                        <td>Julien</td>
                        <td>0102535524</td>
                        <td>julien@gmail.com</td>
                        <td>Julienndri</td>
                        <td>UCAO</td>
                        <td class="no-print">
                            <button data-bs-toggle="modal" data-bs-target="#editAdmin"
                                class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteAdmin"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                </tbody>
            </table>

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
                <form class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Fields for adding teacher details -->
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstName" placeholder="Nom" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastName" placeholder="Prenoms" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="contact" placeholder="Contact" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" placeholder="Email" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" placeholder="Username" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid subject is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="etablissement" placeholder="Etablissement"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid class is required.
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
    </div>


    <!-- Modal de Modification -->
    <div class="modal fade" id="editAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h1 class="text-center">Ajouter un admin</h1>
                <form class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Fields for adding teacher details -->
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstName" placeholder="Nom" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastName" placeholder="Prenoms" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="contact" placeholder="Contact" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid contact is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" placeholder="Email" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" placeholder="Username" value=""
                                    required>
                                <div class="invalid-feedback">
                                    Valid subject is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="etablissement" placeholder="Etablissement"
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid class is required.
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
    </div>

    <!-- Modal de Suppression -->
    <div class="modal " id="deleteAdmin" tabindex="-1" aria-labelledby="deleteAdminLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="../images/images.png" width="150" height="150" alt=""><br><br>
                    <p id="sure">Êtes-vous sûr?</p>
                    <p>supprimer cet Admin ?</p>
                </div>
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            searchTable('#adminTable', 'searchInput');
            paginateTable('#adminTable');
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
