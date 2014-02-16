<?php


/**
 * Description of ColourTest
 *
 * @author user1
 */
class ColourTest extends TestCase {
    
    public function testColour() {
        $colour = Colour::first();
        $this->assertNotNull($colour->hex_code);
    }
    
}
