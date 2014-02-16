<?php

class UserTest extends TestCase {
    
    public function testDataExists() {
        
        $allUsers = User::all();
        $this->assertGreaterThan(0, count($allUsers));
        
        $user1 = User::first();
        $this->assertNotNull($user1->getReminderEmail());
    }

}
