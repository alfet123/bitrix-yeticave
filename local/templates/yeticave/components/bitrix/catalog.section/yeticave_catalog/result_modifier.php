<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult))
{
	// Получить список всех разделов

	$arOrder = Array("ID"=>"ASC");
	$arFilter = Array("IBLOCK_ID"=>"1");
	$arSelect = Array("ID", "NAME");
	$res = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect, false);

	$yeticaveCategory = array();
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$id = $arFields["ID"];
		$yeticaveCategory[$id] = $arFields["NAME"];
	}

	// Получить список всех элементов

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

	// Установить названия разделов для всех элементов

	for($i = 0; $i < count($arResult["ITEMS"]); $i++)
	{
		$id = $arResult["ITEMS"][$i]["ID"];
		$categoryId = $category[$id];
		$arResult["ITEMS"][$i]["CATEGORY"] = $yeticaveCategory[$categoryId];
	}
}
?>
