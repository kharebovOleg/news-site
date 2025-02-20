<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

foreach($arResult['RES'] as $item)
{
    ?>
    <div class="grey_box">
        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news_title"><?=$item['NAME']?></a>
        <div class="text_container">
            <p class="news_text"><?=$item['PREVIEW_TEXT']?></p>
        </div>
    </div>
    <?php
}