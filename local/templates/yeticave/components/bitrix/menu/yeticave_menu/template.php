<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul class="nav__list container">
	<?foreach($arResult as $arItem):?>
		<li class="nav__item">
			<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		</li>
	<?endforeach?>
	</ul>
<?endif?>