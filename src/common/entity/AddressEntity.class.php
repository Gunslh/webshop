<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php
class AddressEntity extends BaseEntity
{
    const TABLE_NAME = "shop_address";
    function __construct()
    {
    }
    
    public function add($dao)
    {
        $sql = "insert into ".self::TABLE_NAME."(`fk_usrId`, `t_country`, `t_state`, `t_city`,`t_street`, `t_name`,`t_phone`) ".
        "values($dao->fk_usrId,'$dao->t_country','$dao->t_state','$dao->t_city','$dao->t_street','$dao->t_name','$dao->t_phone')";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }

    public function modify($dao)
    {
        $sql = "update ".self::TABLE_NAME." set `t_country`='$dao->t_country', `t_state`='$dao->t_state', `t_city`='$dao->t_city',".
        "`t_street`='$dao->t_street', `t_name`='$dao->t_name',`t_phone`='$dao->t_phone' where t_pkId=$dao->t_pkId";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }
    
    public function del($pk)
    {
        $sql = "delete from shop_address where t_pkId=$pk";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }
    
    public function getall($usr)
    {
        $sql = "select * from shop_address where fk_usrId=$usr";
        $all = $this->query($sql);
        if($all === false)
            return false;
//         if(count($all) === 0)
//             return  null;
        return $all;
    }
    
    public function setDefault($usr, $pkId)
    {
        $sql = "update ".self::TABLE_NAME." set `isDefault`=0 where fk_usrId=$usr";
        $all = $this->query($sql);
        if($all === false)
            return false;
        $sql = "update ".self::TABLE_NAME." set `isDefault`=1 where t_pkId=$pkId";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }
}
?>
