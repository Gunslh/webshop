<?php
class App
{
    private static $_packages = array();

    private static function subdir($path, $flag = false)
    {
        if(!is_dir($path))
            return;
        $dir = scandir($path);
        foreach ($dir as $key => $val)
        {
            if($val === '.' || $val === '..')
                continue;
            if(substr ( $path, -1 ) == '/')
                $val = $path.$val;
            else
                $val = $path.'/'.$val;
            if(is_dir($val)){
                if(substr ( $val, -1 ) != '/')
                    $val = $val.'/';
                array_push(self::$_packages, $val);
                if($flag)
                    self::subdir($val);
            }
        }
    }
    
    private static function initPackages()
    {
        $loadPaths  = ConfigHandler::getLoadPaths();
        foreach ($loadPaths as $path)
        {
            $path = APP_DIR.$path;
            if(substr ( $path, -1 ) == '*'){
                $path = substr($path, 0, -1);
                self::subdir($path,true);
                continue;
            }
            if(substr ( $path, -2 ) == '*/'){
                $path = substr($path, 0, -2);
                self::subdir($path);
                continue;
            }
            if(is_dir($path)){
                if(substr ( $path, -1 ) != '/')
                    $path = $path.'/';
                array_push(self::$_packages, $path);
            }
        }
    }
    
    public static function init()
    {
        self::initPackages();
    }
    
    public static function load($className)
    {
        foreach (self::$_packages as $path)
        {
//             $file = "admin/filters/".$className . '.class.php';
            $file = $path.$className . '.class.php';
            if(file_exists($file))
                return require_once $file;
        }
        return false;
    }
}

?>