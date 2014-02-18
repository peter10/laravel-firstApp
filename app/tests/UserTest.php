<?php

class UserTest extends TestCase {

    public function testDataExists() {

        $allUsers = User::all();
        $this->assertGreaterThan(0, count($allUsers));

        $user1 = User::first();
        $this->assertNotNull($user1->getReminderEmail());
    }

    public function _testAuth() {
        $user1 = User::first();
        //$attempt = Auth::attempt(array('email' => $user1->email, 'password' => $user1->password));
        $attempt = Auth::login($user1);
        //var_dump($user1);
        print_r(array('email' => $user1->email, 'password' => $user1->password));
        echo Auth::user()->name;
    }

}
