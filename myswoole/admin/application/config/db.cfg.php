<?php

/**
 * Description of db
 *
 * @author Marco
 */
class Db_Config {

    //put your code here

    public static function mydb_callback_server($params) {

        if (!is_array($params))
            return false;

        $const_table = $params['0'];
        $hash_param = $params['1'];
        $need_hash = $params['2'] ? $params['2'] : true;
        $hash = ($hash_param && $need_hash) ? md5($hash_param) : null;


        if (SETDB === 1) {

            $host = '127.0.0.1';
            $user = "root";
            $pass = "*******";
			
            switch ($const_table) {
                case 'platform':
                    $database || $database = "db"	;
                    $table = 'tb_platform';
                    $table_alias = 'platform';
                    break;
                    break;		
                default:
                    $database || $database = "db";
                    $table = 'tb_' . $const_table;
                    $table_alias = $const_table;
                    break;
            }
        }

        if (SETDB === 0 || SETDB === 2) {

                $host = '127.0.0.1';
            $user = "root";
            $pass = "*******";
			
            switch ($const_table) {
                case 'platform':
                    $database || $database = "db"	;
                    $table = 'tb_platform';
                    $table_alias = 'platform';
                    break;
                    break;		
                default:
                    $database || $database = "db";
                    $table = 'tb_' . $const_table;
                    $table_alias = $const_table;
                    break;
            }
        }

        $port || $port = 3306;
        $ret = array
            (
            'host' => $host,
            'port' => $port,
            'user' => $user,
            'pass' => $pass,
            'dbname' => $database,
            'table' => $table,
            'table_alias' => $table_alias
        );
        return $ret;
    }

}

?>
