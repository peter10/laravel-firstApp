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
        $validator = Colour::validate(array('name' => $colour->name, 'hex_code' => $colour->hex_code));
        $this->assertTrue($validator->passes());
        $colour2 = Colour::all()->last();
        $validator2 = Colour::validate(array('name' => $colour2->name, 'hex_code' => $colour2->hex_code));
        $this->assertTrue($validator2->passes());
    }
    
    public function testRouting() {
        
//		$crawler = $this->client->request('GET', '/');
//
//		$this->assertTrue($this->client->getResponse()->isOk());
    //$this->call('GET', '/');
        $this->call('GET', 'colours');

    $this->assertResponseOk();
    }
    
}
