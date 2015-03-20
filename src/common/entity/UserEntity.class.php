<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../UserStateCode.class.php';?>
<?php
class UserEntity extends BaseEntity
{
    const TABLE_NAME = "shop_user";
    function __construct()
    {
    }

    public function add($usr, $pwd, $name, $tele, $zipCode, $addr)
    {
        $all = $this->query("INSERT ".self::TABLE_NAME."(`t_pkid`, `t_usrName`, `t_usrPwd`, ".
                "`t_regDate`, `t_name`, `t_telephone`, `t_zipCode`, `t_address`, `t_lastLogin`, `t_lastPurchase`, `t_status` )".
                " values ('', '$usr', '$pwd', NOW(), '$name', '$tele', '$zipCode', '$addr', NOW(), '', '".UserStateCode::U_REGISTER."')");
        if($all === false)
            return false;
        return true;
    }

    public function get($usr)
    {
        $all = $this->query("SELECT `t_pkid`, `t_usrName`, `t_usrPwd`, `t_regDate`, `t_name`,".
                "`t_telephone`, `t_zipCode`, `t_address`,`t_lastLogin`, `t_lastPurchase` ,`t_status` FROM ".
                "".self::TABLE_NAME." where t_usrName='$usr';");
        if($all === false)
            return false;
        if(count($all) == 0)
            return  false;
        return $all;
    }
    
    public function unregister($usr)
    {
        $sql = "UPDATE ".self::TABLE_NAME."set t_stats=".UserStateCode::U_UNREGISTER." where t_usrName='$usr'";
        $all = $this->query($sql);
        if($all === false)
            return false;
        if(count($all) == 0)
            return  false;
        return $all[0];
    }

    public function auth($usr, $pwd)
    {
        $sql = "SELECT count(1) as count FROM ".self::TABLE_NAME." where t_usrName='$usr' and t_usrPwd='$pwd'";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return $all[0]->count === '1' ? true : false;
    }
    
    public function checkUserExists($usr)
    {
        $sql = "SELECT * FROM ".self::TABLE_NAME." where t_usrName='$usr'";
        $all = $this->query($sql);
        if($all === false)
            return false;
        if(count($all) === 0)
            return  false;
        return true;
    }
}
?>
