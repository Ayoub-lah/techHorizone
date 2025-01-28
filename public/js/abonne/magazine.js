document.addEventListener('DOMContentLoaded', function() {
    const themeSelect = document.getElementById('theme-select');
    const dateSelect = document.getElementById('date-select');
    const magazineCards = document.querySelectorAll('.magazine-card');

    function filterMagazines() {
        const selectedTheme = themeSelect.value;
        const selectedDate = dateSelect.value;

        magazineCards.forEach(card => {
            const cardThemes = card.dataset.themes.split(',');
            const shouldShow = selectedTheme === '' || cardThemes.includes(selectedTheme);
            card.style.display = shouldShow ? 'flex' : 'none';
        });

        const visibleCards = Array.from(magazineCards).filter(card => card.style.display !== 'none');
        if (selectedDate === 'newest') {
            visibleCards.sort((a, b) => b.dataset.date.localeCompare(a.dataset.date));
        } else {
            visibleCards.sort((a, b) => a.dataset.date.localeCompare(b.dataset.date));
        }

        const container = document.querySelector('.magazines-grid');
        visibleCards.forEach(card => container.appendChild(card));
    }

    themeSelect.addEventListener('change', filterMagazines);
    dateSelect.addEventListener('change', filterMagazines);
});