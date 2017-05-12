<?php
namespace UnitTestFiles\Test\Classes;
use PHPUnit\Framework\TestCase;
use macis\classes\Calendars as Calendars;

class CalendarsTest extends TestCase
{
    /**
     * Tests post
     */
    public function testPostOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $post = array(
            "name" => "unittestname"
        );

        $ret = Calendars::post($post);
        $this->assertTrue($ret > 0);
    }


    /**
     * Tests Put
     */
    public function testPutOk() {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $put = array(
            "id" => 1,
            "name" => "usertest"
        );
        $ret = Calendars::put(1, $put);
        $this->assertTrue($ret == 1);
    }

    /**
     * Tests get
     */
    public function testGetNok()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Calendars::get(0);
        $this->assertFalse($ret);
    }

    public function testGetOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Calendars::get(1);
        $this->assertCount(2, $ret);
    }

    /**
     * Tests delete
     */
    public function testDeleteOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Calendars::delete(1);
        $this->assertTrue( $ret == 1);
    }

}

