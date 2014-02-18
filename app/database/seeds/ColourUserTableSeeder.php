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
        
        $i = 0;
        foreach( User::all() as $user ) {
        $j = $i;
        foreach( Colour::all() as $colour ) {
            DB::table('colour_user')->insert(array('user_id' => $user->id, 'colour_id' => $colour->id));
            if (++$j > 3) break;
        }
        $i+=2;
        }
    }
}
