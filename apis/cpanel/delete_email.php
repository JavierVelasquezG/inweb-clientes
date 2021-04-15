<?php

require 'cPanel/cPanel.php';

$cpanel = new cPanel('inwebcl', 'Amyyyslmbdm2002.', '186.64.116.220');

// Delete user@example.com.
$return = $cpanel->uapi(
    'Email', 'delete_pop',
    array(
        'email'           => 'email',
        'domain'          => 'domain',
        )
);

echo '<pre>';
var_dump($return);
echo '</pre>';

?>