<?php

/* redis 配置 */
if (SETDB == 1) {
    $config['common.page']['host'] = 'http://morefun.msxd.com.cn';
    $config['common.page']['static'] = 'http://morefun.msxd.com.cn/static';
} else if (SETDB == 0) {
    //dev
    $config['common.page']['host'] = 'http://morefun.msxd.com.cn';
    $config['common.page']['static'] = 'http://morefun.msxd.com.cn/static';
} else if (SETDB == 2) {
    //test
    $config['common.page']['host'] = 'http://morefun.msxd.com.cn';
    $config['common.page']['static'] = 'http://morefun.msxd.com.cn/static';
}

?>