<?php
/**
 * Created by PhpStorm.
 * User: wilfried
 * Date: 05/01/2017
 * Time: 13:41
 */

namespace DB;


use PHPUnit\Runner\Exception;

class ConnectDB
{
    private static $pdo;

    /**
     * @return bool|\PDO
     */
    public static function getPDO($selfconfig = true) {

        $config = require __DIR__ . '/../settings.php';
        $config = $config['settings'];
        if (!$selfconfig) {
            $config['db']['host'] = "127.0.0.1";
            $config['db']['user'] = "";
            $config['db']['pass'] = "";
        }

        try {
            self::$pdo = new \PDO(
                "mysql:dbname=".$config['db']['dbname'].";host=".$config['db']['host'].";charset=".$config['db']['charset'],
                $config['db']['user'],
                $config['db']['pass']);
        } catch (\PDOException $e) {
            throw new Exception('MYSQL ERROR : '.$e->getMessage());
        }

        return self::$pdo;
    }
}
