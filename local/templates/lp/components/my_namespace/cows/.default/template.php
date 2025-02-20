<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<fieldset>
    <legend>коровы</legend>
    <form class="cows_filter" action="index.php" method="POST">
        
        <div class="inputs_container">
            <div class="form_radio_btn">
                <input id="radio-1" type="radio" name="color" value="grey">
                <label for="radio-1">Серые</label>
            </div>
            <div class="form_radio_btn">
                <input id="radio-2" type="radio" name="color" value="white">
                <label for="radio-2">Белые</label>
            </div>
            
            <div class="form_radio_btn">
                <input id="radio-3" type="radio" name="color" value="black">
                <label for="radio-3">Черные</label>
            </div>
            <div class="form_radio_btn">
                <input id="radio-4" type="radio" name="color" value="" checked>
                <label for="radio-4">Все цвета</label>
            </div>
            <br><br>
            <div class="form_radio_btn">
                <label>Возраст</label>
                <input id="radio-5" class="range" type="range" name="age" min="0" max="20" value=0 oninput="this.nextElementSibling.value = this.value">
                <output>0</output>
            </div>
            <div class="form_radio_btn">
                <input id="radio-6" type="radio" name="age" value=0>
                <label for="radio-6">Любой</label>
            </div>
        </div>
        
        
        <div class="form_radio_btn">
            <label class="big_button" for="radio-7"><p style="margin-top:30px">Применить</p></label>
            <input id="radio-7" type="submit">
        </div>
    </form>
</fieldset>
<div style='display: flex; flex-wrap: wrap; gap: 20px; margin-left: 40px'>
    <?
    foreach($arResult['RES'] as $item)
    {
        ?>
            <div class="grey_box">
                <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news_title"><?=$item['NAME']?>:
                    <span> <?=$item['colorVALUE']?></span>
                    <span> <?=$item['ageIBLOCK_GENERIC_VALUE']?></span>
                </a>
                <div class="text_container">
                    <p class="news_text"><?=$item['PREVIEW_TEXT']?></p>
                </div>
                <p class="news_date"><?=$item['DATE']?></p>
            </div>
        <?php
    } ?>
</div>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "left",
    [
        "NAV_OBJECT" => $arResult['NAV'],
        "SEF_MODE" => $arResult["SEF_MODE"],
    ],
    false
);
?>




