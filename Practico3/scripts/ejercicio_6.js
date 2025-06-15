const items = document.querySelectorAll('.item-menu');


items.forEach(item =>{
    const link = item.querySelector('.marca-auto');
    const submenu = item.querySelector('.sub-menu');

    link.addEventListener('mouseover', () => {
        submenu.classList.remove('oculto');
        submenu.classList.add('visible');
    });

    item.addEventListener('mouseleave', () => {
        submenu.classList.add('oculto');
        submenu.classList.remove('visible');
    });
});