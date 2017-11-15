<?php
/**
 * Created by PhpStorm.
 * User: berdnikov
 * Date: 15.11.17
 * Time: 9:31
 */

namespace Larakit;

class Model extends \Illuminate\Database\Eloquent\Model {
    
    static $registered_appends = [];
    
    protected function getArrayableAppends() {
        $this->appends = array_unique(array_merge($this->appends, (array) static::$registered_appends));
        
        return parent::getArrayableAppends();
    }
    
    static function registerAppends($attrs) {
        $attrs = (array) $attrs;
        foreach($attrs as $attr) {
            static::$registered_appends[$attr] = $attr;
        }
    }
}