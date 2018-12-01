<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author Administrador
 */
class Connection {
    //put your code here
    private static $instance;
    private static $file;
    
    public static function open(){
        if(file_exists('../../Apllication/core/configuration/database.ini')){
            self::$file = parse_ini_file('../../Apllication/core/configuration/database.ini');
        }else if(file_exists('../Apllication/core/configuration/database.ini')){
            self::$file = parse_ini_file('../Apllication/core/configuration/database.ini');
        }else if(file_exists('Apllication/core/configuration/database.ini')){
            self::$file = parse_ini_file('Apllication/core/configuration/database.ini');
        }else if(file_exists('core/configuration/database.ini')){
            self::$file = parse_ini_file('core/configuration/database.ini');
        }
        return self::$file;
    } 


    public static function getInstance(){
        $conf = self::open();
        if(!self::$instance){
            self::$instance = new PDO("{$conf['driver']}:host={$conf['host']};port={$conf['port']};dbname={$conf['database']}","{$conf['user']}","{$conf['pass']}");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

?>
