<div class="menuDisplay">
    <h2>Inweb</h2>
    <ul>
        <li><a href="#"><p class="img"><img src="views/img/home.svg" alt="Panel"></p><p class="text">Panel</p></a></li>
        <li><a href="#"><p class="img"><img src="views/img/config.svg" alt="Ajustes"></p><p class="text">Ajustes</p></a></li>
        <li><a href="#"><p class="img"><img src="views/img/support.svg" alt="Soporte"></p><p class="text">Soporte</p></a></li>
        <li><a href="#"><p class="img"><img src="views/img/mail.svg" alt="Correos"></p><p class="text">Correos</p></a></li>
        <li><a href="#"><p class="img"><img src="views/img/door.svg" alt="Cerrar sesión"></p><p class="text">Cerrar sesión</p></a></li>
    </ul>
</div>

<div id="mainContent">
    <div class="pattern">
        <div class="mainWrapper">


        <div class="mobileHeader">
            <div class="pattern">
                <div class="top">
                    <div class="wrapper">
                        <div class="left">
                            <h1>Inweb</h1>
                        </div>
                        <div class="right">
                            <a href="javascript:void(0)">
                                <img src="views/img/menu.svg" alt="Menu">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <h2>
                        <?php
                        
                        switch($page) {
                            case 'paginaPrincipal':
                                echo 'Pagina principal';
                            break;
                        }
                        
                        ?>
                    </h2>
                </div>
            </div>
        </div>

