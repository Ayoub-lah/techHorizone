


const topics = [
    'Programmation', 'Science des données', 'Technologie', 'Développement personnel',
    'Écriture','Intelligence Artificielle', 'Cybersécurité', 'IoT', 'Réalité Virtuelle',
    
];

const selectedTopics = new Set();
const topicsContainer = document.getElementById('topicsContainer');
const continueButton = document.getElementById('continueButton');
const themesInput = document.getElementById('themesInput');

// Create topic buttons
topics.forEach(topic => {
    const button = document.createElement('button');
    button.type = 'button'; // Prevent form submission
    button.className = 'topic-button';
    button.innerHTML = `
        ${topic}
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
        </svg>
    `;

    button.addEventListener('click', () => toggleTopic(button, topic));
    topicsContainer.appendChild(button);
});

function toggleTopic(button, topic) {
    if (selectedTopics.has(topic)) {
        selectedTopics.delete(topic);
        button.className = 'topic-button';
        button.querySelector('svg').innerHTML = `
            <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
        `;
    } else {
        selectedTopics.add(topic);
        button.className = 'topic-button selected';
        button.querySelector('svg').innerHTML = `
            <path d="M20 6L9 17l-5-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        `;
    }

    // Update continue button state
    if (selectedTopics.size >= 3) {
        continueButton.classList.add('active');
        continueButton.disabled = false;
    } else {
        continueButton.classList.remove('active');
        continueButton.disabled = true;
    }

    // Update hidden input with selected topics
    themesInput.value = JSON.stringify(Array.from(selectedTopics));
}

// Handle form submission
document.getElementById('interestsForm').addEventListener('submit', (e) => {
    if (selectedTopics.size < 3) {
        e.preventDefault(); // Prevent form submission if less than 3 topics are selected
        alert('Veuillez sélectionner au moins trois sujets.');
    }
});