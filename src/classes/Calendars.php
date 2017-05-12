<?php
/**
 * Created by PhpStorm.
 * User: wilfried
 * Date: 28/05/2016
 * Time: 23:27
 */

namespace macis\classes;

class Calendars
{

    /**
     * @param $id
     * @return mixed
     */
    public static function get($id)
    {
        $res = \Models\Calendars::getById($id);
        return $res;
    }

    /**
     * @param $id
     * @param $values
     * @return mixed
     */
    public static function put($id, $values)
    {
        $res = \Models\Calendars::put($id, $values);
        return $res;
    }

    /**
     * @param $values
     * @return bool|\Exception|\PDOException|string
     */
    public static function post($values)
    {
        $res = \Models\Calendars::post($values);
        return $res;
    }

    public static function delete($id)
    {
        $res = \Models\Calendars::delete($id);
        return $res;
    }
}
