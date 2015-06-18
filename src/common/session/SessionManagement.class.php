<?php include_once dirname(__FILE__).'/Session.class.php';?>
<?php
class SessionManagement
{
    const SESSION_ADMIN_LOGIN_KEY = "ADLGS_INFO";
    const SESSION_USER_LOGIN_KEY = "USRLGS_INFO";
    private static $_session = null;
    
    public static function instance()
    {
        if (empty(self::$_session)) {
            self::$_session = new Session();
        }
        return self::$_session;
    }
    
    public static function get($key){
        $session = self::instance();
        return $session->get($key);
    }
    
    public static function set($key, $val = null){
        $session = self::instance();
        if(empty($val)){
            $session->del($key);
        }else{
            $session->add($key, $val);
        }
    }
    
    public static function setAdminLoginSession($userInfo){
        self::set(self::SESSION_ADMIN_LOGIN_KEY, $userInfo);
    }
    
    public static function getAdminLoginSession(){
        return self::get(self::SESSION_ADMIN_LOGIN_KEY);
    }
    
    public static function clrAdminLoginSession(){
        self::set(self::SESSION_ADMIN_LOGIN_KEY);
    }
    public static function setUserLoginSession($userInfo){
        self::set(self::SESSION_USER_LOGIN_KEY, $userInfo);
    }
    
    public static function getUserLoginSession(){
        return self::get(self::SESSION_USER_LOGIN_KEY);
    }
    
    public static function clrUserLoginSession(){
        self::set(self::SESSION_USER_LOGIN_KEY);
    }
}

?>