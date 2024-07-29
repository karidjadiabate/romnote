(function () {
    let currentPage = 1;
    const rowsPerPage = 5;

    /**
     * Filtre les lignes du tableau en fonction du sujet donné.
     * @param {string} subject - Le sujet à filtrer.
     */
    function filterTable(subject) {
        const tables = document.querySelectorAll('tbody');
        tables.forEach(table => {
            const rows = table.querySelectorAll('tr');
            rows.forEach(row => {
                const subjectCell = row.cells[5];
                if (subjectCell) {
                    row.style.display = subject === '' || subjectCell.textContent.trim() === subject ? '' : 'none';
                }
            });
        });
        paginateTable();
    }

    /**
     * Recherche dans les lignes du tableau et filtre en fonction de l'entrée de recherche.
     * @param {string} tbody - Le sélecteur de l'élément tbody.
     * @param {string} searchInputId - L'ID de l'élément d'entrée de recherche.
     */
    function searchTable(tbodyId, searchInputId, noResultsId) {
        const searchInput = document.getElementById(searchInputId);
        const noResultsMessage = document.getElementById(noResultsId);

        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll(`${tbodyId} tr`);
            let found = false;  // Initialisation de la variable found

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
                if (match) {
                    found = true;
                }
            });

            noResultsMessage.style.display = found ? 'none' : 'block';
            paginateTable(tbodyId);
        });
    }


    /**
     * Paginer les lignes du tableau.
     * @param {string} tableId - Le sélecteur de l'élément table.
     */
    function paginateTable(tableId) {
        const rows = document.querySelectorAll(`${tableId} tbody tr`);
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        rows.forEach((row, index) => {
            if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        document.querySelector('.prev').disabled = currentPage === 1;
        document.querySelector('.next').disabled = currentPage === totalPages;

        document.querySelector('.prev').onclick = () => {
            if (currentPage > 1) {
                currentPage--;
                paginateTable(tableId);
            }
        };

        document.querySelector('.next').onclick = () => {
            if (currentPage < totalPages) {
                currentPage++;
                paginateTable(tableId);
            }
        };
    }

    /**
     * Exporter le tableau vers un fichier Excel.
     * @param {string} tableId - Le sélecteur de l'élément table.
     */
    function exportTableToExcel(tableId) {
        const table = document.querySelector(tableId);
        if (!table) return;
        const rows = Array.from(table.rows);
        const pageTitle = document.querySelector('title') ? document.querySelector('title').textContent : 'default';
        const fileName = pageTitle.trim() || 'data';
        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.table_to_sheet(table);
        XLSX.utils.sheet_add_aoa(worksheet, [[pageTitle]], { origin: 'A1' });
        const range = XLSX.utils.decode_range(worksheet['!ref']);
        worksheet['!merges'] = [{ s: { r: 0, c: 0 }, e: { r: 0, c: range.e.c } }];
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
        XLSX.writeFile(workbook, `${fileName}.xlsx`);
    }

    /**
     * Exporter le tableau vers un fichier PDF.
     * @param {string} tableId - Le sélecteur de l'élément table.
     */
    function exportTableToPDF(tableId) {
        const table = document.querySelector(tableId);
        if (!table) return;
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l');
        const pageTitle = document.querySelector('title') ? document.querySelector('title').textContent : 'default';
        const fileName = pageTitle.trim() || 'data';
        doc.setFontSize(18);
        doc.text(pageTitle, doc.internal.pageSize.getWidth() / 2, 10, { align: 'center' });
        doc.autoTable({ html: table, startY: 20 });
        doc.save(`${fileName}.pdf`);
    }

    /**
     * Imprimer la div courante.
     */
    function printDiv() {
        window.print();
    }

    // Exposer les fonctions pour une utilisation globale
    window.filterTable = filterTable;
    window.searchTable = searchTable;
    window.paginateTable = paginateTable;
    window.exportTableToExcel = exportTableToExcel;
    window.exportTableToPDF = exportTableToPDF;
    window.printDiv = printDiv;
})();

