<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

	<nav class="main_menu">
		<a href="/index.php"><img src="<?=SITE_TEMPLATE_PATH?>/images/O2logo.png" class="logo"></a>
        <ul class="main_menu_ul">
		<?foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;?>
			<?if($arItem["SELECTED"]):?>
				<li><a href="<?=$arItem["LINK"]?>" class="menu_link selected"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"  class="menu_link"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?endforeach?>
        </ul>
    </nav>
<?endif?>