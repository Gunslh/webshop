<?php

class SEOTool{
		public static function toHeadHtml($title,$description,$keyword)
		{
			$html = "\t"."<title>$title</title>";
			$html .="\t".'<meta name="title" content="'.$title.'">'."\n";
			$html .="\t".'<meta name="description" content="'.$description.'">'."\n";
			$html .="\t".'<meta name="keywords" content="'.$keyword.'">'."\n";
			return $html;
		}
}

?>