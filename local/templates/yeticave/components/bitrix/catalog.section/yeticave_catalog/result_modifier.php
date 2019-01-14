<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult))
{
	// Массив ID элементов

	$arItemsIds = array();
	foreach($arResult["ITEMS"] as $item){
		$arItemsIds[] = $item["ID"];
	}

	// Получить список элементов $arItems в виде "ID элемента" => "ID раздела"

	$arOrder = Array("ID" => "ASC");
	$arFilter = Array("IBLOCK_ID" => "1", "ID" => $arItemsIds);
	$arSelect = Array("ID", "IBLOCK_SECTION_ID");
	$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

	$arItems = array();
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$id = $arFields["ID"];
		$arItems[$id] = $arFields["IBLOCK_SECTION_ID"];
	}

	// Получить список разделов $arSections в виде "ID раздела" => "Название раздела"

	$arOrder = Array("ID" => "ASC");
	$arFilter = Array("IBLOCK_ID" => "1", "ID" => array_unique($arItems));
	$arSelect = Array("ID", "NAME");
	$res = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect, false);

	$arSections = array();
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$id = $arFields["ID"];
		$arSections[$id] = $arFields["NAME"];
	}

	// Установить "ID раздела" и "Название раздела" для элементов

	for($i = 0; $i < count($arResult["ITEMS"]); $i++)
	{
		$itemId = $arResult["ITEMS"][$i]["ID"];
		$sectionId = $arItems[$itemId];
		$sectionName = $arSections[$sectionId];
		$arResult["ITEMS"][$i]["SECTION_ID"] = $sectionId;
		$arResult["ITEMS"][$i]["SECTION_NAME"] = $sectionName;
	}
}
?>
