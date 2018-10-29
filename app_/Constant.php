<?php

namespace App;

class Constant {
    
    public static function createDefautListByMonth() {
        $list = [];
        for($i = 1; $i < 13; $i++) {
            $list[$i] = 0;
        }
        return $list;
    }
}