<?php
class PageTool
{
    const PER_PAGE_NUM = 10;

    public static function getPageTotal($total, $perPageNum = self::PER_PAGE_NUM){
        return intval($total/$perPageNum) + ($total % $perPageNum === 0 ? 0 :1);
    }
    
    public static function getStart($page, $perPageNum = self::PER_PAGE_NUM){
        $page = is_nan($page) ? $page : 1;
        return ($page -1) * $perPageNum;
    }
}

?>