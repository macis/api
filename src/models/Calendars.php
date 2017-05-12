<?php
/**
 * Created by PhpStorm.
 * User: Wilfried
 * Date: 26/04/2017
 * Time: 16:05
 */

namespace Models;


class Calendars extends Crud
{
    public static $tablename = "calendars";
    public static $idfield = "id";
    public static $deletedfield = "deleted";
    public static $fields = array(
        'id',
        'name'
    );

    /**
     * @param $id
     * @return mixed
     */
    public static function getById($id) {
        if (isset($id)) {
            $search = array('id' => $id);
            $list = self::selectSimple($search);
            if (is_array($list) && array_key_exists(0, $list)) {
                return $list[0];
            }
        }
        return false;
    }

    /**
     * @param $id
     * @param $values
     * @return mixed
     */
    public static function put($id, $values) {
        self::$sql_owner_value = $_SESSION['user']["id_organization"];
        $list = self::update($id, $values);
        return $list;
    }

    /**
     * @param $values
     * @return bool|\Exception|\PDOException|string
     */
    public static function post($values) {
        self::$sql_owner_value = $_SESSION['user']["id_organization"];
        $id = self::insert($values);
        return $id;
    }

    /**
     * @param $id
     * @return bool|\Exception|\PDOException
     */
    public static function delete($id) {
        self::$sql_owner_value = $_SESSION['user']["id_organization"];
        $values = array(self::$deletedfield => 'now()');
        $list = self::update($id, $values);
        return $list;
    }

}
