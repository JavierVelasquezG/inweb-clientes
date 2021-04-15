<?php

require 'cPanel/cPanel.php';

$cpanel = new cPanel('inwebcl', 'Amyyyslmbdm2002.', '186.64.116.220');

$return = $cpanel->uapi(
    'Email', 'add_pop',
    array(
        'email'           => 'test_user',
        'password'        => 'Amyyyslmbdm2002.',
        'quota'           => '0',
        'domain'          => 'inweb.cl',
        'skip_update_db'  => '0',
        )
);

echo '<pre>';
var_dump($return);
echo '</pre>';

?>