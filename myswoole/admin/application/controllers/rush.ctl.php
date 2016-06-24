<?php

/*
 * 控制无限副本
 */

/**
 * Description of rush
 *
 * @author caimengchan
 */
class Rush_Controller extends Module_Lib{
    /**
     * 无限副本相关信息
     */
    public function info(){
        $server = Helper_Lib::getGet('server', 'int');
        $select = Helper_Lib::getGet('select');
        $value = Helper_Lib::getGet('value');
        if (empty($server) && empty($select) && empty($value) && Helper_Lib::getCookie('search')) {
            $search = json_decode(Helper_Lib::getCookie('search'), true);
            $server = $search['sid'];
            $select = $search['selected'];
            $value = $search['value'];
        }
        $uid = '';
        if (!empty($server)) {
            if (!Helper_Lib::registyPtSid(Helper_Lib::getCookie('platform'), $server)) {
                throw new Exception_Lib(-1, '平台或区服异常，注册失败！');
            }
            
            $uid = Public_Service::getUidBySelect($server, $select, $value);
            if (!empty($uid)) {
                $rushBattle = Rush_Service::getRushBattleByUid($uid);
            }
        }
        $uid && $data['uid'] = $uid;
        $select && $data['select'] = $select;
        $value && $data['value'] = $value;
        $server && $data['sid'] = $server;
        $rushBattle && $data['rushBattle'] = $rushBattle;
        $this->load_view('rush_info',$data);
    }
    
    public function editMaxRound(){
         try {
            $server = Helper_Lib::getPost('server', 'server', 0, false);
            if (!Helper_Lib::registyPtSid(Helper_Lib::getCookie('platform'), $server)) {
                throw new Exception_Lib(-1, '平台或区服异常，注册失败！');
            }

            $uid = Helper_Lib::getPost('uid', 'string', '', false);
            $maxRound = Helper_Lib::getPost('maxRound', 'int', 0, false);
            /*$uid = Public_Service::getUidBySelect($server, 'openuid', $openuid);
            if (empty($uid)) {
                throw new Exception_Lib(-3, '用户不存在!');
            }
             * 
             */
            
            $data = array('uid' => $uid, 'max_round' => $maxRound);
            $ret = Rush_Service::updateRush($uid, $server, $data);

            if (!$ret) {
                throw new Exception_Lib(-2, '修改最大回合数失败');
            }
            $this->outputJson(0, "修改最大回合数成功");
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
    
}
