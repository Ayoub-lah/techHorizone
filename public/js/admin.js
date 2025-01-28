document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarToggleDesktop = document.getElementById('sidebarToggleDesktop');
    const mainContent = document.querySelector('.main-content');

    function toggleSidebar() {
        sidebar.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleSidebar();
        });
    }

    if (sidebarToggleDesktop) {
        sidebarToggleDesktop.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleSidebar();
        });
    }

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function(event) {
        const isClickInside = sidebar.contains(event.target) ||
                              (sidebarToggle && sidebarToggle.contains(event.target)) ||
                              (sidebarToggleDesktop && sidebarToggleDesktop.contains(event.target));

        if (!isClickInside && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    });
});

function filterByName() {
    var input = document.getElementById('searchInput'); // Get the search input
    var filter = input.value.toLowerCase(); // Get the value searched in lowercase
    var rows = document.querySelectorAll('#subscribersTable tbody tr'); // Get all rows in the table body

    rows.forEach(row => {
        // Get the "Nom" column (first cell) of each row
        var nameCell = row.querySelector('td:first-child');

        if (nameCell) {
            var nameText = nameCell.textContent.toLowerCase(); // Convert to lowercase for comparison
            // Show or hide the row based on the filter
            row.style.display = nameText.includes(filter) ? '' : 'none';
        }
    });
}

function filterByTitle() {
    var input = document.getElementById('searchInput'); // Get the search input
    var filter = input.value.toLowerCase(); // Get the value searched in lowercase
    var rows = document.querySelectorAll('#articlesTable tbody tr'); // Get all rows in the table body

    rows.forEach(row => {
        // Get the "Title" column (second cell) of each row
        var titleCell = row.querySelector('td:nth-child(2)'); // Second cell = Title column

        if (titleCell) {
            var titleText = titleCell.textContent.toLowerCase(); // Convert to lowercase for comparison
            // Show or hide the row based on the filter
            row.style.display = titleText.includes(filter) ? '' : 'none';
        }
    });
}
