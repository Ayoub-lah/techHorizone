document.addEventListener('DOMContentLoaded', function() {
    // Function to initialize slider for posts
    function initializePostsSlider(gridSelector, prevBtnId, nextBtnId, cardSelector) {
        const grid = document.querySelector(gridSelector);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);
        const cards = document.querySelectorAll(cardSelector);
        const cardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(cards[0]).marginRight);
        let currentIndex = 0;

        function updateButtonVisibility() {
            prevBtn.style.display = currentIndex > 0 ? 'block' : 'none';
            nextBtn.style.display = currentIndex < cards.length - 3 ? 'block' : 'none';
        }

        function scroll(direction) {
            if (direction === 'next' && currentIndex < cards.length - 3) {
                currentIndex++;
            } else if (direction === 'prev' && currentIndex > 0) {
                currentIndex--;
            }
            grid.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            updateButtonVisibility();
        }

        prevBtn.addEventListener('click', () => scroll('prev'));
        nextBtn.addEventListener('click', () => scroll('next'));

        // Initial setup
        updateButtonVisibility();

        // Update on window resize
        window.addEventListener('resize', () => {
            const newCardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(cards[0]).marginRight);
            if (newCardWidth !== cardWidth) {
                currentIndex = 0;
                grid.style.transform = 'translateX(0)';
                updateButtonVisibility();
            }
        });
    }

    // Function to initialize pagination for magazines
    function initializeMagazinesPagination(gridSelector, prevBtnId, nextBtnId, cardSelector) {
        const grid = document.querySelector(gridSelector);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);
        const cards = document.querySelectorAll(cardSelector);
        const cardsPerPage = 3;
        let currentPage = 0;

        function showMagazines(page) {
            const startIndex = page * cardsPerPage;
            const endIndex = startIndex + cardsPerPage;

            cards.forEach((card, index) => {
                if (index >= startIndex && index < endIndex) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function updateButtons() {
            prevBtn.disabled = currentPage === 0;
            nextBtn.disabled = currentPage >= Math.ceil(cards.length / cardsPerPage) - 1;
        }

        prevBtn.addEventListener('click', () => {
            if (currentPage > 0) {
                currentPage--;
                showMagazines(currentPage);
                updateButtons();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentPage < Math.ceil(cards.length / cardsPerPage) - 1) {
                currentPage++;
                showMagazines(currentPage);
                updateButtons();
            }
        });

        // Initial setup
        showMagazines(currentPage);
        updateButtons();
    }

    // Initialize posts slider
    initializePostsSlider('.posts-grid', 'postPrevBtn', 'postNextBtn', '.post-card');

    // Initialize magazines pagination
    initializeMagazinesPagination('.magazines-grid', 'magazinePrevBtn', 'magazineNextBtn', '.magazine-card');
});