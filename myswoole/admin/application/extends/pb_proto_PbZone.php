<?php
/**
 * Auto generated from PbZone.proto at 2015-10-10 17:21:40
 */

/**
 * STATE enum
 */
final class STATE
{
    const WHITELIST = 1;
    const OPENSERVER = 2;
    const CLOSESERVER = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'WHITELIST' => self::WHITELIST,
            'OPENSERVER' => self::OPENSERVER,
            'CLOSESERVER' => self::CLOSESERVER,
        );
    }
}

/**
 * TYPESTATE enum
 */
final class TYPESTATE
{
    const ADDSERVER = 1;
    const CHANGESTATE = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'ADDSERVER' => self::ADDSERVER,
            'CHANGESTATE' => self::CHANGESTATE,
        );
    }
}

/**
 * GameLoginInfo message
 */
class GameLoginInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STBASEINFO = 1;
    const STHEROINFO = 2;
    const STITEMINFO = 3;
    const STFIGHTINFO = 4;
    const STFRIENDINFO = 5;
    const STRESERVED1 = 6;
    const IENERGYMAX = 7;
    const IPROTECTTIME = 8;
    const STRECHARGEINFO = 9;
    const STHANDBOOK = 10;
    const STRESERVED2 = 11;
    const IMASTERCOUNT = 12;
    const STMASTERSTORE = 13;
    const STCOMPOSELIST = 14;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STBASEINFO => array(
            'name' => 'stBaseInfo',
            'required' => false,
            'type' => 'BASEDBINFO'
        ),
        self::STHEROINFO => array(
            'name' => 'stHeroInfo',
            'required' => false,
            'type' => 'HERODBINFO'
        ),
        self::STITEMINFO => array(
            'name' => 'stItemInfo',
            'required' => false,
            'type' => 'ITEMDBINFO'
        ),
        self::STFIGHTINFO => array(
            'name' => 'stFightInfo',
            'required' => false,
            'type' => 'FIGHTDBINFO'
        ),
        self::STFRIENDINFO => array(
            'name' => 'stFriendInfo',
            'required' => false,
            'type' => 'FRIENDDBINFO'
        ),
        self::STRESERVED1 => array(
            'name' => 'stReserved1',
            'required' => false,
            'type' => 'RESERVEDBINFO1'
        ),
        self::IENERGYMAX => array(
            'name' => 'iEnergyMax',
            'required' => false,
            'type' => 5,
        ),
        self::IPROTECTTIME => array(
            'name' => 'iProtectTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRECHARGEINFO => array(
            'name' => 'stRechargeInfo',
            'required' => false,
            'type' => 'RRCHARGEINFO'
        ),
        self::STHANDBOOK => array(
            'name' => 'stHandBook',
            'required' => false,
            'type' => 'HANDBOOK'
        ),
        self::STRESERVED2 => array(
            'name' => 'stReserved2',
            'required' => false,
            'type' => 'RESERVEDBINFO2'
        ),
        self::IMASTERCOUNT => array(
            'name' => 'iMasterCount',
            'required' => false,
            'type' => 5,
        ),
        self::STMASTERSTORE => array(
            'name' => 'stMasterStore',
            'required' => false,
            'type' => 'MasterFightStore'
        ),
        self::STCOMPOSELIST => array(
            'name' => 'stComposeList',
            'required' => false,
            'type' => 'ComposeList'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STBASEINFO] = null;
        $this->values[self::STHEROINFO] = null;
        $this->values[self::STITEMINFO] = null;
        $this->values[self::STFIGHTINFO] = null;
        $this->values[self::STFRIENDINFO] = null;
        $this->values[self::STRESERVED1] = null;
        $this->values[self::IENERGYMAX] = null;
        $this->values[self::IPROTECTTIME] = null;
        $this->values[self::STRECHARGEINFO] = null;
        $this->values[self::STHANDBOOK] = null;
        $this->values[self::STRESERVED2] = null;
        $this->values[self::IMASTERCOUNT] = null;
        $this->values[self::STMASTERSTORE] = null;
        $this->values[self::STCOMPOSELIST] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'stBaseInfo' property
     *
     * @param BASEDBINFO $value Property value
     *
     * @return null
     */
    public function setStBaseInfo(BASEDBINFO $value)
    {
        return $this->set(self::STBASEINFO, $value);
    }

    /**
     * Returns value of 'stBaseInfo' property
     *
     * @return BASEDBINFO
     */
    public function getStBaseInfo()
    {
        return $this->get(self::STBASEINFO);
    }

    /**
     * Sets value of 'stHeroInfo' property
     *
     * @param HERODBINFO $value Property value
     *
     * @return null
     */
    public function setStHeroInfo(HERODBINFO $value)
    {
        return $this->set(self::STHEROINFO, $value);
    }

    /**
     * Returns value of 'stHeroInfo' property
     *
     * @return HERODBINFO
     */
    public function getStHeroInfo()
    {
        return $this->get(self::STHEROINFO);
    }

    /**
     * Sets value of 'stItemInfo' property
     *
     * @param ITEMDBINFO $value Property value
     *
     * @return null
     */
    public function setStItemInfo(ITEMDBINFO $value)
    {
        return $this->set(self::STITEMINFO, $value);
    }

    /**
     * Returns value of 'stItemInfo' property
     *
     * @return ITEMDBINFO
     */
    public function getStItemInfo()
    {
        return $this->get(self::STITEMINFO);
    }

    /**
     * Sets value of 'stFightInfo' property
     *
     * @param FIGHTDBINFO $value Property value
     *
     * @return null
     */
    public function setStFightInfo(FIGHTDBINFO $value)
    {
        return $this->set(self::STFIGHTINFO, $value);
    }

    /**
     * Returns value of 'stFightInfo' property
     *
     * @return FIGHTDBINFO
     */
    public function getStFightInfo()
    {
        return $this->get(self::STFIGHTINFO);
    }

    /**
     * Sets value of 'stFriendInfo' property
     *
     * @param FRIENDDBINFO $value Property value
     *
     * @return null
     */
    public function setStFriendInfo(FRIENDDBINFO $value)
    {
        return $this->set(self::STFRIENDINFO, $value);
    }

    /**
     * Returns value of 'stFriendInfo' property
     *
     * @return FRIENDDBINFO
     */
    public function getStFriendInfo()
    {
        return $this->get(self::STFRIENDINFO);
    }

    /**
     * Sets value of 'stReserved1' property
     *
     * @param RESERVEDBINFO1 $value Property value
     *
     * @return null
     */
    public function setStReserved1(RESERVEDBINFO1 $value)
    {
        return $this->set(self::STRESERVED1, $value);
    }

    /**
     * Returns value of 'stReserved1' property
     *
     * @return RESERVEDBINFO1
     */
    public function getStReserved1()
    {
        return $this->get(self::STRESERVED1);
    }

    /**
     * Sets value of 'iEnergyMax' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEnergyMax($value)
    {
        return $this->set(self::IENERGYMAX, $value);
    }

    /**
     * Returns value of 'iEnergyMax' property
     *
     * @return int
     */
    public function getIEnergyMax()
    {
        return $this->get(self::IENERGYMAX);
    }

    /**
     * Sets value of 'iProtectTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIProtectTime($value)
    {
        return $this->set(self::IPROTECTTIME, $value);
    }

    /**
     * Returns value of 'iProtectTime' property
     *
     * @return int
     */
    public function getIProtectTime()
    {
        return $this->get(self::IPROTECTTIME);
    }

    /**
     * Sets value of 'stRechargeInfo' property
     *
     * @param RRCHARGEINFO $value Property value
     *
     * @return null
     */
    public function setStRechargeInfo(RRCHARGEINFO $value)
    {
        return $this->set(self::STRECHARGEINFO, $value);
    }

    /**
     * Returns value of 'stRechargeInfo' property
     *
     * @return RRCHARGEINFO
     */
    public function getStRechargeInfo()
    {
        return $this->get(self::STRECHARGEINFO);
    }

    /**
     * Sets value of 'stHandBook' property
     *
     * @param HANDBOOK $value Property value
     *
     * @return null
     */
    public function setStHandBook(HANDBOOK $value)
    {
        return $this->set(self::STHANDBOOK, $value);
    }

    /**
     * Returns value of 'stHandBook' property
     *
     * @return HANDBOOK
     */
    public function getStHandBook()
    {
        return $this->get(self::STHANDBOOK);
    }

    /**
     * Sets value of 'stReserved2' property
     *
     * @param RESERVEDBINFO2 $value Property value
     *
     * @return null
     */
    public function setStReserved2(RESERVEDBINFO2 $value)
    {
        return $this->set(self::STRESERVED2, $value);
    }

    /**
     * Returns value of 'stReserved2' property
     *
     * @return RESERVEDBINFO2
     */
    public function getStReserved2()
    {
        return $this->get(self::STRESERVED2);
    }

    /**
     * Sets value of 'iMasterCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMasterCount($value)
    {
        return $this->set(self::IMASTERCOUNT, $value);
    }

    /**
     * Returns value of 'iMasterCount' property
     *
     * @return int
     */
    public function getIMasterCount()
    {
        return $this->get(self::IMASTERCOUNT);
    }

    /**
     * Sets value of 'stMasterStore' property
     *
     * @param MasterFightStore $value Property value
     *
     * @return null
     */
    public function setStMasterStore(MasterFightStore $value)
    {
        return $this->set(self::STMASTERSTORE, $value);
    }

    /**
     * Returns value of 'stMasterStore' property
     *
     * @return MasterFightStore
     */
    public function getStMasterStore()
    {
        return $this->get(self::STMASTERSTORE);
    }

    /**
     * Sets value of 'stComposeList' property
     *
     * @param ComposeList $value Property value
     *
     * @return null
     */
    public function setStComposeList(ComposeList $value)
    {
        return $this->set(self::STCOMPOSELIST, $value);
    }

    /**
     * Returns value of 'stComposeList' property
     *
     * @return ComposeList
     */
    public function getStComposeList()
    {
        return $this->get(self::STCOMPOSELIST);
    }
}

