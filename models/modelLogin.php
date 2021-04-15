<?php

class Login {
    private $conn;

    public function prepareLogin ($email) {
        $this->conn = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $stmt = $this->conn->prepare("SELECT ID, /*NOMBRE, APELLIDO,*/CORREO, CONTRASENA FROM clientes WHERE CORREO = ?");

        if (!$stmt) {

			throw new Exception($this->conn->error, $this->conn->errno);

        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id_bd, /*$nombre_bd, $apellido_bd,*/ $email_bd, $pass_bd);
        $stmt->store_result();

        while ($stmt->fetch()) {

            $data = array(
                "id" => $id_bd,
                "correo" => $email_bd,
                "contrasena" => $pass_bd,
                //"nombre" => $nombre_bd,
                //"apellido" => $apellido_bd,
                "num_rows" => $stmt->num_rows
            );

			return $data;
    
        }

		return false;
		
    }

    public function enviarMailRecuperacion ($email, $titulo, $nombre, $hash) {
    
        $mensaje = '<!DOCTYPE html>
        <html lang="es">
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
        @import url("https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap");
        * {
          margin: 0;
          padding: 0;
          border: none;
          -webkit-box-sizing: border-box;
          box-sizing: border-box; }
        
        .under {
          position: relative;
          background: black;
          background: -moz-linear-gradient(90deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: -webkit-linear-gradient(90deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: -o-linear-gradient(90deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: -ms-linear-gradient(90deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(0%, rgba(92, 200, 255, 0.2)));
          background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);
          background: linear-gradient(180deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%); }
        
        body {
          background-color: #fff !important; }
        
        #wrapper {
          font-family: "Raleway", sans-serif;
          background-color: #fff;
          max-width: 800px;
          margin: 0 auto; }
          #wrapper #header {
            padding: 30px 30px 0 30px; }
            #wrapper #header .img {
              text-align: center; }
              #wrapper #header .img img {
                width: 130px; }
          #wrapper #main {
            padding: 5px;
            max-width: 600px;
            margin: 30px auto; }
            #wrapper #main .pattern {
              display: none; }
            #wrapper #main .wrapper {
              background-color: #F3F3F3;
              padding: 10px;
              font-size: 1rem; }
              #wrapper #main .wrapper .content .title {
                font-weight: 500;
                font-size: 1.4rem;
                padding-bottom: 5px; }
              #wrapper #main .wrapper .firma {
                padding: 10px 0;
                font-size: 1.1rem; }
                #wrapper #main .wrapper .firma .left {
                  text-align: left; }
                #wrapper #main .wrapper .firma .right {
                  text-align: right; }
          #wrapper #footer {
            margin: 0 auto;
            background-color: #131313;
            text-align: center;
            padding: 15px;
            max-width: 600px; }
            #wrapper #footer a {
              color: rgba(255, 255, 255, 0.5) !important;
              text-decoration: none !important; }
        
            </style>
        </head>
        <body style="background-color: #fff !important;">
            
            <div id="wrapper" style="font-family: "Raleway", sans-serif;background-color: #fff;max-width: 800px;margin: 0 auto;">
                <div id="header" style="padding: 30px 30px 0 30px;">
                    <div class="img" style="text-align: center;">
                        <img src="https://inweb.cl/img/inweb-logo.png" alt="Inweb" style="width: 130px;">
                    </div>
                </div>
                <div id="main" style="padding: 5px;max-width: 600px;margin: 30px auto;">
                    <div class="wrapper" style="background-color: #F3F3F3;padding: 10px;font-size: 1rem;">
                        <div class="content">
                            <p class="title" style="font-weight: 500;font-size: 1.4rem;padding-bottom: 5px;"><span class="under" style="position: relative;background: linear-gradient(180deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);">Recuperaci&oacute;n de contrase&ntilde;a</span></p>
                            Hola '. $nombre .',
                            <br><br>
                            Para cambiar tu contrase&ntilde;a ingresa al siguiente enlace: <br>
                            <a href="https://clientes.inweb.cl/cambiar_contrasena.php?code='. $hash .'">Cambiar contrase&ntilde;a</a>
                        </div>
                        <div class="firma" style="padding: 10px 0;font-size: 1.1rem;">
                            <p class="left" style="text-align: left;">Atentamente,</p>
                            <p class="right" style="text-align: right;"><span class="under" style="position: relative;background: linear-gradient(180deg, rgba(0, 0, 0, 0) 50%, rgba(92, 200, 255, 0.2) 0%);">Equipo de Inweb</span></p>
                        </div>
                    </div>
                </div>
        
                <div id="footer" style="margin: 0 auto;background-color: #131313;text-align: center;padding: 15px;max-width: 600px;">
                    <a href="https://inweb.cl/" style="color: rgba(255, 255, 255, 0.5) !important;text-decoration: none !important;">inweb.cl</a>
                </div>
        
            </div>
        
        </body>
        </html>';

        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

        $headers .= "To: $nombre <$email>" . "\r\n";
        $headers .= "From: Inweb <no-reply@inweb.cl>" . "\r\n";

        $result = mail($email, $titulo, $mensaje, $headers);

        return $result;
    }
}

?>