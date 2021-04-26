var headerTop = document.querySelector('.mobileHeader .top');
var menu = document.querySelector('.mobileHeader .top .right a');
var menuDisplay = document.querySelector('.menuDisplay');

window.addEventListener('scroll', function (){
    
    if (this.pageYOffset >= 50) {
        
        headerTop.style.backgroundColor = 'rgba(0, 0, 0, .6)';

    } else {

        headerTop.style.backgroundColor = 'rgba(0, 0, 0, 0)';

    }

});

menu.addEventListener('click', function(){

    menu.style.opacity = '0';
    
    setTimeout(() => {

        var icon = this.querySelector('img').src.split('/').reverse()[0];

        if (icon == 'menu.svg') {

            this.querySelector('img').src = 'views/img/close.svg';

        } else {

            this.querySelector('img').src = 'views/img/menu.svg';

        }

    }, 250);

    setTimeout(() => {
        menu.style.opacity = '1'
    }, 250);

    if (menuDisplay.style.left == '-' + (menuDisplay.clientWidth + 6).toString() + 'px' || menuDisplay.style.left == '') {

        menuDisplay.style.left = '0';
        
    } else {

        menuDisplay.style.left = '-' + (menuDisplay.clientWidth + 6).toString() + 'px';

    }

});