/**
 * SingleMasterFightStore message
 */
class SingleMasterFightStore extends \ProtobufMessage
{
    /* Field index constants */
    const IITEMID = 1;
    const INUM = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IITEMID => array(
            'name' => 'iItemid',
            'required' => false,
            'type' => 5,
        ),
        self::INUM => array(
            'name' => 'iNum',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IITEMID] = null;
        $this->values[self::INUM] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iItemid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemid($value)
    {
        return $this->set(self::IITEMID, $value);
    }

    /**
     * Returns value of 'iItemid' property
     *
     * @return int
     */
    public function getIItemid()
    {
        return $this->get(self::IITEMID);
    }

    /**
     * Sets value of 'iNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINum($value)
    {
        return $this->set(self::INUM, $value);
    }

    /**
     * Returns value of 'iNum' property
     *
     * @return int
     */
    public function getINum()
    {
        return $this->get(self::INUM);
    }
}

/**
 * MasterFightStore message
 */
class MasterFightStore extends \ProtobufMessage
{
    /* Field index constants */
    const STSTORE = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STSTORE => array(
            'name' => 'stStore',
            'repeated' => true,
            'type' => 'SingleMasterFightStore'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STSTORE] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Appends value to 'stStore' list
     *
     * @param SingleMasterFightStore $value Value to append
     *
     * @return null
     */
    public function appendStStore(SingleMasterFightStore $value)
    {
        return $this->append(self::STSTORE, $value);
    }

    /**
     * Clears 'stStore' list
     *
     * @return null
     */
    public function clearStStore()
    {
        return $this->clear(self::STSTORE);
    }

    /**
     * Returns 'stStore' list
     *
     * @return SingleMasterFightStore[]
     */
    public function getStStore()
    {
        return $this->get(self::STSTORE);
    }

    /**
     * Returns 'stStore' iterator
     *
     * @return ArrayIterator
     */
    public function getStStoreIterator()
    {
        return new \ArrayIterator($this->get(self::STSTORE));
    }

    /**
     * Returns element from 'stStore' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SingleMasterFightStore
     */
    public function getStStoreAt($offset)
    {
        return $this->get(self::STSTORE, $offset);
    }

    /**
     * Returns count of 'stStore' list
     *
     * @return int
     */
    public function getStStoreCount()
    {
        return $this->count(self::STSTORE);
    }
}

/**
 * pbZone_GMFetchRole_Response message
 */
class PbZoneGMFetchRoleResponse extends \ProtobufMessage
{
    /* Field index constants */
    const IRESULT = 1;
    const UIN = 2;
    const IZONEID = 3;
    const IWORLDID = 4;
    const STLOGININFO = 5;
    const UROLEID = 6;
    const IUPDATETIME = 7;
    const STRGUILDNAME = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IRESULT => array(
            'name' => 'iResult',
            'required' => false,
            'type' => 5,
        ),
        self::UIN => array(
            'name' => 'uin',
            'required' => false,
            'type' => 5,
        ),
        self::IZONEID => array(
            'name' => 'iZoneID',
            'required' => false,
            'type' => 5,
        ),
        self::IWORLDID => array(
            'name' => 'iWorldID',
            'required' => false,
            'type' => 5,
        ),
        self::STLOGININFO => array(
            'name' => 'stLoginInfo',
            'required' => false,
            'type' => 'GameLoginInfo'
        ),
        self::UROLEID => array(
            'name' => 'uRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::IUPDATETIME => array(
            'name' => 'iUpdateTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRGUILDNAME => array(
            'name' => 'strGuildName',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IRESULT] = null;
        $this->values[self::UIN] = null;
        $this->values[self::IZONEID] = null;
        $this->values[self::IWORLDID] = null;
        $this->values[self::STLOGININFO] = null;
        $this->values[self::UROLEID] = null;
        $this->values[self::IUPDATETIME] = null;
        $this->values[self::STRGUILDNAME] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iResult' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIResult($value)
    {
        return $this->set(self::IRESULT, $value);
    }

