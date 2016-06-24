<?php
define("_UDP_LOG_SUCCESS",0);
define("_UDP_LOG_FAIL",-1);
define("MAX_LOG_LENGTH", 2048);

interface CMessageBody
{
    public function encode(&$pszOut, &$iOutLength);
    public function decode($pszIn, $iInLength);
    public function dump($fp = NULL);
}

/**
 * Notify Write Log
 *
 */
class CCSNotifyWriteLog implements CMessageBody
{
    public $m_nUid;
    public $m_shTableType;
    public $m_strLog;

    public function encode (&$pszOut,&$iOutLength ) {
        $ptmp =array();
        $encode_length = 0;
        $iOutLength = 0;

        $encode_length = CCodeEngine::encode_int32($ptmp,$this->m_nUid);
        $iOutLength += $encode_length;

        $encode_length = CCodeEngine::encode_int16($ptmp, $this->m_shTableType);
        $iOutLength += $encode_length;

        $encode_length = CCodeEngine::encode_string($ptmp,$this->m_strLog,MAX_LOG_LENGTH);
        $iOutLength += $encode_length;

        $pszOut = implode(NULL, $ptmp);

        return _UDP_LOG_SUCCESS;
    }

	public function decode ($pszIn,$iInLength )
	{
		return _UDP_LOG_SUCCESS;
	}
	public function dump($fp = NULL)
	{
		return _UDP_LOG_SUCCESS;
	}

}

//CS_协议使用
class  CCSHead implements CMessageBody
{
    public $httpHead = 0x00;
    public $nPackageLength;            //头部长度 + Body长度
    public $nUID;
    public $shFlag;
    public $shOptionalLen;               //signature 加密串
    public $lpbyOptional;
    public $shHeaderLen;
    public $shMessageID;
    public $shMessageType;
    public $shVersionType;
    public $shVersion;
    public $nResourceNum; //资源id
    public $nTimestamp;  //发送时间戳

	public function encode(&$pszOut, &$iOutLength)
	{
        $ptmp = array();
        $coded_length = 0;
        $iOutLength = 0;

        $coded_length = CCodeEngine::encode_int8($ptmp, $this->httpHead);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int32($ptmp,$this->nPackageLength);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int32($ptmp, $this->nUID);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shFlag);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shOptionalLen);
        $iOutLength += $coded_length;

		$coded_length = CCodeEngine::encode_memory($ptmp, $this->lpbyOptional, $this->shOptionalLen);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shHeaderLen);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shMessageID);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shMessageType);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shVersionType);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int16($ptmp, $this->shVersion);
        $iOutLength += $coded_length;
		
        $coded_length = CCodeEngine::encode_int32($ptmp, $this->nResourceNum);
        $iOutLength += $coded_length;

        $coded_length = CCodeEngine::encode_int32($ptmp, $this->nTimestamp);
        $iOutLength += $coded_length;

        $pszOut = implode(NULL, $ptmp);

        return _UDP_LOG_SUCCESS;
    }

    public function decode($pszIn, $iInLength)
    {
        if (NULL == $pszIn || $iInLength <= 0)
        {
            return _UDP_LOG_FAIL;
        }

        $ptmp = $pszIn;
        $remained_length = $iInLength;
        $decoded_length = 0;

        $decoded_length = CCodeEngine::decode_int8($ptmp, $this->httpHead);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int32($ptmp, $this->nPackageLength);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int32($ptmp, $this->nUID);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shFlag);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shOptionalLen);
        $remained_length -= $decoded_length;

 		$decoded_length = CCodeEngine::decode_memory($ptmp, $this->lpbyOptional, $this->shOptionalLen);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shHeaderLen);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shMessageID);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shMessageType);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shVersionType);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int16($ptmp, $this->shVersion);
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int32($ptmp, $this->nResourceNum);//资源号
        $remained_length -= $decoded_length;

        $decoded_length = CCodeEngine::decode_int32($ptmp,$this->nTimestamp);//时间戳
        $remained_length -= $decoded_length;

        if ($remained_length < 0)
        {
            return _UDP_LOG_FAIL;
        }
        return _UDP_LOG_SUCCESS;
    }

    public function dump($fp = NULL)
    {
       return _UDP_LOG_SUCCESS;
    }

    public function size() {
        return 30;
    }
}

class CCodeEngine
{
    public static function encode_int8(&$pOut,  $Src)
    {
        !is_array($pOut) ? $pOut = array() : NULL;

        $pOut[] = pack("c", $Src);

        return 1;
    }
    public static function decode_int8(&$pIn,  &$pOut)
    {
        $pOut = unpack('C', $pIn);
        $pOut = $pOut[1];
        0xff == $pOut ? $pOut = -1 : NULL;
        $pIn = substr($pIn, 1);
        return 1;
    }

    public static function encode_int16(&$pOut,  $Src)
    {
        !is_array($pOut) ? $pOut = array() : NULL;

        $pOut[] = pack("n", $Src);

        return 2;
    }
    public static function decode_int16(&$pIn,  &$pOut)
    {
        $pOut = unpack('n', $pIn);
        $pOut = $pOut[1];
        0xffff == $pOut ? $pOut = -1 : NULL;
        $pIn = substr($pIn, 2);
        return 2;
    }

