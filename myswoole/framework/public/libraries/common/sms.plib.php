<?php
class Sms_Lib
{
    private $_host=''; //服务器IP
    private $_port='';//服务器端口
    private $_userid = '';//用户名
    private $_password = '';//密码

    private static $_conf=array(
    );
    
    private $_error='';
    
    public function send($phones=array(), $pszMsg='',$channel='xy')
    {
        require_once("nusoap/lib/nusoap.php");
        
        $this->_host = isset( self::$_conf[$channel]['host'])?self::$_conf[$channel]['host']:'';
        $this->_port = isset( self::$_conf[$channel]['port'])?self::$_conf[$channel]['port']:'';
        $this->_userid = isset( self::$_conf[$channel]['userid'])?self::$_conf[$channel]['userid']:'';
        $this->_password = isset( self::$_conf[$channel]['password'])?self::$_conf[$channel]['password']:'';
                
        $pszMobis=implode(',', $phones);
        $iMobiCount=count($phones);
        $pszSubPort='*';        
        
        //将对应参数值赋到下面数组以供调用
        $parameters=array(
            'userId'=>$this->_userid,
            'password'=>$this->_password,
            'pszMobis'=>$pszMobis,
            'pszMsg'=>$pszMsg,
            'iMobiCount'=>$iMobiCount,
            'pszSubPort'=>$pszSubPort
        );

        //创建一个soapclient对象，参数是server的WSDL
        $client=new soapclient("http://{$this->_host}:{$this->_port}/MWGate/wmgw.asmx?wsdl");
        $client->soap_defencoding='gb2312';
        $client->decode_utf8=true;
        $this->_returnContents=$client->call('MongateCsSpSendSmsNew', $parameters);
        return true;
    }

    public function getError()
    {
        return $this->_error;
    }

    public function getReturnContents()
    {
        return $this->_returnContents;
    }

}