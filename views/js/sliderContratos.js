var slider = document.querySelector('.contratos .subSlider');

var num = slider.childElementCount;

if (num >= 2) {

    slider.style.gridTemplateColumns = 'repeat(' + num + ', 1fr)'; 

}

function checkSlider () {

    if (window.innerWidth < 375) {

        slider.style.width = 300 * num + 'px';

    }

    if (window.innerWidth >= 375 && window.innerWidth < 425) {

        slider.style.width = 332.5 * num + 'px';

    }

    if (window.innerWidth >= 425 && window.innerWidth < 485) {

        slider.style.width = 385 * num + 'px';
        
    }

    if (window.innerWidth >= 485 && window.innerWidth < 560) {

        slider.style.width = 438 * num + 'px';
        
    }

    if (window.innerWidth >= 560 && window.innerWidth < 628) {

        slider.style.width = 500 * num + 'px';
        
    }

    if (window.innerWidth >= 628 && window.innerWidth < 768) {

        slider.style.width = 566 * num + 'px';
        
    }

    if (window.innerWidth >= 728) {

        slider.style.width = 516.857142857 * num + 'px';
        
    }

}

if (num >= 2) {

    checkSlider();

}

window.addEventListener('resize', () => {

    if (num >= 2) {

        checkSlider();

    }

});