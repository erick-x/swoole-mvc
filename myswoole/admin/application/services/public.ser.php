<?php

/*
 * 公共的service方法
 */
class Public_Service {   
    /**
     * 返回前端的地址
     * @param type $platform
     * @param type $sid
     * @return string
     */
    public static function returnFontHost($platform=0,$sid=0) {
        $host = 'http://192.168.78.27:9080';
        return $host;
    }
}
