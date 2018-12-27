<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult))
{
	$arOrder = Array("ID"=>"ASC");
	$arFilter = Array("IBLOCK_ID"=>"1");
	$arSelect = Array("ID", "IBLOCK_SECTION_ID");
	$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

	$category = array();
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$id = $arFields["ID"];
		$category[$id] = $arFields["IBLOCK_SECTION_ID"];
	}

	for($i = 0; $i < count($arResult["ITEMS"]); $i++)
	{
		$id = $arResult["ITEMS"][$i]["ID"];
		$categoryId = $category[$id];
		$arResult["ITEMS"][$i]["CATEGORY"] = $GLOBALS["YETICAVE_CATEGORY"][$categoryId];
	}
}
?>
