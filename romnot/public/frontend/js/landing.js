document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('.cercle img');
    const buttons = document.querySelectorAll('.btn-small');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const index = button.getAttribute('data-index');

            images.forEach((img, i) => {
                img.classList.remove('active');
                if (i == index) {
                    img.classList.add('active');
                }
            });

            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });
});
