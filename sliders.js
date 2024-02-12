// ------------------SLIDERS------------------------------------

let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};

//////////////////////////////////////////////////
// Seleccionar todos los botones "Leer Más" por su clase
const openButtons = document.querySelectorAll('.open-button');

// Añadir un evento de clic a cada botón "Leer Más"
openButtons.forEach(openButton => {
    openButton.addEventListener('click', () => {
        // Seleccionar la ventana emergente correspondiente a este botón
        const windowBackground = openButton.parentElement.querySelector('.window-background');
        
        // Mostrar la ventana emergente
        windowBackground.style.display = 'flex';
    });
});

// Seleccionar todos los botones "Cerrar" por su clase
const closeButtons = document.querySelectorAll('.close-button');

// Añadir un evento de clic a cada botón "Cerrar"
closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', () => {
        // Seleccionar el contenedor de la ventana emergente
        const windowBackground = closeButton.closest('.window-background');
        
        // Ocultar la ventana emergente
        windowBackground.style.display = 'none';
    });
});

// Añadir un evento de clic al fondo de la ventana emergente para cerrarla
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('window-background')) {
        // Ocultar la ventana emergente
        e.target.style.display = 'none';
    }
});
