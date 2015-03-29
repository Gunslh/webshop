<?php include_once dirname(__FILE__).'/BaseEntity.class.php';?>
<?php
class CartEntity extends BaseEntity
{
    const TABLE_NAME = "shop_cart";
    public function __construct()
    {
    }

    public function add($dao)
    {
        $sql = "INSERT INTO ".self::TABLE_NAME."(`fk_user`, `fk_product`, `t_price`, `t_total`, `t_selected`) VALUES".
            "($dao->fk_user,$dao->fk_product,$dao->t_price,$dao->t_total,$dao->t_selected)";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }

    public function modify($dao)
    {
        $sql = "UPDATE ".self::TABLE_NAME." SET `t_price`=$dao->t_price, `t_total`=$dao->t_total, `t_selected`=$dao->t_selected ".
            "WHERE `fk_user`=$dao->fk_user and `fk_product`=$dao->fk_product";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }

    public function del($dao)
    {
        $sql = "DELETE FROM ".self::TABLE_NAME." where `fk_user`=$dao->fk_user and `fk_product`=$dao->fk_product";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }

    public function get($dao)
    {
        $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE `fk_user`=$dao->fk_user and `fk_product`=$dao->fk_product";
        $all = $this->query($sql);
        if($all === false)
            return false;
        if(count($all) === 0)
            return null;
        return $all[0];
    }
    
    public function add2update($dao){
        $d = $this->get($dao);
        if(empty($d)){
            return $this->add($dao);
        }else{
            return $this->modify($dao);
        }
    }
    
    public function allcart($user){
       $sql =  "SELECT * FROM ".self::TABLE_NAME." as a LEFT JOIN shop_product as b ON a.fk_product=b.t_pkId where a.fk_user=$user";
       $all = $this->query($sql);
       if($all === false)
           return false;
       return $all;
    }
    
    public function allSelect($user)
    {
        $sql = "UPDATE ".self::TABLE_NAME." SET `t_selected`=1 WHERE `fk_user`=$user";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }
    
    public function allCanel($user)
    {
        $sql = "UPDATE ".self::TABLE_NAME." SET `t_selected`=0 WHERE `fk_user`=$user";
        $all = $this->query($sql);
        if($all === false)
            return false;
        return true;
    }
}
?>
