<?php

namespace Gini {
    
    class Locale {

        public static $info;
        
        public static function set() {
            $args = func_get_args();
            $locale = call_user_func_array('setlocale', $args);
            self::$info = localeconv();
            $conf = \Gini\Config::get('locale');
            foreach (['currency_symbol', 'int_curr_symbol'] as $key) {
                if (!self::$info[$key]) {
                    self::$info[$key] = $conf[$key];
                }
            }
            return $locale;
        }

    }

}

namespace {

    /*
     * Shortcut for currency format in Gini
     *
     * @param float $number
     * @param string[optional] format
     * @return string
     **/
    if (function_exists('Y')) {
        die('Y() was declared by other libraries, which may cause problems!');
    } else {
        function Y($number, $format = '%.2n', $symbol = null) {
            $symbol = $symbol ?: \Gini\Locale::$info['currency_symbol'];
            return sprintf('%s %.2f', $symbol, $number);
        }
    }

}
