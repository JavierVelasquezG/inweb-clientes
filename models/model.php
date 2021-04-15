<?php

require __DIR__ . '/../models/config.php';

require __DIR__ . '/../models/modelDB.php';
require __DIR__ . '/../models/modelCpanel.php';
require __DIR__ . '/../models/modelLogin.php';
require __DIR__ . '/../models/modelPayments.php';

class ExtraFunctions {
    public function verifyArray($array) {
        $nombres = (array_keys($array));
        $tamano = sizeof($nombres);
        
        if ($tamano <= 0) {
            
            return false;
            
        }
    
        for ($i = 0; $i < $tamano; $i++) {
    
            if ($array[$nombres[$i]] == '') {
                return false;
            }
        }
        
        return true;
        
    }

    public function dotFormat($num) {
        $array  = array_map('intval', str_split($num));
        $array_r = array_reverse($array);
        
        $len = strlen($num);
        
        if ($len < 4) {
            return $num;
        }
        
        if (!is_float($len / 3)) {
            $can = ($len / 3) - 1;
        } elseif (!is_float(($len + 1) / 3)) {
            //Coma menos 1
            $can = (($len + 1) / 3) - 1;
        } else {
            //Coma menos 2
            $can = (($len + 2) / 3) - 1;
        }
        
        for ($i = 0; $i < $can; $i++) {
            array_splice($array_r, (3 + (4 * $i)), 0, '.');
        }
        
        $pre = array_reverse($array_r);
        $fin = implode($pre);
        return $fin;
    }

    public function echoArray($array) {

        echo '<pre>';
        print_r($array);
        echo '</pre>';

    }
}

//Instancia Database en $db
$db = new DataBase;

$sql = "SET NAMES 'utf8'";

try {

    $res = $db->free($sql);

} catch (Exception $e) {

    echo 'Error:' . $e->getMessage();
    echo '<br>';
    echo 'Codigo:' . $e->getCode();

}

?>