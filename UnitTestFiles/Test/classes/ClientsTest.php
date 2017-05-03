<?php
namespace UnitTestFiles\Test\Classes;
use PHPUnit\Framework\TestCase;
use macis\classes\Clients as Clients;

class ClientsTest extends TestCase
{
    public function testSearchNok()
    {
        $ret = Clients::search(0, '');
        $this->assertCount(0, $ret['clients']);
    }

    public function testSearchOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        // return everything associated with organization 1
        $ret = Clients::search(0, '');
        $this->assertTrue(count($ret['clients']) > 0 );
        // clear hack
        unset ($_SESSION['user']);
    }

}

