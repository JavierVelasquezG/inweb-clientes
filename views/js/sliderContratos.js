var slider = document.querySelector('.contratos .subSlider');

var num = slider.childElementCount;

if (num >= 2) {

    slider.style.width = 300 * num + 'px';
    slider.style.gridTemplateColumns = 'repeat(' + num + ', 1fr)'; 

}

if (window.innerWidth == 320) {
    console.log('hola');
}

window.addEventListener('resize', function(){

    console.log('resize');

});