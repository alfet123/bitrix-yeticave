<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult))
{
	$category = Array();
	foreach($arResult["SECTIONS"] as $arSection)
	{
		$category[$arSection["ID"]] = $arSection["NAME"];
	}
	$GLOBALS["YETICAVE_CATEGORY"] = $category;
}
?>
