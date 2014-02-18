<?php

class Colour extends Eloquent {
    
    protected $fillable = array('name', 'hex_code');
        
    public static function validate($input) {
        
         $rules = array(
                'name' => 'Required|Min:3|Max:80|Alpha',
                'hex_code'     => 'Required|Regex:/^[0-9a-fA-F]{6}$/'
        );

        return Validator::make($input, $rules);
    }
    
}