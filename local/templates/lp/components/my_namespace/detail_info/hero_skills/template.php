<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
    //var_dump($arResult);
?>

<div style="margin-left:400px">
<?
$APPLICATION->IncludeComponent(
    "my_namespace:skills", 
    "",
    [
        'SKILLS' => ['скорость', 'интеллект', 'сила'],
        'SKILLS_PER' => [
            intval($arResult['ITEM']["speedVALUE"]),
            intval($arResult['ITEM']["intellectVALUE"]),
            intval($arResult['ITEM']["powerVALUE"])
        ]
    ],
    false
);
?>
</div>

<div class="back_div"><a href=<?=$_SERVER['HTTP_REFERER'];?> class="back_link">Назад</a></div>
<div class="big_grey_box">
    <p class="news_detail_title"><?=$arResult["ITEM"]['NAME']?></p>
    <p class="news_date"><?=$arResult["ITEM"]['DATE']?></p>
	<div class="text_container_detail">
        <p class="news_text"><?=$arResult["ITEM"]['DETAIL_TEXT']?></p>
	</div>
</div>


