<?php
namespace UnitTestFiles\Test;
use PHPUnit\Framework\TestCase;

class classesUsersTest extends TestCase
{
    public function testTrueCheck()
    {
        $condition = true;
        $this->assertTrue($condition);
    }

    public function testlogin()
    {
        $this->expectException(InvalidArgumentException::class);
        
    }

}
?>