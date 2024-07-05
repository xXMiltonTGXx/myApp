document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-menu');

    menuButton.addEventListener('click', function() {
        menu.classList.toggle('hidden');
    });
});
