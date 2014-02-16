<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ColourTableSeeder
 *
 * @author user1
 */
class ColourTableSeeder extends Seeder {
    
    public function run()
    {
        DB::table('colours')->delete();

        Colour::create(array('name' => 'green', 'hex_code' => '00ff00'));
        Colour::create(array('name' => 'yellow', 'hex_code' => 'ffff00'));
    }
}
