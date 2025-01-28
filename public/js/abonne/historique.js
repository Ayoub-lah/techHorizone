document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const tableRows = document.querySelectorAll('.table tbody tr');

    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const filterValue = filterSelect.value;

        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const date = row.querySelector('td:nth-child(4)').textContent;
            let showRow = text.includes(searchTerm);

            if (filterValue === 'recent') {
                showRow = showRow && isRecent(date);
            } else if (filterValue === 'old') {
                showRow = showRow && !isRecent(date);
            }

            row.style.display = showRow ? '' : 'none';
        });
    }

    function isRecent(dateString) {
        const date = new Date(dateString.split(' ')[0].split('/').reverse().join('-'));
        const now = new Date();
        const thirtyDaysAgo = new Date(now.setDate(now.getDate() - 30));
        return date >= thirtyDaysAgo;
    }
});