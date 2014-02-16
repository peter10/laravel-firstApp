<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ColoursUsersTableSeeder
 *
 * @author user1
 */
class ColourUserTableSeeder extends Seeder {
        
    public function run()
    {
        DB::table('colour_user')->delete();

        Colour::create(array('name' => 'green', 'hex_code' => '00ff00'));
        Colour::create(array('name' => 'yellow', 'hex_code' => 'ffff00'));
        
        $colour1 = Colour::first()->id;
        $user1 = User::first()->id;
        
        DB::table('colour_user')->insert(array('user_id' => $user1, 'colour_id' => $colour1));
    }
}
