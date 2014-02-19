<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');
    
    protected $fillable = array('name', 'email', 'password');

    public function colours() {
        return $this->belongsToMany('Colour');
    }
        
    public static function validate($input) {
         $rules = array(
                'name' => 'Required|Min:3|Max:80|Alpha',
                'email' => 'Email|Unique:users',
                'password' => 'Required|Min:6|Max:80'
                
        );
        return Validator::make($input, $rules);
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

}
