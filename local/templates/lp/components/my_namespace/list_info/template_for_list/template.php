<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<?
    foreach($arResult['RES'] as $item)
    { ?>
    <div class="grey_box_long">
        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news_title"><?=$item['NAME']?></a>
        <div class="text_container">
            <p class="news_text"><?=$item['PREVIEW_TEXT']?></p>
        </div>
        <br>
        <p class="news_date"><?=$item['DATE']?></p>
    </div>
    <br>
<?php }

    $APPLICATION->IncludeComponent(
        "bitrix:main.pagenavigation",
        "left",
        [
            "NAV_OBJECT" => $arResult['NAV'],
            "SEF_MODE" => "Y",
        ],
        false
    );
?>

