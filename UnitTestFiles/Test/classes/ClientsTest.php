<?php
namespace UnitTestFiles\Test\Classes;
use PHPUnit\Framework\TestCase;
use macis\classes\Clients as Clients;

class ClientsTest extends TestCase
{
    /**
     * Tests post
     */
    public function testPostOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $post = array(
            "social_number" => "01000",
            "lastname" => "test",
            "birthname" => "php",
            "firstname" => "unit",
            "title" => "Mr",
            "gender" => "Male",
            "birthdate" => "1979-01-01",
            "deathdate" => null,
            "email" => "email@domain.ext",
            "address" => "this is my address",
            "postal_code" => "01000",
            "city" => "city",
            "country" => "country",
            "phone" => "000 000 000",
            "phone_mobile" => "000 000 000",
            "phone_pro" => "000 000 000",
            "job" => "developper",
            "referal_medic" => "medic",
            "social_collect" => "collect",
            "social_insurance" => "insurance",
            "marital_status" => "Single",
            "referal_person" => "referal",
            "referal_person_phone" => "000 000 000",
            "comment" => "this is a very long comment",
            "history_medical" => "",
            "history_surgical" => "",
            "history_gynecological" => "",
            "history_family" => "",
            "allergy" => "",
            "payment_status" => "Ok"
        );

        $ret = Clients::post($post);
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
            "social_number" => "01000",
            "lastname" => "test",
            "birthname" => "put",
            "firstname" => "phpunit",
            "title" => "Mrs",
            "gender" => "Female",
            "birthdate" => "1980-01-01",
            "deathdate" => "2017-01-01",
            "email" => "email@domain.ext",
            "address" => "i have no address",
            "postal_code" => "02000",
            "city" => "city2",
            "country" => "country2",
            "phone" => "100 000 000",
            "phone_mobile" => "100 000 000",
            "phone_pro" => "100 000 000",
            "job" => "deceased",
            "referal_medic" => "",
            "social_collect" => "",
            "social_insurance" => "",
            "marital_status" => "Single",
            "referal_person" => "",
            "referal_person_phone" => "",
            "comment" => "this is a very long comment",
            "history_medical" => "",
            "history_surgical" => "",
            "history_gynecological" => "",
            "history_family" => "",
            "allergy" => "",
            "payment_status" => "Ok"
        );
        $ret = Clients::put(1, $put);
        $this->assertTrue($ret == 1);
    }

    /**
     * Tests search
     */
    public function testSearchNok()
    {
        $_SESSION['user']["id_organization"] = 0;
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
    }

    public function testSearchWithParameters()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        // return everything associated with organization 1
        $ret = Clients::search(0, 'test');
        $this->assertTrue(count($ret['clients']) > 0 );
    }

    public function testSearchWithCustomFields()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        // return everything associated with organization 1
        $ret = Clients::search(0, '' , array('id'));
        $this->assertTrue(count($ret['clients']) > 0 );
    }


    /**
     * Tests get
     */
    public function testGetNok()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Clients::get(0);
        $this->assertFalse($ret);
    }

    public function testGetOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Clients::get(1);
        $this->assertCount(31, $ret);
    }

    /**
     * Tests delete
     */
    public function testDeleteOk()
    {
        // small hack, sorry
        $_SESSION['user']["id_organization"] = 1;
        $ret = Clients::delete(1);
        $this->assertTrue( $ret == 1);
    }

}

