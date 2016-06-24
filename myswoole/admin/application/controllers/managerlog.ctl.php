<?php

/*
 * 
 * 管理员操作日志
 */

class ManagerLog_Controller extends Module_Lib {

    public function show() {
        $creatTime = Helper_Lib::getGet('createTime', 'int');
        $endtime = Helper_Lib::getGet('endtime','int');
        $account = Helper_Lib::getGet('account');
        $page = Helper_Lib::getGet('p', 'int', 1);
        $pagesize = Helper_Lib::getGet('pagesize', 'int', 15);
        $aWhere = array();

        $creatTime&$aWhere['createTime'] = $creatTime;
        $endtime&$aWhere['endtime'] = $endtime;
        $account && $aWhere['account'] = $account;
        
        $managerLogs = ManagerLog_Service::getManagerLog($aWhere,$page,$pagesize);
        $total = ManagerLog_Service::getTotal($aWhere);
        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        
        $data = array(
            'pagehtml' => $pagehtml,
            'account'=> $account,
            'logs'  => $managerLogs,
        );
        $this->load_view('managerLog', $data);
		
    }
}
