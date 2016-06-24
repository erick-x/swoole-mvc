<?php

/*
 * 平台添加
 */

/*
*获取所有平台列表
*/
class Platform_Service {
    public static function getAllPlatform($page, $pagesize) {
        $db = new Platform_Model();
        return $db->getAllPlatform($page, $pagesize);
    }

    public static function getPlatforms() {
        $db = new Platform_Model();
        return $db->getPlatforms();
    }
    public static function getPlatformTotal() {
        $db = new Platform_Model();
        return $db->getPlatformTotal();
    }
    /**
     * 添加一个平台
     * @param type $data
     * @return type
     */
    public static function insert($data) {
        $db = new Platform_Model();
        return $db->insert($data);
    }

    /**
     * 更新一个平台
     * @param type $id
     * @param type $data
     * @return type
     */
    public static function update($id, $data){
        $db = new Platform_Model();
        return $db->update($id, $data);
    }
}
