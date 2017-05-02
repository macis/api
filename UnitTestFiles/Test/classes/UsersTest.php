<?php
namespace UnitTestFiles\Test\Classes;
use PHPUnit\Framework\TestCase;
use macis\classes\Users as Users;

class UsersTest extends TestCase
{

    public function testLoginFalse()
    {
        $ret = Users::login('user', 'pass');
        $this->assertFalse($ret);
    }

    public function testLoginTrue()
    {
        $ret = Users::login('root', 'pass');
        $this->assertArrayHasKey( 'id_user',$ret);
    }
}
?>

