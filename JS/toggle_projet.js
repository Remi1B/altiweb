document.querySelectorAll('.toggle-title').forEach(title => {
    title.addEventListener('click', () => {
        const content = title.nextElementSibling;

        // Vérifie si le contenu est déjà ouvert
        if (content.classList.contains('open')) {
            // Ferme le contenu
            content.style.height = '0';
            content.classList.remove('open');
            title.classList.remove('open');

        } else {
            // Ouvre le contenu en ajustant dynamiquement la hauteur
            content.style.height = 'auto'; // Ajuste automatiquement à la hauteur du contenu
            content.classList.add('open');
            title.classList.add('open');
        }
    });
});