<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTableSeeder
 *
 * @author user1
 */
class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'one@user.com', 'name' => 'user1', 'password' => Hash::make('password1')));
        User::create(array('email' => 'two@user.com', 'name' => 'user2', 'password' => Hash::make('password2')));
    }

}
