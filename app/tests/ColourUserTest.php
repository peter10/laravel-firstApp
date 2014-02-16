<?php

class ColourUserTest extends TestCase {
    
    public function testColourUser() {
        $user1 = User::first();
        $this->assertGreaterThan(0, count($user1->colours));
    }
}
