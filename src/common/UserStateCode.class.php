<?php
class UserStateCode{
    const U_REGISTER = 0;
    const U_UNREGISTER = 0x01;

    private static $userStatsDesc = array (
        self::U_REGISTER => array('descr' => 'The user has registered'),
        self::U_UNREGISTER => array('descr' => 'The user has unregistered'),
    );

    public static function getUserStatsDesc($id)
    {
        return self::$userStatsDesc[$id]['descr'];
    }
}
?>
