<?php
/**
 * Description of xxtea
 *
 * @author Marco
 */
class xxtea_lib {
    //put your code here
    
    const PIVATEKEY='Qghq&)hfw*$&UHI___';
    public static function encode($value,$base64=true){
        return xxTea::encrypt($value, self::PIVATEKEY,$base64);
    }
    
    public static function decode($value,$base64=true){
        return xxTea::decrypt($value, self::PIVATEKEY,$base64);
    }
}