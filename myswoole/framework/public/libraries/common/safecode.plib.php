<?php if( !defined('DOMAIN'))die('DOMAIN NOT EXISTS');

class Safecode {
    const COOKIE_KEY = 'id_xy_com_safecode';

    public $seKey = 'xy.com';
    public $expire = 3000;
    public $codeSet = '123456789abcdefghjklmnpqrtuvwxyABCDEFGHJKLMNPQRTUVWXY';
    public $fontSize = 15;
    public $useCurve = true;
    public $useNoise = true;
    public $_image = null;
    public $_imageH = 4;
    public $_imageL = 7;
    public $_length = 5;
    public $_color = null;
    
    private $_memcache = null;

    
    public function __construct()
    {
        $this->_memcache = new Memcache();
        $this->_memcache->addServer('192.168.9.247', 11211);
    }
    
    public function get() {
        $this->_imageL = $this->_length * $this->fontSize * 1.5 + $this->fontSize * 1.5;
        $this->_imageH = $this->fontSize * 2;
        $this->_image = imagecreate($this->_imageL, $this->_imageH);
        $bg = imagecolorallocate($this->_image, 243, 251, 254);
        $this->_color = imagecolorallocate($this->_image, mt_rand(1, 120), mt_rand(1, 120), mt_rand(1, 120));
        $ttf = dirname(__FILE__) . '/texb.ttf';
        if ($this->useNoise) {
            $this->_writeNoise();
        }
        if ($this->useCurve) {
            $this->_writeCurve();
        }
        $code = '';
        $codeNX = 0;
        for ($i = 0; $i < $this->_length; $i++) {
            $code[$i] = $this->codeSet[mt_rand(0, 53)];
            $codeNX += mt_rand($this->fontSize * 1.2, $this->fontSize * 1.6);
            imagettftext($this->_image, $this->fontSize, mt_rand(-40, 70), $codeNX, $this->fontSize * 1.5, $this->_color, $ttf, $code[$i]);
        }

        $key = md5('safecode' . time() . join('', $code));
        setcookie(self::COOKIE_KEY, $key, time() + $this->expire, '/', DOMAIN);
        
        $this->_memcache->set($this->seKey . $key, join('', $code), 0, $this->expire);

        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header("content-type: image/png");
        imagepng($this->_image);
        imagedestroy($this->_image);
    }

    protected function _writeCurve() {
        $A = mt_rand(0.9, 20);
        $b = mt_rand(-10, 10);
        $f = mt_rand(-10, 10);
        $T = mt_rand(60, 400);
        $w = (2 * M_PI) / $T;
        $pX1 = 0;
        $pX2 = mt_rand($this->_imageL / 2, $this->_imageL * 0.667);
        for ($px = $pX1; $px <= $pX2; $px = $px + 0.9) {
            if ($w != 0) {
                $py = $A * sin($w * $px + $f) + $b + $this->_imageH / 2;
                $i = (int) (($this->fontSize - 6) / 4);
                while ($i > 0) {
                    imagesetpixel($this->_image, $px + $i, $py + $i, $this->_color);
                    $i--;
                }
            }
        }
        $A = mt_rand(0.9, 20);
        $f = mt_rand(-10, 10);
        $T = mt_rand(60, 400);
        $w = (2 * M_PI) / $T;
        $b = $py - $A * sin($w * $px + $f) - $this->_imageH / 2;
        $pX1 = $pX2;
        $pX2 = $this->_imageL;
        for ($px = $pX1; $px <= $pX2; $px = $px + 0.9) {
            if ($w != 0) {
                $py = $A * sin($w * $px + $f) + $b + $this->_imageH / 2;
                $i = (int) (($this->fontSize - 8) / 4);
                while ($i > 0) {
                    imagesetpixel($this->_image, $px + $i, $py + $i, $this->_color);
                    $i--;
                }
            }
        }
    }

    protected function _writeNoise() {
        for ($i = 0; $i < 10; $i++) {
            $noiseColor = imagecolorallocate($this->_image, mt_rand(150, 225), mt_rand(150, 225), mt_rand(150, 225));
            for ($j = 0; $j < 5; $j++) {
                imagestring($this->_image, 5, mt_rand(-10, $this->_imageL), mt_rand(-10, $this->_imageH), $this->codeSet[mt_rand(0, 27)], $noiseColor);
            }
        }
    }

    public function check($code) {
        if (empty($code) || empty($_COOKIE[self::COOKIE_KEY])) {
            return false;
        }
        if (strtolower($code) === strtolower($this->_memcache->get($this->seKey . $_COOKIE[self::COOKIE_KEY]))) {
            return true;
        }
        return false;
    }
}