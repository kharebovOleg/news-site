<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

// var_dump($arResult['ITEMS']);

if (!empty($arResult['ITEMS'])) {?>
    <?php foreach ($arResult['ITEMS'] as $item) {?>
        <p><?= $item['TITLE_FORMATED'] ?></p>
        <p><?= $item['~BODY_FORMATED'] ?></p>
        <p><a href="<?= $item['DETAIL_URL'] ?>">Подробнее</a></p>
    <?php }?>
    <?php } else {?>
    <p>Ничего не найдено.</p>
<?php }?>