    /**
     * Returns value of 'iResult' property
     *
     * @return int
     */
    public function getIResult()
    {
        return $this->get(self::IRESULT);
    }

    /**
     * Sets value of 'uin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUin($value)
    {
        return $this->set(self::UIN, $value);
    }

    /**
     * Returns value of 'uin' property
     *
     * @return int
     */
    public function getUin()
    {
        return $this->get(self::UIN);
    }

    /**
     * Sets value of 'iZoneID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIZoneID($value)
    {
        return $this->set(self::IZONEID, $value);
    }

    /**
     * Returns value of 'iZoneID' property
     *
     * @return int
     */
    public function getIZoneID()
    {
        return $this->get(self::IZONEID);
    }

    /**
     * Sets value of 'iWorldID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldID($value)
    {
        return $this->set(self::IWORLDID, $value);
    }

    /**
     * Returns value of 'iWorldID' property
     *
     * @return int
     */
    public function getIWorldID()
    {
        return $this->get(self::IWORLDID);
    }

    /**
     * Sets value of 'stLoginInfo' property
     *
     * @param GameLoginInfo $value Property value
     *
     * @return null
     */
    public function setStLoginInfo(GameLoginInfo $value)
    {
        return $this->set(self::STLOGININFO, $value);
    }

    /**
     * Returns value of 'stLoginInfo' property
     *
     * @return GameLoginInfo
     */
    public function getStLoginInfo()
    {
        return $this->get(self::STLOGININFO);
    }

    /**
     * Sets value of 'uRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setURoleId($value)
    {
        return $this->set(self::UROLEID, $value);
    }

    /**
     * Returns value of 'uRoleId' property
     *
     * @return int
     */
    public function getURoleId()
    {
        return $this->get(self::UROLEID);
    }

    /**
     * Sets value of 'iUpdateTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIUpdateTime($value)
    {
        return $this->set(self::IUPDATETIME, $value);
    }

    /**
     * Returns value of 'iUpdateTime' property
     *
     * @return int
     */
    public function getIUpdateTime()
    {
        return $this->get(self::IUPDATETIME);
    }

    /**
     * Sets value of 'strGuildName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrGuildName($value)
    {
        return $this->set(self::STRGUILDNAME, $value);
    }

    /**
     * Returns value of 'strGuildName' property
     *
     * @return string
     */
    public function getStrGuildName()
    {
        return $this->get(self::STRGUILDNAME);
    }
}

/**
 * pbZone_GMFetchPve_Response message
 */
class PbZoneGMFetchPveResponse extends \ProtobufMessage
{
    /* Field index constants */
    const IRESULT = 1;
    const UIN = 2;
    const STBASEINFO = 3;
    const STFIGHTINFO = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IRESULT => array(
            'name' => 'iResult',
            'required' => false,
            'type' => 5,
        ),
        self::UIN => array(
            'name' => 'uin',
            'required' => false,
            'type' => 5,
        ),
        self::STBASEINFO => array(
            'name' => 'stBaseInfo',
            'required' => false,
            'type' => 'BASEDBINFO'
        ),
        self::STFIGHTINFO => array(
            'name' => 'stFightInfo',
            'required' => false,
            'type' => 'FIGHTDBINFO'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IRESULT] = null;
        $this->values[self::UIN] = null;
        $this->values[self::STBASEINFO] = null;
        $this->values[self::STFIGHTINFO] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iResult' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIResult($value)
    {
        return $this->set(self::IRESULT, $value);
    }

    /**
     * Returns value of 'iResult' property
     *
     * @return int
     */
    public function getIResult()
    {
        return $this->get(self::IRESULT);
    }

    /**
     * Sets value of 'uin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUin($value)
    {
        return $this->set(self::UIN, $value);
    }

    /**
     * Returns value of 'uin' property
     *
     * @return int
     */
    public function getUin()
    {
        return $this->get(self::UIN);
    }

    /**
     * Sets value of 'stBaseInfo' property
     *
     * @param BASEDBINFO $value Property value
     *
     * @return null
     */
    public function setStBaseInfo(BASEDBINFO $value)
    {
        return $this->set(self::STBASEINFO, $value);
    }

    /**
     * Returns value of 'stBaseInfo' property
     *
     * @return BASEDBINFO
     */
    public function getStBaseInfo()
    {
        return $this->get(self::STBASEINFO);
    }

    /**
     * Sets value of 'stFightInfo' property
     *
     * @param FIGHTDBINFO $value Property value
     *
     * @return null
     */
    public function setStFightInfo(FIGHTDBINFO $value)
    {
        return $this->set(self::STFIGHTINFO, $value);
    }

    /**
     * Returns value of 'stFightInfo' property
     *
     * @return FIGHTDBINFO
     */
    public function getStFightInfo()
    {
        return $this->get(self::STFIGHTINFO);
    }
}

/**
 * CommondParam message
 */
class CommondParam extends \ProtobufMessage
{
    /* Field index constants */
    const IPARAMA = 1;
    const IPARAMB = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IPARAMA => array(
            'name' => 'iParamA',
            'required' => false,
            'type' => 5,
        ),
        self::IPARAMB => array(
            'name' => 'iParamB',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IPARAMA] = null;
        $this->values[self::IPARAMB] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iParamA' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIParamA($value)
    {
        return $this->set(self::IPARAMA, $value);
    }

    /**
     * Returns value of 'iParamA' property
     *
     * @return int
     */
    public function getIParamA()
    {
        return $this->get(self::IPARAMA);
    }

    /**
     * Sets value of 'iParamB' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIParamB($value)
    {
        return $this->set(self::IPARAMB, $value);
    }

    /**
     * Returns value of 'iParamB' property
     *
     * @return int
     */
    public function getIParamB()
    {
        return $this->get(self::IPARAMB);
    }
}

/**
 * pbZone_GMFetchRole_Request message
 */
class PbZoneGMFetchRoleRequest extends \ProtobufMessage
{
    /* Field index constants */
    const STRACCOUNT = 1;
    const IFETCHTYPE = 2;
    const STRPARAM = 3;
    const IWORLDID = 4;
    const IEVENT = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
        self::IFETCHTYPE => array(
            'name' => 'iFetchType',
            'required' => false,
            'type' => 5,
        ),
        self::STRPARAM => array(
            'name' => 'strParam',
            'required' => false,
            'type' => 7,
        ),
        self::IWORLDID => array(
            'name' => 'iWorldID',
            'required' => false,
            'type' => 5,
        ),
        self::IEVENT => array(
            'name' => 'iEvent',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STRACCOUNT] = null;
        $this->values[self::IFETCHTYPE] = null;
        $this->values[self::STRPARAM] = null;
        $this->values[self::IWORLDID] = null;
        $this->values[self::IEVENT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }

