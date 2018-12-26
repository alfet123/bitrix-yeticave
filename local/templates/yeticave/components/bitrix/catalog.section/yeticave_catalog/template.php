<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?
function getAmountString($amount)
{
	$amountString = "";

	if ($amount == 0)
	{
		$amountString = "Стартовая цена";
	}
	else
	{
		$amountLastNumber = (int)substr((string)$amount, -1);
		$amountPreLastNumber = ($amount > 9) ? (int)substr((string)$amount, -2, 1) : 0;
		if ($amountLastNumber == 0 || $amountLastNumber >= 5 || $amountPreLastNumber == 1) $amountString = $amount." ставок";
		elseif ($amountLastNumber == 1) $amountString = $amount." ставка";
		else $amountString = $amount." ставки";
	}
	
	return $amountString;
}

function getTimerString($dateTimeString)
{
	$currentTime = Time();
	$pastTime = strtotime($dateTimeString);
	$timeDifference = $currentTime - $pastTime;
	$days = floor($timeDifference / 86400);
	$timerString = "";

	if ($days == 0)
	{
		$hours = floor($timeDifference / 3600);
		$minutes = floor($timeDifference / 60) - ($hours * 60);
		$seconds = $timeDifference - ($hours * 3600) - ($minutes * 60);
		$timerString = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
	}
	else
	{
		$daysLastNumber = (int)substr((string)$days, -1);
		$daysPreLastNumber = ($days > 9) ? (int)substr((string)$days, -2, 1) : 0;
		if ($daysLastNumber == 0 || $daysLastNumber >= 5 || $daysPreLastNumber == 1) $timerString = $days." дней";
		elseif ($daysLastNumber == 1) $timerString = $days." день";
		else $timerString = $days." дня";
	}

	return $timerString;
}
?>

<?if (!empty($arResult)):?>
	<ul class="lots__list">
	<?foreach($arResult['ITEMS'] as $arItem):?>
		<li class="lots__item lot">
			<div class="lot__image">
				<img src="<?=$arItem[DETAIL_PICTURE][SRC]?>" width="350" height="260" alt="<?=$arItem[DETAIL_PICTURE][ALT]?>">
			</div>
			<div class="lot__info">
				<span class="lot__category">Категория</span>
				<h3 class="lot__title"><a class="text-link" href="lot.html"><?=$arItem[NAME]?></a></h3>
				<div class="lot__state">
					<div class="lot__rate">
						<span class="lot__amount">
							<? echo getAmountString($arItem[PROPERTIES][amount][VALUE]); ?>
						</span>
						<span class="lot__cost">
							<? echo number_format($arItem[ITEM_PRICES][0][PRICE], 0, '', ' '); ?><b class="rub">р</b>
						</span>
					</div>
					<div class="lot__timer timer">
						<? echo getTimerString($arItem[DATE_ACTIVE_FROM]); ?>
					</div>
				</div>
			</div>
		</li>
	<?endforeach;?>
	</ul>
<?endif?>
