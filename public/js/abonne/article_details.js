document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez tous les boutons "Répondre"
    const replyTriggers = document.querySelectorAll('.reply-trigger');

    replyTriggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            // Trouvez le formulaire de réponse associé à ce bouton
            const replyForm = trigger.nextElementSibling;

            // Basculer l'affichage du formulaire
            if (replyForm.style.display === 'none' || !replyForm.style.display) {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        });
    });

    // Sélectionnez tous les boutons "Annuler"
    const cancelButtons = document.querySelectorAll('.reply-cancel');

    cancelButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Trouvez le formulaire de réponse associé à ce bouton
            const replyForm = button.closest('.reply-form');

            // Masquer le formulaire
            replyForm.style.display = 'none';
        });
    });
});