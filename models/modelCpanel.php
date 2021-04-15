<?php

require __DIR__ . '/../apis/cpanel/cPanel/cPanel.php';

class cpanelApi {
    private $cpanel;

    public function __construct () {
        try {

            $this->cpanel = new cPanel(CPANEL_USER, CPANEL_PASS, CPANEL_HOST);

        } catch (Exception $e) {

            echo "Conexion fallida (cPanel) " . $e->getMessage();

        }
    }

    public function createEmail ($user, $pass, $domain, $quota = 0) {
        $result = $this->cpanel->uapi(
            'Email', 'add_pop',
            array(
                'email'           => "$user",
                'password'        => "$pass",
                'quota'           => "$quota",
                'domain'          => "$domain",
                'skip_update_db'  => '0',
                )
        );

        if ($result->status == 0) {

            throw new Exception($result->errors[0]);

        }

        return $result;
    }

    public function deleteEmail ($email, $domain) {
        $result = $this->cpanel->uapi(
            'Email', 'delete_pop',
            array(
                'email'           => "$email",
                'domain'          => "$domain",
                )
        );

        if ($result->status == 0) {

            throw new Exception($result->errors[0]);

        }

        return $result;
    }

    public function getEmailData ($email) {
        $result = $this->cpanel->uapi(
            'Email', 'get_client_settings',
            array(
                'account'              => "$email"
                )
        );

        if ($result->status == 0) {

            throw new Exception($result->errors[0]);

        }

        return $result;
    }

    public function changeEmailPass ($user, $pass, $domain) {
        $result = $this->cpanel->uapi(
            'Email', 'passwd_pop',
            array(
                'email'           => "$user",
                'password'        => "$pass",
                'domain'          => "$domain",
                )
        );

        if ($result->status == 0) {

            throw new Exception($result->errors[0]);

        }

        return $result;
    }

    public function passStrength () {
        //TODO
    }

}

?>