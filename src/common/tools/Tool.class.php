<?php
class Tool
{
	static public function toHtmlHead($entity)
	{
		$html = "";
		$html .= "<title>".$entity->t_seoTitle."</title>";		
		$html .= '<meta name="description" content="'.$entity->t_seoDescr.'">';
		$html .= '<meta name="Keywords" content="'.$entity->t_seoKeyword.'">';
		//echo $html;
		return $html;
	}
}
?>