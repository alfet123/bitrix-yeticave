

</div>

<footer class="main-footer">
  <nav class="nav">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"yeticave_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "1",
		"COMPONENT_TEMPLATE" => "yeticave_menu",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left"
	),
	false
);?>
  </nav>
  <div class="main-footer__bottom container">

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/copyright_inc.php",
	Array(),
	Array()
);?>

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/social_inc.php",
	Array(),
	Array()
);?>

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/button_inc.php",
	Array(),
	Array()
);?>

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/developed_inc.php",
	Array(),
	Array()
);?>

  </div>
</footer>

</body>
</html>
