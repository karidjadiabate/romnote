// Fonction pour exporter le tableau en format Excel
function exportTableToExcel() {
    const table = document.querySelector('table');
    const rows = Array.from(table.rows);
    rows.forEach(row => row.deleteCell(-1));

    // Créer un nouveau workbook et une nouvelle feuille de calcul (worksheet)
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.table_to_sheet(table);
    XLSX.utils.book_append_sheet(workbook, worksheet, 'inscription');
    XLSX.writeFile(workbook, 'inscription.xlsx');
    location.reload();
}

// Exporter le tableau vers PDF
function exportTableToPDF() {
    const table = document.querySelector('table');
    const rows = Array.from(table.rows);
    rows.forEach(row => row.deleteCell(-1)); // Supprimer la dernière cellule de chaque ligne

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('l');

    doc.autoTable({ html: table });

    doc.save('inscription.pdf');

    location.reload();
}

// filtre
function filterTable(subject) {
    const rows = document.querySelectorAll('#inscriptionTable tr');
    rows.forEach(row => {
        const subjectCell = row.cells[5];
        if (subjectCell) {
            row.style.display = subject === '' || subjectCell.textContent === subject ? '' : 'none';
        }
    });
    paginateTable();
}

// recherche
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#inscriptionTable tr');
    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;
        for (let i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }
        row.style.display = match ? '' : 'none';
    });
    paginateTable();
});

// 
document.addEventListener('DOMContentLoaded', function () {
    const rowsPerPage = 5;
    let currentPage = 1;

    function paginateTable() {
        const rows = document.querySelectorAll('#inscriptionTable tr');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Afficher les lignes de la page actuelle
        rows.forEach((row, index) => {
            if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Mettre à jour les boutons de pagination
        document.querySelector('.prev').disabled = currentPage === 1;
        document.querySelector('.next').disabled = currentPage === totalPages;
    }

    // Gestion des boutons de pagination
    document.querySelector('.prev').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            paginateTable();
        }
    });

    document.querySelector('.next').addEventListener('click', () => {
        const rows = document.querySelectorAll('#inscriptionTable tr');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        if (currentPage < totalPages) {
            currentPage++;
            paginateTable();
        }
    });

    paginateTable(); // Initialisation de la pagination lors du chargement de la page
});



//
//
//
//


// Fonction pour exporter le tableau en format Excel
function exportTableToExcel() {
    const table = document.querySelector('table');
    const rows = Array.from(table.rows);
    rows.forEach(row => row.deleteCell(-1));

    // Créer un nouveau workbook et une nouvelle feuille de calcul (worksheet)
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.table_to_sheet(table);
    XLSX.utils.book_append_sheet(workbook, worksheet, 'teacher');
    XLSX.writeFile(workbook, 'teacher.xlsx');
    location.reload();
}

// Exporter le tableau vers PDF
function exportTableToPDF() {
    const table = document.querySelector('table');
    const rows = Array.from(table.rows);
    rows.forEach(row => row.deleteCell(-1)); // Supprimer la dernière cellule de chaque ligne

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('l');

    doc.autoTable({ html: table });

    doc.save('teacher.pdf');

    location.reload();
}

// filtre
function filterTable(subject) {
    const rows = document.querySelectorAll('#teacherTable tr');
    rows.forEach(row => {
        const subjectCell = row.cells[5];
        if (subjectCell) {
            row.style.display = subject === '' || subjectCell.textContent === subject ? '' : 'none';
        }
    });
    paginateTable();
}

// recherche
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#teacherTable tr');
    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;
        for (let i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }
        row.style.display = match ? '' : 'none';
    });
    paginateTable();
});

// 
document.addEventListener('DOMContentLoaded', function () {
    const rowsPerPage = 5;
    let currentPage = 1;

    function paginateTable() {
        const rows = document.querySelectorAll('#teacherTable tr');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Afficher les lignes de la page actuelle
        rows.forEach((row, index) => {
            if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Mettre à jour les boutons de pagination
        document.querySelector('.prev').disabled = currentPage === 1;
        document.querySelector('.next').disabled = currentPage === totalPages;
    }

    // Gestion des boutons de pagination
    document.querySelector('.prev').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            paginateTable();
        }
    });

    document.querySelector('.next').addEventListener('click', () => {
        const rows = document.querySelectorAll('#teacherTable tr');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        if (currentPage < totalPages) {
            currentPage++;
            paginateTable();
        }
    });

    paginateTable(); // Initialisation de la pagination lors du chargement de la page
});