<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/dashboard/css/styles.css')}}" />

</head>

<body>
    <div id="calendar"></div>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="" method="post">
                <div class="form-row mb-3 mt-5">
                    <div class="form-group col-md-6">
                        <select class="form-control-lg col-md-12" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                ">
                            <option value="" disabled selected style="color: #3939b7 !important">
                                Matière
                            </option>
                            <option value="math">Mathématiques</option>
                            <option value="phy">Physique</option>
                            <option value="che">Chimie</option>
                            <!-- Ajouter d'autres options ici -->
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control-lg col-md-12" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                ">
                            <option value="" disabled selected style="color: #3939b7 !important">
                                Catégorie d'évaluation
                            </option>
                            <option value="exam">Examen</option>
                            <option value="quiz">Quiz</option>
                            <option value="homework">Devoir</option>
                            <!-- Ajouter d'autres options ici -->
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <select class="form-control-lg col-md-12" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                ">
                            <option value="" disabled selected style="color: #3939b7 !important">
                                Filière
                            </option>
                            <option value="sciences">Sciences</option>
                            <option value="arts">Arts</option>
                            <option value="commerce">Commerce</option>
                            <!-- Ajouter d'autres options ici -->
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control-lg col-md-12" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                ">
                            <option value="" disabled selected style="color: #3939b7 !important">
                                Classe
                            </option>
                            <option value="1">1ère</option>
                            <option value="2">2ème</option>
                            <option value="3">3ème</option>
                            <!-- Ajouter d'autres options ici -->
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-3">
                        <input type="time" class="form-control-lg col-md-12" placeholder="Début" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                " />
                    </div>
                    <div class="form-group col-md-3">
                        <input type="time" class="form-control-lg col-md-12" placeholder="Fin" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                " />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control-lg col-md-12" placeholder="Date" style="
                  border: 1px solid #3939b7 !important;
                  color: #3939b7 !important;
                " />
                    </div>
                </div>
                <div class="form-row mb-3" style="display: flex; justify-content: center; border-radius: none;
            ">
                    <div class="form-group col-3 me-5" style="margin-left: -2rem;">
                        <button class="btn btn-md" type="submit"
                            style="background: #28b896; color: white; border-radius: none">
                            Sauvegarder
                        </button>
                    </div>
                    <div class="form-group col-3">
                        <button class="btn btn-md annuler" type="reset" id="annuler" style="
                  background: rgba(225, 32, 56, 0.8);
                  color: white;
                  border-radius: none;
                ">
                            Annuler
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
        integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Moment.js (required by FullCalendar) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"
        integrity="sha512-L0BJbEKoy0y4//RCPsfL3t/5Q/Ej5GJo8sx1sDr56XdI7UQMkpnXGYZ/CCmPTF+5YEJID78mRgdqRCo1GrdVKw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {


            const today = new Date();
            const day = today.getDate().toString().padStart(2, "0");
            const month = (today.getMonth() + 1).toString().padStart(2, "0");
            const year = today.getFullYear();
            const formattedDate = `${year}-${month}-${day}`;

            $("#calendar").fullCalendar({
                locale: "fr", // Utiliser la locale française
                header: {
                    left: "prev,next today customButton",
                    center: "title",
                    right: "month,agendaWeek,agendaDay",
                },
                customButtons: {
                    customButton: {
                        text: "+ Créer",
                        click: function () {
                            document.getElementById("myModal").style.display = "block";
                            document.getElementById("myModal").style.zindex = "999";
                        },
                    },
                },
                defaultDate: formattedDate,
                editable: false,
                eventLimit: true,
                firstDay: 0, // Dimanche comme premier jour de la semaine
                events: [
                    {
                        title: "Anglais",
                        start: "2024-07-12T10:30:00",
                        end: "2024-07-12T12:30:00",
                        description: "L1Math-Info",
                    },
                    {
                        title: "Français",
                        start: "2024-07-14T10:30:00",
                        end: "2024-07-14T20:30:00",
                        description: "MA2-Marketing",
                    },
                    {
                        title: "Gestion",
                        start: "2024-08-14T10:30:00",
                        end: "2024-08-14T17:30:00",
                        description: "MA2-Economie",
                    },
                ],
                eventRender: function (event, element) {
                    // Formater le début et la fin de l'événement
                    const startTime = moment(event.start).format("HH[h]mm");
                    const endTime = moment(event.end).format("HH[h]mm");

                    // Mettre à jour le contenu HTML de l'événement
                    element.html(`
                <div class="fc-time" style="margin-top:10px;font-size: 10px;"><i class="fa-regular fa-clock" style="margin-right:5px;"></i>${startTime} - ${endTime}</div>
                <div class="fc-title" style="font-weight:bolder;font-size: 10px;">
                    ${event.title}<br>
                    <span class="event-description">${event.description || ""
                        }</span>
                </div>
            `);
                },
                viewRender: function (view, element) {
                    // Modifie le bouton après l'initialisation
                    $(".fc-customButton-button").html(
                        '<span class="plus-sign">+</span> <span class="button-text">Créer</span>'
                    );
                    // Appliquer la transformation pour la première lettre du jour du mois en majuscule
                },
            });

            // Ajouter la classe CSS après l'initialisation
            $("#calendar")
                .find(".fc-customButton-button")
                .addClass("my-custom-button");

            // Modal script
            // Obtenir la modal et les boutons
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            var annuler = document.getElementsByClassName("annuler")[0];

            // Fonction pour fermer la modal
            function closeModal() {
                modal.style.display = "none";
            }

            // Ajouter des événements de clic pour fermer la modal
            span.onclick = closeModal;

            window.onclick = function (event) {
                if (event.target == modal) {
                    closeModal();
                }
            };

            annuler.onclick = closeModal;

            // Ajout d'une barre de recherche
            $(".fc-header-toolbar").prepend(
                '<div class="search-bar"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="search-input" placeholder="Rechercher..." style="margin-left: 15%;"></div>'
            );

            $("#search-input").on("input", function () {
                var searchTerm = $(this).val().toLowerCase();
                var events = $("#calendar").fullCalendar("clientEvents");
                var filteredEvents = events.filter(function (event) {
                    return event.title.toLowerCase().indexOf(searchTerm) !== -1;
                });
                // $("#calendar").fullCalendar("removeEvents");
                // $("#calendar").fullCalendar("addEventSource", filteredEvents);
            });
        });
    </script>
</body>

</html>
