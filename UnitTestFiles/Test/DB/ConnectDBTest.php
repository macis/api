<?php
namespace UnitTestFiles\Test\DB;
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: Wilfried
 * Date: 07/05/2017
 * Time: 18:25
 */
class ConnectDBTest extends TestCase
{

    public function testConnectOk()
    {
        $ret = \DB\ConnectDB::getPDO();
        $this->assertInstanceOf("Pdo", $ret);
    }
    public function testConnectNok()
    {
        $this->expectException("Exception");
        $this->expectExceptionMessageRegExp('/^MYSQL ERROR/');
        $ret = \DB\ConnectDB::getPDO(false);
        $this->assertNull($ret);
    }
}
