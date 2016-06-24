<?php

/**
 * 调试功能库
 *
 */
class Debug {

    private static $time_seeds = array();

    private static function debug_get_microtime() {
        list($usec, $sec) = explode(" ", microtime());
        return round(((float) $usec + (float) $sec), 5);
    }

    public static function debug_set_time($tag) {
        if (isset(self::$time_seeds[$tag][0])) {
            self::$time_seeds[$tag][1] = self::debug_get_microtime();
        } else {
            self::$time_seeds[$tag][0] = self::debug_get_microtime();
        }
    }
    
   public static function debug_wrap_time_nohtml($tag){
       return round(self::$time_seeds[$tag][1] - self::$time_seeds[$tag][0], 4);
   }

    public static function debug_wrap_time($tag = "") {
        if (empty($tag)) {
            $tmp = '';
            foreach (self::$time_seeds as $tag => $time) {
                if (isset($time[0]) && isset($time[1])) {
                    $t = round($time[1] - $time[0], 4);
                    if (substr($tag, 0, 9) == 'Memcache_') {
                        $cost_total['Memcache_Cost_Total'] += $t;
                    }
                    $tmp .= '<p' . ($t >= 0.05 ? ' style="color: red;"' : ' style="color: #000"') . '>' . $tag . ' = ' . $t . ' 秒</p>';
                } else {
                    $tmp .= '<p style="color: #818181">' . $tag . ' = <a href="javascript:alert(\'暂时无法计算\');">null</a></p>';
                }
            }
        } else {
            if (isset(self::$time_seeds[$tag])) {
                $tmp .= '<p>' . $tag . ' = ' . round(self::$time_seeds[$tag][1] - self::$time_seeds[$tag][0], 4) . ' 秒</p>';
            } else {
                $tmp .= '<p>' . $tag . ' = NULL</p>';
            }
        }

        if (isset($cost_total) && is_array($cost_total)) {
            foreach ($cost_total as $key => $value) {
                $tmp .= '<p' . ($value >= 0.05 ? ' style="color: red;"' : ' style="color: #000"') . '>' . $key . ' = ' . $value . ' 秒</p>';
            }
        }

        return $tmp;
    }

}
