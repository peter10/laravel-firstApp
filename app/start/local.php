<?php

//Validator::extend('foo', 'FirstApp\Captcha\Helper@validate');

Validator::extend('foo', function($attribute, $value, $parameters)
{
    return $value == 'foo';
});