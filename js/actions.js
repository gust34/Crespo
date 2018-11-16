function openMenuMobile () {
    var view = document.getElementById('menu_mobile');
    if (view.style.transform == 'translateX(100%)') {
        view.style.transform = 'translateX(0)';
    } else {
        view.style.transform = 'translateX(100%)'
    }
}
