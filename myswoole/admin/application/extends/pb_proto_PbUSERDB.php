<?php
/**
 * Auto generated from PbUSERDB.proto at 2015-10-10 17:21:40
 */

/**
 * enItemType enum
 */
final class EnItemType
{
    const EN_ITEM_TYPE_INVALID = 0;
    const EN_ITEM_TYPE_EQUIP = 1;
    const EN_ITEM_TYPE_PROPS = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'EN_ITEM_TYPE_INVALID' => self::EN_ITEM_TYPE_INVALID,
            'EN_ITEM_TYPE_EQUIP' => self::EN_ITEM_TYPE_EQUIP,
            'EN_ITEM_TYPE_PROPS' => self::EN_ITEM_TYPE_PROPS,
        );
    }
}

/**
 * enPropsSub enum
 */
final class EnPropsSub
{
    const EN_ITEM_TYPE_COMMON = 0;
    const EN_ITEM_TYPE_EQUIPCHIPS = 1;
    const EN_ITEM_TYPE_HEROCHIPS = 2;
    const EN_ITEM_TYPE_TRINKETCHIPS = 3;
    const EN_ITEM_TYPE_MATRIAL = 4;
    const EN_ITEM_TYPE_MATRIALCHIPS = 5;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'EN_ITEM_TYPE_COMMON' => self::EN_ITEM_TYPE_COMMON,
            'EN_ITEM_TYPE_EQUIPCHIPS' => self::EN_ITEM_TYPE_EQUIPCHIPS,
            'EN_ITEM_TYPE_HEROCHIPS' => self::EN_ITEM_TYPE_HEROCHIPS,
            'EN_ITEM_TYPE_TRINKETCHIPS' => self::EN_ITEM_TYPE_TRINKETCHIPS,
            'EN_ITEM_TYPE_MATRIAL' => self::EN_ITEM_TYPE_MATRIAL,
            'EN_ITEM_TYPE_MATRIALCHIPS' => self::EN_ITEM_TYPE_MATRIALCHIPS,
        );
    }
}

/**
 * enHeroEquipType enum
 */
final class EnHeroEquipType
{
    const EN_HERO_EQUIP_TYPE_WEAPON = 0;
    const EN_HERO_EQUIP_TYPE_HELMET = 1;
    const EN_HERO_EQUIP_TYPE_COAT = 2;
    const EN_HERO_EQUIP_TYPE_PANTS = 3;
    const EN_HERO_EQUIP_TYPE_TREASURE1 = 4;
    const EN_HERO_EQUIP_TYPE_TREASURE2 = 5;
    const EN_HERO_EQUIP_TYPE_MAX = 6;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'EN_HERO_EQUIP_TYPE_WEAPON' => self::EN_HERO_EQUIP_TYPE_WEAPON,
            'EN_HERO_EQUIP_TYPE_HELMET' => self::EN_HERO_EQUIP_TYPE_HELMET,
            'EN_HERO_EQUIP_TYPE_COAT' => self::EN_HERO_EQUIP_TYPE_COAT,
            'EN_HERO_EQUIP_TYPE_PANTS' => self::EN_HERO_EQUIP_TYPE_PANTS,
            'EN_HERO_EQUIP_TYPE_TREASURE1' => self::EN_HERO_EQUIP_TYPE_TREASURE1,
            'EN_HERO_EQUIP_TYPE_TREASURE2' => self::EN_HERO_EQUIP_TYPE_TREASURE2,
            'EN_HERO_EQUIP_TYPE_MAX' => self::EN_HERO_EQUIP_TYPE_MAX,
        );
    }
}

/**
 * EMSTATU enum
 */
final class EMSTATU
{
    const STATU_PERMANNET = 1;
    const STATU_COMMON = 2;
    const STATU_TEMPORARY = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'STATU_PERMANNET' => self::STATU_PERMANNET,
            'STATU_COMMON' => self::STATU_COMMON,
            'STATU_TEMPORARY' => self::STATU_TEMPORARY,
        );
    }
}

/**
 * FIRST_TAG enum
 */
final class FIRSTTAG
{
    const FITRST_BUY_MYS_SHOPITEM = 0x1;
    const FITRST_RESET_PVPCD = 0x2;
    const FITRST_OPEN_ACHIIEVEMENT = 0x4;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'FITRST_BUY_MYS_SHOPITEM' => self::FITRST_BUY_MYS_SHOPITEM,
            'FITRST_RESET_PVPCD' => self::FITRST_RESET_PVPCD,
            'FITRST_OPEN_ACHIIEVEMENT' => self::FITRST_OPEN_ACHIIEVEMENT,
        );
    }
}

/**
 * emSocialType enum
 */
final class EmSocialType
{
    const emSocialType_Apply = 1;
    const emSocialType_AskEnergy = 2;
    const emSocialType_SendEnergy = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'emSocialType_Apply' => self::emSocialType_Apply,
            'emSocialType_AskEnergy' => self::emSocialType_AskEnergy,
            'emSocialType_SendEnergy' => self::emSocialType_SendEnergy,
        );
    }
}

/**
 * LABLE enum
 */
final class LABLE
{
    const LABLE_DEFAULT = 0;
    const LABLE_NEW = 1;
    const LABLE_HOT = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'LABLE_DEFAULT' => self::LABLE_DEFAULT,
            'LABLE_NEW' => self::LABLE_NEW,
            'LABLE_HOT' => self::LABLE_HOT,
        );
    }
}

/**
 * ACTIVITY_LINK enum
 */
final class ACTIVITYLINK
{
    const LINK_DEFAULT = 0;
    const LINK_CHARGE = 1;
    const LINK_SHOP = 2;
    const LINK_MYSHOP = 3;
    const LINK_PVP = 4;
    const LINK_GROPSHOP = 5;
    const LINK_BOSS = 6;
    const LINK_HYPERLINK = 7;
    const LINK_LIMITBOSS = 8;
    const LINK_CHARGEBACK = 9;
    const LINK_CONSUMEBACK = 10;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'LINK_DEFAULT' => self::LINK_DEFAULT,
            'LINK_CHARGE' => self::LINK_CHARGE,
            'LINK_SHOP' => self::LINK_SHOP,
            'LINK_MYSHOP' => self::LINK_MYSHOP,
            'LINK_PVP' => self::LINK_PVP,
            'LINK_GROPSHOP' => self::LINK_GROPSHOP,
            'LINK_BOSS' => self::LINK_BOSS,
            'LINK_HYPERLINK' => self::LINK_HYPERLINK,
            'LINK_LIMITBOSS' => self::LINK_LIMITBOSS,
            'LINK_CHARGEBACK' => self::LINK_CHARGEBACK,
            'LINK_CONSUMEBACK' => self::LINK_CONSUMEBACK,
        );
    }
}

/**
 * GameUserInfo message
 */
class GameUserInfo extends \ProtobufMessage
{
    /* Field index constants */
    const UIN = 1;
    const NAMEKEY = 2;
    const WORLDID = 3;
    const ILEVEL = 4;
    const IFIGHTVALUE = 5;
    const IMAXCROSSID = 6;
    const ICROSSSTAR = 7;
    const IGUILDID = 8;
    const STRGUILDNAME = 9;
    const STRBASESUMMARYINFO = 10;
    const STRBASEINFO = 11;
    const STRFORMSUMMARYINFO = 12;
    const STRHEROINFO = 13;
    const STRITEMINFO = 14;
    const STRFIGHTINFO = 15;
    const STRFRIENDINFO = 16;
    const STRRESERVED1 = 17;
    const STRRESERVED2 = 18;
    const STRCHIPS = 19;
    const STRWRESTHISTORY = 20;
    const IPROTECTTIME = 21;
    const STRPARTNER = 22;
    const STRRECHARGE = 23;
    const STRHANDBOOK = 24;
    const STROFFLINTDATA = 25;
    const STRACCOUNTSTATU = 26;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UIN => array(
            'name' => 'uin',
            'required' => false,
            'type' => 5,
        ),
        self::NAMEKEY => array(
            'name' => 'nameKey',
            'required' => false,
            'type' => 7,
        ),
        self::WORLDID => array(
            'name' => 'worldID',
            'required' => false,
            'type' => 5,
        ),
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXCROSSID => array(
            'name' => 'iMaxCrossId',
            'required' => false,
            'type' => 5,
        ),
        self::ICROSSSTAR => array(
            'name' => 'iCrossStar',
            'required' => false,
            'type' => 5,
        ),
        self::IGUILDID => array(
            'name' => 'iGuildId',
            'required' => false,
            'type' => 5,
        ),
        self::STRGUILDNAME => array(
            'name' => 'strGuildName',
            'required' => false,
            'type' => 7,
        ),
        self::STRBASESUMMARYINFO => array(
            'name' => 'strBaseSummaryInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRBASEINFO => array(
            'name' => 'strBaseInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRFORMSUMMARYINFO => array(
            'name' => 'strFormSummaryInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRHEROINFO => array(
            'name' => 'strHeroInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRITEMINFO => array(
            'name' => 'strItemInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRFIGHTINFO => array(
            'name' => 'strFightInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRFRIENDINFO => array(
            'name' => 'strFriendInfo',
            'required' => false,
            'type' => 7,
        ),
        self::STRRESERVED1 => array(
            'name' => 'strReserved1',
            'required' => false,
            'type' => 7,
        ),
        self::STRRESERVED2 => array(
            'name' => 'strReserved2',
            'required' => false,
            'type' => 7,
        ),
        self::STRCHIPS => array(
            'name' => 'strChips',
            'required' => false,
            'type' => 7,
        ),
        self::STRWRESTHISTORY => array(
            'name' => 'strWrestHistory',
            'required' => false,
            'type' => 7,
        ),
        self::IPROTECTTIME => array(
            'name' => 'iProtectTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRPARTNER => array(
            'name' => 'strPartner',
            'required' => false,
            'type' => 7,
        ),
        self::STRRECHARGE => array(
            'name' => 'strRecharge',
            'required' => false,
            'type' => 7,
        ),
        self::STRHANDBOOK => array(
            'name' => 'strHandBook',
            'required' => false,
            'type' => 7,
        ),
        self::STROFFLINTDATA => array(
            'name' => 'strOffLintData',
            'required' => false,
            'type' => 7,
        ),
        self::STRACCOUNTSTATU => array(
            'name' => 'strAccountStatu',
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
        $this->values[self::UIN] = null;
        $this->values[self::NAMEKEY] = null;
        $this->values[self::WORLDID] = null;
        $this->values[self::ILEVEL] = null;
        $this->values[self::IFIGHTVALUE] = null;
        $this->values[self::IMAXCROSSID] = null;
        $this->values[self::ICROSSSTAR] = null;
        $this->values[self::IGUILDID] = null;
        $this->values[self::STRGUILDNAME] = null;
        $this->values[self::STRBASESUMMARYINFO] = null;
        $this->values[self::STRBASEINFO] = null;
        $this->values[self::STRFORMSUMMARYINFO] = null;
        $this->values[self::STRHEROINFO] = null;
        $this->values[self::STRITEMINFO] = null;
        $this->values[self::STRFIGHTINFO] = null;
        $this->values[self::STRFRIENDINFO] = null;
        $this->values[self::STRRESERVED1] = null;
        $this->values[self::STRRESERVED2] = null;
        $this->values[self::STRCHIPS] = null;
        $this->values[self::STRWRESTHISTORY] = null;
        $this->values[self::IPROTECTTIME] = null;
        $this->values[self::STRPARTNER] = null;
        $this->values[self::STRRECHARGE] = null;
        $this->values[self::STRHANDBOOK] = null;
        $this->values[self::STROFFLINTDATA] = null;
        $this->values[self::STRACCOUNTSTATU] = null;
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
     * Sets value of 'nameKey' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNameKey($value)
    {
        return $this->set(self::NAMEKEY, $value);
    }

    /**
     * Returns value of 'nameKey' property
     *
     * @return string
     */
    public function getNameKey()
    {
        return $this->get(self::NAMEKEY);
    }

    /**
     * Sets value of 'worldID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorldID($value)
    {
        return $this->set(self::WORLDID, $value);
    }

    /**
     * Returns value of 'worldID' property
     *
     * @return int
     */
    public function getWorldID()
    {
        return $this->get(self::WORLDID);
    }

    /**
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }

    /**
     * Sets value of 'iMaxCrossId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxCrossId($value)
    {
        return $this->set(self::IMAXCROSSID, $value);
    }

    /**
     * Returns value of 'iMaxCrossId' property
     *
     * @return int
     */
    public function getIMaxCrossId()
    {
        return $this->get(self::IMAXCROSSID);
    }

    /**
     * Sets value of 'iCrossStar' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICrossStar($value)
    {
        return $this->set(self::ICROSSSTAR, $value);
    }

    /**
     * Returns value of 'iCrossStar' property
     *
     * @return int
     */
    public function getICrossStar()
    {
        return $this->get(self::ICROSSSTAR);
    }

    /**
     * Sets value of 'iGuildId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildId($value)
    {
        return $this->set(self::IGUILDID, $value);
    }

    /**
     * Returns value of 'iGuildId' property
     *
     * @return int
     */
    public function getIGuildId()
    {
        return $this->get(self::IGUILDID);
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

    /**
     * Sets value of 'strBaseSummaryInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrBaseSummaryInfo($value)
    {
        return $this->set(self::STRBASESUMMARYINFO, $value);
    }

    /**
     * Returns value of 'strBaseSummaryInfo' property
     *
     * @return string
     */
    public function getStrBaseSummaryInfo()
    {
        return $this->get(self::STRBASESUMMARYINFO);
    }

    /**
     * Sets value of 'strBaseInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrBaseInfo($value)
    {
        return $this->set(self::STRBASEINFO, $value);
    }

    /**
     * Returns value of 'strBaseInfo' property
     *
     * @return string
     */
    public function getStrBaseInfo()
    {
        return $this->get(self::STRBASEINFO);
    }

    /**
     * Sets value of 'strFormSummaryInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrFormSummaryInfo($value)
    {
        return $this->set(self::STRFORMSUMMARYINFO, $value);
    }

    /**
     * Returns value of 'strFormSummaryInfo' property
     *
     * @return string
     */
    public function getStrFormSummaryInfo()
    {
        return $this->get(self::STRFORMSUMMARYINFO);
    }

    /**
     * Sets value of 'strHeroInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrHeroInfo($value)
    {
        return $this->set(self::STRHEROINFO, $value);
    }

    /**
     * Returns value of 'strHeroInfo' property
     *
     * @return string
     */
    public function getStrHeroInfo()
    {
        return $this->get(self::STRHEROINFO);
    }

    /**
     * Sets value of 'strItemInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrItemInfo($value)
    {
        return $this->set(self::STRITEMINFO, $value);
    }

    /**
     * Returns value of 'strItemInfo' property
     *
     * @return string
     */
    public function getStrItemInfo()
    {
        return $this->get(self::STRITEMINFO);
    }

    /**
     * Sets value of 'strFightInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrFightInfo($value)
    {
        return $this->set(self::STRFIGHTINFO, $value);
    }

    /**
     * Returns value of 'strFightInfo' property
     *
     * @return string
     */
    public function getStrFightInfo()
    {
        return $this->get(self::STRFIGHTINFO);
    }

    /**
     * Sets value of 'strFriendInfo' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrFriendInfo($value)
    {
        return $this->set(self::STRFRIENDINFO, $value);
    }

    /**
     * Returns value of 'strFriendInfo' property
     *
     * @return string
     */
    public function getStrFriendInfo()
    {
        return $this->get(self::STRFRIENDINFO);
    }

    /**
     * Sets value of 'strReserved1' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrReserved1($value)
    {
        return $this->set(self::STRRESERVED1, $value);
    }

    /**
     * Returns value of 'strReserved1' property
     *
     * @return string
     */
    public function getStrReserved1()
    {
        return $this->get(self::STRRESERVED1);
    }

    /**
     * Sets value of 'strReserved2' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrReserved2($value)
    {
        return $this->set(self::STRRESERVED2, $value);
    }

    /**
     * Returns value of 'strReserved2' property
     *
     * @return string
     */
    public function getStrReserved2()
    {
        return $this->get(self::STRRESERVED2);
    }

    /**
     * Sets value of 'strChips' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrChips($value)
    {
        return $this->set(self::STRCHIPS, $value);
    }

    /**
     * Returns value of 'strChips' property
     *
     * @return string
     */
    public function getStrChips()
    {
        return $this->get(self::STRCHIPS);
    }

    /**
     * Sets value of 'strWrestHistory' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrWrestHistory($value)
    {
        return $this->set(self::STRWRESTHISTORY, $value);
    }

    /**
     * Returns value of 'strWrestHistory' property
     *
     * @return string
     */
    public function getStrWrestHistory()
    {
        return $this->get(self::STRWRESTHISTORY);
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
     * Sets value of 'strPartner' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrPartner($value)
    {
        return $this->set(self::STRPARTNER, $value);
    }

    /**
     * Returns value of 'strPartner' property
     *
     * @return string
     */
    public function getStrPartner()
    {
        return $this->get(self::STRPARTNER);
    }

    /**
     * Sets value of 'strRecharge' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrRecharge($value)
    {
        return $this->set(self::STRRECHARGE, $value);
    }

    /**
     * Returns value of 'strRecharge' property
     *
     * @return string
     */
    public function getStrRecharge()
    {
        return $this->get(self::STRRECHARGE);
    }

    /**
     * Sets value of 'strHandBook' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrHandBook($value)
    {
        return $this->set(self::STRHANDBOOK, $value);
    }

    /**
     * Returns value of 'strHandBook' property
     *
     * @return string
     */
    public function getStrHandBook()
    {
        return $this->get(self::STRHANDBOOK);
    }

    /**
     * Sets value of 'strOffLintData' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrOffLintData($value)
    {
        return $this->set(self::STROFFLINTDATA, $value);
    }

    /**
     * Returns value of 'strOffLintData' property
     *
     * @return string
     */
    public function getStrOffLintData()
    {
        return $this->get(self::STROFFLINTDATA);
    }

    /**
     * Sets value of 'strAccountStatu' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrAccountStatu($value)
    {
        return $this->set(self::STRACCOUNTSTATU, $value);
    }

    /**
     * Returns value of 'strAccountStatu' property
     *
     * @return string
     */
    public function getStrAccountStatu()
    {
        return $this->get(self::STRACCOUNTSTATU);
    }
}

/**
 * ACCOUNTSTATU message
 */
class ACCOUNTSTATU extends \ProtobufMessage
{
    /* Field index constants */
    const IBEGINTIME = 1;
    const IENDTIME = 2;
    const ISTATU = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBEGINTIME => array(
            'name' => 'iBeginTime',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndTime',
            'required' => false,
            'type' => 5,
        ),
        self::ISTATU => array(
            'name' => 'iStatu',
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
        $this->values[self::IBEGINTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::ISTATU] = null;
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
     * Sets value of 'iBeginTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBeginTime($value)
    {
        return $this->set(self::IBEGINTIME, $value);
    }

    /**
     * Returns value of 'iBeginTime' property
     *
     * @return int
     */
    public function getIBeginTime()
    {
        return $this->get(self::IBEGINTIME);
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
     * Sets value of 'iStatu' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStatu($value)
    {
        return $this->set(self::ISTATU, $value);
    }

    /**
     * Returns value of 'iStatu' property
     *
     * @return int
     */
    public function getIStatu()
    {
        return $this->get(self::ISTATU);
    }
}

/**
 * GameUserInfo_Part2 message
 */
class GameUserInfoPart2 extends \ProtobufMessage
{
    /* Field index constants */
    const UIN = 1;
    const WORLDID = 2;
    const STRHANDBOOK = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UIN => array(
            'name' => 'uin',
            'required' => false,
            'type' => 5,
        ),
        self::WORLDID => array(
            'name' => 'worldID',
            'required' => false,
            'type' => 5,
        ),
        self::STRHANDBOOK => array(
            'name' => 'strHandBook',
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
        $this->values[self::UIN] = null;
        $this->values[self::WORLDID] = null;
        $this->values[self::STRHANDBOOK] = null;
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
     * Sets value of 'worldID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorldID($value)
    {
        return $this->set(self::WORLDID, $value);
    }

    /**
     * Returns value of 'worldID' property
     *
     * @return int
     */
    public function getWorldID()
    {
        return $this->get(self::WORLDID);
    }

    /**
     * Sets value of 'strHandBook' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrHandBook($value)
    {
        return $this->set(self::STRHANDBOOK, $value);
    }

    /**
     * Returns value of 'strHandBook' property
     *
     * @return string
     */
    public function getStrHandBook()
    {
        return $this->get(self::STRHANDBOOK);
    }
}

/**
 * OffLineGameUserInfo message
 */
class OffLineGameUserInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const BFETCHBASICSUMMARY = 2;
    const BHEROFORMSUMMARY = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 8,
        ),
        self::BFETCHBASICSUMMARY => array(
            'name' => 'bFetchBasicSummary',
            'required' => false,
            'type' => 8,
        ),
        self::BHEROFORMSUMMARY => array(
            'name' => 'bHeroFormSummary',
            'required' => false,
            'type' => 8,
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
        $this->values[self::IROLEID] = null;
        $this->values[self::BFETCHBASICSUMMARY] = null;
        $this->values[self::BHEROFORMSUMMARY] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return bool
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'bFetchBasicSummary' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBFetchBasicSummary($value)
    {
        return $this->set(self::BFETCHBASICSUMMARY, $value);
    }

    /**
     * Returns value of 'bFetchBasicSummary' property
     *
     * @return bool
     */
    public function getBFetchBasicSummary()
    {
        return $this->get(self::BFETCHBASICSUMMARY);
    }

    /**
     * Sets value of 'bHeroFormSummary' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBHeroFormSummary($value)
    {
        return $this->set(self::BHEROFORMSUMMARY, $value);
    }

    /**
     * Returns value of 'bHeroFormSummary' property
     *
     * @return bool
     */
    public function getBHeroFormSummary()
    {
        return $this->get(self::BHEROFORMSUMMARY);
    }
}

/**
 * HeroEquipData message
 */
class HeroEquipData extends \ProtobufMessage
{
    /* Field index constants */
    const STITEMS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STITEMS => array(
            'name' => 'stItems',
            'repeated' => true,
            'type' => 'ItemInfo'
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
        $this->values[self::STITEMS] = array();
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
     * Appends value to 'stItems' list
     *
     * @param ItemInfo $value Value to append
     *
     * @return null
     */
    public function appendStItems(ItemInfo $value)
    {
        return $this->append(self::STITEMS, $value);
    }

    /**
     * Clears 'stItems' list
     *
     * @return null
     */
    public function clearStItems()
    {
        return $this->clear(self::STITEMS);
    }

    /**
     * Returns 'stItems' list
     *
     * @return ItemInfo[]
     */
    public function getStItems()
    {
        return $this->get(self::STITEMS);
    }

    /**
     * Returns 'stItems' iterator
     *
     * @return ArrayIterator
     */
    public function getStItemsIterator()
    {
        return new \ArrayIterator($this->get(self::STITEMS));
    }

    /**
     * Returns element from 'stItems' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ItemInfo
     */
    public function getStItemsAt($offset)
    {
        return $this->get(self::STITEMS, $offset);
    }

    /**
     * Returns count of 'stItems' list
     *
     * @return int
     */
    public function getStItemsCount()
    {
        return $this->count(self::STITEMS);
    }
}

/**
 * HeroSummaryInfo message
 */
class HeroSummaryInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IHEROINDEX = 1;
    const IHEROID = 2;
    const IHEROFOSTERLV = 3;
    const IHEROSTEPLV = 4;
    const STEQUIPS = 5;
    const ISTARLV = 6;
    const STSKILLS = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IHEROINDEX => array(
            'name' => 'iHeroIndex',
            'required' => false,
            'type' => 5,
        ),
        self::IHEROID => array(
            'name' => 'iHeroId',
            'required' => false,
            'type' => 5,
        ),
        self::IHEROFOSTERLV => array(
            'name' => 'iHeroFosterLv',
            'required' => false,
            'type' => 5,
        ),
        self::IHEROSTEPLV => array(
            'name' => 'iHeroStepLv',
            'required' => false,
            'type' => 5,
        ),
        self::STEQUIPS => array(
            'name' => 'stEquips',
            'required' => false,
            'type' => 'HeroEquipData'
        ),
        self::ISTARLV => array(
            'name' => 'iStarLv',
            'required' => false,
            'type' => 5,
        ),
        self::STSKILLS => array(
            'name' => 'stSkills',
            'repeated' => true,
            'type' => 'HeroSkill'
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
        $this->values[self::IHEROINDEX] = null;
        $this->values[self::IHEROID] = null;
        $this->values[self::IHEROFOSTERLV] = null;
        $this->values[self::IHEROSTEPLV] = null;
        $this->values[self::STEQUIPS] = null;
        $this->values[self::ISTARLV] = null;
        $this->values[self::STSKILLS] = array();
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
     * Sets value of 'iHeroIndex' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroIndex($value)
    {
        return $this->set(self::IHEROINDEX, $value);
    }

    /**
     * Returns value of 'iHeroIndex' property
     *
     * @return int
     */
    public function getIHeroIndex()
    {
        return $this->get(self::IHEROINDEX);
    }

    /**
     * Sets value of 'iHeroId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroId($value)
    {
        return $this->set(self::IHEROID, $value);
    }

    /**
     * Returns value of 'iHeroId' property
     *
     * @return int
     */
    public function getIHeroId()
    {
        return $this->get(self::IHEROID);
    }

    /**
     * Sets value of 'iHeroFosterLv' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroFosterLv($value)
    {
        return $this->set(self::IHEROFOSTERLV, $value);
    }

    /**
     * Returns value of 'iHeroFosterLv' property
     *
     * @return int
     */
    public function getIHeroFosterLv()
    {
        return $this->get(self::IHEROFOSTERLV);
    }

    /**
     * Sets value of 'iHeroStepLv' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroStepLv($value)
    {
        return $this->set(self::IHEROSTEPLV, $value);
    }

    /**
     * Returns value of 'iHeroStepLv' property
     *
     * @return int
     */
    public function getIHeroStepLv()
    {
        return $this->get(self::IHEROSTEPLV);
    }

    /**
     * Sets value of 'stEquips' property
     *
     * @param HeroEquipData $value Property value
     *
     * @return null
     */
    public function setStEquips(HeroEquipData $value)
    {
        return $this->set(self::STEQUIPS, $value);
    }

    /**
     * Returns value of 'stEquips' property
     *
     * @return HeroEquipData
     */
    public function getStEquips()
    {
        return $this->get(self::STEQUIPS);
    }

    /**
     * Sets value of 'iStarLv' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStarLv($value)
    {
        return $this->set(self::ISTARLV, $value);
    }

    /**
     * Returns value of 'iStarLv' property
     *
     * @return int
     */
    public function getIStarLv()
    {
        return $this->get(self::ISTARLV);
    }

    /**
     * Appends value to 'stSkills' list
     *
     * @param HeroSkill $value Value to append
     *
     * @return null
     */
    public function appendStSkills(HeroSkill $value)
    {
        return $this->append(self::STSKILLS, $value);
    }

    /**
     * Clears 'stSkills' list
     *
     * @return null
     */
    public function clearStSkills()
    {
        return $this->clear(self::STSKILLS);
    }

    /**
     * Returns 'stSkills' list
     *
     * @return HeroSkill[]
     */
    public function getStSkills()
    {
        return $this->get(self::STSKILLS);
    }

    /**
     * Returns 'stSkills' iterator
     *
     * @return ArrayIterator
     */
    public function getStSkillsIterator()
    {
        return new \ArrayIterator($this->get(self::STSKILLS));
    }

    /**
     * Returns element from 'stSkills' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return HeroSkill
     */
    public function getStSkillsAt($offset)
    {
        return $this->get(self::STSKILLS, $offset);
    }

    /**
     * Returns count of 'stSkills' list
     *
     * @return int
     */
    public function getStSkillsCount()
    {
        return $this->count(self::STSKILLS);
    }
}

/**
 * BasicPlayerSummary message
 */
class BasicPlayerSummary extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const IROLELEVEL = 2;
    const STRNICKNAME = 3;
    const ICROSSSTARS = 4;
    const ILASTLOGOUTTIME = 5;
    const IFRIENDSNUM = 6;
    const IHEADIMGID = 7;
    const IVIPLV = 8;
    const IISONLINE = 9;
    const IMAXCROSSID = 10;
    const IFIGHTVALUE = 11;
    const ITALENT = 12;
    const IUIN = 13;
    const IPVPNOTIFY = 14;
    const IMASTERNOTIFY = 15;
    const IWRESTNOTIFY = 16;
    const IGUILDID = 17;
    const STRGUILDNAME = 18;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::IROLELEVEL => array(
            'name' => 'iRoleLevel',
            'required' => false,
            'type' => 5,
        ),
        self::STRNICKNAME => array(
            'name' => 'strNickName',
            'required' => false,
            'type' => 7,
        ),
        self::ICROSSSTARS => array(
            'name' => 'iCrossStars',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTLOGOUTTIME => array(
            'name' => 'iLastLogOutTime',
            'required' => false,
            'type' => 5,
        ),
        self::IFRIENDSNUM => array(
            'name' => 'iFriendsNum',
            'required' => false,
            'type' => 5,
        ),
        self::IHEADIMGID => array(
            'name' => 'iHeadImgId',
            'required' => false,
            'type' => 5,
        ),
        self::IVIPLV => array(
            'name' => 'iViplv',
            'required' => false,
            'type' => 5,
        ),
        self::IISONLINE => array(
            'name' => 'iIsOnLine',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXCROSSID => array(
            'name' => 'iMaxCrossID',
            'required' => false,
            'type' => 5,
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
            'required' => false,
            'type' => 5,
        ),
        self::ITALENT => array(
            'name' => 'iTalent',
            'required' => false,
            'type' => 5,
        ),
        self::IUIN => array(
            'name' => 'iUin',
            'required' => false,
            'type' => 5,
        ),
        self::IPVPNOTIFY => array(
            'name' => 'iPvpNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IMASTERNOTIFY => array(
            'name' => 'iMasterNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTNOTIFY => array(
            'name' => 'iWrestNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IGUILDID => array(
            'name' => 'iGuildID',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::IROLELEVEL] = null;
        $this->values[self::STRNICKNAME] = null;
        $this->values[self::ICROSSSTARS] = null;
        $this->values[self::ILASTLOGOUTTIME] = null;
        $this->values[self::IFRIENDSNUM] = null;
        $this->values[self::IHEADIMGID] = null;
        $this->values[self::IVIPLV] = null;
        $this->values[self::IISONLINE] = null;
        $this->values[self::IMAXCROSSID] = null;
        $this->values[self::IFIGHTVALUE] = null;
        $this->values[self::ITALENT] = null;
        $this->values[self::IUIN] = null;
        $this->values[self::IPVPNOTIFY] = null;
        $this->values[self::IMASTERNOTIFY] = null;
        $this->values[self::IWRESTNOTIFY] = null;
        $this->values[self::IGUILDID] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'iRoleLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleLevel($value)
    {
        return $this->set(self::IROLELEVEL, $value);
    }

    /**
     * Returns value of 'iRoleLevel' property
     *
     * @return int
     */
    public function getIRoleLevel()
    {
        return $this->get(self::IROLELEVEL);
    }

    /**
     * Sets value of 'strNickName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrNickName($value)
    {
        return $this->set(self::STRNICKNAME, $value);
    }

    /**
     * Returns value of 'strNickName' property
     *
     * @return string
     */
    public function getStrNickName()
    {
        return $this->get(self::STRNICKNAME);
    }

    /**
     * Sets value of 'iCrossStars' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICrossStars($value)
    {
        return $this->set(self::ICROSSSTARS, $value);
    }

    /**
     * Returns value of 'iCrossStars' property
     *
     * @return int
     */
    public function getICrossStars()
    {
        return $this->get(self::ICROSSSTARS);
    }

    /**
     * Sets value of 'iLastLogOutTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastLogOutTime($value)
    {
        return $this->set(self::ILASTLOGOUTTIME, $value);
    }

    /**
     * Returns value of 'iLastLogOutTime' property
     *
     * @return int
     */
    public function getILastLogOutTime()
    {
        return $this->get(self::ILASTLOGOUTTIME);
    }

    /**
     * Sets value of 'iFriendsNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFriendsNum($value)
    {
        return $this->set(self::IFRIENDSNUM, $value);
    }

    /**
     * Returns value of 'iFriendsNum' property
     *
     * @return int
     */
    public function getIFriendsNum()
    {
        return $this->get(self::IFRIENDSNUM);
    }

    /**
     * Sets value of 'iHeadImgId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeadImgId($value)
    {
        return $this->set(self::IHEADIMGID, $value);
    }

    /**
     * Returns value of 'iHeadImgId' property
     *
     * @return int
     */
    public function getIHeadImgId()
    {
        return $this->get(self::IHEADIMGID);
    }

    /**
     * Sets value of 'iViplv' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIViplv($value)
    {
        return $this->set(self::IVIPLV, $value);
    }

    /**
     * Returns value of 'iViplv' property
     *
     * @return int
     */
    public function getIViplv()
    {
        return $this->get(self::IVIPLV);
    }

    /**
     * Sets value of 'iIsOnLine' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIIsOnLine($value)
    {
        return $this->set(self::IISONLINE, $value);
    }

    /**
     * Returns value of 'iIsOnLine' property
     *
     * @return int
     */
    public function getIIsOnLine()
    {
        return $this->get(self::IISONLINE);
    }

    /**
     * Sets value of 'iMaxCrossID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxCrossID($value)
    {
        return $this->set(self::IMAXCROSSID, $value);
    }

    /**
     * Returns value of 'iMaxCrossID' property
     *
     * @return int
     */
    public function getIMaxCrossID()
    {
        return $this->get(self::IMAXCROSSID);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }

    /**
     * Sets value of 'iTalent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalent($value)
    {
        return $this->set(self::ITALENT, $value);
    }

    /**
     * Returns value of 'iTalent' property
     *
     * @return int
     */
    public function getITalent()
    {
        return $this->get(self::ITALENT);
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
     * Sets value of 'iPvpNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPvpNotify($value)
    {
        return $this->set(self::IPVPNOTIFY, $value);
    }

    /**
     * Returns value of 'iPvpNotify' property
     *
     * @return int
     */
    public function getIPvpNotify()
    {
        return $this->get(self::IPVPNOTIFY);
    }

    /**
     * Sets value of 'iMasterNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMasterNotify($value)
    {
        return $this->set(self::IMASTERNOTIFY, $value);
    }

    /**
     * Returns value of 'iMasterNotify' property
     *
     * @return int
     */
    public function getIMasterNotify()
    {
        return $this->get(self::IMASTERNOTIFY);
    }

    /**
     * Sets value of 'iWrestNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestNotify($value)
    {
        return $this->set(self::IWRESTNOTIFY, $value);
    }

    /**
     * Returns value of 'iWrestNotify' property
     *
     * @return int
     */
    public function getIWrestNotify()
    {
        return $this->get(self::IWRESTNOTIFY);
    }

    /**
     * Sets value of 'iGuildID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildID($value)
    {
        return $this->set(self::IGUILDID, $value);
    }

    /**
     * Returns value of 'iGuildID' property
     *
     * @return int
     */
    public function getIGuildID()
    {
        return $this->get(self::IGUILDID);
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
 * ProtoOffLineEvt message
 */
class ProtoOffLineEvt extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const ITIME = 2;
    const IEVTTYPE = 3;
    const IPARAM = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::ITIME => array(
            'name' => 'iTime',
            'required' => false,
            'type' => 5,
        ),
        self::IEVTTYPE => array(
            'name' => 'iEvtType',
            'required' => false,
            'type' => 5,
        ),
        self::IPARAM => array(
            'name' => 'iParam',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::ITIME] = null;
        $this->values[self::IEVTTYPE] = null;
        $this->values[self::IPARAM] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
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
     * Sets value of 'iEvtType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEvtType($value)
    {
        return $this->set(self::IEVTTYPE, $value);
    }

    /**
     * Returns value of 'iEvtType' property
     *
     * @return int
     */
    public function getIEvtType()
    {
        return $this->get(self::IEVTTYPE);
    }

    /**
     * Sets value of 'iParam' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIParam($value)
    {
        return $this->set(self::IPARAM, $value);
    }

    /**
     * Returns value of 'iParam' property
     *
     * @return int
     */
    public function getIParam()
    {
        return $this->get(self::IPARAM);
    }
}

/**
 * ProtoOffLineData message
 */
class ProtoOffLineData extends \ProtobufMessage
{
    /* Field index constants */
    const STOFFLINEEVTLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STOFFLINEEVTLIST => array(
            'name' => 'stOffLineEvtList',
            'repeated' => true,
            'type' => 'ProtoOffLineEvt'
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
        $this->values[self::STOFFLINEEVTLIST] = array();
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
     * Appends value to 'stOffLineEvtList' list
     *
     * @param ProtoOffLineEvt $value Value to append
     *
     * @return null
     */
    public function appendStOffLineEvtList(ProtoOffLineEvt $value)
    {
        return $this->append(self::STOFFLINEEVTLIST, $value);
    }

    /**
     * Clears 'stOffLineEvtList' list
     *
     * @return null
     */
    public function clearStOffLineEvtList()
    {
        return $this->clear(self::STOFFLINEEVTLIST);
    }

    /**
     * Returns 'stOffLineEvtList' list
     *
     * @return ProtoOffLineEvt[]
     */
    public function getStOffLineEvtList()
    {
        return $this->get(self::STOFFLINEEVTLIST);
    }

    /**
     * Returns 'stOffLineEvtList' iterator
     *
     * @return ArrayIterator
     */
    public function getStOffLineEvtListIterator()
    {
        return new \ArrayIterator($this->get(self::STOFFLINEEVTLIST));
    }

    /**
     * Returns element from 'stOffLineEvtList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ProtoOffLineEvt
     */
    public function getStOffLineEvtListAt($offset)
    {
        return $this->get(self::STOFFLINEEVTLIST, $offset);
    }

    /**
     * Returns count of 'stOffLineEvtList' list
     *
     * @return int
     */
    public function getStOffLineEvtListCount()
    {
        return $this->count(self::STOFFLINEEVTLIST);
    }
}

/**
 * HeroFormSummary message
 */
class HeroFormSummary extends \ProtobufMessage
{
    /* Field index constants */
    const STFORMS = 1;
    const STHEROSSUMMARY = 2;
    const IPOWER = 3;
    const STHEROLIST = 4;
    const STITEMS = 5;
    const STTALENTINFO = 6;
    const STLITTLEBUDDYINFO = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STFORMS => array(
            'name' => 'stForms',
            'required' => false,
            'type' => 'HeroFormGame'
        ),
        self::STHEROSSUMMARY => array(
            'name' => 'stHerosSummary',
            'repeated' => true,
            'type' => 'HeroSummaryInfo'
        ),
        self::IPOWER => array(
            'name' => 'iPower',
            'required' => false,
            'type' => 5,
        ),
        self::STHEROLIST => array(
            'name' => 'stHeroList',
            'repeated' => true,
            'type' => 'OneHeroInfo'
        ),
        self::STITEMS => array(
            'name' => 'stItems',
            'repeated' => true,
            'type' => 'ItemInfo'
        ),
        self::STTALENTINFO => array(
            'name' => 'stTalentInfo',
            'required' => false,
            'type' => 'TALENTINFO'
        ),
        self::STLITTLEBUDDYINFO => array(
            'name' => 'stLittleBuddyInfo',
            'required' => false,
            'type' => 'LITTLEBUDDYINFO'
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
        $this->values[self::STFORMS] = null;
        $this->values[self::STHEROSSUMMARY] = array();
        $this->values[self::IPOWER] = null;
        $this->values[self::STHEROLIST] = array();
        $this->values[self::STITEMS] = array();
        $this->values[self::STTALENTINFO] = null;
        $this->values[self::STLITTLEBUDDYINFO] = null;
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
     * Sets value of 'stForms' property
     *
     * @param HeroFormGame $value Property value
     *
     * @return null
     */
    public function setStForms(HeroFormGame $value)
    {
        return $this->set(self::STFORMS, $value);
    }

    /**
     * Returns value of 'stForms' property
     *
     * @return HeroFormGame
     */
    public function getStForms()
    {
        return $this->get(self::STFORMS);
    }

    /**
     * Appends value to 'stHerosSummary' list
     *
     * @param HeroSummaryInfo $value Value to append
     *
     * @return null
     */
    public function appendStHerosSummary(HeroSummaryInfo $value)
    {
        return $this->append(self::STHEROSSUMMARY, $value);
    }

    /**
     * Clears 'stHerosSummary' list
     *
     * @return null
     */
    public function clearStHerosSummary()
    {
        return $this->clear(self::STHEROSSUMMARY);
    }

    /**
     * Returns 'stHerosSummary' list
     *
     * @return HeroSummaryInfo[]
     */
    public function getStHerosSummary()
    {
        return $this->get(self::STHEROSSUMMARY);
    }

    /**
     * Returns 'stHerosSummary' iterator
     *
     * @return ArrayIterator
     */
    public function getStHerosSummaryIterator()
    {
        return new \ArrayIterator($this->get(self::STHEROSSUMMARY));
    }

    /**
     * Returns element from 'stHerosSummary' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return HeroSummaryInfo
     */
    public function getStHerosSummaryAt($offset)
    {
        return $this->get(self::STHEROSSUMMARY, $offset);
    }

    /**
     * Returns count of 'stHerosSummary' list
     *
     * @return int
     */
    public function getStHerosSummaryCount()
    {
        return $this->count(self::STHEROSSUMMARY);
    }

    /**
     * Sets value of 'iPower' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPower($value)
    {
        return $this->set(self::IPOWER, $value);
    }

    /**
     * Returns value of 'iPower' property
     *
     * @return int
     */
    public function getIPower()
    {
        return $this->get(self::IPOWER);
    }

    /**
     * Appends value to 'stHeroList' list
     *
     * @param OneHeroInfo $value Value to append
     *
     * @return null
     */
    public function appendStHeroList(OneHeroInfo $value)
    {
        return $this->append(self::STHEROLIST, $value);
    }

    /**
     * Clears 'stHeroList' list
     *
     * @return null
     */
    public function clearStHeroList()
    {
        return $this->clear(self::STHEROLIST);
    }

    /**
     * Returns 'stHeroList' list
     *
     * @return OneHeroInfo[]
     */
    public function getStHeroList()
    {
        return $this->get(self::STHEROLIST);
    }

    /**
     * Returns 'stHeroList' iterator
     *
     * @return ArrayIterator
     */
    public function getStHeroListIterator()
    {
        return new \ArrayIterator($this->get(self::STHEROLIST));
    }

    /**
     * Returns element from 'stHeroList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneHeroInfo
     */
    public function getStHeroListAt($offset)
    {
        return $this->get(self::STHEROLIST, $offset);
    }

    /**
     * Returns count of 'stHeroList' list
     *
     * @return int
     */
    public function getStHeroListCount()
    {
        return $this->count(self::STHEROLIST);
    }

    /**
     * Appends value to 'stItems' list
     *
     * @param ItemInfo $value Value to append
     *
     * @return null
     */
    public function appendStItems(ItemInfo $value)
    {
        return $this->append(self::STITEMS, $value);
    }

    /**
     * Clears 'stItems' list
     *
     * @return null
     */
    public function clearStItems()
    {
        return $this->clear(self::STITEMS);
    }

    /**
     * Returns 'stItems' list
     *
     * @return ItemInfo[]
     */
    public function getStItems()
    {
        return $this->get(self::STITEMS);
    }

    /**
     * Returns 'stItems' iterator
     *
     * @return ArrayIterator
     */
    public function getStItemsIterator()
    {
        return new \ArrayIterator($this->get(self::STITEMS));
    }

    /**
     * Returns element from 'stItems' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ItemInfo
     */
    public function getStItemsAt($offset)
    {
        return $this->get(self::STITEMS, $offset);
    }

    /**
     * Returns count of 'stItems' list
     *
     * @return int
     */
    public function getStItemsCount()
    {
        return $this->count(self::STITEMS);
    }

    /**
     * Sets value of 'stTalentInfo' property
     *
     * @param TALENTINFO $value Property value
     *
     * @return null
     */
    public function setStTalentInfo(TALENTINFO $value)
    {
        return $this->set(self::STTALENTINFO, $value);
    }

    /**
     * Returns value of 'stTalentInfo' property
     *
     * @return TALENTINFO
     */
    public function getStTalentInfo()
    {
        return $this->get(self::STTALENTINFO);
    }

    /**
     * Sets value of 'stLittleBuddyInfo' property
     *
     * @param LITTLEBUDDYINFO $value Property value
     *
     * @return null
     */
    public function setStLittleBuddyInfo(LITTLEBUDDYINFO $value)
    {
        return $this->set(self::STLITTLEBUDDYINFO, $value);
    }

    /**
     * Returns value of 'stLittleBuddyInfo' property
     *
     * @return LITTLEBUDDYINFO
     */
    public function getStLittleBuddyInfo()
    {
        return $this->get(self::STLITTLEBUDDYINFO);
    }
}

/**
 * PlayerSummaryInfo message
 */
class PlayerSummaryInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STBASICPLYSUMMARY = 1;
    const STHEROFORMSUMMARY = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STBASICPLYSUMMARY => array(
            'name' => 'stBasicPlySummary',
            'required' => false,
            'type' => 'BasicPlayerSummary'
        ),
        self::STHEROFORMSUMMARY => array(
            'name' => 'stHeroFormSummary',
            'required' => false,
            'type' => 'HeroFormSummary'
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
        $this->values[self::STBASICPLYSUMMARY] = null;
        $this->values[self::STHEROFORMSUMMARY] = null;
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
     * Sets value of 'stBasicPlySummary' property
     *
     * @param BasicPlayerSummary $value Property value
     *
     * @return null
     */
    public function setStBasicPlySummary(BasicPlayerSummary $value)
    {
        return $this->set(self::STBASICPLYSUMMARY, $value);
    }

    /**
     * Returns value of 'stBasicPlySummary' property
     *
     * @return BasicPlayerSummary
     */
    public function getStBasicPlySummary()
    {
        return $this->get(self::STBASICPLYSUMMARY);
    }

    /**
     * Sets value of 'stHeroFormSummary' property
     *
     * @param HeroFormSummary $value Property value
     *
     * @return null
     */
    public function setStHeroFormSummary(HeroFormSummary $value)
    {
        return $this->set(self::STHEROFORMSUMMARY, $value);
    }

    /**
     * Returns value of 'stHeroFormSummary' property
     *
     * @return HeroFormSummary
     */
    public function getStHeroFormSummary()
    {
        return $this->get(self::STHEROFORMSUMMARY);
    }
}

/**
 * UNLOCKHEADIMG message
 */
class UNLOCKHEADIMG extends \ProtobufMessage
{
    /* Field index constants */
    const IHEADIMGIDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IHEADIMGIDS => array(
            'name' => 'iHeadImgIds',
            'repeated' => true,
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
        $this->values[self::IHEADIMGIDS] = array();
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
     * Appends value to 'iHeadImgIds' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIHeadImgIds($value)
    {
        return $this->append(self::IHEADIMGIDS, $value);
    }

    /**
     * Clears 'iHeadImgIds' list
     *
     * @return null
     */
    public function clearIHeadImgIds()
    {
        return $this->clear(self::IHEADIMGIDS);
    }

    /**
     * Returns 'iHeadImgIds' list
     *
     * @return int[]
     */
    public function getIHeadImgIds()
    {
        return $this->get(self::IHEADIMGIDS);
    }

    /**
     * Returns 'iHeadImgIds' iterator
     *
     * @return ArrayIterator
     */
    public function getIHeadImgIdsIterator()
    {
        return new \ArrayIterator($this->get(self::IHEADIMGIDS));
    }

    /**
     * Returns element from 'iHeadImgIds' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIHeadImgIdsAt($offset)
    {
        return $this->get(self::IHEADIMGIDS, $offset);
    }

    /**
     * Returns count of 'iHeadImgIds' list
     *
     * @return int
     */
    public function getIHeadImgIdsCount()
    {
        return $this->count(self::IHEADIMGIDS);
    }
}

/**
 * GUILDWORSHIP message
 */
class GUILDWORSHIP extends \ProtobufMessage
{
    /* Field index constants */
    const IWORSHIPIDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IWORSHIPIDS => array(
            'name' => 'iWorshipIds',
            'repeated' => true,
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
        $this->values[self::IWORSHIPIDS] = array();
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
     * Appends value to 'iWorshipIds' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIWorshipIds($value)
    {
        return $this->append(self::IWORSHIPIDS, $value);
    }

    /**
     * Clears 'iWorshipIds' list
     *
     * @return null
     */
    public function clearIWorshipIds()
    {
        return $this->clear(self::IWORSHIPIDS);
    }

    /**
     * Returns 'iWorshipIds' list
     *
     * @return int[]
     */
    public function getIWorshipIds()
    {
        return $this->get(self::IWORSHIPIDS);
    }

    /**
     * Returns 'iWorshipIds' iterator
     *
     * @return ArrayIterator
     */
    public function getIWorshipIdsIterator()
    {
        return new \ArrayIterator($this->get(self::IWORSHIPIDS));
    }

    /**
     * Returns element from 'iWorshipIds' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIWorshipIdsAt($offset)
    {
        return $this->get(self::IWORSHIPIDS, $offset);
    }

    /**
     * Returns count of 'iWorshipIds' list
     *
     * @return int
     */
    public function getIWorshipIdsCount()
    {
        return $this->count(self::IWORSHIPIDS);
    }
}

/**
 * BASEDBINFO message
 */
class BASEDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const SZNICKNAME = 1;
    const ILEVEL = 3;
    const IEXP = 4;
    const ICO = 5;
    const ICA = 6;
    const ITALENTPOINTS = 7;
    const IENERGY = 8;
    const USTATUS = 9;
    const IGENDER = 10;
    const ILASTLOGIN = 11;
    const ILASTLOGOUT = 12;
    const ICREATETIME = 13;
    const IONLINETIME = 14;
    const ILOGINCOUNT = 15;
    const IFORBIDTALKINGTIME = 16;
    const ILOGINTIME = 17;
    const ILOGOUTTIME = 18;
    const ILASTRECOVERTIME = 19;
    const IBEGINNERGUIDESTEP = 20;
    const IFINESOUL = 21;
    const IEXCELLENTSOUL = 22;
    const IEPICSOUL = 23;
    const ILEGENDSOUL = 24;
    const ICUREXTRACTCOUNT = 25;
    const IREFINEGOLDDAYCOUNT = 26;
    const IVIPLEVEL = 27;
    const IBUYCOUNT = 28;
    const ILUNCHGETENERGY = 29;
    const IDINNERGETENERGY = 30;
    const ICONTINUELOGINBEGINTIME = 31;
    const IFIRSTLOGININIT = 32;
    const IGAMEFUNCTIONGUIDESTEP = 33;
    const IXZEXTRACTHEROCOUNT = 34;
    const IZSEXTRACTHEROCOUNT = 35;
    const ISOULJADEAMT = 36;
    const ICURFIGHTCOUNT = 37;
    const IISGETFIGHTAWARD = 38;
    const IHONORVALUE = 39;
    const STPVPINFO = 40;
    const IREMAINPVPCOUNT = 41;
    const ICROSSSTARS = 42;
    const IMAXCROSSID = 43;
    const IFIGHTVALUE = 44;
    const IHEADIMGID = 45;
    const STHEADIMG = 46;
    const IPVPIDX = 47;
    const IWRESTCOUNT = 48;
    const IWRESTREMAINCOUNT = 49;
    const IWRESTLUCKY = 50;
    const IMAXREWARDPVPIDX = 51;
    const IFIRSTPVP = 52;
    const IFIRSTWREST = 53;
    const IPVPLASTTIMES = 54;
    const IWORLDCHANNALCOUNT = 55;
    const IFIRSTRECHARGE = 56;
    const IDAILYSENDAMT = 57;
    const IDAILYGETAMT = 58;
    const IDAILYFREESWEEPTIMES = 59;
    const IDAILYBUYSWEEPTIMES = 60;
    const IADDSWEEPTIMES = 61;
    const INIGHTSNACK = 62;
    const IWORLDBCLEARCD = 63;
    const IEQUIPSOULJADE = 64;
    const IPVPSTOREFRESHCOUNT = 65;
    const IPVPNOTIFY = 66;
    const IMASTERNOTIFY = 67;
    const IWRESTNOTIFY = 68;
    const IWRESTBUYCOUNT = 69;
    const IWRESTRECOVERCOUNT = 70;
    const IPRESTIGE = 71;
    const IACTIVEVAL = 72;
    const IPVPCDTIME = 73;
    const IMASTERREMAINCOUNT = 74;
    const IFIRSTTAG = 75;
    const STGUILDWORSHIP = 76;
    const IARCHHEROCOUNT = 77;
    const IARCHEQUIPCOUNT = 78;
    const ICURANABASISRESETCOUNT = 79;
    const IANABASISCROSS = 80;
    const IANABASISAWARDSTATE = 81;
    const IANABASISFIRST = 82;
    const IANABASISSTOREFRESHCOUNT = 83;
    const IANABASISCOIN = 84;
    const IANABASISMAXCROSS = 85;
    const IMAILVERSION = 86;
    const IMAXFIGHTVALUE = 87;
    const IFRIENDCOMBATTIMES = 88;
    const IDEFFIGHTVALUE = 89;
    const ITAILORLEVEL = 90;
    const ITAILOREXP = 91;
    const ITAILORBOOLEAN = 92;
    const IGETCONTOWERTIMES = 93;
    const IGUILDBADGE = 94;
    const ICHEESECOUNT = 95;
    const ISEARCHCOUNT = 96;
    const ILASTCHEESERECIVERY = 97;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SZNICKNAME => array(
            'name' => 'szNickName',
            'required' => false,
            'type' => 7,
        ),
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IEXP => array(
            'name' => 'iExp',
            'required' => false,
            'type' => 5,
        ),
        self::ICO => array(
            'name' => 'iCO',
            'required' => false,
            'type' => 5,
        ),
        self::ICA => array(
            'name' => 'iCA',
            'required' => false,
            'type' => 5,
        ),
        self::ITALENTPOINTS => array(
            'name' => 'iTalentPoints',
            'required' => false,
            'type' => 5,
        ),
        self::IENERGY => array(
            'name' => 'iEnergy',
            'required' => false,
            'type' => 5,
        ),
        self::USTATUS => array(
            'name' => 'uStatus',
            'required' => false,
            'type' => 5,
        ),
        self::IGENDER => array(
            'name' => 'iGender',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTLOGIN => array(
            'name' => 'iLastLogin',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTLOGOUT => array(
            'name' => 'iLastLogout',
            'required' => false,
            'type' => 5,
        ),
        self::ICREATETIME => array(
            'name' => 'iCreateTime',
            'required' => false,
            'type' => 5,
        ),
        self::IONLINETIME => array(
            'name' => 'iOnlineTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGINCOUNT => array(
            'name' => 'iLoginCount',
            'required' => false,
            'type' => 5,
        ),
        self::IFORBIDTALKINGTIME => array(
            'name' => 'iForbidTalkingTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGINTIME => array(
            'name' => 'iLoginTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGOUTTIME => array(
            'name' => 'iLogoutTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTRECOVERTIME => array(
            'name' => 'iLastRecoverTime',
            'required' => false,
            'type' => 5,
        ),
        self::IBEGINNERGUIDESTEP => array(
            'name' => 'iBeginnerGuideStep',
            'required' => false,
            'type' => 5,
        ),
        self::IFINESOUL => array(
            'name' => 'iFineSoul',
            'required' => false,
            'type' => 5,
        ),
        self::IEXCELLENTSOUL => array(
            'name' => 'iExcellentSoul',
            'required' => false,
            'type' => 5,
        ),
        self::IEPICSOUL => array(
            'name' => 'iEpicSoul',
            'required' => false,
            'type' => 5,
        ),
        self::ILEGENDSOUL => array(
            'name' => 'iLegendSoul',
            'required' => false,
            'type' => 5,
        ),
        self::ICUREXTRACTCOUNT => array(
            'name' => 'iCurExtractCount',
            'required' => false,
            'type' => 5,
        ),
        self::IREFINEGOLDDAYCOUNT => array(
            'name' => 'iRefineGoldDayCount',
            'required' => false,
            'type' => 5,
        ),
        self::IVIPLEVEL => array(
            'name' => 'iVIPLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYCOUNT => array(
            'name' => 'iBuyCount',
            'required' => false,
            'type' => 5,
        ),
        self::ILUNCHGETENERGY => array(
            'name' => 'iLunchGetEnergy',
            'required' => false,
            'type' => 5,
        ),
        self::IDINNERGETENERGY => array(
            'name' => 'iDinnerGetEnergy',
            'required' => false,
            'type' => 5,
        ),
        self::ICONTINUELOGINBEGINTIME => array(
            'name' => 'iContinueLoginBeginTime',
            'required' => false,
            'type' => 5,
        ),
        self::IFIRSTLOGININIT => array(
            'name' => 'iFirstLoginInit',
            'required' => false,
            'type' => 5,
        ),
        self::IGAMEFUNCTIONGUIDESTEP => array(
            'name' => 'iGameFunctionGuideStep',
            'required' => false,
            'type' => 5,
        ),
        self::IXZEXTRACTHEROCOUNT => array(
            'name' => 'iXZExtractHeroCount',
            'required' => false,
            'type' => 5,
        ),
        self::IZSEXTRACTHEROCOUNT => array(
            'name' => 'iZSExtractHeroCount',
            'required' => false,
            'type' => 5,
        ),
        self::ISOULJADEAMT => array(
            'name' => 'iSoulJadeAmt',
            'required' => false,
            'type' => 5,
        ),
        self::ICURFIGHTCOUNT => array(
            'name' => 'iCurFightCount',
            'required' => false,
            'type' => 5,
        ),
        self::IISGETFIGHTAWARD => array(
            'name' => 'iIsGetFightAward',
            'required' => false,
            'type' => 5,
        ),
        self::IHONORVALUE => array(
            'name' => 'iHonorValue',
            'required' => false,
            'type' => 5,
        ),
        self::STPVPINFO => array(
            'name' => 'stpvpinfo',
            'required' => false,
            'type' => 'PVPSTORE'
        ),
        self::IREMAINPVPCOUNT => array(
            'name' => 'iRemainPVPCount',
            'required' => false,
            'type' => 5,
        ),
        self::ICROSSSTARS => array(
            'name' => 'iCrossStars',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXCROSSID => array(
            'name' => 'iMaxCrossId',
            'required' => false,
            'type' => 5,
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
            'required' => false,
            'type' => 5,
        ),
        self::IHEADIMGID => array(
            'name' => 'iHeadImgId',
            'required' => false,
            'type' => 5,
        ),
        self::STHEADIMG => array(
            'name' => 'stHeadImg',
            'required' => false,
            'type' => 'UNLOCKHEADIMG'
        ),
        self::IPVPIDX => array(
            'name' => 'iPvpIdx',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTCOUNT => array(
            'name' => 'iWrestCount',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTREMAINCOUNT => array(
            'name' => 'iWrestRemainCount',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTLUCKY => array(
            'name' => 'iWrestLucky',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXREWARDPVPIDX => array(
            'name' => 'iMaxRewardPvpIdx',
            'required' => false,
            'type' => 5,
        ),
        self::IFIRSTPVP => array(
            'name' => 'iFirstPvp',
            'required' => false,
            'type' => 5,
        ),
        self::IFIRSTWREST => array(
            'name' => 'iFirstWrest',
            'required' => false,
            'type' => 5,
        ),
        self::IPVPLASTTIMES => array(
            'name' => 'iPvpLastTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IWORLDCHANNALCOUNT => array(
            'name' => 'iWorldChannalCount',
            'required' => false,
            'type' => 5,
        ),
        self::IFIRSTRECHARGE => array(
            'name' => 'iFirstRecharge',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYSENDAMT => array(
            'name' => 'iDailySendAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYGETAMT => array(
            'name' => 'iDailyGetAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYFREESWEEPTIMES => array(
            'name' => 'iDailyFreeSweepTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYBUYSWEEPTIMES => array(
            'name' => 'iDailyBuySweepTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IADDSWEEPTIMES => array(
            'name' => 'iAddSweepTimes',
            'required' => false,
            'type' => 5,
        ),
        self::INIGHTSNACK => array(
            'name' => 'iNightsnack',
            'required' => false,
            'type' => 5,
        ),
        self::IWORLDBCLEARCD => array(
            'name' => 'iWorldBClearCD',
            'required' => false,
            'type' => 5,
        ),
        self::IEQUIPSOULJADE => array(
            'name' => 'iEquipSoulJade',
            'required' => false,
            'type' => 5,
        ),
        self::IPVPSTOREFRESHCOUNT => array(
            'name' => 'iPvpStoreFreshCount',
            'required' => false,
            'type' => 5,
        ),
        self::IPVPNOTIFY => array(
            'name' => 'iPvpNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IMASTERNOTIFY => array(
            'name' => 'iMasterNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTNOTIFY => array(
            'name' => 'iWrestNotify',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTBUYCOUNT => array(
            'name' => 'iWrestBuyCount',
            'required' => false,
            'type' => 5,
        ),
        self::IWRESTRECOVERCOUNT => array(
            'name' => 'iWrestRecoverCount',
            'required' => false,
            'type' => 5,
        ),
        self::IPRESTIGE => array(
            'name' => 'iPrestige',
            'required' => false,
            'type' => 5,
        ),
        self::IACTIVEVAL => array(
            'name' => 'iActiveVal',
            'required' => false,
            'type' => 5,
        ),
        self::IPVPCDTIME => array(
            'name' => 'iPVPCDTime',
            'required' => false,
            'type' => 5,
        ),
        self::IMASTERREMAINCOUNT => array(
            'name' => 'iMasterRemainCount',
            'required' => false,
            'type' => 5,
        ),
        self::IFIRSTTAG => array(
            'name' => 'iFirstTag',
            'required' => false,
            'type' => 5,
        ),
        self::STGUILDWORSHIP => array(
            'name' => 'stGuildWorship',
            'required' => false,
            'type' => 'GUILDWORSHIP'
        ),
        self::IARCHHEROCOUNT => array(
            'name' => 'iArchHeroCount',
            'required' => false,
            'type' => 5,
        ),
        self::IARCHEQUIPCOUNT => array(
            'name' => 'iArchEquipCount',
            'required' => false,
            'type' => 5,
        ),
        self::ICURANABASISRESETCOUNT => array(
            'name' => 'iCurAnabasisResetCount',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISCROSS => array(
            'name' => 'iAnabasisCross',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISAWARDSTATE => array(
            'name' => 'iAnabasisAwardState',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISFIRST => array(
            'name' => 'iAnabasisFirst',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISSTOREFRESHCOUNT => array(
            'name' => 'iAnabasisStoreFreshCount',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISCOIN => array(
            'name' => 'iAnabasisCoin',
            'required' => false,
            'type' => 5,
        ),
        self::IANABASISMAXCROSS => array(
            'name' => 'iAnabasisMaxCross',
            'required' => false,
            'type' => 5,
        ),
        self::IMAILVERSION => array(
            'name' => 'iMailVersion',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXFIGHTVALUE => array(
            'name' => 'iMaxFightvalue',
            'required' => false,
            'type' => 5,
        ),
        self::IFRIENDCOMBATTIMES => array(
            'name' => 'iFriendCombatTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IDEFFIGHTVALUE => array(
            'name' => 'iDefFightValue',
            'required' => false,
            'type' => 5,
        ),
        self::ITAILORLEVEL => array(
            'name' => 'iTailorLevel',
            'required' => false,
            'type' => 5,
        ),
        self::ITAILOREXP => array(
            'name' => 'iTailorExp',
            'required' => false,
            'type' => 5,
        ),
        self::ITAILORBOOLEAN => array(
            'name' => 'iTailorBoolean',
            'required' => false,
            'type' => 5,
        ),
        self::IGETCONTOWERTIMES => array(
            'name' => 'iGetConTowerTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IGUILDBADGE => array(
            'name' => 'iGuildBadge',
            'required' => false,
            'type' => 5,
        ),
        self::ICHEESECOUNT => array(
            'name' => 'iCheeseCount',
            'required' => false,
            'type' => 5,
        ),
        self::ISEARCHCOUNT => array(
            'name' => 'iSearchCount',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTCHEESERECIVERY => array(
            'name' => 'iLastCheeseRecivery',
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
        $this->values[self::SZNICKNAME] = null;
        $this->values[self::ILEVEL] = null;
        $this->values[self::IEXP] = null;
        $this->values[self::ICO] = null;
        $this->values[self::ICA] = null;
        $this->values[self::ITALENTPOINTS] = null;
        $this->values[self::IENERGY] = null;
        $this->values[self::USTATUS] = null;
        $this->values[self::IGENDER] = null;
        $this->values[self::ILASTLOGIN] = null;
        $this->values[self::ILASTLOGOUT] = null;
        $this->values[self::ICREATETIME] = null;
        $this->values[self::IONLINETIME] = null;
        $this->values[self::ILOGINCOUNT] = null;
        $this->values[self::IFORBIDTALKINGTIME] = null;
        $this->values[self::ILOGINTIME] = null;
        $this->values[self::ILOGOUTTIME] = null;
        $this->values[self::ILASTRECOVERTIME] = null;
        $this->values[self::IBEGINNERGUIDESTEP] = null;
        $this->values[self::IFINESOUL] = null;
        $this->values[self::IEXCELLENTSOUL] = null;
        $this->values[self::IEPICSOUL] = null;
        $this->values[self::ILEGENDSOUL] = null;
        $this->values[self::ICUREXTRACTCOUNT] = null;
        $this->values[self::IREFINEGOLDDAYCOUNT] = null;
        $this->values[self::IVIPLEVEL] = null;
        $this->values[self::IBUYCOUNT] = null;
        $this->values[self::ILUNCHGETENERGY] = null;
        $this->values[self::IDINNERGETENERGY] = null;
        $this->values[self::ICONTINUELOGINBEGINTIME] = null;
        $this->values[self::IFIRSTLOGININIT] = null;
        $this->values[self::IGAMEFUNCTIONGUIDESTEP] = null;
        $this->values[self::IXZEXTRACTHEROCOUNT] = null;
        $this->values[self::IZSEXTRACTHEROCOUNT] = null;
        $this->values[self::ISOULJADEAMT] = null;
        $this->values[self::ICURFIGHTCOUNT] = null;
        $this->values[self::IISGETFIGHTAWARD] = null;
        $this->values[self::IHONORVALUE] = null;
        $this->values[self::STPVPINFO] = null;
        $this->values[self::IREMAINPVPCOUNT] = null;
        $this->values[self::ICROSSSTARS] = null;
        $this->values[self::IMAXCROSSID] = null;
        $this->values[self::IFIGHTVALUE] = null;
        $this->values[self::IHEADIMGID] = null;
        $this->values[self::STHEADIMG] = null;
        $this->values[self::IPVPIDX] = null;
        $this->values[self::IWRESTCOUNT] = null;
        $this->values[self::IWRESTREMAINCOUNT] = null;
        $this->values[self::IWRESTLUCKY] = null;
        $this->values[self::IMAXREWARDPVPIDX] = null;
        $this->values[self::IFIRSTPVP] = null;
        $this->values[self::IFIRSTWREST] = null;
        $this->values[self::IPVPLASTTIMES] = null;
        $this->values[self::IWORLDCHANNALCOUNT] = null;
        $this->values[self::IFIRSTRECHARGE] = null;
        $this->values[self::IDAILYSENDAMT] = null;
        $this->values[self::IDAILYGETAMT] = null;
        $this->values[self::IDAILYFREESWEEPTIMES] = null;
        $this->values[self::IDAILYBUYSWEEPTIMES] = null;
        $this->values[self::IADDSWEEPTIMES] = null;
        $this->values[self::INIGHTSNACK] = null;
        $this->values[self::IWORLDBCLEARCD] = null;
        $this->values[self::IEQUIPSOULJADE] = null;
        $this->values[self::IPVPSTOREFRESHCOUNT] = null;
        $this->values[self::IPVPNOTIFY] = null;
        $this->values[self::IMASTERNOTIFY] = null;
        $this->values[self::IWRESTNOTIFY] = null;
        $this->values[self::IWRESTBUYCOUNT] = null;
        $this->values[self::IWRESTRECOVERCOUNT] = null;
        $this->values[self::IPRESTIGE] = null;
        $this->values[self::IACTIVEVAL] = null;
        $this->values[self::IPVPCDTIME] = null;
        $this->values[self::IMASTERREMAINCOUNT] = null;
        $this->values[self::IFIRSTTAG] = null;
        $this->values[self::STGUILDWORSHIP] = null;
        $this->values[self::IARCHHEROCOUNT] = null;
        $this->values[self::IARCHEQUIPCOUNT] = null;
        $this->values[self::ICURANABASISRESETCOUNT] = null;
        $this->values[self::IANABASISCROSS] = null;
        $this->values[self::IANABASISAWARDSTATE] = null;
        $this->values[self::IANABASISFIRST] = null;
        $this->values[self::IANABASISSTOREFRESHCOUNT] = null;
        $this->values[self::IANABASISCOIN] = null;
        $this->values[self::IANABASISMAXCROSS] = null;
        $this->values[self::IMAILVERSION] = null;
        $this->values[self::IMAXFIGHTVALUE] = null;
        $this->values[self::IFRIENDCOMBATTIMES] = null;
        $this->values[self::IDEFFIGHTVALUE] = null;
        $this->values[self::ITAILORLEVEL] = null;
        $this->values[self::ITAILOREXP] = null;
        $this->values[self::ITAILORBOOLEAN] = null;
        $this->values[self::IGETCONTOWERTIMES] = null;
        $this->values[self::IGUILDBADGE] = null;
        $this->values[self::ICHEESECOUNT] = null;
        $this->values[self::ISEARCHCOUNT] = null;
        $this->values[self::ILASTCHEESERECIVERY] = null;
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
     * Sets value of 'szNickName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSzNickName($value)
    {
        return $this->set(self::SZNICKNAME, $value);
    }

    /**
     * Returns value of 'szNickName' property
     *
     * @return string
     */
    public function getSzNickName()
    {
        return $this->get(self::SZNICKNAME);
    }

    /**
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'iExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExp($value)
    {
        return $this->set(self::IEXP, $value);
    }

    /**
     * Returns value of 'iExp' property
     *
     * @return int
     */
    public function getIExp()
    {
        return $this->get(self::IEXP);
    }

    /**
     * Sets value of 'iCO' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICO($value)
    {
        return $this->set(self::ICO, $value);
    }

    /**
     * Returns value of 'iCO' property
     *
     * @return int
     */
    public function getICO()
    {
        return $this->get(self::ICO);
    }

    /**
     * Sets value of 'iCA' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICA($value)
    {
        return $this->set(self::ICA, $value);
    }

    /**
     * Returns value of 'iCA' property
     *
     * @return int
     */
    public function getICA()
    {
        return $this->get(self::ICA);
    }

    /**
     * Sets value of 'iTalentPoints' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalentPoints($value)
    {
        return $this->set(self::ITALENTPOINTS, $value);
    }

    /**
     * Returns value of 'iTalentPoints' property
     *
     * @return int
     */
    public function getITalentPoints()
    {
        return $this->get(self::ITALENTPOINTS);
    }

    /**
     * Sets value of 'iEnergy' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEnergy($value)
    {
        return $this->set(self::IENERGY, $value);
    }

    /**
     * Returns value of 'iEnergy' property
     *
     * @return int
     */
    public function getIEnergy()
    {
        return $this->get(self::IENERGY);
    }

    /**
     * Sets value of 'uStatus' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUStatus($value)
    {
        return $this->set(self::USTATUS, $value);
    }

    /**
     * Returns value of 'uStatus' property
     *
     * @return int
     */
    public function getUStatus()
    {
        return $this->get(self::USTATUS);
    }

    /**
     * Sets value of 'iGender' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGender($value)
    {
        return $this->set(self::IGENDER, $value);
    }

    /**
     * Returns value of 'iGender' property
     *
     * @return int
     */
    public function getIGender()
    {
        return $this->get(self::IGENDER);
    }

    /**
     * Sets value of 'iLastLogin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastLogin($value)
    {
        return $this->set(self::ILASTLOGIN, $value);
    }

    /**
     * Returns value of 'iLastLogin' property
     *
     * @return int
     */
    public function getILastLogin()
    {
        return $this->get(self::ILASTLOGIN);
    }

    /**
     * Sets value of 'iLastLogout' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastLogout($value)
    {
        return $this->set(self::ILASTLOGOUT, $value);
    }

    /**
     * Returns value of 'iLastLogout' property
     *
     * @return int
     */
    public function getILastLogout()
    {
        return $this->get(self::ILASTLOGOUT);
    }

    /**
     * Sets value of 'iCreateTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICreateTime($value)
    {
        return $this->set(self::ICREATETIME, $value);
    }

    /**
     * Returns value of 'iCreateTime' property
     *
     * @return int
     */
    public function getICreateTime()
    {
        return $this->get(self::ICREATETIME);
    }

    /**
     * Sets value of 'iOnlineTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIOnlineTime($value)
    {
        return $this->set(self::IONLINETIME, $value);
    }

    /**
     * Returns value of 'iOnlineTime' property
     *
     * @return int
     */
    public function getIOnlineTime()
    {
        return $this->get(self::IONLINETIME);
    }

    /**
     * Sets value of 'iLoginCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoginCount($value)
    {
        return $this->set(self::ILOGINCOUNT, $value);
    }

    /**
     * Returns value of 'iLoginCount' property
     *
     * @return int
     */
    public function getILoginCount()
    {
        return $this->get(self::ILOGINCOUNT);
    }

    /**
     * Sets value of 'iForbidTalkingTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIForbidTalkingTime($value)
    {
        return $this->set(self::IFORBIDTALKINGTIME, $value);
    }

    /**
     * Returns value of 'iForbidTalkingTime' property
     *
     * @return int
     */
    public function getIForbidTalkingTime()
    {
        return $this->get(self::IFORBIDTALKINGTIME);
    }

    /**
     * Sets value of 'iLoginTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoginTime($value)
    {
        return $this->set(self::ILOGINTIME, $value);
    }

    /**
     * Returns value of 'iLoginTime' property
     *
     * @return int
     */
    public function getILoginTime()
    {
        return $this->get(self::ILOGINTIME);
    }

    /**
     * Sets value of 'iLogoutTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILogoutTime($value)
    {
        return $this->set(self::ILOGOUTTIME, $value);
    }

    /**
     * Returns value of 'iLogoutTime' property
     *
     * @return int
     */
    public function getILogoutTime()
    {
        return $this->get(self::ILOGOUTTIME);
    }

    /**
     * Sets value of 'iLastRecoverTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastRecoverTime($value)
    {
        return $this->set(self::ILASTRECOVERTIME, $value);
    }

    /**
     * Returns value of 'iLastRecoverTime' property
     *
     * @return int
     */
    public function getILastRecoverTime()
    {
        return $this->get(self::ILASTRECOVERTIME);
    }

    /**
     * Sets value of 'iBeginnerGuideStep' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBeginnerGuideStep($value)
    {
        return $this->set(self::IBEGINNERGUIDESTEP, $value);
    }

    /**
     * Returns value of 'iBeginnerGuideStep' property
     *
     * @return int
     */
    public function getIBeginnerGuideStep()
    {
        return $this->get(self::IBEGINNERGUIDESTEP);
    }

    /**
     * Sets value of 'iFineSoul' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFineSoul($value)
    {
        return $this->set(self::IFINESOUL, $value);
    }

    /**
     * Returns value of 'iFineSoul' property
     *
     * @return int
     */
    public function getIFineSoul()
    {
        return $this->get(self::IFINESOUL);
    }

    /**
     * Sets value of 'iExcellentSoul' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExcellentSoul($value)
    {
        return $this->set(self::IEXCELLENTSOUL, $value);
    }

    /**
     * Returns value of 'iExcellentSoul' property
     *
     * @return int
     */
    public function getIExcellentSoul()
    {
        return $this->get(self::IEXCELLENTSOUL);
    }

    /**
     * Sets value of 'iEpicSoul' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEpicSoul($value)
    {
        return $this->set(self::IEPICSOUL, $value);
    }

    /**
     * Returns value of 'iEpicSoul' property
     *
     * @return int
     */
    public function getIEpicSoul()
    {
        return $this->get(self::IEPICSOUL);
    }

    /**
     * Sets value of 'iLegendSoul' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILegendSoul($value)
    {
        return $this->set(self::ILEGENDSOUL, $value);
    }

    /**
     * Returns value of 'iLegendSoul' property
     *
     * @return int
     */
    public function getILegendSoul()
    {
        return $this->get(self::ILEGENDSOUL);
    }

    /**
     * Sets value of 'iCurExtractCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurExtractCount($value)
    {
        return $this->set(self::ICUREXTRACTCOUNT, $value);
    }

    /**
     * Returns value of 'iCurExtractCount' property
     *
     * @return int
     */
    public function getICurExtractCount()
    {
        return $this->get(self::ICUREXTRACTCOUNT);
    }

    /**
     * Sets value of 'iRefineGoldDayCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRefineGoldDayCount($value)
    {
        return $this->set(self::IREFINEGOLDDAYCOUNT, $value);
    }

    /**
     * Returns value of 'iRefineGoldDayCount' property
     *
     * @return int
     */
    public function getIRefineGoldDayCount()
    {
        return $this->get(self::IREFINEGOLDDAYCOUNT);
    }

    /**
     * Sets value of 'iVIPLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIVIPLevel($value)
    {
        return $this->set(self::IVIPLEVEL, $value);
    }

    /**
     * Returns value of 'iVIPLevel' property
     *
     * @return int
     */
    public function getIVIPLevel()
    {
        return $this->get(self::IVIPLEVEL);
    }

    /**
     * Sets value of 'iBuyCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyCount($value)
    {
        return $this->set(self::IBUYCOUNT, $value);
    }

    /**
     * Returns value of 'iBuyCount' property
     *
     * @return int
     */
    public function getIBuyCount()
    {
        return $this->get(self::IBUYCOUNT);
    }

    /**
     * Sets value of 'iLunchGetEnergy' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILunchGetEnergy($value)
    {
        return $this->set(self::ILUNCHGETENERGY, $value);
    }

    /**
     * Returns value of 'iLunchGetEnergy' property
     *
     * @return int
     */
    public function getILunchGetEnergy()
    {
        return $this->get(self::ILUNCHGETENERGY);
    }

    /**
     * Sets value of 'iDinnerGetEnergy' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDinnerGetEnergy($value)
    {
        return $this->set(self::IDINNERGETENERGY, $value);
    }

    /**
     * Returns value of 'iDinnerGetEnergy' property
     *
     * @return int
     */
    public function getIDinnerGetEnergy()
    {
        return $this->get(self::IDINNERGETENERGY);
    }

    /**
     * Sets value of 'iContinueLoginBeginTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIContinueLoginBeginTime($value)
    {
        return $this->set(self::ICONTINUELOGINBEGINTIME, $value);
    }

    /**
     * Returns value of 'iContinueLoginBeginTime' property
     *
     * @return int
     */
    public function getIContinueLoginBeginTime()
    {
        return $this->get(self::ICONTINUELOGINBEGINTIME);
    }

    /**
     * Sets value of 'iFirstLoginInit' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFirstLoginInit($value)
    {
        return $this->set(self::IFIRSTLOGININIT, $value);
    }

    /**
     * Returns value of 'iFirstLoginInit' property
     *
     * @return int
     */
    public function getIFirstLoginInit()
    {
        return $this->get(self::IFIRSTLOGININIT);
    }

    /**
     * Sets value of 'iGameFunctionGuideStep' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGameFunctionGuideStep($value)
    {
        return $this->set(self::IGAMEFUNCTIONGUIDESTEP, $value);
    }

    /**
     * Returns value of 'iGameFunctionGuideStep' property
     *
     * @return int
     */
    public function getIGameFunctionGuideStep()
    {
        return $this->get(self::IGAMEFUNCTIONGUIDESTEP);
    }

    /**
     * Sets value of 'iXZExtractHeroCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIXZExtractHeroCount($value)
    {
        return $this->set(self::IXZEXTRACTHEROCOUNT, $value);
    }

    /**
     * Returns value of 'iXZExtractHeroCount' property
     *
     * @return int
     */
    public function getIXZExtractHeroCount()
    {
        return $this->get(self::IXZEXTRACTHEROCOUNT);
    }

    /**
     * Sets value of 'iZSExtractHeroCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIZSExtractHeroCount($value)
    {
        return $this->set(self::IZSEXTRACTHEROCOUNT, $value);
    }

    /**
     * Returns value of 'iZSExtractHeroCount' property
     *
     * @return int
     */
    public function getIZSExtractHeroCount()
    {
        return $this->get(self::IZSEXTRACTHEROCOUNT);
    }

    /**
     * Sets value of 'iSoulJadeAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISoulJadeAmt($value)
    {
        return $this->set(self::ISOULJADEAMT, $value);
    }

    /**
     * Returns value of 'iSoulJadeAmt' property
     *
     * @return int
     */
    public function getISoulJadeAmt()
    {
        return $this->get(self::ISOULJADEAMT);
    }

    /**
     * Sets value of 'iCurFightCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurFightCount($value)
    {
        return $this->set(self::ICURFIGHTCOUNT, $value);
    }

    /**
     * Returns value of 'iCurFightCount' property
     *
     * @return int
     */
    public function getICurFightCount()
    {
        return $this->get(self::ICURFIGHTCOUNT);
    }

    /**
     * Sets value of 'iIsGetFightAward' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIIsGetFightAward($value)
    {
        return $this->set(self::IISGETFIGHTAWARD, $value);
    }

    /**
     * Returns value of 'iIsGetFightAward' property
     *
     * @return int
     */
    public function getIIsGetFightAward()
    {
        return $this->get(self::IISGETFIGHTAWARD);
    }

    /**
     * Sets value of 'iHonorValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHonorValue($value)
    {
        return $this->set(self::IHONORVALUE, $value);
    }

    /**
     * Returns value of 'iHonorValue' property
     *
     * @return int
     */
    public function getIHonorValue()
    {
        return $this->get(self::IHONORVALUE);
    }

    /**
     * Sets value of 'stpvpinfo' property
     *
     * @param PVPSTORE $value Property value
     *
     * @return null
     */
    public function setStpvpinfo(PVPSTORE $value)
    {
        return $this->set(self::STPVPINFO, $value);
    }

    /**
     * Returns value of 'stpvpinfo' property
     *
     * @return PVPSTORE
     */
    public function getStpvpinfo()
    {
        return $this->get(self::STPVPINFO);
    }

    /**
     * Sets value of 'iRemainPVPCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRemainPVPCount($value)
    {
        return $this->set(self::IREMAINPVPCOUNT, $value);
    }

    /**
     * Returns value of 'iRemainPVPCount' property
     *
     * @return int
     */
    public function getIRemainPVPCount()
    {
        return $this->get(self::IREMAINPVPCOUNT);
    }

    /**
     * Sets value of 'iCrossStars' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICrossStars($value)
    {
        return $this->set(self::ICROSSSTARS, $value);
    }

    /**
     * Returns value of 'iCrossStars' property
     *
     * @return int
     */
    public function getICrossStars()
    {
        return $this->get(self::ICROSSSTARS);
    }

    /**
     * Sets value of 'iMaxCrossId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxCrossId($value)
    {
        return $this->set(self::IMAXCROSSID, $value);
    }

    /**
     * Returns value of 'iMaxCrossId' property
     *
     * @return int
     */
    public function getIMaxCrossId()
    {
        return $this->get(self::IMAXCROSSID);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }

    /**
     * Sets value of 'iHeadImgId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeadImgId($value)
    {
        return $this->set(self::IHEADIMGID, $value);
    }

    /**
     * Returns value of 'iHeadImgId' property
     *
     * @return int
     */
    public function getIHeadImgId()
    {
        return $this->get(self::IHEADIMGID);
    }

    /**
     * Sets value of 'stHeadImg' property
     *
     * @param UNLOCKHEADIMG $value Property value
     *
     * @return null
     */
    public function setStHeadImg(UNLOCKHEADIMG $value)
    {
        return $this->set(self::STHEADIMG, $value);
    }

    /**
     * Returns value of 'stHeadImg' property
     *
     * @return UNLOCKHEADIMG
     */
    public function getStHeadImg()
    {
        return $this->get(self::STHEADIMG);
    }

    /**
     * Sets value of 'iPvpIdx' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPvpIdx($value)
    {
        return $this->set(self::IPVPIDX, $value);
    }

    /**
     * Returns value of 'iPvpIdx' property
     *
     * @return int
     */
    public function getIPvpIdx()
    {
        return $this->get(self::IPVPIDX);
    }

    /**
     * Sets value of 'iWrestCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestCount($value)
    {
        return $this->set(self::IWRESTCOUNT, $value);
    }

    /**
     * Returns value of 'iWrestCount' property
     *
     * @return int
     */
    public function getIWrestCount()
    {
        return $this->get(self::IWRESTCOUNT);
    }

    /**
     * Sets value of 'iWrestRemainCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestRemainCount($value)
    {
        return $this->set(self::IWRESTREMAINCOUNT, $value);
    }

    /**
     * Returns value of 'iWrestRemainCount' property
     *
     * @return int
     */
    public function getIWrestRemainCount()
    {
        return $this->get(self::IWRESTREMAINCOUNT);
    }

    /**
     * Sets value of 'iWrestLucky' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestLucky($value)
    {
        return $this->set(self::IWRESTLUCKY, $value);
    }

    /**
     * Returns value of 'iWrestLucky' property
     *
     * @return int
     */
    public function getIWrestLucky()
    {
        return $this->get(self::IWRESTLUCKY);
    }

    /**
     * Sets value of 'iMaxRewardPvpIdx' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxRewardPvpIdx($value)
    {
        return $this->set(self::IMAXREWARDPVPIDX, $value);
    }

    /**
     * Returns value of 'iMaxRewardPvpIdx' property
     *
     * @return int
     */
    public function getIMaxRewardPvpIdx()
    {
        return $this->get(self::IMAXREWARDPVPIDX);
    }

    /**
     * Sets value of 'iFirstPvp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFirstPvp($value)
    {
        return $this->set(self::IFIRSTPVP, $value);
    }

    /**
     * Returns value of 'iFirstPvp' property
     *
     * @return int
     */
    public function getIFirstPvp()
    {
        return $this->get(self::IFIRSTPVP);
    }

    /**
     * Sets value of 'iFirstWrest' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFirstWrest($value)
    {
        return $this->set(self::IFIRSTWREST, $value);
    }

    /**
     * Returns value of 'iFirstWrest' property
     *
     * @return int
     */
    public function getIFirstWrest()
    {
        return $this->get(self::IFIRSTWREST);
    }

    /**
     * Sets value of 'iPvpLastTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPvpLastTimes($value)
    {
        return $this->set(self::IPVPLASTTIMES, $value);
    }

    /**
     * Returns value of 'iPvpLastTimes' property
     *
     * @return int
     */
    public function getIPvpLastTimes()
    {
        return $this->get(self::IPVPLASTTIMES);
    }

    /**
     * Sets value of 'iWorldChannalCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldChannalCount($value)
    {
        return $this->set(self::IWORLDCHANNALCOUNT, $value);
    }

    /**
     * Returns value of 'iWorldChannalCount' property
     *
     * @return int
     */
    public function getIWorldChannalCount()
    {
        return $this->get(self::IWORLDCHANNALCOUNT);
    }

    /**
     * Sets value of 'iFirstRecharge' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFirstRecharge($value)
    {
        return $this->set(self::IFIRSTRECHARGE, $value);
    }

    /**
     * Returns value of 'iFirstRecharge' property
     *
     * @return int
     */
    public function getIFirstRecharge()
    {
        return $this->get(self::IFIRSTRECHARGE);
    }

    /**
     * Sets value of 'iDailySendAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailySendAmt($value)
    {
        return $this->set(self::IDAILYSENDAMT, $value);
    }

    /**
     * Returns value of 'iDailySendAmt' property
     *
     * @return int
     */
    public function getIDailySendAmt()
    {
        return $this->get(self::IDAILYSENDAMT);
    }

    /**
     * Sets value of 'iDailyGetAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyGetAmt($value)
    {
        return $this->set(self::IDAILYGETAMT, $value);
    }

    /**
     * Returns value of 'iDailyGetAmt' property
     *
     * @return int
     */
    public function getIDailyGetAmt()
    {
        return $this->get(self::IDAILYGETAMT);
    }

    /**
     * Sets value of 'iDailyFreeSweepTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyFreeSweepTimes($value)
    {
        return $this->set(self::IDAILYFREESWEEPTIMES, $value);
    }

    /**
     * Returns value of 'iDailyFreeSweepTimes' property
     *
     * @return int
     */
    public function getIDailyFreeSweepTimes()
    {
        return $this->get(self::IDAILYFREESWEEPTIMES);
    }

    /**
     * Sets value of 'iDailyBuySweepTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyBuySweepTimes($value)
    {
        return $this->set(self::IDAILYBUYSWEEPTIMES, $value);
    }

    /**
     * Returns value of 'iDailyBuySweepTimes' property
     *
     * @return int
     */
    public function getIDailyBuySweepTimes()
    {
        return $this->get(self::IDAILYBUYSWEEPTIMES);
    }

    /**
     * Sets value of 'iAddSweepTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAddSweepTimes($value)
    {
        return $this->set(self::IADDSWEEPTIMES, $value);
    }

    /**
     * Returns value of 'iAddSweepTimes' property
     *
     * @return int
     */
    public function getIAddSweepTimes()
    {
        return $this->get(self::IADDSWEEPTIMES);
    }

    /**
     * Sets value of 'iNightsnack' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINightsnack($value)
    {
        return $this->set(self::INIGHTSNACK, $value);
    }

    /**
     * Returns value of 'iNightsnack' property
     *
     * @return int
     */
    public function getINightsnack()
    {
        return $this->get(self::INIGHTSNACK);
    }

    /**
     * Sets value of 'iWorldBClearCD' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldBClearCD($value)
    {
        return $this->set(self::IWORLDBCLEARCD, $value);
    }

    /**
     * Returns value of 'iWorldBClearCD' property
     *
     * @return int
     */
    public function getIWorldBClearCD()
    {
        return $this->get(self::IWORLDBCLEARCD);
    }

    /**
     * Sets value of 'iEquipSoulJade' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEquipSoulJade($value)
    {
        return $this->set(self::IEQUIPSOULJADE, $value);
    }

    /**
     * Returns value of 'iEquipSoulJade' property
     *
     * @return int
     */
    public function getIEquipSoulJade()
    {
        return $this->get(self::IEQUIPSOULJADE);
    }

    /**
     * Sets value of 'iPvpStoreFreshCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPvpStoreFreshCount($value)
    {
        return $this->set(self::IPVPSTOREFRESHCOUNT, $value);
    }

    /**
     * Returns value of 'iPvpStoreFreshCount' property
     *
     * @return int
     */
    public function getIPvpStoreFreshCount()
    {
        return $this->get(self::IPVPSTOREFRESHCOUNT);
    }

    /**
     * Sets value of 'iPvpNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPvpNotify($value)
    {
        return $this->set(self::IPVPNOTIFY, $value);
    }

    /**
     * Returns value of 'iPvpNotify' property
     *
     * @return int
     */
    public function getIPvpNotify()
    {
        return $this->get(self::IPVPNOTIFY);
    }

    /**
     * Sets value of 'iMasterNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMasterNotify($value)
    {
        return $this->set(self::IMASTERNOTIFY, $value);
    }

    /**
     * Returns value of 'iMasterNotify' property
     *
     * @return int
     */
    public function getIMasterNotify()
    {
        return $this->get(self::IMASTERNOTIFY);
    }

    /**
     * Sets value of 'iWrestNotify' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestNotify($value)
    {
        return $this->set(self::IWRESTNOTIFY, $value);
    }

    /**
     * Returns value of 'iWrestNotify' property
     *
     * @return int
     */
    public function getIWrestNotify()
    {
        return $this->get(self::IWRESTNOTIFY);
    }

    /**
     * Sets value of 'iWrestBuyCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestBuyCount($value)
    {
        return $this->set(self::IWRESTBUYCOUNT, $value);
    }

    /**
     * Returns value of 'iWrestBuyCount' property
     *
     * @return int
     */
    public function getIWrestBuyCount()
    {
        return $this->get(self::IWRESTBUYCOUNT);
    }

    /**
     * Sets value of 'iWrestRecoverCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWrestRecoverCount($value)
    {
        return $this->set(self::IWRESTRECOVERCOUNT, $value);
    }

    /**
     * Returns value of 'iWrestRecoverCount' property
     *
     * @return int
     */
    public function getIWrestRecoverCount()
    {
        return $this->get(self::IWRESTRECOVERCOUNT);
    }

    /**
     * Sets value of 'iPrestige' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPrestige($value)
    {
        return $this->set(self::IPRESTIGE, $value);
    }

    /**
     * Returns value of 'iPrestige' property
     *
     * @return int
     */
    public function getIPrestige()
    {
        return $this->get(self::IPRESTIGE);
    }

    /**
     * Sets value of 'iActiveVal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActiveVal($value)
    {
        return $this->set(self::IACTIVEVAL, $value);
    }

    /**
     * Returns value of 'iActiveVal' property
     *
     * @return int
     */
    public function getIActiveVal()
    {
        return $this->get(self::IACTIVEVAL);
    }

    /**
     * Sets value of 'iPVPCDTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPVPCDTime($value)
    {
        return $this->set(self::IPVPCDTIME, $value);
    }

    /**
     * Returns value of 'iPVPCDTime' property
     *
     * @return int
     */
    public function getIPVPCDTime()
    {
        return $this->get(self::IPVPCDTIME);
    }

    /**
     * Sets value of 'iMasterRemainCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMasterRemainCount($value)
    {
        return $this->set(self::IMASTERREMAINCOUNT, $value);
    }

    /**
     * Returns value of 'iMasterRemainCount' property
     *
     * @return int
     */
    public function getIMasterRemainCount()
    {
        return $this->get(self::IMASTERREMAINCOUNT);
    }

    /**
     * Sets value of 'iFirstTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFirstTag($value)
    {
        return $this->set(self::IFIRSTTAG, $value);
    }

    /**
     * Returns value of 'iFirstTag' property
     *
     * @return int
     */
    public function getIFirstTag()
    {
        return $this->get(self::IFIRSTTAG);
    }

    /**
     * Sets value of 'stGuildWorship' property
     *
     * @param GUILDWORSHIP $value Property value
     *
     * @return null
     */
    public function setStGuildWorship(GUILDWORSHIP $value)
    {
        return $this->set(self::STGUILDWORSHIP, $value);
    }

    /**
     * Returns value of 'stGuildWorship' property
     *
     * @return GUILDWORSHIP
     */
    public function getStGuildWorship()
    {
        return $this->get(self::STGUILDWORSHIP);
    }

    /**
     * Sets value of 'iArchHeroCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIArchHeroCount($value)
    {
        return $this->set(self::IARCHHEROCOUNT, $value);
    }

    /**
     * Returns value of 'iArchHeroCount' property
     *
     * @return int
     */
    public function getIArchHeroCount()
    {
        return $this->get(self::IARCHHEROCOUNT);
    }

    /**
     * Sets value of 'iArchEquipCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIArchEquipCount($value)
    {
        return $this->set(self::IARCHEQUIPCOUNT, $value);
    }

    /**
     * Returns value of 'iArchEquipCount' property
     *
     * @return int
     */
    public function getIArchEquipCount()
    {
        return $this->get(self::IARCHEQUIPCOUNT);
    }

    /**
     * Sets value of 'iCurAnabasisResetCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurAnabasisResetCount($value)
    {
        return $this->set(self::ICURANABASISRESETCOUNT, $value);
    }

    /**
     * Returns value of 'iCurAnabasisResetCount' property
     *
     * @return int
     */
    public function getICurAnabasisResetCount()
    {
        return $this->get(self::ICURANABASISRESETCOUNT);
    }

    /**
     * Sets value of 'iAnabasisCross' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisCross($value)
    {
        return $this->set(self::IANABASISCROSS, $value);
    }

    /**
     * Returns value of 'iAnabasisCross' property
     *
     * @return int
     */
    public function getIAnabasisCross()
    {
        return $this->get(self::IANABASISCROSS);
    }

    /**
     * Sets value of 'iAnabasisAwardState' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisAwardState($value)
    {
        return $this->set(self::IANABASISAWARDSTATE, $value);
    }

    /**
     * Returns value of 'iAnabasisAwardState' property
     *
     * @return int
     */
    public function getIAnabasisAwardState()
    {
        return $this->get(self::IANABASISAWARDSTATE);
    }

    /**
     * Sets value of 'iAnabasisFirst' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisFirst($value)
    {
        return $this->set(self::IANABASISFIRST, $value);
    }

    /**
     * Returns value of 'iAnabasisFirst' property
     *
     * @return int
     */
    public function getIAnabasisFirst()
    {
        return $this->get(self::IANABASISFIRST);
    }

    /**
     * Sets value of 'iAnabasisStoreFreshCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisStoreFreshCount($value)
    {
        return $this->set(self::IANABASISSTOREFRESHCOUNT, $value);
    }

    /**
     * Returns value of 'iAnabasisStoreFreshCount' property
     *
     * @return int
     */
    public function getIAnabasisStoreFreshCount()
    {
        return $this->get(self::IANABASISSTOREFRESHCOUNT);
    }

    /**
     * Sets value of 'iAnabasisCoin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisCoin($value)
    {
        return $this->set(self::IANABASISCOIN, $value);
    }

    /**
     * Returns value of 'iAnabasisCoin' property
     *
     * @return int
     */
    public function getIAnabasisCoin()
    {
        return $this->get(self::IANABASISCOIN);
    }

    /**
     * Sets value of 'iAnabasisMaxCross' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAnabasisMaxCross($value)
    {
        return $this->set(self::IANABASISMAXCROSS, $value);
    }

    /**
     * Returns value of 'iAnabasisMaxCross' property
     *
     * @return int
     */
    public function getIAnabasisMaxCross()
    {
        return $this->get(self::IANABASISMAXCROSS);
    }

    /**
     * Sets value of 'iMailVersion' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMailVersion($value)
    {
        return $this->set(self::IMAILVERSION, $value);
    }

    /**
     * Returns value of 'iMailVersion' property
     *
     * @return int
     */
    public function getIMailVersion()
    {
        return $this->get(self::IMAILVERSION);
    }

    /**
     * Sets value of 'iMaxFightvalue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxFightvalue($value)
    {
        return $this->set(self::IMAXFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iMaxFightvalue' property
     *
     * @return int
     */
    public function getIMaxFightvalue()
    {
        return $this->get(self::IMAXFIGHTVALUE);
    }

    /**
     * Sets value of 'iFriendCombatTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFriendCombatTimes($value)
    {
        return $this->set(self::IFRIENDCOMBATTIMES, $value);
    }

    /**
     * Returns value of 'iFriendCombatTimes' property
     *
     * @return int
     */
    public function getIFriendCombatTimes()
    {
        return $this->get(self::IFRIENDCOMBATTIMES);
    }

    /**
     * Sets value of 'iDefFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDefFightValue($value)
    {
        return $this->set(self::IDEFFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iDefFightValue' property
     *
     * @return int
     */
    public function getIDefFightValue()
    {
        return $this->get(self::IDEFFIGHTVALUE);
    }

    /**
     * Sets value of 'iTailorLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITailorLevel($value)
    {
        return $this->set(self::ITAILORLEVEL, $value);
    }

    /**
     * Returns value of 'iTailorLevel' property
     *
     * @return int
     */
    public function getITailorLevel()
    {
        return $this->get(self::ITAILORLEVEL);
    }

    /**
     * Sets value of 'iTailorExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITailorExp($value)
    {
        return $this->set(self::ITAILOREXP, $value);
    }

    /**
     * Returns value of 'iTailorExp' property
     *
     * @return int
     */
    public function getITailorExp()
    {
        return $this->get(self::ITAILOREXP);
    }

    /**
     * Sets value of 'iTailorBoolean' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITailorBoolean($value)
    {
        return $this->set(self::ITAILORBOOLEAN, $value);
    }

    /**
     * Returns value of 'iTailorBoolean' property
     *
     * @return int
     */
    public function getITailorBoolean()
    {
        return $this->get(self::ITAILORBOOLEAN);
    }

    /**
     * Sets value of 'iGetConTowerTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetConTowerTimes($value)
    {
        return $this->set(self::IGETCONTOWERTIMES, $value);
    }

    /**
     * Returns value of 'iGetConTowerTimes' property
     *
     * @return int
     */
    public function getIGetConTowerTimes()
    {
        return $this->get(self::IGETCONTOWERTIMES);
    }

    /**
     * Sets value of 'iGuildBadge' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildBadge($value)
    {
        return $this->set(self::IGUILDBADGE, $value);
    }

    /**
     * Returns value of 'iGuildBadge' property
     *
     * @return int
     */
    public function getIGuildBadge()
    {
        return $this->get(self::IGUILDBADGE);
    }

    /**
     * Sets value of 'iCheeseCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICheeseCount($value)
    {
        return $this->set(self::ICHEESECOUNT, $value);
    }

    /**
     * Returns value of 'iCheeseCount' property
     *
     * @return int
     */
    public function getICheeseCount()
    {
        return $this->get(self::ICHEESECOUNT);
    }

    /**
     * Sets value of 'iSearchCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISearchCount($value)
    {
        return $this->set(self::ISEARCHCOUNT, $value);
    }

    /**
     * Returns value of 'iSearchCount' property
     *
     * @return int
     */
    public function getISearchCount()
    {
        return $this->get(self::ISEARCHCOUNT);
    }

    /**
     * Sets value of 'iLastCheeseRecivery' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastCheeseRecivery($value)
    {
        return $this->set(self::ILASTCHEESERECIVERY, $value);
    }

    /**
     * Returns value of 'iLastCheeseRecivery' property
     *
     * @return int
     */
    public function getILastCheeseRecivery()
    {
        return $this->get(self::ILASTCHEESERECIVERY);
    }
}

/**
 * HeroSkill message
 */
class HeroSkill extends \ProtobufMessage
{
    /* Field index constants */
    const ISKILLID = 1;
    const IUNLOCKQUALITY = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISKILLID => array(
            'name' => 'iSkillID',
            'required' => false,
            'type' => 5,
        ),
        self::IUNLOCKQUALITY => array(
            'name' => 'iUnlockQuality',
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
        $this->values[self::ISKILLID] = null;
        $this->values[self::IUNLOCKQUALITY] = null;
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
     * Sets value of 'iSkillID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISkillID($value)
    {
        return $this->set(self::ISKILLID, $value);
    }

    /**
     * Returns value of 'iSkillID' property
     *
     * @return int
     */
    public function getISkillID()
    {
        return $this->get(self::ISKILLID);
    }

    /**
     * Sets value of 'iUnlockQuality' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIUnlockQuality($value)
    {
        return $this->set(self::IUNLOCKQUALITY, $value);
    }

    /**
     * Returns value of 'iUnlockQuality' property
     *
     * @return int
     */
    public function getIUnlockQuality()
    {
        return $this->get(self::IUNLOCKQUALITY);
    }
}

/**
 * OneHeroInfo message
 */
class OneHeroInfo extends \ProtobufMessage
{
    /* Field index constants */
    const UHEROID = 1;
    const ULEVEL = 2;
    const UEXP = 3;
    const IHEROINDEX = 4;
    const STSKILLS = 5;
    const IEQUIPSLOT = 6;
    const USTARGRADE = 7;
    const IHEROQUALITY = 8;
    const IFOSTERLEVEL = 9;
    const IFOSTEREXP = 10;
    const ISTEP = 11;
    const IBLESSVALUE = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UHEROID => array(
            'name' => 'uHeroID',
            'required' => false,
            'type' => 5,
        ),
        self::ULEVEL => array(
            'name' => 'uLevel',
            'required' => false,
            'type' => 5,
        ),
        self::UEXP => array(
            'name' => 'uExp',
            'required' => false,
            'type' => 5,
        ),
        self::IHEROINDEX => array(
            'name' => 'iHeroIndex',
            'required' => false,
            'type' => 5,
        ),
        self::STSKILLS => array(
            'name' => 'stSkills',
            'repeated' => true,
            'type' => 'HeroSkill'
        ),
        self::IEQUIPSLOT => array(
            'name' => 'iEquipSlot',
            'repeated' => true,
            'type' => 5,
        ),
        self::USTARGRADE => array(
            'name' => 'uStarGrade',
            'required' => false,
            'type' => 5,
        ),
        self::IHEROQUALITY => array(
            'name' => 'iHeroQuality',
            'required' => false,
            'type' => 5,
        ),
        self::IFOSTERLEVEL => array(
            'name' => 'iFosterLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IFOSTEREXP => array(
            'name' => 'iFosterExp',
            'required' => false,
            'type' => 5,
        ),
        self::ISTEP => array(
            'name' => 'iStep',
            'required' => false,
            'type' => 5,
        ),
        self::IBLESSVALUE => array(
            'name' => 'iBlessValue',
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
        $this->values[self::UHEROID] = null;
        $this->values[self::ULEVEL] = null;
        $this->values[self::UEXP] = null;
        $this->values[self::IHEROINDEX] = null;
        $this->values[self::STSKILLS] = array();
        $this->values[self::IEQUIPSLOT] = array();
        $this->values[self::USTARGRADE] = null;
        $this->values[self::IHEROQUALITY] = null;
        $this->values[self::IFOSTERLEVEL] = null;
        $this->values[self::IFOSTEREXP] = null;
        $this->values[self::ISTEP] = null;
        $this->values[self::IBLESSVALUE] = null;
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
     * Sets value of 'uHeroID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUHeroID($value)
    {
        return $this->set(self::UHEROID, $value);
    }

    /**
     * Returns value of 'uHeroID' property
     *
     * @return int
     */
    public function getUHeroID()
    {
        return $this->get(self::UHEROID);
    }

    /**
     * Sets value of 'uLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setULevel($value)
    {
        return $this->set(self::ULEVEL, $value);
    }

    /**
     * Returns value of 'uLevel' property
     *
     * @return int
     */
    public function getULevel()
    {
        return $this->get(self::ULEVEL);
    }

    /**
     * Sets value of 'uExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUExp($value)
    {
        return $this->set(self::UEXP, $value);
    }

    /**
     * Returns value of 'uExp' property
     *
     * @return int
     */
    public function getUExp()
    {
        return $this->get(self::UEXP);
    }

    /**
     * Sets value of 'iHeroIndex' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroIndex($value)
    {
        return $this->set(self::IHEROINDEX, $value);
    }

    /**
     * Returns value of 'iHeroIndex' property
     *
     * @return int
     */
    public function getIHeroIndex()
    {
        return $this->get(self::IHEROINDEX);
    }

    /**
     * Appends value to 'stSkills' list
     *
     * @param HeroSkill $value Value to append
     *
     * @return null
     */
    public function appendStSkills(HeroSkill $value)
    {
        return $this->append(self::STSKILLS, $value);
    }

    /**
     * Clears 'stSkills' list
     *
     * @return null
     */
    public function clearStSkills()
    {
        return $this->clear(self::STSKILLS);
    }

    /**
     * Returns 'stSkills' list
     *
     * @return HeroSkill[]
     */
    public function getStSkills()
    {
        return $this->get(self::STSKILLS);
    }

    /**
     * Returns 'stSkills' iterator
     *
     * @return ArrayIterator
     */
    public function getStSkillsIterator()
    {
        return new \ArrayIterator($this->get(self::STSKILLS));
    }

    /**
     * Returns element from 'stSkills' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return HeroSkill
     */
    public function getStSkillsAt($offset)
    {
        return $this->get(self::STSKILLS, $offset);
    }

    /**
     * Returns count of 'stSkills' list
     *
     * @return int
     */
    public function getStSkillsCount()
    {
        return $this->count(self::STSKILLS);
    }

    /**
     * Appends value to 'iEquipSlot' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIEquipSlot($value)
    {
        return $this->append(self::IEQUIPSLOT, $value);
    }

    /**
     * Clears 'iEquipSlot' list
     *
     * @return null
     */
    public function clearIEquipSlot()
    {
        return $this->clear(self::IEQUIPSLOT);
    }

    /**
     * Returns 'iEquipSlot' list
     *
     * @return int[]
     */
    public function getIEquipSlot()
    {
        return $this->get(self::IEQUIPSLOT);
    }

    /**
     * Returns 'iEquipSlot' iterator
     *
     * @return ArrayIterator
     */
    public function getIEquipSlotIterator()
    {
        return new \ArrayIterator($this->get(self::IEQUIPSLOT));
    }

    /**
     * Returns element from 'iEquipSlot' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIEquipSlotAt($offset)
    {
        return $this->get(self::IEQUIPSLOT, $offset);
    }

    /**
     * Returns count of 'iEquipSlot' list
     *
     * @return int
     */
    public function getIEquipSlotCount()
    {
        return $this->count(self::IEQUIPSLOT);
    }

    /**
     * Sets value of 'uStarGrade' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUStarGrade($value)
    {
        return $this->set(self::USTARGRADE, $value);
    }

    /**
     * Returns value of 'uStarGrade' property
     *
     * @return int
     */
    public function getUStarGrade()
    {
        return $this->get(self::USTARGRADE);
    }

    /**
     * Sets value of 'iHeroQuality' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroQuality($value)
    {
        return $this->set(self::IHEROQUALITY, $value);
    }

    /**
     * Returns value of 'iHeroQuality' property
     *
     * @return int
     */
    public function getIHeroQuality()
    {
        return $this->get(self::IHEROQUALITY);
    }

    /**
     * Sets value of 'iFosterLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFosterLevel($value)
    {
        return $this->set(self::IFOSTERLEVEL, $value);
    }

    /**
     * Returns value of 'iFosterLevel' property
     *
     * @return int
     */
    public function getIFosterLevel()
    {
        return $this->get(self::IFOSTERLEVEL);
    }

    /**
     * Sets value of 'iFosterExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFosterExp($value)
    {
        return $this->set(self::IFOSTEREXP, $value);
    }

    /**
     * Returns value of 'iFosterExp' property
     *
     * @return int
     */
    public function getIFosterExp()
    {
        return $this->get(self::IFOSTEREXP);
    }

    /**
     * Sets value of 'iStep' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStep($value)
    {
        return $this->set(self::ISTEP, $value);
    }

    /**
     * Returns value of 'iStep' property
     *
     * @return int
     */
    public function getIStep()
    {
        return $this->get(self::ISTEP);
    }

    /**
     * Sets value of 'iBlessValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBlessValue($value)
    {
        return $this->set(self::IBLESSVALUE, $value);
    }

    /**
     * Returns value of 'iBlessValue' property
     *
     * @return int
     */
    public function getIBlessValue()
    {
        return $this->get(self::IBLESSVALUE);
    }
}

/**
 * AllHeroInfo message
 */
class AllHeroInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STHEROS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STHEROS => array(
            'name' => 'stHeros',
            'repeated' => true,
            'type' => 'OneHeroInfo'
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
        $this->values[self::STHEROS] = array();
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
     * Appends value to 'stHeros' list
     *
     * @param OneHeroInfo $value Value to append
     *
     * @return null
     */
    public function appendStHeros(OneHeroInfo $value)
    {
        return $this->append(self::STHEROS, $value);
    }

    /**
     * Clears 'stHeros' list
     *
     * @return null
     */
    public function clearStHeros()
    {
        return $this->clear(self::STHEROS);
    }

    /**
     * Returns 'stHeros' list
     *
     * @return OneHeroInfo[]
     */
    public function getStHeros()
    {
        return $this->get(self::STHEROS);
    }

    /**
     * Returns 'stHeros' iterator
     *
     * @return ArrayIterator
     */
    public function getStHerosIterator()
    {
        return new \ArrayIterator($this->get(self::STHEROS));
    }

    /**
     * Returns element from 'stHeros' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneHeroInfo
     */
    public function getStHerosAt($offset)
    {
        return $this->get(self::STHEROS, $offset);
    }

    /**
     * Returns count of 'stHeros' list
     *
     * @return int
     */
    public function getStHerosCount()
    {
        return $this->count(self::STHEROS);
    }
}

/**
 * OneHeroFormGame message
 */
class OneHeroFormGame extends \ProtobufMessage
{
    /* Field index constants */
    const IHEROINDEX = 1;
    const IEQUIPSLOT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IHEROINDEX => array(
            'name' => 'iHeroIndex',
            'required' => false,
            'type' => 5,
        ),
        self::IEQUIPSLOT => array(
            'name' => 'iEquipSlot',
            'repeated' => true,
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
        $this->values[self::IHEROINDEX] = null;
        $this->values[self::IEQUIPSLOT] = array();
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
     * Sets value of 'iHeroIndex' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeroIndex($value)
    {
        return $this->set(self::IHEROINDEX, $value);
    }

    /**
     * Returns value of 'iHeroIndex' property
     *
     * @return int
     */
    public function getIHeroIndex()
    {
        return $this->get(self::IHEROINDEX);
    }

    /**
     * Appends value to 'iEquipSlot' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIEquipSlot($value)
    {
        return $this->append(self::IEQUIPSLOT, $value);
    }

    /**
     * Clears 'iEquipSlot' list
     *
     * @return null
     */
    public function clearIEquipSlot()
    {
        return $this->clear(self::IEQUIPSLOT);
    }

    /**
     * Returns 'iEquipSlot' list
     *
     * @return int[]
     */
    public function getIEquipSlot()
    {
        return $this->get(self::IEQUIPSLOT);
    }

    /**
     * Returns 'iEquipSlot' iterator
     *
     * @return ArrayIterator
     */
    public function getIEquipSlotIterator()
    {
        return new \ArrayIterator($this->get(self::IEQUIPSLOT));
    }

    /**
     * Returns element from 'iEquipSlot' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIEquipSlotAt($offset)
    {
        return $this->get(self::IEQUIPSLOT, $offset);
    }

    /**
     * Returns count of 'iEquipSlot' list
     *
     * @return int
     */
    public function getIEquipSlotCount()
    {
        return $this->count(self::IEQUIPSLOT);
    }
}

/**
 * HeroFormGame message
 */
class HeroFormGame extends \ProtobufMessage
{
    /* Field index constants */
    const IFORMINDEX = 1;
    const STHEROFORMINFOS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IFORMINDEX => array(
            'name' => 'iFormIndex',
            'repeated' => true,
            'type' => 5,
        ),
        self::STHEROFORMINFOS => array(
            'name' => 'stHeroFormInfos',
            'repeated' => true,
            'type' => 'OneHeroFormGame'
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
        $this->values[self::IFORMINDEX] = array();
        $this->values[self::STHEROFORMINFOS] = array();
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
     * Appends value to 'iFormIndex' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIFormIndex($value)
    {
        return $this->append(self::IFORMINDEX, $value);
    }

    /**
     * Clears 'iFormIndex' list
     *
     * @return null
     */
    public function clearIFormIndex()
    {
        return $this->clear(self::IFORMINDEX);
    }

    /**
     * Returns 'iFormIndex' list
     *
     * @return int[]
     */
    public function getIFormIndex()
    {
        return $this->get(self::IFORMINDEX);
    }

    /**
     * Returns 'iFormIndex' iterator
     *
     * @return ArrayIterator
     */
    public function getIFormIndexIterator()
    {
        return new \ArrayIterator($this->get(self::IFORMINDEX));
    }

    /**
     * Returns element from 'iFormIndex' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIFormIndexAt($offset)
    {
        return $this->get(self::IFORMINDEX, $offset);
    }

    /**
     * Returns count of 'iFormIndex' list
     *
     * @return int
     */
    public function getIFormIndexCount()
    {
        return $this->count(self::IFORMINDEX);
    }

    /**
     * Appends value to 'stHeroFormInfos' list
     *
     * @param OneHeroFormGame $value Value to append
     *
     * @return null
     */
    public function appendStHeroFormInfos(OneHeroFormGame $value)
    {
        return $this->append(self::STHEROFORMINFOS, $value);
    }

    /**
     * Clears 'stHeroFormInfos' list
     *
     * @return null
     */
    public function clearStHeroFormInfos()
    {
        return $this->clear(self::STHEROFORMINFOS);
    }

    /**
     * Returns 'stHeroFormInfos' list
     *
     * @return OneHeroFormGame[]
     */
    public function getStHeroFormInfos()
    {
        return $this->get(self::STHEROFORMINFOS);
    }

    /**
     * Returns 'stHeroFormInfos' iterator
     *
     * @return ArrayIterator
     */
    public function getStHeroFormInfosIterator()
    {
        return new \ArrayIterator($this->get(self::STHEROFORMINFOS));
    }

    /**
     * Returns element from 'stHeroFormInfos' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneHeroFormGame
     */
    public function getStHeroFormInfosAt($offset)
    {
        return $this->get(self::STHEROFORMINFOS, $offset);
    }

    /**
     * Returns count of 'stHeroFormInfos' list
     *
     * @return int
     */
    public function getStHeroFormInfosCount()
    {
        return $this->count(self::STHEROFORMINFOS);
    }
}

/**
 * HERODBINFO message
 */
class HERODBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STALLHEROS = 1;
    const STFORMS = 2;
    const M_IFREEMETALTIME = 3;
    const M_IFREEDIAMONDTIME = 4;
    const STCASHPURPLEHERORECORD = 5;
    const STMETALPURPLEHERORECORD = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STALLHEROS => array(
            'name' => 'stAllHeros',
            'required' => false,
            'type' => 'AllHeroInfo'
        ),
        self::STFORMS => array(
            'name' => 'stForms',
            'required' => false,
            'type' => 'HeroFormGame'
        ),
        self::M_IFREEMETALTIME => array(
            'name' => 'm_iFreeMetalTime',
            'required' => false,
            'type' => 5,
        ),
        self::M_IFREEDIAMONDTIME => array(
            'name' => 'm_iFreeDiamondTime',
            'required' => false,
            'type' => 5,
        ),
        self::STCASHPURPLEHERORECORD => array(
            'name' => 'stCashPurpleHeroRecord',
            'repeated' => true,
            'type' => 5,
        ),
        self::STMETALPURPLEHERORECORD => array(
            'name' => 'stMetalPurpleHeroRecord',
            'repeated' => true,
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
        $this->values[self::STALLHEROS] = null;
        $this->values[self::STFORMS] = null;
        $this->values[self::M_IFREEMETALTIME] = null;
        $this->values[self::M_IFREEDIAMONDTIME] = null;
        $this->values[self::STCASHPURPLEHERORECORD] = array();
        $this->values[self::STMETALPURPLEHERORECORD] = array();
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
     * Sets value of 'stAllHeros' property
     *
     * @param AllHeroInfo $value Property value
     *
     * @return null
     */
    public function setStAllHeros(AllHeroInfo $value)
    {
        return $this->set(self::STALLHEROS, $value);
    }

    /**
     * Returns value of 'stAllHeros' property
     *
     * @return AllHeroInfo
     */
    public function getStAllHeros()
    {
        return $this->get(self::STALLHEROS);
    }

    /**
     * Sets value of 'stForms' property
     *
     * @param HeroFormGame $value Property value
     *
     * @return null
     */
    public function setStForms(HeroFormGame $value)
    {
        return $this->set(self::STFORMS, $value);
    }

    /**
     * Returns value of 'stForms' property
     *
     * @return HeroFormGame
     */
    public function getStForms()
    {
        return $this->get(self::STFORMS);
    }

    /**
     * Sets value of 'm_iFreeMetalTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIFreeMetalTime($value)
    {
        return $this->set(self::M_IFREEMETALTIME, $value);
    }

    /**
     * Returns value of 'm_iFreeMetalTime' property
     *
     * @return int
     */
    public function getMIFreeMetalTime()
    {
        return $this->get(self::M_IFREEMETALTIME);
    }

    /**
     * Sets value of 'm_iFreeDiamondTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIFreeDiamondTime($value)
    {
        return $this->set(self::M_IFREEDIAMONDTIME, $value);
    }

    /**
     * Returns value of 'm_iFreeDiamondTime' property
     *
     * @return int
     */
    public function getMIFreeDiamondTime()
    {
        return $this->get(self::M_IFREEDIAMONDTIME);
    }

    /**
     * Appends value to 'stCashPurpleHeroRecord' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStCashPurpleHeroRecord($value)
    {
        return $this->append(self::STCASHPURPLEHERORECORD, $value);
    }

    /**
     * Clears 'stCashPurpleHeroRecord' list
     *
     * @return null
     */
    public function clearStCashPurpleHeroRecord()
    {
        return $this->clear(self::STCASHPURPLEHERORECORD);
    }

    /**
     * Returns 'stCashPurpleHeroRecord' list
     *
     * @return int[]
     */
    public function getStCashPurpleHeroRecord()
    {
        return $this->get(self::STCASHPURPLEHERORECORD);
    }

    /**
     * Returns 'stCashPurpleHeroRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStCashPurpleHeroRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STCASHPURPLEHERORECORD));
    }

    /**
     * Returns element from 'stCashPurpleHeroRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStCashPurpleHeroRecordAt($offset)
    {
        return $this->get(self::STCASHPURPLEHERORECORD, $offset);
    }

    /**
     * Returns count of 'stCashPurpleHeroRecord' list
     *
     * @return int
     */
    public function getStCashPurpleHeroRecordCount()
    {
        return $this->count(self::STCASHPURPLEHERORECORD);
    }

    /**
     * Appends value to 'stMetalPurpleHeroRecord' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStMetalPurpleHeroRecord($value)
    {
        return $this->append(self::STMETALPURPLEHERORECORD, $value);
    }

    /**
     * Clears 'stMetalPurpleHeroRecord' list
     *
     * @return null
     */
    public function clearStMetalPurpleHeroRecord()
    {
        return $this->clear(self::STMETALPURPLEHERORECORD);
    }

    /**
     * Returns 'stMetalPurpleHeroRecord' list
     *
     * @return int[]
     */
    public function getStMetalPurpleHeroRecord()
    {
        return $this->get(self::STMETALPURPLEHERORECORD);
    }

    /**
     * Returns 'stMetalPurpleHeroRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStMetalPurpleHeroRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STMETALPURPLEHERORECORD));
    }

    /**
     * Returns element from 'stMetalPurpleHeroRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStMetalPurpleHeroRecordAt($offset)
    {
        return $this->get(self::STMETALPURPLEHERORECORD, $offset);
    }

    /**
     * Returns count of 'stMetalPurpleHeroRecord' list
     *
     * @return int
     */
    public function getStMetalPurpleHeroRecordCount()
    {
        return $this->count(self::STMETALPURPLEHERORECORD);
    }
}

/**
 * EQUIPSTRENGTHEN message
 */
class EQUIPSTRENGTHEN extends \ProtobufMessage
{
    /* Field index constants */
    const ILEVEL = 1;
    const ICOSTGOLDAMT = 2;
    const IEXP = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::ICOSTGOLDAMT => array(
            'name' => 'iCostGoldAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IEXP => array(
            'name' => 'iExp',
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
        $this->values[self::ILEVEL] = null;
        $this->values[self::ICOSTGOLDAMT] = null;
        $this->values[self::IEXP] = null;
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
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'iCostGoldAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICostGoldAmt($value)
    {
        return $this->set(self::ICOSTGOLDAMT, $value);
    }

    /**
     * Returns value of 'iCostGoldAmt' property
     *
     * @return int
     */
    public function getICostGoldAmt()
    {
        return $this->get(self::ICOSTGOLDAMT);
    }

    /**
     * Sets value of 'iExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExp($value)
    {
        return $this->set(self::IEXP, $value);
    }

    /**
     * Returns value of 'iExp' property
     *
     * @return int
     */
    public function getIExp()
    {
        return $this->get(self::IEXP);
    }
}

/**
 * EQUIPATTACHATTR message
 */
class EQUIPATTACHATTR extends \ProtobufMessage
{
    /* Field index constants */
    const IATTRTYPE = 1;
    const IATTRVALUE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IATTRTYPE => array(
            'name' => 'iAttrType',
            'required' => false,
            'type' => 5,
        ),
        self::IATTRVALUE => array(
            'name' => 'iAttrValue',
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
        $this->values[self::IATTRTYPE] = null;
        $this->values[self::IATTRVALUE] = null;
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
     * Sets value of 'iAttrType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAttrType($value)
    {
        return $this->set(self::IATTRTYPE, $value);
    }

    /**
     * Returns value of 'iAttrType' property
     *
     * @return int
     */
    public function getIAttrType()
    {
        return $this->get(self::IATTRTYPE);
    }

    /**
     * Sets value of 'iAttrValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAttrValue($value)
    {
        return $this->set(self::IATTRVALUE, $value);
    }

    /**
     * Returns value of 'iAttrValue' property
     *
     * @return int
     */
    public function getIAttrValue()
    {
        return $this->get(self::IATTRVALUE);
    }
}

/**
 * EQUIPREFINE message
 */
class EQUIPREFINE extends \ProtobufMessage
{
    /* Field index constants */
    const STEQUIPATTR = 1;
    const STTMPEQUIPATTR = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STEQUIPATTR => array(
            'name' => 'stEquipAttr',
            'repeated' => true,
            'type' => 'EQUIPATTACHATTR'
        ),
        self::STTMPEQUIPATTR => array(
            'name' => 'stTmpEquipAttr',
            'repeated' => true,
            'type' => 'EQUIPATTACHATTR'
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
        $this->values[self::STEQUIPATTR] = array();
        $this->values[self::STTMPEQUIPATTR] = array();
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
     * Appends value to 'stEquipAttr' list
     *
     * @param EQUIPATTACHATTR $value Value to append
     *
     * @return null
     */
    public function appendStEquipAttr(EQUIPATTACHATTR $value)
    {
        return $this->append(self::STEQUIPATTR, $value);
    }

    /**
     * Clears 'stEquipAttr' list
     *
     * @return null
     */
    public function clearStEquipAttr()
    {
        return $this->clear(self::STEQUIPATTR);
    }

    /**
     * Returns 'stEquipAttr' list
     *
     * @return EQUIPATTACHATTR[]
     */
    public function getStEquipAttr()
    {
        return $this->get(self::STEQUIPATTR);
    }

    /**
     * Returns 'stEquipAttr' iterator
     *
     * @return ArrayIterator
     */
    public function getStEquipAttrIterator()
    {
        return new \ArrayIterator($this->get(self::STEQUIPATTR));
    }

    /**
     * Returns element from 'stEquipAttr' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return EQUIPATTACHATTR
     */
    public function getStEquipAttrAt($offset)
    {
        return $this->get(self::STEQUIPATTR, $offset);
    }

    /**
     * Returns count of 'stEquipAttr' list
     *
     * @return int
     */
    public function getStEquipAttrCount()
    {
        return $this->count(self::STEQUIPATTR);
    }

    /**
     * Appends value to 'stTmpEquipAttr' list
     *
     * @param EQUIPATTACHATTR $value Value to append
     *
     * @return null
     */
    public function appendStTmpEquipAttr(EQUIPATTACHATTR $value)
    {
        return $this->append(self::STTMPEQUIPATTR, $value);
    }

    /**
     * Clears 'stTmpEquipAttr' list
     *
     * @return null
     */
    public function clearStTmpEquipAttr()
    {
        return $this->clear(self::STTMPEQUIPATTR);
    }

    /**
     * Returns 'stTmpEquipAttr' list
     *
     * @return EQUIPATTACHATTR[]
     */
    public function getStTmpEquipAttr()
    {
        return $this->get(self::STTMPEQUIPATTR);
    }

    /**
     * Returns 'stTmpEquipAttr' iterator
     *
     * @return ArrayIterator
     */
    public function getStTmpEquipAttrIterator()
    {
        return new \ArrayIterator($this->get(self::STTMPEQUIPATTR));
    }

    /**
     * Returns element from 'stTmpEquipAttr' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return EQUIPATTACHATTR
     */
    public function getStTmpEquipAttrAt($offset)
    {
        return $this->get(self::STTMPEQUIPATTR, $offset);
    }

    /**
     * Returns count of 'stTmpEquipAttr' list
     *
     * @return int
     */
    public function getStTmpEquipAttrCount()
    {
        return $this->count(self::STTMPEQUIPATTR);
    }
}

/**
 * EquipDetail message
 */
class EquipDetail extends \ProtobufMessage
{
    /* Field index constants */
    const ILEVEL = 1;
    const IEXP = 2;
    const ISATURATION = 3;
    const IEQUIPHEROIDX_W = 4;
    const STEQUIPSTRENGTHEN = 5;
    const STEQUIPREFINE = 6;
    const IREFINESTAGE = 7;
    const IEQUIPSUBTYPE = 8;
    const IEQUIPFORMIDX = 9;
    const IREFINELEVEL = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IEXP => array(
            'name' => 'iExp',
            'required' => false,
            'type' => 5,
        ),
        self::ISATURATION => array(
            'name' => 'iSaturation',
            'required' => false,
            'type' => 5,
        ),
        self::IEQUIPHEROIDX_W => array(
            'name' => 'iEquipHeroIdx_W',
            'required' => false,
            'type' => 5,
        ),
        self::STEQUIPSTRENGTHEN => array(
            'name' => 'stEquipStrengthen',
            'required' => false,
            'type' => 'EQUIPSTRENGTHEN'
        ),
        self::STEQUIPREFINE => array(
            'name' => 'stEquipRefine',
            'required' => false,
            'type' => 'EQUIPREFINE'
        ),
        self::IREFINESTAGE => array(
            'name' => 'iRefineStage',
            'required' => false,
            'type' => 5,
        ),
        self::IEQUIPSUBTYPE => array(
            'name' => 'iEquipSubType',
            'required' => false,
            'type' => 5,
        ),
        self::IEQUIPFORMIDX => array(
            'name' => 'iEquipFormIdx',
            'required' => false,
            'type' => 5,
        ),
        self::IREFINELEVEL => array(
            'name' => 'iRefineLevel',
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
        $this->values[self::ILEVEL] = null;
        $this->values[self::IEXP] = null;
        $this->values[self::ISATURATION] = null;
        $this->values[self::IEQUIPHEROIDX_W] = null;
        $this->values[self::STEQUIPSTRENGTHEN] = null;
        $this->values[self::STEQUIPREFINE] = null;
        $this->values[self::IREFINESTAGE] = null;
        $this->values[self::IEQUIPSUBTYPE] = null;
        $this->values[self::IEQUIPFORMIDX] = null;
        $this->values[self::IREFINELEVEL] = null;
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
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'iExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExp($value)
    {
        return $this->set(self::IEXP, $value);
    }

    /**
     * Returns value of 'iExp' property
     *
     * @return int
     */
    public function getIExp()
    {
        return $this->get(self::IEXP);
    }

    /**
     * Sets value of 'iSaturation' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISaturation($value)
    {
        return $this->set(self::ISATURATION, $value);
    }

    /**
     * Returns value of 'iSaturation' property
     *
     * @return int
     */
    public function getISaturation()
    {
        return $this->get(self::ISATURATION);
    }

    /**
     * Sets value of 'iEquipHeroIdx_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEquipHeroIdxW($value)
    {
        return $this->set(self::IEQUIPHEROIDX_W, $value);
    }

    /**
     * Returns value of 'iEquipHeroIdx_W' property
     *
     * @return int
     */
    public function getIEquipHeroIdxW()
    {
        return $this->get(self::IEQUIPHEROIDX_W);
    }

    /**
     * Sets value of 'stEquipStrengthen' property
     *
     * @param EQUIPSTRENGTHEN $value Property value
     *
     * @return null
     */
    public function setStEquipStrengthen(EQUIPSTRENGTHEN $value)
    {
        return $this->set(self::STEQUIPSTRENGTHEN, $value);
    }

    /**
     * Returns value of 'stEquipStrengthen' property
     *
     * @return EQUIPSTRENGTHEN
     */
    public function getStEquipStrengthen()
    {
        return $this->get(self::STEQUIPSTRENGTHEN);
    }

    /**
     * Sets value of 'stEquipRefine' property
     *
     * @param EQUIPREFINE $value Property value
     *
     * @return null
     */
    public function setStEquipRefine(EQUIPREFINE $value)
    {
        return $this->set(self::STEQUIPREFINE, $value);
    }

    /**
     * Returns value of 'stEquipRefine' property
     *
     * @return EQUIPREFINE
     */
    public function getStEquipRefine()
    {
        return $this->get(self::STEQUIPREFINE);
    }

    /**
     * Sets value of 'iRefineStage' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRefineStage($value)
    {
        return $this->set(self::IREFINESTAGE, $value);
    }

    /**
     * Returns value of 'iRefineStage' property
     *
     * @return int
     */
    public function getIRefineStage()
    {
        return $this->get(self::IREFINESTAGE);
    }

    /**
     * Sets value of 'iEquipSubType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEquipSubType($value)
    {
        return $this->set(self::IEQUIPSUBTYPE, $value);
    }

    /**
     * Returns value of 'iEquipSubType' property
     *
     * @return int
     */
    public function getIEquipSubType()
    {
        return $this->get(self::IEQUIPSUBTYPE);
    }

    /**
     * Sets value of 'iEquipFormIdx' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEquipFormIdx($value)
    {
        return $this->set(self::IEQUIPFORMIDX, $value);
    }

    /**
     * Returns value of 'iEquipFormIdx' property
     *
     * @return int
     */
    public function getIEquipFormIdx()
    {
        return $this->get(self::IEQUIPFORMIDX);
    }

    /**
     * Sets value of 'iRefineLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRefineLevel($value)
    {
        return $this->set(self::IREFINELEVEL, $value);
    }

    /**
     * Returns value of 'iRefineLevel' property
     *
     * @return int
     */
    public function getIRefineLevel()
    {
        return $this->get(self::IREFINELEVEL);
    }
}

/**
 * PropDetail message
 */
class PropDetail extends \ProtobufMessage
{
    /* Field index constants */

    /* @var array Field descriptors */
    protected static $fields = array(
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
}

/**
 * ItemDetail message
 */
class ItemDetail extends \ProtobufMessage
{
    /* Field index constants */
    const STEQUIPDETAIL = 1;
    const STPROPDETAIL = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STEQUIPDETAIL => array(
            'name' => 'stEquipDetail',
            'required' => false,
            'type' => 'EquipDetail'
        ),
        self::STPROPDETAIL => array(
            'name' => 'stPropDetail',
            'required' => false,
            'type' => 'PropDetail'
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
        $this->values[self::STEQUIPDETAIL] = null;
        $this->values[self::STPROPDETAIL] = null;
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
     * Sets value of 'stEquipDetail' property
     *
     * @param EquipDetail $value Property value
     *
     * @return null
     */
    public function setStEquipDetail(EquipDetail $value)
    {
        return $this->set(self::STEQUIPDETAIL, $value);
    }

    /**
     * Returns value of 'stEquipDetail' property
     *
     * @return EquipDetail
     */
    public function getStEquipDetail()
    {
        return $this->get(self::STEQUIPDETAIL);
    }

    /**
     * Sets value of 'stPropDetail' property
     *
     * @param PropDetail $value Property value
     *
     * @return null
     */
    public function setStPropDetail(PropDetail $value)
    {
        return $this->set(self::STPROPDETAIL, $value);
    }

    /**
     * Returns value of 'stPropDetail' property
     *
     * @return PropDetail
     */
    public function getStPropDetail()
    {
        return $this->get(self::STPROPDETAIL);
    }
}

/**
 * ItemInfo message
 */
class ItemInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IITEMID = 1;
    const ETYPE = 2;
    const IITEMNUM = 3;
    const STDETAIL = 4;
    const IGETTIME = 5;
    const ISLOT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IITEMID => array(
            'name' => 'iItemID',
            'required' => false,
            'type' => 5,
        ),
        self::ETYPE => array(
            'name' => 'eType',
            'required' => false,
            'type' => 5,
        ),
        self::IITEMNUM => array(
            'name' => 'iItemNum',
            'required' => false,
            'type' => 5,
        ),
        self::STDETAIL => array(
            'name' => 'stDetail',
            'required' => false,
            'type' => 'ItemDetail'
        ),
        self::IGETTIME => array(
            'name' => 'iGetTime',
            'required' => false,
            'type' => 5,
        ),
        self::ISLOT => array(
            'name' => 'iSlot',
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
        $this->values[self::ETYPE] = null;
        $this->values[self::IITEMNUM] = null;
        $this->values[self::STDETAIL] = null;
        $this->values[self::IGETTIME] = null;
        $this->values[self::ISLOT] = null;
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
     * Sets value of 'iItemID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemID($value)
    {
        return $this->set(self::IITEMID, $value);
    }

    /**
     * Returns value of 'iItemID' property
     *
     * @return int
     */
    public function getIItemID()
    {
        return $this->get(self::IITEMID);
    }

    /**
     * Sets value of 'eType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setEType($value)
    {
        return $this->set(self::ETYPE, $value);
    }

    /**
     * Returns value of 'eType' property
     *
     * @return int
     */
    public function getEType()
    {
        return $this->get(self::ETYPE);
    }

    /**
     * Sets value of 'iItemNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemNum($value)
    {
        return $this->set(self::IITEMNUM, $value);
    }

    /**
     * Returns value of 'iItemNum' property
     *
     * @return int
     */
    public function getIItemNum()
    {
        return $this->get(self::IITEMNUM);
    }

    /**
     * Sets value of 'stDetail' property
     *
     * @param ItemDetail $value Property value
     *
     * @return null
     */
    public function setStDetail(ItemDetail $value)
    {
        return $this->set(self::STDETAIL, $value);
    }

    /**
     * Returns value of 'stDetail' property
     *
     * @return ItemDetail
     */
    public function getStDetail()
    {
        return $this->get(self::STDETAIL);
    }

    /**
     * Sets value of 'iGetTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetTime($value)
    {
        return $this->set(self::IGETTIME, $value);
    }

    /**
     * Returns value of 'iGetTime' property
     *
     * @return int
     */
    public function getIGetTime()
    {
        return $this->get(self::IGETTIME);
    }

    /**
     * Sets value of 'iSlot' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISlot($value)
    {
        return $this->set(self::ISLOT, $value);
    }

    /**
     * Returns value of 'iSlot' property
     *
     * @return int
     */
    public function getISlot()
    {
        return $this->get(self::ISLOT);
    }
}

/**
 * BAGINFO message
 */
class BAGINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IBAGTYPE = 1;
    const IMAXCAPACITY = 2;
    const IBUYTIMES = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBAGTYPE => array(
            'name' => 'iBagType',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXCAPACITY => array(
            'name' => 'iMaxCapacity',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYTIMES => array(
            'name' => 'iBuyTimes',
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
        $this->values[self::IBAGTYPE] = null;
        $this->values[self::IMAXCAPACITY] = null;
        $this->values[self::IBUYTIMES] = null;
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
     * Sets value of 'iBagType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBagType($value)
    {
        return $this->set(self::IBAGTYPE, $value);
    }

    /**
     * Returns value of 'iBagType' property
     *
     * @return int
     */
    public function getIBagType()
    {
        return $this->get(self::IBAGTYPE);
    }

    /**
     * Sets value of 'iMaxCapacity' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxCapacity($value)
    {
        return $this->set(self::IMAXCAPACITY, $value);
    }

    /**
     * Returns value of 'iMaxCapacity' property
     *
     * @return int
     */
    public function getIMaxCapacity()
    {
        return $this->get(self::IMAXCAPACITY);
    }

    /**
     * Sets value of 'iBuyTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyTimes($value)
    {
        return $this->set(self::IBUYTIMES, $value);
    }

    /**
     * Returns value of 'iBuyTimes' property
     *
     * @return int
     */
    public function getIBuyTimes()
    {
        return $this->get(self::IBUYTIMES);
    }
}

/**
 * ITEMDBINFO message
 */
class ITEMDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IITEMSLOTNUM = 1;
    const STITEMS = 2;
    const IBUYTIMES = 3;
    const STBAGS = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IITEMSLOTNUM => array(
            'name' => 'iItemSlotNum',
            'required' => false,
            'type' => 5,
        ),
        self::STITEMS => array(
            'name' => 'stItems',
            'repeated' => true,
            'type' => 'ItemInfo'
        ),
        self::IBUYTIMES => array(
            'name' => 'iBuyTimes',
            'required' => false,
            'type' => 5,
        ),
        self::STBAGS => array(
            'name' => 'stBags',
            'repeated' => true,
            'type' => 'BAGINFO'
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
        $this->values[self::IITEMSLOTNUM] = null;
        $this->values[self::STITEMS] = array();
        $this->values[self::IBUYTIMES] = null;
        $this->values[self::STBAGS] = array();
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
     * Sets value of 'iItemSlotNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemSlotNum($value)
    {
        return $this->set(self::IITEMSLOTNUM, $value);
    }

    /**
     * Returns value of 'iItemSlotNum' property
     *
     * @return int
     */
    public function getIItemSlotNum()
    {
        return $this->get(self::IITEMSLOTNUM);
    }

    /**
     * Appends value to 'stItems' list
     *
     * @param ItemInfo $value Value to append
     *
     * @return null
     */
    public function appendStItems(ItemInfo $value)
    {
        return $this->append(self::STITEMS, $value);
    }

    /**
     * Clears 'stItems' list
     *
     * @return null
     */
    public function clearStItems()
    {
        return $this->clear(self::STITEMS);
    }

    /**
     * Returns 'stItems' list
     *
     * @return ItemInfo[]
     */
    public function getStItems()
    {
        return $this->get(self::STITEMS);
    }

    /**
     * Returns 'stItems' iterator
     *
     * @return ArrayIterator
     */
    public function getStItemsIterator()
    {
        return new \ArrayIterator($this->get(self::STITEMS));
    }

    /**
     * Returns element from 'stItems' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ItemInfo
     */
    public function getStItemsAt($offset)
    {
        return $this->get(self::STITEMS, $offset);
    }

    /**
     * Returns count of 'stItems' list
     *
     * @return int
     */
    public function getStItemsCount()
    {
        return $this->count(self::STITEMS);
    }

    /**
     * Sets value of 'iBuyTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyTimes($value)
    {
        return $this->set(self::IBUYTIMES, $value);
    }

    /**
     * Returns value of 'iBuyTimes' property
     *
     * @return int
     */
    public function getIBuyTimes()
    {
        return $this->get(self::IBUYTIMES);
    }

    /**
     * Appends value to 'stBags' list
     *
     * @param BAGINFO $value Value to append
     *
     * @return null
     */
    public function appendStBags(BAGINFO $value)
    {
        return $this->append(self::STBAGS, $value);
    }

    /**
     * Clears 'stBags' list
     *
     * @return null
     */
    public function clearStBags()
    {
        return $this->clear(self::STBAGS);
    }

    /**
     * Returns 'stBags' list
     *
     * @return BAGINFO[]
     */
    public function getStBags()
    {
        return $this->get(self::STBAGS);
    }

    /**
     * Returns 'stBags' iterator
     *
     * @return ArrayIterator
     */
    public function getStBagsIterator()
    {
        return new \ArrayIterator($this->get(self::STBAGS));
    }

    /**
     * Returns element from 'stBags' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return BAGINFO
     */
    public function getStBagsAt($offset)
    {
        return $this->get(self::STBAGS, $offset);
    }

    /**
     * Returns count of 'stBags' list
     *
     * @return int
     */
    public function getStBagsCount()
    {
        return $this->count(self::STBAGS);
    }
}

/**
 * OneCrossInfo message
 */
class OneCrossInfo extends \ProtobufMessage
{
    /* Field index constants */
    const UCROSSID = 1;
    const ILUCKYPOINT = 2;
    const UPVESTAR = 3;
    const ICURFIGHTCOUNT_W = 4;
    const ICURRESETCOUNT_W = 5;
    const BISPASSED = 6;
    const ILUCKYPOINTS = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UCROSSID => array(
            'name' => 'uCrossID',
            'required' => false,
            'type' => 5,
        ),
        self::ILUCKYPOINT => array(
            'name' => 'iLuckyPoint',
            'required' => false,
            'type' => 5,
        ),
        self::UPVESTAR => array(
            'name' => 'uPveStar',
            'required' => false,
            'type' => 5,
        ),
        self::ICURFIGHTCOUNT_W => array(
            'name' => 'iCurFightCount_W',
            'required' => false,
            'type' => 5,
        ),
        self::ICURRESETCOUNT_W => array(
            'name' => 'iCurResetCount_W',
            'required' => false,
            'type' => 5,
        ),
        self::BISPASSED => array(
            'name' => 'bIsPassed',
            'required' => false,
            'type' => 8,
        ),
        self::ILUCKYPOINTS => array(
            'name' => 'iLuckyPoints',
            'repeated' => true,
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
        $this->values[self::UCROSSID] = null;
        $this->values[self::ILUCKYPOINT] = null;
        $this->values[self::UPVESTAR] = null;
        $this->values[self::ICURFIGHTCOUNT_W] = null;
        $this->values[self::ICURRESETCOUNT_W] = null;
        $this->values[self::BISPASSED] = null;
        $this->values[self::ILUCKYPOINTS] = array();
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
     * Sets value of 'uCrossID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUCrossID($value)
    {
        return $this->set(self::UCROSSID, $value);
    }

    /**
     * Returns value of 'uCrossID' property
     *
     * @return int
     */
    public function getUCrossID()
    {
        return $this->get(self::UCROSSID);
    }

    /**
     * Sets value of 'iLuckyPoint' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILuckyPoint($value)
    {
        return $this->set(self::ILUCKYPOINT, $value);
    }

    /**
     * Returns value of 'iLuckyPoint' property
     *
     * @return int
     */
    public function getILuckyPoint()
    {
        return $this->get(self::ILUCKYPOINT);
    }

    /**
     * Sets value of 'uPveStar' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUPveStar($value)
    {
        return $this->set(self::UPVESTAR, $value);
    }

    /**
     * Returns value of 'uPveStar' property
     *
     * @return int
     */
    public function getUPveStar()
    {
        return $this->get(self::UPVESTAR);
    }

    /**
     * Sets value of 'iCurFightCount_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurFightCountW($value)
    {
        return $this->set(self::ICURFIGHTCOUNT_W, $value);
    }

    /**
     * Returns value of 'iCurFightCount_W' property
     *
     * @return int
     */
    public function getICurFightCountW()
    {
        return $this->get(self::ICURFIGHTCOUNT_W);
    }

    /**
     * Sets value of 'iCurResetCount_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurResetCountW($value)
    {
        return $this->set(self::ICURRESETCOUNT_W, $value);
    }

    /**
     * Returns value of 'iCurResetCount_W' property
     *
     * @return int
     */
    public function getICurResetCountW()
    {
        return $this->get(self::ICURRESETCOUNT_W);
    }

    /**
     * Sets value of 'bIsPassed' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBIsPassed($value)
    {
        return $this->set(self::BISPASSED, $value);
    }

    /**
     * Returns value of 'bIsPassed' property
     *
     * @return bool
     */
    public function getBIsPassed()
    {
        return $this->get(self::BISPASSED);
    }

    /**
     * Appends value to 'iLuckyPoints' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendILuckyPoints($value)
    {
        return $this->append(self::ILUCKYPOINTS, $value);
    }

    /**
     * Clears 'iLuckyPoints' list
     *
     * @return null
     */
    public function clearILuckyPoints()
    {
        return $this->clear(self::ILUCKYPOINTS);
    }

    /**
     * Returns 'iLuckyPoints' list
     *
     * @return int[]
     */
    public function getILuckyPoints()
    {
        return $this->get(self::ILUCKYPOINTS);
    }

    /**
     * Returns 'iLuckyPoints' iterator
     *
     * @return ArrayIterator
     */
    public function getILuckyPointsIterator()
    {
        return new \ArrayIterator($this->get(self::ILUCKYPOINTS));
    }

    /**
     * Returns element from 'iLuckyPoints' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getILuckyPointsAt($offset)
    {
        return $this->get(self::ILUCKYPOINTS, $offset);
    }

    /**
     * Returns count of 'iLuckyPoints' list
     *
     * @return int
     */
    public function getILuckyPointsCount()
    {
        return $this->count(self::ILUCKYPOINTS);
    }
}

/**
 * SingleStarRewardInfo message
 */
class SingleStarRewardInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IREWARDINDEX = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IREWARDINDEX => array(
            'name' => 'iRewardIndex',
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
        $this->values[self::IREWARDINDEX] = null;
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
     * Sets value of 'iRewardIndex' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardIndex($value)
    {
        return $this->set(self::IREWARDINDEX, $value);
    }

    /**
     * Returns value of 'iRewardIndex' property
     *
     * @return int
     */
    public function getIRewardIndex()
    {
        return $this->get(self::IREWARDINDEX);
    }
}

/**
 * StarRewardInfo message
 */
class StarRewardInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STSTARREWARDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STSTARREWARDS => array(
            'name' => 'stStarRewards',
            'repeated' => true,
            'type' => 'SingleStarRewardInfo'
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
        $this->values[self::STSTARREWARDS] = array();
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
     * Appends value to 'stStarRewards' list
     *
     * @param SingleStarRewardInfo $value Value to append
     *
     * @return null
     */
    public function appendStStarRewards(SingleStarRewardInfo $value)
    {
        return $this->append(self::STSTARREWARDS, $value);
    }

    /**
     * Clears 'stStarRewards' list
     *
     * @return null
     */
    public function clearStStarRewards()
    {
        return $this->clear(self::STSTARREWARDS);
    }

    /**
     * Returns 'stStarRewards' list
     *
     * @return SingleStarRewardInfo[]
     */
    public function getStStarRewards()
    {
        return $this->get(self::STSTARREWARDS);
    }

    /**
     * Returns 'stStarRewards' iterator
     *
     * @return ArrayIterator
     */
    public function getStStarRewardsIterator()
    {
        return new \ArrayIterator($this->get(self::STSTARREWARDS));
    }

    /**
     * Returns element from 'stStarRewards' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SingleStarRewardInfo
     */
    public function getStStarRewardsAt($offset)
    {
        return $this->get(self::STSTARREWARDS, $offset);
    }

    /**
     * Returns count of 'stStarRewards' list
     *
     * @return int
     */
    public function getStStarRewardsCount()
    {
        return $this->count(self::STSTARREWARDS);
    }
}

/**
 * PassedCrossInfo message
 */
class PassedCrossInfo extends \ProtobufMessage
{
    /* Field index constants */
    const BISPASSED = 1;
    const STDETAILS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::BISPASSED => array(
            'name' => 'bIsPassed',
            'required' => false,
            'type' => 8,
        ),
        self::STDETAILS => array(
            'name' => 'stDetails',
            'repeated' => true,
            'type' => 'OneCrossInfo'
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
        $this->values[self::BISPASSED] = null;
        $this->values[self::STDETAILS] = array();
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
     * Sets value of 'bIsPassed' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setBIsPassed($value)
    {
        return $this->set(self::BISPASSED, $value);
    }

    /**
     * Returns value of 'bIsPassed' property
     *
     * @return bool
     */
    public function getBIsPassed()
    {
        return $this->get(self::BISPASSED);
    }

    /**
     * Appends value to 'stDetails' list
     *
     * @param OneCrossInfo $value Value to append
     *
     * @return null
     */
    public function appendStDetails(OneCrossInfo $value)
    {
        return $this->append(self::STDETAILS, $value);
    }

    /**
     * Clears 'stDetails' list
     *
     * @return null
     */
    public function clearStDetails()
    {
        return $this->clear(self::STDETAILS);
    }

    /**
     * Returns 'stDetails' list
     *
     * @return OneCrossInfo[]
     */
    public function getStDetails()
    {
        return $this->get(self::STDETAILS);
    }

    /**
     * Returns 'stDetails' iterator
     *
     * @return ArrayIterator
     */
    public function getStDetailsIterator()
    {
        return new \ArrayIterator($this->get(self::STDETAILS));
    }

    /**
     * Returns element from 'stDetails' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneCrossInfo
     */
    public function getStDetailsAt($offset)
    {
        return $this->get(self::STDETAILS, $offset);
    }

    /**
     * Returns count of 'stDetails' list
     *
     * @return int
     */
    public function getStDetailsCount()
    {
        return $this->count(self::STDETAILS);
    }
}

/**
 * OneCrossGrpInfo message
 */
class OneCrossGrpInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IGRPID = 1;
    const ICURFIGHTCOUNT = 2;
    const ICURRESETCOUNT = 3;
    const IBUYCOUNT = 4;
    const IBUYADDTIMES = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IGRPID => array(
            'name' => 'iGrpId',
            'required' => false,
            'type' => 5,
        ),
        self::ICURFIGHTCOUNT => array(
            'name' => 'iCurFightCount',
            'required' => false,
            'type' => 5,
        ),
        self::ICURRESETCOUNT => array(
            'name' => 'iCurResetCount',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYCOUNT => array(
            'name' => 'iBuyCount',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYADDTIMES => array(
            'name' => 'iBuyAddTimes',
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
        $this->values[self::IGRPID] = null;
        $this->values[self::ICURFIGHTCOUNT] = null;
        $this->values[self::ICURRESETCOUNT] = null;
        $this->values[self::IBUYCOUNT] = null;
        $this->values[self::IBUYADDTIMES] = null;
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
     * Sets value of 'iGrpId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGrpId($value)
    {
        return $this->set(self::IGRPID, $value);
    }

    /**
     * Returns value of 'iGrpId' property
     *
     * @return int
     */
    public function getIGrpId()
    {
        return $this->get(self::IGRPID);
    }

    /**
     * Sets value of 'iCurFightCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurFightCount($value)
    {
        return $this->set(self::ICURFIGHTCOUNT, $value);
    }

    /**
     * Returns value of 'iCurFightCount' property
     *
     * @return int
     */
    public function getICurFightCount()
    {
        return $this->get(self::ICURFIGHTCOUNT);
    }

    /**
     * Sets value of 'iCurResetCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurResetCount($value)
    {
        return $this->set(self::ICURRESETCOUNT, $value);
    }

    /**
     * Returns value of 'iCurResetCount' property
     *
     * @return int
     */
    public function getICurResetCount()
    {
        return $this->get(self::ICURRESETCOUNT);
    }

    /**
     * Sets value of 'iBuyCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyCount($value)
    {
        return $this->set(self::IBUYCOUNT, $value);
    }

    /**
     * Returns value of 'iBuyCount' property
     *
     * @return int
     */
    public function getIBuyCount()
    {
        return $this->get(self::IBUYCOUNT);
    }

    /**
     * Sets value of 'iBuyAddTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyAddTimes($value)
    {
        return $this->set(self::IBUYADDTIMES, $value);
    }

    /**
     * Returns value of 'iBuyAddTimes' property
     *
     * @return int
     */
    public function getIBuyAddTimes()
    {
        return $this->get(self::IBUYADDTIMES);
    }
}

/**
 * CrossGrpInfo message
 */
class CrossGrpInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STCROSSGRPINFO = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STCROSSGRPINFO => array(
            'name' => 'stCrossGrpInfo',
            'repeated' => true,
            'type' => 'OneCrossGrpInfo'
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
        $this->values[self::STCROSSGRPINFO] = array();
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
     * Appends value to 'stCrossGrpInfo' list
     *
     * @param OneCrossGrpInfo $value Value to append
     *
     * @return null
     */
    public function appendStCrossGrpInfo(OneCrossGrpInfo $value)
    {
        return $this->append(self::STCROSSGRPINFO, $value);
    }

    /**
     * Clears 'stCrossGrpInfo' list
     *
     * @return null
     */
    public function clearStCrossGrpInfo()
    {
        return $this->clear(self::STCROSSGRPINFO);
    }

    /**
     * Returns 'stCrossGrpInfo' list
     *
     * @return OneCrossGrpInfo[]
     */
    public function getStCrossGrpInfo()
    {
        return $this->get(self::STCROSSGRPINFO);
    }

    /**
     * Returns 'stCrossGrpInfo' iterator
     *
     * @return ArrayIterator
     */
    public function getStCrossGrpInfoIterator()
    {
        return new \ArrayIterator($this->get(self::STCROSSGRPINFO));
    }

    /**
     * Returns element from 'stCrossGrpInfo' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return OneCrossGrpInfo
     */
    public function getStCrossGrpInfoAt($offset)
    {
        return $this->get(self::STCROSSGRPINFO, $offset);
    }

    /**
     * Returns count of 'stCrossGrpInfo' list
     *
     * @return int
     */
    public function getStCrossGrpInfoCount()
    {
        return $this->count(self::STCROSSGRPINFO);
    }
}

/**
 * PINSTANCEDBINFO message
 */
class PINSTANCEDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const PINSTANCEID = 1;
    const IUNLOCKLEVEL = 2;
    const STCURCROSS_W = 3;
    const STCROSSINFO = 4;
    const STELITECROSSINFO_W = 5;
    const STSTARREWARDINFO = 6;
    const IPVESTARS = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PINSTANCEID => array(
            'name' => 'pinstanceID',
            'required' => false,
            'type' => 5,
        ),
        self::IUNLOCKLEVEL => array(
            'name' => 'iUnlockLevel',
            'required' => false,
            'type' => 5,
        ),
        self::STCURCROSS_W => array(
            'name' => 'stCurCross_W',
            'required' => false,
            'type' => 'OneCrossInfo'
        ),
        self::STCROSSINFO => array(
            'name' => 'stCrossInfo',
            'required' => false,
            'type' => 'PassedCrossInfo'
        ),
        self::STELITECROSSINFO_W => array(
            'name' => 'stEliteCrossInfo_W',
            'required' => false,
            'type' => 'PassedCrossInfo'
        ),
        self::STSTARREWARDINFO => array(
            'name' => 'stStarRewardInfo',
            'required' => false,
            'type' => 'StarRewardInfo'
        ),
        self::IPVESTARS => array(
            'name' => 'iPveStars',
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
        $this->values[self::PINSTANCEID] = null;
        $this->values[self::IUNLOCKLEVEL] = null;
        $this->values[self::STCURCROSS_W] = null;
        $this->values[self::STCROSSINFO] = null;
        $this->values[self::STELITECROSSINFO_W] = null;
        $this->values[self::STSTARREWARDINFO] = null;
        $this->values[self::IPVESTARS] = null;
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
     * Sets value of 'pinstanceID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPinstanceID($value)
    {
        return $this->set(self::PINSTANCEID, $value);
    }

    /**
     * Returns value of 'pinstanceID' property
     *
     * @return int
     */
    public function getPinstanceID()
    {
        return $this->get(self::PINSTANCEID);
    }

    /**
     * Sets value of 'iUnlockLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIUnlockLevel($value)
    {
        return $this->set(self::IUNLOCKLEVEL, $value);
    }

    /**
     * Returns value of 'iUnlockLevel' property
     *
     * @return int
     */
    public function getIUnlockLevel()
    {
        return $this->get(self::IUNLOCKLEVEL);
    }

    /**
     * Sets value of 'stCurCross_W' property
     *
     * @param OneCrossInfo $value Property value
     *
     * @return null
     */
    public function setStCurCrossW(OneCrossInfo $value)
    {
        return $this->set(self::STCURCROSS_W, $value);
    }

    /**
     * Returns value of 'stCurCross_W' property
     *
     * @return OneCrossInfo
     */
    public function getStCurCrossW()
    {
        return $this->get(self::STCURCROSS_W);
    }

    /**
     * Sets value of 'stCrossInfo' property
     *
     * @param PassedCrossInfo $value Property value
     *
     * @return null
     */
    public function setStCrossInfo(PassedCrossInfo $value)
    {
        return $this->set(self::STCROSSINFO, $value);
    }

    /**
     * Returns value of 'stCrossInfo' property
     *
     * @return PassedCrossInfo
     */
    public function getStCrossInfo()
    {
        return $this->get(self::STCROSSINFO);
    }

    /**
     * Sets value of 'stEliteCrossInfo_W' property
     *
     * @param PassedCrossInfo $value Property value
     *
     * @return null
     */
    public function setStEliteCrossInfoW(PassedCrossInfo $value)
    {
        return $this->set(self::STELITECROSSINFO_W, $value);
    }

    /**
     * Returns value of 'stEliteCrossInfo_W' property
     *
     * @return PassedCrossInfo
     */
    public function getStEliteCrossInfoW()
    {
        return $this->get(self::STELITECROSSINFO_W);
    }

    /**
     * Sets value of 'stStarRewardInfo' property
     *
     * @param StarRewardInfo $value Property value
     *
     * @return null
     */
    public function setStStarRewardInfo(StarRewardInfo $value)
    {
        return $this->set(self::STSTARREWARDINFO, $value);
    }

    /**
     * Returns value of 'stStarRewardInfo' property
     *
     * @return StarRewardInfo
     */
    public function getStStarRewardInfo()
    {
        return $this->get(self::STSTARREWARDINFO);
    }

    /**
     * Sets value of 'iPveStars' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPveStars($value)
    {
        return $this->set(self::IPVESTARS, $value);
    }

    /**
     * Returns value of 'iPveStars' property
     *
     * @return int
     */
    public function getIPveStars()
    {
        return $this->get(self::IPVESTARS);
    }
}

/**
 * PVEDBINFO message
 */
class PVEDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STPINSTANCES = 1;
    const STCROSSGRPINFO = 2;
    const INEXTSWEEPTIME = 3;
    const IDAILYCLEARCDTIMES = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STPINSTANCES => array(
            'name' => 'stPinstances',
            'repeated' => true,
            'type' => 'PINSTANCEDBINFO'
        ),
        self::STCROSSGRPINFO => array(
            'name' => 'stCrossGrpInfo',
            'required' => false,
            'type' => 'CrossGrpInfo'
        ),
        self::INEXTSWEEPTIME => array(
            'name' => 'iNextSweepTime',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYCLEARCDTIMES => array(
            'name' => 'iDailyClearCdTimes',
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
        $this->values[self::STPINSTANCES] = array();
        $this->values[self::STCROSSGRPINFO] = null;
        $this->values[self::INEXTSWEEPTIME] = null;
        $this->values[self::IDAILYCLEARCDTIMES] = null;
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
     * Appends value to 'stPinstances' list
     *
     * @param PINSTANCEDBINFO $value Value to append
     *
     * @return null
     */
    public function appendStPinstances(PINSTANCEDBINFO $value)
    {
        return $this->append(self::STPINSTANCES, $value);
    }

    /**
     * Clears 'stPinstances' list
     *
     * @return null
     */
    public function clearStPinstances()
    {
        return $this->clear(self::STPINSTANCES);
    }

    /**
     * Returns 'stPinstances' list
     *
     * @return PINSTANCEDBINFO[]
     */
    public function getStPinstances()
    {
        return $this->get(self::STPINSTANCES);
    }

    /**
     * Returns 'stPinstances' iterator
     *
     * @return ArrayIterator
     */
    public function getStPinstancesIterator()
    {
        return new \ArrayIterator($this->get(self::STPINSTANCES));
    }

    /**
     * Returns element from 'stPinstances' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return PINSTANCEDBINFO
     */
    public function getStPinstancesAt($offset)
    {
        return $this->get(self::STPINSTANCES, $offset);
    }

    /**
     * Returns count of 'stPinstances' list
     *
     * @return int
     */
    public function getStPinstancesCount()
    {
        return $this->count(self::STPINSTANCES);
    }

    /**
     * Sets value of 'stCrossGrpInfo' property
     *
     * @param CrossGrpInfo $value Property value
     *
     * @return null
     */
    public function setStCrossGrpInfo(CrossGrpInfo $value)
    {
        return $this->set(self::STCROSSGRPINFO, $value);
    }

    /**
     * Returns value of 'stCrossGrpInfo' property
     *
     * @return CrossGrpInfo
     */
    public function getStCrossGrpInfo()
    {
        return $this->get(self::STCROSSGRPINFO);
    }

    /**
     * Sets value of 'iNextSweepTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINextSweepTime($value)
    {
        return $this->set(self::INEXTSWEEPTIME, $value);
    }

    /**
     * Returns value of 'iNextSweepTime' property
     *
     * @return int
     */
    public function getINextSweepTime()
    {
        return $this->get(self::INEXTSWEEPTIME);
    }

    /**
     * Sets value of 'iDailyClearCdTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyClearCdTimes($value)
    {
        return $this->set(self::IDAILYCLEARCDTIMES, $value);
    }

    /**
     * Returns value of 'iDailyClearCdTimes' property
     *
     * @return int
     */
    public function getIDailyClearCdTimes()
    {
        return $this->get(self::IDAILYCLEARCDTIMES);
    }
}

/**
 * FIGHTDBINFO message
 */
class FIGHTDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STPVEINFOS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STPVEINFOS => array(
            'name' => 'stPveInfos',
            'required' => false,
            'type' => 'PVEDBINFO'
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
        $this->values[self::STPVEINFOS] = null;
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
     * Sets value of 'stPveInfos' property
     *
     * @param PVEDBINFO $value Property value
     *
     * @return null
     */
    public function setStPveInfos(PVEDBINFO $value)
    {
        return $this->set(self::STPVEINFOS, $value);
    }

    /**
     * Returns value of 'stPveInfos' property
     *
     * @return PVEDBINFO
     */
    public function getStPveInfos()
    {
        return $this->get(self::STPVEINFOS);
    }
}

/**
 * ONEFRIENDINFO message
 */
class ONEFRIENDINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const ILASTSENDTIME = 2;
    const ILASTASKTIME = 3;
    const STBASICSUMMARY = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTSENDTIME => array(
            'name' => 'iLastSendTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTASKTIME => array(
            'name' => 'iLastAskTime',
            'required' => false,
            'type' => 5,
        ),
        self::STBASICSUMMARY => array(
            'name' => 'stBasicSummary',
            'required' => false,
            'type' => 'BasicPlayerSummary'
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
        $this->values[self::IROLEID] = null;
        $this->values[self::ILASTSENDTIME] = null;
        $this->values[self::ILASTASKTIME] = null;
        $this->values[self::STBASICSUMMARY] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'iLastSendTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastSendTime($value)
    {
        return $this->set(self::ILASTSENDTIME, $value);
    }

    /**
     * Returns value of 'iLastSendTime' property
     *
     * @return int
     */
    public function getILastSendTime()
    {
        return $this->get(self::ILASTSENDTIME);
    }

    /**
     * Sets value of 'iLastAskTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastAskTime($value)
    {
        return $this->set(self::ILASTASKTIME, $value);
    }

    /**
     * Returns value of 'iLastAskTime' property
     *
     * @return int
     */
    public function getILastAskTime()
    {
        return $this->get(self::ILASTASKTIME);
    }

    /**
     * Sets value of 'stBasicSummary' property
     *
     * @param BasicPlayerSummary $value Property value
     *
     * @return null
     */
    public function setStBasicSummary(BasicPlayerSummary $value)
    {
        return $this->set(self::STBASICSUMMARY, $value);
    }

    /**
     * Returns value of 'stBasicSummary' property
     *
     * @return BasicPlayerSummary
     */
    public function getStBasicSummary()
    {
        return $this->get(self::STBASICSUMMARY);
    }
}

/**
 * FRIENDSOCIAL message
 */
class FRIENDSOCIAL extends \ProtobufMessage
{
    /* Field index constants */
    const ISOCIALTYPE = 1;
    const IROLEID = 2;
    const ITIME = 3;
    const STBASICSUMMARY = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISOCIALTYPE => array(
            'name' => 'iSocialType',
            'required' => false,
            'type' => 5,
        ),
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::ITIME => array(
            'name' => 'iTime',
            'required' => false,
            'type' => 5,
        ),
        self::STBASICSUMMARY => array(
            'name' => 'stBasicSummary',
            'required' => false,
            'type' => 'BasicPlayerSummary'
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
        $this->values[self::ISOCIALTYPE] = null;
        $this->values[self::IROLEID] = null;
        $this->values[self::ITIME] = null;
        $this->values[self::STBASICSUMMARY] = null;
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
     * Sets value of 'iSocialType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISocialType($value)
    {
        return $this->set(self::ISOCIALTYPE, $value);
    }

    /**
     * Returns value of 'iSocialType' property
     *
     * @return int
     */
    public function getISocialType()
    {
        return $this->get(self::ISOCIALTYPE);
    }

    /**
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
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
     * Sets value of 'stBasicSummary' property
     *
     * @param BasicPlayerSummary $value Property value
     *
     * @return null
     */
    public function setStBasicSummary(BasicPlayerSummary $value)
    {
        return $this->set(self::STBASICSUMMARY, $value);
    }

    /**
     * Returns value of 'stBasicSummary' property
     *
     * @return BasicPlayerSummary
     */
    public function getStBasicSummary()
    {
        return $this->get(self::STBASICSUMMARY);
    }
}

/**
 * APPLYGUILDINFO message
 */
class APPLYGUILDINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IGUILDID = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IGUILDID => array(
            'name' => 'iGuildId',
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
        $this->values[self::IGUILDID] = null;
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
     * Sets value of 'iGuildId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildId($value)
    {
        return $this->set(self::IGUILDID, $value);
    }

    /**
     * Returns value of 'iGuildId' property
     *
     * @return int
     */
    public function getIGuildId()
    {
        return $this->get(self::IGUILDID);
    }
}

/**
 * FRIENDDBINFO message
 */
class FRIENDDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STFRIENDSLIST = 1;
    const STSOCIALLIST = 2;
    const IDAILYSENDAMT = 3;
    const IDAILYGETAMT = 4;
    const IMAXFRIENDNUM = 5;
    const ILASTSETTIME = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STFRIENDSLIST => array(
            'name' => 'stFriendsList',
            'repeated' => true,
            'type' => 'ONEFRIENDINFO'
        ),
        self::STSOCIALLIST => array(
            'name' => 'stSocialList',
            'repeated' => true,
            'type' => 'FRIENDSOCIAL'
        ),
        self::IDAILYSENDAMT => array(
            'name' => 'iDailySendAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYGETAMT => array(
            'name' => 'iDailyGetAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXFRIENDNUM => array(
            'name' => 'iMaxFriendNum',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTSETTIME => array(
            'name' => 'iLastSetTime',
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
        $this->values[self::STFRIENDSLIST] = array();
        $this->values[self::STSOCIALLIST] = array();
        $this->values[self::IDAILYSENDAMT] = null;
        $this->values[self::IDAILYGETAMT] = null;
        $this->values[self::IMAXFRIENDNUM] = null;
        $this->values[self::ILASTSETTIME] = null;
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
     * Appends value to 'stFriendsList' list
     *
     * @param ONEFRIENDINFO $value Value to append
     *
     * @return null
     */
    public function appendStFriendsList(ONEFRIENDINFO $value)
    {
        return $this->append(self::STFRIENDSLIST, $value);
    }

    /**
     * Clears 'stFriendsList' list
     *
     * @return null
     */
    public function clearStFriendsList()
    {
        return $this->clear(self::STFRIENDSLIST);
    }

    /**
     * Returns 'stFriendsList' list
     *
     * @return ONEFRIENDINFO[]
     */
    public function getStFriendsList()
    {
        return $this->get(self::STFRIENDSLIST);
    }

    /**
     * Returns 'stFriendsList' iterator
     *
     * @return ArrayIterator
     */
    public function getStFriendsListIterator()
    {
        return new \ArrayIterator($this->get(self::STFRIENDSLIST));
    }

    /**
     * Returns element from 'stFriendsList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONEFRIENDINFO
     */
    public function getStFriendsListAt($offset)
    {
        return $this->get(self::STFRIENDSLIST, $offset);
    }

    /**
     * Returns count of 'stFriendsList' list
     *
     * @return int
     */
    public function getStFriendsListCount()
    {
        return $this->count(self::STFRIENDSLIST);
    }

    /**
     * Appends value to 'stSocialList' list
     *
     * @param FRIENDSOCIAL $value Value to append
     *
     * @return null
     */
    public function appendStSocialList(FRIENDSOCIAL $value)
    {
        return $this->append(self::STSOCIALLIST, $value);
    }

    /**
     * Clears 'stSocialList' list
     *
     * @return null
     */
    public function clearStSocialList()
    {
        return $this->clear(self::STSOCIALLIST);
    }

    /**
     * Returns 'stSocialList' list
     *
     * @return FRIENDSOCIAL[]
     */
    public function getStSocialList()
    {
        return $this->get(self::STSOCIALLIST);
    }

    /**
     * Returns 'stSocialList' iterator
     *
     * @return ArrayIterator
     */
    public function getStSocialListIterator()
    {
        return new \ArrayIterator($this->get(self::STSOCIALLIST));
    }

    /**
     * Returns element from 'stSocialList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return FRIENDSOCIAL
     */
    public function getStSocialListAt($offset)
    {
        return $this->get(self::STSOCIALLIST, $offset);
    }

    /**
     * Returns count of 'stSocialList' list
     *
     * @return int
     */
    public function getStSocialListCount()
    {
        return $this->count(self::STSOCIALLIST);
    }

    /**
     * Sets value of 'iDailySendAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailySendAmt($value)
    {
        return $this->set(self::IDAILYSENDAMT, $value);
    }

    /**
     * Returns value of 'iDailySendAmt' property
     *
     * @return int
     */
    public function getIDailySendAmt()
    {
        return $this->get(self::IDAILYSENDAMT);
    }

    /**
     * Sets value of 'iDailyGetAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyGetAmt($value)
    {
        return $this->set(self::IDAILYGETAMT, $value);
    }

    /**
     * Returns value of 'iDailyGetAmt' property
     *
     * @return int
     */
    public function getIDailyGetAmt()
    {
        return $this->get(self::IDAILYGETAMT);
    }

    /**
     * Sets value of 'iMaxFriendNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxFriendNum($value)
    {
        return $this->set(self::IMAXFRIENDNUM, $value);
    }

    /**
     * Returns value of 'iMaxFriendNum' property
     *
     * @return int
     */
    public function getIMaxFriendNum()
    {
        return $this->get(self::IMAXFRIENDNUM);
    }

    /**
     * Sets value of 'iLastSetTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastSetTime($value)
    {
        return $this->set(self::ILASTSETTIME, $value);
    }

    /**
     * Returns value of 'iLastSetTime' property
     *
     * @return int
     */
    public function getILastSetTime()
    {
        return $this->get(self::ILASTSETTIME);
    }
}

/**
 * LOTTERYDBINFO message
 */
class LOTTERYDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const INORMALREMAINTIMES = 1;
    const INORMALNEXTTIME = 2;
    const IEXCELLENTSATURATION = 3;
    const IEXCELLENTNEXTTIME = 4;
    const IEPICSATURATION = 5;
    const IEPICNEXTTIME = 6;
    const INORMALNEXTRECOVERTIME = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::INORMALREMAINTIMES => array(
            'name' => 'iNormalRemainTimes',
            'required' => false,
            'type' => 5,
        ),
        self::INORMALNEXTTIME => array(
            'name' => 'iNormalNextTime',
            'required' => false,
            'type' => 5,
        ),
        self::IEXCELLENTSATURATION => array(
            'name' => 'iExcellentSaturation',
            'required' => false,
            'type' => 5,
        ),
        self::IEXCELLENTNEXTTIME => array(
            'name' => 'iExcellentNextTime',
            'required' => false,
            'type' => 5,
        ),
        self::IEPICSATURATION => array(
            'name' => 'iEpicSaturation',
            'required' => false,
            'type' => 5,
        ),
        self::IEPICNEXTTIME => array(
            'name' => 'iEpicNextTime',
            'required' => false,
            'type' => 5,
        ),
        self::INORMALNEXTRECOVERTIME => array(
            'name' => 'iNormalNextRecoverTime',
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
        $this->values[self::INORMALREMAINTIMES] = null;
        $this->values[self::INORMALNEXTTIME] = null;
        $this->values[self::IEXCELLENTSATURATION] = null;
        $this->values[self::IEXCELLENTNEXTTIME] = null;
        $this->values[self::IEPICSATURATION] = null;
        $this->values[self::IEPICNEXTTIME] = null;
        $this->values[self::INORMALNEXTRECOVERTIME] = null;
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
     * Sets value of 'iNormalRemainTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINormalRemainTimes($value)
    {
        return $this->set(self::INORMALREMAINTIMES, $value);
    }

    /**
     * Returns value of 'iNormalRemainTimes' property
     *
     * @return int
     */
    public function getINormalRemainTimes()
    {
        return $this->get(self::INORMALREMAINTIMES);
    }

    /**
     * Sets value of 'iNormalNextTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINormalNextTime($value)
    {
        return $this->set(self::INORMALNEXTTIME, $value);
    }

    /**
     * Returns value of 'iNormalNextTime' property
     *
     * @return int
     */
    public function getINormalNextTime()
    {
        return $this->get(self::INORMALNEXTTIME);
    }

    /**
     * Sets value of 'iExcellentSaturation' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExcellentSaturation($value)
    {
        return $this->set(self::IEXCELLENTSATURATION, $value);
    }

    /**
     * Returns value of 'iExcellentSaturation' property
     *
     * @return int
     */
    public function getIExcellentSaturation()
    {
        return $this->get(self::IEXCELLENTSATURATION);
    }

    /**
     * Sets value of 'iExcellentNextTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExcellentNextTime($value)
    {
        return $this->set(self::IEXCELLENTNEXTTIME, $value);
    }

    /**
     * Returns value of 'iExcellentNextTime' property
     *
     * @return int
     */
    public function getIExcellentNextTime()
    {
        return $this->get(self::IEXCELLENTNEXTTIME);
    }

    /**
     * Sets value of 'iEpicSaturation' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEpicSaturation($value)
    {
        return $this->set(self::IEPICSATURATION, $value);
    }

    /**
     * Returns value of 'iEpicSaturation' property
     *
     * @return int
     */
    public function getIEpicSaturation()
    {
        return $this->get(self::IEPICSATURATION);
    }

    /**
     * Sets value of 'iEpicNextTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIEpicNextTime($value)
    {
        return $this->set(self::IEPICNEXTTIME, $value);
    }

    /**
     * Returns value of 'iEpicNextTime' property
     *
     * @return int
     */
    public function getIEpicNextTime()
    {
        return $this->get(self::IEPICNEXTTIME);
    }

    /**
     * Sets value of 'iNormalNextRecoverTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINormalNextRecoverTime($value)
    {
        return $this->set(self::INORMALNEXTRECOVERTIME, $value);
    }

    /**
     * Returns value of 'iNormalNextRecoverTime' property
     *
     * @return int
     */
    public function getINormalNextRecoverTime()
    {
        return $this->get(self::INORMALNEXTRECOVERTIME);
    }
}

/**
 * ONESINGLEMINE message
 */
class ONESINGLEMINE extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const IQUALITY = 2;
    const ILEVEL_W = 3;
    const IGOLDGAINAMOUNT_W = 4;
    const ILEVELUPCOSTGOLDEXP_W = 5;
    const IGOLDGAINLEFT = 6;
    const ILASTGAINTIME = 7;
    const ISPEEDUPENDTIME = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::IQUALITY => array(
            'name' => 'iQuality',
            'required' => false,
            'type' => 5,
        ),
        self::ILEVEL_W => array(
            'name' => 'iLevel_W',
            'required' => false,
            'type' => 5,
        ),
        self::IGOLDGAINAMOUNT_W => array(
            'name' => 'iGoldGainAmount_W',
            'required' => false,
            'type' => 5,
        ),
        self::ILEVELUPCOSTGOLDEXP_W => array(
            'name' => 'iLevelUpCostGoldExp_W',
            'required' => false,
            'type' => 5,
        ),
        self::IGOLDGAINLEFT => array(
            'name' => 'iGoldGainLeft',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTGAINTIME => array(
            'name' => 'iLastGainTime',
            'required' => false,
            'type' => 5,
        ),
        self::ISPEEDUPENDTIME => array(
            'name' => 'iSpeedUpEndTime',
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
        $this->values[self::IID] = null;
        $this->values[self::IQUALITY] = null;
        $this->values[self::ILEVEL_W] = null;
        $this->values[self::IGOLDGAINAMOUNT_W] = null;
        $this->values[self::ILEVELUPCOSTGOLDEXP_W] = null;
        $this->values[self::IGOLDGAINLEFT] = null;
        $this->values[self::ILASTGAINTIME] = null;
        $this->values[self::ISPEEDUPENDTIME] = null;
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
     * Sets value of 'iQuality' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIQuality($value)
    {
        return $this->set(self::IQUALITY, $value);
    }

    /**
     * Returns value of 'iQuality' property
     *
     * @return int
     */
    public function getIQuality()
    {
        return $this->get(self::IQUALITY);
    }

    /**
     * Sets value of 'iLevel_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevelW($value)
    {
        return $this->set(self::ILEVEL_W, $value);
    }

    /**
     * Returns value of 'iLevel_W' property
     *
     * @return int
     */
    public function getILevelW()
    {
        return $this->get(self::ILEVEL_W);
    }

    /**
     * Sets value of 'iGoldGainAmount_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGoldGainAmountW($value)
    {
        return $this->set(self::IGOLDGAINAMOUNT_W, $value);
    }

    /**
     * Returns value of 'iGoldGainAmount_W' property
     *
     * @return int
     */
    public function getIGoldGainAmountW()
    {
        return $this->get(self::IGOLDGAINAMOUNT_W);
    }

    /**
     * Sets value of 'iLevelUpCostGoldExp_W' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevelUpCostGoldExpW($value)
    {
        return $this->set(self::ILEVELUPCOSTGOLDEXP_W, $value);
    }

    /**
     * Returns value of 'iLevelUpCostGoldExp_W' property
     *
     * @return int
     */
    public function getILevelUpCostGoldExpW()
    {
        return $this->get(self::ILEVELUPCOSTGOLDEXP_W);
    }

    /**
     * Sets value of 'iGoldGainLeft' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGoldGainLeft($value)
    {
        return $this->set(self::IGOLDGAINLEFT, $value);
    }

    /**
     * Returns value of 'iGoldGainLeft' property
     *
     * @return int
     */
    public function getIGoldGainLeft()
    {
        return $this->get(self::IGOLDGAINLEFT);
    }

    /**
     * Sets value of 'iLastGainTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastGainTime($value)
    {
        return $this->set(self::ILASTGAINTIME, $value);
    }

    /**
     * Returns value of 'iLastGainTime' property
     *
     * @return int
     */
    public function getILastGainTime()
    {
        return $this->get(self::ILASTGAINTIME);
    }

    /**
     * Sets value of 'iSpeedUpEndTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISpeedUpEndTime($value)
    {
        return $this->set(self::ISPEEDUPENDTIME, $value);
    }

    /**
     * Returns value of 'iSpeedUpEndTime' property
     *
     * @return int
     */
    public function getISpeedUpEndTime()
    {
        return $this->get(self::ISPEEDUPENDTIME);
    }
}

/**
 * MINECRAFTDBINFO message
 */
class MINECRAFTDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STMINES = 1;
    const ILEVEL = 2;
    const IGOLDGAINAMOUNT = 3;
    const ILEVELUPCOSTGOLDEXP = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STMINES => array(
            'name' => 'stMines',
            'repeated' => true,
            'type' => 'ONESINGLEMINE'
        ),
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IGOLDGAINAMOUNT => array(
            'name' => 'iGoldGainAmount',
            'required' => false,
            'type' => 5,
        ),
        self::ILEVELUPCOSTGOLDEXP => array(
            'name' => 'iLevelUpCostGoldExp',
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
        $this->values[self::STMINES] = array();
        $this->values[self::ILEVEL] = null;
        $this->values[self::IGOLDGAINAMOUNT] = null;
        $this->values[self::ILEVELUPCOSTGOLDEXP] = null;
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
     * Appends value to 'stMines' list
     *
     * @param ONESINGLEMINE $value Value to append
     *
     * @return null
     */
    public function appendStMines(ONESINGLEMINE $value)
    {
        return $this->append(self::STMINES, $value);
    }

    /**
     * Clears 'stMines' list
     *
     * @return null
     */
    public function clearStMines()
    {
        return $this->clear(self::STMINES);
    }

    /**
     * Returns 'stMines' list
     *
     * @return ONESINGLEMINE[]
     */
    public function getStMines()
    {
        return $this->get(self::STMINES);
    }

    /**
     * Returns 'stMines' iterator
     *
     * @return ArrayIterator
     */
    public function getStMinesIterator()
    {
        return new \ArrayIterator($this->get(self::STMINES));
    }

    /**
     * Returns element from 'stMines' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONESINGLEMINE
     */
    public function getStMinesAt($offset)
    {
        return $this->get(self::STMINES, $offset);
    }

    /**
     * Returns count of 'stMines' list
     *
     * @return int
     */
    public function getStMinesCount()
    {
        return $this->count(self::STMINES);
    }

    /**
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'iGoldGainAmount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGoldGainAmount($value)
    {
        return $this->set(self::IGOLDGAINAMOUNT, $value);
    }

    /**
     * Returns value of 'iGoldGainAmount' property
     *
     * @return int
     */
    public function getIGoldGainAmount()
    {
        return $this->get(self::IGOLDGAINAMOUNT);
    }

    /**
     * Sets value of 'iLevelUpCostGoldExp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevelUpCostGoldExp($value)
    {
        return $this->set(self::ILEVELUPCOSTGOLDEXP, $value);
    }

    /**
     * Returns value of 'iLevelUpCostGoldExp' property
     *
     * @return int
     */
    public function getILevelUpCostGoldExp()
    {
        return $this->get(self::ILEVELUPCOSTGOLDEXP);
    }
}

/**
 * SINGLEREWARDRECORD message
 */
class SINGLEREWARDRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const IREWARDID = 1;
    const IGETREWARDTIME = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IREWARDID => array(
            'name' => 'iRewardId',
            'required' => false,
            'type' => 5,
        ),
        self::IGETREWARDTIME => array(
            'name' => 'iGetRewardTime',
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
        $this->values[self::IREWARDID] = null;
        $this->values[self::IGETREWARDTIME] = null;
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
     * Sets value of 'iRewardId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardId($value)
    {
        return $this->set(self::IREWARDID, $value);
    }

    /**
     * Returns value of 'iRewardId' property
     *
     * @return int
     */
    public function getIRewardId()
    {
        return $this->get(self::IREWARDID);
    }

    /**
     * Sets value of 'iGetRewardTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetRewardTime($value)
    {
        return $this->set(self::IGETREWARDTIME, $value);
    }

    /**
     * Returns value of 'iGetRewardTime' property
     *
     * @return int
     */
    public function getIGetRewardTime()
    {
        return $this->get(self::IGETREWARDTIME);
    }
}

/**
 * REWARDRECORD message
 */
class REWARDRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const ILASTGETREWARDTIME = 1;
    const STREWARDS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ILASTGETREWARDTIME => array(
            'name' => 'iLastGetRewardTime',
            'required' => false,
            'type' => 5,
        ),
        self::STREWARDS => array(
            'name' => 'stRewards',
            'repeated' => true,
            'type' => 'SINGLEREWARDRECORD'
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
        $this->values[self::ILASTGETREWARDTIME] = null;
        $this->values[self::STREWARDS] = array();
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
     * Sets value of 'iLastGetRewardTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastGetRewardTime($value)
    {
        return $this->set(self::ILASTGETREWARDTIME, $value);
    }

    /**
     * Returns value of 'iLastGetRewardTime' property
     *
     * @return int
     */
    public function getILastGetRewardTime()
    {
        return $this->get(self::ILASTGETREWARDTIME);
    }

    /**
     * Appends value to 'stRewards' list
     *
     * @param SINGLEREWARDRECORD $value Value to append
     *
     * @return null
     */
    public function appendStRewards(SINGLEREWARDRECORD $value)
    {
        return $this->append(self::STREWARDS, $value);
    }

    /**
     * Clears 'stRewards' list
     *
     * @return null
     */
    public function clearStRewards()
    {
        return $this->clear(self::STREWARDS);
    }

    /**
     * Returns 'stRewards' list
     *
     * @return SINGLEREWARDRECORD[]
     */
    public function getStRewards()
    {
        return $this->get(self::STREWARDS);
    }

    /**
     * Returns 'stRewards' iterator
     *
     * @return ArrayIterator
     */
    public function getStRewardsIterator()
    {
        return new \ArrayIterator($this->get(self::STREWARDS));
    }

    /**
     * Returns element from 'stRewards' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SINGLEREWARDRECORD
     */
    public function getStRewardsAt($offset)
    {
        return $this->get(self::STREWARDS, $offset);
    }

    /**
     * Returns count of 'stRewards' list
     *
     * @return int
     */
    public function getStRewardsCount()
    {
        return $this->count(self::STREWARDS);
    }
}

/**
 * ONECDKRECORD message
 */
class ONECDKRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const ICDKID = 1;
    const ICDKNUM = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICDKID => array(
            'name' => 'iCdkId',
            'required' => false,
            'type' => 5,
        ),
        self::ICDKNUM => array(
            'name' => 'iCdkNum',
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
        $this->values[self::ICDKID] = null;
        $this->values[self::ICDKNUM] = null;
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
     * Sets value of 'iCdkId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICdkId($value)
    {
        return $this->set(self::ICDKID, $value);
    }

    /**
     * Returns value of 'iCdkId' property
     *
     * @return int
     */
    public function getICdkId()
    {
        return $this->get(self::ICDKID);
    }

    /**
     * Sets value of 'iCdkNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICdkNum($value)
    {
        return $this->set(self::ICDKNUM, $value);
    }

    /**
     * Returns value of 'iCdkNum' property
     *
     * @return int
     */
    public function getICdkNum()
    {
        return $this->get(self::ICDKNUM);
    }
}

/**
 * CDKRECORD message
 */
class CDKRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const STCDKRECORDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STCDKRECORDS => array(
            'name' => 'stCdkRecords',
            'repeated' => true,
            'type' => 'ONECDKRECORD'
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
        $this->values[self::STCDKRECORDS] = array();
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
     * Appends value to 'stCdkRecords' list
     *
     * @param ONECDKRECORD $value Value to append
     *
     * @return null
     */
    public function appendStCdkRecords(ONECDKRECORD $value)
    {
        return $this->append(self::STCDKRECORDS, $value);
    }

    /**
     * Clears 'stCdkRecords' list
     *
     * @return null
     */
    public function clearStCdkRecords()
    {
        return $this->clear(self::STCDKRECORDS);
    }

    /**
     * Returns 'stCdkRecords' list
     *
     * @return ONECDKRECORD[]
     */
    public function getStCdkRecords()
    {
        return $this->get(self::STCDKRECORDS);
    }

    /**
     * Returns 'stCdkRecords' iterator
     *
     * @return ArrayIterator
     */
    public function getStCdkRecordsIterator()
    {
        return new \ArrayIterator($this->get(self::STCDKRECORDS));
    }

    /**
     * Returns element from 'stCdkRecords' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONECDKRECORD
     */
    public function getStCdkRecordsAt($offset)
    {
        return $this->get(self::STCDKRECORDS, $offset);
    }

    /**
     * Returns count of 'stCdkRecords' list
     *
     * @return int
     */
    public function getStCdkRecordsCount()
    {
        return $this->count(self::STCDKRECORDS);
    }
}

/**
 * ALLREWARDRECORD message
 */
class ALLREWARDRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const STLOGINREWARDINFO = 1;
    const STSCOREREWARDINFO = 2;
    const STLEVELREWARDINFO = 3;
    const ISIGNDAYS = 4;
    const ILASTSIGNTIME = 5;
    const ILOGINDAYS = 6;
    const ILASTLOGINTIME = 7;
    const STRCDKBATCHS = 8;
    const STCDKRECORD = 9;
    const IRESIGNDAYS = 10;
    const STDAILYREWARDINFO = 11;
    const STLASTSIGNREWARDINFO = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLOGINREWARDINFO => array(
            'name' => 'stLoginRewardInfo',
            'required' => false,
            'type' => 'REWARDRECORD'
        ),
        self::STSCOREREWARDINFO => array(
            'name' => 'stScoreRewardInfo',
            'required' => false,
            'type' => 'REWARDRECORD'
        ),
        self::STLEVELREWARDINFO => array(
            'name' => 'stLevelRewardInfo',
            'required' => false,
            'type' => 'REWARDRECORD'
        ),
        self::ISIGNDAYS => array(
            'name' => 'iSignDays',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTSIGNTIME => array(
            'name' => 'iLastSignTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILOGINDAYS => array(
            'name' => 'iLoginDays',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTLOGINTIME => array(
            'name' => 'iLastLoginTime',
            'required' => false,
            'type' => 5,
        ),
        self::STRCDKBATCHS => array(
            'name' => 'strCdkBatchs',
            'repeated' => true,
            'type' => 7,
        ),
        self::STCDKRECORD => array(
            'name' => 'stCdkRecord',
            'required' => false,
            'type' => 'CDKRECORD'
        ),
        self::IRESIGNDAYS => array(
            'name' => 'iReSignDays',
            'required' => false,
            'type' => 5,
        ),
        self::STDAILYREWARDINFO => array(
            'name' => 'stDailyRewardInfo',
            'required' => false,
            'type' => 'REWARDRECORD'
        ),
        self::STLASTSIGNREWARDINFO => array(
            'name' => 'stLastSignRewardInfo',
            'required' => false,
            'type' => 'REWARDRECORD'
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
        $this->values[self::STLOGINREWARDINFO] = null;
        $this->values[self::STSCOREREWARDINFO] = null;
        $this->values[self::STLEVELREWARDINFO] = null;
        $this->values[self::ISIGNDAYS] = null;
        $this->values[self::ILASTSIGNTIME] = null;
        $this->values[self::ILOGINDAYS] = null;
        $this->values[self::ILASTLOGINTIME] = null;
        $this->values[self::STRCDKBATCHS] = array();
        $this->values[self::STCDKRECORD] = null;
        $this->values[self::IRESIGNDAYS] = null;
        $this->values[self::STDAILYREWARDINFO] = null;
        $this->values[self::STLASTSIGNREWARDINFO] = null;
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
     * Sets value of 'stLoginRewardInfo' property
     *
     * @param REWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStLoginRewardInfo(REWARDRECORD $value)
    {
        return $this->set(self::STLOGINREWARDINFO, $value);
    }

    /**
     * Returns value of 'stLoginRewardInfo' property
     *
     * @return REWARDRECORD
     */
    public function getStLoginRewardInfo()
    {
        return $this->get(self::STLOGINREWARDINFO);
    }

    /**
     * Sets value of 'stScoreRewardInfo' property
     *
     * @param REWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStScoreRewardInfo(REWARDRECORD $value)
    {
        return $this->set(self::STSCOREREWARDINFO, $value);
    }

    /**
     * Returns value of 'stScoreRewardInfo' property
     *
     * @return REWARDRECORD
     */
    public function getStScoreRewardInfo()
    {
        return $this->get(self::STSCOREREWARDINFO);
    }

    /**
     * Sets value of 'stLevelRewardInfo' property
     *
     * @param REWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStLevelRewardInfo(REWARDRECORD $value)
    {
        return $this->set(self::STLEVELREWARDINFO, $value);
    }

    /**
     * Returns value of 'stLevelRewardInfo' property
     *
     * @return REWARDRECORD
     */
    public function getStLevelRewardInfo()
    {
        return $this->get(self::STLEVELREWARDINFO);
    }

    /**
     * Sets value of 'iSignDays' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISignDays($value)
    {
        return $this->set(self::ISIGNDAYS, $value);
    }

    /**
     * Returns value of 'iSignDays' property
     *
     * @return int
     */
    public function getISignDays()
    {
        return $this->get(self::ISIGNDAYS);
    }

    /**
     * Sets value of 'iLastSignTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastSignTime($value)
    {
        return $this->set(self::ILASTSIGNTIME, $value);
    }

    /**
     * Returns value of 'iLastSignTime' property
     *
     * @return int
     */
    public function getILastSignTime()
    {
        return $this->get(self::ILASTSIGNTIME);
    }

    /**
     * Sets value of 'iLoginDays' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILoginDays($value)
    {
        return $this->set(self::ILOGINDAYS, $value);
    }

    /**
     * Returns value of 'iLoginDays' property
     *
     * @return int
     */
    public function getILoginDays()
    {
        return $this->get(self::ILOGINDAYS);
    }

    /**
     * Sets value of 'iLastLoginTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastLoginTime($value)
    {
        return $this->set(self::ILASTLOGINTIME, $value);
    }

    /**
     * Returns value of 'iLastLoginTime' property
     *
     * @return int
     */
    public function getILastLoginTime()
    {
        return $this->get(self::ILASTLOGINTIME);
    }

    /**
     * Appends value to 'strCdkBatchs' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendStrCdkBatchs($value)
    {
        return $this->append(self::STRCDKBATCHS, $value);
    }

    /**
     * Clears 'strCdkBatchs' list
     *
     * @return null
     */
    public function clearStrCdkBatchs()
    {
        return $this->clear(self::STRCDKBATCHS);
    }

    /**
     * Returns 'strCdkBatchs' list
     *
     * @return string[]
     */
    public function getStrCdkBatchs()
    {
        return $this->get(self::STRCDKBATCHS);
    }

    /**
     * Returns 'strCdkBatchs' iterator
     *
     * @return ArrayIterator
     */
    public function getStrCdkBatchsIterator()
    {
        return new \ArrayIterator($this->get(self::STRCDKBATCHS));
    }

    /**
     * Returns element from 'strCdkBatchs' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getStrCdkBatchsAt($offset)
    {
        return $this->get(self::STRCDKBATCHS, $offset);
    }

    /**
     * Returns count of 'strCdkBatchs' list
     *
     * @return int
     */
    public function getStrCdkBatchsCount()
    {
        return $this->count(self::STRCDKBATCHS);
    }

    /**
     * Sets value of 'stCdkRecord' property
     *
     * @param CDKRECORD $value Property value
     *
     * @return null
     */
    public function setStCdkRecord(CDKRECORD $value)
    {
        return $this->set(self::STCDKRECORD, $value);
    }

    /**
     * Returns value of 'stCdkRecord' property
     *
     * @return CDKRECORD
     */
    public function getStCdkRecord()
    {
        return $this->get(self::STCDKRECORD);
    }

    /**
     * Sets value of 'iReSignDays' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIReSignDays($value)
    {
        return $this->set(self::IRESIGNDAYS, $value);
    }

    /**
     * Returns value of 'iReSignDays' property
     *
     * @return int
     */
    public function getIReSignDays()
    {
        return $this->get(self::IRESIGNDAYS);
    }

    /**
     * Sets value of 'stDailyRewardInfo' property
     *
     * @param REWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStDailyRewardInfo(REWARDRECORD $value)
    {
        return $this->set(self::STDAILYREWARDINFO, $value);
    }

    /**
     * Returns value of 'stDailyRewardInfo' property
     *
     * @return REWARDRECORD
     */
    public function getStDailyRewardInfo()
    {
        return $this->get(self::STDAILYREWARDINFO);
    }

    /**
     * Sets value of 'stLastSignRewardInfo' property
     *
     * @param REWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStLastSignRewardInfo(REWARDRECORD $value)
    {
        return $this->set(self::STLASTSIGNREWARDINFO, $value);
    }

    /**
     * Returns value of 'stLastSignRewardInfo' property
     *
     * @return REWARDRECORD
     */
    public function getStLastSignRewardInfo()
    {
        return $this->get(self::STLASTSIGNREWARDINFO);
    }
}

/**
 * LUCKYCHEST message
 */
class LUCKYCHEST extends \ProtobufMessage
{
    /* Field index constants */
    const ICHESTID = 1;
    const ILUCKYPOINT = 2;
    const ILUCKYPOINTB = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICHESTID => array(
            'name' => 'iChestId',
            'required' => false,
            'type' => 5,
        ),
        self::ILUCKYPOINT => array(
            'name' => 'iLuckyPoint',
            'required' => false,
            'type' => 5,
        ),
        self::ILUCKYPOINTB => array(
            'name' => 'iLuckyPointB',
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
        $this->values[self::ICHESTID] = null;
        $this->values[self::ILUCKYPOINT] = null;
        $this->values[self::ILUCKYPOINTB] = null;
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
     * Sets value of 'iChestId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIChestId($value)
    {
        return $this->set(self::ICHESTID, $value);
    }

    /**
     * Returns value of 'iChestId' property
     *
     * @return int
     */
    public function getIChestId()
    {
        return $this->get(self::ICHESTID);
    }

    /**
     * Sets value of 'iLuckyPoint' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILuckyPoint($value)
    {
        return $this->set(self::ILUCKYPOINT, $value);
    }

    /**
     * Returns value of 'iLuckyPoint' property
     *
     * @return int
     */
    public function getILuckyPoint()
    {
        return $this->get(self::ILUCKYPOINT);
    }

    /**
     * Sets value of 'iLuckyPointB' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILuckyPointB($value)
    {
        return $this->set(self::ILUCKYPOINTB, $value);
    }

    /**
     * Returns value of 'iLuckyPointB' property
     *
     * @return int
     */
    public function getILuckyPointB()
    {
        return $this->get(self::ILUCKYPOINTB);
    }
}

/**
 * ALLLUCKYCHEST message
 */
class ALLLUCKYCHEST extends \ProtobufMessage
{
    /* Field index constants */
    const STLUCKYCHESTS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLUCKYCHESTS => array(
            'name' => 'stLuckyChests',
            'repeated' => true,
            'type' => 'LUCKYCHEST'
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
        $this->values[self::STLUCKYCHESTS] = array();
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
     * Appends value to 'stLuckyChests' list
     *
     * @param LUCKYCHEST $value Value to append
     *
     * @return null
     */
    public function appendStLuckyChests(LUCKYCHEST $value)
    {
        return $this->append(self::STLUCKYCHESTS, $value);
    }

    /**
     * Clears 'stLuckyChests' list
     *
     * @return null
     */
    public function clearStLuckyChests()
    {
        return $this->clear(self::STLUCKYCHESTS);
    }

    /**
     * Returns 'stLuckyChests' list
     *
     * @return LUCKYCHEST[]
     */
    public function getStLuckyChests()
    {
        return $this->get(self::STLUCKYCHESTS);
    }

    /**
     * Returns 'stLuckyChests' iterator
     *
     * @return ArrayIterator
     */
    public function getStLuckyChestsIterator()
    {
        return new \ArrayIterator($this->get(self::STLUCKYCHESTS));
    }

    /**
     * Returns element from 'stLuckyChests' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return LUCKYCHEST
     */
    public function getStLuckyChestsAt($offset)
    {
        return $this->get(self::STLUCKYCHESTS, $offset);
    }

    /**
     * Returns count of 'stLuckyChests' list
     *
     * @return int
     */
    public function getStLuckyChestsCount()
    {
        return $this->count(self::STLUCKYCHESTS);
    }
}

/**
 * MALLITEMBUYRECORD message
 */
class MALLITEMBUYRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const ISHOPITEMID = 1;
    const IDAILYBUYAMT = 2;
    const ILASTBUYTIME = 3;
    const IBUYAMT = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISHOPITEMID => array(
            'name' => 'iShopItemId',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYBUYAMT => array(
            'name' => 'iDailyBuyAmt',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTBUYTIME => array(
            'name' => 'iLastBuyTime',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYAMT => array(
            'name' => 'iBuyAmt',
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
        $this->values[self::ISHOPITEMID] = null;
        $this->values[self::IDAILYBUYAMT] = null;
        $this->values[self::ILASTBUYTIME] = null;
        $this->values[self::IBUYAMT] = null;
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
     * Sets value of 'iShopItemId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIShopItemId($value)
    {
        return $this->set(self::ISHOPITEMID, $value);
    }

    /**
     * Returns value of 'iShopItemId' property
     *
     * @return int
     */
    public function getIShopItemId()
    {
        return $this->get(self::ISHOPITEMID);
    }

    /**
     * Sets value of 'iDailyBuyAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyBuyAmt($value)
    {
        return $this->set(self::IDAILYBUYAMT, $value);
    }

    /**
     * Returns value of 'iDailyBuyAmt' property
     *
     * @return int
     */
    public function getIDailyBuyAmt()
    {
        return $this->get(self::IDAILYBUYAMT);
    }

    /**
     * Sets value of 'iLastBuyTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastBuyTime($value)
    {
        return $this->set(self::ILASTBUYTIME, $value);
    }

    /**
     * Returns value of 'iLastBuyTime' property
     *
     * @return int
     */
    public function getILastBuyTime()
    {
        return $this->get(self::ILASTBUYTIME);
    }

    /**
     * Sets value of 'iBuyAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyAmt($value)
    {
        return $this->set(self::IBUYAMT, $value);
    }

    /**
     * Returns value of 'iBuyAmt' property
     *
     * @return int
     */
    public function getIBuyAmt()
    {
        return $this->get(self::IBUYAMT);
    }
}

/**
 * FUNCBUYRECORD message
 */
class FUNCBUYRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const IFUNCTYPE = 1;
    const IDAILYBUYAMT = 2;
    const ILASTBUYTIME = 3;
    const IBUYAMT = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IFUNCTYPE => array(
            'name' => 'iFuncType',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYBUYAMT => array(
            'name' => 'iDailyBuyAmt',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTBUYTIME => array(
            'name' => 'iLastBuyTime',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYAMT => array(
            'name' => 'iBuyAmt',
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
        $this->values[self::IFUNCTYPE] = null;
        $this->values[self::IDAILYBUYAMT] = null;
        $this->values[self::ILASTBUYTIME] = null;
        $this->values[self::IBUYAMT] = null;
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
     * Sets value of 'iFuncType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFuncType($value)
    {
        return $this->set(self::IFUNCTYPE, $value);
    }

    /**
     * Returns value of 'iFuncType' property
     *
     * @return int
     */
    public function getIFuncType()
    {
        return $this->get(self::IFUNCTYPE);
    }

    /**
     * Sets value of 'iDailyBuyAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyBuyAmt($value)
    {
        return $this->set(self::IDAILYBUYAMT, $value);
    }

    /**
     * Returns value of 'iDailyBuyAmt' property
     *
     * @return int
     */
    public function getIDailyBuyAmt()
    {
        return $this->get(self::IDAILYBUYAMT);
    }

    /**
     * Sets value of 'iLastBuyTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastBuyTime($value)
    {
        return $this->set(self::ILASTBUYTIME, $value);
    }

    /**
     * Returns value of 'iLastBuyTime' property
     *
     * @return int
     */
    public function getILastBuyTime()
    {
        return $this->get(self::ILASTBUYTIME);
    }

    /**
     * Sets value of 'iBuyAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyAmt($value)
    {
        return $this->set(self::IBUYAMT, $value);
    }

    /**
     * Returns value of 'iBuyAmt' property
     *
     * @return int
     */
    public function getIBuyAmt()
    {
        return $this->get(self::IBUYAMT);
    }
}

/**
 * SHOPINFO message
 */
class SHOPINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STMALLITEMBUYRECORDS = 1;
    const STFUNCBUYRECORD = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STMALLITEMBUYRECORDS => array(
            'name' => 'stMallItemBuyRecords',
            'repeated' => true,
            'type' => 'MALLITEMBUYRECORD'
        ),
        self::STFUNCBUYRECORD => array(
            'name' => 'stFuncBuyRecord',
            'repeated' => true,
            'type' => 'FUNCBUYRECORD'
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
        $this->values[self::STMALLITEMBUYRECORDS] = array();
        $this->values[self::STFUNCBUYRECORD] = array();
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
     * Appends value to 'stMallItemBuyRecords' list
     *
     * @param MALLITEMBUYRECORD $value Value to append
     *
     * @return null
     */
    public function appendStMallItemBuyRecords(MALLITEMBUYRECORD $value)
    {
        return $this->append(self::STMALLITEMBUYRECORDS, $value);
    }

    /**
     * Clears 'stMallItemBuyRecords' list
     *
     * @return null
     */
    public function clearStMallItemBuyRecords()
    {
        return $this->clear(self::STMALLITEMBUYRECORDS);
    }

    /**
     * Returns 'stMallItemBuyRecords' list
     *
     * @return MALLITEMBUYRECORD[]
     */
    public function getStMallItemBuyRecords()
    {
        return $this->get(self::STMALLITEMBUYRECORDS);
    }

    /**
     * Returns 'stMallItemBuyRecords' iterator
     *
     * @return ArrayIterator
     */
    public function getStMallItemBuyRecordsIterator()
    {
        return new \ArrayIterator($this->get(self::STMALLITEMBUYRECORDS));
    }

    /**
     * Returns element from 'stMallItemBuyRecords' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return MALLITEMBUYRECORD
     */
    public function getStMallItemBuyRecordsAt($offset)
    {
        return $this->get(self::STMALLITEMBUYRECORDS, $offset);
    }

    /**
     * Returns count of 'stMallItemBuyRecords' list
     *
     * @return int
     */
    public function getStMallItemBuyRecordsCount()
    {
        return $this->count(self::STMALLITEMBUYRECORDS);
    }

    /**
     * Appends value to 'stFuncBuyRecord' list
     *
     * @param FUNCBUYRECORD $value Value to append
     *
     * @return null
     */
    public function appendStFuncBuyRecord(FUNCBUYRECORD $value)
    {
        return $this->append(self::STFUNCBUYRECORD, $value);
    }

    /**
     * Clears 'stFuncBuyRecord' list
     *
     * @return null
     */
    public function clearStFuncBuyRecord()
    {
        return $this->clear(self::STFUNCBUYRECORD);
    }

    /**
     * Returns 'stFuncBuyRecord' list
     *
     * @return FUNCBUYRECORD[]
     */
    public function getStFuncBuyRecord()
    {
        return $this->get(self::STFUNCBUYRECORD);
    }

    /**
     * Returns 'stFuncBuyRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStFuncBuyRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STFUNCBUYRECORD));
    }

    /**
     * Returns element from 'stFuncBuyRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return FUNCBUYRECORD
     */
    public function getStFuncBuyRecordAt($offset)
    {
        return $this->get(self::STFUNCBUYRECORD, $offset);
    }

    /**
     * Returns count of 'stFuncBuyRecord' list
     *
     * @return int
     */
    public function getStFuncBuyRecordCount()
    {
        return $this->count(self::STFUNCBUYRECORD);
    }
}

/**
 * MYSTERIOUS_SHOPITEM message
 */
class MYSTERIOUSSHOPITEM extends \ProtobufMessage
{
    /* Field index constants */
    const ISHOPITEMID = 1;
    const IBUYTIMES = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISHOPITEMID => array(
            'name' => 'iShopItemId',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYTIMES => array(
            'name' => 'iBuyTimes',
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
        $this->values[self::ISHOPITEMID] = null;
        $this->values[self::IBUYTIMES] = null;
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
     * Sets value of 'iShopItemId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIShopItemId($value)
    {
        return $this->set(self::ISHOPITEMID, $value);
    }

    /**
     * Returns value of 'iShopItemId' property
     *
     * @return int
     */
    public function getIShopItemId()
    {
        return $this->get(self::ISHOPITEMID);
    }

    /**
     * Sets value of 'iBuyTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyTimes($value)
    {
        return $this->set(self::IBUYTIMES, $value);
    }

    /**
     * Returns value of 'iBuyTimes' property
     *
     * @return int
     */
    public function getIBuyTimes()
    {
        return $this->get(self::IBUYTIMES);
    }
}

/**
 * MYSTERIOUS_SHOP message
 */
class MYSTERIOUSSHOP extends \ProtobufMessage
{
    /* Field index constants */
    const STSHOPITEMS = 1;
    const IHASCOINUPDATEDTIMES = 2;
    const ICANFREEUPDATETIMES = 3;
    const ISHOWTIME = 4;
    const IMISSTIME = 5;
    const ILUCKYPOINT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STSHOPITEMS => array(
            'name' => 'stShopItems',
            'repeated' => true,
            'type' => 'MYSTERIOUSSHOPITEM'
        ),
        self::IHASCOINUPDATEDTIMES => array(
            'name' => 'iHasCoinUpdatedTimes',
            'required' => false,
            'type' => 5,
        ),
        self::ICANFREEUPDATETIMES => array(
            'name' => 'iCanFreeUpdateTimes',
            'required' => false,
            'type' => 5,
        ),
        self::ISHOWTIME => array(
            'name' => 'iShowTime',
            'required' => false,
            'type' => 5,
        ),
        self::IMISSTIME => array(
            'name' => 'iMissTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILUCKYPOINT => array(
            'name' => 'iLuckyPoint',
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
        $this->values[self::STSHOPITEMS] = array();
        $this->values[self::IHASCOINUPDATEDTIMES] = null;
        $this->values[self::ICANFREEUPDATETIMES] = null;
        $this->values[self::ISHOWTIME] = null;
        $this->values[self::IMISSTIME] = null;
        $this->values[self::ILUCKYPOINT] = null;
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
     * Appends value to 'stShopItems' list
     *
     * @param MYSTERIOUSSHOPITEM $value Value to append
     *
     * @return null
     */
    public function appendStShopItems(MYSTERIOUSSHOPITEM $value)
    {
        return $this->append(self::STSHOPITEMS, $value);
    }

    /**
     * Clears 'stShopItems' list
     *
     * @return null
     */
    public function clearStShopItems()
    {
        return $this->clear(self::STSHOPITEMS);
    }

    /**
     * Returns 'stShopItems' list
     *
     * @return MYSTERIOUSSHOPITEM[]
     */
    public function getStShopItems()
    {
        return $this->get(self::STSHOPITEMS);
    }

    /**
     * Returns 'stShopItems' iterator
     *
     * @return ArrayIterator
     */
    public function getStShopItemsIterator()
    {
        return new \ArrayIterator($this->get(self::STSHOPITEMS));
    }

    /**
     * Returns element from 'stShopItems' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return MYSTERIOUSSHOPITEM
     */
    public function getStShopItemsAt($offset)
    {
        return $this->get(self::STSHOPITEMS, $offset);
    }

    /**
     * Returns count of 'stShopItems' list
     *
     * @return int
     */
    public function getStShopItemsCount()
    {
        return $this->count(self::STSHOPITEMS);
    }

    /**
     * Sets value of 'iHasCoinUpdatedTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHasCoinUpdatedTimes($value)
    {
        return $this->set(self::IHASCOINUPDATEDTIMES, $value);
    }

    /**
     * Returns value of 'iHasCoinUpdatedTimes' property
     *
     * @return int
     */
    public function getIHasCoinUpdatedTimes()
    {
        return $this->get(self::IHASCOINUPDATEDTIMES);
    }

    /**
     * Sets value of 'iCanFreeUpdateTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICanFreeUpdateTimes($value)
    {
        return $this->set(self::ICANFREEUPDATETIMES, $value);
    }

    /**
     * Returns value of 'iCanFreeUpdateTimes' property
     *
     * @return int
     */
    public function getICanFreeUpdateTimes()
    {
        return $this->get(self::ICANFREEUPDATETIMES);
    }

    /**
     * Sets value of 'iShowTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIShowTime($value)
    {
        return $this->set(self::ISHOWTIME, $value);
    }

    /**
     * Returns value of 'iShowTime' property
     *
     * @return int
     */
    public function getIShowTime()
    {
        return $this->get(self::ISHOWTIME);
    }

    /**
     * Sets value of 'iMissTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMissTime($value)
    {
        return $this->set(self::IMISSTIME, $value);
    }

    /**
     * Returns value of 'iMissTime' property
     *
     * @return int
     */
    public function getIMissTime()
    {
        return $this->get(self::IMISSTIME);
    }

    /**
     * Sets value of 'iLuckyPoint' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILuckyPoint($value)
    {
        return $this->set(self::ILUCKYPOINT, $value);
    }

    /**
     * Returns value of 'iLuckyPoint' property
     *
     * @return int
     */
    public function getILuckyPoint()
    {
        return $this->get(self::ILUCKYPOINT);
    }
}

/**
 * LITTLEBUDDYSLOT message
 */
class LITTLEBUDDYSLOT extends \ProtobufMessage
{
    /* Field index constants */
    const STLITTLEBUDDYINDEX = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLITTLEBUDDYINDEX => array(
            'name' => 'stLittleBuddyIndex',
            'repeated' => true,
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
        $this->values[self::STLITTLEBUDDYINDEX] = array();
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
     * Appends value to 'stLittleBuddyIndex' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStLittleBuddyIndex($value)
    {
        return $this->append(self::STLITTLEBUDDYINDEX, $value);
    }

    /**
     * Clears 'stLittleBuddyIndex' list
     *
     * @return null
     */
    public function clearStLittleBuddyIndex()
    {
        return $this->clear(self::STLITTLEBUDDYINDEX);
    }

    /**
     * Returns 'stLittleBuddyIndex' list
     *
     * @return int[]
     */
    public function getStLittleBuddyIndex()
    {
        return $this->get(self::STLITTLEBUDDYINDEX);
    }

    /**
     * Returns 'stLittleBuddyIndex' iterator
     *
     * @return ArrayIterator
     */
    public function getStLittleBuddyIndexIterator()
    {
        return new \ArrayIterator($this->get(self::STLITTLEBUDDYINDEX));
    }

    /**
     * Returns element from 'stLittleBuddyIndex' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStLittleBuddyIndexAt($offset)
    {
        return $this->get(self::STLITTLEBUDDYINDEX, $offset);
    }

    /**
     * Returns count of 'stLittleBuddyIndex' list
     *
     * @return int
     */
    public function getStLittleBuddyIndexCount()
    {
        return $this->count(self::STLITTLEBUDDYINDEX);
    }
}

/**
 * LITTLEBUDDYINFO message
 */
class LITTLEBUDDYINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STLITTLEBUDDYSLOT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLITTLEBUDDYSLOT => array(
            'name' => 'stLittleBuddySlot',
            'required' => false,
            'type' => 'LITTLEBUDDYSLOT'
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
        $this->values[self::STLITTLEBUDDYSLOT] = null;
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
     * Sets value of 'stLittleBuddySlot' property
     *
     * @param LITTLEBUDDYSLOT $value Property value
     *
     * @return null
     */
    public function setStLittleBuddySlot(LITTLEBUDDYSLOT $value)
    {
        return $this->set(self::STLITTLEBUDDYSLOT, $value);
    }

    /**
     * Returns value of 'stLittleBuddySlot' property
     *
     * @return LITTLEBUDDYSLOT
     */
    public function getStLittleBuddySlot()
    {
        return $this->get(self::STLITTLEBUDDYSLOT);
    }
}

/**
 * ONETASK message
 */
class ONETASK extends \ProtobufMessage
{
    /* Field index constants */
    const ITASKID = 1;
    const ISCHEDULE = 2;
    const IGETTAG = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ITASKID => array(
            'name' => 'iTaskId',
            'required' => false,
            'type' => 5,
        ),
        self::ISCHEDULE => array(
            'name' => 'iSchedule',
            'required' => false,
            'type' => 5,
        ),
        self::IGETTAG => array(
            'name' => 'iGetTag',
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
        $this->values[self::ITASKID] = null;
        $this->values[self::ISCHEDULE] = null;
        $this->values[self::IGETTAG] = null;
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
     * Sets value of 'iTaskId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITaskId($value)
    {
        return $this->set(self::ITASKID, $value);
    }

    /**
     * Returns value of 'iTaskId' property
     *
     * @return int
     */
    public function getITaskId()
    {
        return $this->get(self::ITASKID);
    }

    /**
     * Sets value of 'iSchedule' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISchedule($value)
    {
        return $this->set(self::ISCHEDULE, $value);
    }

    /**
     * Returns value of 'iSchedule' property
     *
     * @return int
     */
    public function getISchedule()
    {
        return $this->get(self::ISCHEDULE);
    }

    /**
     * Sets value of 'iGetTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetTag($value)
    {
        return $this->set(self::IGETTAG, $value);
    }

    /**
     * Returns value of 'iGetTag' property
     *
     * @return int
     */
    public function getIGetTag()
    {
        return $this->get(self::IGETTAG);
    }
}

/**
 * TASK message
 */
class TASK extends \ProtobufMessage
{
    /* Field index constants */
    const ISCORE = 1;
    const STTASKS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISCORE => array(
            'name' => 'iScore',
            'required' => false,
            'type' => 5,
        ),
        self::STTASKS => array(
            'name' => 'stTasks',
            'repeated' => true,
            'type' => 'ONETASK'
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
        $this->values[self::ISCORE] = null;
        $this->values[self::STTASKS] = array();
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
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
    }

    /**
     * Appends value to 'stTasks' list
     *
     * @param ONETASK $value Value to append
     *
     * @return null
     */
    public function appendStTasks(ONETASK $value)
    {
        return $this->append(self::STTASKS, $value);
    }

    /**
     * Clears 'stTasks' list
     *
     * @return null
     */
    public function clearStTasks()
    {
        return $this->clear(self::STTASKS);
    }

    /**
     * Returns 'stTasks' list
     *
     * @return ONETASK[]
     */
    public function getStTasks()
    {
        return $this->get(self::STTASKS);
    }

    /**
     * Returns 'stTasks' iterator
     *
     * @return ArrayIterator
     */
    public function getStTasksIterator()
    {
        return new \ArrayIterator($this->get(self::STTASKS));
    }

    /**
     * Returns element from 'stTasks' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONETASK
     */
    public function getStTasksAt($offset)
    {
        return $this->get(self::STTASKS, $offset);
    }

    /**
     * Returns count of 'stTasks' list
     *
     * @return int
     */
    public function getStTasksCount()
    {
        return $this->count(self::STTASKS);
    }
}

/**
 * RESERVEDBINFO1 message
 */
class RESERVEDBINFO1 extends \ProtobufMessage
{
    /* Field index constants */
    const STTASK = 1;
    const STMINECRAFTINFO = 2;
    const STALLREWARDRECORD = 3;
    const STALLLUCKYCHEST = 4;
    const STSHOPINFO = 5;
    const STMYSTERIOUS_SHOP = 6;
    const STLITTLEBUDDYINFO = 7;
    const STBLACKMARKETSHOP = 8;
    const STMYSTERIOUS_SHOPEX = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STTASK => array(
            'name' => 'stTask',
            'required' => false,
            'type' => 'TASK'
        ),
        self::STMINECRAFTINFO => array(
            'name' => 'stMineCraftInfo',
            'required' => false,
            'type' => 'MINECRAFTDBINFO'
        ),
        self::STALLREWARDRECORD => array(
            'name' => 'stAllRewardRecord',
            'required' => false,
            'type' => 'ALLREWARDRECORD'
        ),
        self::STALLLUCKYCHEST => array(
            'name' => 'stAllLuckyChest',
            'required' => false,
            'type' => 'ALLLUCKYCHEST'
        ),
        self::STSHOPINFO => array(
            'name' => 'stShopInfo',
            'required' => false,
            'type' => 'SHOPINFO'
        ),
        self::STMYSTERIOUS_SHOP => array(
            'name' => 'stMysterious_shop',
            'required' => false,
            'type' => 'MYSTERIOUSSHOP'
        ),
        self::STLITTLEBUDDYINFO => array(
            'name' => 'stLittleBuddyInfo',
            'required' => false,
            'type' => 'LITTLEBUDDYINFO'
        ),
        self::STBLACKMARKETSHOP => array(
            'name' => 'stBlackMarketShop',
            'required' => false,
            'type' => 'MYSTERIOUSSHOP'
        ),
        self::STMYSTERIOUS_SHOPEX => array(
            'name' => 'stMysterious_shopEx',
            'required' => false,
            'type' => 'MYSTERIOUSSHOP'
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
        $this->values[self::STTASK] = null;
        $this->values[self::STMINECRAFTINFO] = null;
        $this->values[self::STALLREWARDRECORD] = null;
        $this->values[self::STALLLUCKYCHEST] = null;
        $this->values[self::STSHOPINFO] = null;
        $this->values[self::STMYSTERIOUS_SHOP] = null;
        $this->values[self::STLITTLEBUDDYINFO] = null;
        $this->values[self::STBLACKMARKETSHOP] = null;
        $this->values[self::STMYSTERIOUS_SHOPEX] = null;
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
     * Sets value of 'stTask' property
     *
     * @param TASK $value Property value
     *
     * @return null
     */
    public function setStTask(TASK $value)
    {
        return $this->set(self::STTASK, $value);
    }

    /**
     * Returns value of 'stTask' property
     *
     * @return TASK
     */
    public function getStTask()
    {
        return $this->get(self::STTASK);
    }

    /**
     * Sets value of 'stMineCraftInfo' property
     *
     * @param MINECRAFTDBINFO $value Property value
     *
     * @return null
     */
    public function setStMineCraftInfo(MINECRAFTDBINFO $value)
    {
        return $this->set(self::STMINECRAFTINFO, $value);
    }

    /**
     * Returns value of 'stMineCraftInfo' property
     *
     * @return MINECRAFTDBINFO
     */
    public function getStMineCraftInfo()
    {
        return $this->get(self::STMINECRAFTINFO);
    }

    /**
     * Sets value of 'stAllRewardRecord' property
     *
     * @param ALLREWARDRECORD $value Property value
     *
     * @return null
     */
    public function setStAllRewardRecord(ALLREWARDRECORD $value)
    {
        return $this->set(self::STALLREWARDRECORD, $value);
    }

    /**
     * Returns value of 'stAllRewardRecord' property
     *
     * @return ALLREWARDRECORD
     */
    public function getStAllRewardRecord()
    {
        return $this->get(self::STALLREWARDRECORD);
    }

    /**
     * Sets value of 'stAllLuckyChest' property
     *
     * @param ALLLUCKYCHEST $value Property value
     *
     * @return null
     */
    public function setStAllLuckyChest(ALLLUCKYCHEST $value)
    {
        return $this->set(self::STALLLUCKYCHEST, $value);
    }

    /**
     * Returns value of 'stAllLuckyChest' property
     *
     * @return ALLLUCKYCHEST
     */
    public function getStAllLuckyChest()
    {
        return $this->get(self::STALLLUCKYCHEST);
    }

    /**
     * Sets value of 'stShopInfo' property
     *
     * @param SHOPINFO $value Property value
     *
     * @return null
     */
    public function setStShopInfo(SHOPINFO $value)
    {
        return $this->set(self::STSHOPINFO, $value);
    }

    /**
     * Returns value of 'stShopInfo' property
     *
     * @return SHOPINFO
     */
    public function getStShopInfo()
    {
        return $this->get(self::STSHOPINFO);
    }

    /**
     * Sets value of 'stMysterious_shop' property
     *
     * @param MYSTERIOUSSHOP $value Property value
     *
     * @return null
     */
    public function setStMysteriousShop(MYSTERIOUSSHOP $value)
    {
        return $this->set(self::STMYSTERIOUS_SHOP, $value);
    }

    /**
     * Returns value of 'stMysterious_shop' property
     *
     * @return MYSTERIOUSSHOP
     */
    public function getStMysteriousShop()
    {
        return $this->get(self::STMYSTERIOUS_SHOP);
    }

    /**
     * Sets value of 'stLittleBuddyInfo' property
     *
     * @param LITTLEBUDDYINFO $value Property value
     *
     * @return null
     */
    public function setStLittleBuddyInfo(LITTLEBUDDYINFO $value)
    {
        return $this->set(self::STLITTLEBUDDYINFO, $value);
    }

    /**
     * Returns value of 'stLittleBuddyInfo' property
     *
     * @return LITTLEBUDDYINFO
     */
    public function getStLittleBuddyInfo()
    {
        return $this->get(self::STLITTLEBUDDYINFO);
    }

    /**
     * Sets value of 'stBlackMarketShop' property
     *
     * @param MYSTERIOUSSHOP $value Property value
     *
     * @return null
     */
    public function setStBlackMarketShop(MYSTERIOUSSHOP $value)
    {
        return $this->set(self::STBLACKMARKETSHOP, $value);
    }

    /**
     * Returns value of 'stBlackMarketShop' property
     *
     * @return MYSTERIOUSSHOP
     */
    public function getStBlackMarketShop()
    {
        return $this->get(self::STBLACKMARKETSHOP);
    }

    /**
     * Sets value of 'stMysterious_shopEx' property
     *
     * @param MYSTERIOUSSHOP $value Property value
     *
     * @return null
     */
    public function setStMysteriousShopEx(MYSTERIOUSSHOP $value)
    {
        return $this->set(self::STMYSTERIOUS_SHOPEX, $value);
    }

    /**
     * Returns value of 'stMysterious_shopEx' property
     *
     * @return MYSTERIOUSSHOP
     */
    public function getStMysteriousShopEx()
    {
        return $this->get(self::STMYSTERIOUS_SHOPEX);
    }
}

/**
 * ONERECHARGE_INFO message
 */
class ONERECHARGEINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IITEMID = 1;
    const IITEMAMT = 2;
    const IENDTIME = 3;
    const ILASTGETTIME = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IITEMID => array(
            'name' => 'iItemId',
            'required' => false,
            'type' => 5,
        ),
        self::IITEMAMT => array(
            'name' => 'iItemAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndTime',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTGETTIME => array(
            'name' => 'iLastGetTime',
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
        $this->values[self::IITEMAMT] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::ILASTGETTIME] = null;
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
     * Sets value of 'iItemId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemId($value)
    {
        return $this->set(self::IITEMID, $value);
    }

    /**
     * Returns value of 'iItemId' property
     *
     * @return int
     */
    public function getIItemId()
    {
        return $this->get(self::IITEMID);
    }

    /**
     * Sets value of 'iItemAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIItemAmt($value)
    {
        return $this->set(self::IITEMAMT, $value);
    }

    /**
     * Returns value of 'iItemAmt' property
     *
     * @return int
     */
    public function getIItemAmt()
    {
        return $this->get(self::IITEMAMT);
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
     * Sets value of 'iLastGetTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastGetTime($value)
    {
        return $this->set(self::ILASTGETTIME, $value);
    }

    /**
     * Returns value of 'iLastGetTime' property
     *
     * @return int
     */
    public function getILastGetTime()
    {
        return $this->get(self::ILASTGETTIME);
    }
}

/**
 * RECHARGE_RECORD message
 */
class RECHARGERECORD extends \ProtobufMessage
{
    /* Field index constants */
    const IRECHARGEAMT = 1;
    const IRECHARGETIME = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IRECHARGEAMT => array(
            'name' => 'iRechargeAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IRECHARGETIME => array(
            'name' => 'iRechargeTime',
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
        $this->values[self::IRECHARGEAMT] = null;
        $this->values[self::IRECHARGETIME] = null;
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
     * Sets value of 'iRechargeAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRechargeAmt($value)
    {
        return $this->set(self::IRECHARGEAMT, $value);
    }

    /**
     * Returns value of 'iRechargeAmt' property
     *
     * @return int
     */
    public function getIRechargeAmt()
    {
        return $this->get(self::IRECHARGEAMT);
    }

    /**
     * Sets value of 'iRechargeTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRechargeTime($value)
    {
        return $this->set(self::IRECHARGETIME, $value);
    }

    /**
     * Returns value of 'iRechargeTime' property
     *
     * @return int
     */
    public function getIRechargeTime()
    {
        return $this->get(self::IRECHARGETIME);
    }
}

/**
 * GrowPlan message
 */
class GrowPlan extends \ProtobufMessage
{
    /* Field index constants */
    const IPLANID = 1;
    const STRECORDS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IPLANID => array(
            'name' => 'iPlanId',
            'required' => false,
            'type' => 5,
        ),
        self::STRECORDS => array(
            'name' => 'stRecords',
            'repeated' => true,
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
        $this->values[self::IPLANID] = null;
        $this->values[self::STRECORDS] = array();
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
     * Sets value of 'iPlanId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPlanId($value)
    {
        return $this->set(self::IPLANID, $value);
    }

    /**
     * Returns value of 'iPlanId' property
     *
     * @return int
     */
    public function getIPlanId()
    {
        return $this->get(self::IPLANID);
    }

    /**
     * Appends value to 'stRecords' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStRecords($value)
    {
        return $this->append(self::STRECORDS, $value);
    }

    /**
     * Clears 'stRecords' list
     *
     * @return null
     */
    public function clearStRecords()
    {
        return $this->clear(self::STRECORDS);
    }

    /**
     * Returns 'stRecords' list
     *
     * @return int[]
     */
    public function getStRecords()
    {
        return $this->get(self::STRECORDS);
    }

    /**
     * Returns 'stRecords' iterator
     *
     * @return ArrayIterator
     */
    public function getStRecordsIterator()
    {
        return new \ArrayIterator($this->get(self::STRECORDS));
    }

    /**
     * Returns element from 'stRecords' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStRecordsAt($offset)
    {
        return $this->get(self::STRECORDS, $offset);
    }

    /**
     * Returns count of 'stRecords' list
     *
     * @return int
     */
    public function getStRecordsCount()
    {
        return $this->count(self::STRECORDS);
    }
}

/**
 * ONE_REWARD_ITEM message
 */
class ONEREWARDITEM extends \ProtobufMessage
{
    /* Field index constants */
    const IDROPTYPE = 1;
    const IDROPID = 2;
    const IDROPAMT = 3;

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
        self::IDROPAMT => array(
            'name' => 'iDropAmt',
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
        $this->values[self::IDROPAMT] = null;
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
     * Sets value of 'iDropAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropAmt($value)
    {
        return $this->set(self::IDROPAMT, $value);
    }

    /**
     * Returns value of 'iDropAmt' property
     *
     * @return int
     */
    public function getIDropAmt()
    {
        return $this->get(self::IDROPAMT);
    }
}

/**
 * ACTIVITY_REWARD message
 */
class ACTIVITYREWARD extends \ProtobufMessage
{
    /* Field index constants */
    const IREWARDID = 1;
    const IGETTAG = 2;
    const STREWARDLIST = 3;
    const ICONDITONTYPE = 4;
    const ICONDITONPARAM = 5;
    const STRTITLE = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IREWARDID => array(
            'name' => 'iRewardId',
            'required' => false,
            'type' => 5,
        ),
        self::IGETTAG => array(
            'name' => 'iGetTag',
            'required' => false,
            'type' => 5,
        ),
        self::STREWARDLIST => array(
            'name' => 'stRewardList',
            'repeated' => true,
            'type' => 'ONEREWARDITEM'
        ),
        self::ICONDITONTYPE => array(
            'name' => 'iConditonType',
            'required' => false,
            'type' => 5,
        ),
        self::ICONDITONPARAM => array(
            'name' => 'iConditonParam',
            'required' => false,
            'type' => 5,
        ),
        self::STRTITLE => array(
            'name' => 'strTitle',
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
        $this->values[self::IREWARDID] = null;
        $this->values[self::IGETTAG] = null;
        $this->values[self::STREWARDLIST] = array();
        $this->values[self::ICONDITONTYPE] = null;
        $this->values[self::ICONDITONPARAM] = null;
        $this->values[self::STRTITLE] = null;
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
     * Sets value of 'iRewardId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardId($value)
    {
        return $this->set(self::IREWARDID, $value);
    }

    /**
     * Returns value of 'iRewardId' property
     *
     * @return int
     */
    public function getIRewardId()
    {
        return $this->get(self::IREWARDID);
    }

    /**
     * Sets value of 'iGetTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetTag($value)
    {
        return $this->set(self::IGETTAG, $value);
    }

    /**
     * Returns value of 'iGetTag' property
     *
     * @return int
     */
    public function getIGetTag()
    {
        return $this->get(self::IGETTAG);
    }

    /**
     * Appends value to 'stRewardList' list
     *
     * @param ONEREWARDITEM $value Value to append
     *
     * @return null
     */
    public function appendStRewardList(ONEREWARDITEM $value)
    {
        return $this->append(self::STREWARDLIST, $value);
    }

    /**
     * Clears 'stRewardList' list
     *
     * @return null
     */
    public function clearStRewardList()
    {
        return $this->clear(self::STREWARDLIST);
    }

    /**
     * Returns 'stRewardList' list
     *
     * @return ONEREWARDITEM[]
     */
    public function getStRewardList()
    {
        return $this->get(self::STREWARDLIST);
    }

    /**
     * Returns 'stRewardList' iterator
     *
     * @return ArrayIterator
     */
    public function getStRewardListIterator()
    {
        return new \ArrayIterator($this->get(self::STREWARDLIST));
    }

    /**
     * Returns element from 'stRewardList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONEREWARDITEM
     */
    public function getStRewardListAt($offset)
    {
        return $this->get(self::STREWARDLIST, $offset);
    }

    /**
     * Returns count of 'stRewardList' list
     *
     * @return int
     */
    public function getStRewardListCount()
    {
        return $this->count(self::STREWARDLIST);
    }

    /**
     * Sets value of 'iConditonType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIConditonType($value)
    {
        return $this->set(self::ICONDITONTYPE, $value);
    }

    /**
     * Returns value of 'iConditonType' property
     *
     * @return int
     */
    public function getIConditonType()
    {
        return $this->get(self::ICONDITONTYPE);
    }

    /**
     * Sets value of 'iConditonParam' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIConditonParam($value)
    {
        return $this->set(self::ICONDITONPARAM, $value);
    }

    /**
     * Returns value of 'iConditonParam' property
     *
     * @return int
     */
    public function getIConditonParam()
    {
        return $this->get(self::ICONDITONPARAM);
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
}

/**
 * BESTHEROINFO message
 */
class BESTHEROINFO extends \ProtobufMessage
{
    /* Field index constants */
    const INEXTFREETIME = 1;
    const IEXTRACTCOUNT = 2;
    const ISCORE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::INEXTFREETIME => array(
            'name' => 'iNextFreeTime',
            'required' => false,
            'type' => 5,
        ),
        self::IEXTRACTCOUNT => array(
            'name' => 'iExtractCount',
            'required' => false,
            'type' => 5,
        ),
        self::ISCORE => array(
            'name' => 'iScore',
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
        $this->values[self::INEXTFREETIME] = null;
        $this->values[self::IEXTRACTCOUNT] = null;
        $this->values[self::ISCORE] = null;
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
     * Sets value of 'iNextFreeTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setINextFreeTime($value)
    {
        return $this->set(self::INEXTFREETIME, $value);
    }

    /**
     * Returns value of 'iNextFreeTime' property
     *
     * @return int
     */
    public function getINextFreeTime()
    {
        return $this->get(self::INEXTFREETIME);
    }

    /**
     * Sets value of 'iExtractCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIExtractCount($value)
    {
        return $this->set(self::IEXTRACTCOUNT, $value);
    }

    /**
     * Returns value of 'iExtractCount' property
     *
     * @return int
     */
    public function getIExtractCount()
    {
        return $this->get(self::IEXTRACTCOUNT);
    }

    /**
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
    }
}

/**
 * ONE_ACTIVITY_RECORD message
 */
class ONEACTIVITYRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const IBATCHID = 1;
    const ISTARTTIME = 2;
    const IENDTIME = 3;
    const IACTTYPE = 4;
    const IACTID = 5;
    const IAMOUNT = 6;
    const STREWARDRECORD = 7;
    const STBESTHEROINFO = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBATCHID => array(
            'name' => 'iBatchId',
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
        self::IACTTYPE => array(
            'name' => 'iActType',
            'required' => false,
            'type' => 5,
        ),
        self::IACTID => array(
            'name' => 'iActId',
            'required' => false,
            'type' => 5,
        ),
        self::IAMOUNT => array(
            'name' => 'iAmount',
            'required' => false,
            'type' => 5,
        ),
        self::STREWARDRECORD => array(
            'name' => 'stRewardRecord',
            'repeated' => true,
            'type' => 'ACTIVITYREWARD'
        ),
        self::STBESTHEROINFO => array(
            'name' => 'stBestHeroInfo',
            'required' => false,
            'type' => 'BESTHEROINFO'
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
        $this->values[self::IBATCHID] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::IACTTYPE] = null;
        $this->values[self::IACTID] = null;
        $this->values[self::IAMOUNT] = null;
        $this->values[self::STREWARDRECORD] = array();
        $this->values[self::STBESTHEROINFO] = null;
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
     * Sets value of 'iBatchId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBatchId($value)
    {
        return $this->set(self::IBATCHID, $value);
    }

    /**
     * Returns value of 'iBatchId' property
     *
     * @return int
     */
    public function getIBatchId()
    {
        return $this->get(self::IBATCHID);
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
     * Sets value of 'iActType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActType($value)
    {
        return $this->set(self::IACTTYPE, $value);
    }

    /**
     * Returns value of 'iActType' property
     *
     * @return int
     */
    public function getIActType()
    {
        return $this->get(self::IACTTYPE);
    }

    /**
     * Sets value of 'iActId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActId($value)
    {
        return $this->set(self::IACTID, $value);
    }

    /**
     * Returns value of 'iActId' property
     *
     * @return int
     */
    public function getIActId()
    {
        return $this->get(self::IACTID);
    }

    /**
     * Sets value of 'iAmount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAmount($value)
    {
        return $this->set(self::IAMOUNT, $value);
    }

    /**
     * Returns value of 'iAmount' property
     *
     * @return int
     */
    public function getIAmount()
    {
        return $this->get(self::IAMOUNT);
    }

    /**
     * Appends value to 'stRewardRecord' list
     *
     * @param ACTIVITYREWARD $value Value to append
     *
     * @return null
     */
    public function appendStRewardRecord(ACTIVITYREWARD $value)
    {
        return $this->append(self::STREWARDRECORD, $value);
    }

    /**
     * Clears 'stRewardRecord' list
     *
     * @return null
     */
    public function clearStRewardRecord()
    {
        return $this->clear(self::STREWARDRECORD);
    }

    /**
     * Returns 'stRewardRecord' list
     *
     * @return ACTIVITYREWARD[]
     */
    public function getStRewardRecord()
    {
        return $this->get(self::STREWARDRECORD);
    }

    /**
     * Returns 'stRewardRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStRewardRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STREWARDRECORD));
    }

    /**
     * Returns element from 'stRewardRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ACTIVITYREWARD
     */
    public function getStRewardRecordAt($offset)
    {
        return $this->get(self::STREWARDRECORD, $offset);
    }

    /**
     * Returns count of 'stRewardRecord' list
     *
     * @return int
     */
    public function getStRewardRecordCount()
    {
        return $this->count(self::STREWARDRECORD);
    }

    /**
     * Sets value of 'stBestHeroInfo' property
     *
     * @param BESTHEROINFO $value Property value
     *
     * @return null
     */
    public function setStBestHeroInfo(BESTHEROINFO $value)
    {
        return $this->set(self::STBESTHEROINFO, $value);
    }

    /**
     * Returns value of 'stBestHeroInfo' property
     *
     * @return BESTHEROINFO
     */
    public function getStBestHeroInfo()
    {
        return $this->get(self::STBESTHEROINFO);
    }
}

/**
 * ACTIVITY_RECORD message
 */
class ACTIVITYRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const STRECHARGECOSTACTRECORDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRECHARGECOSTACTRECORDS => array(
            'name' => 'stRechargeCostActRecords',
            'repeated' => true,
            'type' => 'ONEACTIVITYRECORD'
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
        $this->values[self::STRECHARGECOSTACTRECORDS] = array();
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
     * Appends value to 'stRechargeCostActRecords' list
     *
     * @param ONEACTIVITYRECORD $value Value to append
     *
     * @return null
     */
    public function appendStRechargeCostActRecords(ONEACTIVITYRECORD $value)
    {
        return $this->append(self::STRECHARGECOSTACTRECORDS, $value);
    }

    /**
     * Clears 'stRechargeCostActRecords' list
     *
     * @return null
     */
    public function clearStRechargeCostActRecords()
    {
        return $this->clear(self::STRECHARGECOSTACTRECORDS);
    }

    /**
     * Returns 'stRechargeCostActRecords' list
     *
     * @return ONEACTIVITYRECORD[]
     */
    public function getStRechargeCostActRecords()
    {
        return $this->get(self::STRECHARGECOSTACTRECORDS);
    }

    /**
     * Returns 'stRechargeCostActRecords' iterator
     *
     * @return ArrayIterator
     */
    public function getStRechargeCostActRecordsIterator()
    {
        return new \ArrayIterator($this->get(self::STRECHARGECOSTACTRECORDS));
    }

    /**
     * Returns element from 'stRechargeCostActRecords' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONEACTIVITYRECORD
     */
    public function getStRechargeCostActRecordsAt($offset)
    {
        return $this->get(self::STRECHARGECOSTACTRECORDS, $offset);
    }

    /**
     * Returns count of 'stRechargeCostActRecords' list
     *
     * @return int
     */
    public function getStRechargeCostActRecordsCount()
    {
        return $this->count(self::STRECHARGECOSTACTRECORDS);
    }
}

/**
 * ACTIVITY_INFO message
 */
class ACTIVITYINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IBATCHID = 1;
    const ICONDITONTYPE = 2;
    const IREWARDPARAM = 3;
    const ICURTIME = 4;
    const IPARAMA = 5;
    const IPARAMB = 6;
    const IPARAMC = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBATCHID => array(
            'name' => 'iBatchId',
            'required' => false,
            'type' => 5,
        ),
        self::ICONDITONTYPE => array(
            'name' => 'iConditonType',
            'required' => false,
            'type' => 5,
        ),
        self::IREWARDPARAM => array(
            'name' => 'iRewardParam',
            'required' => false,
            'type' => 5,
        ),
        self::ICURTIME => array(
            'name' => 'iCurTime',
            'required' => false,
            'type' => 5,
        ),
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
        self::IPARAMC => array(
            'name' => 'iParamC',
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
        $this->values[self::IBATCHID] = null;
        $this->values[self::ICONDITONTYPE] = null;
        $this->values[self::IREWARDPARAM] = null;
        $this->values[self::ICURTIME] = null;
        $this->values[self::IPARAMA] = null;
        $this->values[self::IPARAMB] = null;
        $this->values[self::IPARAMC] = null;
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
     * Sets value of 'iBatchId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBatchId($value)
    {
        return $this->set(self::IBATCHID, $value);
    }

    /**
     * Returns value of 'iBatchId' property
     *
     * @return int
     */
    public function getIBatchId()
    {
        return $this->get(self::IBATCHID);
    }

    /**
     * Sets value of 'iConditonType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIConditonType($value)
    {
        return $this->set(self::ICONDITONTYPE, $value);
    }

    /**
     * Returns value of 'iConditonType' property
     *
     * @return int
     */
    public function getIConditonType()
    {
        return $this->get(self::ICONDITONTYPE);
    }

    /**
     * Sets value of 'iRewardParam' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardParam($value)
    {
        return $this->set(self::IREWARDPARAM, $value);
    }

    /**
     * Returns value of 'iRewardParam' property
     *
     * @return int
     */
    public function getIRewardParam()
    {
        return $this->get(self::IREWARDPARAM);
    }

    /**
     * Sets value of 'iCurTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurTime($value)
    {
        return $this->set(self::ICURTIME, $value);
    }

    /**
     * Returns value of 'iCurTime' property
     *
     * @return int
     */
    public function getICurTime()
    {
        return $this->get(self::ICURTIME);
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

    /**
     * Sets value of 'iParamC' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIParamC($value)
    {
        return $this->set(self::IPARAMC, $value);
    }

    /**
     * Returns value of 'iParamC' property
     *
     * @return int
     */
    public function getIParamC()
    {
        return $this->get(self::IPARAMC);
    }
}

/**
 * ALL_ACTIVITY_INFO message
 */
class ALLACTIVITYINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STACTIVITYLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STACTIVITYLIST => array(
            'name' => 'stActivityList',
            'repeated' => true,
            'type' => 'ACTIVITYINFO'
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
     * @param ACTIVITYINFO $value Value to append
     *
     * @return null
     */
    public function appendStActivityList(ACTIVITYINFO $value)
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
     * @return ACTIVITYINFO[]
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
     * @return ACTIVITYINFO
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
 * ALL_RECHARGE_RECORD message
 */
class ALLRECHARGERECORD extends \ProtobufMessage
{
    /* Field index constants */
    const STRECHARGERECORDS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRECHARGERECORDS => array(
            'name' => 'stRechargeRecords',
            'repeated' => true,
            'type' => 'RECHARGERECORD'
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
        $this->values[self::STRECHARGERECORDS] = array();
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
     * Appends value to 'stRechargeRecords' list
     *
     * @param RECHARGERECORD $value Value to append
     *
     * @return null
     */
    public function appendStRechargeRecords(RECHARGERECORD $value)
    {
        return $this->append(self::STRECHARGERECORDS, $value);
    }

    /**
     * Clears 'stRechargeRecords' list
     *
     * @return null
     */
    public function clearStRechargeRecords()
    {
        return $this->clear(self::STRECHARGERECORDS);
    }

    /**
     * Returns 'stRechargeRecords' list
     *
     * @return RECHARGERECORD[]
     */
    public function getStRechargeRecords()
    {
        return $this->get(self::STRECHARGERECORDS);
    }

    /**
     * Returns 'stRechargeRecords' iterator
     *
     * @return ArrayIterator
     */
    public function getStRechargeRecordsIterator()
    {
        return new \ArrayIterator($this->get(self::STRECHARGERECORDS));
    }

    /**
     * Returns element from 'stRechargeRecords' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return RECHARGERECORD
     */
    public function getStRechargeRecordsAt($offset)
    {
        return $this->get(self::STRECHARGERECORDS, $offset);
    }

    /**
     * Returns count of 'stRechargeRecords' list
     *
     * @return int
     */
    public function getStRechargeRecordsCount()
    {
        return $this->count(self::STRECHARGERECORDS);
    }
}

/**
 * RRCHARGEINFO message
 */
class RRCHARGEINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IRECHARGETAMT = 1;
    const STRECHARGERECORD = 2;
    const STGROWPLAN = 3;
    const STACTIVITYRECORDS = 4;
    const STALLACTINFOS = 5;
    const STALLRECHARGERECORD = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IRECHARGETAMT => array(
            'name' => 'iRechargetamt',
            'required' => false,
            'type' => 5,
        ),
        self::STRECHARGERECORD => array(
            'name' => 'stRechargeRecord',
            'repeated' => true,
            'type' => 'ONERECHARGEINFO'
        ),
        self::STGROWPLAN => array(
            'name' => 'stGrowPlan',
            'required' => false,
            'type' => 'GrowPlan'
        ),
        self::STACTIVITYRECORDS => array(
            'name' => 'stActivityRecords',
            'required' => false,
            'type' => 'ACTIVITYRECORD'
        ),
        self::STALLACTINFOS => array(
            'name' => 'stAllActInfos',
            'required' => false,
            'type' => 'ALLACTIVITYINFO'
        ),
        self::STALLRECHARGERECORD => array(
            'name' => 'stAllRechargeRecord',
            'required' => false,
            'type' => 'ALLRECHARGERECORD'
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
        $this->values[self::IRECHARGETAMT] = null;
        $this->values[self::STRECHARGERECORD] = array();
        $this->values[self::STGROWPLAN] = null;
        $this->values[self::STACTIVITYRECORDS] = null;
        $this->values[self::STALLACTINFOS] = null;
        $this->values[self::STALLRECHARGERECORD] = null;
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
     * Sets value of 'iRechargetamt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRechargetamt($value)
    {
        return $this->set(self::IRECHARGETAMT, $value);
    }

    /**
     * Returns value of 'iRechargetamt' property
     *
     * @return int
     */
    public function getIRechargetamt()
    {
        return $this->get(self::IRECHARGETAMT);
    }

    /**
     * Appends value to 'stRechargeRecord' list
     *
     * @param ONERECHARGEINFO $value Value to append
     *
     * @return null
     */
    public function appendStRechargeRecord(ONERECHARGEINFO $value)
    {
        return $this->append(self::STRECHARGERECORD, $value);
    }

    /**
     * Clears 'stRechargeRecord' list
     *
     * @return null
     */
    public function clearStRechargeRecord()
    {
        return $this->clear(self::STRECHARGERECORD);
    }

    /**
     * Returns 'stRechargeRecord' list
     *
     * @return ONERECHARGEINFO[]
     */
    public function getStRechargeRecord()
    {
        return $this->get(self::STRECHARGERECORD);
    }

    /**
     * Returns 'stRechargeRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStRechargeRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STRECHARGERECORD));
    }

    /**
     * Returns element from 'stRechargeRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONERECHARGEINFO
     */
    public function getStRechargeRecordAt($offset)
    {
        return $this->get(self::STRECHARGERECORD, $offset);
    }

    /**
     * Returns count of 'stRechargeRecord' list
     *
     * @return int
     */
    public function getStRechargeRecordCount()
    {
        return $this->count(self::STRECHARGERECORD);
    }

    /**
     * Sets value of 'stGrowPlan' property
     *
     * @param GrowPlan $value Property value
     *
     * @return null
     */
    public function setStGrowPlan(GrowPlan $value)
    {
        return $this->set(self::STGROWPLAN, $value);
    }

    /**
     * Returns value of 'stGrowPlan' property
     *
     * @return GrowPlan
     */
    public function getStGrowPlan()
    {
        return $this->get(self::STGROWPLAN);
    }

    /**
     * Sets value of 'stActivityRecords' property
     *
     * @param ACTIVITYRECORD $value Property value
     *
     * @return null
     */
    public function setStActivityRecords(ACTIVITYRECORD $value)
    {
        return $this->set(self::STACTIVITYRECORDS, $value);
    }

    /**
     * Returns value of 'stActivityRecords' property
     *
     * @return ACTIVITYRECORD
     */
    public function getStActivityRecords()
    {
        return $this->get(self::STACTIVITYRECORDS);
    }

    /**
     * Sets value of 'stAllActInfos' property
     *
     * @param ALLACTIVITYINFO $value Property value
     *
     * @return null
     */
    public function setStAllActInfos(ALLACTIVITYINFO $value)
    {
        return $this->set(self::STALLACTINFOS, $value);
    }

    /**
     * Returns value of 'stAllActInfos' property
     *
     * @return ALLACTIVITYINFO
     */
    public function getStAllActInfos()
    {
        return $this->get(self::STALLACTINFOS);
    }

    /**
     * Sets value of 'stAllRechargeRecord' property
     *
     * @param ALLRECHARGERECORD $value Property value
     *
     * @return null
     */
    public function setStAllRechargeRecord(ALLRECHARGERECORD $value)
    {
        return $this->set(self::STALLRECHARGERECORD, $value);
    }

    /**
     * Returns value of 'stAllRechargeRecord' property
     *
     * @return ALLRECHARGERECORD
     */
    public function getStAllRechargeRecord()
    {
        return $this->get(self::STALLRECHARGERECORD);
    }
}

/**
 * HANDBOOK message
 */
class HANDBOOK extends \ProtobufMessage
{
    /* Field index constants */
    const STHEROIDLIST = 1;
    const STEQUIPIDLIST = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STHEROIDLIST => array(
            'name' => 'stHeroIdList',
            'repeated' => true,
            'type' => 5,
        ),
        self::STEQUIPIDLIST => array(
            'name' => 'stEquipIdList',
            'repeated' => true,
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
        $this->values[self::STHEROIDLIST] = array();
        $this->values[self::STEQUIPIDLIST] = array();
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
     * Appends value to 'stHeroIdList' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStHeroIdList($value)
    {
        return $this->append(self::STHEROIDLIST, $value);
    }

    /**
     * Clears 'stHeroIdList' list
     *
     * @return null
     */
    public function clearStHeroIdList()
    {
        return $this->clear(self::STHEROIDLIST);
    }

    /**
     * Returns 'stHeroIdList' list
     *
     * @return int[]
     */
    public function getStHeroIdList()
    {
        return $this->get(self::STHEROIDLIST);
    }

    /**
     * Returns 'stHeroIdList' iterator
     *
     * @return ArrayIterator
     */
    public function getStHeroIdListIterator()
    {
        return new \ArrayIterator($this->get(self::STHEROIDLIST));
    }

    /**
     * Returns element from 'stHeroIdList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStHeroIdListAt($offset)
    {
        return $this->get(self::STHEROIDLIST, $offset);
    }

    /**
     * Returns count of 'stHeroIdList' list
     *
     * @return int
     */
    public function getStHeroIdListCount()
    {
        return $this->count(self::STHEROIDLIST);
    }

    /**
     * Appends value to 'stEquipIdList' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStEquipIdList($value)
    {
        return $this->append(self::STEQUIPIDLIST, $value);
    }

    /**
     * Clears 'stEquipIdList' list
     *
     * @return null
     */
    public function clearStEquipIdList()
    {
        return $this->clear(self::STEQUIPIDLIST);
    }

    /**
     * Returns 'stEquipIdList' list
     *
     * @return int[]
     */
    public function getStEquipIdList()
    {
        return $this->get(self::STEQUIPIDLIST);
    }

    /**
     * Returns 'stEquipIdList' iterator
     *
     * @return ArrayIterator
     */
    public function getStEquipIdListIterator()
    {
        return new \ArrayIterator($this->get(self::STEQUIPIDLIST));
    }

    /**
     * Returns element from 'stEquipIdList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStEquipIdListAt($offset)
    {
        return $this->get(self::STEQUIPIDLIST, $offset);
    }

    /**
     * Returns count of 'stEquipIdList' list
     *
     * @return int
     */
    public function getStEquipIdListCount()
    {
        return $this->count(self::STEQUIPIDLIST);
    }
}

/**
 * TALENTINFO message
 */
class TALENTINFO extends \ProtobufMessage
{
    /* Field index constants */
    const ICURTANLENTID = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICURTANLENTID => array(
            'name' => 'iCurTanlentId',
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
        $this->values[self::ICURTANLENTID] = null;
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
     * Sets value of 'iCurTanlentId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurTanlentId($value)
    {
        return $this->set(self::ICURTANLENTID, $value);
    }

    /**
     * Returns value of 'iCurTanlentId' property
     *
     * @return int
     */
    public function getICurTanlentId()
    {
        return $this->get(self::ICURTANLENTID);
    }
}

/**
 * TAILORMATRIAL message
 */
class TAILORMATRIAL extends \ProtobufMessage
{
    /* Field index constants */
    const IMATRIALID = 1;
    const IMATRIALNUM = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IMATRIALID => array(
            'name' => 'iMatrialId',
            'required' => false,
            'type' => 5,
        ),
        self::IMATRIALNUM => array(
            'name' => 'iMatrialNum',
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
        $this->values[self::IMATRIALID] = null;
        $this->values[self::IMATRIALNUM] = null;
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
     * Sets value of 'iMatrialId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMatrialId($value)
    {
        return $this->set(self::IMATRIALID, $value);
    }

    /**
     * Returns value of 'iMatrialId' property
     *
     * @return int
     */
    public function getIMatrialId()
    {
        return $this->get(self::IMATRIALID);
    }

    /**
     * Sets value of 'iMatrialNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMatrialNum($value)
    {
        return $this->set(self::IMATRIALNUM, $value);
    }

    /**
     * Returns value of 'iMatrialNum' property
     *
     * @return int
     */
    public function getIMatrialNum()
    {
        return $this->get(self::IMATRIALNUM);
    }
}

/**
 * ONETAILORREWARD message
 */
class ONETAILORREWARD extends \ProtobufMessage
{
    /* Field index constants */
    const ISCORE = 1;
    const IDROPTYPE = 2;
    const IDROPID = 3;
    const IDROPAMT = 4;
    const IREWARDTAG = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISCORE => array(
            'name' => 'iScore',
            'required' => false,
            'type' => 5,
        ),
        self::IDROPTYPE => array(
            'name' => 'iDropType',
            'required' => false,
            'type' => 5,
        ),
        self::IDROPID => array(
            'name' => 'iDropID',
            'required' => false,
            'type' => 5,
        ),
        self::IDROPAMT => array(
            'name' => 'iDropAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IREWARDTAG => array(
            'name' => 'iRewardTag',
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
        $this->values[self::ISCORE] = null;
        $this->values[self::IDROPTYPE] = null;
        $this->values[self::IDROPID] = null;
        $this->values[self::IDROPAMT] = null;
        $this->values[self::IREWARDTAG] = null;
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
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
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
     * Sets value of 'iDropID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropID($value)
    {
        return $this->set(self::IDROPID, $value);
    }

    /**
     * Returns value of 'iDropID' property
     *
     * @return int
     */
    public function getIDropID()
    {
        return $this->get(self::IDROPID);
    }

    /**
     * Sets value of 'iDropAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDropAmt($value)
    {
        return $this->set(self::IDROPAMT, $value);
    }

    /**
     * Returns value of 'iDropAmt' property
     *
     * @return int
     */
    public function getIDropAmt()
    {
        return $this->get(self::IDROPAMT);
    }

    /**
     * Sets value of 'iRewardTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardTag($value)
    {
        return $this->set(self::IREWARDTAG, $value);
    }

    /**
     * Returns value of 'iRewardTag' property
     *
     * @return int
     */
    public function getIRewardTag()
    {
        return $this->get(self::IREWARDTAG);
    }
}

/**
 * TAILORREWARD message
 */
class TAILORREWARD extends \ProtobufMessage
{
    /* Field index constants */
    const STREWARD = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STREWARD => array(
            'name' => 'stReward',
            'repeated' => true,
            'type' => 'ONETAILORREWARD'
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
        $this->values[self::STREWARD] = array();
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
     * Appends value to 'stReward' list
     *
     * @param ONETAILORREWARD $value Value to append
     *
     * @return null
     */
    public function appendStReward(ONETAILORREWARD $value)
    {
        return $this->append(self::STREWARD, $value);
    }

    /**
     * Clears 'stReward' list
     *
     * @return null
     */
    public function clearStReward()
    {
        return $this->clear(self::STREWARD);
    }

    /**
     * Returns 'stReward' list
     *
     * @return ONETAILORREWARD[]
     */
    public function getStReward()
    {
        return $this->get(self::STREWARD);
    }

    /**
     * Returns 'stReward' iterator
     *
     * @return ArrayIterator
     */
    public function getStRewardIterator()
    {
        return new \ArrayIterator($this->get(self::STREWARD));
    }

    /**
     * Returns element from 'stReward' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ONETAILORREWARD
     */
    public function getStRewardAt($offset)
    {
        return $this->get(self::STREWARD, $offset);
    }

    /**
     * Returns count of 'stReward' list
     *
     * @return int
     */
    public function getStRewardCount()
    {
        return $this->count(self::STREWARD);
    }
}

/**
 * TAILORBLUEPRINT message
 */
class TAILORBLUEPRINT extends \ProtobufMessage
{
    /* Field index constants */
    const STBLUEPRINTMATRIALS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STBLUEPRINTMATRIALS => array(
            'name' => 'stBluePrintMatrials',
            'repeated' => true,
            'type' => 'TAILORMATRIAL'
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
        $this->values[self::STBLUEPRINTMATRIALS] = array();
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
     * Appends value to 'stBluePrintMatrials' list
     *
     * @param TAILORMATRIAL $value Value to append
     *
     * @return null
     */
    public function appendStBluePrintMatrials(TAILORMATRIAL $value)
    {
        return $this->append(self::STBLUEPRINTMATRIALS, $value);
    }

    /**
     * Clears 'stBluePrintMatrials' list
     *
     * @return null
     */
    public function clearStBluePrintMatrials()
    {
        return $this->clear(self::STBLUEPRINTMATRIALS);
    }

    /**
     * Returns 'stBluePrintMatrials' list
     *
     * @return TAILORMATRIAL[]
     */
    public function getStBluePrintMatrials()
    {
        return $this->get(self::STBLUEPRINTMATRIALS);
    }

    /**
     * Returns 'stBluePrintMatrials' iterator
     *
     * @return ArrayIterator
     */
    public function getStBluePrintMatrialsIterator()
    {
        return new \ArrayIterator($this->get(self::STBLUEPRINTMATRIALS));
    }

    /**
     * Returns element from 'stBluePrintMatrials' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return TAILORMATRIAL
     */
    public function getStBluePrintMatrialsAt($offset)
    {
        return $this->get(self::STBLUEPRINTMATRIALS, $offset);
    }

    /**
     * Returns count of 'stBluePrintMatrials' list
     *
     * @return int
     */
    public function getStBluePrintMatrialsCount()
    {
        return $this->count(self::STBLUEPRINTMATRIALS);
    }
}

/**
 * TAILORINFO message
 */
class TAILORINFO extends \ProtobufMessage
{
    /* Field index constants */
    const ISCORE = 1;
    const IBLUEPRINTNUM = 2;
    const IGETMATRIALNUM = 3;
    const STTAILORBLUEPRINT = 4;
    const STMATRIALS = 5;
    const STTAILORREWARD = 6;
    const ILUCKYPOINT = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISCORE => array(
            'name' => 'iScore',
            'required' => false,
            'type' => 5,
        ),
        self::IBLUEPRINTNUM => array(
            'name' => 'iBluePrintNum',
            'required' => false,
            'type' => 5,
        ),
        self::IGETMATRIALNUM => array(
            'name' => 'iGetMatrialNum',
            'required' => false,
            'type' => 5,
        ),
        self::STTAILORBLUEPRINT => array(
            'name' => 'stTailorBluePrint',
            'required' => false,
            'type' => 'TAILORBLUEPRINT'
        ),
        self::STMATRIALS => array(
            'name' => 'stMatrials',
            'repeated' => true,
            'type' => 'TAILORMATRIAL'
        ),
        self::STTAILORREWARD => array(
            'name' => 'stTailorReward',
            'required' => false,
            'type' => 'TAILORREWARD'
        ),
        self::ILUCKYPOINT => array(
            'name' => 'iLuckyPoint',
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
        $this->values[self::ISCORE] = null;
        $this->values[self::IBLUEPRINTNUM] = null;
        $this->values[self::IGETMATRIALNUM] = null;
        $this->values[self::STTAILORBLUEPRINT] = null;
        $this->values[self::STMATRIALS] = array();
        $this->values[self::STTAILORREWARD] = null;
        $this->values[self::ILUCKYPOINT] = null;
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
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
    }

    /**
     * Sets value of 'iBluePrintNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBluePrintNum($value)
    {
        return $this->set(self::IBLUEPRINTNUM, $value);
    }

    /**
     * Returns value of 'iBluePrintNum' property
     *
     * @return int
     */
    public function getIBluePrintNum()
    {
        return $this->get(self::IBLUEPRINTNUM);
    }

    /**
     * Sets value of 'iGetMatrialNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGetMatrialNum($value)
    {
        return $this->set(self::IGETMATRIALNUM, $value);
    }

    /**
     * Returns value of 'iGetMatrialNum' property
     *
     * @return int
     */
    public function getIGetMatrialNum()
    {
        return $this->get(self::IGETMATRIALNUM);
    }

    /**
     * Sets value of 'stTailorBluePrint' property
     *
     * @param TAILORBLUEPRINT $value Property value
     *
     * @return null
     */
    public function setStTailorBluePrint(TAILORBLUEPRINT $value)
    {
        return $this->set(self::STTAILORBLUEPRINT, $value);
    }

    /**
     * Returns value of 'stTailorBluePrint' property
     *
     * @return TAILORBLUEPRINT
     */
    public function getStTailorBluePrint()
    {
        return $this->get(self::STTAILORBLUEPRINT);
    }

    /**
     * Appends value to 'stMatrials' list
     *
     * @param TAILORMATRIAL $value Value to append
     *
     * @return null
     */
    public function appendStMatrials(TAILORMATRIAL $value)
    {
        return $this->append(self::STMATRIALS, $value);
    }

    /**
     * Clears 'stMatrials' list
     *
     * @return null
     */
    public function clearStMatrials()
    {
        return $this->clear(self::STMATRIALS);
    }

    /**
     * Returns 'stMatrials' list
     *
     * @return TAILORMATRIAL[]
     */
    public function getStMatrials()
    {
        return $this->get(self::STMATRIALS);
    }

    /**
     * Returns 'stMatrials' iterator
     *
     * @return ArrayIterator
     */
    public function getStMatrialsIterator()
    {
        return new \ArrayIterator($this->get(self::STMATRIALS));
    }

    /**
     * Returns element from 'stMatrials' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return TAILORMATRIAL
     */
    public function getStMatrialsAt($offset)
    {
        return $this->get(self::STMATRIALS, $offset);
    }

    /**
     * Returns count of 'stMatrials' list
     *
     * @return int
     */
    public function getStMatrialsCount()
    {
        return $this->count(self::STMATRIALS);
    }

    /**
     * Sets value of 'stTailorReward' property
     *
     * @param TAILORREWARD $value Property value
     *
     * @return null
     */
    public function setStTailorReward(TAILORREWARD $value)
    {
        return $this->set(self::STTAILORREWARD, $value);
    }

    /**
     * Returns value of 'stTailorReward' property
     *
     * @return TAILORREWARD
     */
    public function getStTailorReward()
    {
        return $this->get(self::STTAILORREWARD);
    }

    /**
     * Sets value of 'iLuckyPoint' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILuckyPoint($value)
    {
        return $this->set(self::ILUCKYPOINT, $value);
    }

    /**
     * Returns value of 'iLuckyPoint' property
     *
     * @return int
     */
    public function getILuckyPoint()
    {
        return $this->get(self::ILUCKYPOINT);
    }
}

/**
 * TowerLayer message
 */
class TowerLayer extends \ProtobufMessage
{
    /* Field index constants */
    const ILAYER = 1;
    const ICROSSID = 2;
    const ICOUNT = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ILAYER => array(
            'name' => 'iLayer',
            'required' => false,
            'type' => 5,
        ),
        self::ICROSSID => array(
            'name' => 'iCrossid',
            'required' => false,
            'type' => 5,
        ),
        self::ICOUNT => array(
            'name' => 'iCount',
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
        $this->values[self::ILAYER] = null;
        $this->values[self::ICROSSID] = null;
        $this->values[self::ICOUNT] = null;
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
     * Sets value of 'iLayer' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILayer($value)
    {
        return $this->set(self::ILAYER, $value);
    }

    /**
     * Returns value of 'iLayer' property
     *
     * @return int
     */
    public function getILayer()
    {
        return $this->get(self::ILAYER);
    }

    /**
     * Sets value of 'iCrossid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICrossid($value)
    {
        return $this->set(self::ICROSSID, $value);
    }

    /**
     * Returns value of 'iCrossid' property
     *
     * @return int
     */
    public function getICrossid()
    {
        return $this->get(self::ICROSSID);
    }

    /**
     * Sets value of 'iCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICount($value)
    {
        return $this->set(self::ICOUNT, $value);
    }

    /**
     * Returns value of 'iCount' property
     *
     * @return int
     */
    public function getICount()
    {
        return $this->get(self::ICOUNT);
    }
}

/**
 * TowerAward message
 */
class TowerAward extends \ProtobufMessage
{
    /* Field index constants */
    const IBOXID = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBOXID => array(
            'name' => 'iBoxid',
            'repeated' => true,
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
        $this->values[self::IBOXID] = array();
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
     * Appends value to 'iBoxid' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIBoxid($value)
    {
        return $this->append(self::IBOXID, $value);
    }

    /**
     * Clears 'iBoxid' list
     *
     * @return null
     */
    public function clearIBoxid()
    {
        return $this->clear(self::IBOXID);
    }

    /**
     * Returns 'iBoxid' list
     *
     * @return int[]
     */
    public function getIBoxid()
    {
        return $this->get(self::IBOXID);
    }

    /**
     * Returns 'iBoxid' iterator
     *
     * @return ArrayIterator
     */
    public function getIBoxidIterator()
    {
        return new \ArrayIterator($this->get(self::IBOXID));
    }

    /**
     * Returns element from 'iBoxid' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIBoxidAt($offset)
    {
        return $this->get(self::IBOXID, $offset);
    }

    /**
     * Returns count of 'iBoxid' list
     *
     * @return int
     */
    public function getIBoxidCount()
    {
        return $this->count(self::IBOXID);
    }
}

/**
 * ConqTowerInfo message
 */
class ConqTowerInfo extends \ProtobufMessage
{
    /* Field index constants */
    const ICURLAYER = 1;
    const ISWEEPTIME = 2;
    const IMAXSWEEPLAYER = 3;
    const IRESETCOUNT = 4;
    const IBUYCOUNT = 5;
    const STSPECIALLAYER = 6;
    const STLAYER = 7;
    const STTOWERAWARD = 8;
    const IBUYRESETCOUNT = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICURLAYER => array(
            'name' => 'iCurLayer',
            'required' => false,
            'type' => 5,
        ),
        self::ISWEEPTIME => array(
            'name' => 'iSweepTime',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXSWEEPLAYER => array(
            'name' => 'iMaxSweepLayer',
            'required' => false,
            'type' => 5,
        ),
        self::IRESETCOUNT => array(
            'name' => 'iResetCount',
            'required' => false,
            'type' => 5,
        ),
        self::IBUYCOUNT => array(
            'name' => 'iBuyCount',
            'required' => false,
            'type' => 5,
        ),
        self::STSPECIALLAYER => array(
            'name' => 'stSpecialLayer',
            'repeated' => true,
            'type' => 'SpecialLayer'
        ),
        self::STLAYER => array(
            'name' => 'stLayer',
            'repeated' => true,
            'type' => 'TowerLayer'
        ),
        self::STTOWERAWARD => array(
            'name' => 'stTowerAward',
            'required' => false,
            'type' => 'TowerAward'
        ),
        self::IBUYRESETCOUNT => array(
            'name' => 'iBuyResetCount',
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
        $this->values[self::ICURLAYER] = null;
        $this->values[self::ISWEEPTIME] = null;
        $this->values[self::IMAXSWEEPLAYER] = null;
        $this->values[self::IRESETCOUNT] = null;
        $this->values[self::IBUYCOUNT] = null;
        $this->values[self::STSPECIALLAYER] = array();
        $this->values[self::STLAYER] = array();
        $this->values[self::STTOWERAWARD] = null;
        $this->values[self::IBUYRESETCOUNT] = null;
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
     * Sets value of 'iCurLayer' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICurLayer($value)
    {
        return $this->set(self::ICURLAYER, $value);
    }

    /**
     * Returns value of 'iCurLayer' property
     *
     * @return int
     */
    public function getICurLayer()
    {
        return $this->get(self::ICURLAYER);
    }

    /**
     * Sets value of 'iSweepTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISweepTime($value)
    {
        return $this->set(self::ISWEEPTIME, $value);
    }

    /**
     * Returns value of 'iSweepTime' property
     *
     * @return int
     */
    public function getISweepTime()
    {
        return $this->get(self::ISWEEPTIME);
    }

    /**
     * Sets value of 'iMaxSweepLayer' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxSweepLayer($value)
    {
        return $this->set(self::IMAXSWEEPLAYER, $value);
    }

    /**
     * Returns value of 'iMaxSweepLayer' property
     *
     * @return int
     */
    public function getIMaxSweepLayer()
    {
        return $this->get(self::IMAXSWEEPLAYER);
    }

    /**
     * Sets value of 'iResetCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIResetCount($value)
    {
        return $this->set(self::IRESETCOUNT, $value);
    }

    /**
     * Returns value of 'iResetCount' property
     *
     * @return int
     */
    public function getIResetCount()
    {
        return $this->get(self::IRESETCOUNT);
    }

    /**
     * Sets value of 'iBuyCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyCount($value)
    {
        return $this->set(self::IBUYCOUNT, $value);
    }

    /**
     * Returns value of 'iBuyCount' property
     *
     * @return int
     */
    public function getIBuyCount()
    {
        return $this->get(self::IBUYCOUNT);
    }

    /**
     * Appends value to 'stSpecialLayer' list
     *
     * @param SpecialLayer $value Value to append
     *
     * @return null
     */
    public function appendStSpecialLayer(SpecialLayer $value)
    {
        return $this->append(self::STSPECIALLAYER, $value);
    }

    /**
     * Clears 'stSpecialLayer' list
     *
     * @return null
     */
    public function clearStSpecialLayer()
    {
        return $this->clear(self::STSPECIALLAYER);
    }

    /**
     * Returns 'stSpecialLayer' list
     *
     * @return SpecialLayer[]
     */
    public function getStSpecialLayer()
    {
        return $this->get(self::STSPECIALLAYER);
    }

    /**
     * Returns 'stSpecialLayer' iterator
     *
     * @return ArrayIterator
     */
    public function getStSpecialLayerIterator()
    {
        return new \ArrayIterator($this->get(self::STSPECIALLAYER));
    }

    /**
     * Returns element from 'stSpecialLayer' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SpecialLayer
     */
    public function getStSpecialLayerAt($offset)
    {
        return $this->get(self::STSPECIALLAYER, $offset);
    }

    /**
     * Returns count of 'stSpecialLayer' list
     *
     * @return int
     */
    public function getStSpecialLayerCount()
    {
        return $this->count(self::STSPECIALLAYER);
    }

    /**
     * Appends value to 'stLayer' list
     *
     * @param TowerLayer $value Value to append
     *
     * @return null
     */
    public function appendStLayer(TowerLayer $value)
    {
        return $this->append(self::STLAYER, $value);
    }

    /**
     * Clears 'stLayer' list
     *
     * @return null
     */
    public function clearStLayer()
    {
        return $this->clear(self::STLAYER);
    }

    /**
     * Returns 'stLayer' list
     *
     * @return TowerLayer[]
     */
    public function getStLayer()
    {
        return $this->get(self::STLAYER);
    }

    /**
     * Returns 'stLayer' iterator
     *
     * @return ArrayIterator
     */
    public function getStLayerIterator()
    {
        return new \ArrayIterator($this->get(self::STLAYER));
    }

    /**
     * Returns element from 'stLayer' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return TowerLayer
     */
    public function getStLayerAt($offset)
    {
        return $this->get(self::STLAYER, $offset);
    }

    /**
     * Returns count of 'stLayer' list
     *
     * @return int
     */
    public function getStLayerCount()
    {
        return $this->count(self::STLAYER);
    }

    /**
     * Sets value of 'stTowerAward' property
     *
     * @param TowerAward $value Property value
     *
     * @return null
     */
    public function setStTowerAward(TowerAward $value)
    {
        return $this->set(self::STTOWERAWARD, $value);
    }

    /**
     * Returns value of 'stTowerAward' property
     *
     * @return TowerAward
     */
    public function getStTowerAward()
    {
        return $this->get(self::STTOWERAWARD);
    }

    /**
     * Sets value of 'iBuyResetCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBuyResetCount($value)
    {
        return $this->set(self::IBUYRESETCOUNT, $value);
    }

    /**
     * Returns value of 'iBuyResetCount' property
     *
     * @return int
     */
    public function getIBuyResetCount()
    {
        return $this->get(self::IBUYRESETCOUNT);
    }
}

/**
 * TalkInfo message
 */
class TalkInfo extends \ProtobufMessage
{
    /* Field index constants */
    const ICHANNAL = 1;
    const STRSENDERNAME = 2;
    const ISENDERPIC = 3;
    const ISENDERLV = 4;
    const ISENDERID = 5;
    const STRRECIEVERNAME = 6;
    const IRECIEVERID = 7;
    const STRMSG = 8;
    const ISENDTIME = 9;
    const ISENDERTALENT = 10;
    const IRECIEVERTALENT = 11;
    const ISENDERVIP = 12;
    const IRECIEVERVIP = 13;
    const ISOUNDID = 14;
    const ISOUNDTIME = 15;
    const IISREAD = 16;
    const STRHTTP = 17;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICHANNAL => array(
            'name' => 'iChannal',
            'required' => false,
            'type' => 5,
        ),
        self::STRSENDERNAME => array(
            'name' => 'strSenderName',
            'required' => false,
            'type' => 7,
        ),
        self::ISENDERPIC => array(
            'name' => 'iSenderPic',
            'required' => false,
            'type' => 5,
        ),
        self::ISENDERLV => array(
            'name' => 'iSenderLv',
            'required' => false,
            'type' => 5,
        ),
        self::ISENDERID => array(
            'name' => 'iSenderId',
            'required' => false,
            'type' => 5,
        ),
        self::STRRECIEVERNAME => array(
            'name' => 'strRecieverName',
            'required' => false,
            'type' => 7,
        ),
        self::IRECIEVERID => array(
            'name' => 'iRecieverId',
            'required' => false,
            'type' => 5,
        ),
        self::STRMSG => array(
            'name' => 'strMsg',
            'required' => false,
            'type' => 7,
        ),
        self::ISENDTIME => array(
            'name' => 'iSendTime',
            'required' => false,
            'type' => 5,
        ),
        self::ISENDERTALENT => array(
            'name' => 'iSenderTalent',
            'required' => false,
            'type' => 5,
        ),
        self::IRECIEVERTALENT => array(
            'name' => 'iRecieverTalent',
            'required' => false,
            'type' => 5,
        ),
        self::ISENDERVIP => array(
            'name' => 'iSenderVip',
            'required' => false,
            'type' => 5,
        ),
        self::IRECIEVERVIP => array(
            'name' => 'iRecieverVip',
            'required' => false,
            'type' => 5,
        ),
        self::ISOUNDID => array(
            'name' => 'iSoundid',
            'required' => false,
            'type' => 5,
        ),
        self::ISOUNDTIME => array(
            'name' => 'iSoundTime',
            'required' => false,
            'type' => 5,
        ),
        self::IISREAD => array(
            'name' => 'iIsRead',
            'required' => false,
            'type' => 5,
        ),
        self::STRHTTP => array(
            'name' => 'strHttp',
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
        $this->values[self::ICHANNAL] = null;
        $this->values[self::STRSENDERNAME] = null;
        $this->values[self::ISENDERPIC] = null;
        $this->values[self::ISENDERLV] = null;
        $this->values[self::ISENDERID] = null;
        $this->values[self::STRRECIEVERNAME] = null;
        $this->values[self::IRECIEVERID] = null;
        $this->values[self::STRMSG] = null;
        $this->values[self::ISENDTIME] = null;
        $this->values[self::ISENDERTALENT] = null;
        $this->values[self::IRECIEVERTALENT] = null;
        $this->values[self::ISENDERVIP] = null;
        $this->values[self::IRECIEVERVIP] = null;
        $this->values[self::ISOUNDID] = null;
        $this->values[self::ISOUNDTIME] = null;
        $this->values[self::IISREAD] = null;
        $this->values[self::STRHTTP] = null;
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
     * Sets value of 'iChannal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIChannal($value)
    {
        return $this->set(self::ICHANNAL, $value);
    }

    /**
     * Returns value of 'iChannal' property
     *
     * @return int
     */
    public function getIChannal()
    {
        return $this->get(self::ICHANNAL);
    }

    /**
     * Sets value of 'strSenderName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrSenderName($value)
    {
        return $this->set(self::STRSENDERNAME, $value);
    }

    /**
     * Returns value of 'strSenderName' property
     *
     * @return string
     */
    public function getStrSenderName()
    {
        return $this->get(self::STRSENDERNAME);
    }

    /**
     * Sets value of 'iSenderPic' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISenderPic($value)
    {
        return $this->set(self::ISENDERPIC, $value);
    }

    /**
     * Returns value of 'iSenderPic' property
     *
     * @return int
     */
    public function getISenderPic()
    {
        return $this->get(self::ISENDERPIC);
    }

    /**
     * Sets value of 'iSenderLv' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISenderLv($value)
    {
        return $this->set(self::ISENDERLV, $value);
    }

    /**
     * Returns value of 'iSenderLv' property
     *
     * @return int
     */
    public function getISenderLv()
    {
        return $this->get(self::ISENDERLV);
    }

    /**
     * Sets value of 'iSenderId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISenderId($value)
    {
        return $this->set(self::ISENDERID, $value);
    }

    /**
     * Returns value of 'iSenderId' property
     *
     * @return int
     */
    public function getISenderId()
    {
        return $this->get(self::ISENDERID);
    }

    /**
     * Sets value of 'strRecieverName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrRecieverName($value)
    {
        return $this->set(self::STRRECIEVERNAME, $value);
    }

    /**
     * Returns value of 'strRecieverName' property
     *
     * @return string
     */
    public function getStrRecieverName()
    {
        return $this->get(self::STRRECIEVERNAME);
    }

    /**
     * Sets value of 'iRecieverId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRecieverId($value)
    {
        return $this->set(self::IRECIEVERID, $value);
    }

    /**
     * Returns value of 'iRecieverId' property
     *
     * @return int
     */
    public function getIRecieverId()
    {
        return $this->get(self::IRECIEVERID);
    }

    /**
     * Sets value of 'strMsg' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrMsg($value)
    {
        return $this->set(self::STRMSG, $value);
    }

    /**
     * Returns value of 'strMsg' property
     *
     * @return string
     */
    public function getStrMsg()
    {
        return $this->get(self::STRMSG);
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
     * Sets value of 'iSenderTalent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISenderTalent($value)
    {
        return $this->set(self::ISENDERTALENT, $value);
    }

    /**
     * Returns value of 'iSenderTalent' property
     *
     * @return int
     */
    public function getISenderTalent()
    {
        return $this->get(self::ISENDERTALENT);
    }

    /**
     * Sets value of 'iRecieverTalent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRecieverTalent($value)
    {
        return $this->set(self::IRECIEVERTALENT, $value);
    }

    /**
     * Returns value of 'iRecieverTalent' property
     *
     * @return int
     */
    public function getIRecieverTalent()
    {
        return $this->get(self::IRECIEVERTALENT);
    }

    /**
     * Sets value of 'iSenderVip' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISenderVip($value)
    {
        return $this->set(self::ISENDERVIP, $value);
    }

    /**
     * Returns value of 'iSenderVip' property
     *
     * @return int
     */
    public function getISenderVip()
    {
        return $this->get(self::ISENDERVIP);
    }

    /**
     * Sets value of 'iRecieverVip' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRecieverVip($value)
    {
        return $this->set(self::IRECIEVERVIP, $value);
    }

    /**
     * Returns value of 'iRecieverVip' property
     *
     * @return int
     */
    public function getIRecieverVip()
    {
        return $this->get(self::IRECIEVERVIP);
    }

    /**
     * Sets value of 'iSoundid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISoundid($value)
    {
        return $this->set(self::ISOUNDID, $value);
    }

    /**
     * Returns value of 'iSoundid' property
     *
     * @return int
     */
    public function getISoundid()
    {
        return $this->get(self::ISOUNDID);
    }

    /**
     * Sets value of 'iSoundTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISoundTime($value)
    {
        return $this->set(self::ISOUNDTIME, $value);
    }

    /**
     * Returns value of 'iSoundTime' property
     *
     * @return int
     */
    public function getISoundTime()
    {
        return $this->get(self::ISOUNDTIME);
    }

    /**
     * Sets value of 'iIsRead' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIIsRead($value)
    {
        return $this->set(self::IISREAD, $value);
    }

    /**
     * Returns value of 'iIsRead' property
     *
     * @return int
     */
    public function getIIsRead()
    {
        return $this->get(self::IISREAD);
    }

    /**
     * Sets value of 'strHttp' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrHttp($value)
    {
        return $this->set(self::STRHTTP, $value);
    }

    /**
     * Returns value of 'strHttp' property
     *
     * @return string
     */
    public function getStrHttp()
    {
        return $this->get(self::STRHTTP);
    }
}

/**
 * SoundChat message
 */
class SoundChat extends \ProtobufMessage
{
    /* Field index constants */
    const ISOUNDID = 1;
    const STRSOUND = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISOUNDID => array(
            'name' => 'iSoundid',
            'required' => false,
            'type' => 5,
        ),
        self::STRSOUND => array(
            'name' => 'strSound',
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
        $this->values[self::ISOUNDID] = null;
        $this->values[self::STRSOUND] = null;
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
     * Sets value of 'iSoundid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setISoundid($value)
    {
        return $this->set(self::ISOUNDID, $value);
    }

    /**
     * Returns value of 'iSoundid' property
     *
     * @return int
     */
    public function getISoundid()
    {
        return $this->get(self::ISOUNDID);
    }

    /**
     * Sets value of 'strSound' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrSound($value)
    {
        return $this->set(self::STRSOUND, $value);
    }

    /**
     * Returns value of 'strSound' property
     *
     * @return string
     */
    public function getStrSound()
    {
        return $this->get(self::STRSOUND);
    }
}

/**
 * WorldChatMsg message
 */
class WorldChatMsg extends \ProtobufMessage
{
    /* Field index constants */
    const STINFO = 1;
    const STSOUND = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STINFO => array(
            'name' => 'stInfo',
            'required' => false,
            'type' => 'TalkInfo'
        ),
        self::STSOUND => array(
            'name' => 'stSound',
            'required' => false,
            'type' => 'SoundChat'
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
        $this->values[self::STINFO] = null;
        $this->values[self::STSOUND] = null;
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
     * Sets value of 'stInfo' property
     *
     * @param TalkInfo $value Property value
     *
     * @return null
     */
    public function setStInfo(TalkInfo $value)
    {
        return $this->set(self::STINFO, $value);
    }

    /**
     * Returns value of 'stInfo' property
     *
     * @return TalkInfo
     */
    public function getStInfo()
    {
        return $this->get(self::STINFO);
    }

    /**
     * Sets value of 'stSound' property
     *
     * @param SoundChat $value Property value
     *
     * @return null
     */
    public function setStSound(SoundChat $value)
    {
        return $this->set(self::STSOUND, $value);
    }

    /**
     * Returns value of 'stSound' property
     *
     * @return SoundChat
     */
    public function getStSound()
    {
        return $this->get(self::STSOUND);
    }
}

/**
 * TalkMsgList message
 */
class TalkMsgList extends \ProtobufMessage
{
    /* Field index constants */
    const STINFO = 1;
    const STRSOUND = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STINFO => array(
            'name' => 'stInfo',
            'repeated' => true,
            'type' => 'TalkInfo'
        ),
        self::STRSOUND => array(
            'name' => 'strSound',
            'repeated' => true,
            'type' => 'SoundChat'
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
        $this->values[self::STINFO] = array();
        $this->values[self::STRSOUND] = array();
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
     * Appends value to 'stInfo' list
     *
     * @param TalkInfo $value Value to append
     *
     * @return null
     */
    public function appendStInfo(TalkInfo $value)
    {
        return $this->append(self::STINFO, $value);
    }

    /**
     * Clears 'stInfo' list
     *
     * @return null
     */
    public function clearStInfo()
    {
        return $this->clear(self::STINFO);
    }

    /**
     * Returns 'stInfo' list
     *
     * @return TalkInfo[]
     */
    public function getStInfo()
    {
        return $this->get(self::STINFO);
    }

    /**
     * Returns 'stInfo' iterator
     *
     * @return ArrayIterator
     */
    public function getStInfoIterator()
    {
        return new \ArrayIterator($this->get(self::STINFO));
    }

    /**
     * Returns element from 'stInfo' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return TalkInfo
     */
    public function getStInfoAt($offset)
    {
        return $this->get(self::STINFO, $offset);
    }

    /**
     * Returns count of 'stInfo' list
     *
     * @return int
     */
    public function getStInfoCount()
    {
        return $this->count(self::STINFO);
    }

    /**
     * Appends value to 'strSound' list
     *
     * @param SoundChat $value Value to append
     *
     * @return null
     */
    public function appendStrSound(SoundChat $value)
    {
        return $this->append(self::STRSOUND, $value);
    }

    /**
     * Clears 'strSound' list
     *
     * @return null
     */
    public function clearStrSound()
    {
        return $this->clear(self::STRSOUND);
    }

    /**
     * Returns 'strSound' list
     *
     * @return SoundChat[]
     */
    public function getStrSound()
    {
        return $this->get(self::STRSOUND);
    }

    /**
     * Returns 'strSound' iterator
     *
     * @return ArrayIterator
     */
    public function getStrSoundIterator()
    {
        return new \ArrayIterator($this->get(self::STRSOUND));
    }

    /**
     * Returns element from 'strSound' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SoundChat
     */
    public function getStrSoundAt($offset)
    {
        return $this->get(self::STRSOUND, $offset);
    }

    /**
     * Returns count of 'strSound' list
     *
     * @return int
     */
    public function getStrSoundCount()
    {
        return $this->count(self::STRSOUND);
    }
}

/**
 * SinglePvpStoreInfo message
 */
class SinglePvpStoreInfo extends \ProtobufMessage
{
    /* Field index constants */
    const ISTOREID = 1;
    const IISBUY = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ISTOREID => array(
            'name' => 'iStoreid',
            'required' => false,
            'type' => 5,
        ),
        self::IISBUY => array(
            'name' => 'iIsBuy',
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
        $this->values[self::ISTOREID] = null;
        $this->values[self::IISBUY] = null;
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
     * Sets value of 'iStoreid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStoreid($value)
    {
        return $this->set(self::ISTOREID, $value);
    }

    /**
     * Returns value of 'iStoreid' property
     *
     * @return int
     */
    public function getIStoreid()
    {
        return $this->get(self::ISTOREID);
    }

    /**
     * Sets value of 'iIsBuy' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIIsBuy($value)
    {
        return $this->set(self::IISBUY, $value);
    }

    /**
     * Returns value of 'iIsBuy' property
     *
     * @return int
     */
    public function getIIsBuy()
    {
        return $this->get(self::IISBUY);
    }
}

/**
 * PvpStoreInfo message
 */
class PvpStoreInfo extends \ProtobufMessage
{
    /* Field index constants */
    const STINFO = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STINFO => array(
            'name' => 'stInfo',
            'repeated' => true,
            'type' => 'SinglePvpStoreInfo'
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
        $this->values[self::STINFO] = array();
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
     * Appends value to 'stInfo' list
     *
     * @param SinglePvpStoreInfo $value Value to append
     *
     * @return null
     */
    public function appendStInfo(SinglePvpStoreInfo $value)
    {
        return $this->append(self::STINFO, $value);
    }

    /**
     * Clears 'stInfo' list
     *
     * @return null
     */
    public function clearStInfo()
    {
        return $this->clear(self::STINFO);
    }

    /**
     * Returns 'stInfo' list
     *
     * @return SinglePvpStoreInfo[]
     */
    public function getStInfo()
    {
        return $this->get(self::STINFO);
    }

    /**
     * Returns 'stInfo' iterator
     *
     * @return ArrayIterator
     */
    public function getStInfoIterator()
    {
        return new \ArrayIterator($this->get(self::STINFO));
    }

    /**
     * Returns element from 'stInfo' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SinglePvpStoreInfo
     */
    public function getStInfoAt($offset)
    {
        return $this->get(self::STINFO, $offset);
    }

    /**
     * Returns count of 'stInfo' list
     *
     * @return int
     */
    public function getStInfoCount()
    {
        return $this->count(self::STINFO);
    }
}

/**
 * RESERVEDBINFO2 message
 */
class RESERVEDBINFO2 extends \ProtobufMessage
{
    /* Field index constants */
    const STRECHARGEINFO = 1;
    const STHANDBOOK = 2;
    const STTALENTINFO = 3;
    const STTAILORINFO = 4;
    const STCONQTOWER = 5;
    const STTALK = 6;
    const STPVPSTORE = 7;
    const STACHIEVEMENTINFO = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
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
        self::STTALENTINFO => array(
            'name' => 'stTalentInfo',
            'required' => false,
            'type' => 'TALENTINFO'
        ),
        self::STTAILORINFO => array(
            'name' => 'stTailorInfo',
            'required' => false,
            'type' => 'TAILORINFO'
        ),
        self::STCONQTOWER => array(
            'name' => 'stConqTower',
            'required' => false,
            'type' => 'ConqTowerInfo'
        ),
        self::STTALK => array(
            'name' => 'stTalk',
            'required' => false,
            'type' => 'TalkMsgList'
        ),
        self::STPVPSTORE => array(
            'name' => 'stPvpStore',
            'required' => false,
            'type' => 'PvpStoreInfo'
        ),
        self::STACHIEVEMENTINFO => array(
            'name' => 'stAchievementInfo',
            'required' => false,
            'type' => 'ACHIEVEMENTINFO'
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
        $this->values[self::STRECHARGEINFO] = null;
        $this->values[self::STHANDBOOK] = null;
        $this->values[self::STTALENTINFO] = null;
        $this->values[self::STTAILORINFO] = null;
        $this->values[self::STCONQTOWER] = null;
        $this->values[self::STTALK] = null;
        $this->values[self::STPVPSTORE] = null;
        $this->values[self::STACHIEVEMENTINFO] = null;
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
     * Sets value of 'stTalentInfo' property
     *
     * @param TALENTINFO $value Property value
     *
     * @return null
     */
    public function setStTalentInfo(TALENTINFO $value)
    {
        return $this->set(self::STTALENTINFO, $value);
    }

    /**
     * Returns value of 'stTalentInfo' property
     *
     * @return TALENTINFO
     */
    public function getStTalentInfo()
    {
        return $this->get(self::STTALENTINFO);
    }

    /**
     * Sets value of 'stTailorInfo' property
     *
     * @param TAILORINFO $value Property value
     *
     * @return null
     */
    public function setStTailorInfo(TAILORINFO $value)
    {
        return $this->set(self::STTAILORINFO, $value);
    }

    /**
     * Returns value of 'stTailorInfo' property
     *
     * @return TAILORINFO
     */
    public function getStTailorInfo()
    {
        return $this->get(self::STTAILORINFO);
    }

    /**
     * Sets value of 'stConqTower' property
     *
     * @param ConqTowerInfo $value Property value
     *
     * @return null
     */
    public function setStConqTower(ConqTowerInfo $value)
    {
        return $this->set(self::STCONQTOWER, $value);
    }

    /**
     * Returns value of 'stConqTower' property
     *
     * @return ConqTowerInfo
     */
    public function getStConqTower()
    {
        return $this->get(self::STCONQTOWER);
    }

    /**
     * Sets value of 'stTalk' property
     *
     * @param TalkMsgList $value Property value
     *
     * @return null
     */
    public function setStTalk(TalkMsgList $value)
    {
        return $this->set(self::STTALK, $value);
    }

    /**
     * Returns value of 'stTalk' property
     *
     * @return TalkMsgList
     */
    public function getStTalk()
    {
        return $this->get(self::STTALK);
    }

    /**
     * Sets value of 'stPvpStore' property
     *
     * @param PvpStoreInfo $value Property value
     *
     * @return null
     */
    public function setStPvpStore(PvpStoreInfo $value)
    {
        return $this->set(self::STPVPSTORE, $value);
    }

    /**
     * Returns value of 'stPvpStore' property
     *
     * @return PvpStoreInfo
     */
    public function getStPvpStore()
    {
        return $this->get(self::STPVPSTORE);
    }

    /**
     * Sets value of 'stAchievementInfo' property
     *
     * @param ACHIEVEMENTINFO $value Property value
     *
     * @return null
     */
    public function setStAchievementInfo(ACHIEVEMENTINFO $value)
    {
        return $this->set(self::STACHIEVEMENTINFO, $value);
    }

    /**
     * Returns value of 'stAchievementInfo' property
     *
     * @return ACHIEVEMENTINFO
     */
    public function getStAchievementInfo()
    {
        return $this->get(self::STACHIEVEMENTINFO);
    }
}

/**
 * ACHIEVEMENT message
 */
class ACHIEVEMENT extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const IFINISHTAG = 2;
    const IREWARDTAG = 3;
    const IPARAM = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::IFINISHTAG => array(
            'name' => 'iFinishTag',
            'required' => false,
            'type' => 5,
        ),
        self::IREWARDTAG => array(
            'name' => 'iRewardTag',
            'required' => false,
            'type' => 5,
        ),
        self::IPARAM => array(
            'name' => 'iParam',
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
        $this->values[self::IID] = null;
        $this->values[self::IFINISHTAG] = null;
        $this->values[self::IREWARDTAG] = null;
        $this->values[self::IPARAM] = null;
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
     * Sets value of 'iFinishTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFinishTag($value)
    {
        return $this->set(self::IFINISHTAG, $value);
    }

    /**
     * Returns value of 'iFinishTag' property
     *
     * @return int
     */
    public function getIFinishTag()
    {
        return $this->get(self::IFINISHTAG);
    }

    /**
     * Sets value of 'iRewardTag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardTag($value)
    {
        return $this->set(self::IREWARDTAG, $value);
    }

    /**
     * Returns value of 'iRewardTag' property
     *
     * @return int
     */
    public function getIRewardTag()
    {
        return $this->get(self::IREWARDTAG);
    }

    /**
     * Sets value of 'iParam' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIParam($value)
    {
        return $this->set(self::IPARAM, $value);
    }

    /**
     * Returns value of 'iParam' property
     *
     * @return int
     */
    public function getIParam()
    {
        return $this->get(self::IPARAM);
    }
}

/**
 * ACHIEVEMENTINFO message
 */
class ACHIEVEMENTINFO extends \ProtobufMessage
{
    /* Field index constants */
    const STACHIEVEMENT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STACHIEVEMENT => array(
            'name' => 'stAchievement',
            'repeated' => true,
            'type' => 'ACHIEVEMENT'
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
        $this->values[self::STACHIEVEMENT] = array();
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
     * Appends value to 'stAchievement' list
     *
     * @param ACHIEVEMENT $value Value to append
     *
     * @return null
     */
    public function appendStAchievement(ACHIEVEMENT $value)
    {
        return $this->append(self::STACHIEVEMENT, $value);
    }

    /**
     * Clears 'stAchievement' list
     *
     * @return null
     */
    public function clearStAchievement()
    {
        return $this->clear(self::STACHIEVEMENT);
    }

    /**
     * Returns 'stAchievement' list
     *
     * @return ACHIEVEMENT[]
     */
    public function getStAchievement()
    {
        return $this->get(self::STACHIEVEMENT);
    }

    /**
     * Returns 'stAchievement' iterator
     *
     * @return ArrayIterator
     */
    public function getStAchievementIterator()
    {
        return new \ArrayIterator($this->get(self::STACHIEVEMENT));
    }

    /**
     * Returns element from 'stAchievement' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ACHIEVEMENT
     */
    public function getStAchievementAt($offset)
    {
        return $this->get(self::STACHIEVEMENT, $offset);
    }

    /**
     * Returns count of 'stAchievement' list
     *
     * @return int
     */
    public function getStAchievementCount()
    {
        return $this->count(self::STACHIEVEMENT);
    }
}

/**
 * PVPStoreItem message
 */
class PVPStoreItem extends \ProtobufMessage
{
    /* Field index constants */
    const ITEMID = 1;
    const BUYCOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ITEMID => array(
            'name' => 'itemid',
            'required' => false,
            'type' => 5,
        ),
        self::BUYCOUNT => array(
            'name' => 'buycount',
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
        $this->values[self::ITEMID] = null;
        $this->values[self::BUYCOUNT] = null;
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
     * Sets value of 'itemid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setItemid($value)
    {
        return $this->set(self::ITEMID, $value);
    }

    /**
     * Returns value of 'itemid' property
     *
     * @return int
     */
    public function getItemid()
    {
        return $this->get(self::ITEMID);
    }

    /**
     * Sets value of 'buycount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBuycount($value)
    {
        return $this->set(self::BUYCOUNT, $value);
    }

    /**
     * Returns value of 'buycount' property
     *
     * @return int
     */
    public function getBuycount()
    {
        return $this->get(self::BUYCOUNT);
    }
}

/**
 * PVPSTORE message
 */
class PVPSTORE extends \ProtobufMessage
{
    /* Field index constants */
    const STITEMLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STITEMLIST => array(
            'name' => 'stItemList',
            'repeated' => true,
            'type' => 'PVPStoreItem'
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
        $this->values[self::STITEMLIST] = array();
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
     * Appends value to 'stItemList' list
     *
     * @param PVPStoreItem $value Value to append
     *
     * @return null
     */
    public function appendStItemList(PVPStoreItem $value)
    {
        return $this->append(self::STITEMLIST, $value);
    }

    /**
     * Clears 'stItemList' list
     *
     * @return null
     */
    public function clearStItemList()
    {
        return $this->clear(self::STITEMLIST);
    }

    /**
     * Returns 'stItemList' list
     *
     * @return PVPStoreItem[]
     */
    public function getStItemList()
    {
        return $this->get(self::STITEMLIST);
    }

    /**
     * Returns 'stItemList' iterator
     *
     * @return ArrayIterator
     */
    public function getStItemListIterator()
    {
        return new \ArrayIterator($this->get(self::STITEMLIST));
    }

    /**
     * Returns element from 'stItemList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return PVPStoreItem
     */
    public function getStItemListAt($offset)
    {
        return $this->get(self::STITEMLIST, $offset);
    }

    /**
     * Returns count of 'stItemList' list
     *
     * @return int
     */
    public function getStItemListCount()
    {
        return $this->count(self::STITEMLIST);
    }
}

/**
 * PVECROSSRANKINFO message
 */
class PVECROSSRANKINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const STRHEADIMG = 2;
    const ILEVEL = 3;
    const STRNAME = 4;
    const ISTARS = 5;
    const IMAXCROSSID = 6;
    const IHEADIMG = 7;
    const IVIPLEVEL = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::STRHEADIMG => array(
            'name' => 'strHeadImg',
            'required' => false,
            'type' => 7,
        ),
        self::ILEVEL => array(
            'name' => 'iLevel',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::ISTARS => array(
            'name' => 'iStars',
            'required' => false,
            'type' => 5,
        ),
        self::IMAXCROSSID => array(
            'name' => 'iMaxCrossID',
            'required' => false,
            'type' => 5,
        ),
        self::IHEADIMG => array(
            'name' => 'iHeadImg',
            'required' => false,
            'type' => 5,
        ),
        self::IVIPLEVEL => array(
            'name' => 'iVipLevel',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::STRHEADIMG] = null;
        $this->values[self::ILEVEL] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::ISTARS] = null;
        $this->values[self::IMAXCROSSID] = null;
        $this->values[self::IHEADIMG] = null;
        $this->values[self::IVIPLEVEL] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'strHeadImg' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrHeadImg($value)
    {
        return $this->set(self::STRHEADIMG, $value);
    }

    /**
     * Returns value of 'strHeadImg' property
     *
     * @return string
     */
    public function getStrHeadImg()
    {
        return $this->get(self::STRHEADIMG);
    }

    /**
     * Sets value of 'iLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILevel($value)
    {
        return $this->set(self::ILEVEL, $value);
    }

    /**
     * Returns value of 'iLevel' property
     *
     * @return int
     */
    public function getILevel()
    {
        return $this->get(self::ILEVEL);
    }

    /**
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iStars' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIStars($value)
    {
        return $this->set(self::ISTARS, $value);
    }

    /**
     * Returns value of 'iStars' property
     *
     * @return int
     */
    public function getIStars()
    {
        return $this->get(self::ISTARS);
    }

    /**
     * Sets value of 'iMaxCrossID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMaxCrossID($value)
    {
        return $this->set(self::IMAXCROSSID, $value);
    }

    /**
     * Returns value of 'iMaxCrossID' property
     *
     * @return int
     */
    public function getIMaxCrossID()
    {
        return $this->get(self::IMAXCROSSID);
    }

    /**
     * Sets value of 'iHeadImg' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeadImg($value)
    {
        return $this->set(self::IHEADIMG, $value);
    }

    /**
     * Returns value of 'iHeadImg' property
     *
     * @return int
     */
    public function getIHeadImg()
    {
        return $this->get(self::IHEADIMG);
    }

    /**
     * Sets value of 'iVipLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIVipLevel($value)
    {
        return $this->set(self::IVIPLEVEL, $value);
    }

    /**
     * Returns value of 'iVipLevel' property
     *
     * @return int
     */
    public function getIVipLevel()
    {
        return $this->get(self::IVIPLEVEL);
    }
}

/**
 * ALLPVECROSSRANKINFO message
 */
class ALLPVECROSSRANKINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IWORLDID = 1;
    const STPVECROSSRANKINFOS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IWORLDID => array(
            'name' => 'iWorldId',
            'required' => false,
            'type' => 5,
        ),
        self::STPVECROSSRANKINFOS => array(
            'name' => 'stPveCrossRankInfos',
            'repeated' => true,
            'type' => 'BasicPlayerSummary'
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
        $this->values[self::IWORLDID] = null;
        $this->values[self::STPVECROSSRANKINFOS] = array();
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
     * Sets value of 'iWorldId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorldId($value)
    {
        return $this->set(self::IWORLDID, $value);
    }

    /**
     * Returns value of 'iWorldId' property
     *
     * @return int
     */
    public function getIWorldId()
    {
        return $this->get(self::IWORLDID);
    }

    /**
     * Appends value to 'stPveCrossRankInfos' list
     *
     * @param BasicPlayerSummary $value Value to append
     *
     * @return null
     */
    public function appendStPveCrossRankInfos(BasicPlayerSummary $value)
    {
        return $this->append(self::STPVECROSSRANKINFOS, $value);
    }

    /**
     * Clears 'stPveCrossRankInfos' list
     *
     * @return null
     */
    public function clearStPveCrossRankInfos()
    {
        return $this->clear(self::STPVECROSSRANKINFOS);
    }

    /**
     * Returns 'stPveCrossRankInfos' list
     *
     * @return BasicPlayerSummary[]
     */
    public function getStPveCrossRankInfos()
    {
        return $this->get(self::STPVECROSSRANKINFOS);
    }

    /**
     * Returns 'stPveCrossRankInfos' iterator
     *
     * @return ArrayIterator
     */
    public function getStPveCrossRankInfosIterator()
    {
        return new \ArrayIterator($this->get(self::STPVECROSSRANKINFOS));
    }

    /**
     * Returns element from 'stPveCrossRankInfos' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return BasicPlayerSummary
     */
    public function getStPveCrossRankInfosAt($offset)
    {
        return $this->get(self::STPVECROSSRANKINFOS, $offset);
    }

    /**
     * Returns count of 'stPveCrossRankInfos' list
     *
     * @return int
     */
    public function getStPveCrossRankInfosCount()
    {
        return $this->count(self::STPVECROSSRANKINFOS);
    }
}

/**
 * SpecialLayer message
 */
class SpecialLayer extends \ProtobufMessage
{
    /* Field index constants */
    const ICROSSID = 1;
    const IREMAINCOUNT = 2;
    const IREMAINTIME = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICROSSID => array(
            'name' => 'iCrossid',
            'required' => false,
            'type' => 5,
        ),
        self::IREMAINCOUNT => array(
            'name' => 'iRemainCount',
            'required' => false,
            'type' => 5,
        ),
        self::IREMAINTIME => array(
            'name' => 'iRemainTime',
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
        $this->values[self::ICROSSID] = null;
        $this->values[self::IREMAINCOUNT] = null;
        $this->values[self::IREMAINTIME] = null;
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
     * Sets value of 'iCrossid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICrossid($value)
    {
        return $this->set(self::ICROSSID, $value);
    }

    /**
     * Returns value of 'iCrossid' property
     *
     * @return int
     */
    public function getICrossid()
    {
        return $this->get(self::ICROSSID);
    }

    /**
     * Sets value of 'iRemainCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRemainCount($value)
    {
        return $this->set(self::IREMAINCOUNT, $value);
    }

    /**
     * Returns value of 'iRemainCount' property
     *
     * @return int
     */
    public function getIRemainCount()
    {
        return $this->get(self::IREMAINCOUNT);
    }

    /**
     * Sets value of 'iRemainTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRemainTime($value)
    {
        return $this->set(self::IREMAINTIME, $value);
    }

    /**
     * Returns value of 'iRemainTime' property
     *
     * @return int
     */
    public function getIRemainTime()
    {
        return $this->get(self::IREMAINTIME);
    }
}

/**
 * SpecialLayerArray message
 */
class SpecialLayerArray extends \ProtobufMessage
{
    /* Field index constants */
    const STONE = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STONE => array(
            'name' => 'stOne',
            'repeated' => true,
            'type' => 'SpecialLayer'
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
        $this->values[self::STONE] = array();
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
     * Appends value to 'stOne' list
     *
     * @param SpecialLayer $value Value to append
     *
     * @return null
     */
    public function appendStOne(SpecialLayer $value)
    {
        return $this->append(self::STONE, $value);
    }

    /**
     * Clears 'stOne' list
     *
     * @return null
     */
    public function clearStOne()
    {
        return $this->clear(self::STONE);
    }

    /**
     * Returns 'stOne' list
     *
     * @return SpecialLayer[]
     */
    public function getStOne()
    {
        return $this->get(self::STONE);
    }

    /**
     * Returns 'stOne' iterator
     *
     * @return ArrayIterator
     */
    public function getStOneIterator()
    {
        return new \ArrayIterator($this->get(self::STONE));
    }

    /**
     * Returns element from 'stOne' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SpecialLayer
     */
    public function getStOneAt($offset)
    {
        return $this->get(self::STONE, $offset);
    }

    /**
     * Returns count of 'stOne' list
     *
     * @return int
     */
    public function getStOneCount()
    {
        return $this->count(self::STONE);
    }
}

/**
 * BESTHEORDBINFO message
 */
class BESTHEORDBINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const IUIN = 2;
    const ISCORE = 3;
    const STRNAME = 4;
    const ITALENT = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::IUIN => array(
            'name' => 'iUin',
            'required' => false,
            'type' => 5,
        ),
        self::ISCORE => array(
            'name' => 'iScore',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::ITALENT => array(
            'name' => 'iTalent',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::IUIN] = null;
        $this->values[self::ISCORE] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::ITALENT] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
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
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
    }

    /**
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iTalent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalent($value)
    {
        return $this->set(self::ITALENT, $value);
    }

    /**
     * Returns value of 'iTalent' property
     *
     * @return int
     */
    public function getITalent()
    {
        return $this->get(self::ITALENT);
    }
}

/**
 * BESTHERO_ROBET message
 */
class BESTHEROROBET extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const ISCORE = 5;
    const IADDSCORE = 6;
    const ILASTADDTIME = 7;
    const IADDINTERVAL = 8;
    const ITALENTID = 9;
    const STRNAME = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::ISCORE => array(
            'name' => 'iScore',
            'required' => false,
            'type' => 5,
        ),
        self::IADDSCORE => array(
            'name' => 'iAddScore',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTADDTIME => array(
            'name' => 'iLastAddTime',
            'required' => false,
            'type' => 5,
        ),
        self::IADDINTERVAL => array(
            'name' => 'iAddInterval',
            'required' => false,
            'type' => 5,
        ),
        self::ITALENTID => array(
            'name' => 'iTalentID',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::ISCORE] = null;
        $this->values[self::IADDSCORE] = null;
        $this->values[self::ILASTADDTIME] = null;
        $this->values[self::IADDINTERVAL] = null;
        $this->values[self::ITALENTID] = null;
        $this->values[self::STRNAME] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'iScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIScore($value)
    {
        return $this->set(self::ISCORE, $value);
    }

    /**
     * Returns value of 'iScore' property
     *
     * @return int
     */
    public function getIScore()
    {
        return $this->get(self::ISCORE);
    }

    /**
     * Sets value of 'iAddScore' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAddScore($value)
    {
        return $this->set(self::IADDSCORE, $value);
    }

    /**
     * Returns value of 'iAddScore' property
     *
     * @return int
     */
    public function getIAddScore()
    {
        return $this->get(self::IADDSCORE);
    }

    /**
     * Sets value of 'iLastAddTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastAddTime($value)
    {
        return $this->set(self::ILASTADDTIME, $value);
    }

    /**
     * Returns value of 'iLastAddTime' property
     *
     * @return int
     */
    public function getILastAddTime()
    {
        return $this->get(self::ILASTADDTIME);
    }

    /**
     * Sets value of 'iAddInterval' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIAddInterval($value)
    {
        return $this->set(self::IADDINTERVAL, $value);
    }

    /**
     * Returns value of 'iAddInterval' property
     *
     * @return int
     */
    public function getIAddInterval()
    {
        return $this->get(self::IADDINTERVAL);
    }

    /**
     * Sets value of 'iTalentID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalentID($value)
    {
        return $this->set(self::ITALENTID, $value);
    }

    /**
     * Returns value of 'iTalentID' property
     *
     * @return int
     */
    public function getITalentID()
    {
        return $this->get(self::ITALENTID);
    }

    /**
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }
}

/**
 * ACTIVITY_BESTHERO message
 */
class ACTIVITYBESTHERO extends \ProtobufMessage
{
    /* Field index constants */
    const STRANKLIST = 1;
    const STROBETLIST = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STRANKLIST => array(
            'name' => 'stRankList',
            'repeated' => true,
            'type' => 'BESTHEORDBINFO'
        ),
        self::STROBETLIST => array(
            'name' => 'stRobetList',
            'repeated' => true,
            'type' => 'BESTHEROROBET'
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
        $this->values[self::STRANKLIST] = array();
        $this->values[self::STROBETLIST] = array();
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
     * Appends value to 'stRankList' list
     *
     * @param BESTHEORDBINFO $value Value to append
     *
     * @return null
     */
    public function appendStRankList(BESTHEORDBINFO $value)
    {
        return $this->append(self::STRANKLIST, $value);
    }

    /**
     * Clears 'stRankList' list
     *
     * @return null
     */
    public function clearStRankList()
    {
        return $this->clear(self::STRANKLIST);
    }

    /**
     * Returns 'stRankList' list
     *
     * @return BESTHEORDBINFO[]
     */
    public function getStRankList()
    {
        return $this->get(self::STRANKLIST);
    }

    /**
     * Returns 'stRankList' iterator
     *
     * @return ArrayIterator
     */
    public function getStRankListIterator()
    {
        return new \ArrayIterator($this->get(self::STRANKLIST));
    }

    /**
     * Returns element from 'stRankList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return BESTHEORDBINFO
     */
    public function getStRankListAt($offset)
    {
        return $this->get(self::STRANKLIST, $offset);
    }

    /**
     * Returns count of 'stRankList' list
     *
     * @return int
     */
    public function getStRankListCount()
    {
        return $this->count(self::STRANKLIST);
    }

    /**
     * Appends value to 'stRobetList' list
     *
     * @param BESTHEROROBET $value Value to append
     *
     * @return null
     */
    public function appendStRobetList(BESTHEROROBET $value)
    {
        return $this->append(self::STROBETLIST, $value);
    }

    /**
     * Clears 'stRobetList' list
     *
     * @return null
     */
    public function clearStRobetList()
    {
        return $this->clear(self::STROBETLIST);
    }

    /**
     * Returns 'stRobetList' list
     *
     * @return BESTHEROROBET[]
     */
    public function getStRobetList()
    {
        return $this->get(self::STROBETLIST);
    }

    /**
     * Returns 'stRobetList' iterator
     *
     * @return ArrayIterator
     */
    public function getStRobetListIterator()
    {
        return new \ArrayIterator($this->get(self::STROBETLIST));
    }

    /**
     * Returns element from 'stRobetList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return BESTHEROROBET
     */
    public function getStRobetListAt($offset)
    {
        return $this->get(self::STROBETLIST, $offset);
    }

    /**
     * Returns count of 'stRobetList' list
     *
     * @return int
     */
    public function getStRobetListCount()
    {
        return $this->count(self::STROBETLIST);
    }
}

/**
 * ACTIVITY_DETIAL message
 */
class ACTIVITYDETIAL extends \ProtobufMessage
{
    /* Field index constants */
    const STBESTHERO = 1;
    const STREWARD = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STBESTHERO => array(
            'name' => 'stBestHero',
            'required' => false,
            'type' => 'ACTIVITYBESTHERO'
        ),
        self::STREWARD => array(
            'name' => 'stReward',
            'repeated' => true,
            'type' => 'ACTIVITYREWARD'
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
        $this->values[self::STBESTHERO] = null;
        $this->values[self::STREWARD] = array();
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
     * Sets value of 'stBestHero' property
     *
     * @param ACTIVITYBESTHERO $value Property value
     *
     * @return null
     */
    public function setStBestHero(ACTIVITYBESTHERO $value)
    {
        return $this->set(self::STBESTHERO, $value);
    }

    /**
     * Returns value of 'stBestHero' property
     *
     * @return ACTIVITYBESTHERO
     */
    public function getStBestHero()
    {
        return $this->get(self::STBESTHERO);
    }

    /**
     * Appends value to 'stReward' list
     *
     * @param ACTIVITYREWARD $value Value to append
     *
     * @return null
     */
    public function appendStReward(ACTIVITYREWARD $value)
    {
        return $this->append(self::STREWARD, $value);
    }

    /**
     * Clears 'stReward' list
     *
     * @return null
     */
    public function clearStReward()
    {
        return $this->clear(self::STREWARD);
    }

    /**
     * Returns 'stReward' list
     *
     * @return ACTIVITYREWARD[]
     */
    public function getStReward()
    {
        return $this->get(self::STREWARD);
    }

    /**
     * Returns 'stReward' iterator
     *
     * @return ArrayIterator
     */
    public function getStRewardIterator()
    {
        return new \ArrayIterator($this->get(self::STREWARD));
    }

    /**
     * Returns element from 'stReward' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return ACTIVITYREWARD
     */
    public function getStRewardAt($offset)
    {
        return $this->get(self::STREWARD, $offset);
    }

    /**
     * Returns count of 'stReward' list
     *
     * @return int
     */
    public function getStRewardCount()
    {
        return $this->count(self::STREWARD);
    }
}

/**
 * ACTIVITY_DATA message
 */
class ACTIVITYDATA extends \ProtobufMessage
{
    /* Field index constants */
    const IBATCHID = 1;
    const IBATCHTYPE = 2;
    const IACTID = 3;
    const ISTARTTIME = 4;
    const IENDTIME = 5;
    const STDETIAL = 6;
    const STRTITLE = 7;
    const STRCONTENT = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBATCHID => array(
            'name' => 'iBatchid',
            'required' => false,
            'type' => 5,
        ),
        self::IBATCHTYPE => array(
            'name' => 'iBatchType',
            'required' => false,
            'type' => 5,
        ),
        self::IACTID => array(
            'name' => 'iActId',
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
        self::STDETIAL => array(
            'name' => 'stDetial',
            'required' => false,
            'type' => 'ACTIVITYDETIAL'
        ),
        self::STRTITLE => array(
            'name' => 'strTitle',
            'required' => false,
            'type' => 7,
        ),
        self::STRCONTENT => array(
            'name' => 'strContent',
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
        $this->values[self::IBATCHID] = null;
        $this->values[self::IBATCHTYPE] = null;
        $this->values[self::IACTID] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::STDETIAL] = null;
        $this->values[self::STRTITLE] = null;
        $this->values[self::STRCONTENT] = null;
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
     * Sets value of 'iBatchid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBatchid($value)
    {
        return $this->set(self::IBATCHID, $value);
    }

    /**
     * Returns value of 'iBatchid' property
     *
     * @return int
     */
    public function getIBatchid()
    {
        return $this->get(self::IBATCHID);
    }

    /**
     * Sets value of 'iBatchType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBatchType($value)
    {
        return $this->set(self::IBATCHTYPE, $value);
    }

    /**
     * Returns value of 'iBatchType' property
     *
     * @return int
     */
    public function getIBatchType()
    {
        return $this->get(self::IBATCHTYPE);
    }

    /**
     * Sets value of 'iActId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActId($value)
    {
        return $this->set(self::IACTID, $value);
    }

    /**
     * Returns value of 'iActId' property
     *
     * @return int
     */
    public function getIActId()
    {
        return $this->get(self::IACTID);
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
     * Sets value of 'stDetial' property
     *
     * @param ACTIVITYDETIAL $value Property value
     *
     * @return null
     */
    public function setStDetial(ACTIVITYDETIAL $value)
    {
        return $this->set(self::STDETIAL, $value);
    }

    /**
     * Returns value of 'stDetial' property
     *
     * @return ACTIVITYDETIAL
     */
    public function getStDetial()
    {
        return $this->get(self::STDETIAL);
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
     * Sets value of 'strContent' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrContent($value)
    {
        return $this->set(self::STRCONTENT, $value);
    }

    /**
     * Returns value of 'strContent' property
     *
     * @return string
     */
    public function getStrContent()
    {
        return $this->get(self::STRCONTENT);
    }
}

/**
 * ONEBOARD message
 */
class ONEBOARD extends \ProtobufMessage
{
    /* Field index constants */
    const IBOARDID = 1;
    const ISTARTTIME = 2;
    const IENDTIME = 3;
    const ILABLE = 4;
    const ISBNT = 5;
    const STRTITLE = 6;
    const STRCONTEXT = 7;
    const STRBTNTEXT = 8;
    const ILINK = 9;
    const STRLINKTEXT = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IBOARDID => array(
            'name' => 'iBoardID',
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
        self::ILABLE => array(
            'name' => 'iLable',
            'required' => false,
            'type' => 5,
        ),
        self::ISBNT => array(
            'name' => 'isBnt',
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
        self::STRBTNTEXT => array(
            'name' => 'strBtnText',
            'required' => false,
            'type' => 7,
        ),
        self::ILINK => array(
            'name' => 'iLink',
            'required' => false,
            'type' => 5,
        ),
        self::STRLINKTEXT => array(
            'name' => 'strLinkText',
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
        $this->values[self::IBOARDID] = null;
        $this->values[self::ISTARTTIME] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::ILABLE] = null;
        $this->values[self::ISBNT] = null;
        $this->values[self::STRTITLE] = null;
        $this->values[self::STRCONTEXT] = null;
        $this->values[self::STRBTNTEXT] = null;
        $this->values[self::ILINK] = null;
        $this->values[self::STRLINKTEXT] = null;
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
     * Sets value of 'iBoardID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIBoardID($value)
    {
        return $this->set(self::IBOARDID, $value);
    }

    /**
     * Returns value of 'iBoardID' property
     *
     * @return int
     */
    public function getIBoardID()
    {
        return $this->get(self::IBOARDID);
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
     * Sets value of 'iLable' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILable($value)
    {
        return $this->set(self::ILABLE, $value);
    }

    /**
     * Returns value of 'iLable' property
     *
     * @return int
     */
    public function getILable()
    {
        return $this->get(self::ILABLE);
    }

    /**
     * Sets value of 'isBnt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIsBnt($value)
    {
        return $this->set(self::ISBNT, $value);
    }

    /**
     * Returns value of 'isBnt' property
     *
     * @return int
     */
    public function getIsBnt()
    {
        return $this->get(self::ISBNT);
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
     * Sets value of 'iLink' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILink($value)
    {
        return $this->set(self::ILINK, $value);
    }

    /**
     * Returns value of 'iLink' property
     *
     * @return int
     */
    public function getILink()
    {
        return $this->get(self::ILINK);
    }

    /**
     * Sets value of 'strLinkText' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrLinkText($value)
    {
        return $this->set(self::STRLINKTEXT, $value);
    }

    /**
     * Returns value of 'strLinkText' property
     *
     * @return string
     */
    public function getStrLinkText()
    {
        return $this->get(self::STRLINKTEXT);
    }
}

/**
 * WORSHIPRECORD message
 */
class WORSHIPRECORD extends \ProtobufMessage
{
    /* Field index constants */
    const IROLEID = 1;
    const IROLEUIN = 2;
    const STRNAME = 3;
    const IWORSHIPTYPE = 4;
    const IREWARDTYPE = 5;
    const IREWARDAMT = 6;
    const IWORSHIPTIME = 7;
    const ITALENTID = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::IROLEUIN => array(
            'name' => 'iRoleUin',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::IWORSHIPTYPE => array(
            'name' => 'iWorshipType',
            'required' => false,
            'type' => 5,
        ),
        self::IREWARDTYPE => array(
            'name' => 'iRewardType',
            'required' => false,
            'type' => 5,
        ),
        self::IREWARDAMT => array(
            'name' => 'iRewardAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IWORSHIPTIME => array(
            'name' => 'iWorshipTime',
            'required' => false,
            'type' => 5,
        ),
        self::ITALENTID => array(
            'name' => 'iTalentId',
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
        $this->values[self::IROLEID] = null;
        $this->values[self::IROLEUIN] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::IWORSHIPTYPE] = null;
        $this->values[self::IREWARDTYPE] = null;
        $this->values[self::IREWARDAMT] = null;
        $this->values[self::IWORSHIPTIME] = null;
        $this->values[self::ITALENTID] = null;
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
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
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iWorshipType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorshipType($value)
    {
        return $this->set(self::IWORSHIPTYPE, $value);
    }

    /**
     * Returns value of 'iWorshipType' property
     *
     * @return int
     */
    public function getIWorshipType()
    {
        return $this->get(self::IWORSHIPTYPE);
    }

    /**
     * Sets value of 'iRewardType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardType($value)
    {
        return $this->set(self::IREWARDTYPE, $value);
    }

    /**
     * Returns value of 'iRewardType' property
     *
     * @return int
     */
    public function getIRewardType()
    {
        return $this->get(self::IREWARDTYPE);
    }

    /**
     * Sets value of 'iRewardAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRewardAmt($value)
    {
        return $this->set(self::IREWARDAMT, $value);
    }

    /**
     * Returns value of 'iRewardAmt' property
     *
     * @return int
     */
    public function getIRewardAmt()
    {
        return $this->get(self::IREWARDAMT);
    }

    /**
     * Sets value of 'iWorshipTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorshipTime($value)
    {
        return $this->set(self::IWORSHIPTIME, $value);
    }

    /**
     * Returns value of 'iWorshipTime' property
     *
     * @return int
     */
    public function getIWorshipTime()
    {
        return $this->get(self::IWORSHIPTIME);
    }

    /**
     * Sets value of 'iTalentId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalentId($value)
    {
        return $this->set(self::ITALENTID, $value);
    }

    /**
     * Returns value of 'iTalentId' property
     *
     * @return int
     */
    public function getITalentId()
    {
        return $this->get(self::ITALENTID);
    }
}

/**
 * GUILD_MEMBER message
 */
class GUILDMEMBER extends \ProtobufMessage
{
    /* Field index constants */
    const IUIN = 1;
    const IROLEID = 2;
    const STRNAME = 3;
    const IPOSITION = 4;
    const IDAILYWORSHIPTIMES = 5;
    const IDAILYWORSHIPEDTIMES = 6;
    const IWORSHIPEDGOLDAMT = 7;
    const IWORSHIPRECORDNUM = 8;
    const STWORSHIPRECORD = 9;
    const IACTIVEVAL = 10;
    const IROLELEVEL = 11;
    const IHEADIMGID = 12;
    const ITALENT = 13;
    const ILASTLOGOUTTIME = 14;
    const IVIPLEVEL = 15;
    const IWORSHIPROLDIDS = 16;
    const STACTIVEVALS = 17;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IUIN => array(
            'name' => 'iUin',
            'required' => false,
            'type' => 5,
        ),
        self::IROLEID => array(
            'name' => 'iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::IPOSITION => array(
            'name' => 'iPosition',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYWORSHIPTIMES => array(
            'name' => 'iDailyWorshipTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IDAILYWORSHIPEDTIMES => array(
            'name' => 'iDailyWorshipedTimes',
            'required' => false,
            'type' => 5,
        ),
        self::IWORSHIPEDGOLDAMT => array(
            'name' => 'iWorshipedGoldAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IWORSHIPRECORDNUM => array(
            'name' => 'iWorshipRecordNum',
            'required' => false,
            'type' => 5,
        ),
        self::STWORSHIPRECORD => array(
            'name' => 'stWorshipRecord',
            'repeated' => true,
            'type' => 'WORSHIPRECORD'
        ),
        self::IACTIVEVAL => array(
            'name' => 'iActiveVal',
            'required' => false,
            'type' => 5,
        ),
        self::IROLELEVEL => array(
            'name' => 'iRoleLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IHEADIMGID => array(
            'name' => 'iHeadImgId',
            'required' => false,
            'type' => 5,
        ),
        self::ITALENT => array(
            'name' => 'iTalent',
            'required' => false,
            'type' => 5,
        ),
        self::ILASTLOGOUTTIME => array(
            'name' => 'iLastLogOutTime',
            'required' => false,
            'type' => 5,
        ),
        self::IVIPLEVEL => array(
            'name' => 'iVipLevel',
            'required' => false,
            'type' => 5,
        ),
        self::IWORSHIPROLDIDS => array(
            'name' => 'iWorshipRoldIds',
            'repeated' => true,
            'type' => 5,
        ),
        self::STACTIVEVALS => array(
            'name' => 'stActiveVals',
            'repeated' => true,
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
        $this->values[self::IROLEID] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::IPOSITION] = null;
        $this->values[self::IDAILYWORSHIPTIMES] = null;
        $this->values[self::IDAILYWORSHIPEDTIMES] = null;
        $this->values[self::IWORSHIPEDGOLDAMT] = null;
        $this->values[self::IWORSHIPRECORDNUM] = null;
        $this->values[self::STWORSHIPRECORD] = array();
        $this->values[self::IACTIVEVAL] = null;
        $this->values[self::IROLELEVEL] = null;
        $this->values[self::IHEADIMGID] = null;
        $this->values[self::ITALENT] = null;
        $this->values[self::ILASTLOGOUTTIME] = null;
        $this->values[self::IVIPLEVEL] = null;
        $this->values[self::IWORSHIPROLDIDS] = array();
        $this->values[self::STACTIVEVALS] = array();
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
     * Sets value of 'iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleId($value)
    {
        return $this->set(self::IROLEID, $value);
    }

    /**
     * Returns value of 'iRoleId' property
     *
     * @return int
     */
    public function getIRoleId()
    {
        return $this->get(self::IROLEID);
    }

    /**
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iPosition' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPosition($value)
    {
        return $this->set(self::IPOSITION, $value);
    }

    /**
     * Returns value of 'iPosition' property
     *
     * @return int
     */
    public function getIPosition()
    {
        return $this->get(self::IPOSITION);
    }

    /**
     * Sets value of 'iDailyWorshipTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyWorshipTimes($value)
    {
        return $this->set(self::IDAILYWORSHIPTIMES, $value);
    }

    /**
     * Returns value of 'iDailyWorshipTimes' property
     *
     * @return int
     */
    public function getIDailyWorshipTimes()
    {
        return $this->get(self::IDAILYWORSHIPTIMES);
    }

    /**
     * Sets value of 'iDailyWorshipedTimes' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIDailyWorshipedTimes($value)
    {
        return $this->set(self::IDAILYWORSHIPEDTIMES, $value);
    }

    /**
     * Returns value of 'iDailyWorshipedTimes' property
     *
     * @return int
     */
    public function getIDailyWorshipedTimes()
    {
        return $this->get(self::IDAILYWORSHIPEDTIMES);
    }

    /**
     * Sets value of 'iWorshipedGoldAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorshipedGoldAmt($value)
    {
        return $this->set(self::IWORSHIPEDGOLDAMT, $value);
    }

    /**
     * Returns value of 'iWorshipedGoldAmt' property
     *
     * @return int
     */
    public function getIWorshipedGoldAmt()
    {
        return $this->get(self::IWORSHIPEDGOLDAMT);
    }

    /**
     * Sets value of 'iWorshipRecordNum' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIWorshipRecordNum($value)
    {
        return $this->set(self::IWORSHIPRECORDNUM, $value);
    }

    /**
     * Returns value of 'iWorshipRecordNum' property
     *
     * @return int
     */
    public function getIWorshipRecordNum()
    {
        return $this->get(self::IWORSHIPRECORDNUM);
    }

    /**
     * Appends value to 'stWorshipRecord' list
     *
     * @param WORSHIPRECORD $value Value to append
     *
     * @return null
     */
    public function appendStWorshipRecord(WORSHIPRECORD $value)
    {
        return $this->append(self::STWORSHIPRECORD, $value);
    }

    /**
     * Clears 'stWorshipRecord' list
     *
     * @return null
     */
    public function clearStWorshipRecord()
    {
        return $this->clear(self::STWORSHIPRECORD);
    }

    /**
     * Returns 'stWorshipRecord' list
     *
     * @return WORSHIPRECORD[]
     */
    public function getStWorshipRecord()
    {
        return $this->get(self::STWORSHIPRECORD);
    }

    /**
     * Returns 'stWorshipRecord' iterator
     *
     * @return ArrayIterator
     */
    public function getStWorshipRecordIterator()
    {
        return new \ArrayIterator($this->get(self::STWORSHIPRECORD));
    }

    /**
     * Returns element from 'stWorshipRecord' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return WORSHIPRECORD
     */
    public function getStWorshipRecordAt($offset)
    {
        return $this->get(self::STWORSHIPRECORD, $offset);
    }

    /**
     * Returns count of 'stWorshipRecord' list
     *
     * @return int
     */
    public function getStWorshipRecordCount()
    {
        return $this->count(self::STWORSHIPRECORD);
    }

    /**
     * Sets value of 'iActiveVal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActiveVal($value)
    {
        return $this->set(self::IACTIVEVAL, $value);
    }

    /**
     * Returns value of 'iActiveVal' property
     *
     * @return int
     */
    public function getIActiveVal()
    {
        return $this->get(self::IACTIVEVAL);
    }

    /**
     * Sets value of 'iRoleLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIRoleLevel($value)
    {
        return $this->set(self::IROLELEVEL, $value);
    }

    /**
     * Returns value of 'iRoleLevel' property
     *
     * @return int
     */
    public function getIRoleLevel()
    {
        return $this->get(self::IROLELEVEL);
    }

    /**
     * Sets value of 'iHeadImgId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIHeadImgId($value)
    {
        return $this->set(self::IHEADIMGID, $value);
    }

    /**
     * Returns value of 'iHeadImgId' property
     *
     * @return int
     */
    public function getIHeadImgId()
    {
        return $this->get(self::IHEADIMGID);
    }

    /**
     * Sets value of 'iTalent' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setITalent($value)
    {
        return $this->set(self::ITALENT, $value);
    }

    /**
     * Returns value of 'iTalent' property
     *
     * @return int
     */
    public function getITalent()
    {
        return $this->get(self::ITALENT);
    }

    /**
     * Sets value of 'iLastLogOutTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setILastLogOutTime($value)
    {
        return $this->set(self::ILASTLOGOUTTIME, $value);
    }

    /**
     * Returns value of 'iLastLogOutTime' property
     *
     * @return int
     */
    public function getILastLogOutTime()
    {
        return $this->get(self::ILASTLOGOUTTIME);
    }

    /**
     * Sets value of 'iVipLevel' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIVipLevel($value)
    {
        return $this->set(self::IVIPLEVEL, $value);
    }

    /**
     * Returns value of 'iVipLevel' property
     *
     * @return int
     */
    public function getIVipLevel()
    {
        return $this->get(self::IVIPLEVEL);
    }

    /**
     * Appends value to 'iWorshipRoldIds' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendIWorshipRoldIds($value)
    {
        return $this->append(self::IWORSHIPROLDIDS, $value);
    }

    /**
     * Clears 'iWorshipRoldIds' list
     *
     * @return null
     */
    public function clearIWorshipRoldIds()
    {
        return $this->clear(self::IWORSHIPROLDIDS);
    }

    /**
     * Returns 'iWorshipRoldIds' list
     *
     * @return int[]
     */
    public function getIWorshipRoldIds()
    {
        return $this->get(self::IWORSHIPROLDIDS);
    }

    /**
     * Returns 'iWorshipRoldIds' iterator
     *
     * @return ArrayIterator
     */
    public function getIWorshipRoldIdsIterator()
    {
        return new \ArrayIterator($this->get(self::IWORSHIPROLDIDS));
    }

    /**
     * Returns element from 'iWorshipRoldIds' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getIWorshipRoldIdsAt($offset)
    {
        return $this->get(self::IWORSHIPROLDIDS, $offset);
    }

    /**
     * Returns count of 'iWorshipRoldIds' list
     *
     * @return int
     */
    public function getIWorshipRoldIdsCount()
    {
        return $this->count(self::IWORSHIPROLDIDS);
    }

    /**
     * Appends value to 'stActiveVals' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendStActiveVals($value)
    {
        return $this->append(self::STACTIVEVALS, $value);
    }

    /**
     * Clears 'stActiveVals' list
     *
     * @return null
     */
    public function clearStActiveVals()
    {
        return $this->clear(self::STACTIVEVALS);
    }

    /**
     * Returns 'stActiveVals' list
     *
     * @return int[]
     */
    public function getStActiveVals()
    {
        return $this->get(self::STACTIVEVALS);
    }

    /**
     * Returns 'stActiveVals' iterator
     *
     * @return ArrayIterator
     */
    public function getStActiveValsIterator()
    {
        return new \ArrayIterator($this->get(self::STACTIVEVALS));
    }

    /**
     * Returns element from 'stActiveVals' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getStActiveValsAt($offset)
    {
        return $this->get(self::STACTIVEVALS, $offset);
    }

    /**
     * Returns count of 'stActiveVals' list
     *
     * @return int
     */
    public function getStActiveValsCount()
    {
        return $this->count(self::STACTIVEVALS);
    }
}

/**
 * GUILD_APPLY message
 */
class GUILDAPPLY extends \ProtobufMessage
{
    /* Field index constants */
    const M_IROLEID = 1;
    const M_IUIN = 2;
    const M_STRNAME = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::M_IROLEID => array(
            'name' => 'm_iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::M_IUIN => array(
            'name' => 'm_iUin',
            'required' => false,
            'type' => 5,
        ),
        self::M_STRNAME => array(
            'name' => 'm_strName',
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
        $this->values[self::M_IROLEID] = null;
        $this->values[self::M_IUIN] = null;
        $this->values[self::M_STRNAME] = null;
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
     * Sets value of 'm_iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIRoleId($value)
    {
        return $this->set(self::M_IROLEID, $value);
    }

    /**
     * Returns value of 'm_iRoleId' property
     *
     * @return int
     */
    public function getMIRoleId()
    {
        return $this->get(self::M_IROLEID);
    }

    /**
     * Sets value of 'm_iUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIUin($value)
    {
        return $this->set(self::M_IUIN, $value);
    }

    /**
     * Returns value of 'm_iUin' property
     *
     * @return int
     */
    public function getMIUin()
    {
        return $this->get(self::M_IUIN);
    }

    /**
     * Sets value of 'm_strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMStrName($value)
    {
        return $this->set(self::M_STRNAME, $value);
    }

    /**
     * Returns value of 'm_strName' property
     *
     * @return string
     */
    public function getMStrName()
    {
        return $this->get(self::M_STRNAME);
    }
}

/**
 * GUILD_EVENT message
 */
class GUILDEVENT extends \ProtobufMessage
{
    /* Field index constants */
    const M_IEVTTYPE = 1;
    const M_IROLEID = 2;
    const M_IUIN = 3;
    const M_STRNAME = 4;
    const M_ITARGETROLEID = 5;
    const M_ITARGETUIN = 6;
    const M_STRTARGETNAME = 7;
    const M_IEVTPARAMA = 8;
    const M_IEVTPARAMB = 9;
    const M_IEVTTIME = 10;
    const M_ITALENTID = 11;
    const M_ITARGETTALENTID = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::M_IEVTTYPE => array(
            'name' => 'm_iEvtType',
            'required' => false,
            'type' => 5,
        ),
        self::M_IROLEID => array(
            'name' => 'm_iRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::M_IUIN => array(
            'name' => 'm_iUin',
            'required' => false,
            'type' => 5,
        ),
        self::M_STRNAME => array(
            'name' => 'm_strName',
            'required' => false,
            'type' => 7,
        ),
        self::M_ITARGETROLEID => array(
            'name' => 'm_iTargetRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::M_ITARGETUIN => array(
            'name' => 'm_iTargetUin',
            'required' => false,
            'type' => 5,
        ),
        self::M_STRTARGETNAME => array(
            'name' => 'm_strTargetName',
            'required' => false,
            'type' => 7,
        ),
        self::M_IEVTPARAMA => array(
            'name' => 'm_iEvtParamA',
            'required' => false,
            'type' => 5,
        ),
        self::M_IEVTPARAMB => array(
            'name' => 'm_iEvtParamB',
            'required' => false,
            'type' => 5,
        ),
        self::M_IEVTTIME => array(
            'name' => 'm_iEvtTime',
            'required' => false,
            'type' => 5,
        ),
        self::M_ITALENTID => array(
            'name' => 'm_iTalentId',
            'required' => false,
            'type' => 5,
        ),
        self::M_ITARGETTALENTID => array(
            'name' => 'm_iTargetTalentId',
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
        $this->values[self::M_IEVTTYPE] = null;
        $this->values[self::M_IROLEID] = null;
        $this->values[self::M_IUIN] = null;
        $this->values[self::M_STRNAME] = null;
        $this->values[self::M_ITARGETROLEID] = null;
        $this->values[self::M_ITARGETUIN] = null;
        $this->values[self::M_STRTARGETNAME] = null;
        $this->values[self::M_IEVTPARAMA] = null;
        $this->values[self::M_IEVTPARAMB] = null;
        $this->values[self::M_IEVTTIME] = null;
        $this->values[self::M_ITALENTID] = null;
        $this->values[self::M_ITARGETTALENTID] = null;
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
     * Sets value of 'm_iEvtType' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIEvtType($value)
    {
        return $this->set(self::M_IEVTTYPE, $value);
    }

    /**
     * Returns value of 'm_iEvtType' property
     *
     * @return int
     */
    public function getMIEvtType()
    {
        return $this->get(self::M_IEVTTYPE);
    }

    /**
     * Sets value of 'm_iRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIRoleId($value)
    {
        return $this->set(self::M_IROLEID, $value);
    }

    /**
     * Returns value of 'm_iRoleId' property
     *
     * @return int
     */
    public function getMIRoleId()
    {
        return $this->get(self::M_IROLEID);
    }

    /**
     * Sets value of 'm_iUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIUin($value)
    {
        return $this->set(self::M_IUIN, $value);
    }

    /**
     * Returns value of 'm_iUin' property
     *
     * @return int
     */
    public function getMIUin()
    {
        return $this->get(self::M_IUIN);
    }

    /**
     * Sets value of 'm_strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMStrName($value)
    {
        return $this->set(self::M_STRNAME, $value);
    }

    /**
     * Returns value of 'm_strName' property
     *
     * @return string
     */
    public function getMStrName()
    {
        return $this->get(self::M_STRNAME);
    }

    /**
     * Sets value of 'm_iTargetRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMITargetRoleId($value)
    {
        return $this->set(self::M_ITARGETROLEID, $value);
    }

    /**
     * Returns value of 'm_iTargetRoleId' property
     *
     * @return int
     */
    public function getMITargetRoleId()
    {
        return $this->get(self::M_ITARGETROLEID);
    }

    /**
     * Sets value of 'm_iTargetUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMITargetUin($value)
    {
        return $this->set(self::M_ITARGETUIN, $value);
    }

    /**
     * Returns value of 'm_iTargetUin' property
     *
     * @return int
     */
    public function getMITargetUin()
    {
        return $this->get(self::M_ITARGETUIN);
    }

    /**
     * Sets value of 'm_strTargetName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMStrTargetName($value)
    {
        return $this->set(self::M_STRTARGETNAME, $value);
    }

    /**
     * Returns value of 'm_strTargetName' property
     *
     * @return string
     */
    public function getMStrTargetName()
    {
        return $this->get(self::M_STRTARGETNAME);
    }

    /**
     * Sets value of 'm_iEvtParamA' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIEvtParamA($value)
    {
        return $this->set(self::M_IEVTPARAMA, $value);
    }

    /**
     * Returns value of 'm_iEvtParamA' property
     *
     * @return int
     */
    public function getMIEvtParamA()
    {
        return $this->get(self::M_IEVTPARAMA);
    }

    /**
     * Sets value of 'm_iEvtParamB' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIEvtParamB($value)
    {
        return $this->set(self::M_IEVTPARAMB, $value);
    }

    /**
     * Returns value of 'm_iEvtParamB' property
     *
     * @return int
     */
    public function getMIEvtParamB()
    {
        return $this->get(self::M_IEVTPARAMB);
    }

    /**
     * Sets value of 'm_iEvtTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMIEvtTime($value)
    {
        return $this->set(self::M_IEVTTIME, $value);
    }

    /**
     * Returns value of 'm_iEvtTime' property
     *
     * @return int
     */
    public function getMIEvtTime()
    {
        return $this->get(self::M_IEVTTIME);
    }

    /**
     * Sets value of 'm_iTalentId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMITalentId($value)
    {
        return $this->set(self::M_ITALENTID, $value);
    }

    /**
     * Returns value of 'm_iTalentId' property
     *
     * @return int
     */
    public function getMITalentId()
    {
        return $this->get(self::M_ITALENTID);
    }

    /**
     * Sets value of 'm_iTargetTalentId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMITargetTalentId($value)
    {
        return $this->set(self::M_ITARGETTALENTID, $value);
    }

    /**
     * Returns value of 'm_iTargetTalentId' property
     *
     * @return int
     */
    public function getMITargetTalentId()
    {
        return $this->get(self::M_ITARGETTALENTID);
    }
}

/**
 * ALL_GUILD_MEMBER message
 */
class ALLGUILDMEMBER extends \ProtobufMessage
{
    /* Field index constants */
    const STGUILDMEMBERS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STGUILDMEMBERS => array(
            'name' => 'stGuildMembers',
            'repeated' => true,
            'type' => 'GUILDMEMBER'
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
        $this->values[self::STGUILDMEMBERS] = array();
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
     * Appends value to 'stGuildMembers' list
     *
     * @param GUILDMEMBER $value Value to append
     *
     * @return null
     */
    public function appendStGuildMembers(GUILDMEMBER $value)
    {
        return $this->append(self::STGUILDMEMBERS, $value);
    }

    /**
     * Clears 'stGuildMembers' list
     *
     * @return null
     */
    public function clearStGuildMembers()
    {
        return $this->clear(self::STGUILDMEMBERS);
    }

    /**
     * Returns 'stGuildMembers' list
     *
     * @return GUILDMEMBER[]
     */
    public function getStGuildMembers()
    {
        return $this->get(self::STGUILDMEMBERS);
    }

    /**
     * Returns 'stGuildMembers' iterator
     *
     * @return ArrayIterator
     */
    public function getStGuildMembersIterator()
    {
        return new \ArrayIterator($this->get(self::STGUILDMEMBERS));
    }

    /**
     * Returns element from 'stGuildMembers' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return GUILDMEMBER
     */
    public function getStGuildMembersAt($offset)
    {
        return $this->get(self::STGUILDMEMBERS, $offset);
    }

    /**
     * Returns count of 'stGuildMembers' list
     *
     * @return int
     */
    public function getStGuildMembersCount()
    {
        return $this->count(self::STGUILDMEMBERS);
    }
}

/**
 * ALL_GUILD_APPLY message
 */
class ALLGUILDAPPLY extends \ProtobufMessage
{
    /* Field index constants */
    const STGUILDAPPLYS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STGUILDAPPLYS => array(
            'name' => 'stGuildApplys',
            'repeated' => true,
            'type' => 'GUILDAPPLY'
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
        $this->values[self::STGUILDAPPLYS] = array();
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
     * Appends value to 'stGuildApplys' list
     *
     * @param GUILDAPPLY $value Value to append
     *
     * @return null
     */
    public function appendStGuildApplys(GUILDAPPLY $value)
    {
        return $this->append(self::STGUILDAPPLYS, $value);
    }

    /**
     * Clears 'stGuildApplys' list
     *
     * @return null
     */
    public function clearStGuildApplys()
    {
        return $this->clear(self::STGUILDAPPLYS);
    }

    /**
     * Returns 'stGuildApplys' list
     *
     * @return GUILDAPPLY[]
     */
    public function getStGuildApplys()
    {
        return $this->get(self::STGUILDAPPLYS);
    }

    /**
     * Returns 'stGuildApplys' iterator
     *
     * @return ArrayIterator
     */
    public function getStGuildApplysIterator()
    {
        return new \ArrayIterator($this->get(self::STGUILDAPPLYS));
    }

    /**
     * Returns element from 'stGuildApplys' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return GUILDAPPLY
     */
    public function getStGuildApplysAt($offset)
    {
        return $this->get(self::STGUILDAPPLYS, $offset);
    }

    /**
     * Returns count of 'stGuildApplys' list
     *
     * @return int
     */
    public function getStGuildApplysCount()
    {
        return $this->count(self::STGUILDAPPLYS);
    }
}

/**
 * ALL_GUILD_EVENT message
 */
class ALLGUILDEVENT extends \ProtobufMessage
{
    /* Field index constants */
    const STGUILDEVENTS = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STGUILDEVENTS => array(
            'name' => 'stGuildEvents',
            'repeated' => true,
            'type' => 'GUILDEVENT'
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
        $this->values[self::STGUILDEVENTS] = array();
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
     * Appends value to 'stGuildEvents' list
     *
     * @param GUILDEVENT $value Value to append
     *
     * @return null
     */
    public function appendStGuildEvents(GUILDEVENT $value)
    {
        return $this->append(self::STGUILDEVENTS, $value);
    }

    /**
     * Clears 'stGuildEvents' list
     *
     * @return null
     */
    public function clearStGuildEvents()
    {
        return $this->clear(self::STGUILDEVENTS);
    }

    /**
     * Returns 'stGuildEvents' list
     *
     * @return GUILDEVENT[]
     */
    public function getStGuildEvents()
    {
        return $this->get(self::STGUILDEVENTS);
    }

    /**
     * Returns 'stGuildEvents' iterator
     *
     * @return ArrayIterator
     */
    public function getStGuildEventsIterator()
    {
        return new \ArrayIterator($this->get(self::STGUILDEVENTS));
    }

    /**
     * Returns element from 'stGuildEvents' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return GUILDEVENT
     */
    public function getStGuildEventsAt($offset)
    {
        return $this->get(self::STGUILDEVENTS, $offset);
    }

    /**
     * Returns count of 'stGuildEvents' list
     *
     * @return int
     */
    public function getStGuildEventsCount()
    {
        return $this->count(self::STGUILDEVENTS);
    }
}

/**
 * GUILD_DATA message
 */
class GUILDDATA extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const STRNAME = 2;
    const IPRESIDENTUIN = 3;
    const IPRESIDENTROLEID = 4;
    const STRPRESIDENTNAME = 5;
    const IFLAG = 6;
    const IACTIVEVAL = 7;
    const STRDECLARATION = 8;
    const STRNOTICE = 9;
    const STALLMEMBER = 10;
    const STALLAPPLY = 11;
    const STALLEVENT = 12;
    const IFIGHTVALUE = 13;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::IPRESIDENTUIN => array(
            'name' => 'iPresidentUin',
            'required' => false,
            'type' => 5,
        ),
        self::IPRESIDENTROLEID => array(
            'name' => 'iPresidentRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::STRPRESIDENTNAME => array(
            'name' => 'strPresidentName',
            'required' => false,
            'type' => 7,
        ),
        self::IFLAG => array(
            'name' => 'iFlag',
            'required' => false,
            'type' => 5,
        ),
        self::IACTIVEVAL => array(
            'name' => 'iActiveVal',
            'required' => false,
            'type' => 5,
        ),
        self::STRDECLARATION => array(
            'name' => 'strDeclaration',
            'required' => false,
            'type' => 7,
        ),
        self::STRNOTICE => array(
            'name' => 'strNotice',
            'required' => false,
            'type' => 7,
        ),
        self::STALLMEMBER => array(
            'name' => 'stAllMember',
            'required' => false,
            'type' => 'ALLGUILDMEMBER'
        ),
        self::STALLAPPLY => array(
            'name' => 'stAllApply',
            'required' => false,
            'type' => 'ALLGUILDAPPLY'
        ),
        self::STALLEVENT => array(
            'name' => 'stAllEvent',
            'required' => false,
            'type' => 'ALLGUILDEVENT'
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
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
        $this->values[self::IID] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::IPRESIDENTUIN] = null;
        $this->values[self::IPRESIDENTROLEID] = null;
        $this->values[self::STRPRESIDENTNAME] = null;
        $this->values[self::IFLAG] = null;
        $this->values[self::IACTIVEVAL] = null;
        $this->values[self::STRDECLARATION] = null;
        $this->values[self::STRNOTICE] = null;
        $this->values[self::STALLMEMBER] = null;
        $this->values[self::STALLAPPLY] = null;
        $this->values[self::STALLEVENT] = null;
        $this->values[self::IFIGHTVALUE] = null;
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
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iPresidentUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPresidentUin($value)
    {
        return $this->set(self::IPRESIDENTUIN, $value);
    }

    /**
     * Returns value of 'iPresidentUin' property
     *
     * @return int
     */
    public function getIPresidentUin()
    {
        return $this->get(self::IPRESIDENTUIN);
    }

    /**
     * Sets value of 'iPresidentRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPresidentRoleId($value)
    {
        return $this->set(self::IPRESIDENTROLEID, $value);
    }

    /**
     * Returns value of 'iPresidentRoleId' property
     *
     * @return int
     */
    public function getIPresidentRoleId()
    {
        return $this->get(self::IPRESIDENTROLEID);
    }

    /**
     * Sets value of 'strPresidentName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrPresidentName($value)
    {
        return $this->set(self::STRPRESIDENTNAME, $value);
    }

    /**
     * Returns value of 'strPresidentName' property
     *
     * @return string
     */
    public function getStrPresidentName()
    {
        return $this->get(self::STRPRESIDENTNAME);
    }

    /**
     * Sets value of 'iFlag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFlag($value)
    {
        return $this->set(self::IFLAG, $value);
    }

    /**
     * Returns value of 'iFlag' property
     *
     * @return int
     */
    public function getIFlag()
    {
        return $this->get(self::IFLAG);
    }

    /**
     * Sets value of 'iActiveVal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActiveVal($value)
    {
        return $this->set(self::IACTIVEVAL, $value);
    }

    /**
     * Returns value of 'iActiveVal' property
     *
     * @return int
     */
    public function getIActiveVal()
    {
        return $this->get(self::IACTIVEVAL);
    }

    /**
     * Sets value of 'strDeclaration' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrDeclaration($value)
    {
        return $this->set(self::STRDECLARATION, $value);
    }

    /**
     * Returns value of 'strDeclaration' property
     *
     * @return string
     */
    public function getStrDeclaration()
    {
        return $this->get(self::STRDECLARATION);
    }

    /**
     * Sets value of 'strNotice' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrNotice($value)
    {
        return $this->set(self::STRNOTICE, $value);
    }

    /**
     * Returns value of 'strNotice' property
     *
     * @return string
     */
    public function getStrNotice()
    {
        return $this->get(self::STRNOTICE);
    }

    /**
     * Sets value of 'stAllMember' property
     *
     * @param ALLGUILDMEMBER $value Property value
     *
     * @return null
     */
    public function setStAllMember(ALLGUILDMEMBER $value)
    {
        return $this->set(self::STALLMEMBER, $value);
    }

    /**
     * Returns value of 'stAllMember' property
     *
     * @return ALLGUILDMEMBER
     */
    public function getStAllMember()
    {
        return $this->get(self::STALLMEMBER);
    }

    /**
     * Sets value of 'stAllApply' property
     *
     * @param ALLGUILDAPPLY $value Property value
     *
     * @return null
     */
    public function setStAllApply(ALLGUILDAPPLY $value)
    {
        return $this->set(self::STALLAPPLY, $value);
    }

    /**
     * Returns value of 'stAllApply' property
     *
     * @return ALLGUILDAPPLY
     */
    public function getStAllApply()
    {
        return $this->get(self::STALLAPPLY);
    }

    /**
     * Sets value of 'stAllEvent' property
     *
     * @param ALLGUILDEVENT $value Property value
     *
     * @return null
     */
    public function setStAllEvent(ALLGUILDEVENT $value)
    {
        return $this->set(self::STALLEVENT, $value);
    }

    /**
     * Returns value of 'stAllEvent' property
     *
     * @return ALLGUILDEVENT
     */
    public function getStAllEvent()
    {
        return $this->get(self::STALLEVENT);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }
}

/**
 * SELFGUILDINFO message
 */
class SELFGUILDINFO extends \ProtobufMessage
{
    /* Field index constants */
    const IGUILDID = 1;
    const STRGUILDNAME = 2;
    const STAPPLYGUILDLIST = 3;
    const IFORBIDTIME = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IGUILDID => array(
            'name' => 'iGuildId',
            'required' => false,
            'type' => 5,
        ),
        self::STRGUILDNAME => array(
            'name' => 'strGuildName',
            'required' => false,
            'type' => 7,
        ),
        self::STAPPLYGUILDLIST => array(
            'name' => 'stApplyGuildList',
            'repeated' => true,
            'type' => 'APPLYGUILDINFO'
        ),
        self::IFORBIDTIME => array(
            'name' => 'iForbidTime',
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
        $this->values[self::IGUILDID] = null;
        $this->values[self::STRGUILDNAME] = null;
        $this->values[self::STAPPLYGUILDLIST] = array();
        $this->values[self::IFORBIDTIME] = null;
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
     * Sets value of 'iGuildId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildId($value)
    {
        return $this->set(self::IGUILDID, $value);
    }

    /**
     * Returns value of 'iGuildId' property
     *
     * @return int
     */
    public function getIGuildId()
    {
        return $this->get(self::IGUILDID);
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

    /**
     * Appends value to 'stApplyGuildList' list
     *
     * @param APPLYGUILDINFO $value Value to append
     *
     * @return null
     */
    public function appendStApplyGuildList(APPLYGUILDINFO $value)
    {
        return $this->append(self::STAPPLYGUILDLIST, $value);
    }

    /**
     * Clears 'stApplyGuildList' list
     *
     * @return null
     */
    public function clearStApplyGuildList()
    {
        return $this->clear(self::STAPPLYGUILDLIST);
    }

    /**
     * Returns 'stApplyGuildList' list
     *
     * @return APPLYGUILDINFO[]
     */
    public function getStApplyGuildList()
    {
        return $this->get(self::STAPPLYGUILDLIST);
    }

    /**
     * Returns 'stApplyGuildList' iterator
     *
     * @return ArrayIterator
     */
    public function getStApplyGuildListIterator()
    {
        return new \ArrayIterator($this->get(self::STAPPLYGUILDLIST));
    }

    /**
     * Returns element from 'stApplyGuildList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return APPLYGUILDINFO
     */
    public function getStApplyGuildListAt($offset)
    {
        return $this->get(self::STAPPLYGUILDLIST, $offset);
    }

    /**
     * Returns count of 'stApplyGuildList' list
     *
     * @return int
     */
    public function getStApplyGuildListCount()
    {
        return $this->count(self::STAPPLYGUILDLIST);
    }

    /**
     * Sets value of 'iForbidTime' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIForbidTime($value)
    {
        return $this->set(self::IFORBIDTIME, $value);
    }

    /**
     * Returns value of 'iForbidTime' property
     *
     * @return int
     */
    public function getIForbidTime()
    {
        return $this->get(self::IFORBIDTIME);
    }
}

/**
 * GuildInfo message
 */
class GuildInfo extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const STRNAME = 2;
    const IPRESIDENTUIN = 3;
    const IPRESIDENTROLEID = 4;
    const STRPRESIDENTNAME = 5;
    const STRDECLARATION = 6;
    const IFLAG = 7;
    const IACTIVEVAL = 8;
    const IGUILDMEMBERAMT = 9;
    const IFIGHTVALUE = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::IPRESIDENTUIN => array(
            'name' => 'iPresidentUin',
            'required' => false,
            'type' => 5,
        ),
        self::IPRESIDENTROLEID => array(
            'name' => 'iPresidentRoleId',
            'required' => false,
            'type' => 5,
        ),
        self::STRPRESIDENTNAME => array(
            'name' => 'strPresidentName',
            'required' => false,
            'type' => 7,
        ),
        self::STRDECLARATION => array(
            'name' => 'strDeclaration',
            'required' => false,
            'type' => 7,
        ),
        self::IFLAG => array(
            'name' => 'iFlag',
            'required' => false,
            'type' => 5,
        ),
        self::IACTIVEVAL => array(
            'name' => 'iActiveVal',
            'required' => false,
            'type' => 5,
        ),
        self::IGUILDMEMBERAMT => array(
            'name' => 'iGuildMemberAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
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
        $this->values[self::IID] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::IPRESIDENTUIN] = null;
        $this->values[self::IPRESIDENTROLEID] = null;
        $this->values[self::STRPRESIDENTNAME] = null;
        $this->values[self::STRDECLARATION] = null;
        $this->values[self::IFLAG] = null;
        $this->values[self::IACTIVEVAL] = null;
        $this->values[self::IGUILDMEMBERAMT] = null;
        $this->values[self::IFIGHTVALUE] = null;
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
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iPresidentUin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPresidentUin($value)
    {
        return $this->set(self::IPRESIDENTUIN, $value);
    }

    /**
     * Returns value of 'iPresidentUin' property
     *
     * @return int
     */
    public function getIPresidentUin()
    {
        return $this->get(self::IPRESIDENTUIN);
    }

    /**
     * Sets value of 'iPresidentRoleId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIPresidentRoleId($value)
    {
        return $this->set(self::IPRESIDENTROLEID, $value);
    }

    /**
     * Returns value of 'iPresidentRoleId' property
     *
     * @return int
     */
    public function getIPresidentRoleId()
    {
        return $this->get(self::IPRESIDENTROLEID);
    }

    /**
     * Sets value of 'strPresidentName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrPresidentName($value)
    {
        return $this->set(self::STRPRESIDENTNAME, $value);
    }

    /**
     * Returns value of 'strPresidentName' property
     *
     * @return string
     */
    public function getStrPresidentName()
    {
        return $this->get(self::STRPRESIDENTNAME);
    }

    /**
     * Sets value of 'strDeclaration' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrDeclaration($value)
    {
        return $this->set(self::STRDECLARATION, $value);
    }

    /**
     * Returns value of 'strDeclaration' property
     *
     * @return string
     */
    public function getStrDeclaration()
    {
        return $this->get(self::STRDECLARATION);
    }

    /**
     * Sets value of 'iFlag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFlag($value)
    {
        return $this->set(self::IFLAG, $value);
    }

    /**
     * Returns value of 'iFlag' property
     *
     * @return int
     */
    public function getIFlag()
    {
        return $this->get(self::IFLAG);
    }

    /**
     * Sets value of 'iActiveVal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIActiveVal($value)
    {
        return $this->set(self::IACTIVEVAL, $value);
    }

    /**
     * Returns value of 'iActiveVal' property
     *
     * @return int
     */
    public function getIActiveVal()
    {
        return $this->get(self::IACTIVEVAL);
    }

    /**
     * Sets value of 'iGuildMemberAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIGuildMemberAmt($value)
    {
        return $this->set(self::IGUILDMEMBERAMT, $value);
    }

    /**
     * Returns value of 'iGuildMemberAmt' property
     *
     * @return int
     */
    public function getIGuildMemberAmt()
    {
        return $this->get(self::IGUILDMEMBERAMT);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }
}

/**
 * GuildSummary message
 */
class GuildSummary extends \ProtobufMessage
{
    /* Field index constants */
    const IID = 1;
    const STRNAME = 2;
    const IFLAG = 3;
    const IMEMBERAMT = 4;
    const IMEMBERMAX = 5;
    const IFIGHTVALUE = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IID => array(
            'name' => 'iId',
            'required' => false,
            'type' => 5,
        ),
        self::STRNAME => array(
            'name' => 'strName',
            'required' => false,
            'type' => 7,
        ),
        self::IFLAG => array(
            'name' => 'iFlag',
            'required' => false,
            'type' => 5,
        ),
        self::IMEMBERAMT => array(
            'name' => 'iMemberAmt',
            'required' => false,
            'type' => 5,
        ),
        self::IMEMBERMAX => array(
            'name' => 'iMemberMax',
            'required' => false,
            'type' => 5,
        ),
        self::IFIGHTVALUE => array(
            'name' => 'iFightValue',
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
        $this->values[self::IID] = null;
        $this->values[self::STRNAME] = null;
        $this->values[self::IFLAG] = null;
        $this->values[self::IMEMBERAMT] = null;
        $this->values[self::IMEMBERMAX] = null;
        $this->values[self::IFIGHTVALUE] = null;
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
     * Sets value of 'strName' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setStrName($value)
    {
        return $this->set(self::STRNAME, $value);
    }

    /**
     * Returns value of 'strName' property
     *
     * @return string
     */
    public function getStrName()
    {
        return $this->get(self::STRNAME);
    }

    /**
     * Sets value of 'iFlag' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFlag($value)
    {
        return $this->set(self::IFLAG, $value);
    }

    /**
     * Returns value of 'iFlag' property
     *
     * @return int
     */
    public function getIFlag()
    {
        return $this->get(self::IFLAG);
    }

    /**
     * Sets value of 'iMemberAmt' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMemberAmt($value)
    {
        return $this->set(self::IMEMBERAMT, $value);
    }

    /**
     * Returns value of 'iMemberAmt' property
     *
     * @return int
     */
    public function getIMemberAmt()
    {
        return $this->get(self::IMEMBERAMT);
    }

    /**
     * Sets value of 'iMemberMax' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIMemberMax($value)
    {
        return $this->set(self::IMEMBERMAX, $value);
    }

    /**
     * Returns value of 'iMemberMax' property
     *
     * @return int
     */
    public function getIMemberMax()
    {
        return $this->get(self::IMEMBERMAX);
    }

    /**
     * Sets value of 'iFightValue' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIFightValue($value)
    {
        return $this->set(self::IFIGHTVALUE, $value);
    }

    /**
     * Returns value of 'iFightValue' property
     *
     * @return int
     */
    public function getIFightValue()
    {
        return $this->get(self::IFIGHTVALUE);
    }
}

/**
 * SingleChips message
 */
class SingleChips extends \ProtobufMessage
{
    /* Field index constants */
    const ICHIPID = 1;
    const ICOUNT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICHIPID => array(
            'name' => 'iChipid',
            'required' => false,
            'type' => 5,
        ),
        self::ICOUNT => array(
            'name' => 'iCount',
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
        $this->values[self::ICHIPID] = null;
        $this->values[self::ICOUNT] = null;
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
     * Sets value of 'iChipid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIChipid($value)
    {
        return $this->set(self::ICHIPID, $value);
    }

    /**
     * Returns value of 'iChipid' property
     *
     * @return int
     */
    public function getIChipid()
    {
        return $this->get(self::ICHIPID);
    }

    /**
     * Sets value of 'iCount' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setICount($value)
    {
        return $this->set(self::ICOUNT, $value);
    }

    /**
     * Returns value of 'iCount' property
     *
     * @return int
     */
    public function getICount()
    {
        return $this->get(self::ICOUNT);
    }
}

/**
 * ChipsList message
 */
class ChipsList extends \ProtobufMessage
{
    /* Field index constants */
    const STLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLIST => array(
            'name' => 'stList',
            'repeated' => true,
            'type' => 'SingleChips'
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
        $this->values[self::STLIST] = array();
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
     * Appends value to 'stList' list
     *
     * @param SingleChips $value Value to append
     *
     * @return null
     */
    public function appendStList(SingleChips $value)
    {
        return $this->append(self::STLIST, $value);
    }

    /**
     * Clears 'stList' list
     *
     * @return null
     */
    public function clearStList()
    {
        return $this->clear(self::STLIST);
    }

    /**
     * Returns 'stList' list
     *
     * @return SingleChips[]
     */
    public function getStList()
    {
        return $this->get(self::STLIST);
    }

    /**
     * Returns 'stList' iterator
     *
     * @return ArrayIterator
     */
    public function getStListIterator()
    {
        return new \ArrayIterator($this->get(self::STLIST));
    }

    /**
     * Returns element from 'stList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SingleChips
     */
    public function getStListAt($offset)
    {
        return $this->get(self::STLIST, $offset);
    }

    /**
     * Returns count of 'stList' list
     *
     * @return int
     */
    public function getStListCount()
    {
        return $this->count(self::STLIST);
    }
}

/**
 * SingleCompose message
 */
class SingleCompose extends \ProtobufMessage
{
    /* Field index constants */
    const ICOMPOSEID = 1;
    const IENDTIME = 2;
    const ISDEAL = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ICOMPOSEID => array(
            'name' => 'iComposeid',
            'required' => false,
            'type' => 5,
        ),
        self::IENDTIME => array(
            'name' => 'iEndTime',
            'required' => false,
            'type' => 5,
        ),
        self::ISDEAL => array(
            'name' => 'isDeal',
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
        $this->values[self::ICOMPOSEID] = null;
        $this->values[self::IENDTIME] = null;
        $this->values[self::ISDEAL] = null;
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
     * Sets value of 'iComposeid' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIComposeid($value)
    {
        return $this->set(self::ICOMPOSEID, $value);
    }

    /**
     * Returns value of 'iComposeid' property
     *
     * @return int
     */
    public function getIComposeid()
    {
        return $this->get(self::ICOMPOSEID);
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
     * Sets value of 'isDeal' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setIsDeal($value)
    {
        return $this->set(self::ISDEAL, $value);
    }

    /**
     * Returns value of 'isDeal' property
     *
     * @return int
     */
    public function getIsDeal()
    {
        return $this->get(self::ISDEAL);
    }
}

/**
 * ComposeList message
 */
class ComposeList extends \ProtobufMessage
{
    /* Field index constants */
    const STLIST = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::STLIST => array(
            'name' => 'stList',
            'repeated' => true,
            'type' => 'SingleCompose'
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
        $this->values[self::STLIST] = array();
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
     * Appends value to 'stList' list
     *
     * @param SingleCompose $value Value to append
     *
     * @return null
     */
    public function appendStList(SingleCompose $value)
    {
        return $this->append(self::STLIST, $value);
    }

    /**
     * Clears 'stList' list
     *
     * @return null
     */
    public function clearStList()
    {
        return $this->clear(self::STLIST);
    }

    /**
     * Returns 'stList' list
     *
     * @return SingleCompose[]
     */
    public function getStList()
    {
        return $this->get(self::STLIST);
    }

    /**
     * Returns 'stList' iterator
     *
     * @return ArrayIterator
     */
    public function getStListIterator()
    {
        return new \ArrayIterator($this->get(self::STLIST));
    }

    /**
     * Returns element from 'stList' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return SingleCompose
     */
    public function getStListAt($offset)
    {
        return $this->get(self::STLIST, $offset);
    }

    /**
     * Returns count of 'stList' list
     *
     * @return int
     */
    public function getStListCount()
    {
        return $this->count(self::STLIST);
    }
}
