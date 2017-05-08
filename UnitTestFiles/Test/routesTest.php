<?php
namespace UnitTestFiles\Test;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: Wilfried
 * Date: 08/05/2017
 * Time: 12:17
 */
class RoutesTest extends TestCase
{

    private function executeQuery(string $method = "GET" , string $route = "/", array $params = array())
    {
        $_SERVER['PHP_AUTH_USER'] = 'root';
        $_SERVER['PHP_AUTH_PW'] = 't00r';
        $_SERVER['REQUEST_URI'] = $route;
        $_SERVER['REQUEST_METHOD'] = $method;
        $_GET = $params;
        ob_start();
        include 'web/index.php';
        $return = array();
        $return['_session'] = $_SESSION;
        $return['_request'] = $_REQUEST;
        $return['content'] = json_decode(ob_get_clean(), true);
        return $return;
    }

    public function testConnexionKo()
    {
        ob_start();
        include 'web/index.php';
        $content = ob_get_clean();
        $this->assertRegExp('/Authentication failed/', $content);
    }

    public function testGetClients()
    {
        $ret = $this->executeQuery('GET','/clients');
        $this->assertCount(3, $ret['content']); // passes
        $this->assertTrue(count($ret['content']['clients']) > 0);
    }

    public function testGetClient()
    {
        $ret = $this->executeQuery('GET','/client/1');
        $this->assertArrayHasKey('client', $ret['content']);
        $this->assertArrayHasKey('id', $ret['content']['client']);
    }

    public function testDeleteClient()
    {
        $ret = $this->executeQuery('DELETE','/client/1');
        $this->assertArrayHasKey('client', $ret['content']);
        $this->assertTrue($ret['content']['client']);
    }

}