    /**
     * Sets value of 'iFetchType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFetchType($value)
    {
        return $this->set(self::IFETCHTYPE, $value);
    }

    /**
     * Returns value of 'iFetchType' property
     *
     * @return int
     */
    public function getIFetchType()
    {
        return $this->get(self::IFETCHTYPE);
    }

    /**
     * Sets value of 'strParam' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrParam($value)
    {
        return $this->set(self::STRPARAM, $value);
    }

    /**
     * Returns value of 'strParam' property
     *
     * @return string
     */
    public function getStrParam()
    {
        return $this->get(self::STRPARAM);
    }

    /**
     * Sets value of 'iWorldID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldID($value)
    {
        return $this->set(self::IWORLDID, $value);
    }

    /**
     * Returns value of 'iWorldID' property
     *
     * @return int
     */
    public function getIWorldID()
    {
        return $this->get(self::IWORLDID);
    }

    /**
     * Sets value of 'iEvent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEvent($value)
    {
        return $this->set(self::IEVENT, $value);
    }

    /**
     * Returns value of 'iEvent' property
     *
     * @return int
     */
    public function getIEvent()
    {
        return $this->get(self::IEVENT);
    }
}

/**
 * pbZone_CommondGM_Request message
 */
class PbZoneCommondGMRequest extends \ProtobufMessage
{
    /* Field index constants */
    const STRACCOUNT = 1;
    const ISELECTTYPE = 2;
    const STPARAM = 3;
    const IFETCHTYPE = 4;
    const IWORLDID = 5;
    const STRROLE = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
        self::ISELECTTYPE => array(
            'name' => 'iSelectType',
            'required' => false,
            'type' => 5,
        ),
        self::STPARAM => array(
            'name' => 'stParam',
            'required' => false,
            'type' => 'CommondParam'
        ),
        self::IFETCHTYPE => array(
            'name' => 'iFetchType',
            'required' => false,
            'type' => 5,
        ),
        self::IWORLDID => array(
            'name' => 'iWorldID',
            'required' => false,
            'type' => 5,
        ),
        self::STRROLE => array(
            'name' => 'strRole',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STRACCOUNT] = null;
        $this->values[self::ISELECTTYPE] = null;
        $this->values[self::STPARAM] = null;
        $this->values[self::IFETCHTYPE] = null;
        $this->values[self::IWORLDID] = null;
        $this->values[self::STRROLE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }

    /**
     * Sets value of 'iSelectType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISelectType($value)
    {
        return $this->set(self::ISELECTTYPE, $value);
    }

    /**
     * Returns value of 'iSelectType' property
     *
     * @return int
     */
    public function getISelectType()
    {
        return $this->get(self::ISELECTTYPE);
    }

    /**
     * Sets value of 'stParam' property
     *
     * @param CommondParam $value Property value
     *
     * @return null
     */
    public function setStParam(CommondParam $value)
    {
        return $this->set(self::STPARAM, $value);
    }

    /**
     * Returns value of 'stParam' property
     *
     * @return CommondParam
     */
    public function getStParam()
    {
        return $this->get(self::STPARAM);
    }

    /**
     * Sets value of 'iFetchType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFetchType($value)
    {
        return $this->set(self::IFETCHTYPE, $value);
    }

    /**
     * Returns value of 'iFetchType' property
     *
     * @return int
     */
    public function getIFetchType()
    {
        return $this->get(self::IFETCHTYPE);
    }

    /**
     * Sets value of 'iWorldID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldID($value)
    {
        return $this->set(self::IWORLDID, $value);
    }

    /**
     * Returns value of 'iWorldID' property
     *
     * @return int
     */
    public function getIWorldID()
    {
        return $this->get(self::IWORLDID);
    }

    /**
     * Sets value of 'strRole' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrRole($value)
    {
        return $this->set(self::STRROLE, $value);
    }

    /**
     * Returns value of 'strRole' property
     *
     * @return string
     */
    public function getStrRole()
    {
        return $this->get(self::STRROLE);
    }
}

/**
 * pbZone_CommondGM_Response message
 */
class PbZoneCommondGMResponse extends \ProtobufMessage
{
    /* Field index constants */
    const IRESULT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IRESULT => array(
            'name' => 'iResult',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IRESULT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iResult' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIResult($value)
    {
        return $this->set(self::IRESULT, $value);
    }

    /**
     * Returns value of 'iResult' property
     *
     * @return int
     */
    public function getIResult()
    {
        return $this->get(self::IRESULT);
    }
}

/**
 * pbRegAuth_GMServer_Notify message
 */
class PbRegAuthGMServerNotify extends \ProtobufMessage
{
    /* Field index constants */
    const ISERVERID = 1;
    const IPLATFORMID = 2;
    const ITYPE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISERVERID => array(
            'name' => 'iServerid',
            'required' => false,
            'type' => 5,
        ),
        self::IPLATFORMID => array(
            'name' => 'iPlatformid',
            'required' => false,
            'type' => 5,
        ),
        self::ITYPE => array(
            'name' => 'iType',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ISERVERID] = null;
        $this->values[self::IPLATFORMID] = null;
        $this->values[self::ITYPE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iServerid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIServerid($value)
    {
        return $this->set(self::ISERVERID, $value);
    }

    /**
     * Returns value of 'iServerid' property
     *
     * @return int
     */
    public function getIServerid()
    {
        return $this->get(self::ISERVERID);
    }

    /**
     * Sets value of 'iPlatformid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPlatformid($value)
    {
        return $this->set(self::IPLATFORMID, $value);
    }

    /**
     * Returns value of 'iPlatformid' property
     *
     * @return int
     */
    public function getIPlatformid()
    {
        return $this->get(self::IPLATFORMID);
    }

    /**
     * Sets value of 'iType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIType($value)
    {
        return $this->set(self::ITYPE, $value);
    }

    /**
     * Returns value of 'iType' property
     *
     * @return int
     */
    public function getIType()
    {
        return $this->get(self::ITYPE);
    }
}

/**
 * pbRegAuth_AddWhite_Request message
 */
class PbRegAuthAddWhiteRequest extends \ProtobufMessage
{
    /* Field index constants */
    const IUIN = 1;
    const ISTATE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IUIN => array(
            'name' => 'iUin',
            'required' => false,
            'type' => 5,
        ),
        self::ISTATE => array(
            'name' => 'iState',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IUIN] = null;
        $this->values[self::ISTATE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIUin($value)
    {
        return $this->set(self::IUIN, $value);
    }

    /**
     * Returns value of 'iUin' property
     *
     * @return int
     */
    public function getIUin()
    {
        return $this->get(self::IUIN);
    }

    /**
     * Sets value of 'iState' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIState($value)
    {
        return $this->set(self::ISTATE, $value);
    }

    /**
     * Returns value of 'iState' property
     *
     * @return int
     */
    public function getIState()
    {
        return $this->get(self::ISTATE);
    }
}

/**
 * pbZone_GMSendBulletinBoard_Notify message
 */
class PbZoneGMSendBulletinBoardNotify extends \ProtobufMessage
{
    /* Field index constants */
    const ITYPE = 1;
    const IPRIORITYLEVEL = 2;
    const ITRIGTIMES = 3;
    const ISTARTTIME = 4;
    const IENDTIME = 5;
    const ILOOPTIME = 6;
    const STRCONTEXT = 7;
    const STRACCOUNT = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ITYPE => array(
            'name' => 'iType',
            'required' => false,
            'type' => 5,
        ),
        self::IPRIORITYLEVEL => array(
            'name' => 'iPriorityLevel',
            'required' => false,
            'type' => 5,
        ),
        self::ITRIGTIMES => array(
            'name' => 'iTrigTimes',
            'required' => false,
            'type' => 5,
        ),
        self::ISTARTTIME => array(
            'name' => 'iStartTime',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILOOPTIME => array(
            'name' => 'iLoopTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRCONTEXT => array(
            'name' => 'strContext',
            'required' => false,
            'type' => 7,
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ITYPE] = null;
        $this->values[self::IPRIORITYLEVEL] = null;
        $this->values[self::ITRIGTIMES] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::ILOOPTIME] = null;
        $this->values[self::STRCONTEXT] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIType($value)
    {
        return $this->set(self::ITYPE, $value);
    }

