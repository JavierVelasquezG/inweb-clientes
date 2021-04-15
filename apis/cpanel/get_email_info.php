<?php

require 'cPanel/cPanel.php';

$cpanel = new cPanel('inwebcl', 'Amyyyslmbdm2002.', '186.64.116.220');

// Retrieve the email client settings for newuser@example.com.
$return = $cpanel->uapi(
    'Email', 'get_client_settings',
    array(
        'account'              => 'ventas@mydchile.cl'
        )
);


echo '<pre>';
var_dump($return);
echo '</pre>';

?>