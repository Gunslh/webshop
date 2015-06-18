<?php
class AdminLAStatus{
    const LIMIT_AUTHORITY_ADMIN = 0;
    const LIMIT_AUTHORITY_CUSTOMER = 0x01;
    const LIMIT_AUTHORITY_SALES = 0x02;
    
    private static $desc = array (
        self::LIMIT_AUTHORITY_ADMIN => array('descr' => 'Administrator'),
        self::LIMIT_AUTHORITY_CUSTOMER => array('descr' => 'Customer'),
        self::LIMIT_AUTHORITY_SALES => array('descr' => 'Sales'),
    );
    
    public static function getDesc($id)
    {
        return self::$desc[$id]['descr'];
    }
}
?>
