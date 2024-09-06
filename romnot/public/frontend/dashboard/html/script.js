document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner les éléments nécessaires
    const prevBtns = document.querySelectorAll(".btn-prev");
    const nextBtns = document.querySelectorAll(".btn-next");
    const progress = document.getElementById("progress");
    const formSteps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");
    const textarea = document.querySelector("textarea");
  
    let formStepsNum = 0; // Indice de l'étape actuelle
  
    // Fonction pour mettre à jour les étapes du formulaire
    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add("form-step-active");
    }
  
    // Fonction pour mettre à jour la barre de progression
    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });
  
        const progressActive = document.querySelectorAll(".progress-step-active");
        progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }
  
    // Fonction pour valider un sélecteur spécifique ou tous les sélecteurs
    function validateSelects(selectId = null) {
        const selects = [
            { id: 'position', errorId: 'position-error', errorMessage: 'Veuillez sélectionner un type de sujet.' },
            { id: 'positions', errorId: 'positions-error', errorMessage: 'Veuillez sélectionner une matière.' },
            { id: 'positions1', errorId: 'positions1-error', errorMessage: 'Veuillez sélectionner une filière.' },
            { id: 'positions2', errorId: 'positions2-error', errorMessage: 'Veuillez sélectionner une classe.' }
        ];
  
        let allValid = true;
  
        if (selectId) {
            // Validation d'un sélecteur spécifique
            const select = selects.find(s => s.id === selectId);
            if (select) {
                const selectElement = document.getElementById(select.id);
                const errorElement = document.getElementById(select.errorId);
  
                if (selectElement && selectElement.value === '') {
                    errorElement.style.display = 'block';
                    allValid = false;
                } else if (errorElement) {
                    errorElement.style.display = 'none';
                }
            }
        } else {
            // Validation de tous les sélecteurs
            selects.forEach(select => {
                const selectElement = document.getElementById(select.id);
                const errorElement = document.getElementById(select.errorId);
  
                if (selectElement && selectElement.value === '') {
                    errorElement.style.display = 'block';
                    allValid = false;
                } else if (errorElement) {
                    errorElement.style.display = 'none';
                }
            });
        }
  
        return allValid;
    }
  
    // Fonction pour gérer la perte de focus des éléments select
    function handleBlur(event) {
        const selectId = event.target.id;
        validateSelects(selectId);
    }
  
    // Ajouter un gestionnaire d'événements blur à chaque élément select
    const selects = [
        'position',
        'positions',
        'positions1',
        'positions2'
    ];
  
    selects.forEach(selectId => {
        const selectElement = document.getElementById(selectId);
        if (selectElement) {
            selectElement.addEventListener('blur', handleBlur);
        }
    });
  
    // Gestion du clic sur les boutons "Suivant"
    nextBtns.forEach(btn => {
        btn.addEventListener('click', (event) => {
            // Empêcher le passage à l'étape suivante si la validation échoue
            if (validateSelects()) {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            }
            // Empêcher le passage à l'étape suivante si la validation échoue
            event.preventDefault();
        });
    });
  
    // Gestion du clic sur les boutons "Précédent"
    prevBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });
  
    // Réglage de la hauteur du textarea en fonction du contenu
    textarea.addEventListener("keyup", e => {
        textarea.style.height = "auto";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });
  
    // Initialisation de l'affichage du formulaire
    updateFormSteps();
  });
  