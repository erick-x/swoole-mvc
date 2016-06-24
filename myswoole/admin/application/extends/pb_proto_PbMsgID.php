<?php
/**
 * Auto generated from PbMsgID.proto at 2015-09-19 20:40:05
 */

/**
 * ProtocolMsgID enum
 */
final class ProtocolMsgID
{
    const MSGID_PROTOCOL_INVALID_MSG = 0;
    const MSGID_COMMOND_GM_REQUEST = 1656;
    const MSGID_GMFECHT_ROLE_REQUEST = 1657;
    const MSGID_REGAUTH_GMSERVER_NOTIFY = 1660;
    const MSGID_REGAUTH_ADDWHITE_REQUEST = 1661;
    const MSGID_ZONE_GMBULLENTINBOARD_NOTIFY = 1693;
    const MSGID_ZONE_GMLOGINBOARD_NOTIFY = 1694;
    const MSGID_ZONE_GMFORBIDENTOROLE_REQUEST = 1770;
    const MSGID_ZONE_CREATEMAILBYGM_REQUEST = 1797;
    const MSGID_ZONE_REVOKEMAIL_REQUEST = 1814;
    const MSGID_ZONE_ALLROELMAIL_REQUEST = 1821;
    const MSGID_REGAUTH_GMNOTICE_REQUEST = 1839;
    const MSGID_ZONE_GM_ACTIVITYLIST_REQUEST = 1845;
    const MSGID_ZONE_GM_ACTIVITYLIST_RESPONSE = 1846;
    const MSGID_ZONE_GM_CHANGEACTIVITY_NOTIFY = 1847;
    const MSGID_ZONE_GM_ADDACTIVITY_NOTIFY = 1848;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'MSGID_PROTOCOL_INVALID_MSG' => self::MSGID_PROTOCOL_INVALID_MSG,
            'MSGID_COMMOND_GM_REQUEST' => self::MSGID_COMMOND_GM_REQUEST,
            'MSGID_GMFECHT_ROLE_REQUEST' => self::MSGID_GMFECHT_ROLE_REQUEST,
            'MSGID_REGAUTH_GMSERVER_NOTIFY' => self::MSGID_REGAUTH_GMSERVER_NOTIFY,
            'MSGID_REGAUTH_ADDWHITE_REQUEST' => self::MSGID_REGAUTH_ADDWHITE_REQUEST,
            'MSGID_ZONE_GMBULLENTINBOARD_NOTIFY' => self::MSGID_ZONE_GMBULLENTINBOARD_NOTIFY,
            'MSGID_ZONE_GMLOGINBOARD_NOTIFY' => self::MSGID_ZONE_GMLOGINBOARD_NOTIFY,
            'MSGID_ZONE_GMFORBIDENTOROLE_REQUEST' => self::MSGID_ZONE_GMFORBIDENTOROLE_REQUEST,
            'MSGID_ZONE_CREATEMAILBYGM_REQUEST' => self::MSGID_ZONE_CREATEMAILBYGM_REQUEST,
            'MSGID_ZONE_REVOKEMAIL_REQUEST' => self::MSGID_ZONE_REVOKEMAIL_REQUEST,
            'MSGID_ZONE_ALLROELMAIL_REQUEST' => self::MSGID_ZONE_ALLROELMAIL_REQUEST,
            'MSGID_REGAUTH_GMNOTICE_REQUEST' => self::MSGID_REGAUTH_GMNOTICE_REQUEST,
            'MSGID_ZONE_GM_ACTIVITYLIST_REQUEST' => self::MSGID_ZONE_GM_ACTIVITYLIST_REQUEST,
            'MSGID_ZONE_GM_ACTIVITYLIST_RESPONSE' => self::MSGID_ZONE_GM_ACTIVITYLIST_RESPONSE,
            'MSGID_ZONE_GM_CHANGEACTIVITY_NOTIFY' => self::MSGID_ZONE_GM_CHANGEACTIVITY_NOTIFY,
            'MSGID_ZONE_GM_ADDACTIVITY_NOTIFY' => self::MSGID_ZONE_GM_ADDACTIVITY_NOTIFY,
        );
    }
}
