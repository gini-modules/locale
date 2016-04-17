<?php

namespace Gini {
    
    class Locale {

        public static function setup() {
        
        }

        public static function set() {
            $args = func_get_args();
            return call_user_func_array('setlocale', $args);
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
        function Y($number, $format = '%.2n') {
            return money_format($format, $number);
        }
    }

}
