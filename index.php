<?php

$page = 'paginaPrincipal';

include_once 'controllers/controllerSessionValidate.php';

include_once 'views/htmlStart.php';
include_once 'views/header.php';

?>

<div class="container up pagarTodo">
    <div class="left">
        <img src="views/img/cardIcon.png" alt="Card">
    </div>
    <div class="center">
        <div class="central">
            <p>Total a pagar</p>
            <p class="total">$199.999</p>
        </div>
    </div>
    <div class="right">
        <a class="btn" href="#">Pagar todo</a>
    </div>
</div>


<div class="title">
    <h2>Contratos</h2>
</div>

<div class="slider contratos">
    <div class="subSlider">
        <div class="container contrato">
            <h2>Empresa Ltda.</h2>
            <table>
                <tr>
                    <td>Dominio</td>
                    <td class="info">empresa.cl</td>
                </tr>
                <tr>
                    <td>Precio anual</td>
                    <td class="info">$299.000</td>
                </tr>
                <tr>
                    <td>Prox. Vencimiento</td>
                    <td class="info">26/04/2021</td>
                </tr>
                <tr>
                    <td>Plazo de pago</td>
                    <td class="info">Anual</td>
                </tr>
            </table>
            <a class="btn" href="#">Pagar</a>
        </div>
    </div>
</div>

<div class="title">
    <h2>Últimas transacciones</h2>
</div>

<div class="container transacciones">
    <table>
        <tr>
            <th>Orden de pago</th>
            <th>Fecha</th>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
        <tr>
            <td><a href="#">IW-08-1002</a></td>
            <td>27/03/2021</td>
        </tr>
    </table>
</div>

<script src="views/js/sliderContratos.js"></script>

<?php

include_once 'views/footer.php';
include_once 'views/htmlEnd.php';

?>