    /**
     * Returns value of 'iType' property
     *
     * @return int
     */
    public function getIType()
    {
        return $this->get(self::ITYPE);
    }

    /**
     * Sets value of 'iPriorityLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPriorityLevel($value)
    {
        return $this->set(self::IPRIORITYLEVEL, $value);
    }

    /**
     * Returns value of 'iPriorityLevel' property
     *
     * @return int
     */
    public function getIPriorityLevel()
    {
        return $this->get(self::IPRIORITYLEVEL);
    }

    /**
     * Sets value of 'iTrigTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITrigTimes($value)
    {
        return $this->set(self::ITRIGTIMES, $value);
    }

    /**
     * Returns value of 'iTrigTimes' property
     *
     * @return int
     */
    public function getITrigTimes()
    {
        return $this->get(self::ITRIGTIMES);
    }

    /**
     * Sets value of 'iStartTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStartTime($value)
    {
        return $this->set(self::ISTARTTIME, $value);
    }

    /**
     * Returns value of 'iStartTime' property
     *
     * @return int
     */
    public function getIStartTime()
    {
        return $this->get(self::ISTARTTIME);
    }

    /**
     * Sets value of 'iEndTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEndTime($value)
    {
        return $this->set(self::IENDTIME, $value);
    }

    /**
     * Returns value of 'iEndTime' property
     *
     * @return int
     */
    public function getIEndTime()
    {
        return $this->get(self::IENDTIME);
    }

    /**
     * Sets value of 'iLoopTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoopTime($value)
    {
        return $this->set(self::ILOOPTIME, $value);
    }

    /**
     * Returns value of 'iLoopTime' property
     *
     * @return int
     */
    public function getILoopTime()
    {
        return $this->get(self::ILOOPTIME);
    }

