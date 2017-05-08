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
        $return['content'] = ob_get_clean();
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
        $args = array();
        $ret = $this->executeQuery('GET','/clients', $args);
        $content = json_decode($ret['content'], true);
        $this->assertCount(3, $content); // passes
        $this->assertTrue(count($content['clients']) > 0);
    }

    public function testGetClient()
    {
        $args = array();
        $ret = $this->executeQuery('GET','/client/1', $args);
        $content = json_decode($ret['content'], true);
        $this->assertArrayHasKey('client', $content);
        $this->assertArrayHasKey('id', $content['client']);
    }

}
