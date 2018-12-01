<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestUtil
 *
 * @author CNTIP021
 */
class RequestUtil {

    //put your code here

    public static function manageRequest() {
        try {
            if (!isset($_POST['field']) && !isset($_GET['field']) && !isset($_GET['param']) && !isset($_GET['requi']))
                throw new Exception("Não existe nenhuma requisição (field) via GET, ou POST ou passagem de param");

            if (!isset($_GET['requi'])) {
                if (isset($_POST['field']))
                    return self::getPOST();
                else if (@$_GET['field'])
                    return self::getGET();
                else
                    return self::UrlRequest();
            }
        } catch (Exception $e) {
            echo "<br>" . $e->getMessage();
        }
    }

    public static function getGET() {
        if (!@$_GET['field'])
            throw new Exception("Não existe nenhum field na requisição via GET");
        return $_GET['field'];
    }

    public static function getPOST() {
        if (!@$_POST['field'])
            throw new Exception("Não existe nenhum field na requisição via POST");
        return $_POST['field'];
    }

    public static function UrlRequest() {
        if (!@$_GET['param'])
            throw new Exception("Não existe nenhuma requisição");
        return $_GET['param'];
    }

}

?>
