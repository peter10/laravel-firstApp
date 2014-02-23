<?php

use FirstApp\Captcha\Helper as Captcha;

class UserController extends BaseController {

    public function index() {
        return View::make('user.index', array('users' => User::all()));
    }

    public function register() {
        return View::make('user.register', array('colours' => Colour::all()));
    }

    /*
     * Save the user
     */

    public function postRegister() {
        $v = User::validate(Input::all());
        // check captcha separately
        if (!Captcha::validate()) {
            Input::flash();
            // add captcha validation messge to message bag
            $v->messages()->add(Captcha::RESPONSE_FIELD, Captcha::ERROR_MESSAGE);
            return Redirect::to('users/register')->withErrors($v);
        }
        if ($v->passes()) {
            $hashedPass = Hash::make(Input::get('password'));
            $user = User::create(array_merge(Input::only('name', 'email'), array('password' => $hashedPass)));
            // save colours to pivot table
            $colours = Input::get('colours');
            if ($colours) {
                $user->colours()->sync($colours);
            }
            Auth::login($user);
            return Redirect::to('users');
        } else {
            Input::flash();
            return Redirect::to('users/register')->withErrors($v);
        }
    }
    
    public function delete() {
        if (Auth::check()) {
            User::destroy(Auth::user()->id);
        }
        return Redirect::to('users');
    }

    public function login() {
        return View::make('user.login');
    }

    public function postLogin() {
        $v = User::validateLogin(Input::all());
        if (!$v->passes()) {
            Input::flash();
            return Redirect::to('users/login')->withErrors($v);
        } elseif (Auth::attempt(Input::only('email', 'password'))) {
            return Redirect::to('/');
        } else {
            Input::flash();
            $v->messages()->add('login_error', 'Password incorrect');
            return Redirect::to('users/login')->withErrors($v);
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }

}
