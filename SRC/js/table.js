document.addEventListener("DOMContentLoaded", function() {
    // Llamar a las funciones para cada tabla específica
    searchTable("historicos");
    sortTable("historicos");
    searchTable("1torneo");
    sortTable("1torneo");
});



// Función para buscar en la tabla específica
function searchTable(tableId) {
    const search = document.querySelector(`#${tableId} .input-group input`);
    const tableRows = document.querySelectorAll(`#${tableId} tbody tr`);
    
    search.addEventListener('input', () => {
        tableRows.forEach((row, i) => {
            let tableData = row.textContent.toLowerCase();
            let searchData = search.value.toLowerCase();
            row.classList.toggle('hide', tableData.indexOf(searchData) < 0);
            row.style.setProperty('--delay', i / 25 + 's');
        });

        document.querySelectorAll(`#${tableId} tbody tr:not(.hide)`).forEach((visibleRow, i) => {
            visibleRow.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
        });
    });
}

// Función para ordenar la tabla específica
function sortTable(tableId) {
    console.log("sortTable function called for table with ID:", tableId);
    const tableHeadings = document.querySelectorAll(`#${tableId} thead th`);

    tableHeadings.forEach((head, i) => {
        let sortAsc = true;
        head.onclick = () => {
            tableHeadings.forEach(head => head.classList.remove('active'));
            head.classList.add('active');

            document.querySelectorAll(`#${tableId} td`).forEach(td => td.classList.remove('active'));
            document.querySelectorAll(`#${tableId} tbody tr`).forEach(row => {
                row.querySelectorAll('td')[i].classList.add('active');
            });

            head.classList.toggle('asc', sortAsc);
            sortAsc = head.classList.contains('asc') ? false : true;

            sortTableHelper(tableId, i, sortAsc);
        };
    });
}

// Función auxiliar para ordenar la tabla específica
function sortTableHelper(tableId, column, sortAsc) {
    const tableRows = document.querySelectorAll(`#${tableId} tbody tr`);
    
    [...tableRows].sort((a, b) => {
        let firstRow = a.querySelectorAll('td')[column].textContent.toLowerCase();
        let secondRow = b.querySelectorAll('td')[column].textContent.toLowerCase();

        // Convertir los valores de texto a números para ordenar correctamente
        if (!isNaN(parseFloat(firstRow))) {
            firstRow = parseFloat(firstRow);
            secondRow = parseFloat(secondRow);
        }

        return sortAsc ? (firstRow < secondRow ? 1 : -1) : (firstRow < secondRow ? -1 : 1);
    })
    .map(sortedRow => document.querySelector(`#${tableId} tbody`).appendChild(sortedRow));
}


