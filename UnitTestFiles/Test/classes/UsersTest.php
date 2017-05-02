<?php
namespace UnitTestFiles\Test\Classes;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{

    public function testLoginFalse()
    {
        $ret = \macis\classes\Users::login('', '');
        $this->assertFalse($ret);
    }

}
?>