    public static function encode_int32(&$pOut,  $Src)
    {
        !is_array($pOut) ? $pOut = array() : NULL;

        $pOut[] = pack("N", $Src);
		//var_dump(pack("N", $Src));exit;
        return 4;
    }
    //小头在前，专门为ip地址
    public static function encode_int32_little(&$pOut, $Src)
    {
        !is_array($pOut) ? $pOut = array() : NULL;

        $pOut[] = pack("V", $Src);

        return 4;
    }
    public static function decode_int32(&$pIn,  &$pOut)
    {
        $pOut = unpack('N', $pIn);
        $pOut = $pOut[1];
        $pIn = substr($pIn, 4);
        return 4;
    }

    /*
    * @method:    encode_string 编码string. 注意: 把'\0'也进行了编码,字符串长度包含'\0'
    * @fullname:  CCodeEngine::encode_string
    * @access:    public
    * @param: char * * pOut
    * @param: const char * pSrc
    * @param: const int16_t nMaxStringLength 最大字符串长度.pSrc的最大长度
    * @return:   Game51::int32_t
    * @qualifier:
    * @note
    * @par 示例:
    * @code
    * @endcode
    * @see
    * @deprecated
    */
    public static function encode_string(&$pOut,  $Src, $nMaxStringLength)
    {
        if (0 >= $nMaxStringLength)
        {
            return _UDP_LOG_FAIL;
        }

        !is_array($pOut) ? $pOut = array() : NULL;

        $tmp_string_length = strlen($Src);
        if ($tmp_string_length != 0)
        {
            $tmp_string_length += 1;
        }

        if ($tmp_string_length  > $nMaxStringLength)
        {
            $tmp_string_length = $nMaxStringLength;
        }

        //首先编入字符串的长度
        $coded_length = CCodeEngine::encode_int16($pOut, $tmp_string_length);

        if ($tmp_string_length == 0) //空串
        {
            return $coded_length;
        }

        $format = "a" . $tmp_string_length;
        $str = substr($Src, 0, $tmp_string_length -1);

        $pOut[] = pack($format, $str);

        return ($coded_length + $tmp_string_length);
    }

    /*
    * @method:    decode_string 解码string
    * @fullname:  CCodeEngine::decode_string
    * @access:    public
    * @param: char * * pIn
    * @param: char * pOut
    * @param: const int16_t nMaxStringLength pOut的最大长度
    * @return:   Game51::int32_t
    * @qualifier:
    * @note
    * @par 示例:
    * @code
    * @endcode
    * @see
    * @deprecated
    */
    public static function decode_string(&$pIn,  &$pOut, $nMaxStringLength)
    {
        if (NULL == $pIn || 0 >= $nMaxStringLength)
        {
            return 0;
        }

        $string_length = 0;

        $tmp_length = CCodeEngine::decode_int16($pIn, $string_length);
        //  if (0 == $tmp_length)
        //  {
        //      return 0;
        //  }

        if ($string_length == 0)
        {
            $pOut = '\0';
            return $tmp_length;
        }

        $real_length = $string_length;
        if ( $string_length > $nMaxStringLength)
        {
            $real_length = $nMaxStringLength;
        }
        $format = "a".$real_length;
        $pOut = unpack($format, substr($pIn, 0, $real_length));
        $pOut = $pOut[1];

        $pIn = substr($pIn, $string_length);

        return($string_length + $tmp_length);
    }

    public static function encode_memory(&$pOut, $Src, $iMemorySize)
    {
        if (0 >= $iMemorySize)
        {
            return _UDP_LOG_FAIL;
        }

        !is_array($pOut) ? $pOut = array() : NULL;

        $tmp_string_length = strlen($Src);

        if ($tmp_string_length  > $iMemorySize)
        {
            $tmp_string_length = $iMemorySize;
        }

        if ($tmp_string_length == 0) //空串
        {
            return 0;
        }

        $format = "a" . $tmp_string_length;
        $str = substr($Src, 0, $tmp_string_length);

        $pOut[] = pack($format, $str);

        return $tmp_string_length;
    }

    public static function decode_memory(&$pIn,  &$pOut, $iMemorySize)
    {
        if (NULL == $pIn || 0 >= $iMemorySize)
        {
            return 0;
        }

        if ($iMemorySize == 0)
        {
            $pOut = '';
            return 0;
        }

        $format = "a".$iMemorySize;
        $pOut = unpack($format, substr($pIn, 0, $iMemorySize));
        $pOut = $pOut[1];

        $pIn = substr($pIn, $iMemorySize);

        return $iMemorySize;
    }

    public static function encode_int64(&$pOut,  $Src)
    {
        !is_array($pOut) ? $pOut = array() : NULL;

        $Src < 0 ? $high = 0xffffffff : 0;
        $low = $Src < 0 ? 0xffffffff - abs($Src) + 1 : $Src;
        //echo $low;
        CCodeEngine::encode_int32($pOut, $high);
        CCodeEngine::encode_int32($pOut, $low);
        //$pOut[] = pack("q", $Src);

        return 8;
    }
    public static function decode_int64(&$pIn,  &$pOut)
    {
        CCodeEngine::decode_int32($pIn, $high);
        CCodeEngine::decode_int32($pIn, $low);

        $pOut = $low;

        return 8;
    }
}
?>