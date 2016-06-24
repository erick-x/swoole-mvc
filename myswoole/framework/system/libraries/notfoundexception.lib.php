<?php
final class NotFoundException extends Exception
{
     public function __construct($code = 0, $msg='')
    {
        $msg && trigger_error($msg, E_USER_ERROR);
        parent::__construct($msg, $code);
    }
}

?>
