<?php
/**
 * Auto generated from PbProtocolCSMsg.proto at 2015-09-19 20:40:03
 */

/**
 * pbCSMsgBody message
 */
class PbCSMsgBody extends \ProtobufMessage
{
    /* Field index constants */
    const M_STZONE_GMFETCHROLE_REQUEST = 410;
    const M_STZONE_COMMONDGM_REQUEST = 411;
    const M_STZONE_COMMONDGM_RESPONSE = 412;
    const M_STZONE_GMFETCHROLE_RESPONSE = 415;
    const M_STREGAUTH_GMSERVER_NOTIFY = 416;
    const M_STREGAUTH_ADDWHITE_REQUEST = 417;
    const M_STZONE_GMFETCHPVE_RESPONSE = 430;
    const M_STZONE_GMSENDBULLETINBOARD_NOTIFY = 446;
    const M_STZONE_GMLOGINBOARD_NOTIFY = 453;
    const M_STZONE_GMFORBIDENTOROLE_REQUEST = 540;
    const M_STZONE_GMCREATEMAIL_REQUEST = 560;
    const M_STZONE_REVOKEMAIL_REQUEST = 578;
    const M_STZONE_ALLROLEMAIL_REQUEST = 585;
    const M_STREGAUTH_GMNOTICE_REQUEST = 600;
    const M_STZONE_GM_ACTIVITYLIST_REQUEST = 607;
    const M_STZONE_GM_ACTIVITYLIST_RESPONSE = 608;
    const M_STZONE_GM_CHANGEACTIVITY_NOTIFY = 609;
    const M_STZONE_GM_ADDACTIVITY_NOTIFY = 610;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::M_STZONE_GMFETCHROLE_REQUEST => array(
            'name' => 'm_stZone_GMFetchRole_Request',
            'required' => false,
            'type' => 'PbZoneGMFetchRoleRequest'
        ),
        self::M_STZONE_COMMONDGM_REQUEST => array(
            'name' => 'm_stZone_CommondGM_Request',
            'required' => false,
            'type' => 'PbZoneCommondGMRequest'
        ),
        self::M_STZONE_COMMONDGM_RESPONSE => array(
            'name' => 'm_stZone_CommondGM_Response',
            'required' => false,
            'type' => 'PbZoneCommondGMResponse'
        ),
        self::M_STZONE_GMFETCHROLE_RESPONSE => array(
            'name' => 'm_stZone_GMFetchRole_Response',
            'required' => false,
            'type' => 'PbZoneGMFetchRoleResponse'
        ),
        self::M_STREGAUTH_GMSERVER_NOTIFY => array(
            'name' => 'm_stRegAuth_GMServer_Notify',
            'required' => false,
            'type' => 'PbRegAuthGMServerNotify'
        ),
        self::M_STREGAUTH_ADDWHITE_REQUEST => array(
            'name' => 'm_stRegAuth_AddWhite_Request',
            'required' => false,
            'type' => 'PbRegAuthAddWhiteRequest'
        ),
        self::M_STZONE_GMFETCHPVE_RESPONSE => array(
            'name' => 'm_stZone_GMFetchPve_Response',
            'required' => false,
            'type' => 'PbZoneGMFetchPveResponse'
        ),
        self::M_STZONE_GMSENDBULLETINBOARD_NOTIFY => array(
            'name' => 'm_stZone_GMSendBulletinBoard_Notify',
            'required' => false,
            'type' => 'PbZoneGMSendBulletinBoardNotify'
        ),
        self::M_STZONE_GMLOGINBOARD_NOTIFY => array(
            'name' => 'm_stZone_GMLoginBoard_Notify',
            'required' => false,
            'type' => 'PbZoneGMLoginBoardNotify'
        ),
        self::M_STZONE_GMFORBIDENTOROLE_REQUEST => array(
            'name' => 'm_stZone_GMForbidenToRole_Request',
            'required' => false,
            'type' => 'PbZoneGMForbidenToRoleRequest'
        ),
        self::M_STZONE_GMCREATEMAIL_REQUEST => array(
            'name' => 'm_stZone_GMCreateMail_Request',
            'required' => false,
            'type' => 'PbZoneGMCreateMailRequest'
        ),
        self::M_STZONE_REVOKEMAIL_REQUEST => array(
            'name' => 'm_stZone_RevokeMail_Request',
            'required' => false,
            'type' => 'PbZoneRevokeMailRequest'
        ),
        self::M_STZONE_ALLROLEMAIL_REQUEST => array(
            'name' => 'm_stZone_AllRoleMail_Request',
            'required' => false,
            'type' => 'PbZoneAllRoleMailRequest'
        ),
        self::M_STREGAUTH_GMNOTICE_REQUEST => array(
            'name' => 'm_stRegAuth_GMNotice_Request',
            'required' => false,
            'type' => 'PbRegAuthGMNoticeRequest'
        ),
        self::M_STZONE_GM_ACTIVITYLIST_REQUEST => array(
            'name' => 'm_stZone_GM_ActivityList_Request',
            'required' => false,
            'type' => 'PbZoneGMActivityListRequest'
        ),
        self::M_STZONE_GM_ACTIVITYLIST_RESPONSE => array(
            'name' => 'm_stZone_GM_ActivityList_Response',
            'required' => false,
            'type' => 'PbZoneGMActivityListResponse'
        ),
        self::M_STZONE_GM_CHANGEACTIVITY_NOTIFY => array(
            'name' => 'm_stZone_GM_ChangeActivity_Notify',
            'required' => false,
            'type' => 'PbZoneGMChangeActivityNotify'
        ),
        self::M_STZONE_GM_ADDACTIVITY_NOTIFY => array(
            'name' => 'm_stZone_GM_AddActivity_Notify',
            'required' => false,
            'type' => 'PbZoneGMAddActivityNotify'
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
        $this->values[self::M_STZONE_GMFETCHROLE_REQUEST] = null;
        $this->values[self::M_STZONE_COMMONDGM_REQUEST] = null;
        $this->values[self::M_STZONE_COMMONDGM_RESPONSE] = null;
        $this->values[self::M_STZONE_GMFETCHROLE_RESPONSE] = null;
        $this->values[self::M_STREGAUTH_GMSERVER_NOTIFY] = null;
        $this->values[self::M_STREGAUTH_ADDWHITE_REQUEST] = null;
        $this->values[self::M_STZONE_GMFETCHPVE_RESPONSE] = null;
        $this->values[self::M_STZONE_GMSENDBULLETINBOARD_NOTIFY] = null;
        $this->values[self::M_STZONE_GMLOGINBOARD_NOTIFY] = null;
        $this->values[self::M_STZONE_GMFORBIDENTOROLE_REQUEST] = null;
        $this->values[self::M_STZONE_GMCREATEMAIL_REQUEST] = null;
        $this->values[self::M_STZONE_REVOKEMAIL_REQUEST] = null;
        $this->values[self::M_STZONE_ALLROLEMAIL_REQUEST] = null;
        $this->values[self::M_STREGAUTH_GMNOTICE_REQUEST] = null;
        $this->values[self::M_STZONE_GM_ACTIVITYLIST_REQUEST] = null;
        $this->values[self::M_STZONE_GM_ACTIVITYLIST_RESPONSE] = null;
        $this->values[self::M_STZONE_GM_CHANGEACTIVITY_NOTIFY] = null;
        $this->values[self::M_STZONE_GM_ADDACTIVITY_NOTIFY] = null;
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
     * Sets value of 'm_stZone_GMFetchRole_Request' property
     *
     * @param PbZoneGMFetchRoleRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneGMFetchRoleRequest(PbZoneGMFetchRoleRequest $value)
    {
        return $this->set(self::M_STZONE_GMFETCHROLE_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_GMFetchRole_Request' property
     *
     * @return PbZoneGMFetchRoleRequest
     */
    public function getMStZoneGMFetchRoleRequest()
    {
        return $this->get(self::M_STZONE_GMFETCHROLE_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_CommondGM_Request' property
     *
     * @param PbZoneCommondGMRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneCommondGMRequest(PbZoneCommondGMRequest $value)
    {
        return $this->set(self::M_STZONE_COMMONDGM_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_CommondGM_Request' property
     *
     * @return PbZoneCommondGMRequest
     */
    public function getMStZoneCommondGMRequest()
    {
        return $this->get(self::M_STZONE_COMMONDGM_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_CommondGM_Response' property
     *
     * @param PbZoneCommondGMResponse $value Property value
     *
     * @return null
     */
    public function setMStZoneCommondGMResponse(PbZoneCommondGMResponse $value)
    {
        return $this->set(self::M_STZONE_COMMONDGM_RESPONSE, $value);
    }

    /**
     * Returns value of 'm_stZone_CommondGM_Response' property
     *
     * @return PbZoneCommondGMResponse
     */
    public function getMStZoneCommondGMResponse()
    {
        return $this->get(self::M_STZONE_COMMONDGM_RESPONSE);
    }

    /**
     * Sets value of 'm_stZone_GMFetchRole_Response' property
     *
     * @param PbZoneGMFetchRoleResponse $value Property value
     *
     * @return null
     */
    public function setMStZoneGMFetchRoleResponse(PbZoneGMFetchRoleResponse $value)
    {
        return $this->set(self::M_STZONE_GMFETCHROLE_RESPONSE, $value);
    }

    /**
     * Returns value of 'm_stZone_GMFetchRole_Response' property
     *
     * @return PbZoneGMFetchRoleResponse
     */
    public function getMStZoneGMFetchRoleResponse()
    {
        return $this->get(self::M_STZONE_GMFETCHROLE_RESPONSE);
    }

    /**
     * Sets value of 'm_stRegAuth_GMServer_Notify' property
     *
     * @param PbRegAuthGMServerNotify $value Property value
     *
     * @return null
     */
    public function setMStRegAuthGMServerNotify(PbRegAuthGMServerNotify $value)
    {
        return $this->set(self::M_STREGAUTH_GMSERVER_NOTIFY, $value);
    }

    /**
     * Returns value of 'm_stRegAuth_GMServer_Notify' property
     *
     * @return PbRegAuthGMServerNotify
     */
    public function getMStRegAuthGMServerNotify()
    {
        return $this->get(self::M_STREGAUTH_GMSERVER_NOTIFY);
    }

    /**
     * Sets value of 'm_stRegAuth_AddWhite_Request' property
     *
     * @param PbRegAuthAddWhiteRequest $value Property value
     *
     * @return null
     */
    public function setMStRegAuthAddWhiteRequest(PbRegAuthAddWhiteRequest $value)
    {
        return $this->set(self::M_STREGAUTH_ADDWHITE_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stRegAuth_AddWhite_Request' property
     *
     * @return PbRegAuthAddWhiteRequest
     */
    public function getMStRegAuthAddWhiteRequest()
    {
        return $this->get(self::M_STREGAUTH_ADDWHITE_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_GMFetchPve_Response' property
     *
     * @param PbZoneGMFetchPveResponse $value Property value
     *
     * @return null
     */
    public function setMStZoneGMFetchPveResponse(PbZoneGMFetchPveResponse $value)
    {
        return $this->set(self::M_STZONE_GMFETCHPVE_RESPONSE, $value);
    }

    /**
     * Returns value of 'm_stZone_GMFetchPve_Response' property
     *
     * @return PbZoneGMFetchPveResponse
     */
    public function getMStZoneGMFetchPveResponse()
    {
        return $this->get(self::M_STZONE_GMFETCHPVE_RESPONSE);
    }

    /**
     * Sets value of 'm_stZone_GMSendBulletinBoard_Notify' property
     *
     * @param PbZoneGMSendBulletinBoardNotify $value Property value
     *
     * @return null
     */
    public function setMStZoneGMSendBulletinBoardNotify(PbZoneGMSendBulletinBoardNotify $value)
    {
        return $this->set(self::M_STZONE_GMSENDBULLETINBOARD_NOTIFY, $value);
    }

    /**
     * Returns value of 'm_stZone_GMSendBulletinBoard_Notify' property
     *
     * @return PbZoneGMSendBulletinBoardNotify
     */
    public function getMStZoneGMSendBulletinBoardNotify()
    {
        return $this->get(self::M_STZONE_GMSENDBULLETINBOARD_NOTIFY);
    }

    /**
     * Sets value of 'm_stZone_GMLoginBoard_Notify' property
     *
     * @param PbZoneGMLoginBoardNotify $value Property value
     *
     * @return null
     */
    public function setMStZoneGMLoginBoardNotify(PbZoneGMLoginBoardNotify $value)
    {
        return $this->set(self::M_STZONE_GMLOGINBOARD_NOTIFY, $value);
    }

    /**
     * Returns value of 'm_stZone_GMLoginBoard_Notify' property
     *
     * @return PbZoneGMLoginBoardNotify
     */
    public function getMStZoneGMLoginBoardNotify()
    {
        return $this->get(self::M_STZONE_GMLOGINBOARD_NOTIFY);
    }

    /**
     * Sets value of 'm_stZone_GMForbidenToRole_Request' property
     *
     * @param PbZoneGMForbidenToRoleRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneGMForbidenToRoleRequest(PbZoneGMForbidenToRoleRequest $value)
    {
        return $this->set(self::M_STZONE_GMFORBIDENTOROLE_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_GMForbidenToRole_Request' property
     *
     * @return PbZoneGMForbidenToRoleRequest
     */
    public function getMStZoneGMForbidenToRoleRequest()
    {
        return $this->get(self::M_STZONE_GMFORBIDENTOROLE_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_GMCreateMail_Request' property
     *
     * @param PbZoneGMCreateMailRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneGMCreateMailRequest(PbZoneGMCreateMailRequest $value)
    {
        return $this->set(self::M_STZONE_GMCREATEMAIL_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_GMCreateMail_Request' property
     *
     * @return PbZoneGMCreateMailRequest
     */
    public function getMStZoneGMCreateMailRequest()
    {
        return $this->get(self::M_STZONE_GMCREATEMAIL_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_RevokeMail_Request' property
     *
     * @param PbZoneRevokeMailRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneRevokeMailRequest(PbZoneRevokeMailRequest $value)
    {
        return $this->set(self::M_STZONE_REVOKEMAIL_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_RevokeMail_Request' property
     *
     * @return PbZoneRevokeMailRequest
     */
    public function getMStZoneRevokeMailRequest()
    {
        return $this->get(self::M_STZONE_REVOKEMAIL_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_AllRoleMail_Request' property
     *
     * @param PbZoneAllRoleMailRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneAllRoleMailRequest(PbZoneAllRoleMailRequest $value)
    {
        return $this->set(self::M_STZONE_ALLROLEMAIL_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_AllRoleMail_Request' property
     *
     * @return PbZoneAllRoleMailRequest
     */
    public function getMStZoneAllRoleMailRequest()
    {
        return $this->get(self::M_STZONE_ALLROLEMAIL_REQUEST);
    }

    /**
     * Sets value of 'm_stRegAuth_GMNotice_Request' property
     *
     * @param PbRegAuthGMNoticeRequest $value Property value
     *
     * @return null
     */
    public function setMStRegAuthGMNoticeRequest(PbRegAuthGMNoticeRequest $value)
    {
        return $this->set(self::M_STREGAUTH_GMNOTICE_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stRegAuth_GMNotice_Request' property
     *
     * @return PbRegAuthGMNoticeRequest
     */
    public function getMStRegAuthGMNoticeRequest()
    {
        return $this->get(self::M_STREGAUTH_GMNOTICE_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_GM_ActivityList_Request' property
     *
     * @param PbZoneGMActivityListRequest $value Property value
     *
     * @return null
     */
    public function setMStZoneGMActivityListRequest(PbZoneGMActivityListRequest $value)
    {
        return $this->set(self::M_STZONE_GM_ACTIVITYLIST_REQUEST, $value);
    }

    /**
     * Returns value of 'm_stZone_GM_ActivityList_Request' property
     *
     * @return PbZoneGMActivityListRequest
     */
    public function getMStZoneGMActivityListRequest()
    {
        return $this->get(self::M_STZONE_GM_ACTIVITYLIST_REQUEST);
    }

    /**
     * Sets value of 'm_stZone_GM_ActivityList_Response' property
     *
     * @param PbZoneGMActivityListResponse $value Property value
     *
     * @return null
     */
    public function setMStZoneGMActivityListResponse(PbZoneGMActivityListResponse $value)
    {
        return $this->set(self::M_STZONE_GM_ACTIVITYLIST_RESPONSE, $value);
    }

    /**
     * Returns value of 'm_stZone_GM_ActivityList_Response' property
     *
     * @return PbZoneGMActivityListResponse
     */
    public function getMStZoneGMActivityListResponse()
    {
        return $this->get(self::M_STZONE_GM_ACTIVITYLIST_RESPONSE);
    }

    /**
     * Sets value of 'm_stZone_GM_ChangeActivity_Notify' property
     *
     * @param PbZoneGMChangeActivityNotify $value Property value
     *
     * @return null
     */
    public function setMStZoneGMChangeActivityNotify(PbZoneGMChangeActivityNotify $value)
    {
        return $this->set(self::M_STZONE_GM_CHANGEACTIVITY_NOTIFY, $value);
    }

    /**
     * Returns value of 'm_stZone_GM_ChangeActivity_Notify' property
     *
     * @return PbZoneGMChangeActivityNotify
     */
    public function getMStZoneGMChangeActivityNotify()
    {
        return $this->get(self::M_STZONE_GM_CHANGEACTIVITY_NOTIFY);
    }

    /**
     * Sets value of 'm_stZone_GM_AddActivity_Notify' property
     *
     * @param PbZoneGMAddActivityNotify $value Property value
     *
     * @return null
     */
    public function setMStZoneGMAddActivityNotify(PbZoneGMAddActivityNotify $value)
    {
        return $this->set(self::M_STZONE_GM_ADDACTIVITY_NOTIFY, $value);
    }

    /**
     * Returns value of 'm_stZone_GM_AddActivity_Notify' property
     *
     * @return PbZoneGMAddActivityNotify
     */
    public function getMStZoneGMAddActivityNotify()
    {
        return $this->get(self::M_STZONE_GM_ADDACTIVITY_NOTIFY);
    }
}

/**
 * pbCSMsgHead message
 */
class PbCSMsgHead extends \ProtobufMessage
{
    /* Field index constants */
    const M_UISESSIONFD = 1;
    const M_UIMSGID = 2;
    const M_UIN = 3;
    const M_STRSESSIONKEY = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::M_UISESSIONFD => array(
            'name' => 'm_uiSessionFd',
            'required' => false,
            'type' => 5,
        ),
        self::M_UIMSGID => array(
            'default' => ProtocolMsgID::MSGID_PROTOCOL_INVALID_MSG, 
            'name' => 'm_uiMsgID',
            'required' => false,
            'type' => 5,
        ),
        self::M_UIN => array(
            'name' => 'm_uin',
            'required' => false,
            'type' => 5,
        ),
        self::M_STRSESSIONKEY => array(
            'name' => 'm_strSessionKey',
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
        $this->values[self::M_UISESSIONFD] = null;
        $this->values[self::M_UIMSGID] = ProtocolMsgID::MSGID_PROTOCOL_INVALID_MSG;
        $this->values[self::M_UIN] = null;
        $this->values[self::M_STRSESSIONKEY] = null;
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
     * Sets value of 'm_uiSessionFd' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMUiSessionFd($value)
    {
        return $this->set(self::M_UISESSIONFD, $value);
    }

    /**
     * Returns value of 'm_uiSessionFd' property
     *
     * @return int
     */
    public function getMUiSessionFd()
    {
        return $this->get(self::M_UISESSIONFD);
    }

    /**
     * Sets value of 'm_uiMsgID' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMUiMsgID($value)
    {
        return $this->set(self::M_UIMSGID, $value);
    }

    /**
     * Returns value of 'm_uiMsgID' property
     *
     * @return int
     */
    public function getMUiMsgID()
    {
        return $this->get(self::M_UIMSGID);
    }

    /**
     * Sets value of 'm_uin' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMUin($value)
    {
        return $this->set(self::M_UIN, $value);
    }

    /**
     * Returns value of 'm_uin' property
     *
     * @return int
     */
    public function getMUin()
    {
        return $this->get(self::M_UIN);
    }

    /**
     * Sets value of 'm_strSessionKey' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMStrSessionKey($value)
    {
        return $this->set(self::M_STRSESSIONKEY, $value);
    }

    /**
     * Returns value of 'm_strSessionKey' property
     *
     * @return string
     */
    public function getMStrSessionKey()
    {
        return $this->get(self::M_STRSESSIONKEY);
    }
}

/**
 * pbProtocolCSMsg message
 */
class PbProtocolCSMsg extends \ProtobufMessage
{
    /* Field index constants */
    const M_STMSGHEAD = 1;
    const M_STMSGBODY = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::M_STMSGHEAD => array(
            'name' => 'm_stMsgHead',
            'required' => false,
            'type' => 'PbCSMsgHead'
        ),
        self::M_STMSGBODY => array(
            'name' => 'm_stMsgBody',
            'required' => false,
            'type' => 'PbCSMsgBody'
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
        $this->values[self::M_STMSGHEAD] = null;
        $this->values[self::M_STMSGBODY] = null;
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
     * Sets value of 'm_stMsgHead' property
     *
     * @param PbCSMsgHead $value Property value
     *
     * @return null
     */
    public function setMStMsgHead(PbCSMsgHead $value)
    {
        return $this->set(self::M_STMSGHEAD, $value);
    }

    /**
     * Returns value of 'm_stMsgHead' property
     *
     * @return PbCSMsgHead
     */
    public function getMStMsgHead()
    {
        return $this->get(self::M_STMSGHEAD);
    }

    /**
     * Sets value of 'm_stMsgBody' property
     *
     * @param PbCSMsgBody $value Property value
     *
     * @return null
     */
    public function setMStMsgBody(PbCSMsgBody $value)
    {
        return $this->set(self::M_STMSGBODY, $value);
    }

    /**
     * Returns value of 'm_stMsgBody' property
     *
     * @return PbCSMsgBody
     */
    public function getMStMsgBody()
    {
        return $this->get(self::M_STMSGBODY);
    }
}
require_once dirname(__FILE__).'/pb_proto_PbZone.php';require_once dirname(__FILE__).'/pb_proto_PbMsgID.php';