    /**
     * Sets value of 'strContext' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrContext($value)
    {
        return $this->set(self::STRCONTEXT, $value);
    }

    /**
     * Returns value of 'strContext' property
     *
     * @return string
     */
    public function getStrContext()
    {
        return $this->get(self::STRCONTEXT);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * pbZone_GMLoginBoard_Notify message
 */
class PbZoneGMLoginBoardNotify extends \ProtobufMessage
{
    /* Field index constants */
    const STBOARD = 1;
    const STRACCOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STBOARD => array(
            'name' => 'stBoard',
            'required' => false,
            'type' => 'ONEBOARD'
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STBOARD] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'stBoard' property
     *
     * @param ONEBOARD $value Property value
     *
     * @return null
     */
    public function setStBoard(ONEBOARD $value)
    {
        return $this->set(self::STBOARD, $value);
    }

    /**
     * Returns value of 'stBoard' property
     *
     * @return ONEBOARD
     */
    public function getStBoard()
    {
        return $this->get(self::STBOARD);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * FORBIDDENTROLE message
 */
class FORBIDDENTROLE extends \ProtobufMessage
{
    /* Field index constants */
    const IFORBIDTYPE = 1;
    const ISTARTTIME = 2;
    const IENDTIME = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IFORBIDTYPE => array(
            'name' => 'iForbidType',
            'required' => false,
            'type' => 5,
        ),
        self::ISTARTTIME => array(
            'name' => 'iStarttime',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndtime',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IFORBIDTYPE] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iForbidType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIForbidType($value)
    {
        return $this->set(self::IFORBIDTYPE, $value);
    }

    /**
     * Returns value of 'iForbidType' property
     *
     * @return int
     */
    public function getIForbidType()
    {
        return $this->get(self::IFORBIDTYPE);
    }

    /**
     * Sets value of 'iStarttime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStarttime($value)
    {
        return $this->set(self::ISTARTTIME, $value);
    }

    /**
     * Returns value of 'iStarttime' property
     *
     * @return int
     */
    public function getIStarttime()
    {
        return $this->get(self::ISTARTTIME);
    }

    /**
     * Sets value of 'iEndtime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEndtime($value)
    {
        return $this->set(self::IENDTIME, $value);
    }

    /**
     * Returns value of 'iEndtime' property
     *
     * @return int
     */
    public function getIEndtime()
    {
        return $this->get(self::IENDTIME);
    }
}

/**
 * pbZone_GMForbidenToRole_Request message
 */
class PbZoneGMForbidenToRoleRequest extends \ProtobufMessage
{
    /* Field index constants */
    const ITYPE = 1;
    const IWORLDID = 2;
    const IROLEUIN = 3;
    const STFORBID = 4;
    const ITIME = 5;
    const STRACCOUNT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ITYPE => array(
            'name' => 'iType',
            'required' => false,
            'type' => 5,
        ),
        self::IWORLDID => array(
            'name' => 'iWorldid',
            'required' => false,
            'type' => 5,
        ),
        self::IROLEUIN => array(
            'name' => 'iRoleUin',
            'required' => false,
            'type' => 5,
        ),
        self::STFORBID => array(
            'name' => 'stForbid',
            'required' => false,
            'type' => 'FORBIDDENTROLE'
        ),
        self::ITIME => array(
            'name' => 'iTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ITYPE] = null;
        $this->values[self::IWORLDID] = null;
        $this->values[self::IROLEUIN] = null;
        $this->values[self::STFORBID] = null;
        $this->values[self::ITIME] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIType($value)
    {
        return $this->set(self::ITYPE, $value);
    }

    /**
     * Returns value of 'iType' property
     *
     * @return int
     */
    public function getIType()
    {
        return $this->get(self::ITYPE);
    }

    /**
     * Sets value of 'iWorldid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldid($value)
    {
        return $this->set(self::IWORLDID, $value);
    }

    /**
     * Returns value of 'iWorldid' property
     *
     * @return int
     */
    public function getIWorldid()
    {
        return $this->get(self::IWORLDID);
    }

    /**
     * Sets value of 'iRoleUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleUin($value)
    {
        return $this->set(self::IROLEUIN, $value);
    }

    /**
     * Returns value of 'iRoleUin' property
     *
     * @return int
     */
    public function getIRoleUin()
    {
        return $this->get(self::IROLEUIN);
    }

    /**
     * Sets value of 'stForbid' property
     *
     * @param FORBIDDENTROLE $value Property value
     *
     * @return null
     */
    public function setStForbid(FORBIDDENTROLE $value)
    {
        return $this->set(self::STFORBID, $value);
    }

    /**
     * Returns value of 'stForbid' property
     *
     * @return FORBIDDENTROLE
     */
    public function getStForbid()
    {
        return $this->get(self::STFORBID);
    }

    /**
     * Sets value of 'iTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITime($value)
    {
        return $this->set(self::ITIME, $value);
    }

    /**
     * Returns value of 'iTime' property
     *
     * @return int
     */
    public function getITime()
    {
        return $this->get(self::ITIME);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * OneAttachment message
 */
class OneAttachment extends \ProtobufMessage
{
    /* Field index constants */
    const IDROPTYPE = 1;
    const IDROPID = 2;
    const IDROPNUM = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IDROPTYPE => array(
            'name' => 'iDropType',
            'required' => false,
            'type' => 5,
        ),
        self::IDROPID => array(
            'name' => 'iDropId',
            'required' => false,
            'type' => 5,
        ),
        self::IDROPNUM => array(
            'name' => 'iDropNum',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IDROPTYPE] = null;
        $this->values[self::IDROPID] = null;
        $this->values[self::IDROPNUM] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iDropType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropType($value)
    {
        return $this->set(self::IDROPTYPE, $value);
    }

    /**
     * Returns value of 'iDropType' property
     *
     * @return int
     */
    public function getIDropType()
    {
        return $this->get(self::IDROPTYPE);
    }

    /**
     * Sets value of 'iDropId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropId($value)
    {
        return $this->set(self::IDROPID, $value);
    }

    /**
     * Returns value of 'iDropId' property
     *
     * @return int
     */
    public function getIDropId()
    {
        return $this->get(self::IDROPID);
    }

    /**
     * Sets value of 'iDropNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropNum($value)
    {
        return $this->set(self::IDROPNUM, $value);
    }

    /**
     * Returns value of 'iDropNum' property
     *
     * @return int
     */
    public function getIDropNum()
    {
        return $this->get(self::IDROPNUM);
    }
}

/**
 * MailAttachment message
 */
class MailAttachment extends \ProtobufMessage
{
    /* Field index constants */
    const STATTACHMENTS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STATTACHMENTS => array(
            'name' => 'stAttachments',
            'repeated' => true,
            'type' => 'OneAttachment'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STATTACHMENTS] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Appends value to 'stAttachments' list
     *
     * @param OneAttachment $value Value to append
     *
     * @return null
     */
    public function appendStAttachments(OneAttachment $value)
    {
        return $this->append(self::STATTACHMENTS, $value);
    }

    /**
     * Clears 'stAttachments' list
     *
     * @return null
     */
    public function clearStAttachments()
    {
        return $this->clear(self::STATTACHMENTS);
    }

    /**
     * Returns 'stAttachments' list
     *
     * @return OneAttachment[]
     */
    public function getStAttachments()
    {
        return $this->get(self::STATTACHMENTS);
    }

    /**
     * Returns 'stAttachments' iterator
     *
     * @return ArrayIterator
     */
    public function getStAttachmentsIterator()
    {
        return new \ArrayIterator($this->get(self::STATTACHMENTS));
    }

    /**
     * Returns element from 'stAttachments' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneAttachment
     */
    public function getStAttachmentsAt($offset)
    {
        return $this->get(self::STATTACHMENTS, $offset);
    }

    /**
     * Returns count of 'stAttachments' list
     *
     * @return int
     */
    public function getStAttachmentsCount()
    {
        return $this->count(self::STATTACHMENTS);
    }
}

/**
 * OneMailInfo message
 */
class OneMailInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IMAILID = 1;
    const STRTITLE = 2;
    const STRCONTEXT = 3;
    const ISENDTIME = 4;
    const IROLEID = 5;
    const STATTACHMENT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IMAILID => array(
            'name' => 'iMailId',
            'required' => false,
            'type' => 5,
        ),
        self::STRTITLE => array(
            'name' => 'strTitle',
            'required' => false,
            'type' => 7,
        ),
        self::STRCONTEXT => array(
            'name' => 'strContext',
            'required' => false,
            'type' => 7,
        ),
        self::ISENDTIME => array(
            'name' => 'iSendTime',
            'required' => false,
            'type' => 5,
        ),
        self::IROLEID => array(
            'name' => 'iRoleid',
            'repeated' => true,
            'type' => 5,
        ),
        self::STATTACHMENT => array(
            'name' => 'stAttachment',
            'required' => false,
            'type' => 'MailAttachment'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IMAILID] = null;
        $this->values[self::STRTITLE] = null;
        $this->values[self::STRCONTEXT] = null;
        $this->values[self::ISENDTIME] = null;
        $this->values[self::IROLEID] = array();
        $this->values[self::STATTACHMENT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iMailId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMailId($value)
    {
        return $this->set(self::IMAILID, $value);
    }

    /**
     * Returns value of 'iMailId' property
     *
     * @return int
     */
    public function getIMailId()
    {
        return $this->get(self::IMAILID);
    }

    /**
     * Sets value of 'strTitle' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrTitle($value)
    {
        return $this->set(self::STRTITLE, $value);
    }

    /**
     * Returns value of 'strTitle' property
     *
     * @return string
     */
    public function getStrTitle()
    {
        return $this->get(self::STRTITLE);
    }

    /**
     * Sets value of 'strContext' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrContext($value)
    {
        return $this->set(self::STRCONTEXT, $value);
    }

    /**
     * Returns value of 'strContext' property
     *
     * @return string
     */
    public function getStrContext()
    {
        return $this->get(self::STRCONTEXT);
    }

    /**
     * Sets value of 'iSendTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISendTime($value)
    {
        return $this->set(self::ISENDTIME, $value);
    }

    /**
     * Returns value of 'iSendTime' property
     *
     * @return int
     */
    public function getISendTime()
    {
        return $this->get(self::ISENDTIME);
    }

    /**
     * Appends value to 'iRoleid' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIRoleid($value)
    {
        return $this->append(self::IROLEID, $value);
    }

    /**
     * Clears 'iRoleid' list
     *
     * @return null
     */
    public function clearIRoleid()
    {
        return $this->clear(self::IROLEID);
    }

    /**
     * Returns 'iRoleid' list
     *
     * @return int[]
     */
    public function getIRoleid()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Returns 'iRoleid' iterator
     *
     * @return ArrayIterator
     */
    public function getIRoleidIterator()
    {
        return new \ArrayIterator($this->get(self::IROLEID));
    }

    /**
     * Returns element from 'iRoleid' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIRoleidAt($offset)
    {
        return $this->get(self::IROLEID, $offset);
    }

    /**
     * Returns count of 'iRoleid' list
     *
     * @return int
     */
    public function getIRoleidCount()
    {
        return $this->count(self::IROLEID);
    }

    /**
     * Sets value of 'stAttachment' property
     *
     * @param MailAttachment $value Property value
     *
     * @return null
     */
    public function setStAttachment(MailAttachment $value)
    {
        return $this->set(self::STATTACHMENT, $value);
    }

    /**
     * Returns value of 'stAttachment' property
     *
     * @return MailAttachment
     */
    public function getStAttachment()
    {
        return $this->get(self::STATTACHMENT);
    }
}

/**
 * pbZone_GMCreateMail_Request message
 */
class PbZoneGMCreateMailRequest extends \ProtobufMessage
{
    /* Field index constants */
    const STRACCOUNT = 1;
    const STMAIL = 2;
    const IRETURN = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
        self::STMAIL => array(
            'name' => 'stMail',
            'required' => false,
            'type' => 'OneMailInfo'
        ),
        self::IRETURN => array(
            'name' => 'iReturn',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STRACCOUNT] = null;
        $this->values[self::STMAIL] = null;
        $this->values[self::IRETURN] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }

    /**
     * Sets value of 'stMail' property
     *
     * @param OneMailInfo $value Property value
     *
     * @return null
     */
    public function setStMail(OneMailInfo $value)
    {
        return $this->set(self::STMAIL, $value);
    }

    /**
     * Returns value of 'stMail' property
     *
     * @return OneMailInfo
     */
    public function getStMail()
    {
        return $this->get(self::STMAIL);
    }

    /**
     * Sets value of 'iReturn' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIReturn($value)
    {
        return $this->set(self::IRETURN, $value);
    }

    /**
     * Returns value of 'iReturn' property
     *
     * @return int
     */
    public function getIReturn()
    {
        return $this->get(self::IRETURN);
    }
}

/**
 * pbZone_RevokeMail_Request message
 */
class PbZoneRevokeMailRequest extends \ProtobufMessage
{
    /* Field index constants */
    const IMAILED = 1;
    const STRACCOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IMAILED => array(
            'name' => 'iMailed',
            'required' => false,
            'type' => 5,
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IMAILED] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iMailed' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMailed($value)
    {
        return $this->set(self::IMAILED, $value);
    }

    /**
     * Returns value of 'iMailed' property
     *
     * @return int
     */
    public function getIMailed()
    {
        return $this->get(self::IMAILED);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * pbZone_AllRoleMail_Request message
 */
class PbZoneAllRoleMailRequest extends \ProtobufMessage
{
    /* Field index constants */
    const STRACCOUNT = 1;
    const STONEMAIL = 2;
    const IMINROLE = 3;
    const IMAXROLE = 4;
    const IMINVIP = 5;
    const IMAXVIP = 6;
    const IGUILD = 7;
    const ILOGINBEGIN = 8;
    const ILOGINEND = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
        self::STONEMAIL => array(
            'name' => 'stOneMail',
            'required' => false,
            'type' => 'OneMailInfo'
        ),
        self::IMINROLE => array(
            'name' => 'iMinRole',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXROLE => array(
            'name' => 'iMaxRole',
            'required' => false,
            'type' => 5,
        ),
        self::IMINVIP => array(
            'name' => 'iMinVip',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXVIP => array(
            'name' => 'iMaxVip',
            'required' => false,
            'type' => 5,
        ),
        self::IGUILD => array(
            'name' => 'iGuild',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGINBEGIN => array(
            'name' => 'iLoginBegin',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGINEND => array(
            'name' => 'iLoginEnd',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STRACCOUNT] = null;
        $this->values[self::STONEMAIL] = null;
        $this->values[self::IMINROLE] = null;
        $this->values[self::IMAXROLE] = null;
        $this->values[self::IMINVIP] = null;
        $this->values[self::IMAXVIP] = null;
        $this->values[self::IGUILD] = null;
        $this->values[self::ILOGINBEGIN] = null;
        $this->values[self::ILOGINEND] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }

    /**
     * Sets value of 'stOneMail' property
     *
     * @param OneMailInfo $value Property value
     *
     * @return null
     */
    public function setStOneMail(OneMailInfo $value)
    {
        return $this->set(self::STONEMAIL, $value);
    }

    /**
     * Returns value of 'stOneMail' property
     *
     * @return OneMailInfo
     */
    public function getStOneMail()
    {
        return $this->get(self::STONEMAIL);
    }

    /**
     * Sets value of 'iMinRole' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMinRole($value)
    {
        return $this->set(self::IMINROLE, $value);
    }

    /**
     * Returns value of 'iMinRole' property
     *
     * @return int
     */
    public function getIMinRole()
    {
        return $this->get(self::IMINROLE);
    }

    /**
     * Sets value of 'iMaxRole' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxRole($value)
    {
        return $this->set(self::IMAXROLE, $value);
    }

    /**
     * Returns value of 'iMaxRole' property
     *
     * @return int
     */
    public function getIMaxRole()
    {
        return $this->get(self::IMAXROLE);
    }

    /**
     * Sets value of 'iMinVip' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMinVip($value)
    {
        return $this->set(self::IMINVIP, $value);
    }

    /**
     * Returns value of 'iMinVip' property
     *
     * @return int
     */
    public function getIMinVip()
    {
        return $this->get(self::IMINVIP);
    }

    /**
     * Sets value of 'iMaxVip' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxVip($value)
    {
        return $this->set(self::IMAXVIP, $value);
    }

    /**
     * Returns value of 'iMaxVip' property
     *
     * @return int
     */
    public function getIMaxVip()
    {
        return $this->get(self::IMAXVIP);
    }

    /**
     * Sets value of 'iGuild' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuild($value)
    {
        return $this->set(self::IGUILD, $value);
    }

    /**
     * Returns value of 'iGuild' property
     *
     * @return int
     */
    public function getIGuild()
    {
        return $this->get(self::IGUILD);
    }

    /**
     * Sets value of 'iLoginBegin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoginBegin($value)
    {
        return $this->set(self::ILOGINBEGIN, $value);
    }

    /**
     * Returns value of 'iLoginBegin' property
     *
     * @return int
     */
    public function getILoginBegin()
    {
        return $this->get(self::ILOGINBEGIN);
    }

    /**
     * Sets value of 'iLoginEnd' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoginEnd($value)
    {
        return $this->set(self::ILOGINEND, $value);
    }

    /**
     * Returns value of 'iLoginEnd' property
     *
     * @return int
     */
    public function getILoginEnd()
    {
        return $this->get(self::ILOGINEND);
    }
}

/**
 * pbRegAuth_GMNotice_Request message
 */
class PbRegAuthGMNoticeRequest extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const ISTARTTIME = 2;
    const IENDTIME = 3;
    const STRBTNTEXT = 4;
    const STRTITLE = 5;
    const STRCONTEXT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::ISTARTTIME => array(
            'name' => 'iStarttime',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndtime',
            'required' => false,
            'type' => 5,
        ),
        self::STRBTNTEXT => array(
            'name' => 'strBtnText',
            'required' => false,
            'type' => 7,
        ),
        self::STRTITLE => array(
            'name' => 'strTitle',
            'required' => false,
            'type' => 7,
        ),
        self::STRCONTEXT => array(
            'name' => 'strContext',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IID] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::STRBTNTEXT] = null;
        $this->values[self::STRTITLE] = null;
        $this->values[self::STRCONTEXT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'iId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIId($value)
    {
        return $this->set(self::IID, $value);
    }

    /**
     * Returns value of 'iId' property
     *
     * @return int
     */
    public function getIId()
    {
        return $this->get(self::IID);
    }

    /**
     * Sets value of 'iStarttime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStarttime($value)
    {
        return $this->set(self::ISTARTTIME, $value);
    }

    /**
     * Returns value of 'iStarttime' property
     *
     * @return int
     */
    public function getIStarttime()
    {
        return $this->get(self::ISTARTTIME);
    }

    /**
     * Sets value of 'iEndtime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEndtime($value)
    {
        return $this->set(self::IENDTIME, $value);
    }

    /**
     * Returns value of 'iEndtime' property
     *
     * @return int
     */
    public function getIEndtime()
    {
        return $this->get(self::IENDTIME);
    }

    /**
     * Sets value of 'strBtnText' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrBtnText($value)
    {
        return $this->set(self::STRBTNTEXT, $value);
    }

    /**
     * Returns value of 'strBtnText' property
     *
     * @return string
     */
    public function getStrBtnText()
    {
        return $this->get(self::STRBTNTEXT);
    }

    /**
     * Sets value of 'strTitle' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrTitle($value)
    {
        return $this->set(self::STRTITLE, $value);
    }

    /**
     * Returns value of 'strTitle' property
     *
     * @return string
     */
    public function getStrTitle()
    {
        return $this->get(self::STRTITLE);
    }

    /**
     * Sets value of 'strContext' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrContext($value)
    {
        return $this->set(self::STRCONTEXT, $value);
    }

    /**
     * Returns value of 'strContext' property
     *
     * @return string
     */
    public function getStrContext()
    {
        return $this->get(self::STRCONTEXT);
    }
}

/**
 * pbZone_GM_ActivityList_Request message
 */
class PbZoneGMActivityListRequest extends \ProtobufMessage
{
    /* Field index constants */
    const STRACCOUNT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * pbZone_GM_ActivityList_Response message
 */
class PbZoneGMActivityListResponse extends \ProtobufMessage
{
    /* Field index constants */
    const STACTIVITYLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STACTIVITYLIST => array(
            'name' => 'stActivityList',
            'repeated' => true,
            'type' => 'ACTIVITYDATA'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STACTIVITYLIST] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Appends value to 'stActivityList' list
     *
     * @param ACTIVITYDATA $value Value to append
     *
     * @return null
     */
    public function appendStActivityList(ACTIVITYDATA $value)
    {
        return $this->append(self::STACTIVITYLIST, $value);
    }

    /**
     * Clears 'stActivityList' list
     *
     * @return null
     */
    public function clearStActivityList()
    {
        return $this->clear(self::STACTIVITYLIST);
    }

    /**
     * Returns 'stActivityList' list
     *
     * @return ACTIVITYDATA[]
     */
    public function getStActivityList()
    {
        return $this->get(self::STACTIVITYLIST);
    }

    /**
     * Returns 'stActivityList' iterator
     *
     * @return ArrayIterator
     */
    public function getStActivityListIterator()
    {
        return new \ArrayIterator($this->get(self::STACTIVITYLIST));
    }

    /**
     * Returns element from 'stActivityList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ACTIVITYDATA
     */
    public function getStActivityListAt($offset)
    {
        return $this->get(self::STACTIVITYLIST, $offset);
    }

    /**
     * Returns count of 'stActivityList' list
     *
     * @return int
     */
    public function getStActivityListCount()
    {
        return $this->count(self::STACTIVITYLIST);
    }
}

/**
 * pbZone_GM_ChangeActivity_Notify message
 */
class PbZoneGMChangeActivityNotify extends \ProtobufMessage
{
    /* Field index constants */
    const STACTIVITYLIST = 1;
    const STRACCOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STACTIVITYLIST => array(
            'name' => 'stActivityList',
            'required' => false,
            'type' => 'ACTIVITYDATA'
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STACTIVITYLIST] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'stActivityList' property
     *
     * @param ACTIVITYDATA $value Property value
     *
     * @return null
     */
    public function setStActivityList(ACTIVITYDATA $value)
    {
        return $this->set(self::STACTIVITYLIST, $value);
    }

    /**
     * Returns value of 'stActivityList' property
     *
     * @return ACTIVITYDATA
     */
    public function getStActivityList()
    {
        return $this->get(self::STACTIVITYLIST);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}

/**
 * pbZone_GM_AddActivity_Notify message
 */
class PbZoneGMAddActivityNotify extends \ProtobufMessage
{
    /* Field index constants */
    const STACTIVITYLIST = 1;
    const STRACCOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STACTIVITYLIST => array(
            'name' => 'stActivityList',
            'required' => false,
            'type' => 'ACTIVITYDATA'
        ),
        self::STRACCOUNT => array(
            'name' => 'strAccount',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::STACTIVITYLIST] = null;
        $this->values[self::STRACCOUNT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'stActivityList' property
     *
     * @param ACTIVITYDATA $value Property value
     *
     * @return null
     */
    public function setStActivityList(ACTIVITYDATA $value)
    {
        return $this->set(self::STACTIVITYLIST, $value);
    }

    /**
     * Returns value of 'stActivityList' property
     *
     * @return ACTIVITYDATA
     */
    public function getStActivityList()
    {
        return $this->get(self::STACTIVITYLIST);
    }

    /**
     * Sets value of 'strAccount' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccount($value)
    {
        return $this->set(self::STRACCOUNT, $value);
    }

    /**
     * Returns value of 'strAccount' property
     *
     * @return string
     */
    public function getStrAccount()
    {
        return $this->get(self::STRACCOUNT);
    }
}
require_once dirname(__FILE__).'/pb_proto_PbUSERDB.php';