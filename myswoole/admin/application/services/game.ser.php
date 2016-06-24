<?php

/* 
 * game service
 */

class Game_Service{

    public static function addServer($platform,$serverid,$type,&$stServer){
        
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['sid_ip'],$stServer['sid_port']);
        if( !$socket )
        {
            return false;	
        }

        //封装消息到protobuf中
        $sendMsg = $handler->ServerNotify($platform,$serverid,$type);
        $flag = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$flag )
        {
            return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $ret = $handler->ProcMsg($RequestServer);
            if($ret)
            {
                $result = $handler->ProCommondRet($RequestServer);
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                unset($handler);
                echo $e->getMessage();	
        }	
        unset($handler);
        return $result;
    }   
    
    //添加白名单
    public static function AddWhite($uin,$istate,&$stServer)
    {
            $handler = Socket_Model::getInstance();
            $socket = $handler->InitSocket($stServer['sid_ip'],$stServer['sid_port']);
            if( !$socket )
            {
                return false;	
            }
            $sendMsg = $handler->AddWhiteRequest($uin,$istate);
            $ret = $handler->SendMsg($sendMsg);
            $result = false;
            if( !$ret )
            {
                return false;	
            }
            try
            {
                $RequestServer = new PbProtocolCSMsg();
                $RequestServer->reset();
                $ret = $handler->ProcMsg($RequestServer);
                if($ret)
                {
                    $result = $handler->ProCommondRet($RequestServer);
                }
                unset($RequestServer);
            }catch (Exception $e)
            {	
                    unset($handler);
                    echo $e->getMessage();	
            }	
            unset($handler);
            return $result;
    }

    //拉取角色信息
    public static function EditRole(&$Server,$strAccount,$stParam,$type){
        
		$handler = Socket_Model::getInstance();
	
		$socket = $handler->InitSocket($Server['zoneserver_ip'],$Server['zoneserver_port']);
                if( !$socket )
                {
                    return 0;	
                }
		$sendMsg = $handler->FetchRoleInfo($strAccount,$type,$stParam,$Server['sid'],2);
		$result = $handler->SendMsg($sendMsg);
		if( !$result )
		{
                    return 0;	
		}
                try
                {
                    //接收并解析协议
                    $RequestServer = new PbProtocolCSMsg();
                    $RequestServer->reset();
                    $ret = $handler->ProcMsg($RequestServer);
                    if($ret)
                    {
                       $stGameUser = $handler->ProcPveInfo($RequestServer);
                       if(empty($stGameUser))
                       {
                            unset($RequestServer);
                            unset($handler);
                            return 0;
                       }
                    }  else {
                        unset($RequestServer);
                        unset($handler);
                        return 0;
                    }
                    unset($RequestServer);
                }catch (Exception $e)
		{	
                        unset($RequestServer);
                        unset($handler);
			echo $e->getMessage();
                        return 0;
		}

		unset($handler);
                return $stGameUser;
    }
    //拉取角色信息
    public static function show(&$Server,$strAccount,$stParam,$type){
        
		$handler = Socket_Model::getInstance();
	
		$socket = $handler->InitSocket($Server['zoneserver_ip'],$Server['zoneserver_port']);
                if( !$socket )
                {
                    return 0;	
                }
		$sendMsg = $handler->FetchRoleInfo($strAccount,$type,$stParam,$Server['sid'],1);
		$result = $handler->SendMsg($sendMsg);
		if( !$result )
		{
                    return 0;	
		}
                try
                {
                    //接收并解析协议
                    $RequestServer = new PbProtocolCSMsg();
                    $RequestServer->reset();
                    $ret = $handler->ProcMsg($RequestServer);
                    if($ret)
                    {
                       $stGameUser = $handler->ProcRoleInfo($RequestServer);
                       if(empty($stGameUser))
                       {
                            unset($RequestServer);
                            unset($handler);
                            return 0;
                       }
                    }  else {
                        unset($RequestServer);
                        unset($handler);
                        return 0;
                    }
                    unset($RequestServer);
                }catch (Exception $e)
		{	
                        unset($RequestServer);
                        unset($handler);
			echo $e->getMessage();
                        exit;
		}

		unset($handler);
                return Game_Service::dealData($stGameUser);
    }
    
    //处理接收到的数据，格式化各个数据
    public static function dealData($data)
    {
        //获得各个名词库，作为显示使用
        $heroHandler = new LoadHero_Model();
        $propHandler = new LoadProp_Model();
        $equipHandler = new LoadEquip_Model();
        $nameHandler = new LoadName_Model();
        $equipnameHandler =  new LoadEquipName_Model();
        $trinketHandler = new LoadTrinket_Model();
        
        $heroArray  = $heroHandler->getHeroConfig();
        $propArray  = $propHandler->getPropConfig();
        $equipArray = $equipHandler->getEquipConfig();
        $nameArray = $nameHandler->getNameConfig();
        $equipNameArray = $equipnameHandler->getEquipNameConfig();
        $trinketArray = $trinketHandler->getTrinketConfig();
        
        //从接收的数据中分解得到各个数据模块
        $heroInfo = $data['allhero'];
        $ItemInfo = $data['itemall'];
        $buddyInfo = $data['littlebuddy'];
        $formInfo = $data['formhero'];
        
        //英雄和道具以文本ID索引文本名字
        $Namekey = array();
        Game_Service::GetKeytoValue($nameArray,$Namekey,'text_id','text_name');

        //装备以文本ID索引文本名字
        $stEquipNameKey = array();
        Game_Service::GetKeytoValue($equipNameArray,$stEquipNameKey,'text_id','text_name');
        
        
        //以英雄的ID索引文本的ID
        $stHeroKey = array();
        Game_Service::GetKeytoValue($heroArray,$stHeroKey,'hero_id','text_id');
        
        //以道具的ID索引文本ID
        $stPropKey = array();
        Game_Service::GetKeytoValue($propArray,$stPropKey,'prop_id','text_id');
        
        //以装备的ID索引文本ID
        $stEquipKey = array();
        Game_Service::GetKeytoValue($equipArray,$stEquipKey,'equip_id','text_id');
        
        //背包类型键值配对
        $bagTypekey =  array();
        Game_Service::GetKeytoValue($propArray,$bagTypekey,'prop_id','bag_type');
        
        //装备品质键值配对
        $equipQuilty = array();
        Game_Service::GetKeytoValue($equipArray,$equipQuilty,'equip_id','equip_level');
        
        //英雄资质键值表
        $heroQuilty = array();
        Game_Service::GetKeytoValue($heroArray,$heroQuilty,'hero_id','hero_quilty');
        
        
        $BagProp = array();
        $BagEquip= array();
        $BagEquipChip =array();
        $BagTrinket = array();
        $BagTrinketChip = array();
        $BagMatrial = array();
        $BagMatrialChip = array();
        $BagHeroChip = array();
        $ItemBag = array();
        
        $k = 0;
        $m = 0;
        $n = 0;
        $h = 0;
        $g = 0;
        $j = 0;
        $d= 0;
        $s = 0;
        $r = 0;
        
        //对所有英雄进行封装
        $allheroData = array();
        for($i = 0; $i < count($heroInfo);++$i)
        {
            $allheroData[$i]= array( 
                'heroindex'=>$heroInfo[$i]['heroindex'],
                'heroid'=>$heroInfo[$i]['heroid'],
                'heroname'=>$Namekey[$stHeroKey[$heroInfo[$i]['heroid']]],
                'gardestar'=>$heroInfo[$i]['gardestar'],
                'steplevel'=>$heroInfo[$i]['steplevel'],
                'fosterlevel'=>$heroInfo[$i]['fosterlevel'],
                'heroquality'=>$heroQuilty[$heroInfo[$i]['heroid']],
            );
        }
        
        //所有道具进行封装
        for ($i = 0; $i < count($ItemInfo);++$i) {
               
            if(intval($ItemInfo[$i]['itemtype']) === 2)
            {
                switch (intval($bagTypekey[$ItemInfo[$i]['itemid']])) {
                    case 0:
                    {
                        $BagProp[$k++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$Namekey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         ); 
                    }       
                        break;
                    case 1:
                    {
                        $BagEquipChip[$m++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$stEquipNameKey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         );
                    }
                        break;
                    case 2:
                        {
                        $BagHeroChip[$n++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$Namekey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         );
                    } 
                        break;
                    case 3:
                        {
                        $BagTrinketChip[$j++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$stEquipNameKey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         );
                    }
                        break;
                    case 4:
                        {
                        $BagMatrial[$h++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$Namekey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         );
                    }
                        break;
                    case 5:
                        {
                        $BagMatrialChip[$g++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'itemname'=>$Namekey[$stPropKey[$ItemInfo[$i]['itemid']]],
                         );
                    }
                        break;
                    default:
                        break;
                }
            }else if(intval($ItemInfo[$i]['itemtype']) === 1) //装备类型的道具
            {
                $ItemBag[$d++] = array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemname'=>$stEquipNameKey[$stEquipKey[$ItemInfo[$i]['itemid']]],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        );
             
                switch (intval(Game_Service::GetTrinketID($trinketArray,$ItemInfo[$i]['itemid']))) {//饰品和装备
                    case 0:
                    {
                        $enumEquip = Config::get('key.equip');
                        $BagEquip[$s++]= array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemname'=>$stEquipNameKey[$stEquipKey[$ItemInfo[$i]['itemid']]],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        'strenghtlevel'=>$ItemInfo[$i]['strenghtlevel'],
                        'equipquility'=>$enumEquip[$equipQuilty[$ItemInfo[$i]['itemid']]],
                        'heroname'=>$ItemInfo[$i]['formindex'],
                        );
                    }
                        break;
                    case 1:
                    {
                        $BagTrinket[$r++]= array(
                        'itemindex'=>$ItemInfo[$i]['itemindex'],
                        'itemid'=>$ItemInfo[$i]['itemid'],
                        'itemname'=>$stEquipNameKey[$stEquipKey[$ItemInfo[$i]['itemid']]],
                        'itemnum'=>$ItemInfo[$i]['itemnum'],
                        );
                    }
                        break;
                    default:
                        break;
                }
                               
                
            }
        }   
   
        //上阵英雄的装备
        $equip = array(array());
         for($i = 0; $i <10; ++$i)
            {
               for($j = 0; $j < 6;++$j)
              {
                   if($formInfo[$i]['equip'][$j] == -1)
                   {
                       continue;
                   }
                   $itemEquip = Game_Service::getItemByIndex($ItemBag,$formInfo[$i]['equip'][$j]);
                    $equip[$i][$j] = array(
                        'equipid'=>$itemEquip['itemid'],
                        'equipname'=>$itemEquip['itemname']
                    );
              }     
            }  

        //上阵英雄
        $formData = array();
        for($i = 0 ; $i < count($formInfo); ++$i)
        {
            if( $formInfo[$i]['heroindex'] == -1 )
            {
                continue;
            }
            $OneHero = Game_Service::getHeroByIndex($allheroData,$formInfo[$i]['heroindex']) ;  
            if(is_array($OneHero))
            {
                $formData[$i] = array(
                       'heroid'=>$OneHero['heroid'],
                       'heroname'=>$OneHero['heroname'],
                       'equip'=>$equip[$i]
                );
                
                Game_Service::AlterEquip($BagEquip,$i,$OneHero['heroname']);
            }     
        }
      
        
        //返回给前端的数据结构
        $GameData = array(
            'userinfo'=>$data['userinfo'],
            'BagProp'=>$BagProp,
            'BagEquip'=>$BagEquip,
            'BagEquipChip'=>$BagEquipChip,
            'BagTrinket'=>$BagTrinket,
            'BagTrinketChip'=>$BagTrinketChip,
            'BagMatrial'=>$BagMatrial,
            'BagMatrialChip'=>$BagMatrialChip,
            'BagHeroChip'=>$BagHeroChip,
            'herodata'=>$allheroData,
            'formdata'=>$formData 
        );
        return $GameData;
    } 

    //获得对应装备的名字解析
    public static function AlterEquip(&$Array,$index,$heroname)
    {
        for($i = 0;$i < count($Array);++$i)
        {
            if(intval($Array[$i]['heroname']) == intval($index))
            {
                $Array[$i]['heroname'] = $heroname;
            }else if(intval($Array[$i]['heroname']) < 0 ){
                
                $Array[$i]['heroname'] = "未装备";
            }
        }
    }

    //获得饰品ID
    public static function GetTrinketID(&$stTrinket,$ID)
    {
        foreach ($stTrinket as $stArray) {
            if(intval($stArray['trinket_id']) == intval($ID))
            {
                return 1;
            }
        }
        
        return 0;
    }

    //键值配对
    public static function GetKeytoValue($Array,&$ArrayToValue,$index,$param) {
        foreach ($Array as $stArray) {
            $ArrayToValue[$stArray[$index]] = $stArray[$param];
        }
        
    }
    //通过索引获得英雄
    public static function getHeroByIndex(&$HeroArray,$index)    
    {
        if( $index < 0 )
        {
            return -1;
        }
         for($i = 0; $i < count($HeroArray);++$i)
        {
            if( intval($HeroArray[$i]['heroindex']) == intval($index) )
            {
                return  $HeroArray[$i];
            }
        }
        
        return -1;
    }
    
    //通过索引获得道具
    public static function getItemByIndex(&$ItemArray,$index)    
    {
         for($i = 0; $i < count($ItemArray);++$i)
        {
            if( intval($ItemArray[$i]['itemindex']) == intval($index) )
            {
                return  $ItemArray[$i];
            }
        }
        return 0;
    }
}

