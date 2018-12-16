<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="user-menu__image">
	<img src="<?=$templateFolder?>/images/user.jpg" width="40" height="40" alt="Пользователь">
</div>
<div class="user-menu__logged">
	<p><?=$arResult[User][NAME];?></p>
	<a href="login.html">Выйти</a>
</div>
