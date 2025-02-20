<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Корова детально");
$APPLICATION->SetPageProperty("keywords", "коровы, детально");
$APPLICATION->SetTitle("Корова детально");

$APPLICATION->IncludeComponent(
    "my_namespace:detail_info", 
    "hero_skills",
    [
        "IBLOCK_ID" => 5,
        "FILTER" => ['CODE' => $_REQUEST['CODE']],
        "SELECT" => ["DETAIL_TEXT","NAME"]
    ],
    false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");