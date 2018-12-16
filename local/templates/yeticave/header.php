<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?$APPLICATION->ShowTitle();?></title>
  <?$APPLICATION->ShowHead();?>
</head>
<body>

<?$APPLICATION->ShowPanel();?>

<?
  use Bitrix\Main\Page\Asset;
  Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/normalize.min.css");
  Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/styles.css");
?>

<div class="page-wrapper">

  <header class="main-header">
    <div class="main-header__container container">

      <h1 class="visually-hidden">YetiCave</h1>
      <a class="main-header__logo">
        <img src="<?=SITE_TEMPLATE_PATH;?>/images/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
      </a>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"yeticave_search",
	Array(
		"COMPONENT_TEMPLATE" => "yeticave_search",
		"PAGE" => "https://echo.htmlacademy.ru",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
	),
	false
);?>

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/button_inc.php",
	Array(),
	Array()
);?>

      <nav class="user-menu">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.user.link", 
	"yeticave_user", 
	array(
		"COMPONENT_TEMPLATE" => "yeticave_user",
		"ID" => "1",
		"NAME_TEMPLATE" => "#NAME#",
		"SHOW_LOGIN" => "Y",
		"USE_THUMBNAIL_LIST" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "7200",
		"THUMBNAIL_LIST_SIZE" => "30"
	),
	false
);?>
      </nav>

    </div>
  </header>

